<template>
        <div class="cart">
            <!-- carrello con items  -->
            <div v-if="$store.state.cart.length > 0" class="d-flex flex-column p-2 cart-wrapper border-radius-gv">

                <div class="row mb-3" v-for="dish in $store.state.cart" :key="dish.id">
                    <div class="col-12 text-center mb-5">
                        <h4>Il tuo Deliverboo</h4>
                        <span>Spendi {{minOrder}}€ per evitare le spese di consegna!</span>
                    </div>

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
                </div>

                
                <div class="col-12 mb-3">
                    <span v-if="deliveryFees != 0">spese di consegna: {{ deliveryFees}}€</span> 
                    <span v-else>Stai risparmiando 2.50€ di spedizione!</span>
                    <div class="progress-bar-wrapper">
                        <div class="progress-bar" :style="{width: this.totalPrice*100/this.minOrder + '%'}"></div>
                    </div>
                </div>

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
    data() {
        return {
            // spesa di ordine minimo 
            minOrder: 10,
        }
    },
    methods: {
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
        deliveryFees() {
            let deliveryFee = 2.50
            if (this.totalPrice >= this.minOrder) {
                deliveryFee = 0;
            } else {
                deliveryFee = 2.50;
            }
            return deliveryFee.toFixed(2);
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

    .progress-bar-wrapper {
        width: 100%;
        height: 8px;
        border-radius: 999px;
        box-shadow: 3px 5px 6px 0px rgba(0,0,0,0.27);
        overflow: hidden;

        .progress-bar {
            border-radius: 999px;
            background-color: green;
            height: 100%;
        }
    }
}
</style>