import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Tipologies from "../pages/Tipologies.index.vue";
import Tipology from "../pages/Tipologies.show.vue";
import Restaurants from "../pages/Restaurant.index.vue";
import Restaurant from "../pages/Restaurant.show.vue";
import NotFound from "../pages/404.vue";

const routes = [
    {
        path: "/",
        name: "tipologies.index",
        component: Tipologies,
        meta: {
            title: "Glovo consegna a Milano. Ordina online ora: cibo, spesa, prodotti della parafarmacia, fiori e molto altro",
        },
    },
    {
        path: "/tipologies/:slug",
        name: "tipologies.show",
        component: Tipology,
        meta: {
            title: ":slug a domicilio a Milano | :slug vicino a te | Glovo",
        },
    },
    {
        path: "/restaurant",
        name: "restaurant.index",
        component: Restaurants,
    },
    {
        path: "/restaurant/:slug",
        name: "restaurant.show",
        component: Restaurant,
        meta: {
            title: "restaurant/:slug - Consegna a domicilio a Milano | Ordina online con Glovo",
        },
    },
    {
        path: "/*",
        name: "not-found",
        component: NotFound,
        meta: {
            title: "Erorre 404",
        },
    },
];

// istanza dell nostro route
const router = new VueRouter({
    mode: "history",

    routes: routes,
});

router.beforeEach((to, from, next) => {
    document.title = to.meta.title;

    next();
});

export default router;