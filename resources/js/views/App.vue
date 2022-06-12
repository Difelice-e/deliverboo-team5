<template>
  <div class="app overflow-hidden">
    <header>
      <nav
        class="
          navbar navbar-expand-md navbar-light
          bg-goldGv
          shadow-sm
          position-relative
          box-shadow-none
        "
      >
        <div class="container">
          <a class="navbar-brand" href="/">
            <img src="images/logo-deliverboo.png" width="150" class="d-inline-block align-top" alt="">
          </a>

          <!-- {{-- searchbar no admin  --}} -->

          <form class="form-inline col-4 position-relative">
            <button class="btn-nav-searchGv my-2 my-sm-0" type="submit">
              <lord-icon
                src="https://cdn.lordicon.com/pvbutfdk.json"
                trigger="loop-on-hover"
                style="width: 25px; height: 25px"
              >
              </lord-icon>
            </button>

            <!-- searchbar  -->
            <input  class="form-control  font-size  col-12   text-center  rounded-pill  mr-sm-2  pl-5"  
            type="search"  placeholder="Cerca Ristoranti..."  aria-label="Search"  v-model="searchbarFilter"/>
            
            <!-- risultati  -->
            <div id="result" class="filtered-restaurant" :class="searchbarFilter === '' ? '' : 'active'" @click="closeSearchbar()">
              <template v-if="filteredRestaurant[0]">
                  <router-link v-for="(restaurant, i) in filteredRestaurant" v-if="i < 15" class="single-collection" :to="{
                                name: 'restaurant.show',
                                params: { slug: restaurant.slug },
                            }">
                    
                      
                        <!-- img collezione  -->
                        <figure class="restaurant-logo">
                            <img :src="restaurant.cover" width='90' height='90' class="collection-logo" alt="restaurant-logo">
                        </figure>

                        <!-- info collezione  -->
                        <div class="collection">
                            <span class="collection-name">{{restaurant.business_name}}</span> 
                        </div>
                      
                    
                        
                    
                </router-link>
              </template>
              
              <template v-else>
                  <div class="no-result">
                      <h3>No result for this name or address</h3>
                  </div>
              </template>

              
              
          </div>
          </form>

          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
          >
            <span class="navbar-toggler-icon"></span>
          </button>

          <div
            class="collapse navbar-collapse flex-grow-0"
            id="navbarSupportedContent"
          >
            <!-- Right Side Of Navbar || Pulsanti attenzione -->

            <ul class="navbar-nav  align-items-end align-items-md-center ml-auto">
              <li class="dropdown dropdow-toggle btn-nav-register nav-item mr-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false"
              >
                <a
                  class="
                    my-2
                    nav-link
                    mx-md-1
                    px-2
                    p-md-1
                    text-center
                    font-weight-bold
                    text-balck
                  "
                >
                  Cart ({{ $store.state.cartCount }})
                </a>


              <div class="dropdown-menu dropdown-wrapper" aria-labelledby="dropdownMenuButton">
                <CartDropdown :isCheckout="false"/>
              </div>
              </li>
              <!-- Authentication Links -->

              <li class="nav-item btn-nav-register my-2 mx-md-1 px-2 p-md-1">
                <a
                  class="nav-link text-center font-weight-bold text-balck"
                  href="/login"
                  >Login</a
                >
              </li>

              <li class="nav-item btn-nav-register my-2 mx-md-1 px-2 p-md-1">
                <a
                  class="nav-link text-center font-weight-bold text-balck"
                  href="/register"
                  >Register</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <router-view></router-view>
    </main>

    <footer class="bg-darkGrayGv text-white">
      <div class="container py-5">
        <div class="row pb-5">
          <!-- {{-- logo  --}} -->
          <a href="/">
            <img
              src="images/logo-deliverboo.png"
              width="150"
              class="d-inline-block align-top"
              alt=""
            />
          </a>
        </div>
        <div class="row pb-5">
          <div class="col-12 col-sm-6 col-md-3">
            <ul class="list-footer">
              <li>Uniamo le forze</li>
              <li><a href="#">Lavora con noi</a></li>
              <li><a href="#">Glovo con i partner</a></li>
              <li><a href="#">Corrieri</a></li>
              <li><a href="#">Glovo Business</a></li>
            </ul>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <ul class="list-footer">
              <li>Link di interesse</li>
              <li><a href="#">Chi siamo</a></li>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Contattaci</a></li>
              <li><a href="#">Sicurezza</a></li>
            </ul>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <ul class="list-footer">
              <li>Seguici</li>
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Instagram</a></li>
            </ul>
          </div>
          <div class="col-12 col-sm-6 col-md-3 d-flex flex-column justify-content-between">
            <div class="store cursor-pointer">
              <img src="https://res.cloudinary.com/glovoapp/image/fetch//w_105,h_35,c_fit,q_auto/https://glovoapp.com/images/app_store/download-button-new.svg" alt="">
              <img class="py-3" src="https://res.cloudinary.com/glovoapp/image/fetch//w_112,h_35,c_fit,q_auto/https://glovoapp.com/images/google_play/download-button-new.svg" alt="">
            </div>
            <ul class="text-uppercase">
              <li><a href="#">Termini e condizioni</a></li>
              <li><a href="#">Politica sulla privacy</a></li>
              <li><a href="#">Politica sui cookie</a></li>
            </ul>
          </div>
        </div>
        <div class="row pb-5">
          <div class="col-12">
            <h4 class="title-list">I brand piu richiesti</h4>
            <ul class="d-flex g-3 brand-list pt-3">
              <li class="pr-4"><a href="#">McDonald's</a></li>
              <li class="pr-4"><a href="#">Burger King</a></li>
              <li class="pr-4"><a href="#">KFC</a></li>
              <li><a href="#">Carrefour</a></li>
            </ul>
          </div>
        </div>
        <div class="row pb-5">
          <div class="col-12">
            <h4 class="title-list">Categorie più richieste</h4>
            <ul class="d-flex brand-list pt-3">
              <li class="pr-4"><a href="#">Hamburger</a></li>
              <li class="pr-4"><a href="#">Pizza</a></li>
              <li><a href="#">Sushi</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <select
              name=""
              id=""
              class="custom-select bg-darkGrayGv text-white py-2 px-2"
            >
              <option value="">Italiano</option>
              <option value="">Inglese</option>
            </select>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import CartDropdown from "../components/cartCheckout.vue";
export default {
  components: {
    CartDropdown,
  },
  data() {
    return {
      users: [],
      searchbarFilter: '',
    }
  },
  methods: {
    fetchRestaurant() {
      axios
        .get("/api/home")
        .then((res) => {
            const { users } = res.data;
            this.users = users
            console.log(this.users)
        })
        .catch((err) => {
            console.warn(err);
            this.$router.push("/404");
        });
    },
    closeSearchbar() {
      this.searchbarFilter = ''
      
      if(this.$route.path == '/restaurant/:slug') {
        this.$router.go()
      }
      
    }
  },
  mounted() {
    this.fetchRestaurant()

  },
  computed: {
    filteredRestaurant: function() {
      return this.users.filter(el => {
          if (el.business_name) {
              return el.business_name.toLowerCase().includes(this.searchbarFilter.toLowerCase())
          }
      })
    }
},

};
</script>

<style lang="scss" scoped>
.dropdown-wrapper {
  background-color: transparent;
  border: none;
}

a {
  text-decoration: none;
  color: currentColor;
}

.filtered-restaurant {
    position: absolute;
    top: 120%;
    left: 10px;
    width: 96%;
    max-height: 800px;
    overflow: auto;
    background-color:lightgrey;
    border: 1px solid rgba(255, 255, 255, 0.2);
    display: none;
    z-index: 999;
    box-shadow: 5px 5px 9px 1px rgba(0,0,0,0.63);
}

.filtered-restaurant.active {
    display: block;
}

.restaurant-logo {
  border: 2px solid orange;
  border-radius: 20px;
  overflow: hidden;
  margin: 0;
}

.page-link {
  padding: 0;
  margin: 0;
}


.single-collection {
    display: flex;
    gap: 8px;
    align-items: center;
    text-align: left;
    font-size: 1rem;
    // padding: 5px 5px;
  
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.collection-name {
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.single-collection:nth-child(odd) {
    background-color: rgb(152, 152, 152);
}

.single-collection:nth-child(even) {
    background-color: rgb(176, 176, 176);
}

.single-collection:hover {
    background-color: orange;
}

.no-result {
    min-height: 300px;
    padding: 0 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: lightgrey;
    font-size: 1.5rem;
}
</style>
