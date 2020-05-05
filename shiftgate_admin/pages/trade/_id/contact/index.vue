<template>
    <v-container fluid class="pt-0">
        <v-row no-gutters class="wrap-breadcrumbs">
            <span class="title">コンタクト管理</span>
            <v-spacer></v-spacer>
            <v-breadcrumbs :items="breadcrumbs" divider=">"></v-breadcrumbs>
        </v-row>

        <v-card class="mt-5 form-data wrapper-content" ref="form" flat tile>
            <v-card-actions class="pa-4">
                <v-subheader>一覧</v-subheader>
                <v-spacer></v-spacer>
                <v-btn
                    class="primary"
                    :to="{ path: `/trade/${$route.params.id}/contact/create`}"
                >新規登録</v-btn>
                <v-btn color="error" @click="deleteContact">削除</v-btn>
            </v-card-actions>

            <v-divider></v-divider>

            <v-card-text>
                <v-data-table
                    :headers="headers"
                    :items="contactList"
                    :loading="loading"
                    :loading-text="loadingText"
                    :no-data-text="noDataText"
                    :options.sync="options"
                    :show-select="true"
                    :hide-default-footer="false"
                    :footer-props="footerProps"
                    :server-items-length="totalRecords"
                    v-model="selected"
                    item-key="id"
                    class="elevation-1"
                >
                    <template
                        v-slot:item.created_at="{item}"
                    >{{ item.created_at | moment("YYYY/MM/DD HH:mm") }}</template>

                    <template v-slot:item.target="{item}">
                        <span>{{ targetText(item.target) }}</span>
                    </template>

                    <template v-slot:item.content="{item}">
                        <v-tooltip top max-width="600px">
                            <template v-slot:activator="{ on }">
                                <a v-on="on"
                                    @click="goToUrl(`/trade/${$route.params.id}/contact/${item.id}`)"
                                    href="javascript:void(0)"
                                >{{ trimText(item.content, 40) }}</a>
                            </template>
                            <span>{{item.content}}</span>
                        </v-tooltip>
                    </template>

                    <template v-slot:top>
                        <common-delete-modal
                            :dialog="dialogDelete"
                            :url="deleteUrl"
                            @closeModal="closeDeleteModal"
                            @reloadList="getDataFromApi"
                        ></common-delete-modal>
                    </template>

                    <template v-slot:footer.page-text="pageText">
                        <span
                            v-if="pageText.itemsLength"
                        >{{ pageText.pageStart }} ~ {{ pageText.pageStop }} / {{ pageText.itemsLength }}</span>
                    </template>
                </v-data-table>
            </v-card-text>
        </v-card>
    </v-container>
</template>

<script>
import Util from "@/util";
import Constant from "@/config/constants";
import CommonDeleteModal from "@/components/modals/common/delete";

export default {
    name: "contact",
    components: {
        CommonDeleteModal
    },
    data() {
        return {
            keyLocalStore: "filter-contact",
            valid: true,
            dialogDelete: false,
            restore_list_data: false,
            headers: [
                { text: "コンタクト登録日", value: "created_at" },
                { text: "対象者", value: "target" },
                { text: "担当者", value: "contact_name" },
                { text: "内容", value: "content" }
            ],
            contactList: [],
            loading: false,
            selected: [],
            totalRecords: 0,
            options: { itemsPerPage: Constant.ROW_PER_PAGE },
            footerProps: {
                "items-per-page-options": Constant.ITEM_PER_PAGE_OPTIONS,
                "items-per-page-text": "ページごとの行："
            },
            deleteUrl: "",
            pageText: {
                pageStart: 0,
                pageStop: 0,
                itemsLength: 0
            },
            breadcrumbs: [
                {
                    text: "Home",
                    disabled: false,
                    href: "/"
                },
                {
                    text: "車両一覧",
                    href: "/trade"
                },
                {
                    text: "車両詳細",
                    href: "/trade/" + this.$route.params.id + "/detail"
                },
                {
                    text: "コンタクト管理"
                }
            ]
        };
    },
    watch: {
        options: {
            handler() {
                this.setFiltersToStore();
                this.getDataFromApi();
            }
        }
    },
    computed: {
        loadingText() {
            return this.$t("common.paging_loading");
        },
        noDataText() {
            return this.$t("common.paging_no_data");
        }
    },
    mounted() {
        this.getDataFromApi();
    },
    methods: {
        setFiltersToStore() {
            if (location.hash == "#restore-list-data") {
                location.hash = "";
                this.options = this.getFiltersFromStore("options");
                this.restore_list_data = true;
            } else {
                localStorage.setItem(
                    this.keyLocalStore + "-options",
                    JSON.stringify(this.options)
                );
            }
        },
        getFiltersFromStore() {
            return JSON.parse(
                localStorage.getItem(this.keyLocalStore + "-options") || "[]"
            );
        },
        getDataFromApi() {
            let queryString = Util.serializeObj(this.getFiltersFromStore());
            try {
                this.loading = true;

                this.$axios
                    .get(
                        "trade/" +
                            this.$route.params.id +
                            "/contact?" +
                            queryString
                    )
                    .then(res => {
                        this.totalRecords = res.data.data.contacts.total;
                        this.contactList = res.data.data.contacts.data;
                        this.loading = false;
                    });
            } catch (e) {
                console.log(e.message);
            }
        },
        closeDeleteModal() {
            this.dialogDelete = false;
        },
        deleteContact() {
            let ids = [];
            if (this.selected) {
                for (var i = 0; i < this.selected.length; i++) {
                    ids.push(this.selected[i].id);
                }
            }
            this.deleteUrl =
                "trade/" +
                this.$route.params.id +
                "/contact/delete?ids=" +
                ids.toString();
            this.dialogDelete = true;
        },
        targetText(value) {
            if (value == "buyer") {
                return "買い主";
            } else if (value == "seller") {
                return "売り主";
            } else {
                return "その他";
            }
        },
        goToUrl(url) {
            this.$router.push({ path: url });
        },
        trimText(text, limit) {
            if (text.length > limit) {
                return text.substring(0, limit) + "...";
            } else {
                return text;
            }
        }
    }
};
</script>