<template>
    <div class="account-container" v-bind:class="{noScroll : showLoader}">
        <div>
            <home-header></home-header>
        </div>

        <div class="container">
            <!-- it was a page title -->
            <!-- <div class="col-12 col-lg-9 col-md-9 offset-lg-3 offset-md-3 text-center">
                <h3 class="font-weight-bolder">{{ page.title }}</h3>
            </div> -->
            <div class="row px-3 account__inner">
                <div class="col-lg-3 col-md-4 col-xl-3 account__list-wrapper">
                    <ul class="account__list">
                        <li class="account__list-item py-3" v-for="item in menulist.first_menu" :key="item.id">
                            <router-link class="account__list-link" v-bind:class="[page.link == item.link ? 'text-success' : 'text-black']" :to="{ name: item.link }" :title="item.title">
                                <span class="account__list-text"><img :src="'/images/'+item.icon" class="mr-3">{{ item.title }}</span>
                            </router-link>
                        </li>
                    </ul>
                    <ul class="account__list">
                        <li class="account__list-item py-3" v-for="item in menulist.second_menu" :key="item.id">
                            <router-link class="account__list-link" v-bind:class="[page.link == item.link ? 'text-success' : 'text-black']" :to="{ name: item.link }" :title="item.title">
                                <span class="account__list-text"><img :src="'/images/'+item.icon" class="mr-3"> {{ item.title }}</span>
                            </router-link>
                        </li>
                        <li class="account__list-item py-3">
                            <a class="account__list-link" @click="logout" title="Logout">
                                <span class="account__list-text">
                                    <img src="/images/Logout.svg" class="mr-3">
                                    Logout
                                </span>
                            </a>
                        </li>
                    </ul>
                    <div class="account__list-footer py-3">
                            <router-link :to="{ name: 'press' }"
                                            target="_blank"
                                            aria-label="Press"
                                            class="text-secondary"
                            >
                                <span>Press </span>
                            </router-link>
                            <span class="mx-1"> &bullet;</span>
                            <router-link :to="{ name: 'apply' }"
                                            target="_blank"
                                            aria-label="Job"
                                            class="text-secondary">
                                <span>Job </span>
                            </router-link>
                            <span class="mx-1"> &bullet;</span>
                            <router-link
                                :to="{ name: 'terms.conditions' }"
                                target="_blank"
                                aria-label="Terms"
                                class="text-secondary"
                            >
                                <span>Terms </span>
                            </router-link>
                            <span class="mx-1"> &bullet;</span>
                            <router-link
                                :to="{ name: 'privacy.policy' }"
                                target="_blank"
                                aria-label="Privacy"
                                class="text-secondary"
                            >
                                <span>Privacy</span>
                            </router-link>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12">
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
                        {link: '#', title: 'Invite friends', icon: 'Invite.svg'},
                        {link: 'coupons', title: 'Credits & promo codes', icon: 'Promo.svg'},
                        {link: 'help', title: 'Help', icon: 'Help.svg'},
                    ],
                    second_menu: [
                        {link: 'profile', title: 'Your account settings', icon: 'Settings.svg'},
                        {link: 'addresses', title: 'Addresses', icon: 'Addresses.svg'},
                        {link: 'payment', title: 'Payment methods', icon: 'Payments.svg'},
                        {link: 'notifications', title: 'Notifications', icon: 'Notifications.svg'},
                        {link: '#', title: 'Loyalty cards', icon: 'Loyalty.svg'},
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
        }
    }
</script>

<style lang="scss" scoped>
    .account {
        &-container {
            padding-top: 136px;
        }
        &__inner {
            padding-top: 56px;
        }
        &__list {
            margin: 0;
            padding: 0;
            list-style: none;
            border-bottom: 1px solid #ccc;
            &-wrapper {
                padding-left: 0;
                padding-right: 20px;
            }
            &-item {
                &:hover .account__list-link {
                    color: var(--green-color) !important;
                }
            }
            &-link {
                font-size: 18px;
                line-height: 1.3;
                cursor: pointer;
            }
            &-text {
                display: flex;
                align-items: center;
            }
            &-footer {
                font-size: 12px;
                margin-bottom: 4px;
            }
        }

        
    }
    .noScroll {
        overflow-y: hidden;
        max-height: 100vh;
    }
    @media (max-width: 991px) {
        .account-container {
            padding-top: 120px;
        }
        .account__list {
            &-wrapper {
                padding-right: 10px;
            }
            &-link {
                font-size: 15px;
                img {
                    width: 19px;
                    height: 19px;
                }
            }
            &-footer {
                font-size: 6px;
            }
        }
    }
    @media (max-width: 767px) {
      .account-container {
          padding-top: 106px;
      }
      .account__inner {
          padding-top: 0;
      }
      .account__list {
            &-wrapper {
                padding: 0;
            }
            &-footer {
                text-align: center;
            }
        }
    }

</style>
