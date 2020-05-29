<template>
    <b-modal id="addItem" title="What are you looking for?"  hide-footer size="lg">
        <div class="new_address_sec new-sear">
            <div class="form-group">
                <div class="common_text_fellds">
                    <h4></h4>
                    <div class="search-box">
                        <div class="col-sm-12 col-md-12">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search"
                                       name="item_search" id="item_search" v-model="searchValue">
                                <div class="input-group-btn" style="z-index: 1000;">
                                    <button class="btn btn-light" @click="searchProduct()">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="col-md-12 text-center m-3" id="search_result_item">
                    <div class="list_of_products list_parent_div" v-if="!showLoader">
                        <item :products="productList" :type="type" :outlet_order_id="outlet_order_id" v-if="!showNoResult" ></item>
                        <items-empty :type="type" :value="searchValue" v-else></items-empty>
                    </div>
                </div>
            </div>
        </div>
    </b-modal>


</template>

<script>
    import Cookies from "js-cookie";
    import {helpers} from "../mixins/helpers";
    import GreenLoader from "./GreenLoader";
    import Item from "./Item";
    import ItemsEmpty from "./ItemsEmpty";

    export default {
        name: "AddItemsToOrder",
        props:['outlet_order_id','outlet_item_id' ,'order_list'],
        components: {ItemsEmpty, Item, GreenLoader},
        mixins: [helpers],
        data() {
            return {
                searchValue: '',
                userData: {},
                productList: {},
                showNoResult: false,
                showIcon: true,
                showLoader: true,
                language: Cookies.language,
                type: 'addItemToOrder',
            }
        },
        methods: {
            searchProduct() {
                axios.post(apiDev + '/search-product', {
                    web: 1,
                    product_search: this.searchValue,
                    user_id: this.userData.user_id,
                    outlet_id: this.outlet_item_id,
                    token: this.userData.token
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        if (response.data.response.product_list.length) {
                            this.type = 'addItemToOrder';
                            this.showLoader = false;
                            this.showNoResult = false;
                            this.showIcon = false;
                            let product_list = this.order_list.order_list[0].product_list;
                            let _this = this;
                            function checkAdult(product) {
                                return product.product_name.toLowerCase().search(_this.searchValue.toLowerCase()) !== -1;
                            }
                            let pr_ids = [];
                            function productFilter(product){
                                if (!pr_ids.includes(product.product_id)){
                                    pr_ids.push(product.product_id);
                                    return product;
                                }
                            }
                            this.productList = product_list.filter(checkAdult).concat(response.data.response.product_list);
                            this.productList = this.productList.filter(productFilter);
                        } else {
                            this.type = 'addItemToOrder';
                            this.value = this.searchValue;
                            this.showLoader = false;
                            this.showNoResult = true;
                        }

                    }
                }).catch(error => {

                })
            },

            addItemToCart(product, cartQty) {
                axios.post(apiDev + '/add-cart', {
                    language: this.language,
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    outlet_id: product.outlet_id,
                    outlet_item_id: product.outlet_item_id,
                    quantity: 1 + cartQty,
                    notes: ''
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        if (cartQty == 0) {
                            bus.$emit('addToCart', response.data.response.cart_count)
                            this.searchProduct();
                        }
                    }
                }).catch(error => {
                    this.showLoader = false;
                })
            },

            openItemBlock(id) {
                $(".innerAddCarts").addClass('addItem');
                $("#" + id).removeClass('addItem');
            },

        },
        created() {
            this.userData = JSON.parse(Cookies.get('userData')).userData;
        },

        mounted() {


        }
    }
</script>

<style scoped>
    .cart_add_btn {
        position: absolute;
        right: 5px;
        top: 5px;
        border-radius: 50%;
        height: 30px;
        width: 30px;
        -webkit-transition-duration: .5s;
        transition-duration: .5s;
        font-size: 10px;
        padding: 0;
    }

    .cart_add_btn:hover .fa-plus {
        color: white;
        transition-duration: .5s;
    }
</style>
