<template>
    <div>
        <footer>
            <div class="footer_outer">
                <div class="container">
                    <div class="footer_bootom">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="footer_list">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <ul class="basket_list">
                                                <li class="basket-list-item">
                                                    <router-link class="basket-list-link" :to="{name:'contact.us'}" title="Contact">Contact</router-link>
                                                </li>
                                                <li class="basket-list-item">
                                                    <router-link class="basket-list-link" :to="{name:'help'}" title="Help">Help</router-link>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <ul class="basket_list">
                                                <li class="basket-list-item">
                                                    <a href="https://apps.apple.com/us/app/basket-jo/id1261941252" title="iOS app" target="_blank">
                                                        <i class="glyph-icon flaticon-technology"></i> iOS app </a>
                                                </li>
                                                <li class="basket-list-item">
                                                    <a href="https://play.google.com/store/apps/details?id=jo.basket" target="_blank" title="Android App">
                                                        <i class="glyph-icon flaticon-technology"></i> Android app</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-3">
                                            <ul class="basket_list">
                                                <li class="basket-list-item">
                                                    <router-link class="basket-list-link" :to="{name:'privacy.policy'}" title="Privacy policy "> Privacy policy </router-link>
                                                </li>
                                                <li class="basket-list-item">
                                                    <router-link class="basket-list-link" :to="{name:'terms.conditions'}" title="Terms Conditions"> Terms Conditions </router-link>
                                                </li>
                                                <li class="basket-list-item">
                                                    <router-link class="basket-list-link" :to="{name:'press'}" title="Press"> Press </router-link>
                                                </li>
                                                <li class="basket-list-item">
                                                    <router-link class="basket-list-link" :to="{name:'about.us'}" title="About Us"> About Us </router-link>
                                                </li>
                                                <li class="basket-list-item">
                                                    <router-link class="basket-list-link" :to="{name:'help.works'}" title="How Basket Works"> How Basket Works </router-link>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="col-md-3">
                                            <ul class="basket_list">
                                                <li class="basket-list-item">
                                                    <router-link class="basket-list-link" :to="{name:'apply'}" title="Careers">Careers</router-link>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="basket_top">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="inbl_footer">
                                    <img
                                        src="/images/logo-white.png"
                                        alt="Basket" style="width:140px;">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="footer_location">
                                    <ul class="basket_list">
                                        <li class="basket-list-item"><img style=" margin: 11px 0px 11px 0px; width: 25%;"
                                                 class="credit_card_footer"
                                                 src="/images/visa-mastercard-logo.jpg">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="cta-shopper-wrap">
                                    Join our shopper team
                                    <a class="btn btn-cta-shopper-wrap" href=""> Apply Now </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
    export default {
        name: "AuthFooter"
    }
</script>

<style scoped>

</style>
