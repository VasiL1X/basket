//api endpoints
if(window.location.origin === 'https://vue.dev-basket.com'){
    window.apiDev = 'https://api.dev-basket.com/api/v5';
}else if (window.location.origin === 'https://vue.test-basket.com/') {
    window.apiDev = 'https://api.test-basket.com/api/v5';
}else{
    window.apiDev = 'https://api.dev-basket.com/api/v5';
}



import Vue from 'vue'
import store from '~/store'
import router from '~/router'
import i18n from '~/plugins/i18n'
import App from '~/components/App'
import Vuetify from 'vuetify'
import BootstrapVue from 'bootstrap-vue'
import { PaginationPlugin } from 'bootstrap-vue'
import VeeValidate from "vee-validate"
import { ToastPlugin } from 'bootstrap-vue'
import VueSocialauth from 'vue-social-auth'
import VueAxios from 'vue-axios'
import '~/plugins'
import '~/components'
import PhoneCodes from  './plugins/data/phone_codes.json'
import * as VueGoogleMaps from 'vue2-google-maps'
import { TooltipPlugin } from 'bootstrap-vue'



import * as moment from 'moment';
window.bus = new Vue();


Vue.use(VueGoogleMaps, {
    load: {
        key: window.config.googleApiKey,
        libraries: 'places'
    }
});
Vue.config.productionTip = false
Vue.use(Vuetify)
Vue.use(PaginationPlugin)
Vue.use(VeeValidate);
Vue.use(ToastPlugin)
Vue.use(VueAxios, axios)
Vue.use(TooltipPlugin)



Vue.use(VueSocialauth, {
    providers: {
        google: {
            clientId: window.config.googleClientId,
            redirectUri: window.location.origin+'/auth/google/callback' // Your client app URL
        },

        facebook: {
            clientId: window.config.facebookClientId,
            redirectUri: window.location.origin+'/auth/facebook/callback' // Your client app URL
        }
    }
})

// new Vue({
//     el: "#AddItemModal",
//     render: h => h(App)
// });

/* eslint-disable no-new */
new Vue({
    i18n,
    store,
    router,
    Vuetify,
    ...App
});
Vue.use(BootstrapVue);
/*downloading bootstrap one more time time*/
// import 'bootstrap/dist/css/bootstrap.css'
// import 'bootstrap-vue/dist/bootstrap-vue.css'
window.$ = require('jquery');
window.moment = require('moment');

window.bus = new Vue();

window.moment = require('moment');
window.sha256 = require('js-sha256');
window.phone_codes = PhoneCodes;


