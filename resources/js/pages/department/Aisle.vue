<template>
    <div>
        <home-header>
        </home-header>
        <section v-if="showSlider" class="deportments_section common_dep_list deportments_new_list">
            <div class="container-fluid">
                <div class="common_dep_list_listing">
                    <div class="space100"></div>
                    <div class="row mt-5">
                        <div class="col-md-2">
                            <div class="common_dep_list_filter">
                                <div class="common_dep_list_section1 section11">
                                    <h3 class="dep_inf_title section11_dep_inf_title animated-background"><a href="#" class="dep_inf_title_link"></a></h3>
                                    <ul>
                                        <li class="animated-background"></li>
                                        <ul style="padding-left: 5%;">
                                            <li class="animated-background mt-2" v-for="i in 7"></li>
                                        </ul>
                                    </ul>
                                    <!-- Brands Start Hear -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="dept_listing_common">
                                <div class="dept_listing_common">
                                    <h1 class="col-sm-3 main_title_dept  dept_listing_common_main_title_dept new animated-background text-left"></h1>
                                    <div class="list_of_products list_parent_div mt-4" v-for="i in 10">
                                        <div class="row">
                                            <div v-for="i in 6" class="col-md-2 col-lg-2 col-sm-4 col-xs-6 padding0">
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
                            <div class="row mt-5">
                                <div :class="[width > 992 ? 'col-md-2' : 'col-12']">
                                    <div id="fillterid" >
                                        <div class="common_dep_list_filter">
                                            <div class="common_dep_list_section1" v-if="selected.length > 0">
                                                <div class="form-inline">
                                                    <h6 class="font-weight-bolder m-auto">Filtered brands</h6>
                                                    <button class="btn link-btn text-success float-right m-auto"
                                                            @click="resetSelected">Reset
                                                    </button>
                                                </div>
                                                <div class="border-bottom border-top border-secondary">
                                                    <h5>
                                                        <span class="badge bg-secondary m-2  text-white"
                                                              v-for="brand in selected"><span class="SelectedName">{{ getBrandName(brand) }}</span> <i
                                                            class="btn link-btn text-white p-0 font-weight-bolder"
                                                            @click="getBradId(brand)">&times;</i></span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="common_dep_list_section1">
                                                <h3 class="dep_inf_title">
                                                    <router-link :to="{ name: 'departments' }" class="dep_inf_title_link">
                                                        Back to Departments
                                                    </router-link>
                                                </h3>
                                                <ul class="res_scroll common_dep_list_section1_list">
                                                    <li class="d-inline common_dep_list_section1_list_item">
                                                        <router-link
                                                            class="text-success font-weight-light common_dep_list_section1_list_item_link"
                                                            :to="{ path: '/store/'+outletName +'/departments/'+departmentId}"
                                                            :title="aisleList.department_detail.name">
                                                            {{aisleList.department_detail.name}}
                                                        </router-link>
                                                    </li>
                                                    <ul class="aisleLIst common_dep_list_section1_list" style="padding-left: 5%;">
                                                        <li v-for="(aisle, index) in aisleList.aisle_list"
                                                            class="common_dep_list_section1_list_item"
                                                            v-if="aisle.product_list.length > 0"
                                                            v-bind:class="{ active: aisle.aisle_id == aisleId }">
                                                            <a href="javascript:void(0)"
                                                               class="text-success aisleLink common_dep_list_section1_list_item_link"
                                                               @click="refreshUrl(aisle.aisle_id)"
                                                               :title="aisle.aisle_name">
                                                                {{aisle.aisle_name}}
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </ul>
                                            </div>
                                            <!-- Brands Start Hear -->
                                            <div class="filter_sections_com dep_new_list_filter_sections_com pt-2"
                                                 v-if="brands !== undefined && brands.length> 0">
                                                <h3 class="filter_sections_com_h3">Filter Results</h3>
                                            </div>
                                            <div class="common_dep_list_section1 filtersections"
                                                 v-if="brands !== undefined && brands.length> 0">
                                                <h4 class="dep_inf_botom">Brands</h4>
                                                <ul>
                                                    <li class="li_brand_list" @click="getBradId(brand.brand_id)"
                                                        style="display: block" v-for="brand in brands"
                                                        v-if="brand.brand_id">
                                                        <input :id="'chk'+ brand.brand_id"
                                                               v-bind:class="{ checked: selected.includes(brand.brand_id) }"
                                                               type="radio" :name="'brand_name'+ brand.brand_id"
                                                               value="" class="brand_class filtersections_brand_class">
                                                        <i class="fa fa-check text-white"
                                                           v-if="selected.includes(brand.brand_id)"></i>
                                                        <label class="radio">
                                                            <span><span></span></span>
                                                            <span>{{ brand.brand_title}}</span>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <!-- Brands End Hear -->
                                        </div>
                                    </div>
                                </div>
                                <div :class="[width > 992 ? 'col-md-10' : 'col-12']">
                                    <div class="dept_listing_common">
                                        <div class="dept_listing_common pt-5">
                                            <h1 class="main_title_dept  dept_listing_common_main_title_dept text-left p-1">
                                                {{products.aisle_detail.aisle_name}}
                                            </h1>
                                            <div class="dept_listing_sort">

                                                <b-dropdown :text="filtered" variant="btn-outline-secondary bg-white text-dark"
                                                            class="rounded-0 m-2" style="width: 172px">
                                                    <b-dropdown-item href="#" @click="filter(1, 'Sort by Brand')">Group
                                                        by Brand
                                                    </b-dropdown-item>
                                                    <b-dropdown-item href="#" @click="filter(2, 'Price: Lowest First')">
                                                        Price: Lowest First
                                                    </b-dropdown-item>
                                                    <b-dropdown-item href="#"
                                                                     @click="filter(3, 'Price: Highest First')">Price:
                                                        Highest First
                                                    </b-dropdown-item>
                                                </b-dropdown>

                                            </div>
                                            <div class="list_of_recommended  featured_product" style="display:none">
                                                <div class="list_of_recommended_sider">
                                                    <h1 class="main_title_dept  dept_listing_common_main_title_dept">Featured Items</h1>
                                                    <section class="regular slider slick-initialized slick-slider">
                                                        <div aria-live="polite" class="slick-list draggable">
                                                            <div class="slick-track"
                                                                 style="opacity: 1; width: 0px; transform: translate3d(0px, 0px, 0px);"
                                                                 role="listbox"></div>
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <div class="list_of_products list_parent_div mt-4">
                                                <div class="container-fluid">
                                                    <item v-if="products.product_list.length > 0"
                                                          :products="products.product_list" :type="type"></item>
                                                    <items-empty v-else :type="'aisle'"></items-empty>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="space"></div>
                </div>
            </div>
        </section>
        <product-details></product-details>
    </div>
</template>

<script>
    import HomeHeader from "../../components/HomeHeader";
    import Cookies from "js-cookie";
    import ProductDetails from "../../components/productDetails";
    import Item from "../../components/Item";
    import ItemsEmpty from "../../components/ItemsEmpty";

    export default {
        name: "AisleInfo",
        middleware: 'auth',
        components: {ItemsEmpty, Item, ProductDetails, HomeHeader},
        data() {
            return {
                departmentId: '',
                aisleId: '',
                outletInfo: {},
                width:0,
                outletName: '',
                aisles: {},
                showSlider: true,
                aisleList: {
                    department_detail: {
                        name: ''
                    }
                },
                checked_nutrition: [],
                products: {},
                filterId: 1,
                brands: {},
                nutritions: {},
                filtered: 'Sort by Best Match',
                selected: [],
                type: 'aisle'
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
                        _this.outletName = response.data.response.outlet_details.outlet_id;
                    }
                }).catch(error => {

                })
            },

            getBradId(id) {
                if (this.selected.includes(id)) {
                    this.selected.splice(this.selected.indexOf(id), 1);
                } else {
                    this.selected.push(id);
                }
                this.getStoreProductList(this.aisleId);
            },

            resetSelected() {
                this.selected = [];
                this.getStoreProductList(this.aisleId);
            },

            getBrandName(id) {
                let result = this.brands.find(obj => {
                    return obj.brand_id === id
                });
                return result.brand_title;

            },

            getNutrionById(id) {
                if (this.checked_nutrition.includes(id)) {
                    this.checked_nutrition.splice(this.checked_nutrition.indexOf(id), 1);
                } else {
                    this.checked_nutrition.push(id);
                }
                this.getStoreProductList(this.aisleId);
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
                    this.aisleList = response.data.response;
                }).catch(error => {

                })
            },

            refreshUrl(aisleId) {
                this.aisleId = aisleId;
                this.$router.push({path: '/store/' + this.outletName + '/departments/' + this.departmentId + '/aisles/' + aisleId})
                this.getStoreProductList(aisleId);
                this.getNutritionsList(aisleId);
                this.getBrandsList(aisleId);
                this.getAisleList();
            },

            getStoreProductList(aisleId) {
                let _this = this;
                axios.post(apiDev + '/store-product-list', {
                    language: this.language,
                    outlet_id: this.userData.outlet_id ? this.userData.outlet_id : 67,
                    department_id: this.departmentId,
                    aisle_id: aisleId,
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    order_by: this.filterId,
                    brand_ids: this.selected ? this.selected : [],
                    nutritions_ids: this.checked_nutrition
                }).then(response => {
                    this.products = response.data.response;
                    this.showSlider = false
                }).catch(error => {

                })
            },

            getBrandsList(aisleId) {
                let _this = this;
                _this.showSlider  = true;
                axios.post(apiDev + '/store-brand-list', {
                    language: this.language,
                    outlet_id: this.userData.outlet_id ? this.userData.outlet_id : 67,
                    department_id: this.departmentId,
                    aisle_id: aisleId,
                }).then(response => {
                    this.brands = response.data.response.brand_list;
                }).catch(error => {

                })
            },

            getNutritionsList(aisleId) {
                let _this = this;
                axios.post(apiDev + '/nutrition-tag-list', {
                    language: this.language,
                    outlet_id: this.userData.outlet_id ? this.userData.outlet_id : 67,
                    department_id: this.departmentId,
                    aisle_id: aisleId,
                }).then(response => {
                    this.nutritions = response.data.response.nutrition_tag_list;
                }).catch(error => {

                })
            },

            filter(filterId, filterName) {
                this.filterId = filterId;
                this.filtered = filterName;
                this.getStoreProductList(this.aisleId)
            },

            singleProduct(product) {
                bus.$emit('showProductDetailModal', product)
            }
        },

        created() {
            this.outletName = this.$route.params.id;
            this.departmentId = this.$route.params.departmentId;
            this.aisleId = this.$route.params.aisleId;
            this.userData = JSON.parse(Cookies.get('userData')).userData;
            bus.$on('closeCartClear', (data) => {
                if (data) {
                    this.getStoreProductList(this.aisleId)
                }
            });

            bus.$on('add-item-to-cart', (data) => {
                if (data) {
                    this.getStoreProductList(this.aisleId)
                }
            });
            bus.$on('removeItemCart', (data) => {
                if (data && data === 'aisle') {
                    this.getStoreProductList(this.aisleId);
                }
            });
        },

        mounted() {
            this.getStoreProductList(this.aisleId);
            this.getNutritionsList(this.aisleId);
            this.getBrandsList(this.aisleId);
            this.getAisleList();
            this.width = window.screen.width;
        }
    }
</script>

<style scoped>
    .res_scroll>li a{
        padding: 0;
    }
    @media screen and (max-width: 991px) {
        .res_scroll{
            width: 100%!important;
        }
        .res_scroll>li a{
            width: max-content;
            background-color: #6c757d47;
            border-radius: 7px;
            padding: 5px;
        }
        .aisleLIst{
            height: 13vh;
            display: inline-flex;
            overflow-y: auto;
            padding-left: 5%;
        }
        .aisleLIst li{
            width: max-content;
            display: inline-flex;
            margin: 15px 5px auto;
            background-color: #6c757d47;
            border-radius: 7px;
        }
        .aisleLIst li a{
            display: inline;
            max-width: 397px;
            width: max-content;
            padding: 5px;
        }
    }

    .aisleLink {
        text-overflow: ellipsis;
        white-space: initial;
        overflow: hidden;
        width: 100%;
        max-width: 170px;
    }

    .SelectedName {
        max-width: 10rem;
        display: inline-block;
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    .common_dep_list_listing {
        width: 94%;
        margin: auto;
    }

    .deportments_new_list {
        margin-top: 110px;
    }

    .dept_listing_common .padding0 {
        padding: -1px !important;
    }

    .deportments_new_list {
        margin-top: 110px;
    }

    .main_title_dept  dept_listing_common_main_title_dept.text-left {
        font-size: 44px;
        display: inline;
    }

    .aisle-hover a {
        color: #61bf3d;
        font-weight: 700;
    }

    .list_of_recommended {
        margin-bottom: 24px;
    }

    .deportments_new_list .section11 h3.dep_inf_title {
        width: 250px;
    }

    li.animated-background {
        height: 20px;
        margin-top: 5px;
        width: 100%;
    }

    .deportments_new_list h1.main_title_dept  dept_listing_common_main_title_dept.new {
        height: 50px;
        display: block;
        margin: 0;
    }

    .filtersections input[type=radio] {
        width: 1.3em;
        height: 1.3em;
        margin: 0;
        padding: 10px;
        -webkit-appearance: none;
        background-size: cover;
        outline: none;
        vertical-align: middle;
        border: solid gray 2px;
        background-image: none;
    }

    li.li_brand_list {
        position: relative;
    }

    i.fa-check.text-white {
        position: absolute;
        left: 2%;
        right: 0;
        bottom: 0;
        top: 26%;
        vertical-align: middle;
        margin: auto;
        font-size: 15px;
    }

    .common_dep_list_section1 ul {
        white-space: nowrap;
        padding: 0;
    }

    .filtersections .radio {
        display: inline-block;
        margin: .3em 0;
        padding-left: 8px;
        color: #757575;
        vertical-align: middle;
        font-size: 14px;
        line-height: 26px;
        cursor: pointer;
        font-weight: 400;
    }

    .filtersections .radio input {
        width: 1px;
        height: 1px;
        opacity: 0
    }

    .filtersections .radio input:checked + .outer .inner {
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
        transform: scale(1);
        opacity: 1
    }

    .filtersections .radio input:checked + .outer {
        border: 3px solid var(--theme-color)
    }



</style>
