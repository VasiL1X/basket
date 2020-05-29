<template>
    <div>
        <home-header>
        </home-header>
        <section v-if="showSlider" class="deportments_section common_dep_list deportments_new_list">
            <div class="container-fluid">
                <div class="common_dep_list_listing">
                    <div class="space100"></div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="responsive_filters_sections" id="fillterid">
                                <div class="common_dep_list_filter">
                                    <div class="common_dep_list_section1 section11">
                                        <h3 class="dep_inf_title animated-background"><a href="#"></a></h3>
                                        <ul>
                                            <li  class="animated-background"></li>
                                            <ul style="padding-left: 5%;">
                                                <li class="animated-background mt-2" v-for="i in 7"></li>
                                            </ul>
                                        </ul>
                                    </div>
                                    <!-- Brands Start Hear -->



                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="dept_listing_common">
                                <div class="dept_listing_common">
                                    <h1 class="col-sm-3 main_title_dept new animated-background text-left"></h1>
                                    <div class="list_of_products list_parent_div mt-4"  v-for="i in 10">
                                        <div class="row">
                                            <div v-for="i in 6" class="col-md-2 col-lg-2 col-sm-4 col-xs-6 padding0">
                                                <div class="items_box">
                                                    <div class="div-box animated-background"></div>
                                                    <div class="items_info_box">
                                                        <ul>
                                                            <li class="animated-background"></li>
                                                            <li class="animated-background"></li>
                                                            <li class="animated-background"></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space"></div>
        </section>
        <section v-else class="deportments_section common_dep_list deportments_new_list">
        <div class="container-fluid">
            <div>
                <div class="">
                    <div class="common_dep_list_listing">
                        <div class="space100"></div>
                        <div class="row">
                            <div :class="[width > 992 ? 'col-md-2' : 'col-12']">
                                <div class="common_dep_list_filter">
                                    <div class="common_dep_list_filter_responsive">
                                        <div class="common_dep_list_section1">
                                            <h3 class="dep_inf_title">
                                                <router-link :to="{ name: 'departments' }">
                                                    Back to Departments
                                                </router-link>
                                            </h3>
                                            <div class="common_dep_list_inside">
                                                <ul class="res_scroll">
                                                    <li class="active">
                                                        <router-link
                                                            :to="{ path: '/store/'+outletName +'/departments/'+departmentId}"
                                                            :title="aisleList.department_detail.name">
                                                            {{aisleList.department_detail.name}}
                                                        </router-link>
                                                    </li>

                                                    <ul class="aisleLIst">
                                                        <li v-for="(aisle, index) in aisleList.aisle_list" v-if="aisle.product_list.length > 0">
                                                            <router-link
                                                                class="text-success"
                                                                :to="{ path: '/store/'+outletName +'/departments/'+departmentId+'/aisles/'+aisle.aisle_id}"
                                                                :title="aisle.aisle_name">
                                                                {{aisle.aisle_name}}
                                                            </router-link>
                                                        </li>
                                                    </ul>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div :class="[width > 992 ? 'col-md-10' : 'col-12']">
                                <div class="dept_listing_common">
                                    <div class="dept_listing_common top_title_slider_section">
                                        <h1 class="main_title_dept text-left">{{aisleList.department_detail.name}}</h1>
                                        <div class="delivery_promotional_banner web-banner-image">
                                            <div v-if="aisleList.department_detail.web_banner_image" :style="'background-image:url(' + aisleList.department_detail.web_banner_image+')'"></div>
                                        </div>
                                        <div v-if="aisleList.aisle_list.length > 0">
                                            <div class="list_of_recommended featured_product department-all-item-list" v-for="department in aisleList.aisle_list" v-if="department.product_list.length > 0">
                                                <div class="list_of_recommended_sider">
                                                    <div class="new_ins_title">
                                                        <h1 class="main_title_dept">{{department.aisle_name}}</h1>
                                                        <router-link
                                                            :to="{ path: '/store/'+outletName +'/departments/'+departmentId+'/aisles/'+department.aisle_id}"
                                                            data-bypass="false" class="right_text_content"
                                                            data-radium="true">
                                                            View more
                                                            <i class="fa fa-chevron-right"></i>
                                                        </router-link>
                                                    </div>
                                                    <div class="regular_slider_common" role="toolbar">
                                                        <div class="fad_sliders"></div>
                                                        <item-hooper :products="department.product_list" :type="type" :hooperSettings="hooperSettings"></item-hooper>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <items-empty v-else :type="'department'"></items-empty>
                                    </div>
                                </div>
                                <div class="space"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <product-details></product-details>
    </section>
    </div>
</template>

<script>
    import 'hooper/dist/hooper.css';
    import {
        Hooper,
        Slide,
        Navigation as HooperNavigation
    } from 'hooper';
    import Cookies from "js-cookie";
    import {helpers} from '../../mixins/helpers'
    import HomeHeader from "../../components/HomeHeader";
    import ProductDetails from "../../components/productDetails";
    import ItemHooper from "../../components/ItemHooper";
    import ItemsEmpty from "../../components/ItemsEmpty";

    export default {
        name: "DepartmentInfo",
        middleware: 'auth',
        components: {
            ItemsEmpty,
            ItemHooper,
            ProductDetails,
            HomeHeader,
            Hooper,
            Slide,
            HooperNavigation
        },
        mixins: [helpers],
        data() {
            return {
                departmentId: '',
                outletInfo: {},
                outletName: '',
                aisleList: {
                    department_detail: {
                        name: ''
                    }
                },
                width:0,
                showSlider: true,
                type: 'department',
                hooperSettings: {
                    infiniteScroll: false,
                    centerMode: false,
                    autoPlay: false,
                    mouseDrag: false,
                    wheelControl: false,
                    playSpeed: 3500,
                    breakpoints: {
                        1800: { // 1800px ~
                            itemsToShow: 6,
                            itemsToSlide: 1

                        },
                        1460: { // 1460px ~ 1800px
                            itemsToShow: 5,
                            itemsToSlide: 1

                        },
                        1170: { // 1170px ~ 1460px
                            itemsToShow: 4,
                            itemsToSlide: 1
                        },
                        860: { // 860px ~ 1100px
                            itemsToShow: 3,
                            itemsToSlide:1
                        },
                        585: { // 585px ~ 820px
                            itemsToShow: 2,
                            itemsToSlide:1
                        },
                        0: { // 0px ~ 370px
                            itemsToShow: 1,
                            itemsToSlide: 1
                        }
                    }
                }
            };
        },

        methods: {
            getOutletInfo() {
                let _this = this;
                axios.post(apiDev + '/store-department-list-web', {
                    language: this.language,
                    outlet_id: this.userData.outlet_id ? this.userData.outlet_id : 67,
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.outletInfo = response.data.response.outlet_details;
                        _this.outletName = response.data.response.outlet_details.outlet_id
                    }
                }).catch(error => {

                })
            },

            getAisleList() {
                let _this = this;
                axios.post(apiDev + '/store-aisle-list', {
                    language: this.language,
                    outlet_id: this.userData.outlet_id ? this.userData.outlet_id : 67,
                    department_id: this.departmentId,
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    customer_id: this.userData.user_id,
                    vendor_id: this.userData.vendor_id,
                }).then(response => {
                    this.showSlider = false,
                    this.aisleList = response.data.response;
                }).catch(error => {

                })
            },

        },

        created() {
            this.departmentId = this.$route.params.departmentId;
            this.userData = JSON.parse(Cookies.get('userData')).userData
            bus.$on('closeCartClear', (data) => {
                if (data) {
                    this.getAisleList()
                }
            });

            bus.$on('add-item-to-cart', (data) => {
                if (data) {
                    this.getAisleList();
                }
            });
            bus.$on('removeItemCart', (data) => {
                if (data) {
                    this.getAisleList();
                }
            });
        },

        mounted() {
            this.getOutletInfo();
            this.getAisleList();
            this.width = window.screen.width;
        }
    }
</script>

<style scoped>

    @media screen and (max-width: 991px) {
        .res_scroll{
            width: 100%!important;
            margin-top: 4rem;
            padding: 0;
        }
        .aisleLIst{
            height: 13vh;
            display: inline-flex;
            overflow-y: auto;
        }
        .aisleLIst li{
            width: max-content;
            display: inline-flex;
            margin: 15px 5px auto;
        }
        .aisleLIst li a{
            display: inline;
            max-width: 397px;
            width: max-content;
            padding: 5px;
        }
    }
        .discount {
        font-size: 15px !important;
        margin-left: 4px !important;
        font-weight: 400 !important;
        text-decoration: line-through;
        color: #757575 !important;

    }

    .badge.badge--sale {
        display: block;
        height: 20px;
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

    ul li a:hover {
        color: #43b02a !important;
    }
    .web-banner-image > div{
        width: 100%;
        height: 250px;
        background-size: contain;
        background-repeat: no-repeat;
    }

    .delivery_promotional_banner img {
        border-radius: 6px;
        padding: 5px;
        width: 100%;
        max-height: 50vh;
        height: 100%;
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

    @media only screen and (max-width: 600px) {
        .regular_slider_common {
            height: 275px;
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

    .department-all-item-list {
        width: 100%
    }

    .deportments_new_list {
        margin-top: 110px;
    }
    .main_title_dept.text-left{
        font-size: 44px;
    }
    .delivery_promotional_banner{
        margin-top: 0;
    }
    .aisle-hover a{
        color: #61bf3d;
        font-weight: 700;
    }
    .list_of_recommended{
        margin-bottom: 24px;
    }
    .deportments_new_list .section11 h3.dep_inf_title{
        width: 250px;
    }
    li.animated-background{
        height: 20px;
        margin-top: 5px;
        width: 100%;
    }
    .deportments_new_list h1.main_title_dept.new{
        height: 50px;
        display: block;
        margin: 0;
    }
</style>
