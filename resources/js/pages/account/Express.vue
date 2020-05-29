<template>
    <div class="after_account_right">
        <div class="express_pay">
            <div class="express">
                <div class="rmq-b3159f97" data-radium="true"
                     style="align-items: center; margin-left: auto; margin-right: auto; background-repeat: no-repeat; background-position: center top; object-fit: contain; padding: 30px; background-image: url(https://www.dev-basket.com/imgs/membersipPage.jpg); min-height: 300px; position: relative;">
                    <div data-radium="true"
                         style="display: flex; flex-direction: column; justify-content: space-between; align-items: center; margin-left: auto; margin-right: auto; padding-top: 20px; color: black; min-height: 300px;">
                        <div data-radium="true"><h1 class="rmq-c8a756ca rmq-d0c50209" data-radium="true"
                                                    style="text-align: center; max-width: 560px; font-size: 24px; font-weight: 600;">
                            Fresh grocery delivery as often as you need it—for a flat
                            fee</h1>
                        </div>
                        <div class="col-12 d-inline-flex text-center" style="overflow-y: auto">
                            <div class="col-12 col-lg-4 col-md-4">
                                <img src="/images/car.jpg">
                                <h6>Unlimited FREE
                                    delivery on orders</h6>
                            </div>
                            <div class="col-12 col-lg-4 col-md-4">
                                <img src="/images/home.png">
                                <h6>Shop a variety of stores – FREE delivery on the entire order</h6>
                            </div>
                            <div class="col-12 col-lg-4 col-md-4">
                                <img src="/images/star.png">
                                <h6>Save even more by avoiding higher fees during peak delivery hours</h6>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="express-plans">
                    <h3 class="express-title text-center">
                        Pick a membership plan
                    </h3>
                    <h2 class="text-center">Plans</h2>
                    <div class="row">

                        <div class="col-sm-12">
                            <div class="express-subscription-chooser clearfix">
                                <div>
                                    <input type="hidden" id="membership_id" value="5">
                                    <input type="hidden" id="membership_amount" value="44.99">
                                    <div class=" express-option-container express-yearly-option member_5"
                                         v-bind:class="{'selected': selected == 5}"
                                         @click="chooseMember('5','44.99')">
                                        <div class="express-option">
                                            <div>
                                                <div class="option-title text-center">
                                                    <span>3- Months</span>
                                                </div>
                                                <div class="express-check"></div>
                                                <div class="option-body-container text-center">
                                                    <div class="option-price-container">
                                                        <span class="option-price">JOD 44.99</span>
                                                    </div>
                                                    <span class="">Per Months</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" express-option-container express-yearly-option member_3"
                                         v-bind:class="{'selected': selected == 3}"
                                         @click="chooseMember('3','74.99')">
                                        <div class="express-option">
                                            <div>
                                                <div class="option-title text-center">
                                                    <span>6-Months</span>
                                                </div>
                                                <div class="express-check"></div>
                                                <div class="option-body-container text-center">
                                                    <div class="option-price-container">
                                                        <span class="option-price">JOD 74.99</span>
                                                    </div>
                                                    <span class="">Per Months</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" express-option-container express-yearly-option member_2"
                                         v-bind:class="{'selected': selected == 2}"
                                         @click="chooseMember('2','99')">
                                        <div class="express-option">
                                            <div>
                                                <div class="option-title text-center">
                                                    <span>Yearly</span>
                                                </div>
                                                <div class="express-check"></div>
                                                <div class="option-body-container text-center">
                                                    <div class="option-price-container">
                                                        <span class="option-price">JOD 99</span>
                                                    </div>
                                                    <span class="">Per Year</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" express-option-container express-yearly-option member_1"
                                         v-bind:class="{'selected': selected == 1}"
                                         @click="chooseMember('1','17.99')">
                                        <div class="express-option">
                                            <div>
                                                <div class="option-title text-center">
                                                    <span>Monthly</span>
                                                </div>
                                                <div class="express-check"></div>
                                                <div class="option-body-container text-center">
                                                    <div class="option-price-container">
                                                        <span class="option-price">JOD 17.99</span>
                                                    </div>
                                                    <span class="">Per Month</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="select-parent-div">
                        <button class="btn btn-danger select-card-class" data-toggle="modal" data-target="#addNewCard"
                                style="color: white; font-weight: unset" >Join Basket
                            Premium
                        </button>


                    </div>
                </div>
            </div>
        </div>
        <div style="text-align: center; margin-top: 16px;"><span>
                <span>By purchasing Express you authorize a recurring charge at the rate of the plan you select.</span>
                <router-link :to="{ name: 'terms.conditions' }" target="_blank">
                    <span> Terms &amp; Conditions.</span>
                </router-link>
            </span>
        </div>
        <add-new-card-modal>
        </add-new-card-modal>
    </div>
</template>

<script>
    import Cookies from 'js-cookie';
    import AddNewCardModal from "../../components/AddNewCardModal";
    export default {
        name: "express",
        components: {AddNewCardModal},
        data() {
            return {
                userData: [],
                selected: '',
            };
        },

        methods: {
            chooseMember(member, price) {
                this.selected = member;
            }

        },

        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData;
            bus.$emit('changePage' , this.$route.name);

        },

        created() {

        },

        destroyed() {

        },
    }
</script>

<style scoped>
    /*@import url('https://d2guulkeunn7d8.cloudfront.net/assets/instacart_styles-71a6e705a542acee9df9.css');*/
    .select-card-class {
        background-color: #43ad16 !important;
        outline: none;
        border-color: #43ad16 !important;
        padding-top: 9px;
        padding-bottom: 9px;
        padding-left: 25px;
        padding-right: 25px;
    }

    .select-parent-div {
        text-align: center;
        padding-top: 25px;
    }

    .btn:hover:not(.disabled):not([disabled]) {
        background-color: #d7e3e2 !important;
        outline: none;
    }

    .btn-danger.focus, .btn-danger:focus {
        color: #fff;
        /*background-color: #c9302c;*/
        /*border-color: #761c19;*/
    }

    .express {
        margin-bottom: 50px;
    }

    .after_account_right {
        padding-bottom: 60px;
    }

    .express-subscription-chooser .express-option .option-body-container .option-price-container .option-price {
        font-size: 25px;
        font-weight: 900;
    }

    .modal {
        width: unset;
        margin: unset;
        background: unset;
    }

    .option-price-container {
        display: block !important;
    }

    .option-price {
        font-size: 25px !important;
    }

    .express-subscription-chooser .express-option-container {
        float: unset;
        padding: 10px 0;
        transition: all .2s ease;
    }

    .express-subscription-chooser .express-option {
        background: url(/images/express-tr-gry.png) no-repeat scroll center center / cover;
        border-radius: 4px;
        color: #62c94b;
        display: inline-block;
        height: 200px;
        max-width: 240px;
        overflow: hidden;
        position: relative;
        transition: all 0.2s ease 0s;
        width: 240px;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease-in-out;
    }

    .select-card-class {
        background-color: #43ad16 !important;
        outline: none;
        border-color: #43ad16 !important;;
        padding-top: 9px;
        padding-bottom: 9px;
        padding-left: 25px;
        padding-right: 25px;
    }

    .select-parent-div {
        text-align: center;
        padding-top: 25px;
    }
</style>
