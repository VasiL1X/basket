<template>
    <div>
        <div class="modal fade add_new_card" id="addNewCard" tabindex="-1" role="dialog"
             aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="text-white" style="background:#43ad16;">
                        <button type="button" class="close p-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h1 class="modal-title-new">Add Card</h1>
                    </div>
                    <div class="new_address_sec">

                        <form action="https://checkout.payfort.com/FortAPI/paymentPage" method="post"
                              name="shoppers_check" id="shoppers_check">


                            <div class="form-row">
                                <div class="form-group required card-cvc">
                                    <div class="error form-group hide" v-if="error">
                                        <div class="alert-danger alert">{{error}}.</div>
                                    </div>
                                    <label class="control-label" style="font-weight: bold;">Name on Card</label>
                                    <input class="form-control" type="text" v-model="card_holder_name"
                                           name="card_holder_name" required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group card required card-cvc">
                                    <label class="control-label" style="font-weight: bold;">Card Number</label>
                                    <input autocomplete="off" class="form-control card-number" v-model="card_number"
                                           name="card_number" id="card_number" pattern="\d*" maxlength="16"
                                           minlength="12" type="text" required="">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group cvc required card-cvc">
                                    <label class="control-label" style="font-weight: bold;">CVV</label>
                                    <input autocomplete="off" class="form-control card-cvc" v-model="card_security_code"
                                           placeholder="ex. 311" pattern="\d*" maxlength="4" minlength="3" type="text"
                                           name="card_security_code" required="">
                                </div>


                                <div class="form-group card-cvc" id="expiration-date">
                                    <div class="form-group">
                                        <label class="control-label" style="font-weight: bold">Expiration Date</label>
                                        <input type="text"
                                               placeholder="Expiration Date"
                                               id="expiry_date_input"
                                               class="form-control"
                                               maxlength="5"
                                               v-model="expiryDateInput"
                                               @keyup="expiryDate()"
                                        >

                                    </div>
                                </div>

                            </div>

                            <input type="hidden" name="expiry_date" id="expiry_date" v-model="expiryOriginalDate">
                            <input type="hidden" name="service_command" id="service_command" v-model="service_command">
                            <input type="hidden" name="access_code" id="access_code" v-model="access_code">
                            <input type="hidden" name="merchant_identifier" id="merchant_identifier"
                                   v-model="merchant_identifier">
                            <input type="hidden" name="merchant_reference" id="merchant_reference"
                                   v-model="merchant_reference">
                            <input type="hidden" name="language" id="language" v-model="language">
                            <input type="hidden" name="signature" id="signature" v-model="signature">
                            <input type="hidden" name="remember_me" id="remember_me" v-model="remember_me">
                            <input type="hidden" name="return_url" id="return_url" v-model="return_url">
                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default shopper-continue">Continue <i
                                    class="glyph-icon flaticon-arrows"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {helpers} from '../mixins/helpers'
    import Cookies from 'js-cookie';

    export default {
        name: "AddNewCardModal",
        data() {
            return {
                service_command: 'TOKENIZATION',
                access_code: '3OEaLWz4JtcIbclSCPCo',
                merchant_identifier: 'ktUTXnpN',
                merchant_reference: '',
                language: 'en',
                signature: '',
                remember_me: 'YES',
                return_url: '',
                card_holder_name: '',
                card_number: '',
                card_security_code: '',
                expiryDateInput: '',
                expiryOriginalDate: '',
                userData: [],
                error: '',

                responseCode:'',
                cardNumber:'',
                cardHolderName:'',
                expiryDateRes:'',
                responseMessage:'',
                serviceCommand:'',
                merchantReference:'',
                paymentOption:'',
                tokenName:''


            };
        },
        mixins: [helpers],
        methods: {
            expiryDate() {

                if (this.expiryDateInput.length == 2) {
                    this.expiryDateInput = this.expiryDateInput + '/'
                }
                if (this.expiryDateInput.length == 5) {
                    var res = this.expiryDateInput.split("/");
                    this.expiryOriginalDate = '' + res[1] + res[0]
                }
            },
            getError() {

                let _this = this;
                axios.post('/get/card/errors', {

                }).then(response => {
                    _this.error = response.data.error;
                    if(response.data.error){
                        $('#addNewCard').modal('show');
                    }
                }).catch(error => {

                })

            },
            getResponse() {
                let _this = this;
                axios.post('/get/card/data', {

                }).then(response => {

                    _this.responseCode=response.data.data.response_code;
                    _this.cardNumber=response.data.data.card_number;
                    _this.cardHolderName=response.data.data.card_holder_name;
                    _this.expiryDateRes=response.data.data.expiry_date;
                    _this.responseMessage=response.data.data.response_message;
                    _this.serviceCommand=response.data.data.service_command;
                    _this.merchantReference=response.data.data.merchant_reference;
                    _this.paymentOption=response.data.data.payment_option;
                    _this.tokenName=response.data.data.token_name;
                    _this.createCard();

                }).catch(error => {

                })
            },
            createCard() {
                let _this = this;
                axios.post(apiDev +'/store-user-card', {
                    user_id:_this.userData.user_id,
                    token:_this.userData.token,
                    response_code: _this.responseCode,
                    card_number:_this.cardNumber,
                    card_holder_name:_this.cardHolderName,
                    expiry_date: _this.expiryDateRes,
                    response_message: _this.responseMessage,
                    service_command:_this.serviceCommand,
                    merchant_reference:_this.merchantReference,
                    token_name: _this.tokenName,
                    payment_option: _this.paymentOption,
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
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
                        });
                    }
                    $('#addNewCard').modal('hide');
                }).catch(error => {

                })
            }

        },
        mounted() {
            if(this.$route.query.type == 2){
                this.getError();
            }

            if(this.$route.query.type == 1){
                this.getResponse();
            }

            this.userData = JSON.parse(Cookies.get('userData')).userData
            var token = this.getToken();
            this.merchant_reference = token;
            var returnUrl = 'http://127.0.0.1:8000/payment/response?page=1&user_id=' + this.userData.user_id;
            this.return_url = returnUrl;
            var signature = 'BASKETaccess_code=' + this.access_code + 'language=' + this.language + 'merchant_identifier=' + this.merchant_identifier + 'merchant_reference=' + token + 'return_url=' + returnUrl + 'service_command=' + this.service_command + 'BASKET';
            var signatureHash = sha256(signature);
            this.signature = signatureHash;
        },
        created() {

        }
    }
</script>

<style scoped>
    .card-cvc {
        width: 100%;
    }

    .card {
        position: relative;
        display: -webkit-box;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #f7f7f7;
        background-clip: border-box;
        border: 0px solid rgba(0, 0, 0, 0.125);
        border-radius: 0.25rem;
    }

    .input-lable {
        font-weight: 600;
        font-size: 14px;
    }
</style>
