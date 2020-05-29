<template>
    <!--Modall change location-->
    <div class="modal fade update_city_location update-location bs-example-modal-lg" id="update-location"  role="dialog"
         aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="col-12">
                    <button class="close mt-2" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h1 class="modal-title-new modal-title-location">Change Location</h1>
                </div>
                <div class="new_address_sec">
                    <form @submit.prevent="updateUserLocationNew()">
                        <div class="form-group">
                            <div class="select_city_sect">
                                <select v-model="city"
                                        @change="getZones()"
                                        class="js-example-disabled-results SelectCitybox"
                                        name="city"
                                        data-val=""
                                        v-validate="'required'"
                                >
                                    <option value="">Select City</option>
                                    <option v-bind:value="item.id" v-for="item in cities">{{item.city_name}}</option>
                                </select>
                                <span class="mb-0 error"
                                      v-if="errors.has('city')">{{ errors.first("city")}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="select_city_sect">
                                <select v-model="zone"
                                        class="js-example-disabled-results SelectZonebox"
                                        name="location"
                                        data-val=""
                                        v-validate="'required'"
                                >
                                    <option value="">Select Zone</option>
                                    <option v-bind:value="item.id" v-for="item in zones">{{item.zone_name}}</option>
                                </select>
                                <span class="mb-0 error"
                                      v-if="errors.has('location')">{{ errors.first("location")}}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary update_city_location_btn"
                            >Update
                            </button>
                            <button type="button" class="btn btn-info cancel_btn cancel-btn-location" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                    <hr/>
                    <div class="icModalRow_basket">
                        <ul>
                            <li  @click="updateUserLocation( item.address_id,item.city_id,item.location_id)" class="user_address_li" v-for="item in addressList">
                                <p class="user_address_p" data-address_id="" style="line-height: 18px;">
                                        <span class="">
                                                <i class="glyph-icon flaticon-home-interface"></i>
                                            <i class="glyph-icon flaticon-apartment"></i>
                                            <i class="glyph-icon flaticon-home-interface"></i>
                                        </span>{{item.address}}
                                </p>
                                <label>
                                    <span v-for="zone in zones">
                                        <span v-if="zone.id == item.location_id" class="city-zone">{{zone.zone_name}}</span>
                                   </span>
                                   <span v-for="city in cities">
                                        <span v-if="city.id == item.city_id" class="city-zone">{{city.city_name}}</span>
                                   </span>
                                </label>
                            </li>

                            <li>
                                <a href="javascript:void(0)"
                                   title="New Delivery Address"
                                   class="add_new_address"
                                   data-toggle="modal"
                                   @click="closeModal()"
                                   data-target=".left_add_address">+ New
                                    Delivery Address</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Cookies from 'js-cookie'
    export default {
        name: "ChangeLocationModal",
        data () {
            return {
                userData:[],
                cities:[],
                zones:[],
                addressList:[],
                language:1,
                city:21,
                zone:''
            };
        },
        methods: {
            closeModal(){
                bus.$emit('openAddAddress', true)
                $('#update-location').modal('hide');
            },
            getCities() {
                let _this = this;
                axios.post(apiDev + '/city-list', {}).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.cities = response.data.response.city_list
                    }
                }).catch(error => {

                })
            },
            updateUserLocationNew() {


                this.$validator.validate().then(valid => {
                    if (valid) {
                        let _this = this;
                        axios.post(apiDev + '/update-user-location', {
                            user_id:_this.userData.user_id,
                            token:_this.userData.token,
                            language:_this.language,
                            city_id:_this.city,
                            location_id:_this.zone

                        }).then(response => {
                            if (response.data.response.httpCode == 200) {
                                $('#update-location').modal('hide');
                                this.$bvToast.toast(response.data.response.Message, {
                                    title: 'Basket',
                                    autoHideDelay: 5000,
                                    toaster: 'b-toaster-bottom-left',
                                    appendToast: true
                                })

                                let newUserData = {
                                    userData:{
                                        httpCode: 200,
                                        Message: "User logged-in successfully",
                                        user_id: _this.userData.user_id,
                                        token: _this.userData.token,
                                        email: _this.userData.email,
                                        mobile: _this.userData.mobile,
                                        first_name: _this.userData.first_name,
                                        last_name: _this.userData.last_name,
                                        image: _this.userData.image,
                                        facebook_id: _this.userData.facebook_id,
                                        mobile_verified: _this.userData.mobile_verified,
                                        city_id: _this.city,
                                        location_id: response.data.response.updated_location_id,
                                        outlet_id: _this.userData.outlet_id  ? _this.userData.outlet_id : 67,
                                        express_user: _this.userData.express_user,
                                        express_user_end_date: _this.userData.express_user_end_date,
                                        country_id: _this.userData.country_id,
                                    }
                                };
                                Cookies.set('userData', newUserData );
                                bus.$emit('changeLocationAndCooke', response.data.response.updated_location_id)
                            }
                        }).catch(error => {

                        })
                    }
                });



            },
            getZones() {
                let _this = this;
                axios.post(apiDev + '/location-list', {city_id: _this.city}).then(response => {
                    if (response.data.response.httpCode == 200) {
                        this.zones = response.data.response.location_list
                    }
                }).catch(error => {

                })
            },
            getAddressList() {
                let _this = this;
                axios.post(apiDev + '/get-address', {user_id:_this.userData.user_id,token:_this.userData.token}).then(response => {

                    if (response.data.response.httpCode == 200) {
                        _this.addressList = response.data.response.address_list
                    }
                }).catch(error => {

                })
            },
            updateUserLocation(addressId,cityId,locationId) {
                let _this = this;

                axios.post(apiDev +'/update-user-location', {
                    user_id:_this.userData.user_id,
                    token:_this.userData.token,
                    language:_this.language,
                    location_id:locationId,
                    address_id:addressId,
                    city_id:cityId
                }).then(response => {
                    if (response.data.response.httpCode == 200) {

                        let newUserData = {
                            userData:{
                                httpCode: 200,
                                Message: "User logged-in successfully",
                                user_id: _this.userData.user_id,
                                token: _this.userData.token,
                                email: _this.userData.email,
                                mobile: _this.userData.mobile,
                                first_name: _this.userData.first_name,
                                last_name: _this.userData.last_name,
                                image: _this.userData.image,
                                facebook_id: _this.userData.facebook_id,
                                mobile_verified: _this.userData.mobile_verified,
                                city_id: cityId,
                                location_id: response.data.response.updated_location_id,
                                outlet_id: _this.userData.outlet_id ? _this.userData.outlet_id : 67,
                                express_user: _this.userData.express_user,
                                express_user_end_date: _this.userData.express_user_end_date,
                                country_id: _this.userData.country_id,
                            }
                        };
                        $(".update-location").modal('hide');
                        Cookies.set('userData', newUserData );
                        bus.$emit('changeLocationAndCooke', response.data.response.updated_location_id)
                    }
                }).catch(error => {

                })
            },
        },
        mounted(){
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.getCities();
            this.getZones();
            this.getAddressList();
        },

    }
</script>

<style scoped>
    /*change Location modal*/
    .modal-title-location{
        margin-top: 20px;
        margin-bottom: 10px;
    }
    .add_new_card .modal-lg, .left_add_address .modal-lg, .update_city_location .modal-lg {
        width: 522px;
        margin: 60px auto;
    }
    .SelectZonebox{
        background-color: white;
        width: 100%;
        outline: none !important;
    }
    .SelectCitybox{
        background-color: white;
        width: 100%;
        outline: none !important;
    }
    .cancel-btn-location{
        float: right;
    }
    .add_new_address:hover{
        text-decoration: none;
        color: var(--theme-color);
    }
    .city-zone{
        font-weight: bold;
    }
    .error{
        color: red;
    }
</style>
