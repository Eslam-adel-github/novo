/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");

Vue.prototype.trans = (key) => {
    return _.get(window.trans, key, key);
};

/*
require('./plugins.js')

require('./components.js')

 */

require('./helpers.js')



