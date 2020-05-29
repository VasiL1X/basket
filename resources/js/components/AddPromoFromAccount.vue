<template>
    <div class="modal fade user_promocode_popup bs-example-modal-sm in" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" style="padding-right: 15px;">
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
                        <form>
                            <div class="form-group">
                                <input class="form-control"
                                       name="user_pcode_value"
                                       id="user_pcode_value" tabindex="0"
                                       placeholder="Enter promo code" type="text"
                                       v-model="promoCode"
                                >
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-default" @click="addPromoCode()">Add Promo Code</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Cookies from 'js-cookie';
    export default {
        name: "AddPromoFromAccount",
        data() {
            return {
                promoCode: '',
            };
        },

        methods: {
            addPromoCode(){
                axios.post(apiDev + '/add-promo-code-account', {
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    language:this.language,
                    promo_code:this.promoCode,
                }).then(response => {
                    $(".user_promocode_popup").modal('hide')
                    if (response.data.response.httpCode == 200) {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        });
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

                })
            }
        },

        created() {

        },

        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData

        },
    }
</script>

<style scoped>

</style>
