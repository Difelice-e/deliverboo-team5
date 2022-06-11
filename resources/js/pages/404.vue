<template>
    <div class="py-40 d-flex flex-column justify-content-center align-items-center">
        <!-- <img src="logo" alt=""> -->
        <h1>404</h1>
        <p>Pagina non trovata</p>
         <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                           <button class=" btn-home btn  rounded-pill">
                                 <a href="/">Torna alla Home</a>
                           </button>
                        </div>

                    </div>
                </div>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>


   .btn-home{
         background-color: #ffc14492;
            color:rgba(0, 0, 0, 0.58);
            font-weight: 700;
            text-decoration: none;
            margin-bottom: 50px;
      &:hover{
         background-color: #ffc244 ;
            color:black;
        }
        a{
            text-decoration: none;
            color:currentColor;
        }
    }
</style>