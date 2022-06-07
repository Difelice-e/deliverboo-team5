<template>
    <div>
        <div v-if="loading">

            <!-- jumbotron category -->
            <JumbotronCategoty />

            <div class="container">
                <div class="d-flex flex-wrap justify-content-center my-4">
                    <Restaurant />
                </div>

                <div>
                    <ul class="d-flex flex-wrap justify-content-around py-5 px-0 gap-jb" style="list-style-type:none;">

                        <!-- pill tipology con props-->
                        <pillCategory v-for="tipology in tipologies" :key="tipology.id" :tipology="tipology"/>

                    </ul>
                </div>
            </div>

            <!-- Jumbotron partnership -->
            <JumbotronPartnership />

        </div>
        <!-- rotella di caricamento -->
        <loadingWheel v-else />
    </div>
</template>

<script>
import axios from "axios";
import JumbotronCategoty from "../components/JumbotronCategoty.vue";
import Restaurant from "../components/Restaurant.index.vue";
import pillCategory from "../components/pillCategory.vue";
import JumbotronPartnership from "../components/JumbotronPartnership.vue";
import loadingWheel from "../components/loadingWheel.vue";

export default {
    components: {
        JumbotronCategoty,
        Restaurant,
        pillCategory,
        JumbotronPartnership,
        loadingWheel,
    },
    data() {
        return {
            tipologies: [],
            loading: false,
        };
    },
    methods: {
        // pill tipology
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

        //restaurant
    },
    mounted() {
        this.fetchTipologies();
    },
};
</script>

<style lang="scss"></style>
