<template>
        <div>
            <!-- carrello con items  -->
            <div v-if="$store.state.cart.length > 0" class="d-flex flex-column p-2 ">
                <p v-for="dish in $store.state.cart" :key="dish.id" class="navbar-item " href="">
                    <span class="removeBtn btn btn-danger rounded-pill p-1" title="Remove from cart" @click.prevent="removeFromCart(dish)">X</span>
                    {{ dish.name }} | <span class="btn btn-success p-1 rounded" @click.prevent="decreaseQuantity(dish)">-</span> x{{ dish.quantity }} <span class="btn btn-success p-1 rounded" @click.prevent="increaseQuantity(dish)">+</span> | €{{ dish.totalPrice.toFixed(2) }}  
                </p>

                <a class="navbar-item" href="">Total: €{{ totalPrice }}
                </a>

                <a class="dropdown-item" href="#">Checkout</a>
            </div>
            
            <!-- carrello vuoto  -->
            <div v-else>
                <a class="dropdown-item" href="#">Cart is empty</a>
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

</style>