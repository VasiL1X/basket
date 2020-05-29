<template>
    <div>
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
        <div class="basket_header_outer  home-header" id="top_scrolling" v-if="routeName != 'profile' && routeName != 'orders.history' && routeName !='addresses'
        && routeName !='payment'&& routeName != 'coupons' && routeName !='notifications' && routeName != 'express'  && routeName != 'help.works'
             && routeName !='countries'&& routeName!='languages' && routeName != 'orders.history.info'
             && routeName != 'departments' && routeName != 'department' && routeName != 'aisle' &&  routeName != 'search' &&  routeName != 'new.order'&&  routeName != 'collection'">
            <!-- top header  -->
            <div class="main__hero__banner" v-bind:style="'background-image: url('+outletInfo.store_banner+')'">
                <div style="width: 100%" v-if="!scrolledBigHeader">
                    <!--outlet name image-->
                    <div class="main__hero__overlay">
                        <div class="new-header">
                            <div class="col-12 form-inline pt-2 pr-2 pl-2">
                                <div class="col-3 d-md-show p-2">
                                    <router-link :to="{ name: 'profile' }"
                                                 class="new-link-color text-white font-weight-bolder">
                                        <img src="/images/profile-circle.svg">
                                    </router-link>
                                    <a href="javascript:void(0)" class="new-link-color">
                                        <img src="/images/notification.svg" class="header-menu-icons p-1">
                                    </a>
                                </div>
                                <div class="col-6 text-center">
                                    <p class="mb-0">
                                        <a href="javascript:void(0)" title="Stores"
                                           class="text-white store_list ml-lg-5 ml-md-5" data-toggle="modal"
                                           data-target="#changeStore" @click="openChangeStore()"
                                           section="open"
                                           id="store_list_top">{{ width < 960 ? outletInfo.outlet_name  : 'Stores' }}
                                            <i class="fa fa-angle-down stores-icon"></i>
                                        </a>
                                    </p>
                                    <p class="mb-0">
                                        <a data-v-bb7a9770="" href="javascript:void(0)" title="Stores" section="open"
                                           class="new-link-color">Shopping in Abdoun
                                            <i data-v-bb7a9770="" class="fa fa-angle-down stores-icon"></i>
                                        </a>
                                    </p>
                                </div>
                                <div class="col-3 text-right btn-div">
                                    <button data-v-bb7a9770=""
                                            data-placement="bottom"
                                            data-html="true"
                                            class="btn btn-danger smobitrigger ion-navicon-round cat-btn"
                                            @click="openCart()"
                                    >
                                        <img src="/images/shopping_cart.svg" alt="">
                                        <span data-v-bb7a9770="" aria-label="Items in cart: "
                                              class="cart-qty-badge number-item">{{cartCount}}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="basket_header_fixed ">
                            <div class="responsive-hed">
                                <div class="left_my_accounts">
                                    <a href="javascript:void(0)">
                                        <div class="fa fa-bars bars-icon"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="nav__leftitem ">
                                <div class="basket_left_logo ml-auto">
                                    <div class="logo_section dis_hidds">
                                        <router-link :to="{ name: 'home' }" class="logo-section-link-hit-click-button-for-you">
                                            <img src="/images/logo-white.png" alt="Basket" class="logo_section_img">
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
                            <div class="col-md-5  col-xs-12 col-sm-12 menu-list-right-navigation-list">
                                <div class="basket_right_information">
                                    <div class="">
                                        <nav class="navigation-tabs">
                                            <ul class="navigation-tab-list">
                                                <li class="navigation-tab-list-item">
                                                    <a class="primary-nav-link chng_loc_btn d-inline text-white">
                                                        <img src="/images/notification.svg" class="d-inline" alt="">
                                                    </a>
                                                </li>
                                                <li  class="navigation-tab-list-item">
                                                    <div class="btn-group">
                                                        <a class="pt-0 text-white"
                                                           data-toggle="dropdown"
                                                           href="javascript:void(0)"
                                                           @click="deg = deg==0 ? 180 : 0"
                                                        >
                                                            <span>Account</span>
                                                            <i class="fa fa-angle-down"
                                                               :style="'transform:rotate('+deg+'deg;'"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right-info"
                                                             style="padding: 0px !important;">
                                                            <ul class="dropdown-menu pt-1" role="menu"
                                                                id="open_after_popup">
                                                                <li class="link-account navigation-tab-list">

                                                                    <a class="account-dropdown-name"
                                                                       href="">Hi,{{userData.first_name}} </a>
                                                                </li>
                                                                <hr>
                                                                <li class="divider"></li>
                                                                <li class="link-account navigation-tab-list">
                                                                    <router-link class="nav-item nav-link link-item-get-for-event-you-are-button-fff link-item-get-for-event-you-are-button-fff"
                                                                                 :to="{ name: 'profile' }">
                                                                        <i class="far fa-user-circle"></i>
                                                                        My Account
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account navigation-tab-list">
                                                                    <router-link class="nav-item nav-link link-item-get-for-event-you-are-button-fff"
                                                                                 :to="{ name: 'orders.history' }">
                                                                        <i class="far fa-copy"></i>
                                                                        Your Orders
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account navigation-tab-list">
                                                                    <router-link class="nav-item nav-link link-item-get-for-event-you-are-button-fff"
                                                                                 :to="{ name: 'addresses' }">
                                                                        <i class="fas fa-map-marker-alt"></i>
                                                                        Address
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account navigation-tab-list">
                                                                    <router-link class="nav-item nav-link link-item-get-for-event-you-are-button-fff"
                                                                                 :to="{ name: 'payment' }"
                                                                                 title="Payment methods">
                                                                        <div class="icon payment" style="background: url(https://cdn.basket.jo/assets/front/basket/new_design/images/payment_methotds_icon.png);
                                                                        background-size: contain;background-position: 100% 100%;background-repeat: no-repeat;width: 20px;height: 20px;display: inline-block;">
                                                                        </div>
                                                                        Payment methods
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account navigation-tab-list">
                                                                    <router-link class="nav-item nav-link link-item-get-for-event-you-are-button-fff"
                                                                                 :to="{ name: 'coupons' }">
                                                                        <i class="fas fa-percent"></i>
                                                                        Add Promo Code
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account navigation-tab-list">
                                                                    <router-link class="nav-item nav-link link-item-get-for-event-you-are-button-fff"
                                                                                 :to="{ name: 'apply' }">
                                                                        <i class="fas fa-shopping-bag"></i>
                                                                        Become a Shopper
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account navigation-tab-list">
                                                                    <router-link class="nav-item nav-link link-item-get-for-event-you-are-button-fff"
                                                                                 :to="{ name: 'notifications' }">
                                                                        <i class="fas fa-bell"></i>
                                                                        Notifications
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account navigation-tab-list">
                                                                    <router-link class="nav-item nav-link link-item-get-for-event-you-are-button-fff"
                                                                                 :to="{ name: 'express' }">
                                                                        <i class="far fa-star"></i>
                                                                        Basket Prime
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account navigation-tab-list">
                                                                    <router-link class="nav-item nav-link link-item-get-for-event-you-are-button-fff"
                                                                                 :to="{ name: 'help.works' }">
                                                                        <i class="far fa-lightbulb"></i>
                                                                        How Basket Works
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account navigation-tab-list">
                                                                    <router-link class="nav-item nav-link link-item-get-for-event-you-are-button-fff"
                                                                                 :to="{ name: 'countries' }">
                                                                        <i class="fa fa-globe" aria-hidden="true"></i>
                                                                        Country
                                                                    </router-link>
                                                                </li>
                                                                <li class="link-account navigation-tab-list">
                                                                    <router-link class="nav-item nav-link link-item-get-for-event-you-are-button-fff"
                                                                                 :to="{ name: 'languages' }">
                                                                        <i class="fa fa-language"
                                                                           aria-hidden="true"></i>
                                                                        Language
                                                                    </router-link>
                                                                </li>
                                                                <li style="display:none;" class="link-account navigation-tab-list">
                                                                    <a href="javascript:void(0)"><i
                                                                        class="glyph-icon flaticon-smiling-emoticon-square-face"></i>Shop
                                                                        with Friends</a>
                                                                </li>
                                                                <li style="display:none;" class="link-account navigation-tab-list">
                                                                    <a href="javascript:void(0)"><i
                                                                        class="glyph-icon flaticon-folder"></i>Lists
                                                                        and Recipes</a>
                                                                </li>
                                                                <hr class="mb-0">
                                                                <li class="static-pages-links link-account navigation-tab-list">
                                                                    <a @click="logout()">
                                                                        <i class="fas fa-sign-out-alt"></i>
                                                                        Logout
                                                                    </a>
                                                                </li>
                                                                <li class="static-pages-links">
                                                                    <ul class="small-list">
                                                                        <li class="legal-link legal-link-click-href-automenu-right-info-get">
                                                                            <router-link :to="{ name: 'press' }"
                                                                                         target="_blank"
                                                                                         aria-label="Press">
                                                                                <i class="fas fa-newspaper"></i>
                                                                                Press
                                                                            </router-link>
                                                                        </li>
                                                                        <li class="legal-link legal-link-click-href-automenu-right-info-get">
                                                                            <router-link :to="{ name: 'apply' }"
                                                                                         target="_blank"
                                                                                         aria-label="Job">
                                                                                <i class="fas fa-briefcase"></i>
                                                                                Job
                                                                            </router-link>
                                                                            <!--</li>-->
                                                                        <li class="legal-link legal-link-click-href-automenu-right-info-get">
                                                                            <router-link
                                                                                :to="{ name: 'terms.conditions' }"
                                                                                target="_blank"
                                                                                aria-label="Terms">
                                                                                <i class="fas fa-file-signature"></i>
                                                                                Terms
                                                                            </router-link>
                                                                        </li>
                                                                        <li class="legal-link legal-link-click-href-automenu-right-info-get">
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
                                                <li class="navigation-tab-list-item">
                                                    <router-link :to="{ name: 'help' }" class="text-white">
                                                        Help
                                                    </router-link>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="cat_counts">
                                        <div v-if="width < 1373" @click="openCart()">
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
                                            <div class="col-12 d-inline-flex p-1 addedProductMsg text-success">
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
                        <div class="main__hero__overlay__content mt-2 mt-md-3 mt-lg-4">
                            <img class="col-4 col-md-3 col-lg-3  rounded-circle" style="height:inherit;"
                                 v-bind:src="outletInfo.logo_image"
                                 v-bind:alt="outletInfo.outlet_name">
                            <h1 class="market-name-general main__hero__overlay__content_title">
                                {{outletInfo.outlet_name}}
                            </h1>
                            <a href="javascript:void(0)" @click="showMoreInfo" id="more_info_link" style="color: #fff" class="main__hero__overlay__content_link">Everyday
                                store
                                prices · More info</a>
                            <div class="basket_middle_search">
                                <div class="form-inline input-group d-flex">
                                    <input type="text" id="" autocomplete="off"
                                           class="form-control-lg col-lg-11 col-10 d-inline-block"
                                           name="searched_parameter"
                                           :placeholder="placeholder"
                                           style="border: solid 1px #61bf3d;;border-radius: 5px 0 0 5px;"
                                           v-model="searchValue" @keydown.enter="searchProduct"
                                           @keydown.exact="search('bottom')">
                                    <button class="btn btn-lg search_submit_btn" type="button"
                                            @click="searchProduct()" v-bind:class="[searchValue.toString().length > 0 ? 'btn-success' : 'btn-secondary disabled']" :disabled="searchValue.toString().length <= 0">
                                        <i class="fa fa-search text-white" aria-hidden="true"></i>
                                    </button>
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
                        <router-link :to="{ name: 'home' }" class="mt-3 department_header_bottom_list_link"
                                     v-bind:class="[this.$route.name === 'home' ? 'text-success' :'']">
                            <div class="d-lg-none">
                                <img src="/images/mobile_home_active.svg" v-if="this.$route.name === 'home'">
                                <img src="/images/mobile_home.svg" v-else>
                            </div>
                            <p>Home</p>
                        </router-link>
                    </li>
                    <li class="d-lg-none">
                        <router-link :to="{ path: '/search/'+searchValueMobile,}" class="mt-3  department_header_bottom_list_link"
                                     v-bind:class="[this.$route.name === 'search' ? 'text-success' :'']">
                            <img src="/images/mobile_search_active.svg" v-if="this.$route.name === 'search'">
                            <img src="/images/mobile_search.svg" v-else>
                            <p>Search</p>
                        </router-link>
                    </li>
                    <li class="">
                        <router-link :to="{ name: 'departments' }" class="mt-3 department_header_bottom_list_link"
                                     v-bind:class="[this.$route.name ==='departments' ? 'text-success' :'']">
                            <div class="d-lg-none">
                                <img src="/images/mobile_department_active.svg"
                                     v-if="this.$route.name === 'departments'">
                                <img src="/images/mobile_department.svg" v-else>
                            </div>
                            <p>Departments</p>
                        </router-link>
                    </li>
                    <li class="">
                        <router-link :to="{ name:'list' ,params:{name: 'myItems'} }" class="mt-3 department_header_bottom_list_link"
                                     v-bind:class="[this.$route.name === 'collection' && this.$route.params.name === 'myItems' ? 'text-success' :'']">
                            <div class="d-lg-none">
                                <img src="/images/mobile_myitems_active.svg"
                                     v-if="this.$route.name === 'collection' && this.$route.params.name === 'myItems'">
                                <img src="/images/mobile_myitems.svg" v-else>
                            </div>
                            <p>My Items</p>
                        </router-link>
                    </li>
                    <li class="availability_li">
                        <div class="customize availability-link d-inline">
                            <strong>Free Delivery to</strong>
                            <a class="availability-link_a d-inline p-2" data-toggle="modal"
                               data-target=".outlet_available_time"
                               @click="openNextDelivery()"
                               href="javascript:void(0)">
                                Available
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <strong class="availability_time text-secondary"
                                    style="position: relative; margin-left: 5px;">
                            <span class="text-by-next">
                                    {{nextDeliverySlot.label}}  {{nextDeliverySlot.slot}}
                                    </span>
<!--                                <div style="width: 20px; display: inline-block">-->
<!--                                </div>-->
                                <i class="fas fa-info-circle"></i>
                            </strong>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-12 d-lg-none bg-white">
                <div class="col-12 p-2">
                    <strong> Free Delivery to </strong>
                </div>
            </div>
            <div class="col-12 d-lg-none bg-white">
                <div class="col-12 p-2">
                    <a data-v-abcbf212="" data-toggle="modal" data-target=".outlet_available_time"
                       href="javascript:void(0)" class="availability-link_a pt-0 text-success">
                        Available
                        <i data-v-abcbf212="" class="fa fa-angle-down"></i></a>
                    <strong data-v-abcbf212="" class="availability_time text-secondary"
                            style="position: relative; margin-left: 5px;"><span data-v-abcbf212="" class="text-by-next">
                                Today  Now
                                </span>
                        <div data-v-abcbf212="" style="width: 20px; display: inline-block;"></div>
                        <div data-v-abcbf212=""
                             style="display: inline-block; position: absolute; top: -3px; right: 0px;">
                            <svg data-v-abcbf212="" width="18px" height="18px" viewBox="0 0 24 24" aria-hidden="true"
                                 fill="currentColor" style="margin-left: 8px; flex-shrink: 0;">
                                <path data-v-abcbf212=""
                                      d="M12 23C5.925 23 1 18.075 1 12S5.925 1 12 1s11 4.925 11 11-4.925 11-11 11zm0-1c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zm0-11.5a1 1 0 0 1 1 1V16a1 1 0 0 1-2 0v-4.5a1 1 0 0 1 1-1zM12 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path>
                            </svg>
                        </div>
                    </strong>
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
                <div class="col-4 d-lg-none d-md-none d-inline">
                    <router-link :to="{name:'profile'}">
                        <img src="/images/profile-circle-green.svg">
                    </router-link>
                    <router-link to="#">
                        <img src="/images/notification_green.svg" >
                    </router-link>
                </div>
                <div class="col-6 col-lg-3 col-md-3">
                    <div class="basket_left_logo ml-auto">
                        <div class="logo_section dis_hidds">
                            <router-link :to="{ name: 'home' }" class="logo-section-link-hit-click-button-for-you">
                                <img src="/images/logo-normal.png" alt="Basket" class="logo_section_img">
                            </router-link>
                        </div>
                        <div class="d-inline-block ml-lg-5">
                            <a href="javascript:void(0)" title="Stores"
                               class="text-success header-link store_list d-inline d-lg-block d-md-block" data-toggle="modal"
                               data-target="#changeStore" @click="openChangeStore()"
                               section="open"> {{ width < 960 ? outletInfo.outlet_name  : 'Stores' }}
                                <i class="fa fa-angle-down stores-icon"
                                   :style="'transform:rotate('+storeDeg+'deg)'"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-5 col-12 d-none d-lg-inline  d-md-inline">
                    <div class="scrollHeaderSearch basket_middle_search">
                        <div class="input-group">
                            <div class="input-group">
                                <input type="text" id="" autocomplete="off" class="form-control form-control-basket_middle_searchform-control-lg col-11"
                                       name="searched_parameter"
                                       :placeholder="placeholder" @change="" style="border: 1px solid #98d584;"
                                       v-model="searchValue" @keyup.enter.once="searchProduct" @keyup="search('top')">
                                <button class="btn btn-lg search_submit_btn" type="button"
                                        @click="searchProduct()" v-bind:class="[searchValue.toString().length > 0 ? 'btn-success' : 'btn-secondary disabled']" :disabled="searchValue.toString().length <= 0">
                                    <i class="fa fa-search text-white" aria-hidden="true"
                                       style="font-size: 16px;  cursor: pointer; color: rgb(67, 176, 42);"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12">
                            <ul id="ui-id-2" tabindex="0"
                                class="ui-menu ui-menu-top ui-widget ui-widget-content ui-autocompleteui-front autocomplete_banner">
                                <li class="ui-menu-item" v-for="searchedProduct in searchedProducts">
                                    <div class="auto_search ui-menu-item-wrapper" tabindex="-1">
                                        <div class="search_result">
                                            <a class="a_srchlink"
                                               :href="$router.resolve({ name: 'search',params: {value: searchedProduct.searchValue}}).href">
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
                <div class="col-3 pr-0 pl-0">
                    <div class="basket_right_information">
                        <div class="">
                            <nav class="navigation-tabs">
                                <ul class="navigation-tab-list">
                                    <li class="navigation-tab-list-item">
                                        <img src="/images/notification_green.svg" class="d-inline Combined-Shape" alt="">
                                    </li>
                                    <li class="navigation-tab-list-item">
                                        <div class="btn-group">
                                            <a class="pt-0"
                                               data-toggle="dropdown"
                                               href="javascript:void(0)"
                                               @click="deg = deg==0 ? 180 : 0"
                                               style="color: green"
                                            >
                                                <span>Account</span>
                                                <i class="fa fa-angle-down"
                                                   v-bind:style="'transform:rotate('+deg+'deg'"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right-info"
                                                 style="padding: 0px !important;">
                                                <ul class="navigation-tab-list dropdown-menu pt-1" role="menu" id="open_after_popup">
                                                    <li class="link-account navigation-tab-list-item">
                                                        <a class="account-dropdown-name"
                                                           href="">Hi,{{userData.first_name}}</a>
                                                    </li>
                                                    <hr>
                                                    <li class="divider"></li>
                                                    <li class="link-account navigation-tab-list-item">
                                                        <router-link :to="{ name: 'profile' }">
                                                            <i class="far fa-user-circle"></i>
                                                            <span class="col-10">My Account</span>
                                                        </router-link>
                                                    </li>
                                                    <li class="link-account navigation-tab-list-item">
                                                        <router-link :to="{ name: 'orders.history' }">
                                                            <i class="far fa-copy"></i>
                                                            <span class="col-10">Your Orders</span>
                                                        </router-link>
                                                    </li>
                                                    <li class="link-account navigation-tab-list-item">
                                                        <router-link :to="{ name: 'addresses' }">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                            <span class="col-10">Address</span>
                                                        </router-link>
                                                    </li>
                                                    <li class="link-account navigation-tab-list-item">
                                                        <router-link
                                                            :to="{ name: 'payment' }"
                                                            title="Payment methods">
                                                            <div class="icon payment" style="background: url(https://cdn.basket.jo/assets/front/basket/new_design/images/payment_methotds_icon.png);
                                                                        background-size: contain;background-position: 100% 100%;background-repeat: no-repeat;width: 20px;height: 20px;display: inline-block;">
                                                            </div>
                                                            <span class="col-10">Payment methods</span>
                                                        </router-link>
                                                    </li>
                                                    <li class="link-account navigation-tab-list-item">
                                                        <router-link :to="{ name: 'coupons' }">
                                                            <i class="fas fa-percent"></i>
                                                            <span class="col-10">Add Promo Code</span>
                                                        </router-link>
                                                    </li>
                                                    <li class="link-account navigation-tab-list-item">
                                                        <router-link :to="{ name: 'notifications' }">
                                                            <i class="fas fa-bell"></i>
                                                            <span class="col-10">Notifications</span>
                                                        </router-link>
                                                    </li>
                                                    <li class="link-account navigation-tab-list-item">
                                                        <router-link :to="{ name: 'express' }">
                                                            <i class="far fa-star"></i>
                                                            <span class="col-10">Basket Prime</span>
                                                        </router-link>
                                                    </li>
                                                    <li class="link-account navigation-tab-list-item">
                                                        <router-link :to="{ name: 'help.works' }">
                                                            <i class="far fa-lightbulb"></i>
                                                            <span class="col-10">How Basket Works</span>
                                                        </router-link>
                                                    </li>

                                                    <li class="link-account navigation-tab-list-item">
                                                        <router-link :to="{ name: 'countries' }">
                                                            <i class="fa fa-globe" aria-hidden="true"></i>
                                                            <span class="col-10">Country</span>
                                                        </router-link>
                                                    </li>
                                                    <li class="link-account navigation-tab-list-item">
                                                        <router-link :to="{ name: 'languages' }">
                                                            <i class="fa fa-language" aria-hidden="true"></i>
                                                            <span class="col-10">Language</span>
                                                        </router-link>
                                                    </li>
                                                    <li style="display:none;" class="link-account navigation-tab-list-item">
                                                        <a href="javascript:void(0)"><i
                                                            class="glyph-icon flaticon-smiling-emoticon-square-face"></i>Shop
                                                            with Friends</a>
                                                    </li>
                                                    <li style="display:none;" class="link-account navigation-tab-list-item">
                                                        <a href="javascript:void(0)"><i
                                                            class="glyph-icon flaticon-folder"></i>Lists
                                                            and Recipes</a>
                                                    </li>
                                                    <hr class="mb-0">
                                                    <li class="static-pages-links link-account navigation-tab-list-item">
                                                        <a @click="logout()">
                                                            <i class="fas fa-sign-out-alt"></i>
                                                            Logout
                                                        </a>
                                                    </li>
                                                    <li class="static-pages-links">
                                                        <ul class="small-list">
                                                            <li class="legal-link legal-link-click-href-automenu-right-info-get">
                                                                <router-link :to="{ name: 'press' }"
                                                                             target="_blank"
                                                                             aria-label="Press">
                                                                    <i class="fas fa-newspaper"></i>
                                                                    Press
                                                                </router-link>
                                                            </li>
                                                            <li class="legal-link legal-link-click-href-automenu-right-info-get">
                                                                <router-link :to="{ name: 'apply' }"
                                                                             target="_blank"
                                                                             aria-label="Job">
                                                                    <i class="fas fa-briefcase"></i>
                                                                    Job
                                                                </router-link>
                                                                <!--</li>-->
                                                            <li class="legal-link legal-link-click-href-automenu-right-info-get">
                                                                <router-link
                                                                    :to="{ name: 'terms.conditions' }"
                                                                    target="_blank"
                                                                    aria-label="Terms">
                                                                    <i class="fas fa-file-signature"></i>
                                                                    Terms
                                                                </router-link>
                                                            </li>
                                                            <li class="legal-link legal-link-click-href-automenu-right-info-get">
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
                                    <li class="navigation-tab-list-item">
                                        <router-link style="color: green" :to="{ name: 'help' }">
                                            Help
                                        </router-link>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="cat_counts">
                            <div v-if="width < 1373" @click="openCart()">
                                <img src="/images/shopping_cart_green.svg" alt="" >
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
                                <div class="col-12 d-inline-flex p-1 addedProductMsg text-success">
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

            <nav class="navbar navbar-expand-lg navbar-light bg-white font-weight-bolder pl-5 pr-5"
                 style="box-shadow: 0 1px 5px rgba(0,0,0,.16)">
                <a class="navbar-brand" href="javascript:void(0)">
                    <img class="img-circle" v-bind:src="outletInfo.logo_image"
                         v-bind:alt="outletInfo.outlet_name" height="45" width="45">
                    <span class="text-dark font-weight-bold"> {{outletInfo.outlet_name}} </span>
                </a>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav font-weight-bolder m-auto">
                        <li class="nav-item">
                            <router-link :to="{ name: 'home' }" class="nav-link"
                                         v-bind:class="[this.$route.name ==='home' ? 'text-success' :'']">
                                <div class="icon home"></div>
                                <span class="text-dark font-weight-bold">Home</span>
                            </router-link>
                        </li>
                        <li class="nav-item d-lg-none">
                            <router-link :to="{ path: '/search/'+searchValueMobile}" class="nav-link"
                                         v-bind:class="[this.$route.name ==='search' ? 'text-success' :'']">
                                <div class="icon search">
                                    <i class="fa fa-search" style="font-weight: 600;font-size: 15px;"></i></div>
                                <span class="text-dark font-weight-bold">Search</span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{ name: 'departments' }" class="nav-link"
                                         v-bind:class="[this.$route.name ==='departments' ? 'text-success' :'']">
                                <div class="icon mydepartment"></div>
                                <span class="text-dark font-weight-bold">Departments</span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link :to="{name:'list',params:{ name: 'myItems'} }" class="nav-link"
                                         v-bind:class="[this.$route.name ==='list' && this.$route.params.name === 'myItems' ? 'text-success' :'']">
                                <div class="icon myitem"></div>
                                <span class="text-dark font-weight-bold">My Items</span>
                            </router-link>
                        </li>
                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <strong class="mr-1">Free Delivery to</strong>
                        <a class="ml-1 text-success" data-toggle="modal" data-target=".outlet_available_time"
                           @click="openNextDelivery()"
                           href="javascript:void(0)">
                            Available
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <strong class="availability_time text-secondary"
                                style="position: relative; margin-left: 5px;">
                            <span class="text-by-next">
                                    {{nextDeliverySlot.label}}  {{nextDeliverySlot.slot}}
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
                $("body").css("overflow", "hidden");
                this.userCart = true
            },
            closeCart() {
                $("body").css("overflow", "auto");
                this.userCart = false
            },
            openChangeLocation() {
                this.changeLocation = true;
            },
            openChangeStore() {
                this.storeDeg = 180;
                this.changeStore = true;
                let _this = this;
                setTimeout(function () {
                    _this.storeDeg = 0;
                }, 1500);
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
                        _this.outletDeliverySlot = response.data.response.outlet_delivery_slot
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
                        _this.placeholder = _this.outletInfo.outlet_name ? 'Search ' + _this.outletInfo.outlet_name : 'Search ...'
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
                                item.searchValue =  item.product_name.split(' ').join('-').toLowerCase();
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
                    $("body").css("overflow", "auto");
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
                        $('#changeStore').modal('hide');
                        this.changeStore = false;
                    }
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

<style scoped>
    @media (max-width: 1200px) {
        .d-md-show {
            display: block !important;
        }
    }
    .div-search-blok {
        padding: 22px 36px;
        height: 88px;
    }

    .nav__leftitem {
        height: min-content;
        margin-top: -10px;
    }

    .logo_section > a {
        margin-top: -6px;
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
        min-height: 23rem;
    }

    .basket_middle_search {
        margin: 15px;
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
        margin-top: 8px;
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
        height: 48px;
        border-radius: 4px;
        background-color: #61bf3d;
        top: 0;
        font-weight: 500;
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

    #popover > .header-menu-icons, .cart_hidd {
        font-size: 20px;
        line-height: 1.3;
        margin-top: -5px;
        letter-spacing: normal;
        color: #ffffff;
    }

    .basket_middle_search .input-group {
        max-height: min-content;
    }

    .responsive-hed {
        display: none;
    }

    .new-header {
        display: none;
    }

    .new-link-color {
        color: white;
    }

    .cat-btn {
        background-color: #00800008;
        border: none;
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

    @media (max-width: 1365px) {
        .btn-div {
            padding-right: 19px;
            padding-top: 10px;
        }

        .scrollHeaderSearch {
            margin: -1px !important;
        }

        .cat_counts {
            margin: 0;
        }

        #popover {
            font-size: 32px;
            border: none;
            height: inherit;
            width: 100% !important;
            background: unset !important;
            margin: -1px;
        }

        .cart-qty-badge {
            font-size: 12px;
            width: auto;
            height: auto;
            padding: 3px 5px;
            line-height: 1;
            top: 0 !important;
            right: 0 !important;
        }

        .cart_hidd {
            visibility: hidden;
        }

        .scroll-header #popover > .fa-shopping-cart {
            color: green !important;
        }

    }


    @media (max-width: 1100px) {
        .basket_header_fixed {
            display: none;
        }


        .new-header {
            display: block;
        }

    }

    @media only screen and (max-width: 600px) {
        .header-link {
            width: 110px;
            position: relative;
            font-size: 13px;
            font-weight: 600;
            margin-top: 8px;
        }

        .responsive-hed {
            display: block;
        }

        .cart-qty-badge {
            right: 24px !important;
            top: -3px !important;
        }

        .fa-shopping-cart {
            top: -4px !important;
            left: 0px;
        }

        .basket_header_fixed {
            display: none;
        }

        .new-header {
            display: block;
        }

        .btn-div[data-v-bb7a9770] {
            padding-right: 19px;
            padding-top: 4px;
        }
    }

    #open_after_popup{
        min-width: 14rem;
        display: block;
        overflow-y: auto;
        max-height: 65vh;
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

    .link-account navigation-tab-list:hover {
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

    .navigation-tabs ul li a {
        padding-top: 4px;
        padding-bottom: 4px;
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
        top: 330px;
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
        right: -22px;
        left: 0 !important;
        width: 100% !important;
        max-width: 690px;
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

    @media (max-width: 1200px) {
        ul#ui-id-1 {
            margin-top: 4vh;
        }

        .market-name-general {
            font-size: 18px;
        }
    }

    ul#ui-id-2 {
        position: absolute;
        top: .5em;
        left: 0;
        width: 100%;
    }

    ul .search_result a i.fa {
        padding-right: 8px;
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

    .header-menu-icons {
        font-size: 16px !important;
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

    .basket_right_information {
        display: -webkit-box;
        padding: 0;
    }

    /*.navigation-tab-list {*/
    /*    overflow-y: auto;*/
    /*    max-height: 90vh;*/
    /*    display: block;*/
    /*}*/

    .navigation-tab-list a:hover{
        opacity: .5;
        color: black !important;
        transition-duration: .5s;
    }

    .small-list > .legal-link legal-link-click-href-automenu-right-info-get {
        padding: 5px;
    }
</style>

