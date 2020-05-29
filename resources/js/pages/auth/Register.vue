<template>
    <div>
        <div class="basket_landing_page" v-bind:class="{ basketLandingPageStepTwo: continueStep }">
            <div class="container">
                <div class="bas_left_common">
                    <div class="bas_left_login_form">
                        <div class="bas_left_inner">
                            <div class="bas_left_inner_common">
                                <div class="bask_logo">
                                    <div class="logo-circle">
                                        <a href="#">
                                            <img
                                                src="/images/icon-normal.png"
                                                alt="Basket" class="bask-logo-img"
                                            >
                                        </a>
                                    </div>
                                </div>
                                <div class="bask_form_center" v-if="continueStep == false">
                                    <h1 class="bask-logo-text get-your-local-stores">Get your groceries delivered<br/> from local
                                        stores</h1>
                                    <div class="alert alert-danger hide text-center"
                                         v-if="errors.has('zone') || errors.has('city')">
                                        <strong>Error! </strong>
                                        <p v-if="errors.has('zone')" class="mb-0">{{ errors.first("zone")}}</p>
                                        <p v-if="errors.has('city')">{{ errors.first("city")}}</p>
                                    </div>
                                    <form @submit.prevent="continueLocation()">
                                        <div class="basket_login">
                                            <div class="form-group">
                                                <div class="select_city_sect">
                                                    <Select2 :options="cities" @change="getZones()" class="js-example-disabled-results SelectCity"
                                                             name="city" v-validate="'required'" v-model="city" id="city"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="select_city_sect">
                                                    <Select2 :options="zones" name="zone"  class="js-example-disabled-results SelectZone"
                                                             v-validate="'required'" v-model="zone" id="zone"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Continue</button>
                                            </div>
                                            <div class="from-group">
                                                <div class="signup-vs-login">
                                                    <ul class="signup-vs-login-list">
                                                        <li class="signup-vs-login-list-item">
                                                            Already have an account?
                                                            <router-link :to="{ name: 'login'}" class="basket_signup link-color">Log
                                                                in
                                                            </router-link>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="basket_base3" v-if="continueStep == true">
                                <div class="basket_sign_up">
                                    <div class="bask_logo">

                                        <h1 class="bask-logo-text">We're available in <span class="reg_city_zone">Abdali, Amman</span></h1>
                                        <div
                                            v-if="(errors.has('first_name') ||
                                            errors.has('last_name') || errors.has('code') || errors.has('mobile')
                                             || errors.has('email') || errors.has('password')) && submitted"
                                            class="alert alert-danger hide">
                                            <strong>Error! </strong>
                                            <p class="mb-0" v-if="errors.has('first name') && submitted">{{ errors.first("first name")}}</p>
                                            <p class="mb-0" v-if="errors.has('last name')  && submitted">{{ errors.first("last name")}}</p>
                                            <p class="mb-0" v-if="errors.has('code')  && submitted">{{ errors.first("code")}}</p>
                                            <p class="mb-0" v-if="errors.has('mobile')  && submitted">{{ errors.first("mobile")}}</p>
                                            <p class="mb-0" v-if="errors.has('password')  && submitted">{{ errors.first("password")}}</p>
                                            <p class="mb-0" v-if="errors.has('email')  && submitted">{{ errors.first("email")}}</p>
                                        </div>
                                    </div>
                                    <div class="bask_form_center-basket_base3 width_full">
                                        <form @submit.prevent="register()">

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-6 pl-3 pr-3 pr-sm-1 pb-2">
                                                        <input type="text"
                                                               class="form-control basket-form-inp"
                                                               placeholder="First Name*"
                                                               name="first name"
                                                               v-model="firstName"
                                                               v-validate="'required'"
                                                        >
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-6 pl-3 pl-sm-1">
                                                        <input type="text"
                                                               class="form-control basket-form-inp"
                                                               placeholder="Last Name*"
                                                               name="last name"
                                                               v-model="lastName"
                                                               v-validate="'required'"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 pr-3 pr-sm-1">
                                                        <Select2 v-model="code" :options="country"  class="js-example-disabled-results mb-2" data-countryCode="JO"
                                                                 selected value="962" name="code" v-validate="'required'"   id="login_code"/>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 pl-3 pl-sm-1">
                                                        <input type="phone"
                                                               class="form-control basket-form-inp"
                                                               placeholder="Mobile*"
                                                               name="mobile"
                                                               maxlength="13"
                                                               v-model="mobile"
                                                               v-validate="'required'"
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="email"
                                                       class="form-control basket-form-inp"
                                                       placeholder="Email Address"
                                                       name="email"
                                                       v-model="email"
                                                       v-validate="'required|email'"
                                                >
                                            </div>
                                            <div class="form-group">
                                                <input type="password"
                                                       class="form-control basket-form-inp"
                                                       value=""
                                                       id="exampleInputPassword1"
                                                       name="password"
                                                       placeholder="Password*"
                                                       maxlength="32"
                                                       autocomplete="new-password"
                                                       v-model="password"
                                                       v-validate="'required'"
                                                >
                                            </div>
                                            <div class="form-group">
                                                <button type="submit"
                                                        class="btn btn-primary signUp_btn">
                                                    Sign up
                                                </button>
                                            </div>
                                            <div class="form-group">
                                                <div class="or-separator">
                                                    <span class="inner_divider">"Or"</span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="javascript:void(0)" @click="authProvider" class="btn btn-danger fb_login_btn"
                                                   title="Log in with Facebook">
                                                    <i class="fab fa-facebook-square social"></i>Continue with Facebook</a>
                                            </div>
                                            <div class="form-group">
                                                <div class="signup-vs-login">
                                                    <p class="rcp-terms-of-service">
                                                        By signing up, you agree to Basket's
                                                        <router-link target="_blank" :to="{name:'terms.conditions'}" class="link-color" title="Terms Conditions">
                                                            Terms of Service </router-link>and
                                                        <router-link target="_blank" class="link-color" :to="{name:'privacy.policy'}" title="Privacy policy ">
                                                            Privacy policy
                                                        </router-link>
                                                    </p>
                                                    <ul>
                                                        <li>
                                                            Already have an account?
                                                            <router-link :to="{ name: 'login' }" class="basket_signup link-color">
                                                                Log in
                                                            </router-link>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bas_login">
                    <a href="#" class="left_responsive_logo" title="">
                        <img src="/images/logo-normal.png"
                             alt="Basket" class="bask-logo-img left_responsive_logo_img">
                    </a>
                    <a href="javascript:void(0);" title="" class="login-link basket_signup btn btn-primary"
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
                                <h2 class="onethree-text">Select Your Favorite Store</h2>
                                <p class="onethree-paragraph">Based on your location, <span class="br-desktop"> </span> <br> you can select your
                                    favorite
                                    store. </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="onethree">
                                <div class="image">
                                    <img
                                        src="/images/new_banana.jpg"
                                        alt="Same day delivery">
                                </div>
                                <h2 class="onethree-text">Add Items </h2>
                                <p class="onethree-paragraph"> Add items to your cart.
                                    <span class="br-desktop"></span><br> Just as if you're in the store yourself.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="onethree">
                                <div class="image">
                                    <img
                                        src="/images/new_grocery.jpg"
                                        alt="save time and money">
                                </div>
                                <h2 class="onethree-text">Place Order & Enjoy</h2>
                                <p class="onethree-paragraph"> Place your order and
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
        <cityand-mobile-modal></cityand-mobile-modal>
        <footerComponent></footerComponent>
        <green-loader v-show="showLoader"></green-loader>
    </div>
</template>

<script>
    import footerComponent from '../../components/AuthFooter.vue';
    import Select2 from 'v-select2-component';
    import GreenLoader from "../../components/GreenLoader";
    import Cookies from "js-cookie";
    import CityandMobileModal from "../../components/CityandMobileModal";

    export default {
        name: "Register",
        middleware: 'guest',
        components:{
            CityandMobileModal,
            GreenLoader,
            footerComponent,
            Select2
        },
        data() {
            return {
                remember: '',
                language: Cookies.get('languageId'),
                login_type: 1,
                googleLink: window.location.href + 'auth/google/redirect',
                name: '',
                googleId: '',
                facebookId:'',
                gender:'',
                avatar:'',
                prov:'',
                countryModel: ['Jordan (+962)'],
                zone: 0,
                city: 0,
                lastName: '',
                firstName: '',
                mobile: '',
                email: '',
                password: '',
                code: '+962',
                continueStep: false,
                cities:[{
                    id:0,
                    text: 'Select City ',
                    disabled:true
                }],
                zones:[{
                    id:0,
                    text: 'Select Zone ',
                    disabled:true
                }],
                showLoader: false,
                country: ['Jordan (+962)'],
                submitted: false

            }
        },
        mounted(){
            this.getCities();
            bus.$on('socialSignUp' , (data)=>{
               this.mobile = data.mobile;
               this.code = data.code;
               this.city = data.city;
               this.zone = data.zone;
               this.socialSignUp('form-1');
            });
        },

        methods: {
            authProvider() {
                this.$auth.authenticate('facebook').then(response => {
                    this.socialLogin('facebook'  ,response);
                }).catch(err => {

                });

        },
            socialLogin(provider, response) {
                let _this = this;
                axios.post('auth/' + provider + '/callback', response).then(response => {
                    _this.prov = provider;
                    if(provider == 'google'){
                        _this.firstName = response.data.user.given_name;
                        _this.lastName = response.data.user.family_name;
                        _this.email = response.data.user.email;
                        _this.googleId = response.data.user.id;
                        _this.name = response.data.user.name;
                        _this.checkGoogleId();
                    }
                    if(provider == 'facebook'){
                        var res = response.data.name.split(" ");
                        _this.firstName = res[0] ? res[0] : 'facebook';
                        _this.lastName = res[1] ?  res[0] : 'facebook';
                        _this.email = response.data.email;
                        _this.facebookId = response.data.id;
                        _this.name = response.data.name;
                        _this.avatar = response.data.avatar
                        _this.checkFacebookId();
                    }
                }).catch(err => {

                })
            },

            checkFacebookId() {
                let _this = this;
                axios.post(apiDev + '/check-social-login-id', {
                    facebook_id: _this.facebookId,
                    language:_this.language
                }).then(response => {

                    if (response.data.response.httpCode == 200 && response.data.response.code == 1) {
                        _this.mobile = response.data.response.mobile;
                        _this.social_login({social_type:'facebook',social_id:_this.facebookId,platform:'5'});
                    }else if (response.data.response.httpCode == 200 && response.data.response.code == 2){

                    }else {
                        bus.$emit('enterMobile' , );
                    }
                }).catch(error => {

                })
            },


            social_login(data) {
                let _this = this;
                axios.post(apiDev + '/customer/social_login', data ,{
                }).then(response => {
                    if (response.data.data[0].is_mobile_verified === 0){
                        this.$router.push({ path: '/verification/'+response.data.data[0].customer_id,});
                    }else {
                        _this.$store.dispatch('auth/saveToken', {
                            token: response.data.data[0].token,
                        });

                        _this.$store.dispatch('auth/fetchUser', {
                            userData: {
                                httpCode: 200,
                                Message: "User logged-in successfully",
                                user_id:  response.data.data[0].customer_id,
                                token: response.data.data[0].token,
                                email: response.data.data[0].email,
                                mobile: response.data.data[0].mobile,
                                first_name: response.data.data[0].first_name,
                                last_name: response.data.data[0].last_name,
                                image: response.data.data[0].image,
                                mobile_verified: response.data.data[0].is_mobile_verified,
                                city_id: response.data.data[0].city_id ? response.data.data[0].city_id : 21,
                                location_id: response.data.data[0].location_id,
                                outlet_id: response.data.data[0].outlet_id,
                                express_user: response.data.data[0].express_user,
                                express_user_end_date: response.data.data[0].express_user_end_date,
                            },
                        });
                        this.$router.push({name: 'home'})
                    }
                }).catch(error => {

                })
            },

            socialSignUp() {
                this.$ga.event('Login and Signup', 'Signup Submit');
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        let _this = this;
                        let mobile = _this.mobile.substr(0,4) === _this.code ? _this.mobile :  _this.code+_this.mobile;
                        let socialID= _this.googleId === ''?_this.facebookId : _this.googleId;
                        let user = {
                            social_signup_type:_this.prov,
                            social_id: socialID,
                            first_name:_this.firstName,
                            last_name:_this.lastName,
                            mobile: mobile,
                            location:_this.zone,
                            city:_this.city,
                            email:_this.email,
                            date_of_birth: '2020-01-01',
                            gender:'Male',
                            platform:'5',
                        };
                        axios.post(apiDev + '/customer/social_signup', user).then(response => {
                            this.$bvToast.toast(response.data.message, {
                                title: 'Basket',
                                autoHideDelay: 5000,
                                toaster: 'b-toaster-bottom-left',
                                appendToast: true
                            })
                            this.$ga.event('Login and Signup', 'Signup Success');

                            if (response.data.data[0].is_mobile_registered === 0) {
                                $('#socialModal').modal('hide');
                                this.$router.push({ path: '/verification/'+response.data.data[0].customer_id,});
                            }
                        }).catch(error => {
                            this.$ga.event('Login and Signup', 'Signup Failed');
                        })
                    }

                })

            },


            register() {
                this.submitted = true
                this.$ga.event('Login and Signup', 'Signup Submit');
                this.$validator.validate().then(valid => {
                    if (valid) {
                        this.mobile = this.mobile.substr(0,4) === '+962' ? this.mobile : '+962' + this.mobile;
                        this.showLoader = true;
                        let _this = this;
                        axios.post(apiDev+'/user-signup', {
                            login_type:1,
                            user_type:1,
                            language:1,
                            location_id: _this.zone,
                            city_id: _this.city,
                            last_name: _this.lastName,
                            first_name: _this.firstName,
                            mobile: _this.mobile,
                            email: _this.email,
                            password: _this.password,
                            code: '962'
                        }).then(response => {
                            if(response.data.response.httpCode == 200){
                                this.$ga.event('Login and Signup', 'Signup Success');
                                this.$router.push({ name: 'verification', params: { id: response.data.response.user_id}});
                                this.$bvToast.toast(response.data.response.Message, {
                                    title: 'Basket',
                                    autoHideDelay: 5000,
                                    toaster: 'b-toaster-bottom-left',
                                    appendToast: true
                                })
                            }
                            if(response.data.response.httpCode == 400){
                                var arr = response.data.response.Message.split(/,/g);
                                this.$ga.event('Login and Signup', 'Signup Failed');
                                for (var i = 0; i<arr.length; i++){
                                    this.$bvToast.toast(arr[i], {
                                        title: 'Basket',
                                        autoHideDelay: 5000,
                                        toaster: 'b-toaster-bottom-left',
                                        appendToast: true
                                    })
                                }
                            }
                            this.showLoader = false;
                            this.submitted = false
                        }).catch(error => {

                        })
                    }else{
                        this.$ga.event('Login and Signup', 'Signup Failed');
                    }
                });
            },

            continueLocation() {
                this.$validator.validate().then(valid => {
                    if (valid) {
                        this.continueStep = true
                    }
                });
            },


            getCities(){
                let _this = this;
                axios.post(apiDev+'/city-list', {}).then(response => {
                    if(response.data.response.httpCode == 200){
                        response.data.response.city_list.forEach(function (val) {
                            _this.cities.push({id:val.id, text: val.city_name})
                        })
                    }
                }).catch(error => {

                })
            },
            getZones(){
                let _this = this;

                axios.post(apiDev+'/location-list', {city_id:_this.city}).then(response => {
                    if(response.data.response.httpCode == 200){
                        response.data.response.location_list.forEach(function (val) {
                            _this.zones.push({id:val.id, text: val.zone_name})
                        })
                    }
                }).catch(error => {

                })
            }
        },
    }
</script>

<style scoped>
    .link-color {
        color: rgb(80, 180, 50);;
    }

    .how_it_works {
        background-color: #f7f7f7;

    }

    .get-your-local-stores {
        font-size: 18px;
        font-weight: 600;
        display: inline-block;
        margin: 18px 0 4px;
        width: 100%;
        text-align: center
    }
    #country_code{
        background-color: white;
        outline: none !important;
    }
    .SelectCity{
        background-color: white;
        outline: none !important;
    }
    .SelectZone{
        background-color: white;
        outline: none !important;
    }
    .social {
        font-size: 26px;
        padding: 5px 21px 0 0;
        vertical-align: middle;
        float: left;
    }
    @media only screen and (max-width: 600px) {
        .basket_landing_page{
            min-height: 300px;
        }
        .basketLandingPageStepTwo{
            min-height: 650px;
        }

    }
</style>
