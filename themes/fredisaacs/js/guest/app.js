import Vue from 'vue'
import vuetify from '@/shared/plugins/vuetify'
import store from '@/guest/store'

import AuthLoginForm from '@/guest/components/auth/AuthLoginForm'
import AuthRegisterForm from '@/guest/components/auth/AuthRegisterForm'
import AppLayout from "@/guest/layouts/AppLayout";

Vue.component('login-form', AuthLoginForm)
Vue.component('register-form', AuthRegisterForm)
Vue.component('app-layout', AppLayout)

new Vue({
    store,
    vuetify,
}).$mount('#app')
