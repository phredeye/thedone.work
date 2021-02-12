import TokenStorage from '@/shared/lib/auth/token.storage'
import http from "@/shared/lib/net/http"

const createInitialState = () => {
    return {
        currentUser: {
            name: '',
            email: ''
        }
    }
}

export default {
    state: () => createInitialState(),
    getters: {
        isLoggedIn: () => {
            return TokenStorage.hasToken()
        }
    },
    actions: {
        login: async ({commit}, payload) => {
            const response = await http.post('/auth/login', payload)
            commit('SET_AUTH_DATA', response.auth)
            commit('SET_CURRENT_USER', response.user)
        },
        logout: async ({commit}) => {
            await http.post('/auth/logout')
            commit('RESET_AUTH_STATE')
        },
        refreshCurrentUser: async ({commit}) => {
            const response = await http.get('/auth/me')
            commit('SET_CURRENT_USER', response.user)
        }
    },
    mutations: {
        SET_AUTH_DATA: (state, payload) => {
           TokenStorage.save(payload)
        },
        SET_CURRENT_USER: (state, payload) => {
            state.currentUser = payload
        },
        RESET_AUTH_STATE: (state) => {
            state.currentUser = createInitialState().currentUser
            TokenStorage.clear()
        }
    }
}
