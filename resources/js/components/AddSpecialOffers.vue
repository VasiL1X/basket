<template>
    <div class="modal fade example-modal-lg_special in modal_special" id="modal_special" tabindex="-1" role="dialog"
         aria-labelledby="addSpecial" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content p-2" id="modal_content_special">
                <div class="col-12">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h3 class="modal-title-special text-center font-weight-bold">Make Your Special Request</h3>
                </div>
                <div class="col-md-10 offset-1">
                    <h6 class="modal-massage text-secondary">Include a photo and as much detail as
                        you can to help
                        your shopper find the right item.
                        Please note that your personal shopper cannot
                        accept special requests for alcohol and tobacco at this
                        time.</h6>
                </div>

                <div class="new_address_sec">
                    <div class="form-group">
                        <div class="common_text_fellds">
                            <label class="label-modal-what">What are you looking
                                for?</label>
                            <input class="form-control border modal-input-search-item" name="product_name"
                                   placeholder="Name" v-model="product" v-validate="'required'"
                                   value="fsadsadsad" type="text">
                            <div v-if="submitted && errors.has('product_name')" class="error-message">
                                {{errors.first('product_name')}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-inline">
                            <div class="col-md-6">
                                <div class="common_text_fellds number-fields" style="padding-left: 0 !important;">
                                    <label class="modal-quantity-label" for="units_2">Quantity</label>
                                    <input value="1" type="number" name="units" id="units_2" min="1" max="999"
                                           v-model="units" v-validate="'required|min_value:1|max_value:999'"
                                           class="form-control border modal-quantity-input" style="width: 100%">
                                    <div v-if="submitted && errors.has('units')" class="error-message">
                                        {{errors.first('units')}}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="common_text_fellds number-fields" style="padding-left: 0px !important;">
                                    <label class="modal-quantity-label" for="price_2">Price</label>
                                    <input value="1" type="number" name="price" id="price_2" min="1" max="9999"
                                           v-model="price" v-validate="'required|min_value:0.01|max_value:9999'"
                                           class="form-control border modal-quantity-input" style="width: 100%">
                                    <div class="error-message" v-if="submitted && errors.has('price')" >
                                        {{errors.first('price')}}
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-12">
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

                    <div class="form-group p-1">
                        <div class="select_unit_sect">
                            <multiselect
                                track-by="id"
                                label="name"
                                name="department"
                                v-model="department"
                                :options="departments"
                                placeholder="Select Department"
                                v-validate="'required'"
                            >
                            </multiselect>
                            <span class="error-message" v-if="submitted && errors.has('department')">{{errors.first('department')}}</span>
                        </div>
                    </div>


                    <input type="hidden" class="departmentId" name="departmentId">


                    <input class="form-control" name="price_per_unit" placeholder="Price" value="0" type="hidden">


                    <div class="form-group d-inline-flex">
                        <div class="col-7">
                                    <textarea name="notes" id="notes" class="modal-text-dis" v-model="description"
                                              placeholder="Additional instructions (optional)" type="text"></textarea>
                        </div>

                        <div class="col-5">
                            <div class="image-select-button image-missing modal-img-item ">
                                <label><input type="file" id="file_2" @change="processFile($event)" name="item_file"
                                              style="display: none">
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

                    <div class="form-group">
                        <button class="btn btn-primary col-12" @click="handleSubmit">
                            Add special request to cart
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import Multiselect from "vue-multiselect";
    import Cookies from "js-cookie";

    export default {
        name: "AddSpecialOffers",
        components: {
            Cookies,
            Multiselect
        },
        data() {
            return {
                userData: {},
                product: '',
                units: 0,
                price: 0,
                description: '',
                unitType: '',
                unitTypes: [
                    {id: 1, text: 'Unit'},
                    {id: 2, text: 'KG'}
                ],
                department: '',
                departments: [],
                submitted: false,
                language: Cookies.get('languageId'),
                productImage: '',
                previewImage: 'https://www.dev-basket.com/assets/front/basket/new_design/images/browse-file.png',
                custom: {
                    product_name: {
                        required: 'Please enter the name of product'
                    },
                    units: {
                        required: 'Please enter the unit of product',
                        min_value: 'Unit can not be less than  1',
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

            handleSubmit() {
                this.submitted = true;

                const config = {
                    headers: {'content-type': 'multipart/form-data'}
                };
                console.log(this.$validator.errors)


                let formData = new FormData();
                formData.append('product_name', this.product);
                formData.append('product_sold_type', this.unitType.text);
                formData.append('product_image', this.productImage);
                formData.append('quantity', this.units);
                formData.append('notes', this.description);
                formData.append('cart_type', 0);
                formData.append('product_price', this.price);
                formData.append('language', this.language);
                formData.append('user_id', this.userData.user_id);
                formData.append('token', this.userData.token);
                formData.append('outlet_id', this.userData.outlet_id);
                formData.append('department_id', this.department.id);
                formData.append('department_name', this.department.name);

                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post(apiDev + '/add-custom-item-to-cart', formData, config).then(response => {
                            if (response.data.response.httpCode === 200) {
                                let data = {
                                    product_name: this.product,
                                    product_info_image: this.previewImage = this.previewImage === 'https://www.dev-basket.com/assets/front/basket/new_design/images/browse-file.png' ? '/images/no_image.jpg' : this.previewImage,
                                    label_value: this.units,
                                    unit: this.unitType.text,
                                };
                                bus.$emit('showTo', data);
                                bus.$emit('addToCart', response.data.response.cart_count);
                                this.$bvToast.toast(response.data.response.Message, {
                                    title: 'Basket',
                                    autoHideDelay: 5000,
                                    toaster: 'b-toaster-bottom-left',
                                    appendToast: true
                                });
                                bus.$emit('cartLIst');
                                $(".modal_special").modal('hide');

                                this.product = '';
                                this.units = 0;
                                this.price = 0;
                                this.department = '';
                                this.unitType = '';
                                this.submitted = false;
                                this.productImage = '';
                                this.description = '';
                                this.previewImage = 'https://www.dev-basket.com/assets/front/basket/new_design/images/browse-file.png';

                            }

                        }).catch(error => {

                        })
                    }
                });
            },

            getDepartmentsLIst() {
                axios.post(apiDev + '/store-department-list', {
                    token: this.userData.token,
                    outlet_id: this.userData.outlet_id ? this.userData.outlet_id : 67
                }).then(response => {
                    let list = response.data.response.department_list;
                    this.departments = list;
                    this.departments.unshift({id: 1, name: 'I dont know this department'});
                }).catch(error => {

                });
            }
        },

        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData;
            this.$validator.localize('en', this.custom);
            this.getDepartmentsLIst();

        }
    }
</script>

<style scoped>
    .modal-input-search-item {
        border: 4px grey;
    }
    .number-fields{
        height: 110px;
    }
</style>
