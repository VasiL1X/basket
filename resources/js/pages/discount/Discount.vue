<template>
    <div>
        <div>
            <homeHeader></homeHeader>
        </div>
        <section v-show="!showLoader" class="deportments_section common_dep_list mt-5 mt-lg-0 mt-md-0">
            <div class="container-fluid">
                <div class="row">
                    <div class="dept_listing_common">
                        <h1 class="main_title_dept  dept_listing_common_main_title_dept text-left p-3">
                            {{ currentPage.title }}
                        </h1>
                        <div class="list_of_products list_parent_div" v-show="!showLoader">
                            <item :products="products" :type="type" v-if="products.length > 0"></item>
                            <items-empty :type="type" v-else></items-empty>
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>
        </section>
        <product-details></product-details>
        <green-loader v-show="showLoader"></green-loader>
    </div>
</template>

<script>
    import homeHeader from "../../components/HomeHeader";
    import Cookies from "js-cookie";
    import Item from "../../components/Item";
    import ProductDetails from "../../components/productDetails";
    import GreenLoader from "../../components/GreenLoader";
    import ItemsEmpty from "../../components/ItemsEmpty";

    export default {
        name: "discount",
        middleware: 'auth',
        components: {
            ItemsEmpty,
            GreenLoader,
            ProductDetails,
            Item,
            homeHeader
        },
        data() {
            return {
                language: Cookies.get('languageId'),
                discount: [],
                userData: [],
                type: 'discount',
                showLoader: true,
                currentPage: {},
                products: {},
                pages: {
                    myItems: {title: "My Items", src: "/user-ordered-items"},
                    my_favorite: {title: "My Favorite", src: "/favorite-items-list"},
                    discounts: {title: "Discount", src: "/sale-items-list"},
                    ramadan: {title: "Ramadan", src: "/ramadan-items-list"},
                }
            };
        },

        methods: {
            getDiscount() {
                let _this = this;
                axios.post(apiDev + this.currentPage.src, {
                    language: _this.language,
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    outlet_id: _this.userData.outlet_id ? _this.userData.outlet_id : 67,
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        if (this.$route.params.name === 'myItems') {
                            _this.products = response.data.response.ordered_items;
                        } else {
                            _this.products = response.data.response.product_list;
                        }
                    }
                    this.showLoader = false;
                }).catch(error => {

                })
            },

        },

        created() {
            this.userData = JSON.parse(Cookies.get('userData')).userData;
            bus.$on('refreshMyItems', (data) => {
                if (data) {
                    this.userData = JSON.parse(Cookies.get('userData')).userData;
                    this.getDiscount();
                }
            });

            bus.$on('add-item-to-cart', (data) => {
                if (data) {
                    this.getDiscount();
                }
            });
            bus.$on('removeItemCart', (data) => {
                if (data) {
                    this.getDiscount();
                }
            });
        },

        mounted() {
            this.currentPage = this.pages[this.$route.params.name];
            if (this.currentPage !== undefined) {
                this.getDiscount('');
            } else {
                this.currentPage = {title: "Invalid Product List"};
                this.showLoader = false;
            }
        },

    }
</script>

<style scoped>
    .button-plus-new {
        background-color: white;
        color: rgb(46, 137, 19);
        border: 1px solid rgb(46, 137, 19);
    }

    .item-inline-block {
        display: inline-block;
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
    /*.dept_listing_common{*/
    /*    margin-top: 6rem;*/
    /*}*/
</style>
