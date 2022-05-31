<template>
    <div>
        <div
            v-if="loading"
            class="py-40 d-flex flex-column justify-content-center align-items-center"
        >
            <p>{{ $route.params.slug }}</p>
        </div>
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

<style lang="scss"></style>
