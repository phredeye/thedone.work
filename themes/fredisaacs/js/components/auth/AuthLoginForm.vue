<template>
    <v-card>
        <v-card-title>Login</v-card-title>
        <v-card-text>
            <v-alert v-if="user.errors.length > 0">Invalid Credentials</v-alert>
            <v-text-field type="email" v-model="user.email" placeholder="you@domain.com" label="E-mail" :errors="user.errors.get('email')" required/>
            <v-text-field type="password" v-model="user.password" label="Password" :errors="user.errors.get('password')" required/>
            <v-checkbox v-model="user.remember" label="Remember Me"/>
        </v-card-text>
        <v-card-actions>
            <v-btn label="Login" @click="login"/>
        </v-card-actions>
    </v-card>
</template>

<script>
import Form from 'form-backend-validation'
import { createHttp } from '@/lib/net/http'

const http = createHttp()

const createUserForm = () => {
    return new Form({
        email: '',
        password: '',
        remember: false
    }, {
        http
    })
}

export default {
    name: "AuthLoginForm",
    data() {
        return {
            user: () => {
                return createUserForm()
            }
        }
    },
    methods: {
        async login() {
            await this.user.post('/login')
            window.location = "/home"
        }
    }
}
</script>

<style scoped>

</style>
