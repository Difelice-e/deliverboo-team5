<template>
    <div>
        <!-- Button trigger modal -->
        

        <!-- Modal -->
        <div
            class="modal fade"
            :id="'modal'+dish.id"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title" id="exampleModalLabel">
                            {{ dish.name }}
                        </h1>
                        <button
                            type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- descrizione -->
                    <div v-if="this.sameRestaurants || $store.state.cartCount == 0" class="container mt-4">
                        <div class="row">
                            <figure class="col-12 col-md-6">
                                <img
                                    width="100%"
                                    height="100%"
                                    :src="dish.cover"
                                    style="border-radius: 30px"
                                    alt=""
                                />
                            </figure>
                            <div class="col-12 col-md-6">
                                <!-- ingerdienti -->
                                <div>
                                    <h4>Ingredienti</h4>
                                    <p>
                                        {{ dish.ingredients }}
                                    </p>
                                    <h4>Descrizione</h4>
                                    <p>
                                        {{ dish.description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div v-else>
                        <div class="row p-5">
                            <div class="col-12 col-md-6">
                                <h3>Stai cercando di ordinare da due ristoranti!</h3>
                                <p>Puoi effettuare un ordine da un solo ristorante per volta. Vuoi aggiungere questo piatto e creare un nuovo carrello o vuoi tornare indietro?</p>
                            </div>
                        </div>
                        
                    </div>
                    <div v-if="this.sameRestaurants || $store.state.cartCount == 0" class="modal-body">
                        <!-- bottone ordine -->
                        <button
                            type="button"
                            class="btn btn-success cursor-pointer ml-2 float-right"
                            data-dismiss="modal"
                            aria-label="Close"
                            @click="addToCart(dish)"
                        >
                            Aggiungi al carrello
                        </button>
                    </div>
                    <div v-else class="modal-body">
                        <!-- bottone ordine -->
                        <button
                            type="button"
                            class="btn btn-success cursor-pointer ml-2 float-right"
                            data-dismiss="modal"
                            aria-label="Close"
                            @click="addToCart(dish)"
                        >
                            Nuovo carrello
                        </button>
                        <button
                            type="button"
                            class="btn btn-danger ml-2 float-right"
                            data-dismiss="modal"
                            aria-label="Close"
                        >
                            Annulla
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        dish: {
            type: Object,
            require: true,
        },
        user: {
            type: Object,
            require: true,
        }
    },
    methods: {
        addToCart(dish) {
            this.$store.commit("addToCart", dish);
        },
    },
    computed: {
        sameRestaurants() {
            return this.$store.state.cart.find(product => product.user_id == this.dish.user_id)
            
        }
    }
    
};
</script>

<style lang="scss"></style>
