import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Tipologies from "../pages/Tipologies.index.vue";
import Tipology from "../pages/Tipologies.show.vue";
import Restaurant from "../pages/Restaurant.show.vue";
import NotFound from "../pages/404.vue";

const routes = [
    {
        path: "/",
        name: "tipologies.index",
        component: Tipologies,
    },
    {
        path: "/:slug",
        name: "tipologies.show",
        component: Tipology,
    },
    // {
    //     path: "/restaurant",
    //     name: "restaurant.index",
    //     component: Restaurants,
    // },
    {
        path: "/restaurant/:slug",
        name: "restaurant.show",
        component: Restaurant,
    },
    {
        path: "/*",
        name: "not-found",
        component: NotFound,
    },
];

// istanza dell nostro route
const router = new VueRouter({
    mode: "history",

    routes: routes,
});
export default router;