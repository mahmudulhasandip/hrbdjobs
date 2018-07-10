require('./bootstrap');

import Vue from 'vue';
// window.Vue = require('vue').default;


let Jobsidebar = require('./components/Jobsidebar.vue')
const app = new Vue({
	el: 'app',
	components: {Jobsidebar}
})
