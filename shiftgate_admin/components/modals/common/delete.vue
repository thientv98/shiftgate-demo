<template>
    <v-dialog :value="dialog" @input="closeModal" max-width="500px">
        <v-card class="wrapper-content">
            <v-card-title>
                <span class="headline" v-html="title ? title: '削除'"></span>
            </v-card-title>
            <v-divider></v-divider>
            <v-card-text>
                <v-container>
                    <v-row>
                        <span class="headline" v-html="message ? message : 'こちらを削除します。<br>よろしいですか ？'"></span>
                    </v-row>
                </v-container>
            </v-card-text>
            <v-divider></v-divider>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn tile color="error darken-1" small @click="submit()">削除</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    name: 'common-delete-modal',
    props: {
        dialog: {
            type: Boolean,
            required: true,
        },
        title: {
            type: String,
            required: false,
        },
        message: {
            type: String,
            required: false,
        },
        url: {
            type: String,
            required: true,
        },
        urlPost: {
            type: Boolean,
            required: false,
        },
    },
    data: () => ({
        // urlPost: false
    }),
    computed: {
    },

    methods: {
        closeModal () {
            this.$emit('closeModal');
        },
        async submit () {
            try {
                if(this.urlPost) {
                    await this.$axios.post(this.url).then((res) => {
                        if (res.status === 200) { 
                            this.$notify({
                                duration: 5000,
                                type: 'success',
                                title: this.$t('common.delete_success'),
                                // text: ''
                            });
                        }
                    })
                }
                else 
                    await this.$axios.delete(this.url).then((res) => {
                        if (res.status === 200) { 
                            this.$notify({
                                duration: 5000,
                                type: 'success',
                                title: this.$t('common.delete_success'),
                                // text: ''
                            });
                        }
                    })
                    .catch(err => {
                         this.$notify({
                                duration: 5000,
                                type: 'error',
                                title: err.response.data.message
                            })
                    }) 
                this.$emit('reloadList');
                this.$emit('closeModal');
            } catch (e) {
                this.error = e.message
            }
        }, 
    }
}
</script>