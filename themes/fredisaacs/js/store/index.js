import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: () => {
        return {
            showLeftDrawer: true,
            miniVariant: false,
        }
    },
    getters: {},
    actions: {
        toggleLeftDrawer: ({commit, state}, payload) => {
            commit('SET_LEFT_DRAWER', !state.showLeftDrawer)
        },
        toggleMiniVariant: ({commit, state}, payload) => {
            commit('SET_MINI_VARIANT', !state.miniVariant)
        }
    },
    mutations: {
        SET_LEFT_DRAWER: (state, payload) => {
            state.showLeftDrawer = payload
        },
        SET_MINI_VARIANT: (state, payload) => {
            state.miniVariant = payload
        }
    },
    modules: {}

})
