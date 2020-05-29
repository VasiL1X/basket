<template>
    <div style="position: relative; width: 100%">
        <div>
            <homeHeaderComponent></homeHeaderComponent>
        </div>
        <!-- If result isn't received -->
        <section v-if="showLoader" class="deportments_section common_dep_list_bask skelton">
            <div class="container-fluid item_listing_sec">
                <div class="row">
                    <div class="col-10 deportments_new_list list_of_products col-11" :id="'list-' + l_index"
                         v-for="l_index in 3">
                        <h2 class="main_title_dept new animated-background"></h2>
                        <div class="col-md-2 col-lg-2 col-sm-4 col-xs-6 padding0 d-inline-block"
                             :id="'product-' + p_index" v-for="p_index in 6">
                            <div class="items_box deportments_new_list_items_box">
                                <div class="div-box deportments_new_list_deiv-box animated-background"></div>
                                <div class="items_info_box">
                                    <ul class="items_info_box_list">
                                        <li class="animated-background items_info_box_list_item"></li>
                                        <li class="animated-background items_info_box_list_item"></li>
                                        <li class="animated-background items_info_box_list_item"></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- If result received -->
        <div v-else class="container-fluid p-2" style="background-color: #f7f7f7">
            <div class="col-10 p-2 list_of_recommended featured_product department-all-item-list"
                 v-if="department.section_type =='customized'" v-for="(department , key) in homePageList">
                <div class="list_of_recommended_sider">
                    <div class="new_ins_title new_ins_title_main_title_dept">
                        <h1 class="main_title_dept  font-weight-bolder">{{department.name}}</h1>
                        <router-link :to="{ name: 'list', params:{name:strReplease(department.name)}}" v-if="department.section_type_id != 6"
                                     data-bypass="false" class="right_text_content" data-radium="true">View more<i
                            class="glyph-icon flaticon-arrow-point-to-right"></i>
                        </router-link>
                    </div>
                    <div class="regular_slider_common" role="toolbar">
                        <div class="fad_sliders"></div>
                       <item-hooper :products="department.product_list" :type="type" :hooperSettings="hooperSettings"></item-hooper>
                    </div>
                </div>
            </div>
            <div class="department_new bg-light text-center">
                <h2 class="text-dark departments-title">Browse Departments</h2>
                <div class="container-fluid">
                    <div class="col-12 form-inline" v-if="department.section_type_id == 0" v-for="department in homePageList">
                        <div class="col-sm-2 col-12 card d-inline-block m-1" style="max-width: 210px;" v-for="value in department.departments">
                            <router-link :to="{ path: '/store/'+outletName +'/departments/'+value.id}" v-bind:title="value.name">
                                <img v-bind:src="value.image" class="p-1 department_new_img-box_img"  v-bind:alt="value.name" @error="errorSrc">
                            </router-link>
                            <h5 class="department_dept_titlle p-1">
                                <router-link :to="{ path: '/store/'+outletName +'/departments/'+value.id}"
                                   data-bypass="false"
                                   v-bind:title="value.name"
                                   class=" department_dept_titlle_link">
                                    {{value.name}}
                                </router-link>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End If -->
    </div>
</template>
<script>
    import Cookies from 'js-cookie'
    import homeHeaderComponent from '../components/HomeHeader'
    import 'hooper/dist/hooper.css';
    import {helpers} from '../mixins/helpers'
    import ItemHooper from "../components/ItemHooper";

    export default {
        name: "Home",
        middleware: 'auth',
        mixins: [helpers],
        data() {
            return {
                showLoader: false,
                scrolled: false,
                userData: [],
                language: Cookies.get('languageId'),
                homePageList: [],
                nextDeliverySlot: '',
                checkShowLoader: true,
                outletInfo: {},
                outletName: '',
                type:'home',
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
                            itemsToSlide: 6

                        },
                        1460: { // 1460px ~ 1800px
                            itemsToShow: 5,
                            itemsToSlide: 5

                        },
                        1170: { // 1170px ~ 1460px
                            itemsToShow: 4,
                            itemsToSlide: 4
                        },
                        860: { // 860px ~ 1100px
                            itemsToShow: 3,
                            itemsToSlide:3
                        },
                        585: { // 585px ~ 820px
                            itemsToShow: 2,
                            itemsToSlide:2
                        },
                        0: { // 0px ~ 370px
                            itemsToShow: 1,
                            itemsToSlide: 1
                        }
                    }
                }
            };
        },
        components: {
            ItemHooper,
            homeHeaderComponent,
        },
        methods: {
            handleScroll() {
                this.scrolled = window.scrollY > 290;

            },

            errorSrc(event) {
                event.target.src = "/images/no_image.jpg"
            },

            getStoreHomePageList() {
                if(this.checkShowLoader){
                    this.showLoader = true;
                }
                let _this = this;
                axios.post(apiDev + '/store-home-page-list', {
                    language: _this.language,
                    token: _this.userData.token,
                    outlet_id: _this.userData.outlet_id ? _this.userData.outlet_id : 67,
                    user_id: _this.userData.user_id,
                    web: 1,
                    is_department_needed: 1
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.homePageList = response.data.response.data;
                        _this.nextDeliverySlot = response.data.response.next_delivery_slot;
                    }
                    this.showLoader = false;
                    this.checkShowLoader = false;
                }).catch(error => {
                    this.showLoader = false;
                })
            },

            getOutletInfo() {
                let _this = this;
                axios.post(apiDev + '/store-department-list-web', {
                    language: this.language,
                    outlet_id: this.userData.outlet_id ? this.userData.outlet_id : 67,
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.outletInfo = response.data.response.outlet_details;
                        _this.outletName = response.data.response.outlet_details.outlet_id;
                    }
                }).catch(error => {

                })
            },

            strReplease(string){
                string  = string === 'Buy it again' ? 'My Items' : string;
                let separated = string.trim().replace(' ' , '_').toLowerCase();
                return separated;
            }
        },

        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.getStoreHomePageList();
            this.getOutletInfo();
        },

        created() {
            window.addEventListener('scroll', this.handleScroll);

            bus.$on('closeCartClear', (data) => {
                if (data) {
                    this.getStoreHomePageList()
                }
            });


            bus.$on('changeStoreAndCooke', (data) => {
                if (data) {
                    this.showLoader = true;
                    this.userData.outlet_id = data;
                    this.getStoreHomePageList();
                }
            }),

            bus.$on('multipleOrder', (data) => {
                if (data) {
                    this.showLoader = true;
                    this.getStoreHomePageList();
                }
            })

            bus.$on('add-item-to-cart', (data) => {
                if (data) {
                    this.getStoreHomePageList();
                }
            });

            bus.$on('removeItemCart', (data) => {
                if (data) {
                    this.getStoreHomePageList();
                }
            });
        },

        destroyed() {
            window.removeEventListener('scroll', this.handleScroll);
        },
    }
</script>

<style scoped>
    *{
    font-family: "OpenSans-Bold";
    /*font-family: 'Open Sans', 'Helvetica Neue', Arial, Helvetica, sans-serif;*/
    }
    .button-plus-new {
        background-color: white;
        color: rgb(46, 137, 19);
        border: 1px solid rgb(46, 137, 19);
    }

    .hide-plus-circle {
        display: inline-block !important;
    }

    .items_list .items_img .inner_add_carts {
        left: 0;
    }

    .cart_item_incr {
        display: inline-block;
    }

    .addItem {
        display: none !important;
    }

    .department_new .img-box {
        min-height: 200px;
        border: none;
        min-width: 200px;
        margin: 10px auto;
    }


    /*.department_new .img-box {*/
    /*    float: left;*/
    /*}*/

    .badge {
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

    .discount {
        font-size: 15px !important;
        margin-left: 4px !important;
        font-weight: 400 !important;
        text-decoration: line-through;
        color: #757575 !important;
    }

    @media only screen and (max-width: 598px) {
        .department_new .img-box {
            min-width: auto;
            max-height: 180px;
            min-height: 134px;
            margin-right: 6px;
            background-color: rgb(255, 255, 255);
            border-radius: 4px;
        }
    }

    @media (max-width: 767px) {
        .items_list {
            width: 61%;
            margin: 10px 2px !important;
            /* border: 1px solid #0000000f; */
        }

        .item-quantity-small {
            top: 13px;
            right: 19px;
        }
    }

    .list_of_products {
        position: relative;
        margin: 2rem auto;
    }
</style>
