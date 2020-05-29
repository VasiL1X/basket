<template>
    <section class="store_list">
        <div class="container-fluid d-inline-block p-0">
            <div class="error-head">
                <img src="https://cdn.basket.jo/assets/front/basket/new_design/images/footer_logo_new.png" class="logo error-head_logo"
                     alt="">
            </div>
            <div class="four_not_error mt-5">
                <img src="https://www.dev-basket.com/assets/front/basket/new_design/images/image-500.png" class="rounded-circle image-404" alt="500">

                <div class="error-inner">
                    <h1>Pour-Oh-Pour, that page doesn't exist!</h1>
                    <p>You can
                        <router-link :to="{ name: 'home' }"  data-bypass="true">return to our home page,
                        </router-link>,
                        or
                        <a href="mailto:wecare@basket.jo">send us an email</a> if you can't find what you're looking for.
                    </p>
                    <span>Error code: 404</span>
                </div>
            </div>
        </div>
        <div class="footer store_list_footer">
            <div class="footer-inner clearfix">
                <ul class="left">
                    <li>Check out our:</li>
                    <li>
                        <a class="app-link" href="https://itunes.apple.com/us/app/basket-jo/id1261941252?mt=8" target="_blank">iOS app</a>
                    </li>
                    <li>
                        <a class="app-link" href="https://play.google.com/store/apps/details?id=jo.basket" target="_blank">Android app</a>
                    </li>
                </ul>
                <ul class="right">
                    <li>
                        <router-link :to="{ name: 'terms.conditions' }"  data-bypass="true">
                            <span>Terms</span>
                        </router-link>
                    <li>
                        <router-link :to="{ name: 'privacy.policy'}"   data-bypass="true">
                            Privacy
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </section>
</template>

<script>
    export default {
        name: 'NotFound'
    }
</script>

<style scoped>
    .image-404{
        height: 550px;
        width: 600px;
    }

    .store_list .footer {
        border-top: 2px solid #68BF54;
        color: #6c6c6c;
        background-color: #FCFCFC;
    }

    .store_list .footer .clearfix {
        overflow: auto;
        zoom: 1;

    }

    .store_list .footer .footer-inner {
        max-width: 767px;
        margin: 0px auto;
        padding: 25px 10px;
        font-size: 16px;
    }

    .store_list .footer .left {
        float: left;
    }

    .store_list .footer ul {
        padding: 0px;
        margin: 16px 0px;
    }

    .store_list .footer a {
        color: #6c6c6c;
        text-decoration: none;
        font-weight: 400;
    }

    .store_list .footer .right {
        float: right;
    }

    .store_list .footer ul li {
        padding-right: 5px;
        display: inline;
        list-style: none;
    }

    .store_list .footer a.app-link {
        color: #69dada;
    }
    .error-head_logo {
        height: 30px;
        margin-top: 5px;
        opacity: 0.9;
    }


    .four_not_error h1 {
        margin: 38px 0px;
        font-size: 40px;
        font-weight: 300;
        text-shadow: 0 1px 2px rgba(0, 0, 0, .2);
    }

    .four_not_error p {
        font-size: 18px;
        font-weight: 400;
        line-height: 25px;
        color: #fff;
    }

    .four_not_error a {
        line-height: 25px;
        color: #fff;
        font-size: 18px;
        font-weight: 600;
        text-decoration: underline;
    }

    .four_not_error span {
        font-size: 12px;
    }

    .store_list .footer a:hover {
        text-decoration: underline;
    }
</style>
