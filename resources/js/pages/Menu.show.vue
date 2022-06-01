<template>
    <div>
        <!-- {{ restaurant.name }} -->
    </div>
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
                .get(`api/menu/${this.$route.params.slug}`)
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
    beforeMount() {
        this.fetchRestaurant();
    },
};
</script>

<style lang="scss"></style>
