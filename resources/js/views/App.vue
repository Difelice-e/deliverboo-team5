<template>
  <div class="app">
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
          <!-- {{-- logo  --}} -->
          <a class="navbar-brand" href="#">
            <img
              src="/docs/4.0/assets/brand/bootstrap-solid.svg"
              width="30"
              height="30"
              class="d-inline-block align-top"
              alt=""
            />
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
            <input
              class="
                form-control
                font-size
                col-12
                text-center
                rounded-pill
                mr-sm-2
                pl-5
              "
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
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
              <li
                class="dropdown btn-nav-register nav-item"
                type="button"
                id="dropdownMenuButton"
                data-toggle="dropdown"
                aria-expanded="false"
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

                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <CartDropdown />
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
          <div class="col-12">
            <img
              src="/docs/4.0/assets/brand/bootstrap-solid.svg"
              width="30"
              height="30"
              class="d-inline-block align-top"
              alt=""
            />
          </div>
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
          <div class="col-12 col-sm-6 col-md-3">
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
import CartDropdown from "../components/Cart.vue";
export default {
  components: {
    CartDropdown,
  },
};
</script>

<style lang="scss" scoped></style>
