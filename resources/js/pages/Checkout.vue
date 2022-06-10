<template>
    <div class="container">
        <form @submit.prevent="handleSubmit(sendForm())" method="POST" class="py-5">
            <div>
                <label for="customer_name">Nome e Cognome</label>
                <input v-model="form.customer_name" type="text" id="customer_name" name="customer_name">
            </div>

            <div>
                <label for="customer_address">Indirizzo</label>
                <input v-model="form.street_address" type="text" id="customer_address" name="customer_address">
            </div>

            <div>
                <label for="customer_email">Email</label>
                <input v-model="form.customer_email" type="text" id="customer_email" name="customer_email">
            </div>

            <div>
                <label for="customer_telephone">Cellulare</label>
                <input v-model="form.customer_phone" type="text" id="customer_telephone" name="customer_telephone">
            </div>
        </form>

        <button @click="sendForm()" type="submit">
            <a href="/checkout">Vai al Pagamento</a>
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

<style lang="scss" scoped>
</style>