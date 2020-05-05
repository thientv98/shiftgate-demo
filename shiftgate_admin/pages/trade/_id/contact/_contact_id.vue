<template>
    <div>
        <v-container fluid class="pt-0">
            <v-row no-gutters class="wrap-breadcrumbs">
                <span class="title">コンタクト管理</span>
                <v-spacer></v-spacer>
                <v-breadcrumbs :items="breadcrumbs" divider=">"></v-breadcrumbs>
            </v-row>
            <v-card class="mt-5 form-data wrapper-content" flat tile>
                <v-card-actions class="pa-4">
                    <v-subheader class="font-weight-bold">編集</v-subheader>
                </v-card-actions>
                <v-divider></v-divider>
                <v-card-text>
                    <v-container>
                        <v-row class="item-row">
                            <v-col class="pb-0 row-padding" cols="12" md="4">
                                <v-row>
                                    <v-col class="pb-0" cols="12" md="12">
                                        <p class="mb-0">
                                            <span>対象者</span>
                                            <v-icon>mdi-svg</v-icon>
                                        </p>
                                        <v-select
                                            outlined
                                            dense
                                            v-model="target"
                                            :items="targetSelection"
                                            required
                                            :error-messages="errors.target ? errors.target[0] : ''"
                                        ></v-select>
                                    </v-col>
                                </v-row>
                            </v-col>
                            <v-col class="pb-0 row-padding" cols="12" md="4">
                                <v-row>
                                    <v-col class="pb-0" cols="12" md="12">
                                        <p class="mb-0">
                                            <span>担当者</span>
                                            <v-icon>mdi-svg</v-icon>
                                        </p>
                                        <v-select
                                            outlined
                                            dense
                                            v-model="admin_id"
                                            :items="adminSelection"
                                            :error-messages="errors.admin_id ? errors.admin_id[0] : ''"
                                        ></v-select>
                                    </v-col>
                                </v-row>
                            </v-col>
                            <v-col class="pb-0 row-padding" cols="12" md="4">
                                <v-row>
                                    <v-col class="pb-0" cols="12" md="12">
                                        <p class="mb-0">
                                            <span>コンタクト登録日</span>
                                        </p>
                                        <v-text-field
                                            outlined
                                            dense
                                            filled
                                            v-model="created_at"
                                            readonly
                                            disabled
                                        ></v-text-field>
                                    </v-col>
                                </v-row>
                            </v-col>
                        </v-row>
                        <v-row class="item-row pt-5">
                            <v-col class="pb-0 row-padding" cols="12" md="12">
                                <p class="mb-0">
                                    <span>内容</span>
                                    <v-icon>mdi-svg</v-icon>
                                </p>
                                <v-textarea
                                    outlined
                                    dense
                                    v-model="content"
                                    :error-messages="errors.content ? errors.content[0] : ''"
                                ></v-textarea>
                            </v-col>
                        </v-row>
                        <common-delete-modal
                            :dialog="dialogDelete"
                            :url="deleteUrl"
                            @closeModal="closeDeleteModal"
                            @reloadList="goBack"
                        ></common-delete-modal>
                    </v-container>
                </v-card-text>
                <v-card-actions class="pa-4">
                    <v-spacer></v-spacer>
                    <v-btn @click="goBack()">戻る</v-btn>
                    <v-btn color="error" @click="deleteContact()">削除</v-btn>
                    <v-btn color="primary" @click="submit()">保存</v-btn>
                </v-card-actions>
            </v-card>
        </v-container>
    </div>
</template>

<script>
import moment from "moment";
import CommonDeleteModal from "@/components/modals/common/delete";

export default {
    nanme: "contact-add",
    components: { CommonDeleteModal },
    data() {
        return {
            dialogDelete: false,
            deleteUrl: "",
            submitting: false,
            admin_id: null,
            target: null,
            content: null,
            created_at: null,
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
                    text: "ファイル管理",
                    href: "/trade/" + this.$route.params.id + "/contact"
                },
                {
                    text: "編集"
                }
            ],
            adminSelection: [{ value: "", text: "----" }],
            targetSelection: [
                { value: "", text: "----" },
                { value: "seller", text: "売り主" },
                { value: "buyer", text: "買い主" },
                { value: "other", text: "その他" }
            ],
            carParamsId: this.$route.params.id,
            contactParamsId: this.$route.params.contact_id
        };
    },
    mounted() {
        this.getContactInfo();
        this.getAdminList();
    },
    methods: {
        getAdminList() {
            let url = "/user/list";
            this.$axios.get(url).then(res => {
                let result = res.data.data.records.data;
                if (result) {
                    for (let i = 0; i < result.length; i++) {
                        this.adminSelection.push({
                            value: result[i].id,
                            text: result[i].last_name + result[i].first_name
                        });
                    }
                }
            });
        },
        getContactInfo() {
            let url = `/trade/contact/${this.contactParamsId}`;
            this.$axios.get(url).then(res => {
                let result = res.data.data.contact_info;
                if (result) {
                    this.admin_id = result.admin_id;
                    this.content = result.content;
                    this.target = result.target;
                    this.created_at = moment(result.created_at).format(
                        "YYYY/MM/DD HH:mm"
                    );
                }
            });
        },
        goBack() {
            this.$router.push({
                path: `/trade/${this.carParamsId}/contact`,
                hash: "#restore-list-data"
            });
        },
        submit() {
            this.submitting = true;
            let url = `/trade/contact/update/${this.contactParamsId}`;
            this.$axios
                .post(url, {
                    admin_id: this.admin_id,
                    target: this.target,
                    car_id: this.carParamsId,
                    content: this.content
                })
                .then(res => {
                    this.submitting = false;
                    if (res.data) {
                        this.$notify({
                            type: "success",
                            title: res.data.message
                        });
                        this.$router.push({
                            path: `/trade/${this.carParamsId}/contact`
                        });
                    }
                })
                .catch(err => {
                    console.log(err.response.data.message);
                });
        },
        closeDeleteModal() {
            this.dialogDelete = false;
        },
        deleteContact() {
            console.log("ins");
            this.deleteUrl =
                "/trade/" +
                this.carParamsId +
                "/contact/delete?ids=" +
                this.contactParamsId;
            this.dialogDelete = true;
        }
    }
};
</script>
