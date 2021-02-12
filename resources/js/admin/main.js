import Vue from 'vue'
// import App from '@/app/ui/App.vue'
// import '@/app/registerServiceWorker'
// import router from '@/app/router'
// import store from '@/app/store'
// import vuetify from '@/app/plugins/vuetify';

Vue.config.productionTip = false

new Vue({
    // router,
    // store,
    // vuetify,
    render: h => h(App)
}).$mount('#app')

