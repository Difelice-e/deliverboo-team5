<template>
    <div class="container my-5">
        <h2 class="pb-4 text-center back-yellow title-rest">
            Ristoranti:
            <span class="back-mark">
                <span class="tipology-rest for back-gl">{{
                    tipology.name
                }}</span>
            </span>
        </h2>
        <ul v-if="loading" class="d-flex flex-wrap justify-content-center list-wrapper">
            <router-link
                tag="li"
                v-for="ristoratore in tipology.users"
                :key="ristoratore.id"
                class="cursor-pointer list-item col-12 col-md-6 col-lg-4"
                :to="{
                    name: 'restaurant.show',
                    params: { slug: ristoratore.slug },
                }"
            >
                <div class="card card-t rounded-mid overflow-hidden">
                    <div class="overlay">
                        <img src="https://picsum.photos/300/150" class="card-img-top img-card" alt="" />
                    </div>
                    <div class="card-title d-flex align-items-center justify-content-center flex-column text-white">
                        <h5 class="name-business text-center">
                            {{ ristoratore.business_name }}
                        </h5>
                        <p class="tipologies-name badge badge-dark">
                            {{ tipology.name }}
                        </p>
                    </div>
                    <div class="bg-white d-flex justify-content-between mt-2 px-2">
                        <div>
                            <p>{{ vote[random()].rec}}%</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="d-flex mr-2">
                                <img src="https://res.cloudinary.com/glovoapp/image/fetch//q…ovoapp.com/images/glyphs/store-delivery-light.svg" alt="">
                                <p class="bg-gl">Gratis</p>
                            </div>
                            <div class="d-flex">
                                <p>. {{ vote[random()].temp1}} - </p>
                                <p>{{ vote[random()].temp}} min.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </router-link>
        </ul>
        <!-- rotella di caricamento -->
        <loadingWheel v-else />
    </div>
</template>

<script>
import axios from "axios";
import loadingWheel from "../components/loadingWheel.vue";

export default {
    data() {
        return {
            tipology: [],
            loading: false,
            vote: [
                { id: 1, temp: '30', temp1: '15', rec: '94'},
                { id: 2, temp: '25', temp1: '10', rec: '84'},
                { id: 3, temp: '20', temp1: '15', rec: '91'},
            ],
        };
    },
    components: {
        loadingWheel,
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
        random: function () {
            return Math.floor(Math.random()*3);
        },
    },
    beforeMount() {
        this.fetchPost();
    },
};
</script>

<style lang="scss" scoped>

.container ul {
    padding: 0;
}

ul {
    list-style: none;
}

.title-rest {
    font-weight: 700;
    font-size: 35px;
}

.list-wrapper {
    gap: 25px 0;
}

.rounded-mid {
    border-radius: 10px;
}

.card-title {
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.bg-gl {
    background-color: #ffc244;
    padding: 3px 4px;
    border-radius: 5px;
}

.overlay::after {
    content: '';
    display: block;
    background-color: rgba($color: #000000, $alpha: 0.3);
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
}

.tipologies-name {
    background-color: rgba($color: #000000, $alpha: 0.6);
    padding: 5px 10px;
    font-weight: 400;
}

.bg-gl {
    background-color: #ffc244;
}

.name-business {
    font-size: 21px;
    font-weight: 600;
    color: white;
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
