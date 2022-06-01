<template>
    <div>{{ $route.params.slug }}</div>
</template>

<script>
export default {
    data() {
        return {
            restaurant: [],
            loading: false,
        };
    },
    methods: {
        fetchRestaurant() {
            axios
                .get(`/api/restaurant/${this.$route.params.slug}`)
                .then((res) => {
                    const { restaurant } = res.data;
                    this.restaurant = restaurant;
                    console.log(this.restaurant);

                    this.loading = true;
                })
                .catch((err) => {
                    console.warn(err);
                });
        },
    },
    fetchRestaurant() {
        this.fetchPost();
    },
};
</script>

<style lang="scss"></style>
