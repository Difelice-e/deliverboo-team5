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
                    <div class="container mt-4">
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
                    <div class="modal-body">
                        <!-- bottone ordine -->
                        <button
                            type="button"
                            class="btn btn-success cursor-pointer ml-2 float-right"
                            @click="addToCart(dish)"
                        >
                            Aggiungi al carrello
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    // data() {
    //     //
    // },
    props: {
        dish: {
            type: Object,
            require: true,
        },
    },
    methods: {
        addToCart(dish) {
            this.$store.commit("addToCart", dish);
        },
    },
};
</script>

<style lang="scss"></style>
