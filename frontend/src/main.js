
import Vue from 'vue'
import App from './App.vue'
import router from './router'
import vuetify from './plugins/vuetify'
import store from './plugins/store'
import './plugins/chartist'
import './plugins'
import axios from 'axios'
import i18n from './i18n'

Vue.use(axios)

Vue.config.productionTip = false

new Vue({
  router,
  store,
  vuetify,
  i18n,
  render: h => h(App),
}).$mount('#app')
