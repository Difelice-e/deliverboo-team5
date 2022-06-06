<template>
        <div class="cart">
            <!-- carrello con items  -->
            <div v-if="$store.state.cart.length > 0" class="d-flex flex-column p-2 cart-wrapper">
                <div class="row mb-3">
                    <div class="col-1"></div>
                    <div class="col-5 font-weight-bold">Piatto</div>
                    <div class="col-3 font-weight-bold">Quantità</div>
                    <div class="col-3 font-weight-bold">Prezzo</div>
                </div>

                <div class="row mb-3" v-for="dish in $store.state.cart" :key="dish.id">
                    <div class="col-1"><span class="removeBtn btn btn-danger rounded-pill p-1" title="Remove from cart" @click.prevent="removeFromCart(dish)">X</span></div>
                    <div class="col-5">{{dish.name}}</div>
                    <div class="col-3 text-nowrap"><span class="btn btn-success p-1 rounded" @click.prevent="decreaseQuantity(dish)">-</span> x{{ dish.quantity }} <span class="btn btn-success p-1 rounded" @click.prevent="increaseQuantity(dish)">+</span></div>
                    <div class="col-3">€{{ dish.totalPrice.toFixed(2) }}</div>
                </div>

                <div class="row justify-content-end">
                    <div class="col offset-6 font-weight-bold">Totale:</div>
                    <div class="col-3 font-weight-bold">€{{ totalPrice }}</div>
                </div>

                <div class="col-12">
                    <a class="btn btn-primary" href="#">Vai al Checkout</a>
                </div>
            </div>
            
            <!-- carrello vuoto  -->
            <div v-else class="cart-wrapper">
                <p class="text-center" href="#">Carrello Vuoto!</p>
            </div>
            
        </div>
</template>

<script>
export default {
    methods: {
        removeFromCart(dish) {
            this.$store.commit('removeFromCart', dish);
        },
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
        }
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