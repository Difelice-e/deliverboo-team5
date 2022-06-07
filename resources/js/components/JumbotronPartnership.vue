<template>
    <div>
        <svg
            id="wave"
            style="transform: rotate(0deg); transition: 0.3s"
            viewBox="0 0 1440 100"
            version="1.1"
            xmlns="http://www.w3.org/2000/svg"
        >
            <defs>
                <linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0">
                    <stop
                        stop-color="rgba(198, 232, 228, 1)"
                        offset="0%"
                    ></stop>
                    <stop
                        stop-color="rgba(198, 232, 228, 1)"
                        offset="100%"
                    ></stop>
                </linearGradient>
            </defs>
            <path
                style="transform: translate(0, 0px); opacity: 1"
                fill="url(#sw-gradient-0)"
                d="M0,30L26.7,35C53.3,40,107,50,160,51.7C213.3,53,267,47,320,36.7C373.3,27,427,13,480,6.7C533.3,0,587,0,640,11.7C693.3,23,747,47,800,56.7C853.3,67,907,63,960,65C1013.3,67,1067,73,1120,65C1173.3,57,1227,33,1280,25C1333.3,17,1387,23,1440,33.3C1493.3,43,1547,57,1600,61.7C1653.3,67,1707,63,1760,66.7C1813.3,70,1867,80,1920,70C1973.3,60,2027,30,2080,21.7C2133.3,13,2187,27,2240,35C2293.3,43,2347,47,2400,41.7C2453.3,37,2507,23,2560,30C2613.3,37,2667,63,2720,75C2773.3,87,2827,83,2880,81.7C2933.3,80,2987,80,3040,73.3C3093.3,67,3147,53,3200,55C3253.3,57,3307,73,3360,68.3C3413.3,63,3467,37,3520,28.3C3573.3,20,3627,30,3680,36.7C3733.3,43,3787,47,3813,48.3L3840,50L3840,100L3813.3,100C3786.7,100,3733,100,3680,100C3626.7,100,3573,100,3520,100C3466.7,100,3413,100,3360,100C3306.7,100,3253,100,3200,100C3146.7,100,3093,100,3040,100C2986.7,100,2933,100,2880,100C2826.7,100,2773,100,2720,100C2666.7,100,2613,100,2560,100C2506.7,100,2453,100,2400,100C2346.7,100,2293,100,2240,100C2186.7,100,2133,100,2080,100C2026.7,100,1973,100,1920,100C1866.7,100,1813,100,1760,100C1706.7,100,1653,100,1600,100C1546.7,100,1493,100,1440,100C1386.7,100,1333,100,1280,100C1226.7,100,1173,100,1120,100C1066.7,100,1013,100,960,100C906.7,100,853,100,800,100C746.7,100,693,100,640,100C586.7,100,533,100,480,100C426.7,100,373,100,320,100C266.7,100,213,100,160,100C106.7,100,53,100,27,100L0,100Z"
            ></path>
        </svg>
        <div class="container-fluid bg-greed py-5 px-0">
            <div class="container container-jb-pt">
                <figure class="d-flex logo-jb-pt justify-content-center">
                    <img
                        src="https://res.cloudinary.com/glovoapp/image/fetch//w_121,h_82,c_fit,q_auto/https://glovoapp.com/images/corporate/together.svg"
                        alt=""
                    />
                </figure>
                <h1 class="text-center text-balck font-weight-bold mb-5">
                    Uniamo le forze
                </h1>
                <div>
                    <ul
                        class="row d-flex p-0 flex-wrap justify-content-around gap-jb"
                    >
                        <li
                            class="col-4 d-flex align-items-center flex-column cursor-pointer"
                            v-for="(el, index) in jumboPartnership"
                            :key="index"
                        >
                            <figure>
                                <img :src="el.cover" alt="" />
                            </figure>
                            <h3 class="text-center font-weight-bold">
                                {{ el.title }}
                            </h3>
                            <p class="text-center">{{ el.description }}</p>
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
            jumboPartnership: [
                {
                    title: "Diventa un rider",
                    description:
                        "Diventa il capo di te stesso! Goditi flessibilità, libertà e guadagni competitivi effettuando consegne con Glovo.",
                    cover: "https://res.cloudinary.com/glovoapp/image/fetch//w_254,h_220,c_fit,f_auto,q_auto:best/dpr_auto/https://glovoapp.com/images/corporate/rider-image.png",
                },
                {
                    title: "Diventa partner",
                    description:
                        "Cresci con Glovo! La nostra tecnologia e la nostra base di utenti possono aiutarti a incrementare le vendite e aprire nuove opportunità!",
                    cover: "https://res.cloudinary.com/glovoapp/image/fetch//w_254,h_220,c_fit,f_auto,q_auto:best/dpr_auto/https://glovoapp.com/images/corporate/partners-image.png",
                },
                {
                    title: "Lavora con noi",
                    description:
                        "Pronto per una nuova ed entusiasmante sfida? Se sei ambizioso, umile e ami lavorare con gli altri, mettiti in contatto con noi!",
                    cover: "https://res.cloudinary.com/glovoapp/image/fetch//w_254,h_220,c_fit,f_auto,q_auto:best/dpr_auto/https://glovoapp.com/images/corporate/carrers-image.png",
                },
            ],
        };
    },
};
</script>

<style lang="scss"></style>
