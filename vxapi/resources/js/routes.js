import Vue from 'vue';
import Router from "vue-router";
import Home from "./components/Home";
import question from "./components/question";
import result from "./components/result";
import setting from "./components/setting";

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/',
            name: '/',
            component: Home
        },
        {
            path: '/question',
            name: '/question',
            component: question
        },
        {
            path: '/result',
            name: '/result',
            component: result
        },
        {
            path: '/setting',
            name: '/setting',
            component: setting
        }
    ]
});
