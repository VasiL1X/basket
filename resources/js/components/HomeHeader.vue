<template>
    <div>
        <div class="basket_header_outer  home-header" id="top_scrolling" v-if="routeName != 'profile' && routeName != 'orders.history' && routeName !='addresses'
        && routeName !='payment'&& routeName != 'coupons' && routeName !='notifications' && routeName != 'express'  && routeName != 'help.works'
             && routeName !='countries'&& routeName!='languages' && routeName != 'orders.history.info'
             && routeName != 'departments' && routeName != 'department' && routeName != 'aisle' &&  routeName != 'search' &&  routeName != 'new.order'&&  routeName != 'collection'">
            <!-- top header  -->
            <div class="main__hero__banner" v-bind:style="'background-image: linear-gradient(to top, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.3)), url('+outletInfo.store_banner+')'">
                <div style="width: 100%" v-if="!scrolledBigHeader">
                    <!--outlet name image-->
                    <div class="main__hero__overlay">
                        <div class="new-header">
                            <div class="col-12 form-inline pt-2 px-0 new-header__wrapper">
                                <div class="d-block p-lg-2 new-header__item">
                                    <router-link :to="{ name: 'profile' }"
                                                 class="new-link-color text-white font-weight-bolder">
                                        <img class="new-header__item-img" src="/images/profile-circle.svg">
                                    </router-link>
                                    <a href="javascript:void(0)" class="new-link-color">
                                        <img class="new-header__item-img" src="/images/notification.svg">
                                    </a>
                                </div>
                                <div class="text-center new-header__item">
                                    <p class="mb-0">
                                        <a href="javascript:void(0)" title="Stores"
                                           class="text-white store_list" data-toggle="modal"
                                           data-target="#changeStore" @click="openChangeStore()"
                                           section="open"
                                           id="store_list_top">{{outletInfo.outlet_name}}
                                            <i class="fa fa-angle-down stores-icon"></i>
                                        </a>
                                    </p>
                                </div>
                                <div class="text-right btn-div new-header__item">
                                    <button data-v-bb7a9770=""
                                            data-placement="bottom"
                                            data-html="true"
                                            class="btn btn-danger smobitrigger ion-navicon-round cat-btn"
                                            @click="openCart()"
                                    >
                                        <img class="new-header__item-img" src="/images/shopping_cart.svg" alt="">
                                        <span data-v-bb7a9770="" aria-label="Items in cart: "
                                              class="cart-qty-badge number-item">{{cartCount}}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="basket_header_fixed">
                            <div class="responsive-hed">
                                <div class="left_my_accounts">
                                    <a href="javascript:void(0)">
                                        <div class="fa fa-bars bars-icon"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="nav__leftitem ">
                                <div class="basket_left_logo ml-auto">
                                    <div class="logo_section dis_hidds main__logo">
                                        <router-link :to="{ name: 'home' }">
                                            <img src="/images/logo-white.png" alt="Basket">
                                        </router-link>
                                    </div>
                                    <div class="d-inline-block ml-lg-5">
                                        <a href="javascript:void(0)" title="Stores"
                                           class="header-link store_list" data-toggle="modal"
                                           data-target="#changeStore" @click="openChangeStore()"
                                           section="open"
                                           id="store_list">Stores
                                            <i class="fa fa-angle-down stores-icon"
                                               :style="'transform:rotate('+storeDeg+'deg)'"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 padding_left0 pading_15 dis_hidds">
                            </div>
                            <div class="col-md-5 col-xs-12 col-sm-12">
                                <div class="basket_right_information">
                                    <div class="">
                                        <nav class="navigation-tabs">
                                            <ul>
                                                <!--                                                <li>-->
                                                <!--                                                    <div class="head_city_location">-->
                                                <!--                                                        <a class="primary-nav-link chng_loc_btn"-->
                                                <!--                                                           style="text-align: center" data-toggle="modal"-->
                                                <!--                                                           data-target="#update-location" @click="openChangeLocation()"-->
                                                <!--                                                           href="javascript:void(0)">-->
                                                <!--                                                            <i class="fas fa-map-marker-alt"></i>-->
                                                <!--                                                            <span v-if="location.id == userData.location_id"-->
                                                <!--                                                                  v-for="location in locationList">{{location.zone_name}}</span>-->
                                                <!--                                                        </a>-->
                                                <!--                                                    </div>-->
                                                <!--                                                </li>-->
                                                <li>
                                                    <a class="primary-nav-link chng_loc_btn d-inline">
                                                        <img src="/images/notification.svg" class="d-inline" alt="">
                                                    </a>
                                                </li>
                                                <li class="">
                                                    <div>
                                                        <a class="pt-0"
                                                           data-toggle="dropdown"
                                                           href="javascript:void(0)"
                                                           @click="deg = deg==0 ? 180 : 0"
                                                           
                                                        >
                                                            <span>Account</span>
                                                            <i class="fa fa-angle-down"
                                                               :style="'transform:rotate('+deg+'deg;'"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right"
                                                             style="padding: 0px !important;">
                                                            <ul class="dropdown-menu pt-1" role="menu"
                                                                id="open_after_popup">
                                                                <li class="link-account">

                                                                    <a class="account-dropdown-name"
                                                                       href="">Hi,{{userData.first_name}} </a>
                                                                </li>
                                                                <hr>
                                                                <li class="divider"></li>
                                                                <li class="link-account">
                                                                    <router-link class="nav-item nav-link"
                                                                                 :to="{ name: 'profile' }">
                                                                        <i class="far fa-user-circle"></i>
                                                                        My Account
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account">
                                                                    <router-link class="nav-item nav-link"
                                                                                 :to="{ name: 'orders.history' }">
                                                                        <i class="far fa-copy"></i>
                                                                        Your Orders
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account">
                                                                    <router-link class="nav-item nav-link"
                                                                                 :to="{ name: 'addresses' }">
                                                                        <i class="fas fa-map-marker-alt"></i>
                                                                        Address
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account">
                                                                    <router-link class="nav-item nav-link"
                                                                                 :to="{ name: 'payment' }"
                                                                                 title="Payment methods">
                                                                        <div class="icon payment" style="background: url(https://cdn.basket.jo/assets/front/basket/new_design/images/payment_methotds_icon.png);
                                                                        background-size: contain;background-position: 100% 100%;background-repeat: no-repeat;width: 20px;height: 20px;display: inline-block;">
                                                                        </div>
                                                                        Payment methods
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account">
                                                                    <router-link class="nav-item nav-link"
                                                                                 :to="{ name: 'coupons' }">
                                                                        <i class="fas fa-percent"></i>
                                                                        Add Promo Code
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account">
                                                                    <router-link class="nav-item nav-link"
                                                                                 :to="{ name: 'apply' }">
                                                                        <i class="fas fa-shopping-bag"></i>
                                                                        Become a Shopper
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account">
                                                                    <router-link class="nav-item nav-link"
                                                                                 :to="{ name: 'notifications' }">
                                                                        <i class="fas fa-bell"></i>
                                                                        Notifications
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account">
                                                                    <router-link class="nav-item nav-link"
                                                                                 :to="{ name: 'express' }">
                                                                        <i class="far fa-star"></i>
                                                                        Basket Prime
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account">
                                                                    <router-link class="nav-item nav-link"
                                                                                 :to="{ name: 'help.works' }">
                                                                        <i class="far fa-lightbulb"></i>
                                                                        How Basket Works
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account">
                                                                    <router-link class="nav-item nav-link"
                                                                                 :to="{ name: 'countries' }">
                                                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                                                        Country
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account">
                                                                    <router-link class="nav-item nav-link"
                                                                                 :to="{ name: 'languages' }">
                                                                        <i class="fa fa-language"
                                                                           aria-hidden="true"></i>
                                                                        Language
                                                                    </router-link>
                                                                </li>
                                                                <li style="display:none;" class="link-account">
                                                                    <a href="javascript:void(0)"><i
                                                                        class="glyph-icon flaticon-smiling-emoticon-square-face"></i>Shop
                                                                        with Friends</a>
                                                                </li>
                                                                <li style="display:none;" class="link-account">
                                                                    <a href="javascript:void(0)"><i
                                                                        class="glyph-icon flaticon-folder"></i>Lists
                                                                        and Recipes</a>
                                                                </li>
                                                                <hr class="mb-0">
                                                                <li class="static-pages-links link-account">
                                                                    <a @click="logout()">
                                                                        <i class="fas fa-sign-out-alt"></i>
                                                                        Logout
                                                                    </a>
                                                                </li>
                                                                <li class="static-pages-links">
                                                                    <ul class="small-list">
                                                                        <li class="legal-link">
                                                                            <router-link :to="{ name: 'press' }"
                                                                                         target="_blank"
                                                                                         aria-label="Press">
                                                                                <i class="fas fa-newspaper"></i>
                                                                                Press
                                                                            </router-link>
                                                                        </li>
                                                                        <li class="legal-link">
                                                                            <router-link :to="{ name: 'apply' }"
                                                                                         target="_blank"
                                                                                         aria-label="Job">
                                                                                <i class="fas fa-briefcase"></i>
                                                                                Job
                                                                            </router-link>
                                                                            <!--</li>-->
                                                                        <li class="legal-link">
                                                                            <router-link
                                                                                :to="{ name: 'terms.conditions' }"
                                                                                target="_blank"
                                                                                aria-label="Terms">
                                                                                <i class="fas fa-file-signature"></i>
                                                                                Terms
                                                                            </router-link>
                                                                        </li>
                                                                        <li class="legal-link">
                                                                            <router-link
                                                                                :to="{ name: 'privacy.policy' }"
                                                                                target="_blank"
                                                                                aria-label="Privacy">
                                                                                <i class="fas fa-user-shield"></i>
                                                                                Privacy
                                                                            </router-link>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="">
                                                    <router-link :to="{ name: 'help' }">
                                                        Help
                                                    </router-link>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="cat_counts">
                                        <div v-if="width < 1200" @click="openCart()">
                                            <img src="/images/shopping_cart.svg" alt="" >
                                            <span class="cart-qty-badge number-item"
                                                  aria-label="Items in cart: ">{{cartCount}}</span>
                                        </div>

                                        <button class="btn btn-danger smobitrigger ion-navicon-round"
                                                data-placement="bottom" @click="openCart()"
                                                id="popover" data-html="true" v-else>
                                            <img src="/images/shopping_cart.svg" alt="" >
                                            <span class="cart_hidd"> Cart</span>
                                            <span class="cart-qty-badge number-item"
                                                  aria-label="Items in cart: ">{{cartCount}}</span>
                                        </button>
                                        <div class="addedProduct bg-white" id="scrollItem" v-bind:class="{'d-none' : addedFade}">
                                            <div class="triangle-up"></div>
                                            <div class="col-12 d-inline-flex p-1 addedProductMsg text-green">
                                                <tr style="vertical-align: middle">
                                                    <td class="p-1"><span>1</span></td>
                                                    <td class="p-1"><img :src="this.addedProduct.product_info_image"
                                                                         style="height: 50px" alt=""></td>
                                                    <td>
                                                        <span>{{ this.addedProduct.product_name }}</span><br>
                                                        <span class="text-dark font-weight-normal"
                                                              v-if="addedProduct.label_value > 0">{{ addedProduct.label_value }} {{ this.addedProduct.unit}} </span>
                                                    </td>
                                                </tr>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="main__hero__overlay__content pt-4 pt-lg-5">
                            <img class="rounded-circle shop_logo" style="height:inherit;"
                                 v-bind:src="outletInfo.logo_image"
                                 v-bind:alt="outletInfo.outlet_name">
                            <h1 class="market-name-general">
                                {{outletInfo.outlet_name}}
                            </h1>
                            <a href="javascript:void(0)" @click="showMoreInfo" id="more_info_link" style="color: #fff">Everyday
                                store
                                prices · More info</a>
                            <div class="basket_middle_search">
                                <div class="form-inline input-group d-flex">
                                    <input type="text" id="" autocomplete="off"
                                           class="col d-inline-block basket_middle_search_input"
                                           name="searched_parameter"
                                           :placeholder="placeholder"
                                           v-model="searchValue" @keydown.enter="searchProduct"
                                           @keydown.exact="search('bottom')">
                                    <button class="btn btn-lg search_submit_btn" type="button"
                                            @click="searchProduct()" :disabled="searchValue.toString().length <= 0">
                                        <i class="fa fa-search text-white" aria-hidden="true"></i>
                                    </button>
                                </div>
                                <div class="col-12">
                                    <ul id="ui-id-1" tabindex="0"
                                        class="ui-menu ui-menu-bottom ui-widget ui-widget-content ui-autocompleteui-front autocomplete_banner">
                                        <li class="ui-menu-item" v-for="searchedProduct in searchedProducts">
                                            <div class="auto_search ui-menu-item-wrapper" tabindex="-1">
                                                <div class="search_result">
                                                    <a class="a_srchlink"
                                                    :href="$router.resolve({ name: 'search',params: {value: searchedProduct.product_name}}).href">
                                                        <i class="fa fa-search"></i>
                                                        <span class="font-weight-normal" v-html="searchedProduct.product_name"></span>
                                                    </a>
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
            <!-- bottom nav START -->
            <div class="container-fluid department_header_bottom text-center">
                <ul class="col-lg-10 col-sm-12 p-1 ul-department-header" id="ul_department_header">

                    <li class=" departments_tab">
                        <router-link :to="{ name: 'home' }"
                                     v-bind:class="[this.$route.name === 'home' ? 'text-green' :'']">
                            <div class="d-lg-none">
                                <img src="/images/mobile_home_active.svg" v-if="this.$route.name === 'home'">
                                <img src="/images/mobile_home.svg" v-else>
                            </div>
                            <p class="m-0">Home</p>
                        </router-link>
                    </li>
                    <li class="d-lg-none">
                        <router-link :to="{ path: '/search/'+searchValueMobile,}"
                                     v-bind:class="[this.$route.name === 'search' ? 'text-green' :'']">
                            <img src="/images/mobile_search_active.svg" v-if="this.$route.name === 'search'">
                            <img src="/images/mobile_search.svg" v-else>
                            <p class="m-0">Search</p>
                        </router-link>
                    </li>
                    <li class="">
                        <router-link :to="{ name: 'departments' }"
                                     v-bind:class="[this.$route.name ==='departments' ? 'text-green' :'']">
                            <div class="d-lg-none">
                                <img src="/images/mobile_department_active.svg"
                                     v-if="this.$route.name === 'departments'">
                                <img src="/images/mobile_department.svg" v-else>
                            </div>
                            <p class="m-0">Departments</p>
                        </router-link>
                    </li>
                    <li class="">
                        <router-link :to="{ name:'list' ,params:{name: 'my-items'} }"
                                     v-bind:class="[this.$route.name === 'collection' && this.$route.params.name === 'my-items' ? 'text-green' :'']">
                            <div class="d-lg-none">
                                <img src="/images/mobile_myitems_active.svg"
                                     v-if="this.$route.name === 'collection' && this.$route.params.name === 'my-items'">
                                <img src="/images/mobile_myitems.svg" v-else>
                            </div>
                            <p class="m-0">My Items</p>
                        </router-link>
                    </li>
                    <li class="availability_li">
                        <div class="customize availability-link d-inline">
                            <strong>Free Delivery to</strong>
                            <a class="availability-link_a d-inline" data-toggle="modal"
                               data-target=".outlet_available_time"
                               @click="openNextDelivery()"
                               href="javascript:void(0)">
                                Available
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <strong class="availability_time text-secondary">
                                <span class="text-by-next">
                                        {{outletDeliverySlotLabel}}
                                </span>
                                <i class="fas fa-info-circle"></i>
                            </strong>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-12 d-lg-none bg-white department_header_bottom-delivery">
                <div class="col-12 p-2">
                    <strong class="font-600">Delivery to </strong>
                </div>
            </div>
            <div class="col-12 d-lg-none bg-white">
                <div class="col-12 p-2 department_header_bottom-time">
                    <a data-toggle="modal" data-target=".outlet_available_time"
                       href="javascript:void(0)" class="availability-link_a text-green">
                        Available
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <div class="availability_time text-secondary d-flex">
                            <span class="text-by-next">
                                {{outletDeliverySlotLabel}}
                            </span>
                        <div>
                            <svg width="18px" height="18px" viewBox="0 0 24 24" aria-hidden="true"
                                 fill="currentColor" style="margin-left: 8px; flex-shrink: 0;">
                                <path                                       d="M12 23C5.925 23 1 18.075 1 12S5.925 1 12 1s11 4.925 11 11-4.925 11-11 11zm0-1c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zm0-11.5a1 1 0 0 1 1 1V16a1 1 0 0 1-2 0v-4.5a1 1 0 0 1 1-1zM12 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <!-- bottom nav END -->
        </div>


        <!--scroll header start-->
        <div class="scroll-header" style="z-index: 999;" v-if="scrolled  || routeName == 'profile' || routeName == 'orders.history' || routeName =='addresses' ||
        routeName =='payment'|| routeName == 'coupons' || routeName =='notifications' || routeName =='express'  || routeName =='help.works'
             || routeName =='countries'|| routeName=='languages'
             || routeName == 'orders.history.info' || routeName == 'departments' || routeName == 'aisle'  || routeName == 'search'
             || routeName == 'department'|| routeName == 'new.order'|| routeName == 'collection'">
            <div class="row div-search-blok">
                <div class="d-lg-none d-inline scroll-header__icons">
                    <router-link :to="{name:'profile'}">
                        <img class="scroll_header-pic" src="/images/profile-circle-green.svg">
                    </router-link>
                    <router-link to="#">
                        <img class="scroll_header-pic" src="/images/notification_green.svg" >
                    </router-link>
                </div>
                <div class="scroll_logo pr-1">
                    <div class="basket_left_logo ml-auto">
                        <div class="logo_section dis_hidds main__logo">
                            <router-link :to="{ name: 'home' }">
                                <img src="/images/logo-normal.png" alt="Basket">
                            </router-link>
                        </div>
                        <div class="d-inline-block ml-lg-4 scroll-header-stores">
                            <a href="javascript:void(0)" title="Stores"
                               class="text-green header-link store_list d-inline d-lg-block d-md-block" data-toggle="modal"
                               data-target="#changeStore" @click="openChangeStore()"
                               section="open"> {{ width < 992 ? outletInfo.outlet_name  : 'Stores' }}
                                <i class="fa fa-angle-down stores-icon"
                                   :style="'transform:rotate('+storeDeg+'deg)'"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="d-none col d-lg-inline mx-2">
                    <div class="scrollHeaderSearch basket_middle_search">
                            <div class="input-group">
                                <input type="text" id="" autocomplete="off" class="col scroll_header-search-input"
                                       name="searched_parameter"
                                       :placeholder="placeholder"
                                       v-model="searchValue" @keyup.enter.once="searchProduct" @keyup="search('top')">
                                <button class="btn btn-lg search_submit_btn" type="button"
                                        @click="searchProduct()" :disabled="searchValue.toString().length <= 0">
                                    <i class="fa fa-search text-white" aria-hidden="true"
                                       style="font-size: 16px;  cursor: pointer; color: rgb(67, 176, 42);"></i>
                                </button>
                        </div>
                        <div class="col-12">
                            <ul id="ui-id-2" tabindex="0"
                                class="ui-menu ui-menu-top ui-widget ui-widget-content ui-autocompleteui-front autocomplete_banner">
                                <li class="ui-menu-item" v-for="searchedProduct in searchedProducts">
                                    <div class="auto_search ui-menu-item-wrapper" tabindex="-1">
                                        <div class="search_result">
                                            <a class="a_srchlink"
                                               :href="$router.resolve({ name: 'search',params: {value: searchedProduct.product_name}}).href">
                                                <i class="fa fa-search"></i>
                                                <span class="font-weight-normal" v-html="searchedProduct.product_name"></span>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="pr-0 pl-0">
                    <div class="basket_right_information">
                        <div class="">
                            <nav class="navigation-tabs">
                                <ul>
                                    <li>
                                        <a href="">
                                            <img src="/images/notification_green.svg" class="d-inline Combined-Shape" alt="">
                                        </a>
                                    </li>
                                    <li class="">
                                        <div>
                                            <a
                                               data-toggle="dropdown"
                                               href="javascript:void(0)"
                                               @click="deg = deg==0 ? 180 : 0"
                                               class="text-green pt-0"
                                            >
                                                <span>Account</span>
                                                <i class="fa fa-angle-down"
                                                   v-bind:style="'transform:rotate('+deg+'deg'"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                 style="padding: 0px !important;">
                                                <ul class="dropdown-menu pt-1" role="menu" id="open_after_popup">
                                                    <li class="link-account">
                                                        <a class="account-dropdown-name"
                                                           href="">Hi,{{userData.first_name}}</a>
                                                    </li>
                                                    <hr>
                                                    <li class="divider"></li>
                                                    <li class="link-account">
                                                        <router-link :to="{ name: 'profile' }">
                                                            <i class="far fa-user-circle"></i>
                                                            <span class="col-10">My Account</span>
                                                        </router-link>
                                                    </li>
                                                    <li class="link-account">
                                                        <router-link :to="{ name: 'orders.history' }">
                                                            <i class="far fa-copy"></i>
                                                            <span class="col-10">Your Orders</span>
                                                        </router-link>
                                                    </li>
                                                    <li class="link-account">
                                                        <router-link :to="{ name: 'addresses' }">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                            <span class="col-10">Address</span>
                                                        </router-link>
                                                    </li>
                                                    <li class="link-account">
                                                        <router-link
                                                            :to="{ name: 'payment' }"
                                                            title="Payment methods">
                                                            <div class="icon payment" style="background: url(https://cdn.basket.jo/assets/front/basket/new_design/images/payment_methotds_icon.png);
                                                                        background-size: contain;background-position: 100% 100%;background-repeat: no-repeat;width: 20px;height: 20px;display: inline-block;">
                                                            </div>
                                                            <span class="col-10">Payment methods</span>
                                                        </router-link>
                                                    </li>
                                                    <li class="link-account">
                                                        <router-link :to="{ name: 'coupons' }">
                                                            <i class="fas fa-percent"></i>
                                                            <span class="col-10">Add Promo Code</span>
                                                        </router-link>
                                                    </li>
                                                    <li class="link-account">
                                                        <router-link :to="{ name: 'notifications' }">
                                                            <i class="fas fa-bell"></i>
                                                            <span class="col-10">Notifications</span>
                                                        </router-link>
                                                    </li>
                                                    <li class="link-account">
                                                        <router-link :to="{ name: 'express' }">
                                                            <i class="far fa-star"></i>
                                                            <span class="col-10">Basket Prime</span>
                                                        </router-link>
                                                    </li>
                                                    <li class="link-account">
                                                        <router-link :to="{ name: 'help.works' }">
                                                            <i class="far fa-lightbulb"></i>
                                                            <span class="col-10">How Basket Works</span>
                                                        </router-link>
                                                    </li>

                                                    <li class="link-account">
                                                        <router-link :to="{ name: 'countries' }">
                                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                                            <span class="col-10">Country</span>
                                                        </router-link>
                                                    </li>
                                                    <li class="link-account">
                                                        <router-link :to="{ name: 'languages' }">
                                                            <i class="fa fa-language" aria-hidden="true"></i>
                                                            <span class="col-10">Language</span>
                                                        </router-link>
                                                    </li>
                                                    <li style="display:none;" class="link-account">
                                                        <a href="javascript:void(0)"><i
                                                            class="glyph-icon flaticon-smiling-emoticon-square-face"></i>Shop
                                                            with Friends</a>
                                                    </li>
                                                    <li style="display:none;" class="link-account">
                                                        <a href="javascript:void(0)"><i
                                                            class="glyph-icon flaticon-folder"></i>Lists
                                                            and Recipes</a>
                                                    </li>
                                                    <hr class="mb-0">
                                                    <li class="static-pages-links link-account">
                                                        <a @click="logout()">
                                                            <i class="fas fa-sign-out-alt"></i>
                                                            Logout
                                                        </a>
                                                    </li>
                                                    <li class="static-pages-links">
                                                        <ul class="small-list">
                                                            <li class="legal-link">
                                                                <router-link :to="{ name: 'press' }"
                                                                             target="_blank"
                                                                             aria-label="Press">
                                                                    <i class="fas fa-newspaper"></i>
                                                                    Press
                                                                </router-link>
                                                            </li>
                                                            <li class="legal-link">
                                                                <router-link :to="{ name: 'apply' }"
                                                                             target="_blank"
                                                                             aria-label="Job">
                                                                    <i class="fas fa-briefcase"></i>
                                                                    Job
                                                                </router-link>
                                                                <!--</li>-->
                                                            <li class="legal-link">
                                                                <router-link
                                                                    :to="{ name: 'terms.conditions' }"
                                                                    target="_blank"
                                                                    aria-label="Terms">
                                                                    <i class="fas fa-file-signature"></i>
                                                                    Terms
                                                                </router-link>
                                                            </li>
                                                            <li class="legal-link">
                                                                <router-link
                                                                    :to="{ name: 'privacy.policy' }"
                                                                    target="_blank"
                                                                    aria-label="Privacy">
                                                                    <i class="fas fa-user-shield"></i>
                                                                    Privacy
                                                                </router-link>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="">
                                        <router-link class="text-green" :to="{ name: 'help' }">
                                            Help
                                        </router-link>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="cat_counts">
                            <div v-if="width < 1200" @click="openCart()">
                                <img class="scroll_header-pic" src="/images/shopping_cart_green.svg" alt="" >
                                        <span class="cart-qty-badge number-item"
                                            aria-label="Items in cart: ">{{cartCount}}
                                        </span>
                            </div>

                            <button class="btn btn-danger smobitrigger ion-navicon-round"
                                    data-placement="bottom" @click="openCart()"
                                    id="popover" data-html="true" v-else>
                                <img src="/images/shopping_cart.svg" alt="" >
                                <span class="cart_hidd"> Cart</span>
                                <span class="cart-qty-badge number-item"
                                      aria-label="Items in cart: ">{{cartCount}}</span>
                            </button>
                            <div class="addedProduct bg-white" id="scrollItem" v-bind:class="{'d-none' : addedFade}">
                                <div class="triangle-up"></div>
                                <div class="col-12 d-inline-flex p-1 addedProductMsg text-green">
                                    <tr style="vertical-align: middle">
                                        <td class="p-1"><span>1</span></td>
                                        <td class="p-1"><img :src="this.addedProduct.product_info_image"
                                                             style="height: 50px" alt=""></td>
                                        <td>
                                            <span>{{ this.addedProduct.product_name }}</span><br>
                                            <span class="text-dark font-weight-normal"
                                                  v-if="addedProduct.label_value > 0">{{ addedProduct.label_value }} {{ this.addedProduct.unit}} </span>
                                        </td>
                                    </tr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <nav class="navbar navbar-expand-lg navbar-light bg-white font-weight-bolder scroll__navigation d-none d-lg-flex">
                <a class="navbar-brand fz-16" href="javascript:void(0)">
                    <img class="hero-middle-logo rounded-circle" v-bind:src="outletInfo.logo_image"
                         v-bind:alt="outletInfo.outlet_name" height="40" width="40">
                    <span class="font-weight-bold"> {{'Search ' + outletInfo.outlet_name}} </span>
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav font-weight-bolder m-auto">
                        <li class="nav-item">
                            <router-link :to="{ name: 'home' }" class="nav-link fz-16">
                                <div class="icon home"></div>
                                <span 
                                    class="font-weight-bold"
                                    v-bind:class="[this.$route.name ==='home' ? 'text-green' :'text-black']">Home</span>
                            </router-link>
                        </li>
                        <li class="nav-item d-lg-none">
                            <router-link :to="{ path: '/search/'+searchValueMobile}" class="nav-link fz-16">
                                <div class="icon search">
                                    <i class="fa fa-search" style="font-weight: 600;font-size: 15px;"></i></div>
                                <span 
                                    class="font-weight-bold"
                                    v-bind:class="[this.$route.name ==='search' ? 'text-green' :'text-black']">Search</span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'departments' }" class="nav-link fz-16">
                                <div class="icon mydepartment"></div>
                                <span 
                                    class="font-weight-bold"
                                    v-bind:class="[this.$route.name ==='departments' ? 'text-green' :'text-black']">Departments</span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{name:'list',params:{ name: 'my-items'} }" class="nav-link fz-16"
                                        >
                                <div class="icon myitem"></div>
                                <span class="font-weight-bold"
                                v-bind:class="[this.$route.name ==='list' && this.$route.params.name === 'my-items' ? 'text-green' :'text-black']">My Items</span>
                            </router-link>
                        </li>
                    </ul>
                    <div class="form-inline my-2 my-lg-0 fz-16">
                        <strong class="availability_time text-secondary">
                            <span class="text-by-next">
                                    {{outletDeliverySlotLabel}}  
                                    </span>
                            <div style="width: 20px; display: inline-block">
                            </div>
                            <div style="display: inline-block; position: absolute; top: 0; right: 0">
                                <svg width="18px" height="18px" viewBox="0 0 24 24" aria-hidden="true"
                                     fill="currentColor" style="margin-left: 8px; flex-shrink: 0;">
                                    <path
                                        d="M12 23C5.925 23 1 18.075 1 12S5.925 1 12 1s11 4.925 11 11-4.925 11-11 11zm0-1c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zm0-11.5a1 1 0 0 1 1 1V16a1 1 0 0 1-2 0v-4.5a1 1 0 0 1 1-1zM12 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path>
                                </svg>
                            </div>
                        </strong>
                    </div>
                </div>
            </nav>
            <div class="container-fluid department_header_bottom text-center d-lg-none">
                <ul class="col-lg-10 col-sm-12 p-1 ul-department-header" id="ul_department_header">
                    <li class="departments_tab">
                        <router-link :to="{ name: 'home' }"
                                     v-bind:class="[this.$route.name === 'home' ? 'text-green' :'']">
                            <div class="d-lg-none">
                                <img src="/images/mobile_home_active.svg" v-if="this.$route.name === 'home'">
                                <img src="/images/mobile_home.svg" v-else>
                            </div>
                            <p class="m-0">Home</p>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ path: '/search/'+searchValueMobile,}"
                                     v-bind:class="[this.$route.name === 'search' ? 'text-green' :'']">
                            <img src="/images/mobile_search_active.svg" v-if="this.$route.name === 'search'">
                            <img src="/images/mobile_search.svg" v-else>
                            <p class="m-0">Search</p>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name: 'departments' }"
                                     v-bind:class="[this.$route.name ==='departments' ? 'text-green' :'']">
                            <div class="d-lg-none">
                                <img src="/images/mobile_department_active.svg"
                                     v-if="this.$route.name === 'departments'">
                                <img src="/images/mobile_department.svg" v-else>
                            </div>
                            <p class="m-0">Departments</p>
                        </router-link>
                    </li>
                    <li>
                        <router-link :to="{ name:'list' ,params:{name: 'my-items'} }"
                                     v-bind:class="[this.$route.name === 'collection' && this.$route.params.name === 'my-items' ? 'text-green' :'']">
                            <div class="d-lg-none">
                                <img src="/images/mobile_myitems_active.svg"
                                     v-if="this.$route.name === 'collection' && this.$route.params.name === 'my-items'">
                                <img src="/images/mobile_myitems.svg" v-else>
                            </div>
                            <p class="m-0">My Items</p>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
        <!--        </div>-->
        <div v-if="showGreenLoader">

        </div>
        <!--scroll header end-->
        <!--Modal Add Adress-->
        <div v-if="addAddress">
            <AddAddressComponent></AddAddressComponent>
        </div>

        <!--Change store modall-->

        <div v-if="changeStore">
            <div class="change-store-header-bg">
                <div class="basket_header_fixed show-change-store-header"
                :style="'background-image: url('+outletInfo.store_banner+')'">
                    <div class="nav__leftitem ">
                        <div class="basket_left_logo ml-auto">
                            <div class="logo_section dis_hidds main__logo">
                                <router-link :to="{ name: 'home' }">
                                    <img src="/images/logo-white.png" alt="Basket">
                                </router-link>
                            </div>
                            <div class="d-inline-block ml-lg-5">
                                <a href="javascript:void(0)" title="Stores"
                                    class="header-link store_list" data-toggle="modal"
                                    data-target="#changeStore" @click="openChangeStore()"
                                    section="open"
                                    id="store_list">Stores
                                    <i class="fa fa-angle-down stores-icon"
                                        :style="'transform:rotate('+storeDeg+'deg)'"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 padding_left0 pading_15 dis_hidds">
                    </div>
                    <div class="col-md-5 col-xs-12 col-sm-12">
                        <div class="basket_right_information">
                            <div class="">
                                <nav class="navigation-tabs">
                                    <ul>
                                        <li>
                                            <a class="primary-nav-link chng_loc_btn d-inline">
                                                <img src="/images/notification.svg" class="d-inline" alt="">
                                            </a>
                                        </li>
                                        <li class="">
                                            <div>
                                                <a class="pt-0"
                                                    href="javascript:void(0)"
                                                    @click="closeChangeStore()"   
                                                >
                                                    <span>Account</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="" @click="closeChangeStore()">
                                            <router-link :to="{ name: 'help' }">
                                                Help
                                            </router-link>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <div class="cat_counts" @click="closeChangeStore()">
                                <div v-if="width < 1200" @click="openCart()">
                                    <img src="/images/shopping_cart.svg" alt="" >
                                    <span class="cart-qty-badge number-item"
                                            aria-label="Items in cart: ">{{cartCount}}</span>
                                </div>

                                <button class="btn btn-danger smobitrigger ion-navicon-round"
                                        data-placement="bottom" @click="openCart()"
                                        id="popover" data-html="true" v-else>
                                    <img src="/images/shopping_cart.svg" alt="" >
                                    <span class="cart_hidd"> Cart</span>
                                    <span class="cart-qty-badge number-item"
                                            aria-label="Items in cart: ">{{cartCount}}</span>
                                </button>
                                <div class="addedProduct bg-white" id="scrollItem" v-bind:class="{'d-none' : addedFade}">
                                    <div class="triangle-up"></div>
                                    <div class="col-12 d-inline-flex p-1 addedProductMsg text-green">
                                        <tr style="vertical-align: middle">
                                            <td class="p-1"><span>1</span></td>
                                            <td class="p-1"><img :src="this.addedProduct.product_info_image"
                                                                    style="height: 50px" alt=""></td>
                                            <td>
                                                <span>{{ this.addedProduct.product_name }}</span><br>
                                                <span class="text-dark font-weight-normal"
                                                        v-if="addedProduct.label_value > 0">{{ addedProduct.label_value }} {{ this.addedProduct.unit}} </span>
                                            </td>
                                        </tr>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <ChangeStoreComponent></ChangeStoreComponent>
        </div>

        <div v-if="changeLocation">
            <ChangeLocationComponent></ChangeLocationComponent>
        </div>

        <NextDeliveryComponent></NextDeliveryComponent>

        <MoreInfoComponent></MoreInfoComponent>

        <div v-if="userCart">
            <chatComponent></chatComponent>
            <div class="modal-backdrop fade show" @click="closeCart()"></div>
        </div>

        <div class="loading" v-show="showLoader">
            <span class="fa fa-spinner fa-spin"></span>
        </div>
        <product-details></product-details>

        <green-loader v-if="showGreenLoader"></green-loader>
        <product-instruction-modal></product-instruction-modal>
    </div>
</template>

<script>
    import chatComponent from '../components/CartComponent'
    import MoreInfoComponent from '../components/MoreInfoModal'
    import ChangeLocationComponent from '../components/ChangeLocationModal'
    import ChangeStoreComponent from '../components/ChangeStoreModal'
    import NextDeliveryComponent from '../components/NextDeliveryModal'
    import AddAddressComponent from '../components/AddAddressModal'
    import Cookies from 'js-cookie'
    import GreenLoader from "./GreenLoader";
    import ProductInstructionModal from "./ProductInstructionModal";
    import ProductDetails from "./productDetails";


    export default {
        name: "homeHeader",
        middleware: 'auth',
        components: {
            ProductDetails,
            ProductInstructionModal,
            GreenLoader,
            chatComponent,
            MoreInfoComponent,
            ChangeLocationComponent,
            ChangeStoreComponent,
            NextDeliveryComponent,
            AddAddressComponent
        },
        data() {
            return {
                scrolled: false,
                scrolledBigHeader: false,
                moreInfo: false,
                userCart: false,
                changeLocation: false,
                changeStore: false,
                nextDelivery: false,
                addAddress: false,
                userData: [],
                outletDeliverySlot: [],
                outletDeliverySlotLabel: '',
                outletInfo: [],
                departments: [],
                language: Cookies.get('languageId'),
                countryId: 46,
                cartCount: '',
                nextDeliverySlot: '',
                showLoader: false,
                locationList: [],
                searchValue: '',
                addedProduct: {},
                searchedProducts: {},
                addedFade: true,
                searchValueMobile: ' ',
                showGreenLoader: false,
                width: 0,
                placeholder: 'Search ...',
                top: 0,
                deg: 0,
                storeDeg: 0,

            };
        },

        computed: {
            routeName() {
                return this.$route.name;
            }
        },

        methods: {
            handleScroll() {
                $('.ui-menu').fadeOut();
                if (this.$route.name != 'profile' || this.$route.name != 'orders.history' || this.$route.name != 'payment'
                    || this.$route.name != 'addresses' || this.$route.name != 'coupons' || this.$route.name != 'notifications'
                    || this.$route.name !== 'express' || this.$route.name != 'help.works'
                    || this.$route.name != 'countries' || this.$route.name != 'languages'
                    || this.$route.name != 'orders.history.info' || this.$route.name != 'departments'
                    || this.$route.name != 'department' || this.$route.name != 'aisle' || this.$route.name != 'search' || this.$route.name != 'new.order') {
                    this.scrolled = window.scrollY > 290;
                    this.scrolledBigHeader = window.scrollY > 120;
                }
            },
            openCart() {
                // $("body").css("overflow", "hidden");
                $("body").addClass("overflow-hidd");
                this.userCart = true
            },
            closeCart() {
                // $("body").css("overflow", "");
                $("body").removeClass("overflow-hidd");
                this.userCart = false
            },
            openChangeLocation() {
                this.changeLocation = true;
            },
            openChangeStore() {
                if(this.changeStore) {
                    $('#changeStore').modal('hide');
                    this.changeStore = false
                } else {
                    this.storeDeg = 180;
                    this.changeStore = true;
                    let _this = this;
                    setTimeout(function () {
                        _this.storeDeg = 0;
                    }, 1500);
                }
            },
            closeChangeStore() {
                if(this.changeStore) {
                    $('#changeStore').modal('hide');
                    this.changeStore = false;
                }
            },
            openNextDelivery() {
                this.$bvModal.show('NextDeliveryModal');
            },
            showMoreInfo() {
                // this.$bvModal.show('.MoreInfoModal');
                this.$root.$emit('bv::show::modal', 'more_info_modal')
            },

            getOutletDeliverySlot() {
                let _this = this;
                axios.post(apiDev + '/cart-outlet-delivery-slot', {
                    language: _this.language,
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    country_id: _this.countryId,
                    city_id: _this.userData.city_id,
                    outlet_id: _this.userData.outlet_id ? _this.userData.outlet_id : 67,
                }).then(response => {

                    if (response.data.response.httpCode == 200) {
                        _this.outletDeliverySlot = response.data.response.outlet_delivery_slot;
                        if (!!response.data.response.outlet_delivery_slot[0].delivery_slot[0].time) {
                            _this.outletDeliverySlotLabel = response.data.response.outlet_delivery_slot[0].delivery_slot[0].time[0].label || response.data.response.outlet_delivery_slot[0].delivery_slot[0].time[0].delivery_time
                        }  else {
                            _this.outletDeliverySlotLabel = response.data.response.outlet_delivery_slot[0].delivery_slot[1].time[0].delivery_time
                        }
                    }

                }).catch(error => {

                })

            },

            getOutletInfo() {
                let _this = this;
                axios.post(apiDev + '/store-department-list-web', {
                    language: _this.language,
                    outlet_id: _this.userData.outlet_id ? _this.userData.outlet_id : 67,
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.outletInfo = response.data.response.outlet_details;
                        _this.departments = response.data.response.department_list
                        _this.placeholder = _this.outletInfo.outlet_name ? 'Search ' + _this.outletInfo.outlet_name + '...' : 'Search ...'
                    }
                }).catch(error => {

                })
            },

            userCartCount() {
                let _this = this;
                axios.post(apiDev + '/user-cart-count', {
                    language: _this.language,
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.cartCount = response.data.response.cart_count
                    }
                }).catch(error => {

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

            logout() {
                Cookies.remove('token');
                Cookies.remove('userData');
                this.$store.dispatch('auth/logout');
                this.$router.push({path: '/'});
            },

            searchProduct() {
                if (this.$route.params.value !== this.searchValue) {
                    this.searchValue = this.searchValue !== '' ? this.searchValue : ' ';
                    bus.$emit('searchValue', this.searchValue);
                    this.$router.push({path: '/search/' + this.searchValue});
                }
            },

            search(param) {
                let _this = this;
                if (this.searchValue) {
                    axios.post(apiDev + '/search-product-name', {
                        outlet_id: _this.userData.outlet_id ? _this.userData.outlet_id : 67,
                        product_search: _this.searchValue,
                        order_by: 1,
                        web: 1,
                        token: _this.userData.token,
                        user_id: _this.userData.user_id,
                        language: _this.language,
                    }).then(response => {
                        response.data.response.product_list.forEach(item => {
                            let name = item.product_name.toLowerCase().search(this.searchValue.toLowerCase());
                            if(name != -1){
                                item.product_name = item.product_name.toLowerCase().replace(this.searchValue ,  '<b>'+this.searchValue+'</b>');
                            }
                        });
                        this.searchedProducts = response.data.response.product_list;

                        if (param === 'top') {
                            $('.ui-menu-top').show();
                            $('.ui-menu-bottom').hide();
                        } else if (param === 'bottom') {
                            $('.ui-menu-top').hide();
                            $('.ui-menu-bottom').show();
                        }

                        $(".autocomplete_banner").mouseleave(function () {
                            $('.ui-menu-top').hide();
                            $('.ui-menu-bottom').hide();
                        });
                        if (!response.data.response.product_list.length) {
                            $('.ui-menu-top').hide();
                            $('.ui-menu-bottom').hide();
                        }


                    }).catch(error => {

                    })
                } else {
                    $('.ui-menu-top').hide();
                    $('.ui-menu-bottom').hide();
                }

            },
        },
        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData;
            this.getOutletInfo();
            this.userCartCount();
            this.getLocationList();
            this.getOutletDeliverySlot();
            this.closeCart();
            this.width = window.screen.width;
            $(document).ready(function () {
                $('body').click(function () {
                    $('.ui-menu').hide();
                });
            });
        }
        ,

        created() {
            if (this.$route.name == 'profile' && this.$route.name == 'orders.history' &&
                this.$route.name == 'addresses' && this.$route.name == 'payment' && this.$route.name != 'addresses' && this.$route.name == 'coupons'
                && this.$route.name == 'notifications' && this.$route.name == 'express' && this.$route.name == 'account.help.works'
                && this.$route.name == 'countries' && this.$route.name == 'languages'
                && this.$route.name == 'orders.history.info' && this.$route.name == 'departments' && this.$route.name != 'aisle'
                && this.$route.name != 'department' && this.$route.name != 'search' && this.$route.name != 'new.order'
            ) {
                this.scrolled = true
            }
            $(".ui-menu-top").hide();
            $(".ui-menu-bottom").hide();
            window.addEventListener('scroll', this.handleScroll);
            bus.$on('moreInfo', (data) => {
                if (data) {
                    this.moreInfo = false
                }
            });
            bus.$on('closeCart', (data) => {
                if (data) {
                    // $("body").css("overflow", "");
                    $("body").removeClass("overflow-hidd");
                    this.userCart = false
                }
            });
            bus.$on('openAddAddress', (data) => {
                if (data) {
                    this.addAddress = true
                }
            });
            bus.$on('nextDeliverySlot', (data) => {
                if (data) {
                    this.nextDeliverySlot = data
                }
            });
            bus.$on('closeCartClear', (data) => {
                if (data) {
                    // $("body").css("overflow", "auto");
                    // this.userCart = false;
                    this.userCartCount()
                }
            });
            bus.$on('addToCart', (data) => {
                if (data >= 0) {
                    this.cartCount = data;
                    this.addedFade = false;
                    let _this = this;
                    setTimeout(function () {
                        _this.addedFade = true;
                    }, 1800);
                }
            });

            bus.$on('showTo', (data) => {
                if (data) {
                    this.$ga.event('Add To Card' , 'added');
                    this.addedProduct = data;
                }
            });

            bus.$on('removeItemCart', (data) => {
                if (data) {
                    this.$ga.event('Remove From Cart' , 'removed');
                    this.userCartCount()
                }
            });

            bus.$on('showGreenLoader', (data) => {
                this.showGreenLoader = data;
            });


            bus.$on('changeLocationAndCooke', (data) => {
                if (data) {
                    this.userData.location_id = data;
                }
            }),
            bus.$on('changeStoreAndCooke', (data) => {
                if (data) {
                    this.userData.outlet_id = data;
                    this.getOutletInfo();
                    this.userCartCount();
                    this.getOutletDeliverySlot();
                    $('#changeStore').modal('hide');
                    this.changeStore = false;
                }
            }),
            bus.$on('closeStoresModal', () => {
                this.closeChangeStore();
            }),
            bus.$on('multipleOrder', (data) => {
                if (data) {
                    this.$bvToast.toast(data, {
                        title: 'Basket',
                        autoHideDelay: 5000,
                        toaster: 'b-toaster-bottom-left',
                        appendToast: true
                    });
                    this.closeCart();
                    this.userCartCount();
                }
            });

            bus.$on('getOutletInfo', (data) => {
                if (data) {
                    this.language = data;
                    this.getOutletInfo();
                }
            })
        },
        destroyed() {
            window.removeEventListener('scroll', this.handleScroll);
        },

    }
</script>
<style>
    .overflow-hidd {
        overflow: hidden;
    }
</style>
<style scoped>
    .fz-16 {
        font-size: 16px;
    }
    .font-600 {
        font-weight: 600;
    }
    .text-green {
        color: #61bf3d !important;
    }
    .main__logo {
        margin-top: -4px;
    }
    .change-store-header-bg {
        height: 84px;
        width: 100%;
        position: fixed;
        top: 0;
        z-index: 1051;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.16);
        background: linear-gradient(to bottom, rgba(191,191,191,1) 0%, rgba(199,199,199,1) 53%, rgba(207,207,207,1) 100%);
    }
    .change-store-header-bg .fa-angle-down {
        font-size: 17px;
        margin-left: 6px;
        position: relative;
        top: 1px;
    }
    .show-change-store-header {
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
    }
    .div-search-blok {
        padding: 4px 56px;
        margin: 0;
        height: 88px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .scroll_header-search-input {
        height: 48px;
        outline: none;
        font-size: 16px;
        border: 1px solid rgb(221, 221, 221);
        border-radius: 5px 0 0 5px;
    }
    .scroll__navigation {
        padding: 4px 56px;
        height: 48px;
        box-shadow: rgba(0, 0, 0, 0.09) 0px 2px 5px;
    }

    .scrollHeaderSearch {
        margin: -7px 5px !important;
    }
    .autocomplete_banner {
        z-index: 999 !important;
    }

    .customize.availability-link {
        font-size: 16px;
    }

    .logo__scroll {
        position: relative;
        padding-right: 15px;
    }

    .search_submit_btn {
        border-radius: 0 4px 4px 0;
        border: #61bf3d;
        height: 48px;
        width: 48px;
        text-align: center;
        opacity: 1;
    }

    .search_submit_btn > i {
        font-size: 17px;
        cursor: pointer;
        position: relative;
        display: inherit;
    }

    .main__hero__banner {
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        width: 100%;
        position: relative;
        min-height: 23rem;
    }

    .market-logo-general {
        height: 100px !important;
        width: 100px !important;
        margin-top: 18px;
    }

    /*.market-name-general {*/
    /*margin-top: 16px !important;*/
    /*}*/

    .header-link {
        color: #fff;
        position: relative;
        display: block;
        font-size: 16px;
        font-weight: 600;
        padding: 0;
    }
    .store_list {
        font-size: 15px;
        font-weight: 600;
    }
    .cat_counts {
        position: relative;
    }
    #popover:hover {
        background-color: #d7e3e2 !important;
        outline: none !important;
    }

    #popover:focus {
        background-color: var(--theme-color) !important;
    }

    #popover {
        outline: none !important;
        text-decoration: none !important;
        width: 112px;
        padding: 10px 0;
        border-radius: 4px;
        background-color: #61bf3d;
        top: 0;
        font-weight: 600;
    }
    /*.navigation-tabs li i{*/
    /*    width: 20px;*/
    /*}*/
    #popover img {
        margin: 0 auto;
        width: 25px;
        height: 25px;
        display: inline;
    }

    .cart_hidd {
        font-size: 20px;
        line-height: 1.3;
        margin-top: -5px;
        letter-spacing: normal;
        color: #ffffff;
    }

    .basket_middle_search_input {
        height: 48px;
        font-size: 16px;
        border: none;
        border-radius: 5px 0 0 5px;
    }
    .basket_middle_search_input:focus, .scroll_header-search-input:focus {
        border: solid 1px #61bf3d;
    }
    .responsive-hed {
        display: none;
    }

    .new-header {
        display: none;
        padding: 4px 18px;
    }

    .new-link-color {
        color: white;
    }
    .cat-btn {
        background-color: #00800008;
        border: none;
        padding: 0;
        position: relative;
    }
    .cart-qty-badge {
        right: 5px;
        top: -5px;
    }
    .color {
        color: var(--theme-color) !important;
    }

    #ul_department_header {
        width: 100%;
        justify-content: unset;
    }

    .small-list > li a {
        display: inline-grid !important;
    }

    .department_header_bottom ul li a {
        width: 100%;
    }
        /*new styles*/
    .department_header_bottom-delivery {  
        border-bottom: 1px solid #f0f0f0;
    }
    .department_header_bottom-time {
        display: flex;
        align-items: center;
    }
    .availability-link_a {
        font-weight: 600;
    }
    .shop_logo {
        width: 140px;
    }

    /*Acount dropdown*/
    #open_after_popup li a {
        display: block;
        /*padding-top: 11px;*/
        -webkit-transition: color .2s linear 0s;
        transition: color .2s linear 0s;
        font-weight: 100;
        height: inherit;
        color: var(--dark-color);
        font-size: 14px;
        line-height: 36px;
    }

    #open_after_popup > li {
        display: block;
        text-align: left;
    }

    .link-account:hover {
        background-color: #0683bf;
    }

    .dropdown-menu ul li a i {
        font-size: 14px;
        text-align: center;
    }

    /*scroll-header*/
    .scroll-header {
        position: fixed;
        top: 0px;
        left: 0px;
        width: 100%;
        background-color: white;
    }
    .scroll-header__icons {
        white-space: nowrap;
    }
    
    .static-pages-links {
        cursor: pointer;
    }

    .ui-widget.ui-widget-content {
        border: 1px solid #d3d3d3;
    }

    .ui-widget-content {
        background: #ffffff;
        color: #222222;
    }

    .ui-widget {
        font-size: 1.1em;
    }

    .ui-menu {
        position: absolute;
        list-style: none;
        padding: 0;
        margin: 0;
        outline: 0;
        top: 10px;
        display: none;
        z-index: 100;
    }

    .ui-autocomplete {
        position: absolute;
        top: 0;
        left: 0;
        cursor: default;
    }

    .ui-menu .ui-menu-item {
        cursor: default !important;
    }

    .ui-menu .ui-menu-item {
        margin: 0;
        cursor: pointer;
        list-style-image: url(data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7);
    }

    .ui-menu .ui-menu-item-wrapper {
        position: relative;
    }

    ul .search_result a.a_srchlink {
        font-size: 14px !important;
        color: #393939 !important;
        display: block;
        padding: 5px 10px;
        text-decoration: none !important;
    }

    ul#ui-id-1 {
        margin: auto;
        left: 0;
        right: 0;
        overflow-y: auto;
    }

    ul#ui-id-1 .search_result a.a_srchlink {
        font-size: 19px !important;
        color: #393939;
        display: block;
        padding: 5px 10px;
        text-decoration: none !important;
    }

    ul#ui-id-1 .search_result a.a_srchlink:hover ul#ui-id-1 .search_result a.a_srchlink:hover {
        color: white !important;
    }

    ul#ui-id-2 {
        position: absolute;
        top: .5em;
        left: 0;
        width: 100%;
    }

    ul .search_result a i.fa {
        padding-right: 8px;
    }

    .search_result {
        text-align: left;
    }

    .search_result .fa-search {
        color: black;
    }

    .ui-menu-item:hover {
        border: none !important;
        background-color: var(--theme-color) !important;
        background-image: none !important;
    }

     .triangle-up {
        float: right;
        position: relative;
        z-index: 999;
        border-left: 13px solid transparent;
        border-right: 13px solid transparent;
        border-bottom: 15px solid #fff;
        top: -15px;
        right: 25px;
    }

    .addedProduct {
        width: 428px;
        position: absolute;
        right: 5em;
        z-index: 999;
        border: solid 1px #cccccc;
        top: 65px;
        -webkit-animation-duration: .5s;
        animation-duration: .5s;
    }

    .addedProduct#scrollItem {
        position: fixed;
        right: 3em;
        z-index: 999999999;
    }

    ul.dropdown-menu.pt-1 {
        overflow-y: auto;
        max-height: 80vh;
        flex-direction: column;
    }

    ul.dropdown-menu.pt-1 li a:hover {
        opacity: .5;
        color: black !important;
        transition-duration: .5s;
    }

    .small-list > .legal-link {
        padding: 5px;
    }
    /*new styles*/
    .availability_time {
        position: relative;
        margin-left: 7px;
    }
    .new-header__item-img, .scroll_header-pic {
            width: 22px;
    }
    .new-header__wrapper {
        justify-content: space-between;
    }
    @media (max-width: 1365px) {
        .scrollHeaderSearch {
            margin: -1px !important;
        }

        .cat_counts {
            margin: 0;
        }

        /* #popover {
            font-size: 32px;
            border: none;
            height: inherit;
            width: 100% !important;
            background: unset !important;
            margin: -1px;
        } */

        /* .cart_hidd {
            visibility: hidden;
        } */

        .scroll-header #popover > .fa-shopping-cart {
            color: green !important;
        }
        
    }
    @media (max-width: 1200px) {
        .market-name-general {
            font-size: 18px;
        }
        .cart-qty-badge {
            font-size: 12px;
            width: auto;
            height: auto;
            padding: 3px 3px;
            line-height: 12px;
        }
    }
    /* @media (max-width: 1024px) {
        .div-search-blok {
            padding: 22px 8px;
        }
    } */

    @media (max-width: 991px) {
        .change-store-header-bg {
            display: none;
        }
        .basket_header_fixed {
            display: none;
        }
        .new-header {
            display: block;
        }
        .new-header__wrapper {
            flex-wrap: nowrap;
        }
        .market-name-general {
            display: none;
        }
        .main__hero__overlay__content a {
            margin-top: 10px;
        }
        .div-search-blok {
            min-height: 56px;
            height: 100%;
            padding: 8px 18px;
            border-bottom: 1px solid #fdfdfd;
            flex-wrap: nowrap;
        }
        .new-header__item {
            padding: 0;
            white-space: nowrap;
        }
        .store_list {
            white-space: normal;
        }
        .scroll-header-stores {
            text-align: center;
        }
    }

    @media only screen and (max-width: 600px) {

        .responsive-hed {
            display: block;
        }

        .fa-shopping-cart {
            top: -4px !important;
            left: 0px;
        }

        .basket_header_fixed {
            display: none;
        }
        .btn-div[data-v-bb7a9770] {
            padding-right: 19px;
            padding-top: 4px;
        }
    }

    @media (max-width: 576px) {
        .main__hero__banner {
            min-height: 20rem;
        }
        .shop_logo {
            width: 100px;
        }
    }
    @media (max-width: 520px) {
        .availability-link_a {
            font-size: 14px;
        }
    }
    @media (max-width: 425px) {
       .main__hero__banner {
            min-height: 17rem;
        }
        .shop_logo {
            width: 80px;
        }
    }
</style>

