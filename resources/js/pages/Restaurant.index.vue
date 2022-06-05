<template>
    <div class="restaurants-bg ">
        <div class="container">
            <h1 class="mb-3">Ricerca ristoratori</h1>
            <h5>Seleziona una o più categorie disponibili:</h5>
            
                <form class="form-inline w-100 d-flex justify-content-around">
                    <div class="form-group row">
                        <label class="col-form-label" for="category"></label>
                        <form @submit.prevent="fetchRestaurant" class="container my-bg-categories">
                            <ul class="filter">
                            
                                <li v-for="tipology in tipologies" :key="tipology.id">
                                    <input class="mx-1" type="checkbox" v-model="tipologyFilter" @click="checkTipologies" :id="tipology.name" :name="tipology.name" :value="tipology.name">
                                    <label :for="tipology.name">
                                        {{tipology.name}}
                                    </label>
                                </li>
                                        
                            </ul>
                        </form>
                    </div>
                </form>

            <div>
                <button @click="filteredRestaurants" class="btn my-2 my-sm-0 btn-danger ms_btn-restaurants" type="submit">Cerca</button>
            </div>
            
            <div> 
                <!-- nessun ristorante trovato  -->
                <div v-if="users.length == 0">
                    <div>
                        <h2>Nessun ristorante trovato</h2>
                    </div> 
                </div>

                <!-- ristoranti trovati  -->
                <div v-else v-for="user in users" :key="user.id">
                    {{user.business_name}}
                    <div class="bg-success" v-for="tipology in user.tipologies">{{tipology.name}}</div>
                </div>       
            </div>
            
        </div>
        
    </div>
</template>

<script>
export default {
    data (){
        return {
            risultato: false,
            tipologyFilter: [],
            users: [],
            tipologies:[]
        }
    },
    methods:{
       
        fetchRestaurant() {
            axios
                .get("/api/restaurant")
                .then((res) => {
                    const { users } = res.data;
                    this.users = users;
                })
                .catch((err) => {
                    console.warn(err);
                    this.$router.push("/404");
                });
                
        },
        filteredRestaurants() {
            let filteredUser = this.users.filter(user => user.tipologies[0].name.includes('Bar'))
            this.users = filteredUser
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
            console.log(this.tipologyFilter)
        }
    },
    created(){
        this.fetchTipologies();
        this.fetchRestaurant();
    }
   
  }
</script>

<style lang="scss" scoped>
.filter {
    display: flex;
    gap: 10px;
    list-style: none;
}

</style>