<template>
    <div class="container">
        <div class="row d-flex flex-wrap justify-content-center">
            <!-- checkbox tipologia -->
            <div class="pluto col-1 d-flex align-content-start flex-wrap">
                <div
                    class=""
                    v-for="checkboxTipology in tipology"
                    :key="checkboxTipology.id"
                >
                    <input
                        type="checkbox"
                        :id="checkboxTipology.slug"
                        :value="checkboxTipology.slug"
                        v-model="filterTipology"
                        class="form-check-input"
                    />
                    <label
                        class="form-check-label"
                        :for="checkboxTipology.slug"
                        >{{ checkboxTipology.name }}</label
                    >
                </div>
            </div>

            <!-- card ristoranti -->
            <div class="pippo col-11">
                <ul class="d-flex flex-wrap justify-content-center gap-card">
                    <router-link
                        tag="li"
                        :to="{
                            name: 'tipologies.show',
                            params: { slug: user.slug },
                        }"
                        v-for="user in users"
                        :key="user.id"
                        class="cursor-pointer col-12 col-sm-6 col-md-3"
                        :class="[
                                filterTipology == 0
                                    ? 'd-block'
                                    : filterTipology === checkboxTipology.slug
                                    ? 'd-block'
                                    : 'd-none'
                            ]"
                    >
                        <div class="card">
                            <img
                                src="https://picsum.photos/300/150"
                                class="card-img-top"
                                alt=""
                            />
                            <div class="card-body">
                                <h5 class="card-title text-center">
                                    {{ user.business_name }}
                                </h5>
                                <p>
                                    {{ filterTipology }}
                                </p>
                                <!-- Tag tipologie -->
                                <ul>
                                    <li
                                        v-for="tag in user.tipologies"
                                        :key="tag.id"
                                        class="badge badge-pill badge-warning mr-2 p-2"
                                    >
                                        {{ tag.name }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </router-link>
                </ul>
            </div>
        </div>
        <!-- checkbox tipologie-->
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            filterTipology: [],
            users: [],
            tipology: [],
            loading: false,
        };
    },
    methods: {
        fetchRestaurants() {
            axios
                .get("/api/restaurant")
                .then((res) => {
                    const { users } = res.data;

                    this.users = users;
                })
                .catch((err) => {
                    console.warn(err);
                    this.$router.push("/restaurants/404");
                });
        },
        fetchTipologies() {
            axios
                .get("/api/home")
                .then((res) => {
                    const { tipologies } = res.data;

                    this.tipology = tipologies;
                })
                .catch((err) => {
                    console.warn(err);
                    this.$router.push("/tipologies/404");
                });
        },
    },
    mounted() {
        this.fetchRestaurants();
        this.fetchTipologies();
    },
};
</script>

<style lang="scss">
.gap-card {
    list-style-type: none;

    .cursor-pointer {
        cursor: pointer;
    }
}
</style>
