<template>
    <section id="restaurant-page">
        <div class="container">
            <div class="row align-items-start">
                <!-- info ristorante + menù   -->
                <div class="col-9 p-3">
                    <div class="row">
                        <!-- spazio informazioni ristorante  -->
                        <div class="col-12 mb-5">
                            <div class="restaurant-wrapper d-flex">

                                <!-- cover ristorante  -->
                                <img src="https://picsum.photos/300/150" style="width:200px" alt="">

                                <!-- info del ristorante  -->
                                <div class="restaurant-info">
                                    <h1>{{user.business_name}}</h1>
                                    <ul class="restaurant-tipologies d-flex">
                                        <li v-for="tipology in user.tipologies" class="bg-primary border border-secondary rounded-pill px-3 py-1">{{tipology.name}}</li>
                                    </ul>
                                    <p class="restaurant-contacts">{{user.street_address}} - {{user.phone_number}}</p>
                                </div>
                            </div>
                        </div>

                        <!-- menu del ristorante  -->
                        <div class="col-12">
                            <div class="menu-wrapper">
                                <div class="row">
                                    <div v-for="dish in user.dishes" class="col-6">
                                        <div class="dish-wrapper d-flex justify-content-between bg-secondary p-3">
                                            <div class="dish-info">
                                                <h4 class="dish-title mb-0">{{dish.name}}</h4>
                                                <p class="dish-ingredients mb-1">{{dish.ingredients}}</p>
                                                <span class="dish-price">{{dish.price.toFixed(2)}}€</span>
                                            </div>

                                            <img src="https://picsum.photos/300/150" style="width:100px; height:100px" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- carrello  -->
                <div class="col-3 p-3">
                    <!-- wrapper carrello  -->
                    <div class="cart-wrapper">

                        <!-- header carrello  -->
                        <div class="cart-header">
                            <h4 class="cart-title text-center">Il tuo carrello</h4>
                        </div>

                        <!-- body del carrello  -->
                        <div class="cart-body">
                            <p class="cart-empty text-center">Il tuo carrello è vuoto</p>
                        </div>

                        <div class="cart-footer">
                            <p class="cart-total text-center">Tot: 0€</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                });
        },
    },
    beforeMount() {
        this.fetchRestaurant();
    },
};
</script>

<style lang="scss">
    #restaurant-page {
        // css delle info ristorante 
        .restaurant-wrapper {
            border: 1px solid black;
            border-radius: 25px;
            padding: 20px;
            gap: 20px;

            .restaurant-tipologies {
                list-style: none;
                gap: 10px;
            }
        }

        // css del menu del ristorante 
        .menu-wrapper {
            border: 1px solid black;
            border-radius: 25px;
            padding: 20px;

            .dish-wrapper {
                height: 132px;
                gap: 8px;
                border-radius: 25px;

                .dish-info {
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;

                    .dish-title {
                        font-size: 18px;
                    }
                }
            }
        }

        // css del carrello 
        .cart-wrapper {
            border: 1px solid black;
            border-radius: 25px;
            padding: 20px;
        }
    }
</style>
