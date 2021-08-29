require('./bootstrap');


import Vue from 'vue';

import router from './routes';
// window.Vue = require('vue');

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('tareas', require('./components/TareasComponent.vue').default);

// require('vue2-animate/dist/vue2-animate.min.css')
Vue.component('post-header', require('./components/PostHeader').default);
Vue.component('nav-bar', require('./components/NavBar').default);
Vue.component('post-list', require('./components/PostList').default);
Vue.component('posts-list-item', require('./components/PostsListItem').default);
Vue.component('category-link', require('./components/CategoryLink').default);
Vue.component('post-link', require('./components/PostLink').default);
Vue.component('disqus-comment', require('./components/DisqusComment').default);
Vue.component('paginator', require('./components/Paginator').default);
Vue.component('pagination-link', require('./components/PaginationsLink').default);
Vue.component('social-link', require('./components/socialLinks').default);
Vue.component('tags-link', require('./components/TagLink').default);
Vue.component('form-contact', require('./components/FormContact').default);

const app = new Vue({
    el: '#app',
    router

});