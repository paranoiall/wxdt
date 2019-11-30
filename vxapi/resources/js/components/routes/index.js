import Vue from 'vue';
import Router from "vue-router";
import Hello from "../Hello";
import Home from "../Home";

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: '/',
            component: Hello
        },
        {
            path: '/home',
            name: '/home',
            component: Home
        }
    ]
});
