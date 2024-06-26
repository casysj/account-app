import { createStore } from 'vuex'
import axios from 'axios'

export default createStore({
    state: {
        user: null,
        token: null
    },
    mutations: {
        setUser(state, user) {
            state.user = user
        },
        setToken(state, token) {
            state.token = token
        }
    },
    actions: {
        async login({ commit }, credentials) {
            const response = await axios.post('http://localhost:8000/api/login', credentials)
            commit('setUser', response.data.user)
            commit('setToken', response.data.token)
        }
    },
    getters: {
        isAuthenticated: state => !!state.token,
        getUser: state => state.user
    }
})
