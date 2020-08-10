// Registering Custom Components
Vue.component('form-group-input-text', require('./Components/inputs/FormGroupTextComponent.vue').default);
Vue.component('form-group-input-select', require('./Components/inputs/FormGroupSelectComponent.vue').default);
Vue.component('form-group-input-date', require('./Components/inputs/FormGroupDateComponent.vue').default);
Vue.component('form-group-input-number', require('./Components/inputs/FormGroupNumberComponent.vue').default);
Vue.component('form-group-input-general', require('./Components/inputs/FormGroupGeneralComponent.vue').default);
Vue.component('form-group-textarea', require('./Components/inputs/FormGroupTextareaComponent.vue').default);
Vue.component('form-group-input-tags', require('./Components/inputs/FormGroupTagsComponent.vue').default);
Vue.component('form-group-input-tags2', require('./Components/inputs/FormGroupTags2Component.vue').default);

Vue.component('input-component', require('./Components/inputs/InputComponent.vue').default);
/*
Vue.component('google-map', require('./Components/GoogleMap.vue').default);

 */

// import Select2Component
import Select2 from './Components/Select2.vue';
Vue.component('Select2', Select2);

// Vue Js Date Picker
import DatePick from './Components/DatePicker/vueDatePick.vue';
Vue.component("date-pick", DatePick);

//chart js
import Chart from 'chart.js';
Vue.component('draw_chart', require('./Components/Chart').default);



// import VoerroTagsInput from '@voerro/vue-tagsinput';
// Vue.component('tags-input', VoerroTagsInput);
