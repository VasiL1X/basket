<template>
    <div>
        <home-header></home-header>
        <section class="deportments_section common_dep_list deportments_new_list">
            <div class="container-fluid">
                <div>
                    <div class="common_dep_list_listing" v-if="!showLoader">
                        <div v-if="productList.length > 0" class="row pt-5 mt-5">
                            <div class="col-md-2">
                                <div class="responsive_filters_sections" id="fillterid">
                                    <div class="close_buttons_popup"><a>X</a></div>

                                    <div
                                        class="common_dep_list_filter">
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
                                                          v-for="brand in selected">{{ getBrandName(brand) }} <i
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
                                            <ul>
                                                <li class="common_dep_list_filter-litst-item">
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- Brands Start Hear -->
                                        <div class="filter_sections_com dep_new_list_filter_sections_com" v-if="brands.length> 0">
                                            <h3 class="filter_sections_com_h3">Filter Results</h3>
                                        </div>
                                        <div class="common_dep_list_section1 filtersections"
                                             v-if="brands.length > 0">
                                            <h4 class="dep_inf_botom">Brands</h4>
                                            <ul>
                                                <li class="li_brand_list common_dep_list_filter-litst-item" v-for="brand in brands"
                                                    @click="getBradId(brand.id)"
                                                    style="display: block">
                                                    <input :id="'chk'+ brand.id"
                                                           v-bind:class="{ checked: selected.includes(brand.id) }"
                                                           type="radio" :name="'brand_name'+ brand.id"
                                                           value="" class="brand_class">
                                                    <i class="fa fa-check text-white"
                                                       v-if="selected.includes(brand.id)"></i>
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
                            <div class="col-10 dept_listing_common">
                                <div class="dept_listing_common mt-5">

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
                                    <div class="dept_listing_sort  mr-5 mt-5">

                                        <b-dropdown :text="filtered" variant="text-dark"
                                                    class="bg-white m-2 rounded-0 col-12 font-weight-bolder text-left filterBtn">
                                            <b-dropdown-item href="#" @click="filter(1, 'Sort by Brand')">Group
                                                by Brand
                                            </b-dropdown-item>
                                            <b-dropdown-item href="#" @click="filter(3, 'Price: Lowest First')">
                                                Price: Lowest First
                                            </b-dropdown-item>
                                            <b-dropdown-item href="#"
                                                             @click="filter(2, 'Price: Highest First')">Price:
                                                Highest First
                                            </b-dropdown-item>
                                        </b-dropdown>

                                    </div>
                                    <div class="list_of_products list_parent_div mt-2">

                                        <div class="container-fluid">
                                            <h4 class="p-2 font-weight-bold"><p>{{ productList.length }} results for "<span v-html="value"></span>" </p></h4>
                                            <item :products="productList" :type="type"></item>

                                            <div class="col-12  text-center pb-5 pt-5">
                                                <!-- Modal Button -->
                                                <b-button id="show-btn" variant="success" class="col-6"
                                                          data-toggle="modal" data-target=".search_add"
                                                          v-if="!showNoResult">
                                                    <b>Add Items</b>
                                                </b-button>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div v-else class="col-12" style="margin-top: 33vh;">
                            <div class="error-module text-center">
                                <div class="card p-2 mb-2">
                                    <img src="https://www.dev-basket.com/imgs/no-results.png"
                                         class="img-responsive m-auto" alt="">
                                    <h1 style="font-weight: 900">Oops</h1>
                                    <p v-html="'We could not find results for \''+ value + '\' at this store'"></p>
                                </div>
                                <div class="col-md-6 col-sm-12 text-center card m-auto p-2">
                                <span class="specialRequestLink">
                                  <b class="title text--darken-3">Can't find something?</b>
                                      <b-button class="special-request" variant="outline-success"
                                                data-toggle="modal" data-target=".modal_special">
                                          <b>
                                              Add a special request
                                          </b>
                                      </b-button>
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space" v-if="!showNoResult"></div>
            </div>
            <product-details></product-details>
            <add-item-modal></add-item-modal>
            <add-special-offers></add-special-offers>
            <green-loader v-if="showLoader"></green-loader>
        </section>
    </div>

</template>

<script>
    import Cookies from "js-cookie";
    import HomeHeader from "../../components/HomeHeader";
    import AddItemModal from "../../components/AddItemModal";
    import AddSpecialOffers from "../../components/AddSpecialOffers";
    import Item from "../../components/Item";
    import ProductDetails from "../../components/productDetails";
    import GreenLoader from "../../components/GreenLoader";
    import ItemsEmpty from "../../components/ItemsEmpty";

    export default {
        name: "Search",
        components: {ItemsEmpty, GreenLoader, ProductDetails, Item, AddSpecialOffers, AddItemModal, HomeHeader},
        data() {
            return {
                value: '',
                userData: {},
                productList: {},
                brands: [],
                selected: [],
                filterId: 0,
                filtered: 'Sort by Best Match',
                department_id: '',
                form: {
                    email: '',
                    name: '',
                    food: null,
                    checked: []
                },
                foods: [{text: 'Select One', value: null}, 'Carrots', 'Beans', 'Tomatoes', 'Corn'],
                show: true,
                showNoResult: true,
                showLoader: true,
                type: 'search',
            };
        },

        methods: {
            onSubmit(evt) {
                evt.preventDefault()
                alert(JSON.stringify(this.form))
            },
            onReset(evt) {
                evt.preventDefault()
                // Reset our form values
                this.form.email = ''
                this.form.name = ''
                this.form.food = null
                this.form.checked = []
                // Trick to reset/clear native browser form validation state
                this.show = false
                this.$nextTick(() => {
                    this.show = true
                })
            },
            addItemToCart(outletItemId) {
                axios.post(apiDev + '/add-cart', {
                    language: Cookies.get('languageId'),
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    outlet_id: this.userData.outlet_id ? this.userData.outlet_id : 67,
                    outlet_item_id: outletItemId,
                    quantity: 1,
                    notes: ''
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        this.getAisleList();
                        bus.$emit('addToCart', response.data.response.cart_count)
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
                    this.getStoreProductList();
                }).catch(error => {
                });

                this.showLoader = false;

            },

            getBradId(id) {

                if (this.selected.includes(id)) {
                    this.selected.splice(this.selected.indexOf(id), 1);
                } else {
                    this.selected.push(id);
                }

                console.log(this.brands,this.selected)

                this.searchProduct();
            },
            resetSelected() {
                this.selected = [];
                this.getStoreProductList(this.aisleId);
            },

            getBrandName(id) {
                let result = this.brands.find(obj => {
                    return obj.id === id
                });
                return result.brand_title;

            },

            searchProduct() {
                axios.post(apiDev + '/search-product', {
                    web: 1,
                    language: Cookies.get('languageId'),
                    product_search: this.value,
                    user_id: this.userData.user_id,
                    outlet_id: this.userData.outlet_id ? this.userData.outlet_id : 67,
                    token: this.userData.token,
                    order_by: this.filterId,
                    brand_ids: this.selected ? this.selected : []
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        if (response.data.response.product_list.length) {
                            this.productList = response.data.response.product_list;
                            if (!this.filterId) {
                                let brands = response.data.response.brand_list;
                                let filtered = [];
                                brands.forEach(brand => {
                                    if (brand.id !== null && !filtered.includes(brand.id)) {
                                        this.brands.push(brand);
                                        filtered.push(brand.id)
                                    }
                                });
                            }
                            this.showNoResult = false;
                            $(".ui-menu-bottom").hide();
                        } else {
                            this.productList = response.data.response.product_list;
                            let brands = response.data.response.brand_list;
                            if (!this.selected.length) {
                                let filtered = [];
                                brands.forEach(brand => {
                                    if (brand.id !== null && !filtered.includes(brand.id)) {
                                        this.brands.push(brand);
                                        filtered.push(brand.id);
                                    }
                                });
                            }
                            this.showNoResult = false;
                        }

                    }
                    this.showLoader = false;
                }).catch(error => {
                    this.showLoader = false;
                })
            },

            filter(filterId, filterName) {
                this.filterId = filterId;
                this.filtered = filterName;
                this.searchProduct()
            },
        },


        created() {

            this.userData = JSON.parse(Cookies.get('userData')).userData;
            this.value = this.$route.params.value;
            this.departmentId = this.$route.params.departmentId;
            this.aisleId = this.$route.params.aisleId;
            this.userData = JSON.parse(Cookies.get('userData')).userData;

            bus.$on('searchValue', (data) => {
                if (data) {
                    this.value = data;
                    this.searchProduct();
                }
            });

            bus.$on('add-item-to-cart', (data) => {
                if (data) {
                    this.searchProduct();
                }
            });
            bus.$on('removeItemCart', (data) => {
                if (data) {
                    this.searchProduct();
                }
            });
        },

        mounted() {
            this.searchProduct();
        },
    }
</script>

<style scoped>
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
    .filterBtn{
        border-radius: 7px!important;
        border: #ccc 1px solid;
    }
    .radio{
        max-width: 195px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .brand_class.checked {
        background-color: #4a9641;
        background-image: none;
    }

    li.li_brand_list {
        position: relative;
    }

    i.fa-check.text-white {
        position: absolute;
        text-align: center;
        left: .4em;
        top: 0.7em;
    }

    .special-request {
        transition-duration: .5s;
        border-color: white;
    }

    .special-request:hover, .special-request:active {
        transition-duration: .5s;
        color: var(--theme-color);
        background-color: #E2F3DF;
        border-color: var(--theme-color);
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
    /*no*/
    .filtersections .radio:hover .inner {
        -webkit-transform: scale(.5);
        -ms-transform: scale(.5);
        transform: scale(.5);
        opacity: .5
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

    .filtersections .radio .outer {
        width: 20px;
        height: 20px;
        float: left;
        margin: 0 11px 0 0;
        border: 2px solid #9e9e9e;
        border-radius: 50%;
        background-color: #fff
    }

    .filtersections .radio .inner {
        -webkit-transition: all .25s ease-in-out;
        transition: all .25s ease-in-out;
        width: 16px;
        height: 16px;
        -webkit-transform: scale(0);
        -ms-transform: scale(0);
        transform: scale(0);
        display: block;
        margin: 0;
        border-radius: 50%;
        background-color: var(--theme-color);
        opacity: 0
    }


</style>
