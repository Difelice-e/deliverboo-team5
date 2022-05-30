<template>
    <div class="container">
        <div class="row pb-4">
            <div class="col-12 text-center">
                <h2 class="title-tipology font-weight-bold">Categorie</h2>
            </div>
        </div>
        <ul class="row d-flex justify-content-center align-items-center tipology-list d-flex flex-wrap">
            <li v-for="tipology in tipologies" :key="tipology.id" class="badge badge-pill badge-color tipologies col-4 col-md-3 col-lg-2">
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

<style lang="scss">

.tipology-list {
    list-style: none;
    gap: 20px;
    padding: 0;
}

.title-tipology {
    font-size: 40px;
}

.badge-color {
    background-color: #fff3da;
}

.badge-pill {
    padding: 15px 60px;
}

.tipologies {
    font-weight: 600;
    font-size: 15px;
}

.tipologies:hover {
    background-color: #ffc244;
    cursor: pointer;
}

</style>
