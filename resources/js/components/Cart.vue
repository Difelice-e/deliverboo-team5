<template>
        <div class="cart">
            <!-- carrello con items  -->
            <div v-if="$store.state.cart.length > 0" class="d-flex flex-column p-2 cart-wrapper border-radius-gv">
                <!-- <div class="row mb-3">
                    <div class="col-1"></div>
                    <div class="col-5 font-weight-bold">Piatto</div>
                    <div class="col-3 font-weight-bold">Quantità</div>
                    <div class="col-3 font-weight-bold">Prezzo</div>
                </div> -->

                <div class="row mb-3" v-for="dish in $store.state.cart" :key="dish.id">
                    <!-- <div class="col-1">
                        <span class="removeBtn btn btn-danger rounded-pill p-1" title="Remove from cart" @click.prevent="removeFromCart(dish)">X</span>
                    </div> -->

                    <!-- <div class="col-5">{{dish.name}}</div> -->

                    <div class="col-12 text-nowrap d-flex justify-content-between" style="gap: 10px;">

                        <span class="weight-bold">{{ dish.quantity }}x</span>
                        <span  >{{dish.name}}</span>
                        <span>€{{ totalPrice }}</span>

                    </div>

                    <div class="col-12 d-flex justify-content-between">
                        <figure class="cursor-pointer" @click.prevent="decreaseQuantity(dish)">
                            <img width="30px" height="30px" src="https://res.cloudinary.com/glovoapp/image/fetch//q_auto/https://glovoapp.com/images/svg/minus.svg" alt="">
                        </figure>
                        <figure class="cursor-pointer" @click.prevent="increaseQuantity(dish)">
                            <img width="30px" height="30px" src="https://res.cloudinary.com/glovoapp/image/fetch//q_auto/https://glovoapp.com/images/svg/plus.svg" alt="">
                        </figure>
                    </div>
                    <!-- <div class="col-3">€{{ dish.totalPrice.toFixed(2) }}</div> -->
                </div>

                <!-- <div class="row justify-content-end">
                    <div class="col offset-6 font-weight-bold">Totale:</div>
                    <div class="col-3 font-weight-bold">€{{ totalPrice }}</div>
                </div> -->

                <div class="col-12">
                    <a class=" col-12 rounded-pill btn bg-greedgc text-white weight-bold"  style="font-size: 20px;" href="#">Ordinane {{ $store.state.cartCount }} a €{{ totalPrice }}</a>
                </div>
            </div>

            <!-- carrello vuoto  -->
            <div v-else class="cart-wrapper text-center border-radius-gv">
                <h1>Il tuo glovo</h1>
                <figure class="my-5">
                    <img src="https://res.cloudinary.com/glovoapp/image/fetch//q_auto/https://glovoapp.com/images/svg/astronaut-grey-scale.svg" alt="">
                </figure>
                <p class="text-center " style="font-size: 17px;" href="#">Non hai ancora aggiunto alcun prodotto. Quando lo farai, compariranno qui!</p>
            </div>

        </div>
</template>

<script>
export default {
    methods: {
        // removeFromCart(dish) {
        //     this.$store.commit('removeFromCart', dish);
        // },
        increaseQuantity(dish) {
            this.$store.commit('addToCart', dish);
        },
        decreaseQuantity(dish) {
            this.$store.commit('decreaseQuantity', dish);
        },
    },
    computed: {
        totalPrice() {
            let total = 0;

            for (let dish of this.$store.state.cart) {

                total += dish.totalPrice;
            }

            return total.toFixed(2);
        },

    }
}
</script>

<style lang="scss" scoped>
.cart {
    min-width: 350px;
}
.cart-wrapper {
    background-color: white;
    padding: 20px;
    box-shadow: 3px 5px 6px 0px rgba(0,0,0,0.27);

    table {
        table-layout: auto;
        tbody {
            td {
                max-width: 80px;

                &:first-child {
                    max-width: 20px;
                }
            }
        }
    }
}
</style>