<template>
    <div>
        {{ $route.params.slug }}
        <!-- <ul>
            <li v-for="el in dishes.dishes" :key="el.id"></li>
        </ul> -->
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            dishes: [],
            loading: false,
        };
    },
    methods: {
        fetchRestaurant() {
            axios
                .get(`api/restaurant/${this.$route.params.slug}`)
                .then((res) => {
                    console.log(this.res.data);
                    const { dishes } = res.data;
                    this.dishes = dishes;
                    console.log(this.dishes);

                    this.loading = true;
                })
                .catch((err) => {
                    console.warn(err);
                });
        },
    },
    beforeMount() {
        this.fetchRestaurant();
    },
};
</script>

<style lang="scss"></style>
