<template>
    <div class="container d-flex justify-content-center align-items-center flex-column py-5">
        <h1 class="text-center">Aggiungi il tuo nome e la tua Email e un indirizzo di consegna</h1>
        <form @submit.prevent="handleSubmit(sendForm())" method="POST" class="py-5 col-6 rounded ">
            <div class="d-flex justify-content-center align-items-center flex-column flex-lg-row my-3">
                <label class="mb-0 p-0 col-12 col-lg-2" for="customer_name">Nome e Cognome:</label>
                <input class="col-12 col-lg-10 ml-0 ml-lg-2 p-1" placeholder="Mario Rossi" v-model="form.customer_name" type="text" id="customer_name" name="customer_name">
            </div>

            <div class="d-flex justify-content-center align-items-center flex-column flex-lg-row my-3">
                <label class="mb-0 p-0 col-12 col-lg-2" for="customer_address">Indirizzo:</label>
                <input  class=" col-12 col-lg-10 ml-0 ml-lg-2 p-1" placeholder="Via Cavour, 12" v-model="form.street_address" type="text" id="customer_address" name="customer_address">
            </div>

            <div class="d-flex justify-content-center align-items-center flex-column flex-lg-row my-3">
                <label class="mb-0 p-0 col-12 col-lg-2 " for="customer_email">Email:</label>
                <input class=" col-12 col-lg-10 ml-0 ml-lg-2 p-1" placeholder="mariorossi88@gmail.com" v-model="form.customer_email" type="text" id="customer_email" name="customer_email">
            </div>

            <div class="d-flex justify-content-center align-items-center flex-column flex-lg-row my-3">
                <label class="mb-0 p-0 col-12 col-lg-2" for="customer_telephone">Cellulare:</label>
                <input class="col-12 col-lg-10 ml-0 ml-lg-2 p-1" placeholder="3285647385" v-model="form.customer_phone" type="text" id="customer_telephone" name="customer_telephone">
            </div>
        </form>

        <button class=" col-4 rounded-pill btn bg-greedgc" style="font-size: 20px;" @click="sendForm()" type="submit">
            <a class="text-white weight-bold" href="/checkout">Vai al Pagamento</a>
        </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                customer_name: '',
                street_address: '',
                customer_email: '',
                customer_phone: '',
            },
            localCart: JSON.parse(localStorage.getItem('cart')),
        }
    },
    methods: {
        sendForm() {
            axios.post('/api/orders', {
                form: this.form,
                total: localStorage.getItem('cartTotal'),
                userId: this.localCart[0].user_id,
            }, )
            .then( res => {
                res = JSON.parse(res.config.data),
                console.log(res)
            })
            this.$store.state.cart = []
            this.$store.state.cartCount = 0
            this.$store.state.cartTotal = 0
            this.$store.commit('saveCart')
        },
        onSubmit() {
            this.sendForm();
        }
    },
    mounted() {
            console.log(this.form, localStorage.getItem('cartTotal'), this.localCart[0].user_id)
    }
}
</script>

<style lang="scss">
input[type=text] {
    background-color: transparent;
    transition: border-bottom 0.4s ease-in-out;
    border: none;
    border-bottom: 2px solid gray;
}

input[type=text]:focus {
    outline: none;
    border-bottom: 2px solid #00a080;
}

</style>