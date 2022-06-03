<template>
    <div class="container">
        <div>
            <router-link
                tag="button"
                :to="{ name: 'restaurant.index' }"
                class="btn btn-danger"
                >Tutti i tipi di ristorante</router-link
            >
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
                            class="card-img-top"
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
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            tipologies: [],
        };
    },
    methods: {
        fetchTipologies() {
            axios
                .get("/api/home")
                .then((res) => {
                    const { tipologies } = res.data;

                    this.tipologies = tipologies;
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

    .cursor-pointer {
        cursor: pointer;
    }
}
</style>
