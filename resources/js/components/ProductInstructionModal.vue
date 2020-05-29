<template>
    <div>
        <b-modal
            id="product-instruction-edit"
            ref="modal"
            title="Give special instructions to your shopper"
            @show="resetModal"
            @hidden="resetModal"
            @ok="handleOk"
        >
            <div class="col-8 m-auto">
                <img :src="productDetail.product_image" @error="errorSrc" height="300px">
            </div>

            <form ref="form" class="mt-3" @submit.stop.prevent="handleSubmit">
                <div class="form-group">
                    <textarea
                        id="name-input"
                        v-model="instruction"
                        class="form-control"
                        rows="3"
                        v-validate="'max:50'"
                        name="instruction"
                        v-text="productDetail.cart_notes"
                    ></textarea>
                    <span class="error-message" v-if="submitted && errors.has('instruction')">{{errors.first('instruction')}}</span>
                </div>
            </form>
        </b-modal>

        <b-alert
            dismissible
            variant="warning"
        ></b-alert>
    </div>
</template>

<script>
    import Cookies from "js-cookie";

    export default {
        name: 'ProductInstructionModal',
        props: ['product'],
        data() {
            return {
                instruction: '',
                nameState: null,
                submittedNames: [],
                userData: {},
                dismissSecs: 2,
                productDetail: {},
                called: '',
                submitted:false,
                dict : {
                    custom: {
                        instruction: {
                            max: 'Instruction can not be more than 50 character',
                        },
                    }
                }
            }
        },
        methods: {
            errorSrc(event) {
                event.target.src = "/images/no_image.jpg"
            },
            resetModal() {
                this.instruction = '';
                this.$root.$emit('bv::hide::modal', 'product-instruction-edit');
            },
            handleOk(bvModalEvt) {
                // Prevent modal from closing
                bvModalEvt.preventDefault();
                // Trigger submit handler
                this.handleSubmit();
            },
            showAlert() {
                this.dismissCountDown = this.dismissSecs
            },

            handleSubmit() {
                // Exit when the form isn't valid
                if (!this.instruction) {
                    return
                }
                // Push the name to submitted names
                this.submitted = true;
                this.$validator.validate().then(valid => {
                    if (valid){
                        axios.post(apiDev + '/add-cart', {
                            language: Cookies.get('languageId'),
                            user_id: this.userData.user_id,
                            token: this.userData.token,
                            // outlet_id: this.userData.outlet_id ? this.userData.outlet_id : 67,
                            outlet_id: this.productDetail.outlet_id,
                            outlet_item_id: this.productDetail.outlet_item_id,
                            quantity: this.productDetail.cart_qty === 0 ? 1 : this.productDetail.cart_qty,
                            notes: this.instruction
                        }).then(response => {
                            if (response.data.response.httpCode == 200) {
                                this.showAlert();
                                this.resetModal();
                                bus.$emit('updateInstruction', {product: this.productDetail, type: this.called});
                            } else if (response.data.response.httpCode == 400) {

                            }
                            this.showLoader = false;
                        }).catch(error => {
                            this.showLoader = false;
                        })
                    }
                });
            }
        },
        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData;
            this.$validator.localize('en', this.dict);
            this.$root.$on('changeProduct', (data) => {
                this.instruction = data.product.cart_notes;
                this.productDetail = data.product;
                this.called = data.type;
            });
        },
        created() {
        }
    }
</script>

<style>
    #product-instruction-edit___BV_modal_outer_ {
        z-index: 999999999 !important;
    }
</style>
