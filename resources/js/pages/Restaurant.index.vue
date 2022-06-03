<template>
    <div class="container">
        <div v-for="element in propsTipology" :key="element.id">
            <input type="checkbox"  :id="element" :name="element" :value="element"
            class="form-check-input">
            <label
                class="form-check-label"
                :for="element"
                >{{ element }}</label
            >
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
    props: {
        propsTipology: {
            type: Object,
            require: true,
        },
    },
    data() {
        return {
            restaurants: [],
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

                    this.loading = true;
                })
                .catch((err) => {
                    console.warn(err);
                });
        },
    },
    mounted() {
        this.fetchRestaurants();
    },
};
</script>

<style lang="scss"></style>
