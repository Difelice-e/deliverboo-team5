<template>
    <div>
        {{ user.business_name }}
        <ul>
            <li v-for="dish in user.dishes" :key="dish.id">{{dish.name}}</li>
        </ul>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            user: null,
            loading: false,
        };
    },
    methods: {
        fetchRestaurant() {
            axios
                .get(`/api/restaurant/${this.$route.params.slug}`)
                .then((res) => {
                    console.log(
                        "🚀 ~ file: Menu.show.vue ~ line 26 ~ .then ~ res",
                        res.data
                    );
                    const { user } = res.data;
                    this.user = user;
                    console.log(this.user);

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
