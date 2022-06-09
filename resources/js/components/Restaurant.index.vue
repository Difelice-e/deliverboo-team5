<template>
    <div>
        <div class="restaurants-bg py-4">
            <div class="container">
                <div class="d-flex flex-column justify-content-center text-center">
                    <h1 class="mb-3 title-rest">Ricerca Ristorante</h1>
                    <h5 class="subtitle-rest">Seleziona una o più categorie disponibili:</h5>
                </div>

                <form class="form-inline w-100 d-flex justify-content-around">
                    <div class="form-group row">
                        <label class="col-form-label" for="category"></label>
                        <form
                            @submit.prevent="fetchRestaurant"
                            class="container my-bg-categories"
                        >
                            <ul class="filter py-3 d-flex flex-wrap justify-content-center">
                                <li
                                    v-for="tipology in tipologies"
                                    :key="tipology.id"
                                >
                                    <input
                                        class="mx-1"
                                        type="checkbox"
                                        v-model="tipologyFilter"
                                        @change="check($event)"
                                        :id="tipology.id"
                                        :name="tipology.id"
                                        :value="tipology.id"
                                    />
                                    <label :for="tipology.id">
                                        {{ tipology.name }} ({{ tipology.users.length }})
                                    </label>
                                </li>
                            </ul>
                        </form>
                    </div>
                </form>

                <div>

                    <ul
                        
                        class="d-flex flex-wrap justify-content-center list-wrapper pt-3"
                    >
                        <router-link
                            tag="li"
                            v-for="user in users"
                            :key="user.id"
                            :class="currentPage == 4 && users.length < 3?  'cursor-pointer list-item col-12 col-sm-12 col-md-6 col-xs-12' : 'cursor-pointer list-item col-12 col-md-6 col-lg-4' "
                            :to="{
                                name: 'restaurant.show',
                                params: { slug: user.slug },
                            }"
                        >
                            <div class="card card-t rounded-mid overflow-hidden">
                                <div class="overlay overflow-hidden">
                                    <img src="https://picsum.photos/300/150" class="card-img-top img-card" alt="" />
                                </div>
                                <div class="card-title d-flex align-items-center justify-content-center flex-column text-white">
                                    <h5 class="name-business text-center">
                                        {{ user.business_name }}
                                    </h5>
                                    <div class="d-flex flex-row tipologies-card flex-wrap justify-content-center align-items-center mb-2">
                                        <p v-for="el in user.tipologies" :key="el.id" class="tipologies-name badge badge-dark">
                                            {{ el.name }}
                                        </p>
                                    </div>
                                </div>
                                <div class="bg-white card-foot d-flex justify-content-between mt-2 px-2">
                                    <div class="d-flex">
                                        <img class="favicon pr-2" src="https://img.icons8.com/external-those-icons-lineal-those-icons/344/external-like-touch-gestures-those-icons-lineal-those-icons.png" alt="">
                                        <p>{{ vote[random()].rec}}%</p>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="d-flex mr-2">
                                            <img class="favicon fav-2" src="https://img.icons8.com/ios/344/scooter.png" alt="">
                                            <p class="bg-gl font-gl text-uppercase">Gratis</p>
                                        </div>
                                        <div class="d-flex temp-cl">
                                            <p>&middot; {{ vote[random()].temp1}} -&nbsp;</p>
                                            <p>{{ vote[random()].temp}} min.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </router-link>
                    </ul>

                    <div class="container pt-5">
                        <ul class="pagination flex justify-content-center align-items-center gap-4 items-center">
                            <li @click="fetchFiltered(tipologyFilter, n)" 
                            :class="currentPage === n ? 'bg-gl1' : 'bg-gl2'" 
                            class="d-flex justify-content-center align-items-center cursor-pointer rounded-circle pagination-button"
                            v-for="n in lastPage" :key="n">{{n}}</li>
                        </ul>
                    </div>
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
            lastPage: 0,
            currentPage: 1,
            tipologies: [],
            userTipologies: [],
            vote: [
                { id: 1, temp: '30', temp1: '15', rec: '94'},
                { id: 2, temp: '25', temp1: '10', rec: '85'},
                { id: 3, temp: '20', temp1: '15', rec: '91'},
                { id: 4, temp: '25', temp1: '15', rec: '93'},
                { id: 5, temp: '20', temp1: '15', rec: '100'},
            ],
        };
    },
    methods: {
        fetchRestaurant(page = 1) {
            axios
                .get("/api/restaurant", {
                    params: {
                        page
                    }
                })
                .then((res) => {
                    const { users } = res.data;
                    const {data, last_page, current_page} = users
                    this.users = data
                    this.currentPage = current_page
                    this.lastPage = last_page
                    console.log(this.users)
                })
                .catch((err) => {
                    console.warn(err);
                    this.$router.push("/404");
                });
        },

        fetchFiltered(tipology, page = 1) {
            axios
                .get("/api/restaurant", {
                    params: {
                        tipology: tipology,
                        page
                    }
                })
                .then((res) => {
                    const { users } = res.data;
                    const {data, last_page, current_page} = users
                    this.users = data
                    this.currentPage = current_page
                    this.lastPage = last_page
                    console.log(this.users)
                })
                .catch((err) => {
                    console.warn(err);
                    this.$router.push("/404");
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
        check(event) {
            if (event.target.checked){
                this.fetchFiltered(this.tipologyFilter, 1)
            } else if (this.tipologyFilter == ''){
                this.fetchRestaurant()
            }
        },
        random: function () {
            return Math.floor(Math.random()*5);
        },
    },
    created() {
        this.fetchTipologies();
        this.fetchRestaurant();
    },
    computed: {
        
    },
};
</script>

<style lang="scss" scoped>

.filter {
    display: flex;
    gap: 12px;
    list-style: none;
}

.tipologies-card {
    gap: 0 5px;
    padding: 0 10px 30px 10px;
}

.title-rest {
    font-weight: 800;
    font-size: 40px;
}

.pagination {
    gap: 20px;
}

.pagination-button {
    padding: 10px 15px;
}

.bg-gl1 {
    background-color: #ffc244;
}

.bg-gl2 {
    background-color: #faeac4;
}

</style>
