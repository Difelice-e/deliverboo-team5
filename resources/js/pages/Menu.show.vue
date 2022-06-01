<template>
    <div>
        {{ $route.params.slug }}
        <!-- {{ dishes.email }} -->
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
                    console.log(
                        "🚀 ~ file: Menu.show.vue ~ line 26 ~ .then ~ res",
                        res.data
                    );
                    const { users } = res.data;
                    this.dishes = users;
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
