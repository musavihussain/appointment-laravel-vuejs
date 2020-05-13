<template>
    <v-row>
        <v-col class="col-md-6 offset-md-3">
            <v-card class="pa-5" outlined tile>
                <v-alert v-if=availabilityMessage type="error">
                {{ availabilityMessage }}
                </v-alert>
                <v-form @submit.prevent="login" ref="form" v-model="valid"
                    :lazy-validation="lazy">
                    <v-text-field
                        v-model="form.email"
                        label="E-mail"
                        :rules="emailRules"
                        type="email"
                        required
                    ></v-text-field>

                    <v-text-field
                        v-model="form.password"
                        :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                        :rules="[rules.required, rules.min]"
                        :type="show ? 'text' : 'password'"
                        label="Password"
                        hint="At least 8 characters"
                        counter
                        @click:append="show = !show"
                    ></v-text-field>

                    <v-btn
                    :disabled="!valid"
                    @click="validate"
                    color="success"
                    class="my-4"
                    type="submit">
                        Login
                    </v-btn>

                    <router-link to="/signup">
                        <v-btn text>Signup</v-btn>
                    </router-link>

                </v-form>
            </v-card>
        </v-col>
    </v-row>
</template>

<script>

import UserToken from '../Helpers/User';

export default {
    data() {
        return {
            valid:true,
            form: {
                email: "",
                password: ""
            },
            lazy: false,
            show: false,
            availabilityMessage: null,
            rules: {
                required: value => !!value || "Required.",
                min: v => v.length >= 8 || "Min 8 characters"
            },
            emailRules: [
                v => !!v || 'E-mail is required',
                v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
            ],
        };
    },
    created() {
        // if(User.loggedIn()) {
        //     this.$router.push('/');
        // }
    },
    methods: {
        validate () {
        this.$refs.form.validate()
        },
        login() {
            axios
                .post('/api/login', this.form)
                .then(res => {
                    if(res.data.message == 'Unauthorized') {
                        this.availabilityMessage = 'User or Password is incorrect';
                    } else {
                        console.log(res.data)
                        UserToken.storeTokenAfterLogin(res);
                    }
                })
                .catch(error => {
                    if (error.response) {
                        console.log(error.response.data);
                        this.availabilityMessage = error.response.data.error
                        console.log(error.response.status);
                        console.log(error.response.headers);
                    } else if (error.request) {
                        console.log(error.request);
                    } else {
                        console.log('Error', error.message);
                    }
                    console.log(error);
                });
        }
    }
};
</script>

<style lang="scss" scoped></style>
