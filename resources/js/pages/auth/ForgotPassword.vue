<template>
    <div>
        <div class="basket_landing_page">
            <div class="container">
                <div class="bas_left_common">
                    <div class="bas_left_login_form">
                        <div class="bas_left_inner">
                            <div class="bas_left_inner_common">
                                <div class="bask_logo">
                                    <div class="logo-circle">
                                        <a href="javascript:void(0)">
                                            <img src="/images/icon-normal.png"
                                                alt="Basket">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="basket_base2" style="">
                                <div class="common_forgout_pass">
                                    <div class="bask_logo">
                                        <div class="logo-circle">
                                            <a href="/">
                                                <img
                                                    src="/images/icon-normal.png"
                                                    alt="Basket">
                                            </a>
                                        </div>
                                        <h1> Forgot your password?</h1>
                                        <h5>We'll send you a link to reset your password</h5>
                                    </div>
                                    <div class="bask_form_center">
                                        <div class="basket_forgout_pass">
                                                 <div class="form-group">
                                                      <div class="row">
                                                          <div class="col-md-6 col-sm-6 col-xs-12 pr-3 pr-sm-1 pb-2">

                                                          <Select2 v-model="code" :options="country"  class="js-example-disabled-results" data-countryCode="JO"
                                                                   selected value="+962" name="code" v-validate="'required'"   id="mob_code"/>
                                                          </div>
                                                          <div class="col-md-6 col-sm-6 col-xs-12 pl-3 pl-sm-1">
                                                              <input type="phone"
                                                                     class="form-control "
                                                                     placeholder="Mobile"
                                                                     name="mobile number"
                                                                     v-model="mobile"
                                                                     id="for_mob"
                                                                     maxlength="13"
                                                                     v-validate="'required'"
                                                              >
                                                              <span class="error" v-if="errors.has('mobile number')">{{ errors.first("mobile number")}}</span>
                                                          </div>
                                                      </div>
                                                 </div>
                                                 <div class="form-group">
                                                     <button @click="resetPassword"
                                                             class="btn btn-primary reset_pwd_btn">Reset Password
                                                     </button>
                                                 </div>
                                            <div class="signup-vs-login">
                                                <ul>
                                                    <li>
                                                        Don't have an account?
                                                        <router-link :to="{ name: 'register' }" class="basket_signup link-color">
                                                            Sign up
                                                        </router-link>
                                                    </li>
                                                </ul>
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
                        <img src="/images/logo-normal.png"
                             alt="Basket">
                    </a>
                    <a href="javascript:void(0)" title="" class="login-link basket_signup btn btn-primary"
                       data-bypass="true"
                       title="Login">Sign up</a>
                </div>
            </div>
        </div>
        <div class="basket_brand">
            <div class="container">
                <img src="/images/brands.jpg" alt="">
            </div>
        </div>
        <section class="how_it_works">
            <div class="container">
                <div class="how_in_wks">
                    <div>
                        <h2 class="text-center"> How it works - Three Easy steps </h2>
                        <br/><br/>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="onethree">
                                <div class="image">
                                    <img src="/images/new_store.jpg"
                                         alt="1">
                                </div>
                                <h2>Select Your Favorite Store</h2>
                                <p>Based on your location, <span class="br-desktop"> </span> <br> you can select your favorite
                                    store. </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="onethree">
                                <div class="image">
                                    <img src="/images/new_banana.jpg"
                                         alt="Same day delivery">
                                </div>
                                <h2>Add Items </h2>
                                <p> Add items to your cart.
                                    <span class="br-desktop"></span><br> Just as if you're in the store yourself.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="onethree">
                                <div class="image">
                                    <img src="/images/new_grocery.jpg"
                                         alt="save time and money">
                                </div>
                                <h2>Place Order & Enjoy</h2>
                                <p> Place your order and
                                    <br/>
                                    <span class="br-desktop"></span>we will take care of the rest.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="how_in_wks">

                </div>
            </div>
        </section>
        <footerComponent></footerComponent>
        <div class="otpFormModal">
            <b-modal
                id="otpCodePlease"
                ref="modal"
                hide-header
                class="fa-2x font-weight-bolder"
                @show="resetModal"
                @hidden="resetModal"
                @ok="handleSubmit"
                ok-variant="success"
                ok-title="Verify"
                ok-only
                title="Verify OTP"
            >
                <b-form-group
                    :state="otpCodeState"
                    label="Enter Your OTP"
                    label-for="name-input"
                    invalid-feedback="Please write otp code"
                    class="text-center"
                >
                    <b-form-input
                        id="name-input"
                        placeholder="Enter OTP"
                        v-model="otpCode"
                        :state="otpCodeState"
                        required
                        name="OTP"
                        v-validate="'required|numeric|max:4'"
                        size="lg"
                        class="m-auto text-center fa-2x font-weight-bolder"
                    ></b-form-input>
                    <span class="error mt-1" v-if="errors.has('OTP')">{{ errors.first("OTP")}}</span>
                </b-form-group>
            </b-modal>
        </div>

        <div class="newPasswordModal">
            <b-modal
                id="newPasswordModal"
                ref="modal"
                title="Set New Password"
                @show="resetPwdModal"
                @hidden="resetPwdModal"
                @ok="savePwd"
                ok-only
                ok-variant="success"
                size="sm"
            >
                <b-form-group
                    label="New Password"
                    label-for="newPwd"
                >
                    <b-form-input
                        id="newPwd"
                        @onfocus="MYreadonly = false"
                        type="password"
                        name="new_assword"
                        v-model="password.newPwd"
                        placeholder="Choose a password"
                        v-validate="'required|min:6|max:80|'"
                    ></b-form-input>
                    <span class="error mt-1" v-if="errors.has('password')">{{ errors.first("password")}}</span>
                </b-form-group>

                <b-form-group
                    label="Repeat Password"
                    label-for="repeatPwd"
                >
                    <b-form-input
                        id="repeatPwd"
                        name="password_confirmation"
                        type="password"
                        placeholder="Confirm Password"
                        v-model="password.repeatPwd"
                        data-vv-as="Password"
                        v-validate="{ required : true,  confirmed:password.newPwd}"
                    ></b-form-input>
                    <p class="error mt-1" v-if="errors.has('password_confirmation')">{{ errors.first("password_confirmation")}}</p>
                </b-form-group>
            </b-modal>
        </div>
    </div>
</template>

<script>
    import footerComponent from '../../components/AuthFooter.vue';
    import Select2 from 'v-select2-component';

    export default {
        name: "ForgotPassword",
        components:{
            footerComponent,
            Select2
        },
        data() {
            return {
                mobile: '',
                code:'+962',
                language:1,
                country: [{id:'+962' , text: 'Jordan (+962)'}],
                otpCode:'',
                otpCodeState: null,
                userID: 0,
                token:'',
                password:{
                    newPwd :'',
                    repeatPwd:''
                },
                MYreadonly : true
            }
        },
        methods:{
            resetPassword(){
                this.$validator.validate().then(valid => {
                    if (valid) {
                        let _this = this;
                        let data = {mobile: _this.mobile.substr(0,4) === _this.code ? _this.mobile : _this.code+_this.mobile ,language:_this.language}
                        axios.post(apiDev +'/forgot-password', data).then(response => {
                            if(response.data.response.httpCode == 200){
                                this.userID = response.data.response.users_id;
                                let message = response.data.response.Message.split('.')[1];
                                _this.$bvToast.toast(message, {
                                    title: 'Basket',
                                    autoHideDelay: 5000,
                                    toaster: 'b-toaster-bottom-left',
                                    appendToast: true
                                });
                                this.$bvModal.show("otpCodePlease");
                            }

                            if(response.data.response.httpCode == 400){
                                this.userID = response.data.response.users_id;
                                _this.$bvToast.toast(response.data.response.Message, {
                                    title: 'Basket',
                                    autoHideDelay: 5000,
                                    toaster: 'b-toaster-bottom-left',
                                    appendToast: true
                                })
                            }

                        }).catch(error => {

                        })
                    }

                });

            },
            resetModal() {
                this.otpCode = ''
                this.otpCodeState = null
            },
            handleSubmit(bvModalEvt) {
                bvModalEvt.preventDefault();
                this.$validator.validate().then(valid => {
                    if (valid){
                        let data = {user_id: this.userID, otp:this.otpCode};
                        axios.post(apiDev +'/reg-check-otp', data).then(response => {
                            this.$bvToast.toast(response.data.response.Message, {
                                title: 'Basket',
                                autoHideDelay: 5000,
                                toaster: 'b-toaster-bottom-left',
                                appendToast: true
                            });
                            if (response.data.response.httpCode === 200){
                                this.$nextTick(() => {
                                    this.token = response.data.response.token;
                                    this.$bvModal.hide('otpCodePlease');
                                    this.$bvModal.show('newPasswordModal');
                                });
                            }else{
                                return
                            }
                        });
                    }else{
                        return
                    }
                });
            },

            resetPwdModal() {
                this.password.newPwd = '';
                this.password.repeatPwd = '';
            },

            savePwd(bvModalEvt) {
                bvModalEvt.preventDefault();
                this.$bvModal.hide('newPasswordModal');

                this.$validator.validate().then(valid => {
                    if (valid){
                        let data = {mobile: this.mobile.substr(0,4) === this.code ? this.mobile : this.code+ this.mobile,
                            password:this.password.newPwd , password_confirmation:this.password.repeatPwd};
                        axios.post(apiDev +'/change-pwd-forgot', data).then(response => {
                            this.$bvToast.toast(response.data.response.Message, {
                                title: 'Basket',
                                autoHideDelay: 5000,
                                toaster: 'b-toaster-bottom-left',
                                appendToast: true
                            });
                            if (response.data.response.httpCode === 200){
                                this.$nextTick(() => {
                                    this.$bvModal.hide('newPasswordModal');
                                })
                            }else{
                                return;
                            }

                        });
                    }else{
                        return;
                    }
                });
            },
        },
        mounted() {
        }
    }
</script>

<style scoped>
    .how_it_works {
        background-color: #f7f7f7;
    }
    .link-color {
        color: rgb(80, 180, 50);;
    }
    #mob_code{
        background-color: white;
        outline: none !important;
    }
    .error {
        color: red;
        font-size: 14px;
    }
    @media only screen and (max-width: 600px) {
        .basket_landing_page{
            min-height: 300px;
        }
    }
</style>
