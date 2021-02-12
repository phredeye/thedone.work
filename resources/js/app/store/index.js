import Vue from 'vue'
import Vuex from 'vuex'

import auth from './auth'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        showSidebar: true
    },
    actions: {
        toggleSidebar: ({commit, state}) => {
            commit('SET_SHOW_SIDEBAR', !state.showSidebar)
        }
    },
    mutations: {
        SET_SHOW_SIDEBAR: (state, payload) => {
            state.showSidebar = payload
        }
    },
    modules: {
        auth
    }
})
