import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios"
Vue.use(Vuex)

//const resourceHost = process.env.APP_URL//"http://127.0.0.1:8000"
const resourceHost = "http://127.0.0.1:8000"

const enhanceAccessToeken = () => {
  const { accessToken } = localStorage
  if (!accessToken) return
  axios.defaults.headers.common["Authorization"] = `Bearer ${accessToken}`
}
enhanceAccessToeken()

export default new Vuex.Store({
  state: {
    barColor: 'rgba(0, 0, 0, .8), rgba(0, 0, 0, .8)',
    barImage: 'https://demos.creative-tim.com/material-dashboard/assets/img/sidebar-1.jpg',
    drawer: null,
    accessToken: null,
    user:{},
    uuid:'',
  },
  getters: { 
    getAuthHeader(state) { 
      let accessToken = state.accessToken;

      if (accessToken != null) {
        return { Authorization: 'Bearer ' + state.accessToken }
      } else {
        return null
      }
    },
    getUser(state) {
      let user = state.user;
      if (user != null) {
        return user
      } else {
        return null
      }
    } 
  },

  mutations: {
    SET_BAR_IMAGE (state, payload) {
      state.barImage = payload
    },
    SET_DRAWER (state, payload) {
      state.drawer = payload
    },
    LOGIN(state, data) {
      state.accessToken = data.access_token
      state.user = data.user

      // 토큰을 로컬 스토리지에 저장
      localStorage.accessToken = state.accessToken
      localStorage.user =  JSON.stringify(data.user)
    },
    UPDATE(state, data) {
      state.user = data.user
      localStorage.removeItem('user')
      localStorage.setItem('user', JSON.stringify(data.user))
    },
    LOGOUT(state) {
      state.accessToken = null
      state.user = null
      localStorage.removeItem('user')
      localStorage.removeItem('accessToken')
    },
    SET_UUID(state, payload) {
      state.uuid = payload
      alert(state.uuid)
    },
    
      
  },
  actions: {
    LOGIN ({commit}, {email, password}) {
      return axios.post(`${resourceHost}/api/auth/login`, {email, password})
        .then(({data}) => {
          commit('LOGIN', data)
  
          // 모든 HTTP 요청 헤더에 Authorization 을 추가한다.
          axios.defaults.headers.common['Authorization'] = `Bearer ${data.accessToken}`;
        })
    },
    LOGOUT({commit}) {
      return axios.post(`${resourceHost}/api/auth/logout`)
        .then(({data}) => {
          commit("LOGOUT")
        })
    },
  },

  
})
