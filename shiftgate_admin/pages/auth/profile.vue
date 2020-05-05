<template>
    <v-container fluid>
        <v-toolbar flat color="white">
            <v-toolbar-title>プロフィール</v-toolbar-title>
        </v-toolbar>
        <v-card class="mt-5 form-data" flat>
            <v-card-text>
                <v-container>
                    <v-row class="item-row">
                        <v-col class="col-left" cols="12" md="2">
                            <v-label>E-mail</v-label>
                        </v-col>
                        <v-col class="col-right" cols="12" md="6">
                            <v-label>{{ email ? email : '' }}</v-label>
                        </v-col>
                    </v-row>
                    <v-row class="item-row">
                        <v-col class="col-left" cols="12" md="2">
                            <v-label>氏名</v-label>
                        </v-col>
                        <v-col class="col-right" cols="12" md="6">
                            <v-label>{{ last_name }}{{ first_name }}</v-label>
                        </v-col>
                    </v-row>
                </v-container>
            </v-card-text>
        </v-card>
    </v-container>
</template>

<script>
export default {
    name: 'auth-profile',
    data: () => ({
        id: null,
        last_name: null,
        first_name: null,
        email: null,
        medical_institution: null,
        user_role: null,
        user_group: null,
        error: '',
    }),
    created() {
        this.id = this.$store.state.auth.user.id
        this.init()        
    },
    methods: {
        init() {
            try {
                let url = `user/${this.id}`
                this.$axios.get(url)
                .then((res) => {
                    let user = res.data.data.user
                    if(user) {
                        this.id = user.id
                        this.last_name = user.last_name
                        this.first_name = user.first_name
                        this.email = user.email
                        this.medical_institution = user.medical_institution
                        this.user_role = user.user_role.name
                        this.user_group = user.user_group.name
                    }
                })
            } catch (e) {
                this.error = e.message
            }
        },
    }
} 
</script>

<style scoped>
</style>