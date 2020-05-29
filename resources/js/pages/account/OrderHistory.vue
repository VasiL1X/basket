<template>
    <div class="account__content order_history_com ">
        <template v-for="order of myOrders">
            <template v-for="outlet of order.order_list">
                <div class="account__content-common order_success">
                    <div class="my_list">
                        <div class="row">
                            <div class="col-md-3 col-sm-4">
                                <p style="color: red" v-if="order.order_list[0].order_status > 9">Order Cancelled</p>
                                <p v-else>Order Placed</p>
                                <label class="date-label">{{dateChange(order.created_date)}}</label>
                            </div>
                            <div class="col-md-2 col-sm-2">
                                <div class="order-info">
                                    <div class="info-name"> Items</div>
                                    <div class="info-value"><label>
                                        {{outlet.outlet_items_count}}
                                    </label></div>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-2">
                                <div class="order-info">
                                    <div class="info-name"> Total</div>
                                    <div class="info-value">
                                        <label> JD {{order.overall_total_amount}} </label></div>
                                </div>
                            </div>
                            <div v-if="outlet.order_status > 9" class="col-md-3 col-sm-2">
                                <router-link :to="{ path: '/account/orders-history-info/'+ outlet.orders_outlets_id }"
                                             class="right_side">View order detail
                                </router-link>
                            </div>
                            <div v-else class="col-md-3 col-sm-2">
                                <router-link :to="{ path: '/store/orders/'+ order.order_id }" class="right_side">
                                    View order detail
                                </router-link>
                            </div>
                        </div>
                    </div>
                    <div class="order_my_list">
                        <div class="row">
                            <div class="col-md-9 col-sm-9">
                                <span class="warehouse-name"> {{ outlet.outlet_name }} </span>
                                <label>- {{ outlet.order_status_name }} </label>
                                <div class="orders_product_images_common">
                                    <div class="orders-product-images">
                                        <ul>
                                            <template v-for="product of outlet.product_list">
                                                 <span :class="'details'+order.order_id" style="display: none;"
                                                       :data-outlet_id="outlet.outlet_id"
                                                       :data-vendor_id="outlet.vendor_id"
                                                       :data-outlet_item_id="product.outlet_item_id"
                                                       :data-cart_qty="product.cart_qty"
                                                       :data-sold_per="product.sold_per"
                                                       :data-product_list="outlet.product_list"
                                                       :data-unit="product.unit">
                                                 </span>
                                                <li>
                                                    <a href="javascript:void(0)"
                                                       :title="product.product_name">
                                                        <img width="50"
                                                             :src="product.product_image"
                                                             @error="errorSrc"
                                                             alt="">
                                                    </a>
                                                </li>
                                            </template>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 text_align_center_new">
                                <button @click="addAllItemsToCart(order.order_id, outlet.product_list)" type="button"
                                        class="btn btn-warning add_order_to_cart_btn fixed_button_isue">
                                    Add all items to cart
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </template>
        <div v-if="loadMoreOrders" class="mb-5">
            <div class="row text-center loader-div" v-if="loader">
                <div class="loader"></div>
            </div>
            <button @click="loadMore" type="button" class="load-more" data-radium="true"
                    style="touch-action: manipulation; cursor: pointer; border: 1px solid transparent; border-radius: 4px; font-weight: 600;
                    white-space: nowrap; user-select: none; -webkit-font-smoothing: antialiased; background-image: none; display: block; align-items:
                    center; padding-left: 16px; padding-right: 16px; font-size: 16px; height: 40px; background-color: rgb(91, 189, 62); color: rgb(255, 255, 255);
                    margin: 0px auto;">
                Load more orders
            </button>
        </div>
    </div>
</template>

<script>
    import Cookies from 'js-cookie';
    import GreenLoader from "../../components/GreenLoader";

    export default {
        name: "orderHistory",
        components: {GreenLoader},
        middleware: 'auth',
        data() {
            return {
                userData: [],
                myOrders: {},
                loadMoreOrders: false,
                count: 10,
                offset: 0,
                loader: false
            };
        },

        methods: {
            getMyOrder() {
                this.loadMoreOrders = false;
                bus.$emit('showGreenLoader', true);
                axios.post(apiDev + '/my-order', {
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    language: this.language,
                    offset: this.offset,
                    count: this.count,
                }).then(response => {
                    this.myOrders = response.data.response.my_order_list;
                    this.loadMoreOrders = true;
                    bus.$emit('showGreenLoader', false);
                }).catch(error => {
                    this.loadMoreOrders = false;
                    bus.$emit('showGreenLoader', false);
                });
            },


            loadMore() {
                this.offset += 10;
                this.loader = true;
                axios.post(apiDev + '/my-order', {
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    language: this.language,
                    offset: this.offset,
                    count: this.count,
                }).then(response => {
                    response.data.response.my_order_list.forEach((value, key) => {
                        this.myOrders.push(value);
                    });
                    this.loader = false;
                }).catch(error => {
                    this.loader = false;
                })
            },

            addAllItemsToCart(id, product_list) {
                let _this = this;
                let time = 0;
                let message = '';
                let productCount = product_list.length;
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
                                bus.$emit('add-item-to-cart', true)
                            }
                            if (index+1 === productCount){
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

            errorSrc(event) {
                event.target.src = "/images/no_image.jpg"
            },

            dateChange: function (date) {
                return moment(date).format("lll");
            },
        },

        created() {
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.getMyOrder();
            bus.$emit('changePage', this.$route.name);

        },

        mounted() {

        }
    }
</script>

<style scoped>
    label {
        font-weight: 700;
    }


    @media (max-width: 767px) {
        .account__content {
            margin-left: 0px !important;

        }
    }

    .btn:hover:not(.disabled):not([disabled]) {
        background-color: #d7e3e2 !important;
        outline: none;
    }

    .loader {
        border: 4px solid #f3f3f3;
        border-radius: 50%;
        border-top: 4px solid #8c8585;
        width: 30px;
        margin: auto;
        margin-bottom: 10px;
        height: 30px;
        -webkit-animation: spin 0.5s linear infinite;
        animation: spin 0.5s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .btn-color {
        background-color: rgb(57, 123, 38);
    }
</style>
