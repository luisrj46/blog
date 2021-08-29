import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [{
            path: '/',
            name: 'home',
            component: require('./views/Home').default
        },
        {
            path: '/nosotros',
            name: 'about',
            component: require('./views/About').default
        },
        {
            path: '/archivos',
            name: 'archive',
            component: require('./views/Archive').default
        },
        {
            path: '/contacto',
            name: 'contact',
            component: require('./views/Contact').default
        },
        {
            path: '/posts/:url',
            name: 'post_show',
            component: require('./views/PostsShow').default,
            props: true //esta propiedad nos permite utilizar los parametros que se pasan por la url en el componente importandolo en sus propiedades
        }, {
            path: '/category/:category',
            name: 'category_post',
            component: require('./views/CategoryPost').default,
            props: true //esta propiedad nos permite utilizar los parametros que se pasan por la url en el componente importandolo en sus propiedades
        }, {
            path: '/tags/:tag',
            name: 'tag_post',
            component: require('./views/TagsPost').default,
            props: true //esta propiedad nos permite utilizar los parametros que se pasan por la url en el componente importandolo en sus propiedades

        }, {
            path: '*',
            component: require('./views/404').default
        },
    ],
    mode: 'history',

    linkExactActiveClass: 'active',
    scrollBehavior() {
        return { x: 0, y: 0 }
    },
    // scrollBehavior() {
    //     return { x: 0, y: 0 }
    // }
});