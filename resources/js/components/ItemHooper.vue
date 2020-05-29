<template>
    <div>
        <hooper class="hooper-wrapper" :settings="hooperSettings">
            <slide v-bind:key="product.product_id" v-for="product in products" class="text-center">
                <div aria-live="polite">
                    <div class="slick-track">
                        <div class="item_list-wrapper">
                            <div class="items_list">
                                <div class="items_img">
                                    <div>
                                        <a href="javascript:void(0)" title="" tabindex="0" @click="singleProduct(product)">
                                            <img class="prod_img_tag m-auto"
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
                                         v-bind:class="[open === product.outlet_item_id ? '' : 'addItem']"
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
                                            <div class="col-12 p-0 price__wrapper">
                                                <h3 class="d-inline-block price__sale-current" v-bind:class="{'text-danger': product.promo_item}">
                                                    JD
                                                    {{product.approx_weight > 0 ? parseFloat(product.our_selling_price*product.approx_weight).toFixed(2) : product.our_selling_price}}
                                                    <span v-if="product.sold_per === 3 || product.sold_per === 4">each</span>
                                                    <span v-if="product.sold_per === 2"> / kg</span>
                                                </h3>
                                                <p class="d-inline-block col-12 col-lg-6 col-md-6 text-secondary p-0 mb-0 price__sale-size" v-if="product.promo_item == 1">
                                                    <s>JD {{product.original_price}}</s>
                                                </p>
                                            </div>
                                            <div class="badge badge--sale"
                                                 v-if="product.promo_item == 1">
                                                {{product.display_saving_per_unit}}
                                            </div>
                                        </div>
                                    </a>
                                    <div class="items_info_detail">
                                        <a href="javascript:void(0)" title="" tabindex="0"></a>
                                        <a class="pro-name" href="javascript:void(0)" title=""
                                           tabindex="0">
                                            <h4 class="items_info_name">{{product.product_name}}</h4>
                                            <h4 class="items_info_sold" v-if="product.sold_per === 3">JD {{product.our_selling_price}} /  {{product.unit}}</h4>
                                        </a>
                                        <span>
                                            <span>
                                                 <span class="item-per-new-style" v-if="product.label_value>0">{{product.label_value}} {{product.unit}}</span>
                                            </span>
                                        </span>
                                    </div>
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
        right: 10%;
        top: 10%;
    }
    .badge.badge--sale {
        display: block;
        text-align: center;
        font-weight: 600;
        font-size: 14px;
        margin: 0 0 10px;
        text-transform: lowercase;
        background-color: #E8104A;
        color: #fff;
        max-width: 90px;
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
        color: #61bf3d;
        border: 1px solid #61bf3d;
    }

    .items-info-new-style {
        color: #6c6c6c;
    }

    .div-new-style {
        height: 350px;
    }
    
    /*new styles*/
    .hooper-wrapper {
        position: relative;
        height: 320px;
    }
    .hooper-wrapper::after {
        content: '';
        position: absolute;
        right: 0;
        top: 0;
        height: inherit;
        width: 104px;
        opacity: 0.6;
        background-image: linear-gradient(to top, #ffffff, rgba(255, 255, 255, 0.21));
    }
    .hooper-navigation {
        display: none;
    }
    .hooper:hover .hooper-navigation {
        display: block;
    }
    .price__wrapper {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        font-size: 16px;
        margin-bottom: 10px;
    }
    .price__sale-current {
        margin-right: 10px;
    }
    @media (max-width: 767px) {
         .items_info h3, .items_info p {
            font-size: 13px;
        }
        .hooper-wrapper {
            height: 250px;
            padding-bottom: 10px;
        }
        .hooper-wrapper::after {
            display: none;
        }
        .item-quantity-small, .button-plus-new {
            top: 0;
        }
        .badge.badge--sale {
            font-size: 11px;
            max-width: 72px;
            margin-bottom: 5px;
        }
        .price__wrapper {
            margin-bottom: 5px;
        }
    }
    @media (max-width: 567px) {
        .hooper-wrapper {
            min-height: 200px;
            height: auto;
        }
    }
    
    /*end new styles*/
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
        /*new*/
        
    }

    .hide-plus-circle {
        display: inline-block !important;
    }

    .items_list .items_img .inner_add_carts {
        left: 0px;
    }

    .cart_item_incr {
        display: inline-block;
    }

    .addItem {
        display: none !important;
    }
    .cart_product_incr{
        display: inline-block;
        vertical-align: middle;
        height: 100%;
        padding: 7px;
        font-size: 17px;
    }

</style>
