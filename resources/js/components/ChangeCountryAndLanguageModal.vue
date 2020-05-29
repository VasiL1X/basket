<template>
    <div class="modal  promocode_popup bs-example-modal-sm in" id="modal-promo" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" >
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="col-12 pt-1">
                    <button type="button" class="close pr-1" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h3  class="text-center font-weight-bolder">Change {{ text }}</h3>
                </div>
                <div class="modal-body">
                    <div class="promo_inner_sec">

                        <div class="form-group">
                            <span>Are you sure you want change {{ text }}?</span>
                        </div>
                        <div class="form-group">
                            <a  @click="change" class="btn btn-default confirm-language-change">OK</a>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-default btn-cancel" data-dismiss="modal">Cancel</button>
                        </div>

                        <input class="form-control" id="paymentType" value="1" type="hidden">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Cookies from 'js-cookie'
    export default {
        name: "ChangeCountryAndLanguageModal",
        props: ['text', 'type', 'countryId', 'languageId'],
        data () {
            return {
                userData: [],
            };
        },

        methods:{
            change(){
                if(this.type == 'country'){
                    axios.post(apiDev + '/customer/update_customer_country', {
                        user_id: this.userData.user_id,
                        token: this.userData.token,
                        country_id: this.countryId
                    }).then(response => {
                        if (response.data.status == 200) {
                            this.$bvToast.toast(response.data.message, {
                                title: 'Basket',
                                autoHideDelay: 5000,
                                toaster: 'b-toaster-bottom-left',
                                appendToast: true
                            });
                        }
                        bus.$emit('changeCountryId', this.countryId);
                        $("#modal-promo").modal('hide');
                    }).catch(error => {
                        this.showLoader = false;
                    })
                }else{
                    Cookies.set('languageId', this.languageId, { expires: 7 });
                    $("#modal-promo").modal('hide');
                    this.$bvToast.toast('Languages changed successfully', {
                        title: 'Basket',
                        autoHideDelay: 5000,
                        toaster: 'b-toaster-bottom-left',
                        appendToast: true
                    });
                    bus.$emit('languageId', this.languageId);
                    bus.$emit('getOutletInfo', this.languageId);
                }
            }
        },

        created(){
            this.userData = JSON.parse(Cookies.get('userData')).userData
        },

        mounted(){

        }
    }
</script>

<style scoped>
    .btn-cancel{
        background: transparent;
        color: green;
    }
    .btn-default:hover{
        background-color: #6f6f6f4a;
        color: green;
    }
</style>
