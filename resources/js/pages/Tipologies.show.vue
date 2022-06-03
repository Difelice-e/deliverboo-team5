<template>
    <div class="container">
        <h2 class="pb-4 text-center back-yellow title-rest">
            Ristoranti: <span class="tipology-rest">{{ tipology.name }}</span>
        </h2>
        <ul
            v-if="loading"
            class="d-flex flex-wrap justify-content-center gap-card"
        >
            <router-link
                tag="li"
                v-for="ristoratore in tipology.users"
                :key="ristoratore.id"
                class="cursor-pointer"
                :to="{
                    name: 'restaurant.show',
                    params: { slug: ristoratore.slug },
                }"
            >
                <div class="card">
                    <img
                        src="https://picsum.photos/300/150"
                        class="card-img-top"
                        alt=""
                    />
                    <div class="card-body">
                        <h5 class="card-title text-center">
                            {{ ristoratore.business_name }}
                        </h5>

                        <p class="card-text">
                            {{ ristoratore.street_address }}
                        </p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </router-link>
        </ul>
        <!-- rotella di caricamento -->
        <div
            class="d-flex flex-column justify-content-center align-items-center"
            v-else
        >
            <div class="lds-roller">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <p>Caricamento in corso...</p>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            tipology: [],
            loading: false,
        };
    },
    mounted() {
        console.log(this.$route);
        console.log(this.tipology);
    },
    methods: {
        fetchPost() {
            axios
                .get(`/api/home/${this.$route.params.slug}`)
                .then((res) => {
                    console.log(
                        "🚀 then ~ res",
                        res.data
                    );
                    const { tipology } = res.data;
                    this.tipology = tipology;
                    console.log(this.tipology);
                    // questa funzione serve per il caricamento completo della pagina
                    this.loading = true;
                })
                .catch((err) => {
                    console.warn(err);
                    this.$router.push("/404");
                });
        },
    },
    beforeMount() {
        this.fetchPost();
    },
};
</script>

<style lang="scss">
.container ul {
    padding: 0;
}

.title-rest {
    font-weight: 700;
    font-size: 35px;
}
</style>
