<template>
    <div class="container">
        <div v-for="tipology in tipologies" :key="tipology.id">
            <input
                type="checkbox"
                :id="tipology.slug"
                :name="tipology.slug"
                :value="tipology.slug"
                class="form-check-input"
            />
            <label class="form-check-label" :for="tipology.slug">{{ tipology.name }}</label>
        </div>
        <div>
            <ul>
                <li v-for="el in restaurants" :key="el.id">
                    {{ el.business_name }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            restaurants: [],
            tipologies: [],
            loading: false,
        };
    },
    methods: {
        fetchRestaurants() {
            axios
                .get("/api/restaurant")
                .then((res) => {
                    const { restaurants } = res.data;
                    this.restaurants = restaurants;

                })
                .catch((err) => {
                    console.warn(err);
                });
        },
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
        this.fetchRestaurants();
        this.fetchTipologies();
    },
};
</script>

<style lang="scss"></style>
