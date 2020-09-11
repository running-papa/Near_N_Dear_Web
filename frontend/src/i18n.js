import Vue from 'vue'
import VueI18n from 'vue-i18n'

import en from 'vuetify/lib/locale/en'
import ko from 'vuetify/lib/locale/ko'
import fr from 'vuetify/lib/locale/fr'
import zhHans from 'vuetify/lib/locale/zh-Hans'
import zhHant from 'vuetify/lib/locale/zh-Hant'

Vue.use(VueI18n)

const messages = {
  en: {
    ...require('@/locales/en.json'),
    $vuetify: en,
  },
  ko: {
    ...require('@/locales/ko.json'),
    $vuetify: ko,
  },
  fr: {
    ...require('@/locales/fr.json'),
    $vuetify: fr,
  },
  zhHans: { //중국어간체
    ...require('@/locales/zhHans.json'),
    $vuetify: zhHans,
  },
  zhHant: { //중국어번체
    ...require('@/locales/zhHant.json'),
    $vuetify: zhHant,
  },

}

export default new VueI18n({
  locale: process.env.VUE_APP_I18N_LOCALE || 'en',
  fallbackLocale: process.env.VUE_APP_I18N_FALLBACK_LOCALE || 'en',
  messages,
})
