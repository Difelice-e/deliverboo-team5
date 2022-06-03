<template>
    <div class="container">
        <h2 class="pb-4 text-center back-yellow title-rest">
            Ristoranti:  
            <span class="back-mark">
                <span class="tipology-rest for back-gl">{{ tipology.name }}</span>
            </span>
        </h2>
        <ul
            v-if="loading"
            class="d-flex flex-wrap justify-content-center gap-card"
        >
            <router-link
                tag="li"
                v-for="ristoratore in tipology.users"
                :key="ristoratore.id"
                class="cursor-pointer"
                :to="{
                    name: 'restaurant.show',
                    params: { slug: ristoratore.slug },
                }"
            >
                <div class="card">
                    <img
                        src="https://picsum.photos/300/150"
                        class="card-img-top"
                        alt=""
                    />
                    <div class="card-body">
                        <h5 class="card-title name-business text-left">
                            {{ ristoratore.business_name }}
                        </h5>

                        <p class="card-text address-name">
                            {{ ristoratore.street_address }}
                        </p>
                        <a href="#" class="btn bg-gl">Vedi Menù</a>
                    </div>
                </div>
            </router-link>
        </ul>
        <!-- rotella di caricamento -->
        <div
            class="d-flex flex-column justify-content-center align-items-center"
            v-else
        >
            <div class="lds-roller">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
            <p>Caricamento in corso...</p>
        </div>
    </div>
</template>

<script>
import axios from "axios";

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
                .get(`/api/home/${this.$route.params.slug}`)
                .then((res) => {
                    const { tipology } = res.data;
                    this.tipology = tipology;
                    console.log(this.tipology);
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

<style lang="scss">

.container ul {
    padding: 0;
}

.title-rest {
    font-weight: 700;
    font-size: 35px;
}

.bg-gl {
    background-color: #ffc244;
}

.name-business {
    font-size: 14px;
    font-weight: 700;
}

.address-name {
    font-size: 12px;
}

.back-mark {
    font-size: 18px;
    background-color: #ffc244;
    border-radius: 100px;
    padding: 0 3px;
}

.back-gl {
    font-size: 35px;
    line-height: 1.2;
    font-weight: 700;
}

</style>
