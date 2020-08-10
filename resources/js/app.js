/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
/*
require('./bootstrap');

window.Vue = require('vue');



require('./plugins.js')

require('./components.js')

require('./helpers.js')


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
/*
import * as VueGoogleMaps from "vue2-google-maps";
Vue.use(VueGoogleMaps, {
    load: {
        key: process.env.MIX_GOOGLE_MAP_ID,
        libraries: "places"
    }
});

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('google-map', require('./components/GoogleMap.vue').default);

*/
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
/*
const app = new Vue({
    el: '#app',
});

 */

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


window.Vue = require("vue");

import VeeValidate, { Validator } from "vee-validate";
//import VeeValidate from "vee-validate";

if (document.querySelector("html").lang == "ar") {
    // Localize takes the locale object as the second argument (optional) and merges it.
    Validator.localize("ar", ar);
}

// Install the Plugin.
import * as VueGoogleMaps from "vue2-google-maps";
Vue.use(VueGoogleMaps, {
    load: {
        key: process.env.MIX_GOOGLE_MAP_ID,
        libraries: "places"
    }
});
Vue.use(VeeValidate);
Vue.component('google-map', require('./Components/GoogleMap.vue').default);


import VueGlobalVar from "vue-global-var";

const SupportedLanguages = document.head.querySelector('meta[name="supported-languages"]');

var $_languages=['ar','en']
if(SupportedLanguages){
    $_languages= JSON.parse(SupportedLanguages.content);
}
Vue.use(VueGlobalVar, {
    globals: {
        $languages: $_languages,
        $validation_errors:[]
    },
});

axios.interceptors.response.use(function (response) {
    return response;
}, function (error) {
    $validation_errors=[];
    if('errors' in error.response.data){
        for(var type in error.response.data.errors){
            for(var index in error.response.data.errors[type]){
                vue.errors.add({
                    field: type,
                    msg: error.response.data.errors[type][index]
                });
                console.log(type,error.response.data.errors[type][index])
                $validation_errors.push(error.response.data.errors[type][index])
            }
        }
    }
    return Promise.reject(error);
});


window.Helpers = new (class {
    appendValidationErrors(messages, vue = null) {
        var validation_errors = [];
        for (var key in messages.errors) {
            if (Array.isArray(messages.errors[key])) {
                for (var i = 0; i < messages.errors[key].length; i++) {
                    validation_errors.push(messages.errors[key][i]);
                    if (vue !== null) {
                        vue.errors.add({
                            field: key,
                            msg: messages.errors[key][i]
                        });
                    }
                }
            } else {
                validation_errors.push(messages.errors[key]);
            }
        }
        return validation_errors;
    }

    EncodeVar (array) {
        return JSON.stringify(array);
    }

    isJson(str) {
        try {
            JSON.parse(str);
        } catch (e) {
            return false;
        }
        return true;
    }

    DecodeVar (json) {
        if (this.isJson(json)) {
            return JSON.parse(json);
        } else {
            return {}; // return empty object to avoid erros
        }
    }

    VarByLang (json, language) {
        if (this.isJson(json)) {
            return this.DecodeVar(json)[language];
        } else {
            return json;
        }
    }


    uploadeFile(files,dir,route){
        return new Promise((res,rej)=>{
            let $data = new FormData();

            for(let x = 0; x<files.length;x++){
                $data.append("images[]", files[x]);
            }
            $data.append("dir",dir);

            axios.post(route, $data).then((succ) => {
                res(succ.data.link);
            }).catch(err=>{
                rej(err);
            });
        })
    }

})();
Vue.prototype.window = window;
Vue.prototype.currentLangauge = document.querySelector("html").lang;
Vue.prototype.helpers = window.Helpers;
Vue.prototype.UploadeRoute = document.head.querySelector('meta[name="uploade-route"]').content;






