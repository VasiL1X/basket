<template>
    <div>
        <div class="modal fade promocode_popup bs-example-modal-sm" id="modalPromo" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="col-12 pt-2">
                        <button type="button" class="close pr-1" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        <h3 class="text-center">Add Promo Code</h3>
                    </div>
                    <div class="modal-body">
                        <div class="promo_inner_sec">
                            <div v-if="promoCodeList.length > 0">
                                <div class="form-group select_box_sce">
                                    <select
                                        name="select_pcode_value"
                                        id="select_pcode_value"
                                        v-model="promoCode"
                                    >
                                        <option value="">Select Promo code</option>
                                        <option v-bind:value="promoCode.promo_code"
                                                v-for="promoCode in promoCodeList">{{promoCode.promo_code}}</option>
                                    </select>
                                </div>
                                <span style="margin:5px 0;display:block">Or</span>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="pcode_value" id="pcode_value" tabindex="0"
                                       placeholder="Enter promo code" type="text" v-model="promoCode">
                            </div>
                            <div class="form-group">
                                <button type="button" @click="addPromoCode" class="btn btn-default" >Redeem</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Cookies from 'js-cookie'
    export default {
        name: "AddPromoCodeModal",
        data () {
            return {
                language:Cookies.get('languageId'),
                promoCodeList:[],
                userData:[],
                promoCode:''
            };
        },

        methods: {
            getPromoList() {
                let _this = this;
                axios.post(apiDev + '/list-promo-code-account', {
                    user_id:_this.userData.user_id,
                    token: _this.userData.token,
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.promoCodeList = response.data.response.promo_list
                    }
                }).catch(error => {

                })
            },
            addPromoCode() {
                let _this = this;
                axios.post(apiDev + '/add-promo-code-from-cart', {
                    user_id:_this.userData.user_id,
                    token: _this.userData.token,
                    city_id:_this.userData.city_id,
                    promo_code:_this.promoCode
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        });
                        bus.$emit('addPromoCodeFromCart', true)
                        $('#modalPromo').modal('hide');

                    }

                    if(response.data.response.httpCode == 400){
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        })
                    }
                }).catch(error => {
                    this.$bvToast.toast('You can not add promo code for this item', {
                        title: 'Basket',
                        autoHideDelay: 5000,
                        toaster: 'b-toaster-bottom-left',
                        appendToast: true
                    });
                    bus.$emit('addPromoCodeFromCart', true)
                    $('#modalPromo').modal('hide');
                })
            },
        },
        mounted(){
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.getPromoList();

        },
        created(){

        }

    }
</script>

<style scoped>
    .promocode_popup .modal-sm {
        width: 380px;
        max-width: 390px;
    }

    #select_pcode_value{
        background-color: white;
        width: 100%;
        outline: none !important;
        height: 49px;
        line-height: 47px;
        font-size: 16px;
        color: #999;
        border: 1px solid #e0e0e0;
        border-radius: 4px;
    }
</style>
