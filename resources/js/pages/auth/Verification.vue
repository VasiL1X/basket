<template>
    <div>
        <div class="basket_landing_page" id="top_scrolling">
            <div class="container">
                <div class="bas_left_common resend-otp-box">
                    <div class="bas_left_login_form resend-otp-box_bas_left_login_form">
                        <div class="bas_left_inner">
                            <div class="basket_base1">
                                <div class="common_forgout_pass">
                                    <div class="bask_logo">
                                        <img
                                            src="/images/logo-normal.png"
                                            alt="Basket" class="bask-logo-img">
                                        <h1 class="bask-logo-text">Welcome !</h1>
                                    </div>
                                    <div class="bask_form_center">
                                        <div class="basket_forgout_pass">
                                            <div class="form-group">
                                                <div class="row" style="margin: 0 0;">
                                                    <div id="change_mobile" v-if="changeNumber == 1">
                                                        <p style="text-align: center">Enter the new Mobile Number:</p>
                                                        <form @submit.prevent="changeMobile()">
                                                            <div class="row">
                                                                <div
                                                                    class="col-md-3 col-sm-3 col-xs-12 country_drop pr-3 pr-sm-0">
                                                                    <select name="code" id="code"
                                                                            class="js-example-disabled-results">
                                                                        <option data-countryCode="JO" value="962"
                                                                                selected>
                                                                            Jordan (+962)
                                                                        </option>
                                                                    </select>

                                                                    <Select2 v-model="countryModel" :options="country"  class="js-example-disabled-results mb-2" data-countryCode="JO"
                                                                             selected value="962" name="code" v-validate="'required'"   id="login_code"/>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="col-md-12 form-mobile-number-input-write-enter pl-1 pr-1">
                                                                        <input class="form-control basket-form-inp" name="mobile number"
                                                                               v-model="mobile"
                                                                               id="new_mobile" placeholder="Mobile*"
                                                                               v-validate="'required'">
                                                                        <span class="mb-0 error"
                                                                              v-if="errors.has('mobile number')">{{ errors.first("mobile number")}}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3 col-sm-3 col-xs-12 pl-0 pr-0 text-center">
                                                                    <button type="submit"
                                                                            id="save_new_number"
                                                                            class="btn btn-primary login_btn otp_btn btn-primary-bask">
                                                                        Save
                                                                        and Send Code
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="otp-box" id="otp_box" v-else>
                                                        <h5 class="bask-logo-text-sm otp_box_bask-logo-text-sm">Thank you for creating an account with Basket. Your account
                                                            was successfully created.</h5>
                                                        <p class="otp_box_paragraph">Please enter the One-time Password received on registered
                                                            Mobile number to verify your account:</p>
                                                        <form @submit.prevent="verify()">
                                                            <div class="row">

                                                                <div class="col-md-6 col-sm-6 col-xs-12 pr-3 pr-sm-0">
                                                                    <div class="col-md-12">
                                                                        <input v-validate="'required|integer'"
                                                                               v-model="otp" type="phone" id="otp"
                                                                               class="form-control basket-form-inp"
                                                                               placeholder="One-time Password"
                                                                               name="otp" maxlength="13" value="">

                                                                        <span class="mb-0 error"
                                                                              v-if="errors.has('otp')">{{ errors.first("otp")}}</span>

                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12 pl-3 pl-sm-0">
                                                                    <div class="col-md-12">
                                                                        <button type="submit"
                                                                                class="btn btn-primary login_btn btn-primary-bask">Verify
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                        <div class="otp_message">One-time Password sent to Mobile <span
                                                            class="otp_sendno">********* </span></div>
                                                        <span id="countdowntimer" class="pull-right"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="resend-box change-number-resend-opt" v-if="changeNumber == 0">
                                                <a href="javascript:void(0);" class="link-color" id="resendOtp_link"
                                                   @click="resendOtp">Resend One-time Password</a> |
                                                <a class="change_mobile link-color" @click="changeMobileNumber(1)">Change
                                                    Number</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bas_login">
                    <a href="javascript:void(0)" class="left_responsive_logo" title="">
                        <img src="/images/icon-normal.png"
                             alt="Basket" class="left_responsive_logo_img"></a>
                    <a href="<?php echo URL::to('/logout'); ?>" title="" class="btn btn-primary btn-primary-bask" data-bypass="true"
                       title="Login">Logout</a>
                </div>
            </div>
        </div>

        <footerComponent></footerComponent>
    </div>

</template>

<script>
    import footerComponent from '../../components/AuthFooter.vue';
    import Select2 from 'v-select2-component';
    import Cookies from 'js-cookie';
    export default {
        name: "Verification",
        components: {
            footerComponent,
            Select2
        },
        data() {
            return {
                changeNumber: 0,
                otp: '',
                user_id: '',
                language: Cookies.get('languageId'),
                firstName: '',
                mobile:'',
                country: ['Jordan (+962)'],
                countryModel: ['Jordan (+962)']

            }
        },
        mounted() {
            this.user_id = this.$route.params.id
        },
        methods: {
            changeMobileNumber(num) {
                this.changeNumber = num;
            },
            verify() {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        let _this = this;
                        axios.post(apiDev + '/reg-check-otp', {
                            user_id: _this.user_id,
                            otp: _this.otp
                        }).then(response => {
                            if (response.data.response.httpCode == 200) {
                                _this.$store.dispatch('auth/saveToken', {
                                    token: response.data.response.token,
                                });
                                _this.$store.dispatch('auth/fetchUser', {
                                    userData: response.data.response,
                                });

                                _this.$bvToast.toast(response.data.response.Message, {
                                    title: 'Basket',
                                    autoHideDelay: 5000,
                                    toaster: 'b-toaster-bottom-left',
                                    appendToast: true
                                });
                                this.$router.push({ name: 'home'})

                            }
                            if (response.data.response.httpCode == 400) {
                                var arr = response.data.response.Message.split(/,/g);
                                for (var i = 0; i < arr.length; i++) {
                                    _this.$bvToast.toast(arr[i], {
                                        title: 'Basket',
                                        autoHideDelay: 5000,
                                        toaster: 'b-toaster-bottom-left',
                                        appendToast: true
                                    })
                                }
                            }
                        }).catch(error => {

                        })
                    }
                });
            },
            resendOtp() {
                let _this = this;
                axios.post(apiDev + '/reg-resend-otp', {
                    user_id: _this.user_id,
                    language: _this.language
                }).then(response => {

                    if (response.data.response.httpCode == 200) {
                        _this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        })
                    }
                    if (response.data.response.httpCode == 400) {
                        var arr = response.data.response.Message.split(/,/g);
                        for (var i = 0; i < arr.length; i++) {
                            _this.$bvToast.toast(arr[i], {
                                title: 'Basket',
                                autoHideDelay: 5000,
                                toaster: 'b-toaster-bottom-left',
                                appendToast: true
                            })
                        }
                    }
                }).catch(error => {

                })
            },
            changeMobile() {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        let _this = this;
                        axios.post(apiDev + '/reg-change-mobile', {
                            user_id: _this.user_id,
                            mobile: _this.mobile
                        }).then(response => {

                            if (response.data.response.httpCode == 200) {

                                _this.$bvToast.toast(response.data.response.Message, {
                                    title: 'Basket',
                                    autoHideDelay: 5000,
                                    toaster: 'b-toaster-bottom-left',
                                    appendToast: true
                                });
                                _this.changeNumber = 0;
                                _this.mobile = ''
                            }
                            if (response.data.response.httpCode == 400) {
                                var arr = response.data.response.Message.split(/,/g);
                                for (var i = 0; i < arr.length; i++) {
                                    _this.$bvToast.toast(arr[i], {
                                        title: 'Basket',
                                        autoHideDelay: 5000,
                                        toaster: 'b-toaster-bottom-left',
                                        appendToast: true
                                    })
                                }
                            }
                        }).catch(error => {

                        })
                    }
                });

            }
        }
    }
</script>

<style scoped>
    .link-color {
        color: rgb(80, 180, 50);;
    }

    .error {
        color: red;
    }
    #save_new_number{
        width: 118%;
    }
    @media only screen and (max-width: 600px) {
        .basket_landing_page {
            min-height: 650px;
        }
        #save_new_number{
            width: 93%;
        }

    }
</style>
