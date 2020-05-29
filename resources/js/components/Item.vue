<template>
    <div class="row">
        <div v-bind:class="[type === 'addItemToOrder' ? 'col-lg-4' : 'col-lg-3']" class="col-md-6 col-sm-6 col-xs-12"  v-for="(item, index) in products">
            <div class="items_list">
                <div class="items_img items385488">
                    <div>
                        <a href="javascript:void(0)" title="" tabindex="0" @click="singleProduct(item)">
                            <img class="prod_img_tag"
                                 :src="item.product_image" alt=""
                                 height="110" width="110"
                                @error="errorSrc"
                            >
                        </a>
                        <div class="item-quantity-itemLIst" data-radium="true">
                            <span class="item-quantity-amount" data-radium="true">
                                <span class="item-qty" data-radium="true"> 0</span>
                            </span>
                            <span class="item-quantity-label"
                                  data-radium="true">
                                in cart
                            </span>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="button"
                                @click.once="addItemToCart(item, 1)"
                                class="show-hide-plus btn-plus button-plus-new"
                                :data-product='index+"-product"'
                                tabindex="0"
                                v-if="item.cart_qty === 0">
                            <svg width="18px"
                                 height="18px"
                                 viewBox="0 0 24 24"
                                 aria-hidden="true"
                                 fill="currentColor">
                                <path d="M13 5.007C13 4.45 12.552 4 12 4c-.556 0-1 .451-1 1.007V11H5.007C4.45 11 4 11.448 4 12c0 .556.451 1 1.007 1H11v5.993c0 .557.448 1.007 1 1.007.556 0 1-.451 1-1.007V13h5.993C19.55 13 20 12.552 20 12c0-.556-.451-1-1.007-1H13V5.007z">

                                </path>
                            </svg>
                        </button>
                        <div @click="openItemBlock(item.outlet_item_id)"
                             class="item-quantity-small" data-radium="true"
                             v-show="item.cart_qty >= 1"
                             :data-block='index+"-block"'
                             style="right: 0"
                        >
                        <span>
                            <span class="item-qty" data-radium="true">
                                {{item.cart_qty}}
                                <span v-if="item.sold_per === 2||  item.sold_per === 3">{{ item.unit }}</span>
                            </span>
                        </span>
                        </div>

                    </div>


                    <div class="inner_add_carts hide-plus-circle innerAddCarts"
                         v-bind:class="[open === item.outlet_item_id ? 'addItem' : '']"
                         v-bind:id="item.outlet_item_id"
                         @mouseleave="updateCount(item , item.cart_qty)"
                    >
                        <button style="float: left"
                                v-if="item.cart_qty >1"
                                @click="changeCartCount(item, item.cart_qty , false)"
                                class="btn btn-inverse cart_add_btn"
                                tabindex="0">
                            <i class="fa fa-minus"></i>
                        </button>
                        <button style="float: left"
                                v-else
                                @click="removeItem(item)"
                                class="btn btn-inverse cart_add_btn"
                                tabindex="0">
                            <i class="fa fa-trash-alt"></i>
                        </button>
                        <div class="cart_item_incr">
                            {{item.cart_qty}}
                        </div>
                        <button class="btn btn-inverse cart_add_btn"
                                @click="changeCartCount(item, item.cart_qty , true)"
                                tabindex="0">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="items_info items-info-new-style p-0">
                    <a href="javascript:void(0)" title="" tabindex="0">
                        <h3 v-if="item.status_available === 0">OUT OF STOCK</h3>
                        <div v-else>
                            <div class="row d-inline p-2">
                                <h3 class="d-inline-block" v-bind:class="{'text-danger': item.promo_item}">
                                    JD
                                    {{item.approx_weight > 0 ? parseFloat(item.our_selling_price*item.approx_weight).toFixed(2) : item.our_selling_price}}
                                    <span v-if="item.sold_per === 3 || item.sold_per === 4">each</span>
                                    <span v-if="item.sold_per === 2"> / kg</span>
                                </h3>
                                <p class="d-inline-block col-12 col-lg-6 col-md-6 text-secondary p-0 ml-2 mb-0" v-if="item.promo_item == 1">
                                    <s>JD {{item.original_price}}</s>
                                </p>
                            </div>
                            <br>
                            <div class="badge badge--sale"
                                 v-if="item.promo_item == 1">
                                {{item.display_saving_per_unit}}
                            </div>
                        </div>
                    </a>
                    <h5 class="">
                        <a href="javascript:void(0)" title=""
                           tabindex="0"></a>
                        <a class="pro-name" href="javascript:void(0)"
                           title="" tabindex="0">
                            <h4>{{item.product_name}}</h4>
                            <h4 v-if="item.sold_per === 3">JD {{item.our_selling_price}} /  {{item.unit}}</h4>
                        </a>
                        <span>
                            <span>
                                 <span class="item-per-new-style" v-if="item.label_value>0">{{item.label_value}} {{item.unit}}</span>
                            </span>
                        </span>
                    </h5>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Cookies from "js-cookie";
    import {helpers} from '../mixins/helpers'
    export default {
        name: "Item",
        props: ['products', 'type' , 'outlet_order_id'],
        mixins: [helpers],
        data() {
            return {
                userData:{},
                language: Cookies.get('languageId'),
                open: 0,
                itemsToOrder: {},
                added: []
            };
        },
        methods: {

            errorSrc(event) {
                event.target.src = "/images/no_image.jpg"
            },

            singleProduct(product) {
                if (this.type !== 'addItemToOrder'){
                    bus.$emit('showProductDetailModal', product)
                }
            },

            addItemToCart(item, cartQty, index) {
                if(this.type !== 'addItemToOrder') {
                    axios.post(apiDev + '/add-cart', {
                        language: Cookies.get('languageId'),
                        user_id: this.userData.user_id,
                        token: this.userData.token,
                        outlet_id: item.outlet_id,
                        outlet_item_id: item.outlet_item_id,
                        quantity:  cartQty,
                        notes: ''
                    }).then(response => {
                        if (response.data.response.httpCode == 200) {
                            this.$ga.event('Add To Cart' , 'added' , 'added to cart' , item.our_selling_price);

                            bus.$emit('showTo', item);
                            bus.$emit('addToCart', response.data.response.cart_count);
                            this.$bvToast.toast(response.data.response.Message, {
                                title: 'Basket',
                                autoHideDelay: 5000,
                                toaster: 'b-toaster-bottom-left',
                                appendToast: true
                            });
                            bus.$emit('add-item-to-cart', true)
                        }

                        if (response.data.response.httpCode == 400) {
                            bus.$emit('showTo', item)
                            bus.$emit('addToCart', response.data.response.cart_count);
                            bus.$emit('add-item-to-cart', true)
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
                }else {
                    if(!item.status_available){
                        this.$bvToast.toast("Product " + item.status_available_label, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        });
                        return;
                    }
                    this.itemsToOrder[item.product_id] = {count: cartQty};
                    this.added.push(item.product_id);
                    axios.post(apiDev + '/add-item-to-order', {
                        language: Cookies.get('languageId'),
                        user_id: this.userData.user_id,
                        token: this.userData.token,
                        outlet_item_id: item.outlet_item_id,
                        orders_outlets_id: this.outlet_order_id,
                        quantity:  cartQty,
                    }).then(response => {
                        if (response.data.response.httpCode == 200) {
                            bus.$emit('showTo', item);
                            item.cart_qty = cartQty;
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
                }


            },

            removeItem(item) {
                let _this = this;
                axios.post(apiDev + '/delete-user-cart', {
                    language: _this.language,
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    cart_detail_id: item.cart_detail_id
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        this.open = 0;
                        this.added.splice(this.added.indexOf(item.product_id));
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

            updateCount(item , Qty){
                this.open = 0;
                if(Qty > 1 && Qty < 999){
                    this.addItemToCart(item , Qty);
                }else if(Qty > 999){
                    this.$bvToast.toast("Cart quantity must be more 0 and less than 999", {
                        title: 'Basket',
                        autoHideDelay: 5000,
                        toaster: 'b-toaster-bottom-left',
                        appendToast: true
                    });
                }
            },

            changeCartCount(item, cartQty, operator){
                if(cartQty >= 1 && cartQty < 1000){
                    operator ? ++cartQty : --cartQty;
                    item.cart_qty = cartQty;
                }

            },

            addMoreItemsToCart(item, cartQty) {
                this.addItemToCart(item,  cartQty)
            },

            openItemBlock(id) {
                this.open = id;
            },
        },

        created(){

        },

        mounted(){
            this.userData = JSON.parse(Cookies.get('userData')).userData;
            // bus.$on('addItemToOrder' , data => {
            //    if (data.qty > 1){
            //        this.addItemToCart(data.product ,data.qty);
            //    }
            // });
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
        right: 0;
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



    @media (min-width: 1456px){
        .col-lg-3 {
            -webkit-box-flex: 0;
            flex: 0 0 25%;
             max-width: 16.6%;
        }
    }

    @media (min-width: 768px){
        .col-md-2 {
            -webkit-box-flex: 0;
            flex: 0 0 16.666667%;
            max-width: 33.333333%;
        }
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
