<template>
    <section class="container-fluid heroes_page " :style="bg_image">
        <nav class="navbar navbar-light bg-light">
            <div class="col-md-3">
                <a href="/">
                    <img src="/images/logo-normal.png" class="color_logo">
                </a>
            </div>
            <div class="navigation right">
                <router-link :to="{ name: 'login' }" class="btn btn-warning btn-sm">Log In</router-link>
            </div>
        </nav>
        <div class="jumbotron col-md-6 col-sm-11 offset-3 bg-warning">
            <h3 class="display-5 text-center">
                Thank you for submitting your form. You will be contacted soon.
            </h3>
        </div>
    </section>
</template>

<script>
    export default {
        name: "ThankYou",
        data(){
            return{
                bg_image: {'background-image': 'url(/images/heroes_background.jpg)'},
            }
        }
    }
</script>

<style scoped>
    .heroes_page {
        min-height:100vh;
        background-size: cover;
        height: 100%;
        background-position: top;
        background-repeat: no-repeat;
        padding: 0;
    }
    .color_logo{
        height: 2rem;
    }
    .btn-warning{
        font-size: 13px;
        color: #fff;
        padding: 2px 10px;
    }
    .jumbotron{
        color: white;
        margin-top: 20%;
        font-family: 'Open Sans', sans-serif
    }
</style>
