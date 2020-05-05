<template>
    <v-card-text>
        <v-container>
            <v-simple-table dense class="custom-table">
                <template v-slot:default>
                    <thead>
                        <th class="py-0" colspan="4">コンタクト管理</th>
                    </thead>
                    <tbody>
                        <tr v-for="contact in contactData" :key="contact.id">
                            <td>{{ contact.created_at | moment("YYYY/MM/DD HH:mm") }}</td>
                            <td>{{target(contact.target)}}</td>
                            <td v-if="contact.admin">
                                {{contact.admin.last_name}} {{contact.admin.first_name}}
                            </td>
                            <td colspan="3">
                                <a v-bind:href="`/trade/${$route.params.id}/contact/${contact.id}`" target="_blank" class="space-link">{{contact.content}}</a>
                            </td>
                        </tr>
                        <tr v-if="!contactData.length" class="v-data-table__empty-wrapper"><td colspan="3" class="text-center">{{ noDataText }}</td></tr>
                    </tbody>
                </template>
            </v-simple-table>
            <div class="view-more">
                <a :href="`/trade/${$route.params.id}/contact`" target="_blank">もっと見る</a>
            </div>
        </v-container>
    </v-card-text>
</template>

<script>
export default {
  name: 'contact-management',
  props: ["contactData"],
  data() {
    return {}
  },
  mounted() {
      console.log(this.contactData);
  },
  methods: {
      target(target) {
        switch (target) {
            case "seller":
                return "売り主"
            case "buyer":
                return "買い主"
            case "other":
                return "その他"
            default:
                return ""
        }
    }
  },
  computed: {
    noDataText() {
      return this.$t("common.paging_no_data")
    }
  },
}
</script>