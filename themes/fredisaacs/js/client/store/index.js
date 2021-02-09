import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default  new Vuex.Store({
    state: () => {
        return {
            showLeftDrawer: true
        }
    },
    getters: {

    },
    actions: {
        toggleLeftDrawer: ({commit, state}, payload) => {
            commit('SET_LEFT_DRAWER', !state.showLeftDrawer)
        }
    },
    mutations: {
        SET_LEFT_DRAWER: (state, payload) => {
            state.showLeftDrawer = payload
        }
    },
    modules: {

    }

})
