<template>
    <div>
        <div id="mySidenav" class="sidenav pt-0">

            <ul class="mobimenu pl-0">
                <div class="cart_menu_all form-inline">
                    <h2 class="cart_title-mobimenu">My Carts</h2>
                    <div class="center_head">
                        <h4 class="static_text-center_head">Personal Cart</h4>
                        <div class="shop_city_loc">
                            <span>
                                Shopping in
                                    <span v-if="location.id == userData.location_id"
                                          v-for="location in locationList">{{location.zone_name}}</span>
                            </span>
                        </div>
                    </div>
                    <a href="javascript:void(0)"
                       class="btn btn btn-outline-success mr-3"
                       @click="closeCart()">
                        <i class="text-success">&times;</i> Close
                    </a>
                </div>
                    <div class="cart_top_header_common">
                    <div class="cart_item_store_wrapper" v-for="cart in cartList" v-if="!undefinedCart">
                        <div class="cart_top_header" style="padding: 12px 12px 13px 12px;">
                            <a href="javascript:void(0)"
                               class="d-block add_noteto_shopper_oncart remove-item fixed_clear_cart"
                               @click="clearBasket(cart.outlet_id)">
                                <i class="far fa-trash-alt"></i> Clear Basket</a>
                                    <span class="price-well-cart">
                                        <img v-bind:src="cart.logo_image" v-bind:alt="cart.outlet_name"
                                             height="50" width="50">

                                    </span>
                            <span class="out_info_wrap">
                                    <span class="Cake_info">
                                        {{cart.outlet_name}}
                                        <span class="next-available">
                                            <span v-if="cart.next_delivery_time_slot.available === 0">No delivery is present in your city and area</span>
                                            <span id="modal_time" v-else>Next Delivery: {{ cart.next_delivery_time_slot.delivery_date }} {{ cart.next_delivery_time_slot.delivery_time }}</span>
                                            <i class="ic-icon-info"></i>
                                        </span>
                                    </span>
                            </span>
                            <span class="price-well">
                         JD {{ parseFloat(cart.outlet_subtotal).toFixed(2) }}
                        </span>
                        </div>
                        <div class="cart_listing_hed">
                            <table class="cart_listing_hed-table-cart-table">
                                <tr class=" cart_item_row" v-for="item in cart.product_lsit">
                                    <td class="item-clickable"
                                        style="cursor: pointer; padding: 10px 2px 10px 10px; width: 12%;">
                                        <img v-bind:src="item.product_image" v-bind:alt="item.product_name"
                                             width="60" @error="errorSrc" class="item-clickable-image-bloack-width-height-all-get">

                                    </td>
                                    <td class="link_info" style="width: 55%;">
                                        <div class="col-5 p-0 d-inline">
                                            <p @click="singleProduct(item)" class="product_name_cart_component-by-cart"> {{item.product_name}} </p>
<!--                                            <p class="text-decoration-none text-dark" v-else> {{item.product_name}} </p>-->
                                        </div>
                                        <span class="item-size">
                                             <span>
                                                <span v-if="item.status_available === 0">OUT OF STOCK</span>
                                                 <span v-else class="item-per-new-style">
                                                     <span v-if="item.sold_per === 3">JD {{ parseFloat(item.our_selling_price*item.approx_weight).toFixed(2)}}</span>
                                                     <span v-else>JD {{parseFloat(item.our_selling_price).toFixed(2)}}</span>
                                                     - {{ item.sold_per == 1 || item.sold_per == 4 || item.unit === 'Unit'  ?  'per 1  pc.': item.sold_per  === 3 ? 'each': '1 kg' }}
                                                 </span>
                                             </span>
                                        </span>
                                        <span class="item-size remove-cell">
                                            <a v-if="item.item_type === 1" class="add_noteto_shopper_oncart remove-item"
                                               href="javascript:void(0)" @click="editInstruction(item)">
                                                <i class="far fa-edit"></i> Instructions </a>

                                            <a class="remove-item" href="javascript:void(0)"
                                               @click="removeItem(item.cart_detail_id)">
                                                <i class="far fa-trash-alt"></i> Remove</a>
                                        </span>
                                    </td>
                                    <td class="count_cart">
                                        <span class="direct_view">
                                             <div class="cart_qty_btw_ud">
                                                 <span>{{item.cart_qty}}</span>
                                                 <span v-if="item.sold_per === 2 && item.unit !== 'Unit' || item.sold_per === 3">kg</span>
                                             </div>
                                        </span>
                                        <span class="hover_view">
                                             <a class="qty-disabled up-down_down-btn decrease_cart_button"
                                                href="javascript:void(0)" role="button">
                                               </a>
                                             <div class="cart_qty_btw_ud"
                                                  style="border: none;">{{item.cart_qty}}</div>
                                                 <a class="change-qty-qty-inc up-down_up-btn increase_cart"
                                                    href="javascript:void(0)" role="button">
                                                     <i class="fa fa-plus"></i>
                                                 </a>
                                         </span>
                                    </td>
                                    <td class="price" style="width: 13.5%;">
                                        <div style="color: rgb(230, 0, 61)"></div>
                                        <span class="discount-card" v-if="item.hasOwnProperty('outlet_item_total_selling') && item.outlet_item_total_selling !== ''">JD {{ parseFloat(item.outlet_item_total_selling).toFixed(2) }}</span>
                                        <span class="discount-card" v-else>JD {{ parseFloat(item.our_selling_price*item.cart_qty).toFixed(2) }} </span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="cart-empty-wrapper" v-if="undefinedCart"
                         data-radium="true"
                         style="padding-top: 40px; padding-bottom: 40px; background-color: rgb(247, 247, 247); min-height: 90vh;"
                    >
                        <div class="cart-icon-wrapper" data-radium="true"
                             style="height: 67px; padding: 12px 15px; display: flex;">
                            <svg width="24px" height="24px" viewBox="0 0 24 24" aria-hidden="true"
                                 fill="currentColor"
                                 style="height: 64px; width: 64px; margin: 0px auto; color: rgb(189, 189, 189);">
                                <path
                                    d="M6.316 18c1.39 0 2.526 1.125 2.526 2.5S7.705 23 6.316 23c-1.39 0-2.527-1.125-2.527-2.5S4.926 18 6.316 18zm0 1c-.84 0-1.527.68-1.527 1.5S5.476 22 6.316 22c.84 0 1.526-.68 1.526-1.5S7.155 19 6.316 19zm11.368-1c1.39 0 2.527 1.125 2.527 2.5S19.074 23 17.684 23c-1.39 0-2.526-1.125-2.526-2.5s1.137-2.5 2.526-2.5zm0 1c-.84 0-1.526.68-1.526 1.5s.687 1.5 1.526 1.5c.84 0 1.527-.68 1.527-1.5s-.687-1.5-1.527-1.5zM5.305 15.75l15.537-.5c.38 0 .632.25.632.625s-.253.625-.632.625l-16.42.5c-.38.125-.759-.375-.633-.75l.758-2.375c.253-.625.253-1.125.127-1.75L3.41 5.25c-.127-.625-.632-1-1.264-1H.632C.252 4.25 0 4 0 3.625S.253 3 .632 3h22.105C23.495 3 24 3.5 24 4.25v7.125c0 .625-.505 1.125-1.137 1.25L5.684 14.5l-.379 1.25zm17.364-4.106c.21-.042.331-.17.331-.269V4.25c0-.195-.055-.25-.263-.25H3.872c.254.288.437.65.522 1.07l1.26 6.857c.117.582.138 1.083.05 1.565l16.965-1.848z"></path>
                            </svg>
                        </div>
                        <div data-radium="true"
                             style="margin-top: 20px; text-align: center; font-size: 20px; font-weight: 600;">Your
                            personal cart is empty
                        </div>
                        <div data-radium="true" style="margin-top: 20px; text-align: center;">
                            <a href="" data-bypass="false"
                               class="ic-btn ic-btn-success ic-btn-lg go-shop-now mr-2"
                               data-radium="true"
                               @click="closeCart()"
                               style="font-size: 18px !important;   background-color: rgb(67, 176, 42);border-color: rgb(67, 176, 42); padding: 9px 18px;line-height: 1;width: 151px;height: 40px;color: white !important;border-radius: 4px;margin-bottom: 0;font-weight: 600;text-align: center;vertical-align: middle;touch-action: manipulation;cursor: pointer;background-image: none; border: 1px solid transparent; white-space: nowrap;">
                                Shop now</a>
                        </div>
                    </div>

                   </div>
                <div class="free_common_related">
                    <div class="checkout_buttons checkout-btn-disabled"
                         @click="checkout()"
                         style="">
                        <a href="javascript:void(0)"
                           class="btn btn-success btn-checkout_buttons-success" title="Subtotal"
                           v-bind:class="{'disabled' : cartSubtotal < 0.01}"
                           style="">Checkout</a>
                        <div class="price-well-new"
                             v-if="cartSubtotal"
                             style="background: linear-gradient(rgba(20, 20, 20, 0.2), rgba(20, 20, 20, 0.2)) !important;">
                            JD {{parseFloat(cartSubtotal).toFixed(2)}}
                        </div>
                        <div class="price-well-new"
                             v-else
                             style="background: linear-gradient(rgba(20, 20, 20, 0.2), rgba(20, 20, 20, 0.2)) !important;">
                             0.00 JD
                        </div>
                    </div>
                </div>
            </ul>
        </div>
        <ConfirmationModalComponent></ConfirmationModalComponent>
    </div>
</template>

<script>
    import ConfirmationModalComponent from '../components/ConfirmationModal';
    import ProductDetails from "./productDetails";
    import Cookies from 'js-cookie';

    export default {
        name: "CartComponent",
        data() {
            return {
                userData: [],
                cartList: [],
                language: Cookies.get('languageId'),
                countryId: 46,
                cartLength: false,
                undefinedCart: false,
                cartSubtotal: 0,
                ordersOutletsId: [],
                product: {},
                locationList: [],
            };
        },
        components: {
            ProductDetails,
            ConfirmationModalComponent
        },

        methods: {
            errorSrc(event) {
                event.target.src = "/images/no_image.jpg"
            },
            closeCart() {
                bus.$emit('closeCart', true);
                this.$root.$emit('bv::hide::modal', 'product-instruction-edit');
            },
            singleProduct(product) {
                bus.$emit('showProductDetailModal', product);
                this.closeCart();
            },
            getCartList() {
                let _this = this;
                bus.$emit('showLoader', 'show');
                axios.post(apiDev + '/user-cart-list', {
                    language: _this.language,
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    country_id: _this.countryId,
                    city_id: _this.userData.city_id,
                    location_id: _this.userData.location_id,
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        this.cartSubtotal = 0;
                        _this.cartList = response.data.response.cart_list;
                        for (var i = 0; i < _this.cartList.length; i++) {
                            _this.cartSubtotal += _this.cartList[i].outlet_subtotal;
                        }
                        if (_this.cartList.length == 0) {
                            _this.undefinedCart = true;
                        }
                        for (var t = 0; t < response.data.response.cart_list.length; t++) {
                            if (_this.ordersOutletsId == 0) {
                                _this.ordersOutletsId.push(response.data.response.cart_list[t]);
                            }
                        }

                    }
                    bus.$emit('showLoader', 'hide')
                }).catch(error => {
                    bus.$emit('showLoader', 'hide')
                })
            },

            getLocationList() {
                let _this = this;
                axios.post(apiDev + '/location-list', {
                    language: _this.language,
                    city_id: _this.userData.city_id
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.locationList = response.data.response.location_list;
                    }
                }).catch(error => {

                })
            },

            removeItem(id) {

                let _this = this;
                axios.post(apiDev + '/delete-user-cart', {
                    language: _this.language,
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    cart_detail_id: id
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.getCartList();
                        bus.$emit('removeItemCart', true)
                    }
                }).catch(error => {

                })

            },
            clearBasket(id) {
                let _this = this;
                axios.post(apiDev + '/delete-all-user-cart', {
                    language: _this.language,
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    outlet_id: id
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        bus.$emit('closeCartClear', true)
                    }

                    this.getCartList();
                }).catch(error => {

                })
            },
            checkout() {
                if (this.cartSubtotal) {
                    if (this.ordersOutletsId !== 0) {
                        bus.$emit('ordersOutletsId', this.ordersOutletsId);
                        $('#confirmationModal').modal('show')
                    } else {
                        this.$router.push({name: 'checkout'})

                    }
                }


            },
            editInstruction(product) {
                this.product = product;
                this.$root.$emit('changeProduct', {product: product, type: 'cartComponent'});
                this.$bvModal.show('product-instruction-edit');
            }

        },
        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.getCartList();
            this.getLocationList();
            bus.$on('updateInstruction', (data) => {
                if (data.type === 'cartComponent') {
                    this.getCartList();
                }
            });
        },
        created() {
            bus.$on('removeBasketFromConfirmationModal', (outlet_id) => {
                if (outlet_id) {
                    this.clearBasket(outlet_id)
                }
            });
        },
    }
</script>

<style scoped>
    .item-clickable img {
        height: 65px;
        width: 65px !important;
    }

    .close-cart {
        border: 1px solid var(--theme-color);
        border-radius: 4px;
        margin: 10px 15px 0;
        text-transform: capitalize;
        padding: 8px 8px 8px -2px !important;
    }

    .sidenav {
        height: 100%;
        position: fixed;
        z-index: 9999;
        top: 0;
        right: 0;
        background-color: white;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .cart_qty_btw_ud {
        width: 37%;
    }

    .link_info {
        cursor: pointer;
        width: 38% !important;
    }

    .link_info > p{
        width: 100%;
        display: inline-block;
        text-overflow: ellipsis;
        overflow: hidden;
    }

    .checkout_buttons {
        display: block;
        width: 517px;
        border-top: none !important;
    }

    .checkout_buttons > a {
        width: 480px;
        text-align: center
    }

    @media (max-width: 600px) {
        .mobimenu {
            width: 100% !important;
            border-left: solid 1px #efefef;
            right: -520px !important;
        }

        .center_head {
            margin: 0px 0px 0px 0px;
        }

        .checkout_buttons {
            width: 375px;
        }

        .checkout_buttons > a {
            width: 330px;
        }

        a.mnuclose.ion-close-round {
            float: left;
            text-align: center;
            width: 50px;
            margin: 14px 5px 10px 11px;
            padding: 6px 0px;
            font-size: 14px;
        }
    }
</style>
