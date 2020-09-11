import Vue from 'vue'
import Vuetify from 'vuetify/lib'
import i18n from '@/i18n'
import '@/sass/overrides.sass'

import {
  VCol,
  VRow,
} from 'vuetify/lib'

Vue.use(Vuetify, {
  components: {
    VCol,
    VRow,
  },
})

const theme = {
  primary: '#4CAF50',
  secondary: '#9C27b0',
  accent: '#9C27b0',
  info: '#00CAE3',
  success: '#0e0826',
}

export default new Vuetify({
  lang: {
    t: (key, ...params) => i18n.t(key, params),
  },
  theme: {
    dark: false,
    themes: {
      light: theme,
      dark: theme
    },
  },
})
