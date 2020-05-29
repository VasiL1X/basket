<template>
    <div>
        <div class="privacy_policy_sctions_outer">
            <div class="privacy_policy_sctions">
                <div class="container-fluid">
                    <div class="logoHeader">
                        <router-link :to="{ name: 'login' }"  title="Basket">
                            <img width="140" src="images/logo-white.png" alt="">
                        </router-link>
                    </div>
                     <nav class="hiddle_respon">
                         <router-link class="link privacy_policy_sctions_link" :to="{ name: 'apply' }">Careers</router-link>
                         <router-link class="link privacy_policy_sctions_link" :to="{ name: 'help' }">Help</router-link>
                         <router-link class="link privacy_policy_sctions_link link-btn" :to="{ name: 'apply' }">Become a Shopper</router-link>
                     </nav>
                    <div class="responsive_menus_faq" id="fillteridnew">
                        <nav>
                            <router-link class="link privacy_policy_sctions_link" :to="{ name: 'apply' }">Careers</router-link>
                            <router-link class="link privacy_policy_sctions_link" :to="{ name: 'home' }">Help</router-link>
                            <router-link class="link privacy_policy_sctions_link link-btn" href="#" :to="{ name: 'apply' }">
                                Become a Shopper
                            </router-link>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "PolicyAndTermsHeader"
    }
</script>

<style scoped>
    .logoHeader{
        display: inline-block;
        margin: 11px 0;
    }
</style>
