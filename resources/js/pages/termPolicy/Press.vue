<template>
    <section class="container-fluid p-0">
        <b-navbar type="dark" variant="success">
            <b-navbar-nav>
                <b-navbar-brand>
                    <router-link :to="{name: 'home'}">
                        <img src="/images/logo-white.png" class="nav-logo" alt="">
                    </router-link>
                </b-navbar-brand>

            </b-navbar-nav>

            <b-navbar-nav class="ml-auto">
                <b-nav-item :to="{name: 'apply'}">Careers</b-nav-item>
                <b-nav-item :to="{name: 'help'}">Help</b-nav-item>
                <b-nav-item :to="{name: 'apply'}" class="btn btn-outline-light btn-sm become-shopper p-0">Become a
                    Shopper
                </b-nav-item>
            </b-navbar-nav>
        </b-navbar>


        <div class="bg-success text-light text-center press-text">
            <h1>Press</h1>
        </div>

        <div class="text-center p-5">
            <h1 class="font-weight-bolder">Last Updated: July 21, 2019</h1>
            <h6 class="text-secondary">For press inquiries, partnerships, and other related matters, please contact
                us at wecare@basket.jo.</h6>
        </div>

        <b-jumbotron class="m-0 contact_us" text-variant="dark">
            <div class="row text-center">
                <div class="col-lg-11 d-inline text-center m-auto">
                    <div class="col-lg-3 col-md-12  p-5 d-inline-block">
                        <h5>Problem with an order?</h5>
                        <span class="text-secondary">Tell us what went wrong with a previous order and request a refund or redelivery.</span>
                        <hr class="my-4">
                        <button class="btn btn-success btn-sm">Report a problem</button>
                    </div>
                    <div class="col-lg-3 col-md-12 p-5 second-cont-item d-inline-block">
                        <h5>Email us</h5>
                        <span class="text-secondary">We're here to help. Email a Customer Happiness member.</span>
                        <hr class="my-4">
                        <button class="btn btn-success btn-sm">Email us</button>
                    </div>
                    <div class="col-lg-3 col-md-12 p-5 d-inline-block" style="line-height: 42px">
                        <h5>Call us</h5>
                        <span class="text-secondary">We're available 9:00 AM - 12:00 AM.</span>
                        <hr class="my-4">
                        <button class="btn btn-success btn-sm">+9622009944</button>
                    </div>
                </div>
            </div>
        </b-jumbotron>

        <section class="footer text-center">
                <ul class="footer_menu text-secondary font-weight-bold list-inline p-3 m-0">
                    <li class="list-inline-item btn btn-link">
                        <router-link :to="{name: 'home'}" class="text-secondary">Basket.jo</router-link>
                    </li>
                    <li class="list-inline-item btn btn-link">
                        <router-link :to="{name: 'apply'}" class="text-secondary">Carers</router-link>
                    </li>
                    <li class="list-inline-item btn btn-link">
                        <router-link :to="{name: 'privacy'}" class="text-secondary">Privacy</router-link>
                    </li>
                    <li class="list-inline-item btn btn-link">
                        <router-link :to="{name: 'terms'}" class="text-secondary">Terms</router-link>
                    </li>
                </ul>
        </section>
    </section>
</template>

<script>
    export default {
        name: "Press"
    }
</script>

<style scoped>
    .nav-logo {
        max-height: 5.5vh;
        height: 100%;
    }

    .become-shopper {
        border-radius: 10px;
        font-weight: 700;
    }

    .press-text {
        border-top: 1px solid #ffffff1a;
        min-height: 220px;
        padding-top: 30px;
    }

    .press-text h1 {
        font-weight: bolder;
        opacity: .9;
    }

    .contact_us {
        background-color: #eef5f4;
        border: solid #e3e2df !important;
        border-right: none !important;
        border-left: none !important;
    }

    .second-cont-item {
        line-height: 20px;
        display: inline-block;
        border: 5px solid #e3e2df;
        border-bottom: none;
        border-top: none;
    }
    .footer{
        word-spacing: 15px;
    }
</style>
