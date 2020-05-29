<template>
    <section class="store_list">
        <div class="container-fluid d-inline-block p-0">
            <div class="error-head">
                <img src="https://cdn.basket.jo/assets/front/basket/new_design/images/footer_logo_new.png" class="logo"
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
        <div class="footer">
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
</style>
