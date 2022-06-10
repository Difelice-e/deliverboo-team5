<template>
    <section id="restaurant-page">
        <template class="position-relative" v-if="loading">
            <div class="restaurant-header">
                <div>
                    <div class="row">
                        <img class="blur-image" :src="user.cover" alt="" width="100%" height="260">
                    </div>
                </div>
            </div>

            <div class="restaurant-body">
                <div class="container position-relative position-menu">
                    <div class="row align-items-start">
                        <div class="col-12 col-xl-8">
                            <!-- info del ristorante  -->
                            <div class="restaurant-info container bg-white border-radius-gv">
                                <h1 class="title-restaurant">{{ user.business_name }}</h1>
                                <div class="d-flex align-items-center align-self-center info">

                                    <img width="30px" height="30px" src="https://res.cloudinary.com/glovoapp/w_40,h_40,f_auto,q_auto/filters/sorting/delivery_fee_light" alt="">
                                    <span class="cancel">2,50 &euro;</span>
                                    <p class="bg-gl font-gl gr-1 text-uppercase mt-3">Gratis</p>

                                    <img width="30px" height="30px" src="https://res.cloudinary.com/glovoapp/w_40,h_40,f_auto,q_auto/store_ratings/rating_regular.png" alt="">
                                    <span>{{ vote[random()].rec}}%</span>

                                </div>
                                <ul class="restaurant-tipologies d-flex p-0 info mt-2">
                                    <li
                                        v-for="tipology in user.tipologies"
                                        :key="tipology.id"
                                        class="p-1 bg-info text-white border border-info border-secondary rounded-pill"

                                    >
                                        {{ tipology.name }}
                                    </li>
                                </ul>
                                <p class="restaurant-contacts">
                                    {{ user.street_address }} -
                                    {{ user.phone_number }}
                                </p>
                            </div>
                            <!-- menu del ristorante  -->
                            <div class="col-12 px-0 pt-3">
                                <div class="menu-wrapper">
                                    <div class="row">

                                        <!-- singolo piatto  -->
                                        <div
                                            v-for="dish in user.dishes"
                                            :key="dish.id"
                                            class="col-12 col-xl-6 mb-3"
                                        >
                                            <div
                                                class="border-radius-gv dish-wrapper d-flex justify-content-between p-3"
                                            >
                                                <div class="dish-info col-12 d-flex p-1">
                                                    <div class="d-flex mb-2">
                                                        <figure class="border-radius">
                                                            <img
                                                                src="https://picsum.photos/300/150"
                                                                style="
                                                                    width: 80px;
                                                                    height: 80px;
                                                                "
                                                                class="rounded-lg"
                                                                alt=""
                                                            />
                                                        </figure>

                                                        <div class="px-3 flex-grow-1">
                                                            <h4 class="dish-title mb-1">
                                                                {{ dish.name }}
                                                            </h4>
                                                            <p
                                                                class="dish-ingredients mb-1"
                                                            >
                                                                {{ dish.ingredients }}
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <!-- Pulsante per aggiungere al carrello -->
                                                    <div class="d-flex col-12 justify-content-between">
                                                        <span class="dish-price">
                                                            {{ dish.price.toFixed(2) }} €
                                                        </span>

                                                        <figure
                                                            @click="
                                                                addToCart(
                                                                    dish,
                                                                    user
                                                                )
                                                            "
                                                            class="cursor-pointer ml-2"
                                                        >
                                                            <img src="https://res.cloudinary.com/glovoapp/image/fetch//q_auto/https://glovoapp.com/images/svg/plus-new.svg" alt="">
                                                        </figure>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- pop up aggiunta al carrello  -->
                                            <div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-xl-4" >
                            <!-- carrello  -->
                            <div class="col-12">
                                <CartDropdown />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>

        <!-- rotella di caricamento -->
        <loadingWheel v-else />
    </section>
</template>

<script>
import axios from "axios";
import CartDropdown from "../components/Cart.vue";
import loadingWheel from "../components/loadingWheel.vue";

export default {
    components: {
        CartDropdown,
        loadingWheel,
    },
    data() {
        return {
            user: null,
            loading: false,
            vote: [
                { id: 1, temp: '30', temp1: '15', rec: '94'},
                { id: 2, temp: '25', temp1: '10', rec: '84'},
                { id: 3, temp: '20', temp1: '15', rec: '91'},
                { id: 4, temp: '25', temp1: '15', rec: '93'},
                { id: 5, temp: '20', temp1: '15', rec: '100'},
            ],
        };
    },
    methods: {
        fetchRestaurant() {
            axios
                .get(`/api/restaurant/${this.$route.params.slug}`)
                .then((res) => {
                    // console.log(
                    //     "🚀 ~ file: Menu.show.vue ~ line 26 ~ .then ~ res",
                    //     res.data
                    // );
                    const { user } = res.data;
                    this.user = user;
                    console.log(this.user);

                    this.loading = true;
                })
                .catch((err) => {
                    console.warn(err);
                    this.$router.push("/404");
                });
        },
        addToCart(dish) {
            this.$store.commit("addToCart", dish);
        },
        random: function () {
            return Math.floor(Math.random()*5);
        },
    },
    beforeMount() {
        this.fetchRestaurant();
    },
};
</script>

<style lang="scss">

.blur-image {
    object-fit: cover;
    object-position: center;
    filter: brightness(40%);
}

#restaurant-page {
    // css delle info ristorante
    .restaurant-header {
        background-color: white;

        .restaurant-wrapper {
            background-color: white;
            padding: 16px 0;
            gap: 20px;

            .restaurant-tipologies {
                list-style: none;
                gap: 10px;
            }
        }
    }

    .restaurant-body {
        background-color: #e8ecec;
        padding: 50px 0;
        margin-top: -150px;

        // css del menu del ristorante
            .restaurant-info{
                box-shadow: 3px 5px 6px 0px rgba(0, 0, 0, 0.1);
                padding: 20px 35px;

                .title-restaurant{
                    font-size: 50px;
                    font-weight: 800;
                }
                .info {
                    gap: 10px;
                    list-style-type:none;
                }
                .cancel {
                    text-decoration: line-through;
                }
            }

            .dish-wrapper {
                min-height: 132px;
                gap: 8px;
                background-color: white;
                box-shadow: 3px 5px 6px 0px rgba(0, 0, 0, 0.1);

                .dish-info {
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;

                    .dish-ingredients {
                        font-size: 14px;
                        color: #868686;
                    }

                    .dish-title {
                        font-size: 19px;
                    }
                    .dish-price {
                        font-size: 15px;
                    }
                }
            }


        // css del carrello
        .cart-wrapper {
            background-color: white;
            padding: 20px;
            box-shadow: 3px 5px 6px 0px rgba(0, 0, 0, 0.1);
        }
    }
}
</style>
