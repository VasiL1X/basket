<template>
    <div>
        <div>
            <home-header></home-header>
        </div>
        <section v-if="!showOrderLoader" class="order_summary_sections common_dep_list">
            <div v-if="!showNoResult" class="container">
                <div class="row">
                    <div class="space69"></div>
                    <div class="account_common_list">

                        <div class="row mt-5" id="order_update">
                            <div class="col-12 p-3">
                                <div class="card text-dark">
                                    <div class="card-body">
                                        <span class="past_orders_header_order_id">Order Id : {{order_id}}  </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-9 col-md-9">
                                <div class="card after_account_right">
                                    <div class="card-body order-summary-header common_orders_secc p-1">
                                        <div class="row  mt-2" v-for="order in orderDetails.order_list">
                                            <div class="col-lg-4 col-xs-12 order-summary-header-text">
                                                <h3 class="canceled-text"> {{ order.order_status_name }}</h3>
                                                <input type="hidden" name="orders_outlets_id[]" value="45093">

                                            </div>
                                            <div
                                                class="col-md-8 col-xs-12 centered order-summary-header-actions d-inline-flex">
                                                <button v-if="order.order_status < 7"
                                                        @click="openOrderTimeSlotModal(order)"
                                                        class="btn btn-success col-3 menu-buttons" data-toggle="modal"
                                                        data-target=".change_time_slot">
                                                    Change time slot
                                                </button>
                                                <button class="btn btn-success col-4 menu-buttons" data-toggle="modal"
                                                        @click="addItemtoOrder(order.outlet_id)">
                                                    Add items to order
                                                </button>
                                                <button
                                                    class="btn btn-success col-4 menu-buttons"
                                                    @click.once="addItemToCart(order.outlet_id , order.product_list)">
                                                    Add all items to cart
                                                </button>
                                            </div>
                                            <div class="col-12">
                                                <h3 class="left_text_new">{{ order.outlet_name }}</h3>
                                                <h4 class="left_text_new" v-if="!changedDate">{{
                                                    dateChange(order.delivery_date) }} {{ order.delivery_slot }}</h4>
                                                <h4 class="left_text_new" v-else>{{ dateChange(delivery_new_date) }}
                                                    {{delivery_new_time }}</h4>
                                            </div>
                                            <div class="col-12 refunds_orders new_refunds_list">
                                                <div class="col-md-12">
                                                    <div class="ref_title"></div>
                                                </div>

                                                <div class="scrolling_responsive">
                                                    <div class="col-12 d-inline-flex product-col"
                                                         v-for="product in order.product_list">
                                                        <div class="col-md-2 col-xs-2 col-sm-2">
                                                            <div class="ref_lis_img" style="margin-right:13px;">
                                                                <img class=""
                                                                     :src="product.product_info_image"
                                                                     @error="errorSrc"
                                                                     alt="Images"></div>
                                                        </div>
                                                        <div class="col-md-4 col-xs-4 col-sm-4"
                                                             style="margin-top:30px;">
                                                            <div class="ref_inf_sec"><span class="details67"
                                                                                           style="display: none;"
                                                                                           data-outlet_id="67"
                                                                                           data-vendor_id="180"
                                                                                           data-outlet_item_id="209212"
                                                                                           data-cart_qty="1"
                                                                                           data-sold_per="1"
                                                                                           data-unit="ml"></span>
                                                                <h5>{{ product.product_name}}</h5>

                                                                <p class="item-size">
                                                                     <span>
                                                                        <span v-if="product.status_available === 0">OUT OF STOCK</span>
                                                                         <span v-else class="item-per-new-style">
                                                                             <span v-if="product.sold_per === 3">JD {{ parseFloat(product.our_selling_price*product.approx_weight).toFixed(2)}}</span>
                                                                             <span v-else>JD {{parseFloat(product.our_selling_price).toFixed(2)}}</span>
                                                                             - {{ product.sold_per == 1 || product.sold_per == 4 || product.unit == 'Unit'  ?  'per 1  pc.': product.sold_per  === 3 ? 'each': '1 kg' }}
                                                                         </span>
                                                                     </span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 col-xs-1 col-sm-1 mt-5">
                                                            <p>{{ product.cart_qty }} x</p>
                                                        </div>


                                                        <div class="col-md-2 col-xs-2 col-sm-2"
                                                             style="margin-top:30px;">
                                                            <div class="cart_listing_hed">
                                                                <table class="cart_listing_hed-table-cart-table">
                                                                    <tbody>
                                                                    <tr class="cat_item4594 cart_item_row">
                                                                        <td class="count_cart">
                                                                            <span class="direct_view"
                                                                                  style="display: block;">
                                                                                <div class="cart_qty_btw_ud">
                                                                                    <span>{{ product.cart_qty }}</span>
                                                                                    <span
                                                                                        v-if="product.sold_per === 2 || product.sold_per === 3 && product.unit !== 'Unit'">kg</span></div>
                                                                            </span>
                                                                            <span class="hover_view"
                                                                                  style="display: none;">
                                                                                <a class="change-qty-qty-inc up-down_down-btn decrease_cart_button"
                                                                                   href="javascript:void(0)" role="button"
                                                                                   onclick="decrease_item_in_order(45094, 209212, 'page', 1, 1, 'ml')"><i
                                                                                    class="glyphicon glyphicon-trash"></i></a>
                                                                                <div class="cart_qty_btw_ud" style="border: none;"> 1 </div>
                                                                                <a class="qty-disabled up-down_up-btn increase_cart" href="javascript:void(0)"
                                                                                   role="button" onclick="add_to_order(45094, 209212, 'page', 1, 1, 'ml')"><i
                                                                                    class="fa fa-plus"></i></a>
                                                                            </span>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 col-xs-1 col-sm-1"
                                                             style="margin-top:30px;">
                                                        </div>


                                                        <div class="col-md-2 col-xs-2 col-sm-2"
                                                             style="margin-top:38px;">
                                                            <div class="ref_inf_prices">
                                                                <b v-if="product.sold_per === 3">JD {{
                                                                    parseFloat((product.our_selling_price*product.approx_weight)*product.cart_qty).toFixed(2)}} </b>
                                                                <b v-else>JD {{
                                                                    parseFloat(product.our_selling_price*product.cart_qty).toFixed(2)}} </b>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-3 col-md-3">
                                <div class="mb-1" style="height: min-content;">
                                    <div class="after_account_left">
                                        <div class="order-status-order-info">
                                            <div class="order-info-heading-wrapper">
                                                <!-- <a href="" class="colour-green pull-right">Edit</a> -->
                                                <h3>Order Info</h3>
                                            </div>
                                            <div class="order-info-details">
                                                <div class="inspectlet-sensitive">
                                                    <div class="order-info-details-section inspectlet-sensitive">
                                                        <div>
                                                            <p>{{ orderDetails.address }}</p>
                                                        </div>
                                                        <p>{{ orderDetails.mobile }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-1" style="height: min-content;">
                                    <div class="after_account_left">
                                        <div class="order-status-order-info">
                                            <div class="order-info-heading-wrapper">
                                                <h3>Payment Info</h3>
                                            </div>
                                            <div class="order-info-details">
                                                <div class="inspectlet-sensitive">
                                                    <div class="order-info-details-section inspectlet-sensitive">
                                                        <div>
                                                            <p>{{ orderDetails.pay_info }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6 col-lg-9 col-md-9 mt-1">

                                <div class="after_account_right">
                                    <div class="after_account_common">
                                        <div class="after_account_common_orders">
                                            <div class="order-summary-footer common_orders_secc">
                                                <div class="col-md-12 did_list_bsk"><span>Order Summary</span></div>
                                            </div>
                                            <div class="refunds_orders">
                                                <div class="scrolling_responsive pl-17">
                                                    <ul class="order-info_total_list">
                                                        <li>
                                                            <p class="pl-5">Item Subtotal <span
                                                                class="float-right mr-5">JD {{ orderDetails.overall_subtotal }}</span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="pl-5">Delivery Fee <span
                                                                class="float-right mr-5">JD {{ orderDetails.overall_delivery_total }}</span>
                                                            </p>
                                                        </li>
                                                        <li v-if="orderDetails.hasOwnProperty('promo_total')">
                                                            <p class="pl-5">Promo code discount <span
                                                                class="float-right mr-5">JD {{ orderDetails.promo_total }}</span>
                                                            </p>
                                                        </li>
                                                        <li>
                                                            <p class="font-weight-bolder pl-5">Total <span
                                                                class="float-right mr-5">JD {{ orderDetails.overall_total }}</span>
                                                            </p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <hr>
                                            </div>
                                            <p class="text-left"></p>
                                            <button class="btn btn-danger cancel_order_btn" style="float:right;"
                                                    @click="cancelOrderModal">Cancel Order
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space"></div>
                    </div>
                </div>
            </div>
            <div class="container emptyMessage" v-else>
                <div class="col-12 p-5 bg-white text-center">
                    <h1 class="text-secondary">Order is not found. You can create new!</h1>
                    <div data-radium="true" style="margin-top: 20px; text-align: center;">
                        <router-link :to="{name:'home'}" data-bypass="false"
                                     class="ic-btn ic-btn-success ic-btn-lg go-shop-now"
                                     data-radium="true"
                                     style="font-size: 18px !important;   background-color: rgb(67, 176, 42);border-color: rgb(67, 176, 42); padding: 9px 18px;line-height: 1;width: 151px;height: 40px;color: white !important;border-radius: 4px;margin-bottom: 0;font-weight: 600;text-align: center;vertical-align: middle;touch-action: manipulation;cursor: pointer;background-image: none; border: 1px solid transparent; white-space: nowrap;">
                            Shop now
                        </router-link>
                    </div>
                </div>
            </div>
        </section>
        <green-loader v-show="showOrderLoader"></green-loader>
        <OrderDeliveryTimeSlot :orderDeliverySlots="orderDeliverySlots" :order="order"></OrderDeliveryTimeSlot>
        <AddItemsToOrder :outlet_order_id="outlet_order_id" :outlet_item_id="outlet_item_id"
                         :order_list="orderDetails"></AddItemsToOrder>
    </div>
</template>

<script>
    import HomeHeader from "../../components/HomeHeader";
    import HelpHeaderHome from "../helps/HelpHeaderHome";
    import Cookies from "js-cookie";
    import AddItemsToOrder from "../../components/AddItemsToOrder";
    import {helpers} from "../../mixins/helpers";
    import OrderDeliveryTimeSlot from "../../components/OrderDeliveryTimeSlot";
    import GreenLoader from "../../components/GreenLoader";

    export default {
        name: "Order",
        middleware: 'auth',
        mixins: [helpers],
        data() {
            return {
                order_id: '',
                orderData: {},
                userData: {},
                outlet_item_id: 0,
                orderDetails: {},
                showOrderLoader: false,
                language: Cookies.get('languageId'),
                orderDeliverySlots: {},
                delivery_new_date: '',
                delivery_new_time: '',
                changedDate: false,
                order: {},
                outlet_order_id: 0,
                showNoResult: false,
            }
        },
        components: {
            GreenLoader,
            OrderDeliveryTimeSlot,
            AddItemsToOrder,
            HelpHeaderHome,
            HomeHeader
        },
        methods: {
            cancelOrderModal() {
                this.$bvModal.msgBoxConfirm('Do you want to cancel order?', {
                    size: 'md',
                    buttonSize: 'md',
                    cancelVariant: 'info',
                    okVariant: 'danger',
                    okTitle: 'YES',
                    cancelTitle: 'NO',
                    footerClass: 'text-center p-2',
                    hideHeaderClose: false,
                    centered: true,
                    bodyClass: ['text-center font-weight-bolder']
                })
                    .then(value => {
                        if (value) {
                            this.$ga.event('Cancel Order' , 'canceled' , 'canceled', this.orderDetails.overall_total);
                            this.cancelOrder();
                        }
                    })
                    .catch(err => {

                    })
            },
            errorSrc(event) {
                event.target.src = "/images/no_image.jpg"
            },
            getOrder() {
                this.showOrderLoader = true;
                axios.post(apiDev + '/order-detail', {
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    order_id: this.order_id
                }).then(response => {
                    if (response.data.response.order_detail.hasOwnProperty('order_id')) {
                        let order = response.data.response;
                        this.orderDetails = {
                            address: order.user_selected_address.address,
                            mobile: order.user_detail.mobile,
                            pay_info: order.user_selected_payment_method.name,
                            order_list: order.order_detail.order_list,
                            overall_subtotal: order.order_detail.overall_subtotal,
                            overall_delivery_total: order.order_detail.overall_delivery_total,
                            overall_total: order.order_detail.overall_total,
                        };
                        if (order.order_detail.promo_code_details !== null) {
                            this.orderDetails.promo_total = order.order_detail.overall_promo_total_amount;
                        }
                        this.outlet_order_id = this.orderDetails.order_list[0].orders_outlets_id;

                    } else {
                        this.showNoResult = true;
                    }
                    this.showOrderLoader = false;
                }).catch(error => {

                })
            },

            dateChange: function (date) {
                return moment(date, 'DD-MM-YYYY').format("ll");
            },

            addItemToCart(outletItemId, product_list) {
                let _this = this;
                var time = 0;
                let messages = '';
                let productCount = product_list.length
                product_list.filter(function (product, index) {
                    setTimeout(function () {
                        axios.post(apiDev + '/add-cart', {
                            language: Cookies.get('languageId'),
                            user_id: _this.userData.user_id,
                            token: _this.userData.token,
                            outlet_id: product.outlet_id,
                            outlet_item_id: product.outlet_item_id,
                            quantity: 1,
                            notes: ''
                        }).then(response => {
                            if (response.data.response.httpCode == 200) {
                                bus.$emit('showTo', product);
                                bus.$emit('addToCart', response.data.response.cart_count);
                                bus.$emit('add-item-to-cart', true);
                                this.$ga.event('Add To Cart', 'added', 'added to cart', product.our_selling_price);
                            }
                            if (productCount === index + 1) {
                                _this.$bvToast.toast(response.data.response.Message, {
                                    title: 'Basket',
                                    autoHideDelay: 5000,
                                    toaster: 'b-toaster-bottom-left',
                                    appendToast: true
                                });
                            }
                        }).catch(error => {

                        })

                    }, time);
                    time += 200;
                });
            },

            cancelOrder() {
                let orders_outlets_id = this.orderDetails.order_list;
                orders_outlets_id.forEach((outlet, index) => {
                    axios.post(apiDev + '/customer-cancel-order-outlet', {
                        user_id: this.userData.user_id,
                        orders_outlets_id: outlet.orders_outlets_id,
                        token: this.userData.token,
                    }).then(response => {
                        if (response.data.response.httpCode === 200 && orders_outlets_id.length === index + 1) {
                            this.$ga.event('Cancel Order', 'canceled', 'canceled', this.order.overall_total);
                            this.$router.push({name: 'home'});
                        }
                    }).catch(error => {

                    })
                });

            },

            openOrderTimeSlotModal(order) {
                this.order = order
                axios.post(apiDev + '/cart-outlet-delivery-slot-order', {
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    order_id: this.order_id,
                    language: this.language,
                    country_id: this.userData.country_id,
                    city_id: this.userData.city_id,
                    outlet_id: order.outlet_id,
                    orders_outlets_id: order.orders_outlets_id,
                }).then(response => {
                    this.orderDeliverySlots = response.data.response.outlet_delivery_slot
                    this.showOrderLoader = false
                }).catch(error => {

                })

            },

            addItemtoOrder(outlet) {
                this.outlet_item_id = outlet;
                this.$bvModal.show('addItem');
            },

        },

        created() {
            this.order_id = this.$route.params.id;
            this.userData = JSON.parse(Cookies.get('userData')).userData;
            this.getOrder();

        },

        mounted() {
            this.$ga.event('pageview', 'order/' + this.order_id);
            this.$root.$on('bv::modal::hide', () => {
                this.getOrder();
            });
            bus.$on('changedDeliveryTime', (data) => {
                this.changedDate = true;
                this.delivery_new_date = data.delivery_date;
                this.delivery_new_time = data.delivery_time;

            });
        },
    }
</script>

<style scoped>
    .emptyMessage {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        bottom: 0;
    }

    .account_common_list {
        margin: 50px 0;
    }

    .menu-buttons {
        margin: 5px;
        height: 40px;
        padding: 5px;
    }

    .menu-buttons:hover, .menu-buttons:active {
        background-color: #d7e3e2;
        transition-duration: .5s;
    }

    .product-col {
        line-height: 10px;
    }

    .ref_inf_sec, .ref_inf_counts, .ref_inf_prices {
        font-size: 14px;
    }

    .order-summary-header {
        font-weight: 300 !important;
    }

    .new_refunds_list p {
        font-size: 14px;
    }

    .ref_inf_prices {
        font-weight: 700;

    }
</style>
