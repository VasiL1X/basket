<template>
    <div>
        <HelpHeaderHomeComponent></HelpHeaderHomeComponent>
        <div class="order_summary_help">
            <div class="container help_list">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="help_list_title">Issue with one of these?</h2>
                    </div>
                </div>
            </div>
            <div class="container-fluid orders">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 mx-auto ">
                                    <router-link :to="{name: 'help.ordering'}">
                                        <div class="basket_block d-flex align-items-center p-2">
                                            <img src="/images/Image.svg" alt="" width="160px" height="160px" class="img-fluid">
                                            <p class="my_order_text text-center">My Order</p>
                                        </div>
                                    </router-link>
                                </div>
                                <div class="col-lg-6 col-md-6 mx-auto ">
                                    <router-link :to="{name: 'help.pricing'}">
                                        <div class="basket_block d-flex align-items-center p-2">
                                            <img src="/images/bag.png" alt="" width="160px" height="160px" class="img-fluid">
                                            <p class="my_order_text text-center">Prime Membership</p>
                                        </div>
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid  learn_more">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="learn_more_text">Want to learn more?</h2>
                    </div>
                </div>

            </div>
        </div>
        <div class="container-fluid alerts_block">
            <div class="row">
                <div class="col-lg-6 mx-auto alerts_dropdown">
                    <router-link :to="{name: help.link}" v-for="help in helps" v-bind:key="help.name">
                        <div class="alert_block d-flex align-items-center" v-bind:class="help.name" role="alert">
                            <img :src="help.src" alt="" class="img-fluid" height="60px">
                            <div class="text_block">
                                <h6>{{ help.title }}</h6>
                                <p>{{ help.capture}}</p>
                            </div>
                            <i class="fas fa-angle-right text-dark"></i>
                        </div>
                    </router-link>
                    <div class="alert_block d-flex align-items-center" role="alert">
                        <div class="text_block">
                            <h6>Basket Sweepstakes Rules</h6>
                            <p>View our monthly Sweepstakes</p>
                        </div>
                        <i class="fas fa-angle-right"></i>
                    </div>
                    <div class="alert_block d-flex align-items-center" role="alert">
                        <div class="text_block">
                            <h6>Product Recalls</h6>
                        </div>
                        <i class="fas fa-angle-right"></i>
                    </div>
                    <div class="alert_block d-flex align-items-center" role="alert">
                        <div class="text_block">
                            <h6>Terms of Promos & Credits</h6>
                        </div>
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid still_have_question">
            <div class="row p-3">
                <div class="col-lg-12 text-center">
                    <h2>Still have questions?</h2>
                </div>
                <div class="col-lg-12 text-center">
                    <router-link :to="{name:'contact.us'}" class="btn btn-outline-success contact_us">Contact us</router-link>
                </div>
            </div>
        </div>
        <div class="container-fluid footer">

            <div class="row">
                <div class="col-lg-6 mx-auto text-center">
                    <ul class="list-inline">
                        <li class="list-inline-item"><router-link :to="{name:'apply'}">Jobs</router-link></li>
                        <li class="list-inline-item"><router-link :to="{name:'terms'}">Press</router-link></li>

                        <li class="list-inline-item"><router-link :to="{name:'privacy.policy'}">Privacy</router-link></li>
                        <li class="list-inline-item"><router-link :to="{name:'terms.conditions'}">Terms</router-link></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import HelpFooterComponent from './HelpFooter'
    import HelpHeaderHomeComponent from './HelpHeaderHome'

    export default {
        name: "Help",
        data() {
            return {
                pageHeader: 1,
                helps: [
                    {name:'works',src:'/images/lamp.png',title:'How Basket Works',link:'help.works',capture:'What we do, areas and stores we serve, communicating with us'},
                    {name:'ordering',src:'/images/ordering.png',title:'Ordering',link:'help.ordering',capture:'Placing an order, finding items, updating your order'},
                    {name:'delivery',src:'/images/delivery.png',title:'Delivery and Pickup',link:'help.works',capture:'Tracking your order, approving changes, receiving your items'},
                    {name:'pricef',src:'/images/price.png',title:'Pricing',link:'help.pricing',capture:'Delivery, item pricing, taxes and fees'},
                    {name:'payments',src:'/images/payments.png',title:'Payments',link:'help.payments',capture:'Coupons, gift cards, receipt overview'},
                    {name:'account',src:'/images/account.png',title:'Account Settings',link:'help.account',capture:'Personal settings, notifications, login issues'}
                ]
            };
        },
        components: {
            HelpFooterComponent,
            HelpHeaderHomeComponent
        },
    }
</script>

<style scoped>
    @media screen and (max-width: 992px) {
        .orders {
            margin-top: 0 !important;
        }

        .basket_block {
            margin-top: 10px;
        }
        .basket_block img[data-v-6cf85527] {
            margin-left: -15px;
            width: 98px;
        }
    }

    @media screen and (max-width: 500px) {
        .my_order_text {
            font-size: 16px !important;
        }
    }

    .footer ul {
        margin: 0;
    }

    .footer {
        background: #f7f7f7;
    }

    .footer li a {
        color: #757575;
    }

    .footer li {
        font-size: 14px;
        font-weight: normal;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.5;
        letter-spacing: normal;
        color: #757575;
        margin: 24px 17px;
    }

    .still_have_question {
        background: #FFFFFF;
    }

    .still_have_question h2 {
        font-size: 30px;
        font-weight: 600;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.3;
        letter-spacing: normal;
        color: #262c1d;
    }

    .still_have_question button {
        border-radius: 4px;
        border: solid 1px #61bf3d;
        color: #61bf3d;
        margin-top: 24px;
        margin-bottom: 45px;
        padding: 13px 30px;
        font-size: 16px;
        font-weight: 600;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.38;
        letter-spacing: -0.41px;
    }

    .alert_block h6 {
        margin-top: 10px;
    }

    .alert_block img {
        height: 60px;
    }

    .text_block h6 {
        font-size: 16px;
        font-weight: 600;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.3;
        letter-spacing: normal;
        color: #262c1d;
        margin-left: 20px;
    }

    .text_block p {
        font-size: 14px;
        font-weight: 600;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.3;
        letter-spacing: normal;
        color: #757575;
        margin-left: 20px;
    }

    .alerts_block {
        background: #f7f7f7;
    }

    .alerts_block i {
        display: block;
        position: absolute;
        right: 24.7px;
        width: 6.6px;
        height: 11.2px;
    }

    .alert_block {
        margin-bottom: 24px;
        border-radius: 4px;
        box-shadow: 1px 1px 0 0 rgba(0, 0, 0, 0.16);
        border: solid 1px #e0e0e0;
        background-color: #ffffff;
        padding: 6px 10px;
    }

    .alerts_dropdown {
        margin-top: -36px;

    }

    .learn_more_text {
        margin: 33px 0;
    }

    .orders {
        background: #f7f7f7;
        padding-top: 32px;
        padding-bottom: 32px;
        margin-top: -35px;
    }

    .my_order_text {
        font-size: 24px;
        font-weight: bold;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.3;
        letter-spacing: normal;
        color: #61bf3d;
        margin-left: 16px;

    }

    .basket_block {
        background: #fff;
        margin-left: 16px;
        margin-right: 16px;
        border-radius: 4px;
    }

    .basket_block img {
        margin-left: 0;
        border-radius: 100%;
    }

    .learn_more {
        height: 150px;
        border-radius: 4px;
        background-color: #ffffff;
        margin-top: 0;
    }

</style>
