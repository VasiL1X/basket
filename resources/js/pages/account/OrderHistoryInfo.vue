<template>
    <div>
        <div>
           <home-header></home-header>
        </div>
        <section class="order_summary_sections common_dep_list" v-if="!showLoader">
            <div class="container">
                <div class="row">
                    <div class="space69"></div>
                    <div class="account_common_list">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card card-default customize_pannel mt_1o mt-5 mb-3">
                                    <div class="panel-body">
                                        <span class="past_orders_header_order_id">Order Id : {{orderHistory.order_outlet_detail.order_id}}</span>
                                        <span class="past_orders_header_order_id">Batch Id : {{orderHistory.order_outlet_detail.orders_outlets_id}}</span>
                                        <router-link
                                           class="btn btn-danger float-right" :to="{ name: 'orders.receipt' , params: {id: orderHistory.order_outlet_detail.orders_outlets_id}}" target="_blank">View Receipt
                                        </router-link>
<!--                                        <a v-else-if="orderHistory.order_outlet_detail.order_status >= 14 && orderHistory.order_outlet_detail.order_status  <= 16"-->
<!--                                           style="background: #d43f3a"-->
<!--                                           class="btn btn-danger float-right" href="javascript:void(0)" target="_blank">View Receipt-->
<!--                                        </a>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-8 col-xl-9">
                                <div class="account__content">
                                    <div class="billing_account_common">
                                        <div class="account__content-common_orders">
                                            <div class="order-summary-header common_orders_secc">
                                                <div class="col-lg-6 col-xs-12 order-summary-header-text">
                                                    <h3 class="canceled-text">{{orderHistory.order_outlet_detail.order_status_name}}</h3>
                                                </div>
                                                <div class="col-md-12 did_list_bsk">
                                                    <h3 class="left_text_new">{{orderHistory.order_outlet_detail.outlet_name}}</h3>
                                                </div>
                                            </div>
                                            <div class="refunds_orders">
                                                <div class="col-md-12">
                                                    <div class="ref_title">
                                                        <h4 v-if="orderHistory.order_outlet_detail.order_status_name == 'Cancelled'" class="items-to-refund">
                                                            <span> Refunds </span></h4>
                                                    </div>
                                                </div>

                                                <!--<div class="scrolling_responsive">-->
                                                    <!--<ul>-->
                                                        <!--<li>-->
                                                            <!--<div class="row">-->
                                                                <!--<div class="col-md-2 col-xs-2 col-sm-3">-->
                                                                    <!--<div class="ref_lis_img" style="margin-right:13px;">-->
                                                                        <!--<img class="" src="https://cdn.basket.jo/assets/images/products/list/2691_1570114305.jpg" alt="Siniora Al Quds Beef Mortadella Plain">-->
                                                                    <!--</div>-->
                                                                <!--</div>-->
                                                                <!--<div class="col-md-6 col-xs-6 col-sm-5" style="margin-top:30px;">-->
                                                                    <!--<div class="ref_inf_sec">-->
                                                                        <!--<span class="details67" style="display: none;" data-outlet_id="67" data-outlet_item_id="231973" data-cart_qty="0" data-sold_per="1" data-unit="g"></span>-->
                                                                        <!--<h5>Siniora Al Quds Beef Mortadella Plain</h5>-->
                                                                        <!--<p>-->
                                                                            <!--JD 0.000-->
                                                                            <!--<span class="middot m-y undefined"> · </span>-->
                                                                            <!--500 g-->
                                                                        <!--</p>-->
                                                                        <!--<p class="no-item">-->
                                                                            <!--Reason: Cancelled</p>-->
                                                                    <!--</div>-->
                                                                <!--</div>-->
                                                                <!--<div class="col-md-2 col-xs-2 col-sm-3" style="margin-top:30px;">-->
                                                                    <!--<div class="ref_inf_counts">-->
                                                                        <!--<p>1-->
                                                                            <!--x</p>-->
                                                                    <!--</div>-->
                                                                <!--</div>-->
                                                                <!--<div class="col-md-2 col-xs-2 col-sm-3" style="margin-top:30px;">-->
                                                                    <!--<div class="ref_inf_prices">-->

                                                                        <!--<b>JD 1.54</b>-->
                                                                    <!--</div>-->
                                                                <!--</div>-->
                                                            <!--</div>-->
                                                        <!--</li>-->
                                                    <!--</ul>-->
                                                <!--</div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-xl-3 padding_left0">
                                <div class="after_account_left">
                                    <div class="order-status-order-info">
                                        <div class="order-info-heading-wrapper">
                                            <h3>Order Info</h3>
                                        </div>
                                        <div class="order-info-details">
                                            <div class="inspectlet-sensitive">
                                                <div class="order-info-details-section inspectlet-sensitive">
                                                    <div>
                                                        <p>{{orderHistory.order_outlet_detail.customer_delivery_address}}</p>
                                                    </div>
                                                    <p>{{orderHistory.order_outlet_detail.customer_mobile}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-xl-9">
                    <div class="account__content">
                        <div class="account__content-common">
                            <div class="account__content-common_orders">
                                <div class="order-summary-footer common_orders_secc">
                                    <div class="col-md-12 did_list_bsk">
                                        <span>Order Summary</span>
                                    </div>
                                </div>
                                <div class="refunds_orders">
                                    <div class="scrolling_responsive pl-17">
                                        <ul>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-8 col-xs-2 col-sm-3">
                                                        <div class="ref_inf_counts">
                                                            <p>Item Subtotal</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-xs-2 col-sm-3">
                                                        <div class="ref_inf_prices">
                                                            <p>JD {{orderHistory.order_outlet_detail.outlet_subtotal}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-8 col-xs-2 col-sm-3">
                                                        <div class="ref_inf_counts">
                                                            <p>Delivery Fee</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-xs-2 col-sm-3">
                                                        <div class="ref_inf_prices">
                                                            <p>JD {{orderHistory.order_outlet_detail.outlet_total_delivery_fee}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-8 col-xs-2 col-sm-3">
                                                        <div class="ref_inf_counts">
                                                            <p>Discount</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-xs-2 col-sm-3">
                                                        <div class="ref_inf_prices">
                                                            <p>JD {{orderHistory.order_outlet_detail.outlet_free_delivery_discount}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li v-if="orderHistory.order_outlet_detail.promo_code_used!=''">
                                                <td>
                                                    <div class="col-md-8 col-xs-6 col-sm-6">
                                                        <div class="ref_inf_counts">
                                                            <p>Promo code Discount(<b>{{orderHistory.order_outlet_detail.promo_code_used}}</b>)</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-md-2 col-xs-6 col-sm-6">
                                                        <div class="ref_inf_prices">
                                                            <p>{{orderHistory.order_outlet_detail.overall_promo_total_amount}}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                            </li>

                                            <li>
                                                <div class="row">
                                                    <div class="col-md-8 col-xs-2 col-sm-3">
                                                        <div class="ref_inf_counts">
                                                            <p>Shopper Adjustment upon checkout</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-xs-2 col-sm-3">
                                                        <div class="ref_inf_prices">
                                                            <p>JD {{orderHistory.order_outlet_detail.shopper_adjustment}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-8 col-xs-2 col-sm-3">
                                                        <div class="ref_inf_counts">
                                                            <b>Total</b>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-xs-2 col-sm-3">
                                                        <div class="ref_inf_prices">
                                                            <b>JD {{orderHistory.order_outlet_detail.outlet_total}}</b>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space"></div>
            </div>
        </section>
    </div>
</template>

<script>
    import Cookies from 'js-cookie';
    import HomeHeader from "../../components/HomeHeader";
    export default {
        name: "OrderHistoryInfo",
        components: {HomeHeader},
        middleware: 'auth',
        data() {
            return {
                userData: [],
                orderHistory: {},
                ordersOutletsId: '',
                showLoader:true
            };
        },

        methods: {
            getOrderHistory() {
                bus.$emit('showGreenLoader' , this.showLoader);
                axios.post(apiDev + '/order-history-info', {
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    language: this.language,
                    orders_outlets_id: this.ordersOutletsId,
                }).then(response => {
                    this.showLoader = false;
                    bus.$emit('showGreenLoader' , this.showLoader);
                    this.orderHistory = response.data.response;
                }).catch(error => {

                })
            },
        },

        created() {
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.ordersOutletsId = this.$route.params.id

        },

        mounted() {
            this.getOrderHistory();
            bus.$emit('changePage' , this.$route.name);

        }
    }
</script>

<style scoped>
    .panel-body {
        padding: 15px;
    }

    .order_summary_sections{
        background: #F7F7F7;
    }
</style>
