import en from './assets/i18n/en.json'
import ar from './assets/i18n/ar.json'
import VueI18n from from 'vue-i18n'
import Vue from 'vue'

Vue.use(VueI18n);

export default new VueI18n({
	locale: 'ar',
	messages: {
		en: 'en',
		ar: 'ar'
	}
})