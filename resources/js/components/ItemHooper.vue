<template>
    <div>
        <hooper style="height: 320px" :settings="hooperSettings">
            <slide v-bind:key="product.product_id" v-for="product in products" class="text-center">
                <div aria-live="polite">
                    <div class="slick-track" style="opacity: 1; width: 2720px; transform: translate3d(0px, 0px, 0px);">
                        <div class="col-md-2 col-lg-2 col-sm-4 col-xs-6 padding0"
                             style="width: 272px;">
                            <div class="items_list">
                                <div class="items_img items385488 ">
                                    <div>
                                        <a href="javascript:void(0)" title="" tabindex="0" @click="singleProduct(product)">
                                            <img class="prod_img_tag m-0 m-auto"
                                                 v-bind:src="product.product_image"
                                                 alt="" height="110" width="110"
                                                 @error="errorSrc">
                                        </a>
                                        <div class="item-quantity" data-radium="true">
                                            <span class="item-quantity-amount" data-radium="true">
                                                <span class="item-qty" data-radium="true"> 0</span>
                                             </span>
                                            <span class="item-quantity-label" data-radium="true">in cart</span>
                                        </div>
                                    </div>
                                    <button type="button"
                                            @click.once="addItemToCart(product, 1)"
                                            class="show-hide-plus btn-plus button-plus-new "
                                            tabindex="0"
                                            v-if="product.product_cart === 0">
                                        <svg width="18px"
                                             height="18px"
                                             viewBox="0 0 24 24"
                                             aria-hidden="true"
                                             fill="currentColor">
                                            <path d="M13 5.007C13 4.45 12.552 4 12 4c-.556 0-1 .451-1 1.007V11H5.007C4.45 11 4 11.448 4 12c0 .556.451 1 1.007 1H11v5.993c0 .557.448 1.007 1 1.007.556 0 1-.451 1-1.007V13h5.993C19.55 13 20 12.552 20 12c0-.556-.451-1-1.007-1H13V5.007z"></path>
                                        </svg>
                                    </button>
                                    <div
                                        @click="openItemBlock(product.outlet_item_id)"
                                        class="item-quantity-small"
                                        data-radium="true"
                                        v-if="product.product_cart === 1">
                                        <span class="item-qty" data-radium="true">
                                            {{product.cart_qty}}
                                            <span v-if="product.sold_per === 2 || product.sold_per === 3">{{ product.unit }}</span>
                                        </span>
                                    </div>
                                    <div class="inner_add_carts hide-plus-circle innerAddCarts"
                                         v-bind:class="[open === product.outlet_item_id ? 'addItem' : '']"
                                         v-bind:id="product.item_product_id"
                                         @mouseleave="updateCount(product , product.cart_qty)"
                                    >
                                        <button style="float: left"
                                                @click="changeCartCount(product, product.cart_qty , false)"
                                                class="btn btn-inverse cart_add_btn"
                                                v-if="product.cart_qty >1"
                                                tabindex="0">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                        <button style="float: left"
                                                v-else
                                                @click="removeItem(product)"
                                                class="btn btn-inverse cart_add_btn"
                                                tabindex="0">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                        <div class="cart_product_incr">
                                            {{product.cart_qty}}
                                        </div>
                                        <button class="btn btn-inverse cart_add_btn"
                                                @click="changeCartCount(product, product.cart_qty , true)"
                                                tabindex="0">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="items_info items-info-new-style">
                                    <a href="javascript:void(0)" title="" tabindex="0">
                                        <h3 v-if="product.status_available === 0">OUT OF STOCK</h3>
                                        <div v-else>
                                            <div class="col-12 d-inline p-0">
                                                <h3 class="d-inline-block" v-bind:class="{'text-danger': product.promo_item}">
                                                    JD
                                                    {{product.approx_weight > 0 ? parseFloat(product.our_selling_price*product.approx_weight).toFixed(2) : product.our_selling_price}}
                                                    <span v-if="product.sold_per === 3 || product.sold_per === 4">each</span>
                                                    <span v-if="product.sold_per === 2"> / kg</span>
                                                </h3>
                                                <p class="d-inline-block col-12 col-lg-6 col-md-6 text-secondary p-0 mb-0" v-if="product.promo_item == 1">
                                                    <s>JD {{product.original_price}}</s>
                                                </p>
                                            </div>
                                            <br>
                                            <div class="badge badge--sale"
                                                 v-if="product.promo_item == 1">
                                                {{product.display_saving_per_unit}}
                                            </div>
                                        </div>
                                    </a>
                                    <h5 class="">
                                        <a href="javascript:void(0)" title="" tabindex="0"></a>
                                        <a class="pro-name" href="javascript:void(0)" title=""
                                           tabindex="0">
                                            <h4>{{product.product_name}}</h4>
                                            <h4 v-if="product.sold_per === 3">JD {{product.our_selling_price}} /  {{product.unit}}</h4>
                                        </a>
                                        <span>
                                            <span>
                                                 <span class="item-per-new-style" v-if="product.label_value>0">{{product.label_value}} {{product.unit}}</span>
                                            </span>
                                        </span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </slide>
            <hooper-navigation slot="hooper-addons"></hooper-navigation>
        </hooper>
    </div>
</template>

<script>
    import Cookies from "js-cookie";
    import {helpers} from '../mixins/helpers'
    import {
        Hooper,
        Slide,
        Navigation as HooperNavigation
    } from 'hooper';
    export default {
        name: "ItemHooper",
        props: ['products', 'type', 'hooperSettings'],
        mixins: [helpers],
        data() {
            return {
                userData:{},
                language: Cookies.get('languageId'),
                open:0
            };
        },
        components: {
            Hooper,
            Slide,
            HooperNavigation,
        },
        methods: {
            errorSrc(event){
                event.target.src = "/images/no_image.jpg"
            },
            singleProduct(product) {
                bus.$emit('showProductDetailModal', product)
            },

            addItemToCart(item, cartQty) {
                axios.post(apiDev + '/add-cart', {
                    language: Cookies.get('languageId'),
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    outlet_id: this.userData.outlet_id ? this.userData.outlet_id : 67,
                    outlet_item_id: item.outlet_item_id,
                    quantity:  cartQty,
                    notes: ''
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        bus.$emit('add-item-to-cart', true);
                        this.$ga.event('Add To Cart' , 'added' , 'added to cart' , item.our_selling_price);
                        bus.$emit('showTo', item);
                        bus.$emit('addToCart', response.data.response.cart_count);
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        });
                    }

                    if (response.data.response.httpCode == 400) {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        })
                    }
                    this.showLoader = false;
                }).catch(error => {
                    this.showLoader = false;
                })
            },

            updateCount(item , Qty){
                this.open = 0;
                if(Qty > 1 && Qty < 999){
                    this.addItemToCart(item , Qty);
                }else if (Qty > 999){
                    this.$bvToast.toast("Cart quantity must be more 0 and less than 999", {
                        title: 'Basket',
                        autoHideDelay: 5000,
                        toaster: 'b-toaster-bottom-left',
                        appendToast: true
                    });
                }
            },


            removeItem(product) {
                let _this = this;
                axios.post(apiDev + '/delete-user-cart', {
                    language: _this.language,
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    cart_detail_id: product.cart_detail_id
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        this.open = 0;
                        bus.$emit('removeItemCart', this.type);
                        _this.getCartList();
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        });
                    }
                }).catch(error => {

                })

            },


            changeCartCount(item, cartQty, operator){
                if(cartQty >= 1 && cartQty < 1000){
                    operator ? ++cartQty : --cartQty;
                    item.cart_qty = cartQty;
                }

            },

            openItemBlock(id) {
                this.open = id;
            },
        },

        created(){

        },

        mounted(){
            this.userData = JSON.parse(Cookies.get('userData')).userData
        }
    }
</script>

<style scoped>
    .discount {
        font-size: 15px !important;
        margin-left: 4px !important;
        font-weight: 400 !important;
        text-decoration: line-through;
        color: #757575 !important;

    }
    .item-quantity-small{
        height: 25px;
        width: 25px;
        padding: 4px 5px;
    }
    .badge.badge--sale {
        height: 20px;
        margin: 0 auto;
        text-align: center;
        font-weight: 600;
        font-size: 14px;
        margin-left: 1px;
        background-color: #E8104A;
        color: #fff;
        max-width: 90px;
        margin-top: 4px;
        margin-bottom: 3px;
        border-radius: 12px;
    }

    .delivery_promotional_banner img {
        border-radius: 6px;
        padding: 5px;
        width: 100%;
        height: 275px !important;
        object-fit: cover;
        object-position: top;
    }

    .button-plus-new {
        background-color: white;
        color: rgb(46, 137, 19);
        border: 1px solid rgb(46, 137, 19);
    }

    .items-info-new-style {
        color: #6c6c6c;
    }

    .item-per-new-style {
        font-size: 13px !important;
    }

    .div-new-style {
        height: 350px;
    }

    @media only screen and (max-width: 600px) {
        .div-new-style {
            height: 255px;
        }
    }

    @media only screen and (max-width: 450px) {
        .mobile-banner-image {
            display: block !important;
        }

        .web-banner-image {
            display: none;
        }
    }

    /*.hide-plus-circle {*/
    /*    display: inline-block !important;*/
    /*}*/

    .items_list .items_img .inner_add_carts {
        left: 0px;
    }
    .cart_product_incr{
        display: inline-block;
        vertical-align: middle;
        height: 100%;
        padding: 7px;
        font-size: 17px;
    }
    .items_list .btn-warning {
        background: 0 0;
        border: none;
        float: left;
        color: #e8104a;
        padding: 0;
        display: none;
    }

    .items_list .btn.btn-inverse {
        font-weight: 700;
        letter-spacing: .1em;
        line-height: 20px;
        padding: 6px 10px;
        text-decoration: none;

        text-transform: uppercase;
        background-color: var(--theme-color);
        border-color: var(--theme-color);
        color: #fff;
        float: right;
        margin-bottom: 15px;
    }

    .items_info h3 {
        display: inline-block;
        margin-bottom: 3px;
        color: black;
        font-size: 16px;
        font-weight: 600;
    }

    .items_info h4 {
        padding: 3px 0 2px;
        font-size: 13px;
        font-weight: 400;
        line-height: 1.2em;
        color: #5a5a5a;
        max-width: 165px;
    }

    .items_info h5 {
        font-size: 12px;
        color: #999;
        font-weight: 400;
    }
</style>
