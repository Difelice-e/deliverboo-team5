<template>
    <section id="restaurant-page">
        <template v-if="loading">
            <div class="restaurant-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="restaurant-wrapper d-flex">
                                <!-- cover ristorante  -->
                                <img
                                    src="https://picsum.photos/300/150"
                                    style="width: 200px"
                                    alt=""
                                />

                                <!-- info del ristorante  -->
                                <div class="restaurant-info">
                                    <h1>{{ user.business_name }}</h1>
                                    <ul class="restaurant-tipologies d-flex">
                                        <li
                                            v-for="tipology in user.tipologies"
                                            :key="tipology.id"
                                            class="bg-primary border border-secondary rounded-pill px-3 py-1"
                                        >
                                            {{ tipology.name }}
                                        </li>
                                    </ul>
                                    <p class="restaurant-contacts">
                                        {{ user.street_address }} -
                                        {{ user.phone_number }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="restaurant-body">
                <div class="container">
                    <div class="row align-items-start">
                        <!-- menu del ristorante  -->
                        <div class="col-8 p-3">
                            <div class="menu-wrapper">
                                <div class="row">
                                    <div
                                        v-for="dish in user.dishes"
                                        v-if="dish.visible"
                                        :key="dish.id"
                                        class="col-6 mb-3"
                                    >
                                        <div
                                            class="dish-wrapper d-flex justify-content-between p-3"
                                        >
                                            <div class="dish-info">
                                                <h4 class="dish-title mb-0">
                                                    {{ dish.name }}
                                                </h4>
                                                <p
                                                    class="dish-ingredients mb-1"
                                                >
                                                    {{ dish.ingredients }}
                                                </p>
                                                <span class="dish-price"
                                                    >{{
                                                        dish.price.toFixed(2)
                                                    }}€</span
                                                >
                                                <button
                                                    @click="
                                                        addToCart(dish, user)
                                                    "
                                                    class="btn btn-outline-success"
                                                >
                                                    Add to Cart
                                                </button>
                                            </div>

                                            <img
                                                src="https://picsum.photos/300/150"
                                                style="
                                                    width: 100px;
                                                    height: 100px;
                                                "
                                                alt=""
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- carrello  -->
                        <div class="col-4 p-3">
                            <CartDropdown />
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
    },
    beforeMount() {
        this.fetchRestaurant();
    },
};
</script>

<style lang="scss">
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
        // css del menu del ristorante
        .menu-wrapper {
            .dish-wrapper {
                min-height: 132px;
                gap: 8px;
                background-color: white;
                box-shadow: 3px 5px 6px 0px rgba(0, 0, 0, 0.27);

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
            background-color: white;
            padding: 20px;
            box-shadow: 3px 5px 6px 0px rgba(0, 0, 0, 0.27);
        }
    }
}
</style>
