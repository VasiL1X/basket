<template>
    <div >
        <div class="row div-search-blok">
            <div class="col-3">
                <div class="basket_left_logo">
                    <div class="logo_section dis_hidds">
                        <router-link :to="{ name: 'home' }">
                            <img src="/images/logo-normal.png" alt="Basket">
                        </router-link>
                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="basket_middle_search">
                    <div class="input-group">
                        <input type="text" id="" class="form-control"
                               name="searched_parameter"
                               placeholder="Search "
                               value="">
                        <span class="input-group-btn">
                                <button class="btn btn-default search_submit_btn" type="button">
                                    <i class="fa fa-search" aria-hidden="true"
                                       style="font-size: 16px;  cursor: pointer; color: rgb(67, 176, 42);"></i>
                                </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-4 pr-0 pl-0">
                <div class="basket_right_information">
                    <div class="">
                        <nav class="navigation-tabs">
                            <ul>
                                <li>
                                    <div class="head_city_location">
                                        <a class="primary-nav-link chng_loc_btn pl-0"
                                           style="text-align: center ; color: green"
                                           href="javascript:void(0)">
                                            <i class="fa fa-map-marker" style="font-size:20px"></i>
                                            Abdun
                                        </a>
                                    </div>
                                </li>

                                <li class="">
                                    <a style="color: green"
                                        href="javascript:void(0)">
                                        <span>Account</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="" style="color: green" data-bypass="true" >
                                        <span>Help</span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="cat_counts">
                        <button class="btn btn-danger smobitrigger ion-navicon-round"
                                data-placement="bottom"
                                id="popover" data-html="true">
                            <i class="fa fa-shopping-cart"></i><span class="cart_hidd"> Cart</span>
                            <span class="cart-qty-badge number-item"
                                  aria-label="Items in cart: ">0</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="department_header_bottom">
            <ul class="ul-department-header" id="ul_department_header">
                <li class="logo__scroll" style="position: absolute !important;">

                    <img class="hero-middle-logo logo_scroll_img" v-bind:src="outletInfo.logo_image"
                         v-bind:alt="outletInfo.outlet_name">
                    <span> {{outletInfo.outlet_name}} </span>
                </li>
                <li class=" departments_tab">
                    <a href="javascript:void(0)">
                        <div class="icon home"></div>
                        <span>Home</span>
                    </a>
                </li>
                <li class="">
                    <a href="javascript:void(0)">
                        <div class="icon mydepartment"></div>
                        <span>Departments</span></a>
                </li>
                <li class="">
                    <router-link :to="{ name: 'my.items' }">
                        <div class="icon myitem"></div>
                        <span>My Items</span>
                    </router-link>
                </li>
                <li class="availability_li">
                    <div class="availability-link">
                        <a class="availability-link_a pt-0" data-toggle="modal" data-target=".outlet_available_time"
                           href="javascript:void(0)">
                            Available
                            <strong class="availability_time" style="position: relative; margin-left: 5px;">
                                <span class="text-by-next">
                                        No delivery Available
                                    </span>

                                <div style="width: 20px; display: inline-block">
                                </div>
                                <div style="display: inline-block; position: absolute; top: -3px; right: 0px">
                                    <svg width="18px" height="18px" viewBox="0 0 24 24" aria-hidden="true"
                                         fill="currentColor" style="margin-left: 8px; flex-shrink: 0;">
                                        <path
                                            d="M12 23C5.925 23 1 18.075 1 12S5.925 1 12 1s11 4.925 11 11-4.925 11-11 11zm0-1c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10zm0-11.5a1 1 0 0 1 1 1V16a1 1 0 0 1-2 0v-4.5a1 1 0 0 1 1-1zM12 9a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path>
                                    </svg>
                                </div>
                            </strong>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ScrollHeader"
    }
</script>

<style scoped>
    .input-group{
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .search_submit_btn{
        outline: none;

    }

    @media only screen and (max-width: 1060px) {
      .div-search-blok{
          display: none;
      }
    }



    .sidenav {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        background-color: #111;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenav a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: #818181;
        display: block;
        transition: 0.3s;
    }

    .sidenav a:hover {
        color: #f1f1f1;
    }

    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }

    @media screen and (max-height: 450px) {
        .sidenav {padding-top: 15px;}
        .sidenav a {font-size: 18px;}
    }


</style>
