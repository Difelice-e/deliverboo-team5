<template>
    <div>
      <ul>
        <li v-for="tipology in tipologies" :key="tipology.id">
          {{tipology.name}}
        </li>
      </ul>
    </div>
</template>

<script>
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
                });
        },
    },
    mounted() {
        this.fetchTipologies();
    },
};
</script>

<style lang="scss"></style>
