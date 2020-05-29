<template>
    <div>
        <div class="basket_landing_page">
            <div class="container text-center">
                <div class="m-0 m-auto bas_left_common">
                    <div class="bas_left_login_form">
                        <div class="bas_left_inner">
                            <div class="bas_left_inner_common">
                                <div class="bask_logo">
                                    <div class="logo-circle">
                                        <a href="javascript:void(0)">
                                        </a>
                                    </div>
                                    <br>
                                    <div class="alert alert-danger hide"
                                         v-if="errors.has('form-2.mobile') || errors.has('form-2.password')">
                                        <strong>Error! </strong>
                                        <p id="validation_msg_sity_zone" class="mb-0"
                                           v-if="errors.has('form-2.mobile')">{{errors.first('form-2.mobile')}}</p>
                                        <p id="" v-if="errors.has('form-2.password')">{{
                                            errors.first("form-2.password")}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="basket_base1">
                                <div class="common_forgout_pass">
                                    <div class="bask_logo">
                                        <div class="logo-circle">
                                            <a href="javascript:void(0)">
                                                <img
                                                    src="/images/icon-normal.png"
                                                    alt="Basket" class="bask-logo-img">
                                            </a>
                                        </div>
                                        <h1 class="bask-logo-text">Login to your account!</h1>
                                    </div>
                                    <div class="bask_form_center">
                                        <div class="basket_forgout_pass">
                                            <div class="form-group">
                                                <a href="javascript:void(0)" class="btn btn-danger fb_login_btn"
                                                   @click="authProvider('facebook')"
                                                   title="Log in with Facebook">
                                                    <i class="fab fa-facebook-square social"></i>
                                                    Log in with Facebook
                                                </a>
                                            </div>
                                            <div class="form-group">
                                                <a class="btn btn-danger gm_login_btn"
                                                   @click="authProvider('google')"
                                                   title="Log in with Google">
                                                    <i class="fab fa-google-plus-square social"></i>
                                                    Log in with Google+</a>
                                            </div>
                                            <div class="form-group">
                                                <div class="or-separator">
                                                    <span class="inner_divider">Or</span>
                                                </div>
                                            </div>
                                            <form @submit.prevent="login('form-2')"
                                                  class="columns column is-multiline is-12" data-vv-scope="form-2">
                                                <div class="form-group">
                                                    <div class="row" style="margin: 0 0;">
                                                        <div class="col-12 col-lg-6 col-md-6 pl-0 pr-0">
                                                            <Select2 v-model="countryModel" :options="country"  class="js-example-disabled-results mb-2" data-countryCode="JO"
                                                                     selected value="962" name="code" v-validate="'required'"   id="login_code"/>
                                                        </div>
                                                        <div class="col-md-6 col-12 pl-0 pr-0">
                                                            <input type="phone"
                                                                   id="login_mobile"
                                                                   class="form-control basket-form-inp"
                                                                   placeholder="Mobile"
                                                                   name="mobile"
                                                                   v-model="mobile"
                                                                   maxlength="13"
                                                                   v-validate="'required'">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password"
                                                           class="form-control basket-form-inp"
                                                           placeholder="Enter password"
                                                           v-validate="'required'"
                                                           maxlength="32"
                                                           name="password"
                                                           v-model="password"
                                                           autocomplete
                                                           id="exampleInputPassword13"
                                                           value="">
                                                </div>
                                                <div class="form-group common_dep_list_section1">
                                                    <input id="remember_me"
                                                           type="checkbox"
                                                           name="remember_me"
                                                           v-model="remember"
                                                    >
                                                    <label for="remember_me">
                                                        <span></span>
                                                        <ins><i>Remember Me</i></ins>
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-primary-bask">Login</button>
                                                </div>
                                            </form>
                                            <div class="signup-vs-login">
                                                <ul class="signup-vs-login-list">
                                                    <li class="signup-vs-login-list-item">
                                                        Don't have an account?
                                                        <router-link :to="{ name: 'register' }" class="basket_signup link-color">
                                                            Sign up
                                                        </router-link>
                                                    </li>
                                                    <li class="signup-vs-login-list-item">
                                                        Forgot your password?
                                                        <router-link :to="{ name: 'forgot.password' }"
                                                                     class="basket_signup link-color">Reset it
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
                             alt="Basket" class="left_responsive_logo_img">
                    </a>
                    <a href="javascript:void(0);" title="" class="login-link basket_signup btn btn-primary btn-primary-bask"
                       data-bypass="true"
                       title="Login">Sign up</a>
                </div>
            </div>
            <br>
            <br>
            <br>
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
                                         alt="1" class="onethree-image">
                                </div>
                                <h2 class="onethree-text">Select Your Favorite Store</h2>
                                <p class=class="onethree-paragraph">Based on your location, <span class="br-desktop"> </span> <br> you can select your
                                    favorite
                                    store. </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="onethree">
                                <div class="image">
                                    <img
                                        src="/images/new_banana.jpg"
                                        alt="Same day delivery" class="onethree-image">
                                </div>
                                <h2>Add Items </h2>
                                <p class=class="onethree-paragraph"> Add items to your cart.
                                    <span class="br-desktop"></span><br> Just as if you're in the store yourself.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="onethree">
                                <div class="image">
                                    <img
                                        src="/images/new_grocery.jpg"
                                        alt="save time and money" class="onethree-image">
                                </div>
                                <h2 class="onethree-text">Place Order & Enjoy</h2>
                                <p class=class="onethree-paragraph"> Place your order and
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
    import Cookies from 'js-cookie'
    import GreenLoader from "../../components/GreenLoader";
    import CityandMobileModal from "../../components/CityandMobileModal";
    export default {
        name: "Login.vue",
        middleware: 'guest',
        components: {
            CityandMobileModal,
            GreenLoader,
            footerComponent,
            Select2
        },
        data() {
            return {
                mobile: '',
                password: '',
                remember: '',
                code: '+962',
                language: Cookies.get('languageId'),
                login_type: 1,
                googleLink: window.location.href + 'auth/google/redirect',
                city: '',
                zone: '',
                zones: [],
                cities: [],
                firstName: '',
                lastName: '',
                name: '',
                email: '',
                googleId: '',
                showLoader: false,
                facebookId:'',
                gender:'',
                avatar:'',
                prov:'',
                country: ['Jordan (+962)'],
                countryModel: ['Jordan (+962)']
            }
        },
        methods: {
            authProvider(provider) {
                this.$auth.authenticate(provider).then(response => {
                    this.socialLogin(provider, response)

                }).catch(err => {

                })
            },

            socialLogin(provider, response) {
                let _this = this;
                this.$ga.event('Login and Signup', 'Login Submit');
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
                        this.getCities();
                        this.getZones();
                        bus.$emit('enterMobile' , {cities:_this.cities,zones:_this.zones});
                    }
                }).catch(error => {

                })
            },

            checkGoogleId() {
                let _this = this;
                axios.post(apiDev + '/check-google-login-id', {google_id: _this.googleId}).then(response => {
                    if (response.data.response.httpCode === 200 && response.data.response.code == 1) {
                        let data = {social_type:'google',social_id:_this.googleId,platform:5};
                        _this.social_login(data);
                    }else{
                        bus.$emit('enterMobile' );
                    }
                }).catch(error => {

                })
            },


            social_login(data) {
                let _this = this;
                this.$ga.event('Login and Signup', 'Login Success');
                axios.post(apiDev + '/customer/social_login', data ,{
                }).then(response => {
                    if(response.data.response.httpCode === 200){
                        this.$ga.event('Login and Signup', 'Login Success');
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
                    }else{
                        this.$ga.event('Login and Signup', 'Login Faild');
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
                            if (response.data.response.httpCode === 200){
                                this.$ga.event('Login and Signup', 'Signup Success');
                            }
                            this.$bvToast.toast(response.data.message, {
                                title: 'Basket',
                                autoHideDelay: 5000,
                                toaster: 'b-toaster-bottom-left',
                                appendToast: true
                            })

                            if (response.data.data[0].is_mobile_registered === 0) {
                                $('#socialModal').modal('hide');
                                this.$router.push({ path: '/verification/'+response.data.data[0].customer_id,});
                            }

                            if (response.data.response.httpCode === 400){
                                this.$ga.event('Login and Signup', 'Signup Failed');
                            }
                        }).catch(error => {

                        })
                    }

                })

            },


            login(scope) {
                this.mobile = this.mobile.substr(0,4) === '+962' ? this.mobile : '+962' + this.mobile;
                this.$ga.event('Login and Signup', 'Login Submit');
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.showLoader = true;
                        let _this = this;
                        axios.post(apiDev + '/user-login', {
                            mobile: _this.mobile,
                            password: _this.password,
                            language: _this.language,
                            login_type: _this.login_type
                        }).then(response => {
                            if (response.data.response.httpCode == 200) {
                                // Save the token.
                                this.$ga.event('Login and Signup', 'Login Success');
                                _this.$store.dispatch('auth/saveToken', {
                                    token: response.data.response.token,
                                    remember: this.remember
                                });

                                if(!Cookies.get('languageId')){
                                    Cookies.set('languageId', 1, { expires: 7 });
                                }

                                _this.$store.dispatch('auth/fetchUser', {
                                    userData: response.data.response,
                                });


                                this.$router.push({name: 'home'})
                            }

                            if (response.data.response.httpCode == 400) {
                                this.$ga.event('Login and Signup', 'Login Failed');

                                _this.$bvToast.toast(response.data.response.Message, {
                                    title: 'Basket',
                                    autoHideDelay: 5000,
                                    toaster: 'b-toaster-bottom-left',
                                    appendToast: true
                                })
                            }

                            this.showLoader = false;
                        }).catch(error => {
                            this.showLoader = false;
                        })
                    }
                });
            },

            getCities() {
                let _this = this;
                axios.post(apiDev + '/city-list', {}).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.cities = response.data.response.city_list;
                    }
                }).catch(error => {

                })
            },

            getZones() {
                let _this = this;
                axios.post(apiDev + '/location-list', {city_id: _this.city}).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.zones = response.data.response.location_list
                    }
                }).catch(error => {

                })
            },
        },
        mounted() {
            this.$ga.page('/login');
            this.$ga.event('pageview' , 'login');
            bus.$on('socialSignUp' , (data)=>{
                this.mobile = data.mobile;
                this.code = data.code;
                this.city = data.city;
                this.zone = data.zone;
                this.socialSignUp();
            });
            $("#login_code").select2({ width: '100%' });
        }
    }
</script>

<style scoped>
    .link-color {
        color: rgb(80, 180, 50);;
    }

    .how_it_works {
        background-color: #f7f7f7;
    }

    .fb_login_btn {
        background-color: #3b5992;
        border-color: #3b5992;
    }

    .fb_login_btn:hover {
        background-color: rgb(80, 180, 50);
        border-color: rgb(80, 180, 50);
    }

    .gm_login_btn {
        background: #d93025;
        border: #d93025;
        color: white;
    }

    .gm_login_btn:hover {
        background-color: rgb(80, 180, 50);
        border-color: rgb(80, 180, 50);
        color: white;

    }

    #login_code {
        background-color: white;
        outline: none !important;
    }


    .socialModalTitle {
        text-align: center;
        color: rgb(67, 173, 22);;
    }

    .socialSelect {
        background-color: white;
        outline: none !important;
        width: 100%;
        border: 1px solid #aaa;
    }
    .socialMobile{
        border: 1px solid #aaa;
    }

    .error {
        color: red;
        font-size: 14px;
    }
    .socialModal{
        display: block !important;
        border-bottom: none !important;
        font-size: 20px;
    }

    @media only screen and (max-width: 600px) {
        .how_it_works {
            margin-top: 290px;
        }

        #login_code {
            width: 100%;
        }

        .basket_landing_page {
            min-height: 500px;
        }
    }
    @media (min-width: 576px) {

        .modal-dialog {
            max-width: 600px;
            margin: 1.75rem auto;
        }
    }

    .social{
        font-size: 26px;
        padding: 5px 21px 0 0;
        vertical-align: middle;
        float: left;
    }
</style>
