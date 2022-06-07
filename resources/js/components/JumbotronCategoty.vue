<template>
    <div>
        <div class="container-fluid d-flex justify-content-center bg-goldGv p-0">
            <div class="container-jumbo py-5">
                <p class="text-center font-size-jb">
                    Consegne in <span class="font-weight-bold">Milano</span>
                </p>
                <div>
                    <ul class="d-flex flex-wrap justify-content-around p-0 gap-jb">
                        <li
                            class="bg-white px-4 py-1 rounded-circle d-flex align-items-center flex-column cursor-pointer"
                            v-for="(el, index) in jumbo"
                            :key="index"
                        >
                            <figure class="m-0">
                                <img :src="el.cover" alt="" />
                            </figure>
                            <p
                                class="text-center font-weight-bold"
                                style="font-size: 10px"
                            >
                                {{ el.text }}
                            </p>
                        </li>
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
            jumbo: [
                {
                    text: "Farmacia",
                    cover: "https://res.cloudinary.com/glovoapp/w_60,h_60,c_fit,f_auto,q_auto:best/StoreCategories/hmeje6y6iwevjeiff1e2",
                },
                {
                    text: "Supermercato",
                    cover: "https://res.cloudinary.com/glovoapp/w_60,h_60,c_fit,f_auto,q_auto:best/StoreCategories/grxz3wznsdtxzoimy6yl",
                },
                {
                    text: "Spedizioni",
                    cover: "https://res.cloudinary.com/glovoapp/w_60,h_60,c_fit,f_auto,q_auto:best/StoreCategories/yn87iqomg2p9h5bwpssz",
                },
                {
                    text: "shopping",
                    cover: "https://res.cloudinary.com/glovoapp/w_60,h_60,c_fit,f_auto,q_auto:best/StoreCategories/hmeje6y6iwevjeiff1e2",
                },
                {
                    text: "Cibo",
                    cover: "https://res.cloudinary.com/glovoapp/w_60,h_60,c_fit,f_auto,q_auto:best/StoreCategories/prj0mlcuvmymzfh8pqjz",
                },
            ],
        };
    },
};
</script>

<style lang="scss"></style>
