<template>
    <div class="account-container" v-bind:class="{noScroll : showLoader}">
        <div>
            <home-header></home-header>
        </div>

        <div class="container marginTop accountInformation">
            <div class="col-12 col-lg-9 col-md-9 offset-lg-3 offset-md-3 text-center mt-5 mt-lg-3 mt-md-3">
                <h3 class="font-weight-bolder">{{ page.title }}</h3>
            </div>
            <div class="row p-3 mt-5">
                <div class="col-lg-3 col-md-4 col-xl-3">
                    <div class="after_account_left">
                        <ul class="after_account_left-list">
                            <li class="" v-for="item in menulist.first_menu">
                                <router-link class="menu-item p-2" v-bind:class="[page.link == item.link ? 'text-success' : 'text-dark']" :to="{ name: item.link }" :title="item.title">
                                    <span id="linkText1" class="form-inline ml-3"><img :src="'/images/'+item.icon" class="mr-2">{{ item.title }}</span>
                                </router-link>
                            </li>

                        </ul>
                        <hr>
                        <ul class="after_account_left-list">
                            <li class="" v-for="item in menulist.second_menu">
                                <router-link class="menu-item  p-2" v-bind:class="[page.link == item.link ? 'text-success' : 'text-dark']" :to="{ name: item.link }" :title="item.title">
                                    <span id="linkText2" class="form-inline ml-3"><img :src="'/images/'+item.icon" class="mr-2"> {{ item.title }}</span>
                                </router-link>
                            </li>
                            <li class="">
                                <a class="menu-item text-dark after_account_left-link-href-click" @click="logout" title="Logout">
                                   <span class="form-inline ml-3" style="font-size: 1em;">
                                        <img src="/images/Logout.svg" class="mr-2">
                                        Logout
                                   </span>
                                </a>
                            </li>
                            <ul class="small-list-inline border-top border-secondary p-3">
                                <router-link :to="{ name: 'press' }"
                                             target="_blank"
                                             aria-label="Press"
                                             class="text-secondary"
                                >
                                    <span>Press </span>
                                </router-link>
                                <span class="ml-2 mr-2"> &bullet;</span>
                                <router-link :to="{ name: 'apply' }"
                                             target="_blank"
                                             aria-label="Job"
                                             class="text-secondary">
                                    <span>Job </span>
                                </router-link>
                                <span class="ml-2 mr-2"> &bullet;</span>
                                <router-link
                                    :to="{ name: 'terms.conditions' }"
                                    target="_blank"
                                    aria-label="Terms"
                                    class="text-secondary"
                                >
                                    <span>Terms </span>
                                </router-link>
                                <span class="ml-2 mr-2"> &bullet;</span>

                                <router-link
                                    :to="{ name: 'privacy.policy' }"
                                    target="_blank"
                                    aria-label="Privacy"
                                    class="text-secondary"
                                >
                                    <span>Privacy</span>
                                </router-link>
                            </ul>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
                    <div class="col-12 pt-2  marginTop">

                    </div>
                    <router-view></router-view>
                </div>
            </div>
        </div>
        <green-loader v-if="showGreenLoader"></green-loader>

    </div>

</template>

<script>
    import homeHeader from "../../components/HomeHeader";
    import Cookies from 'js-cookie'
    import GreenLoader from "../../components/GreenLoader";

    export default {
        name: "commonLeft",
        middleware: 'auth',
        data() {
            return {
                showLoader: false,
                showGreenLoader: false,
                page: {title:'',link:''},
                menulist: {
                    first_menu: [
                        {link: 'orders.history', title: 'Your orders', icon: 'Orders.svg'},
                        {link: 'express', title: 'Basket prime', icon: 'Prime.svg'},
                        // {link: '#', title: 'Invite friend', icon: 'Invite.svg'},
                        {link: 'coupons', title: 'Credits & promo codes', icon: 'Promo.svg'},
                        {link: 'help', title: 'Help', icon: 'Help.svg'},
                    ],
                    second_menu: [
                        {link: 'profile', title: 'Your Account settings', icon: 'Settings.svg'},
                        {link: 'addresses', title: 'Addresses', icon: 'Addresses.svg'},
                        {link: 'payment', title: 'Payment methods', icon: 'Payments.svg'},
                        {link: 'notifications', title: 'Notifications', icon: 'Notifications.svg'},
                        // {link: '#', title: 'Loyalty cards', icon: 'Loyalty.svg'},
                    ]
                },
            }
        },

        components: {
            GreenLoader,
            homeHeader,
        },

        methods: {
            logout() {
                Cookies.remove('token');
                Cookies.remove('userData');
                this.$store.dispatch('auth/logout');
                this.$router.push({path: '/'});
            }
        },

        created() {
            bus.$on('showGreenLoader', (data) => {
                this.showGreenLoader = data;
            });
            bus.$on('changePage', (data) => {
                let first = this.menulist.first_menu.find(element => element.link === data);
                let second = this.menulist.second_menu.find(element => element.link === data);
                this.page.title =   first !== undefined ? first.title : second.title;
                this.page.link =   first !== undefined ? first.link : second.link;
            });
        },

        mounted() {

        }
    }
</script>

<style>
    .accountInformation >*{
        font-family: 'Open Sans', 'Helvetica Neue', Arial, Helvetica, sans-serif;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.3;
        letter-spacing: normal;
        color: #262c1d;
    }
    .noScroll {
        overflow-y: hidden;
        max-height: 100vh;
    }
    .menu-item{
        font-size: 20px;
    }
    #linkText1,#linkText2{
        font-size: 1.2em;
    }

    .after_account_left, .after_account_left ul li {
        background: transparent;
        border: unset;
    }


    .marginTop {
        padding-top: 200px;
    }

    @media (max-width: 767px) {
        .marginTop {
            padding-top: 120px;
        }
    }

    .account-container {
        background: #f2f2f2;;
    }
</style>
