<template>
    <v-card>
        <v-card-title>Register</v-card-title>
        <v-card-text>
            <v-text-field type="text" v-model="user.name" label="Name" :errors="user.errors.get('name')" required/>
            <v-text-field type="email" v-model="user.email" label="E-mail" :errors="user.errors.get('email')" required/>
            <v-text-field type="password" v-model="user.password" label="Password" :errors="user.errors.get('password')" required/>
            <v-text-field type="password" v-model="user.password_confirmation" label="Confirm Password" :errors="user.errors.get('password_confirmation')" required/>
        </v-card-text>
        <v-card-actions>
            <v-spacer/>
            <v-btn variant="primary" @click="register">Register</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
import Form from "form-backend-validation"
import { createHttp } from "@/shared/net/http"

const createUserForm = () => {
    return new Form({
        name: '',
        email: '',
        password: '',
        password_confirmation: ''
    }, {
        http: createHttp()
    })
}

export default {
    name: "AuthRegisterForm",
    data() {
        return {
            user: createUserForm()
        }
    },
    methods: {
        async register() {
            await this.user.post('/register')
            window.location = '/home'
        }
    }
}
</script>

<style scoped>

</style>
