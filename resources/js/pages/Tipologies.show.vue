<template>
    <div>
        <ul
            v-if="loading"
            class="d-flex justify-content-center align-items-center flex-wrap gap-card"
        >
            <li v-for="ristoratore in tipology.users" :key="ristoratore.id">
                <div class="card">
                    <img
                        :src="ristoratore.cover"
                        class="card-img-top"
                        alt="..."
                    />
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ ristoratore.business_name }}
                        </h5>
                        <p class="card-text">{{ ristoratore.street_address }}</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </li>
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
    methods: {
        fetchPost() {
            axios
                .get(`/api/home/${this.$route.params.slug}`)
                .then((res) => {
                    const { tipology } = res.data;
                    this.tipology = tipology;

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

<style lang="scss"></style>
