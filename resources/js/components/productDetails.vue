<template>
    <div class="BVBVBV">
        <b-modal id="singleProduct" size="xl" hide-header hide-footer>
            <b-button-close @click="$bvModal.hide('singleProduct')"></b-button-close>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <a :href="'/store/'+product.outlet_name+'/departments/'+product.department_id" class="text-success">
                        <p>{{ product.department_name }}</p>
                    </a>
                    <div class="text-center">
                        <img :src="product.product_info_image" alt="" @error="errorSrc" class="productImage">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="row product_detail_title">
                        <h2 class="productTitle">{{ product.product_name }}</h2>
                        <h6 class="productUnit" >{{ product.label_value }} {{ product.unit}}</h6>
                        <!--  Product Price  -->
                        <h4 v-if="product.status_available === 0">OUT OF STOCK</h4>
                        <h4 class="productPrice" v-else>JD {{ product.our_selling_price }}
                            <span v-if="product.sold_per === 3">each</span>
                            <span v-if="product.sold_per === 2"> / kg</span>
                        </h4>
                        <!-- End  Product Price  -->
                        <h5 class="text-secondary font-weight-bolder" v-show="this.product.our_selling_price !== this.product.original_price"><s>JD {{ product.original_price }}</s></h5>
                    </div>
                    <div class="row" style="color: #61bf3d">
                        <div class="col-12">
                            <div class="row mb-2" v-if="product.sold_per === 3">
                                <img src="https://cdn.basket.jo/assets/front/basket/new_design/icons/weight-icon.png" alt="weight_icon" class="col-1 m-1">
                                <span class="font-weight-bolder mr-1"> Price Estimate: </span>
                                <span class="prce_estimate_pricedd">  JD {{ parseFloat(product.our_selling_price*product.approx_weight).toFixed(2)}} ( JD ( {{product.our_selling_price}} / kg × {{ product.approx_weight }} kg )   </span>
                            </div>
                            <label class="productQuantity">Quantity:</label>
                            <div class="form-group form-inline col-12 p-0">
                                <div class="p-0" v-bind:class="[product.cart_qty < 1 ? 'p-1 col-12 col-lg-4 col-md-4' : 'col-12 col-md-8 col-lg-12']">
                                    <input  v-bind:class="[product.cart_qty < 1 ? '' : 'bg-success text-white']" class="col-12 countInput form-control-lg text-center font-weight-bolder" type="text" id="workExp"
                                            v-model="product.cart_qty > 0 ? addCount.value + ' in cart': addCount.value" @click="clicked = true" :options="addCount.options"
                                            onKeyDown="return false" min="1" max="999" readonly
                                            :placeholder="'Please Choose in'">
                                    <i class="fas fa-sort fa-2x rangeIcons" v-bind:class="[product.cart_qty < 1  ? 'text-dark' : 'text-white']"></i>
                                </div>
                                <div class="count-options" v-bind:class="{fade : !clicked}"
                                     @mouseleave="clicked = false">
                                    <div class="bg-white  p-0" data-spy="scroll" v-bind:class="[product.cart_qty < 1 ? 'p-1 col-12 col-lg-4 col-md-4' : 'col-12']"
                                         style="max-height: 200px;overflow-y: scroll;top: 3rem;position: absolute;left: 0;z-index: 999;">
                                        <ul class="list-group">
                                            <li class="list-group-item list-group-item-action list-group-item-white btn btn-default rounded-0"
                                                v-bind:class="[product.cart_qty < 1 ? '' : 'bg-success  text-white  border-0 ']"
                                                 @click="option === product.cart_qty ?  false : changeCount(option)" v-for="option in addCount.options"
                                                style="line-height: 0">
                                                {{ option === product.cart_qty ? option + 'in cart'  : option }}
                                            </li>
                                            <li class="list-group-item list-group-item-action list-group-item-white btn btn-default rounded-0"
                                                v-bind:class="[product.cart_qty < 1 ? '' : 'bg-success  text-white border-0']"
                                                style="line-height: 0" @click="customCount" v-if="!custom">
                                                <span>My Count</span>
                                            </li>
                                            <li class="list-group-item list-group-item-action list-group-item-white btn btn-default p-1 rounded-0"
                                                v-bind:class="[product.cart_qty < 1 ? '' : 'bg-success  text-white border-0']"
                                                style="line-height: 0" v-if="custom">
                                                <input @change="customCount" type="number"
                                                       class="col-12 form-control-sm"
                                                       :placeholder="product.sold_per !== 3 ? 'My Count pc.':'My Count kg'"
                                                       v-model="addCount.value" min="10" max="999">
                                            </li>
                                            <li class="list-group-item list-group-item-action list-group-item-white btn btn-default rounded-0"
                                                v-bind:class="[product.cart_qty < 1 ? '' : 'bg-success text-white  border-0']"
                                                v-if="product.cart_qty > 0"
                                                @click="removeItem(product.cart_detail_id)"
                                                style="line-height: 0">
                                                <span>Remove Item</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <button class="btn btn-lg text-white col-lg-7 col-12 ml-2" v-bind:class="{fade:product.cart_qty}" style="background-color: #61bf3d;"
                                        @click="addItemToCart(addCount.value)">
                                    <b class="fa fa-plus"> <span style="font-family: Sans-Serif"> Add To Cart</span></b>
                                </button>
                            </div>
                        </div>
                        <div class="col-lg-12 text-success font-weight-bold form-inline text-center mt-1"
                             style="border-bottom: 1px #e5e5e5;border-bottom-style: inset;">
                            <p class="btn text-success font-weight-bolder col-5 text-center" style="line-height: 45px;"
                               @click="changeFavorite(product.is_favorited)">
                                <i :class="this.product.is_favorited ? 'fas fa-heart' : 'far fa-heart'"
                                   style="width:25%;position: relative;top:5px;font-size: 25px;"></i>
                                <span class="d-lg-inline-block d-none"> {{ product.is_favorited ? 'Favorited' : 'Favorite' }}</span>
                            </p>

                            <p class="col-5 text-center" style="line-height: 45px;">
                                <b-link href="#" @click="editInstruction(product)" class="text-success">
                                    <i class="fas fa-edit"
                                       style="width:25%;position: relative;top:5px;font-size: 25px;"></i><span class="d-lg-inline-block d-none"> Add Instruction</span>
                                </b-link>
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-12 productDepartment form-inline text-sm-center">
                    <div class="col-md-6 col-sm-12">
                        <a :href="'/store/'+outletLink+'/departments/'+product.department_id"
                           class="btn btn-link text-success">
                            <h6>View more</h6>
                            <h4>{{ product.department_name}}<i class="fa fa-angle-right text-secondary ml-3"></i></h4>
                        </a>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <img :src="product.department_image" class="depart-img-info">
                    </div>
                </div>
            </div>
        </b-modal>

    </div>
</template>

<script>
    import Multiselect from 'vue-multiselect';
    import {helpers} from "../mixins/helpers";
    import Cookies from 'js-cookie';

    export default {
        name: "productDetails",
        props: ['item'],
        mixins: [helpers],
        components: {Multiselect},
        data() {
            return {
                addCount: {
                    value: 1,
                    options: [1, 2, 3, 4, 5, 6, 7, 8, 9]
                },
                userData: [],
                language: Cookies.get('languageId'),
                product: {},

                clicked: false,
                outletLink: '',
                custom: false,
                old_qty: []
            }
        },

        methods: {

            errorSrc(event) {
                event.target.src = "/images/no_image.jpg"
            },

            getProductDetail(product) {
                axios.post(apiDev + '/product-detail', {
                    language: this.language,
                    outlet_id: product.outlet_id,
                    token: this.userData.token,
                    user_id: this.userData.user_id,
                    outlet_item_id: product.outlet_item_id,
                    custom_product_id: product.cart_detail_id,
                }).then(response => {
                    this.$ga.event('Product Detail' , 'showed product');
                    this.product = response.data.response.product_detail;
                    this.addCount.value = this.product.cart_qty > 0 ? this.product.cart_qty : 1;
                    this.$bvModal.show("singleProduct");
                    this.outletLink = this.product.outlet_name.trim().toLowerCase().replace(' ', '-').replace(' ', '-');
                }).catch(error => {

                })
            },

            changeFavorite(status) {
                let url = !status ? '/add-to-favorite' : '/delete-from-favorite';

                if (!status){
                    this.$ga.event('Add to Favorite' , 'added');
                }else{
                    this.$ga.event('Remove favorite' , 'removed');
                }

                axios.post(apiDev + url, {
                    language: this.language,
                    token: this.userData.token,
                    user_id: this.userData.user_id,
                    outlet_item_id: this.product.outlet_item_id,
                }).then(response => {
                    if (response.data.response.httpCode === 200) {
                        this.product.is_favorited = !status ? 1 : 0;
                        this.getProductDetail(this.product);
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
                        this.getProductDetail(this.product);
                        // this.product.cart_qty = 0;
                        // this.addCount.value = 1;
                        bus.$emit('removeItemCart', true);
                    }
                }).catch(error => {

                })

            },

            addItemToCart(qty) {

                    axios.post(apiDev + '/add-cart', {
                        language: Cookies.get('languageId'),
                        user_id: this.userData.user_id,
                        token: this.userData.token,
                        outlet_id: this.product.outlet_id,
                        outlet_item_id: this.product.outlet_item_id,
                        quantity:qty,
                        notes: ''
                    }).then(response => {
                        if(response.data.response.httpCode == 200){
                            bus.$emit('showTo', this.product);
                            bus.$emit('addToCart', response.data.response.cart_count);
                            this.$ga.event('Add To Cart' , 'added' , 'added to cart' , this.product.our_selling_price);
                            this.$bvToast.toast(response.data.response.Message, {
                                title: 'Basket',
                                autoHideDelay: 5000,
                                toaster: 'b-toaster-bottom-left',
                                appendToast: true
                            });
                            this.$ga.event('Add To Cart' , 'added');
                            this.getProductDetail(this.product);
                            bus.$emit('add-item-to-cart', true);
                        }
                    })
                this.old_qty.push(qty);
            },

            changeCount(count) {
                this.addCount.value = count;
                this.clicked = false;
                if (this.product.cart_qty>0){
                    this.addItemToCart(count);
                }
            },
            customCount() {
                let value;
                if (this.addCount.value > 999 && this.product.sold_per === 1){
                    value = 999;
                }else if(this.addCount.value < 1 && this.product.sold_per === 1){
                    value = 1;
                }else{
                    value = this.addCount.value;
                }

                this.addCount.value = parseInt(value);
                this.changeCount(value);

                this.custom = !this.custom;
                if (!this.custom) {
                    this.clicked = false;
                }
            },

            editInstruction(product) {
                this.$root.$emit('changeProduct', {product:product,type: 'productDetail'});
                this.$bvModal.show('product-instruction-edit');

            }
        },

        created() {
            this.userData = JSON.parse(Cookies.get('userData')).userData;
            bus.$on('showProductDetailModal', (product) => {
                if (product) {
                    this.userData = JSON.parse(Cookies.get('userData')).userData;
                    this.getProductDetail(product)
                }
            });
            // bus.$on('add-item-to-cart', (result) => {
            //     if (result) {
            //         this.getProductDetail(this.product)
            //     }
            // });
        },

        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData;
            // bus.$on('updateInstruction' , (data)=>{
            //     if (data.type === 'productDetail'){
            //         this.getProductDetail(data.product);
            //     }
            // });
        },

        destroyed() {
            this.$root.$emit('bv::hide::modal', 'product-instruction-edit');
        }
    }
</script>


<style scoped>
    .productTitle{
        width: 486px;
        font-weight: 600;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.3;
        letter-spacing: normal;
    }
    .productUnit{
        width: 400px;
        font-size: 16px;
        font-weight: normal;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.3;
        letter-spacing: normal;
        color: #999999;
    }
    .productPrice{
        width: 400px;
        height: 32px;
        font-size: 26px;
        font-weight: bold;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.3;
        letter-spacing: normal;
        color: #262c1d;
    }
    .productQuantity{
        width: 400px;
        height: 20px;
        font-size: 16px;
        font-weight: normal;
        font-stretch: normal;
        font-style: normal;
        line-height: 1.3;
        letter-spacing: normal;
        color: #757575;
    }
    .rangeIcons{
        position: absolute;
        right: 25px;
        top: 15px;
        font-size: 20px;
    }
    .productImage {
        max-height: 60vh;
        height: 100%;
        max-width: 100%;
    }

    .list-group li {
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        border-bottom: 1px solid #eee;
    }

    .productDepartment {
        padding: 1rem;
        border-top: 0.3px solid #e5e5e5;
        border-bottom: 0.3px solid #e5e5e5;
    }

    .depart-img-info {
        min-height: 10vh;
        max-height: 17vh;
        height: 100%;
    }

    .form-control-lg{
        border: 1px lightgrey solid;
    }

    @media only screen and (max-width: 800px) {
        .depart-img-info {
            max-height: 7vh;
        }
        .productImage{
            max-height: 25vh;
        }
    }

    .product_detail_title {
        display: inline;
        line-height: 32px;
        font-weight: bolder;
    }

    input[type=number] {
        border: 1px solid #e5e5e5;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        opacity: 1;
    }

    p .fa-heart:before {
        content: "\f004" !important;
        position: relative;
        width: 0;
        height: 0;
        background: none;
        top: 0;
        margin: 0;
        filter: none;
        -webkit-filter: none;
    }
</style>
