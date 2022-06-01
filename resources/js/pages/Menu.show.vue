<template>
    <div>{{$route.params.slug}}</div>
</template>

<script>
export default {
    data() {
        return {
            tipology: [],
            loading: false,
        };
    },
    methods: {
        fetchPost() {
            axios
                .get(`/api/restaurant/${this.$route.params.slug}`)
                .then((res) => {
                    const { tipology } = res.data;
                    this.tipology = tipology;

                    // questa funzione serve per il caricamento completo della pagina
                    this.loading = true;
                })
                .catch((err) => {
                    console.warn(err);
                    this.$router.push("/404");
                });
        },
    },
    beforeMount() {
        this.fetchPost();
    },
};
</script>

<style lang="scss"></style>
