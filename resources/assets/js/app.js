
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('form-component', require('./components/FromComponent.vue'));
Vue.component('timeline-component', require('./components/TimelineComponent.vue'));
Vue.component('follow-component', require('./components/FollowComponent.vue'));
Vue.component('user-avatar', require('./components/AvatarComponent.vue'));
const app = new Vue({
    el: '#app'
});
