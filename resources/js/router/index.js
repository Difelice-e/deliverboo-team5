import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

import Tipologies from "../pages/Tipologies.index.vue";

const routes = [
    {
        path: "",
        name: "Tipologies.index",
        component: Tipologies,
    },
];

// istanza dell nostro route
const router = new VueRouter({
    //con mode: "history" serve per visualizzare i nostri percorsi nel URL
    mode: "history",

    // Stiamo passando l'array "const routes = [];"
    routes: routes,
});
export default router;