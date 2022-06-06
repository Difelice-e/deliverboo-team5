<template>
    <div class="container">
        <div v-if="loading">
            <div class="d-flex flex-wrap justify-content-center my-4">
                <router-link
                    tag="button"
                    :to="{ name: 'restaurant.index' }"
                    class="btn btn-danger"
                >
                    vedi tutti i tipi di ristoranti
                </router-link>
            </div>

            <div>
                <ul class="d-flex flex-wrap justify-content-center gap-card">
                    <router-link
                        tag="li"
                        :to="{
                            name: 'tipologies.show',
                            params: { slug: tipology.slug },
                        }"
                        v-for="tipology in tipologies"
                        :key="tipology.id"
                        class="cursor-pointer"
                    >
                        <div class="card">
                            <img
                                src="https://picsum.photos/300/150"
                                class="card-img-top card-gv"
                                alt=""
                            />
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    {{ tipology.name }}
                                </h5>
                            </div>
                        </div>
                    </router-link>
                </ul>
            </div>
        </div>
        <!-- rotella di caricamento -->
        <loadingWheel v-else />
    </div>
</template>

<script>
import axios from "axios";
import loadingWheel from "../components/loadingWheel.vue";

export default {
    data() {
        return {
            tipologies: [],
            loading: false,
        };
    },
    components: {
        loadingWheel,
    },
    methods: {
        fetchTipologies() {
            axios
                .get("/api/home")
                .then((res) => {
                    const { tipologies } = res.data;
                    this.tipologies = tipologies;

                    this.loading = true;
                })
                .catch((err) => {
                    console.warn(err);
                    this.$router.push("/404");
                });
        },
    },
    mounted() {
        this.fetchTipologies();
    },
};
</script>

<style lang="scss">
.gap-card {
    gap: 50px;
    list-style-type: none;

    .card-gv:nth-child(even) {
        border-radius: 54% 46% 77% 23% / 30% 63% 37% 70%;
    }

    .cursor-pointer {
        cursor: pointer;
    }
}
</style>
