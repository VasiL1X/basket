<template>
    <div class="modal fade search_add example-modal-lg_special in"  tabindex="-1" role="dialog"
         aria-labelledby="addItems" id="search-add">

        <div class="modal-dialog modal-lg" role="document" id="modal_special">
            <div class="modal-content modalContent" id="modal_content_special">
                <div class="col-md-12">
                    <button type="button" class="close p-1" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p class="modal-title-special text-center pt-3">Add item</p>
                    <p class="modal-massage">Include a photo and as much detail as
                        you can to help
                        your shopper find the right item.
                        Please note that your personal shopper cannot
                        accept special requests for alcohol and tobacco at this
                        time.</p>
                </div>

                <div class="new_address_sec">
                    <form onsubmit="return false">
                        <div class="form-group">
                            <div class="form-inline col-12 pt-2">
                                <div class="common_text_fellds"
                                     style="padding-left: 0px !important;; padding-right: 0px!important;">
                                    <label class="label-modal-what" for="product_name">What are you looking
                                        for?</label>
                                    <input v-model="product" v-validate="'required'"
                                           :class="{ 'is-invalid': submitted && errors.has('product_name') }"
                                           class=" modal-input-search-item col-12" name="product_name" id="product_name"
                                           placeholder="Name" type="text">
                                    <div v-if="submitted && errors.has('product_name')" class="invalid-feedback">Name is
                                        required
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix">
                                <div class="form-inline">
                                    <div class="col-md-6">
                                        <div class="common_text_fellds" style="padding-left: 0px !important;height: 8rem">
                                            <label class="modal-quantity-label" for="units">Quantity</label>
                                            <input value="1" type="number" name="units" id="units" min="1" max="999"
                                                   v-model="units" v-validate="'required|min_value:1|max_value:999'"
                                                   class="col-12 modal-quantity-input">
                                            <div v-if="submitted && errors.has('units')" class="invalid-feedback">
                                                {{errors.first('units')}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="common_text_fellds" style="padding-left: 0px !important;height: 8rem">
                                            <label class="modal-quantity-label" for="price">Price</label>
                                            <input value="1" type="number" name="price" id="price" min="1" max="9999"
                                                   v-model="price" v-validate="'required|min_value:0.01|max_value:9999'"
                                                   class="col-12 modal-quantity-input">
                                            <div v-if="submitted && errors.has('price')" class="invalid-feedback">
                                                {{errors.first('price')}}
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-12 pt-2">
                                    <div class="select_unit_sect">
                                        <multiselect
                                            track-by="id"
                                            label="text"
                                            v-model="unitType"
                                            :options="unitTypes"
                                            placeholder="Select Unit Type"
                                            v-validate="'required'"
                                            name="unit_type"
                                        >
                                        </multiselect>
                                        <span class="error-message" v-if="submitted && errors.has('unit_type')">{{errors.first('unit_type')}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="display: none">
                                <div>
                                    <div class="col-md-12" style="position: relative">

                                        <div class="department-choose"
                                             style="background-color: rgb(255, 255, 255); border: 1px solid rgb(189, 189, 189); border-radius: 4px; box-sizing: border-box; color: rgb(66, 66, 66); font-size: 16px; height: 56px; margin: 0px; padding: 25px 25px 8px 8px; outline: none; position: relative; opacity: 1; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
                                            <label data-radium="true"
                                                   style="color: rgb(117, 117, 117); cursor: inherit; font-size: 16px; margin: 0px; pointer-events: none; position: absolute; transform: scale(0.85) translate(8px, 6px); transform-origin: left top; transition: all 450ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; user-select: none; z-index: 1; top: 0px; left: 0px;">Department</label>
                                            <div data-radium="true"
                                                 style="white-space: nowrap; text-overflow: ellipsis; overflow: hidden; user-select: none; display: inline-block;">
                                                <div data-radium="true"
                                                     style="color: rgb(189, 189, 189); cursor: inherit; font-size: 16px; position: absolute; opacity: 0; transform: scale(1) translate(9px, 26px); transform-origin: left top; transition: visibility 0ms linear 250ms, opacity 250ms cubic-bezier(0.23, 1, 0.32, 1) 0ms; pointer-events: none; z-index: 1; visibility: hidden; top: 0px; left: 0px;">
                                                    Select a Department
                                                </div>
                                                <span class="department-select">I don't know its department</span>
                                            </div>
                                            <div data-radium="true"
                                                 style="display: flex; flex-direction: column; user-select: none; position: absolute; right: 8px; top: 22px;">
                                                <i class="fa fa-chevron-down icon-department" aria-hidden="true"
                                                   style="color: rgb(67, 176, 42); transform: rotate(0deg);"></i>
                                                <input type="hidden" class="icon-department-input" value="1">
                                            </div>
                                        </div>
                                        <div class="department-list" style="display: none">
                                            <div class="department-item" data-radium="true" style=" padding: 16px 0px;">
                                                <div data-radium="true" style="display: table;">
                                                    <div data-radium="true"
                                                         style="padding: 0px 16px; white-space: nowrap;">
                                                        I don't know its department
                                                    </div>
                                                    <input type="hidden" value="I don't know its department"
                                                           class="department-name">

                                                    <input class="department-id" type="hidden" value="">
                                                </div>
                                            </div>
                                            <div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                            <input type="hidden" class="departmentId" name="departmentId">


                            <input class="form-control" name="price_per_unit" id="price_per_unit" placeholder="Price"
                                   value="0" type="hidden">


                            <div class="form-group">
                                <div class="clearfix">
                                    <div class="col-md-6 d-inline-block">
                                    <textarea name="notes" id="notes " class="modal-text-dis" v-model="description"
                                              placeholder="Additional instructions (optional)" type="text"
                                              style="width: 97%"></textarea>
                                    </div>

                                    <div class="col-md-5 d-inline-block">
                                        <div class="image-select-button image-missing modal-img-item ">
                                            <label><input type="file" id="file"  @change="processFile($event)" name="item_file" style="display: none">
                                                <img
                                                    :src="previewImage"
                                                    alt="" class="img-add" id="ImagePreview">
                                                <div class="image-label label-modal-add-photo">
                                                    Add a photo
                                                    (optional)
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="button" @click="handleSubmit"
                                        class="btn btn-primary add_custom-cart  item-continue"
                                        style="width: 100%">
                                    Add item
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Multiselect from "vue-multiselect";
    import Cookies from "js-cookie";

    export default {
        name: "AddItemModal",
        components: {
            Cookies,
            Multiselect
        },
        data() {
            return {
                userData: {},
                unitType: '',
                product: '',
                units: '',
                price: '',
                description: '',
                productImage: '',
                previewImage: 'https://www.dev-basket.com/assets/front/basket/new_design/images/browse-file.png',
                unitTypes: [
                    {id: 1, text: 'Unit',disabled:false},
                    {id: 2, text: 'KG',disabled:false}
                ],
                submitted: false,

                language: Cookies.get('languageId'),
                dict : {
                    custom: {
                        product_name: {
                            required: 'Please enter the name of product'
                        },
                        units: {
                            required: 'Please enter the unit of product',
                            min_value: 'Unit can not be less than 1',
                            max_value: 'Unit can not be high than 999',
                        },
                        price: {
                            required: 'Please enter the price of product',
                            min_value: 'Price can not be less than 0.01 JD',
                            max_value: 'Price can not be high than 9999 JD',
                        },
                        unit_type: {
                            required: 'Please choose unit type of product',
                        },
                        department: {
                            required: 'Please choose department of product',
                        },
                    }
                }
            }
        },
        methods: {

            processFile(event) {
                this.productImage = event.target.files[0];
                if (this.productImage) {
                    let _this = this;
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        _this.previewImage = e.target.result;
                    };

                    reader.readAsDataURL(this.productImage);
                }

            },

            handleSubmit(e) {
                this.submitted = true;

                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                };

                let formData = new FormData();
                formData.append('product_name', this.product);
                formData.append('product_sold_type', this.unitType.text);
                formData.append('product_image',  this.productImage);
                formData.append('quantity', this.units);
                formData.append('notes', this.description);
                formData.append('cart_type', 0);
                formData.append('product_price', this.price);
                formData.append('language', Cookies.get('language'));
                formData.append('user_id', this.userData.user_id);
                formData.append('token', this.userData.token);
                formData.append('outlet_id', this.userData.outlet_id);


                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post(apiDev + '/add-custom-item-to-cart', formData , config).then(response => {
                            if (response.data.response.httpCode == 200) {
                                let data = {
                                    product_name : this.product,
                                    product_info_image : this.previewImage = this.previewImage === 'https://www.dev-basket.com/assets/front/basket/new_design/images/browse-file.png' ? '/images/no_image.jpg' : this.previewImage,
                                    label_value : this.units,
                                    unit : this.unitType.text,
                                };
                                bus.$emit('showTo', data);
                                bus.$emit('addToCart', response.data.response.cart_count);
                                this.$bvToast.toast(response.data.response.Message, {
                                    title: 'Basket',
                                    autoHideDelay: 5000,
                                    toaster: 'b-toaster-bottom-left',
                                    appendToast: true
                                });
                                this.previewImage  = 'https://www.dev-basket.com/assets/front/basket/new_design/images/browse-file.png';
                                this.product ='';
                                this.units =0;
                                this.price =0;
                                this.department= '';
                                this.unitType = '';
                                this.submitted= false;
                                this.productImage = '';
                                this.description ='';
                                bus.$emit('cartLIst');
                                $(".search_add").modal('hide');
                            }
                        }).catch(error => {

                        })
                    }else{
                        this.$validator.errors.has('units')
                    }
                });
            }
        },

        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData;
            this.$validator.localize('en', this.dict);
            let _this = this;
            $('#search-add').on('shown.bs.modal', function () {
                _this.submitted = false;
            });
        },
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
    .add_custom-cart:hover, .add_custom-cart:active {
        background-color: #d7e3e2;
        transition-duration: 0.5s;
    }
    .invalid-feedback{
        display: block;
    }

    .add_custom-cart {
        border-color: #43ad16;
        background-color: #43ad16;
        transition-duration: 0.5s;
    }

    .modal-title-special {
        color: black;
        font-size: 28px;
        font-weight: 600;
    }

    .modal-massage {
        color: rgb(117, 117, 117);
        margin-bottom: 0px;
        padding: 0px 16px;
        text-align: left;
        font-size: 18px;
    }

    .modal-content {
        max-width: 42rem;
    }

    .common_text_fellds {
        width: 100%;
        border-radius: 4px;
        padding: 10px;
    }

    input[type=date], input[type=email], input[type=number], input[type=password], input[type=search], input[type=tel], input[type=text], textarea {
        border: 1px solid #e5edec;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
        padding: 0 15px;
        height: 40px;
        font-size: 14px;
    }

    .unit-select {
        border: 1px solid rgb(189, 189, 189);
        border-radius: 4px;
        font-size: 16px;
        padding: 25px 25px 8px 8px;
        position: relative;
    }

    #ImagePreview{
        height: 65px;
        width: 65px;
    }
</style>
