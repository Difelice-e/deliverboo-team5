import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

//! importare il nostro componente //esempio
// import Posts from "../pages/Posts.index.vue";
// import Post from "../pages/Posts.show.vue";
// import Contact from "../pages/Contact.vue";
// import NotFound from "../pages/404.vue";

const routes = [
  // Organizzazione dentro alla cartella "js" creiamo una cartella "Pages" dove inseriremo tutti i nostri componenti delle rotte
  {
    // Qua dentro definiamo le nostre rotte
    path: '/posts', // con "path" e contiene il nostro percorso delle rotte dovremmo collegarci un componente
    name: "posts.index", // possiamo dare un nome alle nostre rotte
    component: Posts, // Ci andiamo a importare il nostro componente //! "import Posts from "../pages/Posts.index.vue";"
  },
  {
    // Questa invece una rotta dinamica Con "Vue" invece di usare le graffe{} usiamo i duepunti: e poi nome del parametro ":nomePparametro" (serve per recuperare il post con lo slug corrispondente) es.
    path: "/posts/:slug",
    name: "posts.show",
    component: Post,
  },
  {
    path: "/contact",
    name: "contact",
    component: Contact,
  },
  {
    // Questa rotta ci prenderà tutte le rotte E mostrarci una pagina d'errore che abbiamo creato con "Vue"
    path: "/*",
    name: "not-found",
    component: NotFound,
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