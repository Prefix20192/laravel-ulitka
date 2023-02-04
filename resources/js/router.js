import vueRouter from 'vue-router';
import Vue from 'vue';

Vue.use(vueRouter);

import Index from './views/cars.vue';
import Car from "./views/car.vue";

const routes = [
    {
        path: "/",
        component:Index
    },
    {
        path: "/cars/:id",
        component:Car
    }
];

export  default  new vueRouter({
   mode: "history",
   routes: routes
});
