<template>
    <div>
        <div id="mySidenav" class="cart">
            <div class="cart__wrapper">
            <!--  cart header with title, delivery loction and close button -->
                <div class="cart__header-wrapper">
                    <h3 class="cart__header-descr">My Carts</h3>
                    <div class="cart__header-center">
                        <h4 class="cart__header-title">Personal Cart</h4>
                        <div class="cart__header-location">
                            <span>
                                Shopping in
                                <span v-if="userLocation">{{userLocation}}</span>
                            </span>
                        </div>
                    </div>
                    <button 
                       class="cart__header-close"
                       @click="closeCart()">
                       <svg class="cart__header-close-icon" viewBox="0 0 47.971 47.971" width="14" height="14">
                        <g>
                            <path d="M28.228,23.986L47.092,5.122c1.172-1.171,1.172-3.071,0-4.242c-1.172-1.172-3.07-1.172-4.242,0L23.986,19.744L5.121,0.88
                                c-1.172-1.172-3.07-1.172-4.242,0c-1.172,1.171-1.172,3.071,0,4.242l18.865,18.864L0.879,42.85c-1.172,1.171-1.172,3.071,0,4.242
                                C1.465,47.677,2.233,47.97,3,47.97s1.535-0.293,2.121-0.879l18.865-18.864L42.85,47.091c0.586,0.586,1.354,0.879,2.121,0.879
                                s1.535-0.293,2.121-0.879c1.172-1.171,1.172-3.071,0-4.242L28.228,23.986z"/>
                        </g>
                       </svg>
                       <span>Close</span>
                        
                    </button>
                </div>
            <!-- cart header end -->
                <div class="cart__content">
                    <!-- shown when the cart is not empty -->
                    <div class="cart__store-wrapper" v-for="cart in cartList" v-if="!undefinedCart" :key="cart.id">
                        <!-- store name, delivery time and total price -->
                        <div class="cart__store-header">
                            <!-- <a href="javascript:void(0)"
                               class="d-block remove-item fixed_clear_cart"
                               @click="clearBasket(cart.outlet_id)">
                                <i class="far fa-trash-alt"></i> Clear Basket
                            </a> -->
                            <div class="cart__store-logo">
                                <img v-bind:src="cart.logo_image" v-bind:alt="cart.outlet_name">
                            </div>
                            <div class="cart__store-info">
                                <span class="cart__store-info-text">
                                    {{cart.outlet_name}}
                                    <span class="cart__store-next-available">
                                        <span v-if="cart.next_delivery_time_slot.available === 0">No delivery is present in your city and area</span>
                                        <span id="modal_time" v-else>Next Delivery: {{ cart.next_delivery_time_slot.delivery_date }} {{ cart.next_delivery_time_slot.delivery_time }}</span>
                                    </span>
                                </span>
                            </div>
                            <span class="cart__store-summ">
                            JD {{ parseFloat(cart.outlet_subtotal).toFixed(2) }}
                            </span>
                        </div>
                        <div class="cart__store-free-delivery">
                            <span>You’ve got <b>FREE</b> delivery. Start checkout now!</span>
                        </div>

                        <!-- shopping list -->
                        <div class="cart__items-list">
                            <div class="cart__item" v-for="item in cart.product_lsit" :key="item.id">
                                <div class="cart__item-img">
                                    <img v-bind:src="item.product_image" v-bind:alt="item.product_name" @error="errorSrc">
                                </div>
                                <div class="cart__item-info">
                                    <div class="cart__item-title">
                                        <p class="cart__item-title-text" @click="singleProduct(item)" v-if="item.item_type === 1"> {{item.product_name}} </p>
                                        <p class="cart__item-title-text text-decoration-none text-dark" v-else> {{item.product_name}} </p>
                                    </div>
                                    <span class="cart__item-count">
                                            <span v-if="item.status_available === 0">OUT OF STOCK</span>
                                            <span v-else>
                                                <span v-if="item.sold_per === 3">JD {{ parseFloat(item.our_selling_price*item.approx_weight).toFixed(2)}}</span>
                                                <span v-else>JD {{parseFloat(item.our_selling_price).toFixed(2)}}</span>
                                                - {{ item.sold_per == 1 || item.sold_per == 4 || item.unit === 'Unit'  ?  'per 1  pc.': item.sold_per  === 3 ? 'each': '1 kg' }}
                                            </span>
                                    </span>
                                    <div class="cart__item-buttons">
                                        <a v-if="item.item_type === 1" class="cart__item-button"
                                            href="javascript:void(0)" @click="editInstruction(item)">
                                            <i class="far fa-edit"></i> Instructions </a>

                                        <a class="cart__item-button" href="javascript:void(0)"
                                            @click="removeItem(item.cart_detail_id)">
                                            <i class="far fa-trash-alt"></i> Remove</a>
                                    </div>
                                </div>
                                <div class="cart__item-number-wrapper">
                                    <div class="cart__item-number-current">
                                        <div class="cart__item-number-inner">
                                            <span>{{item.cart_qty}}</span>
                                            <span v-if="item.sold_per === 2 && item.unit !== 'Unit' || item.sold_per === 3">kg</span>
                                        </div>
                                    </div>

                                    <!-- buttons increase and decrease the amount of product (disabled now)-->
                                    <div class="cart__item-number-increase">
                                        <a class="change-count-btn decrease_cart_button"
                                        href="javascript:void(0)" role="button">
                                            <i data-v-e7ab8a3c="" class="far fa-trash-alt"></i>
                                        </a>
                                        <div>{{item.cart_qty}}</div>
                                        <a class="change-count-btn increase_cart"
                                        href="javascript:void(0)" role="button">
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>

                                </div>
                                <div class="cart__item-price">
                                    <span v-if="item.hasOwnProperty('outlet_item_total_selling') && item.outlet_item_total_selling !== ''">JD {{ parseFloat(item.outlet_item_total_selling).toFixed(2) }}</span>
                                    <span v-else>JD {{ parseFloat(item.our_selling_price*item.cart_qty).toFixed(2) }} </span>
                                </div>
                            </div>
                        </div>

                        <!-- Recommended items -->
                        <div class="cart__hooper">
                            <h4 class="cart__hooper-title">Frequently bought with</h4>
                            <div class="cart__hooper-wrapper">
                                <item-hooper :products="cart.product_lsit" :type="'cart'" :hooperSettings="hooperSettings"></item-hooper>
                            </div>
                        </div>
                    </div>

                    <!-- shown when the cart is empty -->
                    <div class="cart-empty__wrapper" v-if="undefinedCart" data-radium="true">
                        <div class="cart-empty__icon" data-radium="true">
                            <svg width="64px" height="64px" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill="#bdbdbd"
                                    d="M6.316 18c1.39 0 2.526 1.125 2.526 2.5S7.705 23 6.316 23c-1.39 0-2.527-1.125-2.527-2.5S4.926 18 6.316 18zm0 1c-.84 0-1.527.68-1.527 1.5S5.476 22 6.316 22c.84 0 1.526-.68 1.526-1.5S7.155 19 6.316 19zm11.368-1c1.39 0 2.527 1.125 2.527 2.5S19.074 23 17.684 23c-1.39 0-2.526-1.125-2.526-2.5s1.137-2.5 2.526-2.5zm0 1c-.84 0-1.526.68-1.526 1.5s.687 1.5 1.526 1.5c.84 0 1.527-.68 1.527-1.5s-.687-1.5-1.527-1.5zM5.305 15.75l15.537-.5c.38 0 .632.25.632.625s-.253.625-.632.625l-16.42.5c-.38.125-.759-.375-.633-.75l.758-2.375c.253-.625.253-1.125.127-1.75L3.41 5.25c-.127-.625-.632-1-1.264-1H.632C.252 4.25 0 4 0 3.625S.253 3 .632 3h22.105C23.495 3 24 3.5 24 4.25v7.125c0 .625-.505 1.125-1.137 1.25L5.684 14.5l-.379 1.25zm17.364-4.106c.21-.042.331-.17.331-.269V4.25c0-.195-.055-.25-.263-.25H3.872c.254.288.437.65.522 1.07l1.26 6.857c.117.582.138 1.083.05 1.565l16.965-1.848z"></path>
                            </svg>
                        </div>
                        <div data-radium="true" class="cart-empty__message">
                            Your personal cart is empty
                        </div>
                        <div class="cart-empty__button-wrapper">
                            <button
                               class="cart-empty__button"
                               @click="closeCart()">
                                Shop now
                            </button>
                        </div>
                    </div>

                </div>

                <!-- checkout button -->
                <div class="cart__checkout-wrapper">
                    <div class="cart__checkout-inner"
                        @click="checkout()"
                        >
                        <button
                           class="cart__checkout-button btn btn-default" title="Subtotal"
                           v-bind:class="{'disabled' : cartSubtotal < 0.01}">
                           Checkout</button>
                        <div class="cart__checkout-price" v-if="cartSubtotal">
                            JD {{parseFloat(cartSubtotal).toFixed(2)}}
                        </div>
                        <div class="cart__checkout-price" v-else>
                            0.00 JD
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ConfirmationModalComponent></ConfirmationModalComponent>
    </div>
</template>

<script>
    import ConfirmationModalComponent from '../components/ConfirmationModal';
    import ProductDetails from "./productDetails";
    import ItemHooper from './ItemHooper'
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
                userLocation:'',
                hooperSettings: {
                    infiniteScroll: false,
                    centerMode: false,
                    autoPlay: false,
                    mouseDrag: true,
                    wheelControl: false,
                    playSpeed: 3500,
                    breakpoints: {

                        0: { // 0px ~ 370px
                            itemsToShow: 2.6,
                            itemsToSlide: 1
                        }
                    }
                }
            };
        },
        components: {
            ProductDetails,
            ConfirmationModalComponent,
            ItemHooper
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
                        for (let i = 0; i < _this.locationList.length; i++) {
                            if(_this.locationList[i].id == _this.userData.location_id) {
                                _this.userLocation = _this.locationList[i].zone_name
                            }
                        }
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

<style lang="scss" scoped>
    .cart {
        height: 100%;
        position: fixed;
        z-index: 1050;
        top: 0;
        right: 0;
        background-color: #f7f7f7;
        overflow-x: hidden;
        transition: 0.5s;
        &__wrapper {
            width: 608px;
            min-height: 100%;
            position: relative;
            padding-bottom: 80px;
        }
        &__header {
            &-wrapper {
                min-height: 88px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                background-color: #fff;
                padding-left: 24px;
                padding-right: 18px;
                margin-bottom: 8px;
            }
            &-descr {
                color: var(--green-color);
                font-size: 14px;
                font-weight: 600;
                width: 124px;
                margin: 0;
            }
            &-center {
                text-align: center;
                width: 55%;
            }
            &-title {
                font-size: 16px;
                font-weight: 600;
                line-height: 1.25;
                margin-bottom: 2px;
            }
            &-location {
                font-size: 12px;
                line-height: 1.17;
                color: var(--dark-color);
            }
            &-close {
                width: 124px;
                max-width: 160px;
                border-radius: 4px;
                border: 1px solid var(--green-color);
                color: var(--green-color);
                background: #fff;
                font-size: 16px;
                font-weight: 600;
                line-height: 1.3;
                padding: 13px 5px;
                display: flex;
                align-items: baseline;
                justify-content: center;
                transition: all .3s;
                &-icon {
                    fill: var(--green-color);
                    margin-right: 10px;
                }
                &:hover {
                    color: #fff;
                    background: var(--green-color);
                }
                &:hover > &-icon {
                    fill: #fff;
                }
            }
        }
        &__hooper {
            height: 380px;
            background: #fff;
            margin-top: 17px;
            padding-top: 24px;
            padding-left: 10px;
            &-title {
                font-size: 18px;
                font-weight: 600;
                color: #262c1d;
                padding-left: 15px;
            }
        }
        &-empty {
            &__wrapper {
                padding-top: 40px; 
                padding-bottom: 40px; 
                background-color: #fff; 
            }
            &__icon {
                padding: 0px 15px;
                display: flex;
                justify-content: center;
            }
            &__message {
                margin-top: 20px;
                text-align: center;
                font-size: 20px;
                font-weight: 600;
            }
            &__button {
                font-size: 16px;
                font-weight: 600;
                line-height: 1.3;
                color: white;
                background-color: #61bf3d;
                border: none;
                border-radius: 4px;
                padding: 6px;
                width: 140px;
                min-width: 48px;
                touch-action: manipulation;
                cursor: pointer;
                transition: all .3s;
                &:hover {
                    color: #61bf3d;
                    background-color: #fff;
                    border: solid 1px #61bf3d;
                }
                &-wrapper {
                    margin-top: 20px;
                    text-align: center;
                }
            }
        }
        &__content {
            overflow-x: hidden;
            overflow-y: auto;
        }
        &__store {
            &-wrapper {
                margin-bottom: 16px;
            }
            &-header {
                background-color: #fff;
                padding: 11px 24px;
                display: flex;
                align-items: center;
            }
            &-logo {
                img {
                    width: 48px;
                    height: 48px;
                    border-radius: 50%;
                    border: solid 1px #cccfd4;
                }
            }
            &-info {
                flex: 1 0;
                margin-left: 16px;
                margin-right: 16px;
                &-text {
                    font-size: 16px;
                    font-weight: 600;
                    display: flex;
                    flex-direction: column;
                }
            }
            &-next-available {
                font-size: 13px;
                font-weight: 400;
                color: #999;
                margin-top: 3px;
            }
            &-summ {
                font-size: 14px;
                font-weight: 600;
            }
            &-free-delivery {
                font-size: 14px;
                padding: 11px 24px;
            }
        }
        &__items-list {
            padding: 16px 24px 0 16px;
            background: #fff;
        }
        &__item {
            display: flex;
            align-items: center;
            padding-bottom: 22px;
            &-img img{
                width: 60px;
                height: 60px;
            }
            &-info {
                width: 355px;
                cursor: pointer;
                margin: 0 12px;
            }
            &-title {
                margin-bottom: 4px;
                &-text {
                    font-size: 16px;
                    line-height: 1.3;
                    overflow: hidden;
                    max-width: 320px;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                    margin: 0;
                }
            }
            &-count {
                font-size: 14px;
                line-height: 1.3;
                color: #999;
                margin-bottom: 8px;
            }
            &-button {
                font-size: 13px;
                line-height: 1.54;
                color: #999;
                margin-right: 8px;
                &:hover {
                    color: var(--green-color);
                }
                i {
                    color: var(--green-color);
                    font-size: 14px;
                }
            }
            &-number {
                &-wrapper {
                    margin-right: 5px;
                    position: relative;
                }
                &-inner {
                    width: 56px;
                    padding: 11px 2px;
                    font-size: 14px;
                    font-weight: 600;
                    line-height: 1.43;
                    text-align: center;
                    border-radius: 4px;
                    border: solid 1px #e8e7e8;
                }
                &-increase {
                    display: none;
                    box-shadow: 0 2px 12px 0 rgba(0, 0, 0, 0.2);
                    top: 15px;
                    left: -25%;
                    padding: 5px;
                    min-width: 150%;
                    position: absolute;
                    justify-content: space-around;
                    align-items: center;
                    background-color: #fff;
                    &--active {
                        display: flex;
                    }
                }
            }
            &-price {
                    font-size: 14px;
                    flex: 1 0 auto;
                    line-height: 1.43;
                    text-align: right;
            }
        }
        &__checkout {
            &-wrapper {
                width: 100%;
                height: 80px;
                padding: 16px;
                position: absolute;
                bottom: 0;
                background-color: #fff;
            }
            &-inner {
                position: relative;
                width: 100%;
            }
            &-button {
                background: var(--green-color);
                font-size: 16px;
                font-weight: 600;
                line-height: 1.25;
                width: 100%;
                height: 48px;
                color: #fff;
                padding: 12px;
                transition: all .3s;
                &:hover {
                    background: #4d9530;
                }
            }
            &-price {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                right: 8px;
                padding: 4px 14px;
                border-radius: 2px;
                color: #fff;
                background-color: rgba(0, 0, 0, 0.36);
                font-size: 16px;
                font-weight: 600;
                line-height: 1.3;
            }
        }
    }
    .change-count-btn {
        color: var(--green-color);
    }
    @media (max-width: 767px) {
        .cart__hooper {
            height: 300px;
            padding-top: 16px;
            &-title {
                margin-bottom: 14px;
                font-size: 16px;
            }
        }
    }
    @media (max-width: 620px) {
        .cart {
            width: 100%;
            &__wrapper {
                width: 100%;
            }
            &__header {
                &-wrapper {
                    min-height: 64px;
                    border-bottom: 1px solid #EAEAEA;
                    flex-direction: row-reverse;
                    padding: 0 16px;
                }
                &-close {
                    width: 56px;
                    padding: 16px 5px;
                    span {
                        display: none;
                    }
                    &-icon {
                        margin: 0;
                    }
                }
                &-title {
                    font-size: 15px;
                    line-height: 1.33;
                    margin: 0;
                }
                &-location {
                    font-size: 11px;
                    line-height: 1.5;
                }
                &-descr {
                    font-size: 13px;
                    width: auto;
                }
            }
            &__store {
                &-wrapper {
                    margin-bottom: 0;
                }
                &-header {
                    padding: 12px 16px;
                    border-bottom: 1px solid #EAEAEA;
                    border-top: 1px solid #EAEAEA;
                }
                &-logo {
                    img {
                        width: 40px;
                        height: 40px;
                    }
                }
                &-info {
                    margin-left: 8px;
                    margin-right: 2px;
                    &-text {
                        font-size: 13px;
                    }
                }
                &-next-available {
                    font-size: 11px;
                    color: #757575;
                    margin: 0;
                }
                &-summ {
                    font-size: 13px;
                    align-self: baseline;
                }
                &-free-delivery {
                    font-size: 12px;
                    padding: 6px 16px;
                }
            }
            &__items-list {
                padding: 0;
            }
            &__item {
                padding: 14px 20px 17px 8px;
                align-items: flex-start;
                &-info {
                    margin: 0 16px 0 8px;
                    position: relative;
                    padding-top: 3px;
                    padding-bottom: 20px;
                }
                &-img img {
                    width: 48px;
                    height: 48px;
                }
                &-title {
                    margin-bottom: 0;
                }
                &-title-text {
                    font-size: 13px;
                    line-height: 1.23;
                    max-width: 112px;
                    white-space: normal;
                }
                &-count {
                    margin-bottom: 0;
                    font-size: 11px;
                    line-height: 1.45;
                    color: #757575;
                }
                &-buttons {
                    position: absolute;
                    width: max-content;
                    bottom: 0;
                }
                &-number {
                    &-wrapper {
                        margin-right: 4px;
                        padding-top: 6px;
                    }
                    &-inner {
                        font-size: 13px;
                    }
                }
                &-price {
                    font-size: 11px;
                    padding-top: 14px;
                    width: 48px;
                }
            }
            &__checkout {
                &-price {
                    font-size: 12px;
                    padding: 6px 14px;
                }
            }
            &__hooper {
                display: none;
            }
        }
    }
</style>
