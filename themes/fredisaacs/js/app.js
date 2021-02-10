import Vue from 'vue'
import vuetify from '@/plugins/vuetify'
import store from '@/store'

import AuthLoginForm from '@/components/auth/AuthLoginForm'
import AuthRegisterForm from '@/components/auth/AuthRegisterForm'
import AppLayout from "@/layouts/AppLayout";

Vue.component('login-form', AuthLoginForm)
Vue.component('register-form', AuthRegisterForm)
Vue.component('app-layout', AppLayout)

new Vue({
    store,
    vuetify,
}).$mount('#app')
