<template>
    <div>
        <div class="restaurants-bg">
            <div class="container">
                <h1 class="mb-3">Ricerca Ristorante</h1>
                <h5>Seleziona una o più categorie disponibili:</h5>

                <form class="form-inline w-100 d-flex justify-content-around">
                    <div class="form-group row">
                        <label class="col-form-label" for="category"></label>
                        <form
                            @submit.prevent="fetchRestaurant"
                            class="container my-bg-categories"
                        >
                            <ul class="filter">
                                <li
                                    v-for="tipology in tipologies"
                                    :key="tipology.id"
                                >
                                    <input
                                        class="mx-1"
                                        type="checkbox"
                                        v-model="tipologyFilter"
                                        @click="checkTipologies"
                                        :id="tipology.name"
                                        :name="tipology.name"
                                        :value="tipology.name"
                                    />
                                    <label :for="tipology.name">
                                        {{ tipology.name }}
                                    </label>
                                </li>
                            </ul>
                        </form>
                    </div>
                </form>

                <div>
                    <!-- nessun ristorante trovato  -->
                    <div v-if="filteredRestaurants.length == 0">
                        <div>
                            <h2>Nessun ristorante trovato</h2>
                        </div>
                    </div>

                    <!-- ristoranti trovati  -->

                    <ul
                        v-else
                        class="d-flex flex-wrap justify-content-center gap-card"
                    >
                        <router-link
                            tag="li"
                            v-for="user in filteredUsers"
                            :key="user.id"
                            class="cursor-pointer"
                            :to="{
                                name: 'restaurant.show',
                                params: { slug: user.slug },
                            }"
                        >
                            <div class="card">
                                <img v-if="user.cover" :src="user.cover" class="card-img-top" alt="" />
                                <img v-else src="https://picsum.photos/300/150" style=" width: 200px; height: 100px;" alt="">
                                <div class="card-body">
                                    <h5 class="card-title name-business text-left">
                                        {{ user.business_name }}
                                    </h5>

                                    <p class="card-text address-name">
                                        {{ user.street_address }}
                                    </p>
                                    <a href="#" class="btn bg-gl">Vedi Menù</a>
                                </div>
                            </div>
                        </router-link>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            tipologyFilter: [],
            users: [],
            tipologies: [],
            filteredUsers: [],
            userTipologies: [],
        };
    },
    methods: {
        fetchRestaurant() {
            axios
                .get("/api/restaurant")
                .then((res) => {
                    const { users } = res.data;
                    this.users = users;
                    console.log(this.users)
                })
                .catch((err) => {
                    console.warn(err);
                    this.$router.push("/404");
                });
        },

        checkTipologiesContain(user) {
            let userTipologies = user.tipologies.map((t) => {
                return t.name;
            });
            return this.tipologyFilter.every((element) => {
                return userTipologies.includes(element);
            });
        },

        fetchTipologies() {
            axios
                .get("/api/home")
                .then((res) => {
                    const { tipologies } = res.data;

                    this.tipologies = tipologies;
                })
                .catch((err) => {
                    console.warn(err);
                    this.$router.push("/404");
                });
        },
        checkTipologies() {
            console.log(this.tipologyFilter);
        },
    },
    created() {
        this.fetchTipologies();
        this.fetchRestaurant();
    },
    computed: {
        filteredRestaurants() {
            if (!this.tipologyFilter.length) {
                return (this.filteredUsers = this.users);
            } else {
                this.filteredUsers = this.users.filter(
                    this.checkTipologiesContain
                );
                return this.filteredUsers;
            }

        },
    },
};
</script>

<style lang="scss" scoped>
.filter {
    display: flex;
    gap: 10px;
    list-style: none;
}
</style>
