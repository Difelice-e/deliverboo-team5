<template>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">Cart ({{ $store.state.cartCount }})</button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <!-- carrello con items  -->
            <div v-if="$store.state.cart.length > 0">
                <a v-for="dish in $store.state.cart" :key="dish.id" class="navbar-item" href="">{{ dish.name }} x{{ dish.quantity }} - ${{ dish.totalPrice }}</a>

                <a class="navbar-item" href="">Total: ${{ totalPrice }}
                </a>

                <a class="dropdown-item" href="#">Checkout</a>
            </div>
            
            <!-- carrello vuoto  -->
            <div v-else>
                <a class="dropdown-item" href="#">Cart is empty</a>
            </div>
            
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style lang="scss" scoped>

</style>