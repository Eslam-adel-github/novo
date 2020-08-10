// Vue Quill Editor Like "CKEDITOR"
import VueQuillEditor from 'vue-quill-editor'

// require styles
import 'quill/dist/quill.core.css'
import 'quill/dist/quill.snow.css'
import 'quill/dist/quill.bubble.css'

Vue.use(VueQuillEditor);

// Vee Validate
import VeeValidate, { Validator } from "vee-validate";

import ar from "vee-validate/dist/locale/ar";

Vue.use(VeeValidate);

if (document.querySelector("html").lang == "ar") {
    // Localize takes the locale object as the second argument (optional) and merges it.
    Validator.localize("ar", ar);
}

import VueGlobalVar from "vue-global-var";

Vue.use(VueGlobalVar, {
    globals: {
        $languages: ['ar', 'en'],
        $leadSelect2SearchSettings: {
            placeholder: 'Leads',
            minimumInputLength: 3,
            ajax: {
                url: document.head.querySelector('meta[name="app-url"]').content + '/get-leads',
                method: 'GET',
                processResults: (data) => {
                    return {
                        results: data.payload
                    };
                }
            }
        }
    },
});

// Vue JS Tree
import VJstree from "vue-jstree";
Vue.component("VJstree", VJstree);

// Global registration
import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
Vue.use(VueFormWizard)
/*
import * as VueGoogleMaps from "vue2-google-maps";
Vue.use(VueGoogleMaps, {
    load: {
      key: process.env.MIX_GOOGLE_MAP_ID,
      libraries: "places"
    }
});

 */
