                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <template>
    <div class="modal fade pr-1" id="changeStore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog ml-0" role="document">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <div class="container-fluid">
                        <div class="row form-inline">
                            <div class="col-md-12 d-inline-block d-lg-none m-auto mb-5 marka-banner">
                                <div class="col-10 card d-inline-block shadow marka-banner-card" @click="chooseLocation = !chooseLocation">
                                    <span class="text-secondary">TO</span>
                                    <span class="store_chooser text-success" >{{ currentCity }} <i class="fa fa-pen text-success stores-options-text"></i></span>
                                    <div class="chooseLocation" v-show="chooseLocation" v-if="width < 960">
                                        <button
                                            @click="updateUserLocation( item.address_id,item.city_id, item.address, item.location_id)"
                                            class="dropdown-item list-of-items" type="button"
                                            v-for="item in addressList">
                                            <p class="user_address_p p-store-address mt-2" style="line-height: 18px">
                                                <i class="fas fa-map-marker-alt text-success mr-1"></i>
                                                <span>{{item.address}}</span>
                                            </p>
                                        </button>
                                    </div>
                                </div>
                            </div>


                            <div class="offset-2 col-sm-6 d-lg-inline d-none input-with" data-toggle="dropdown">
                                <div class="d-inline-block marka-banner-card">
                                    <span class="text-secondary">TO</span>
                                    <span class="store_chooser text-success">{{ currentCity }} <i class="fa fa-pen text-success stores-options-text"></i></span>
                                    <div class="dropdown-menu input-with p-3" v-if="width > 960"
                                         style="overflow: hidden!important;min-width: 30rem!important;">
                                        <button
                                            @click="updateUserLocation( item.address_id,item.city_id, item.address, item.location_id)"
                                            class="dropdown-item list-of-items" type="button"
                                            v-for="item in addressList">
                                            <p class="user_address_p p-store-address mt-2" style="line-height: 18px">
                                                <i class="fas fa-map-marker-alt text-success mr-1"></i>
                                                <span>{{item.address}},</span>
                                                <span v-for="city in cities">
                                                       <span v-if="city.id == item.city_id" class="city-zone">{{city.city_name}},</span>
                                                    </span>
                                                <span v-for="zone in zones">
                                                        <span v-if="zone.id == item.location_id" class="city-zone">{{zone.zone_name}}</span>
                                                    </span>
                                            </p>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4  d-lg-inline d-none text-center">
                                <div class="btn-group">
                                    <a data-toggle="dropdown" href="javascript:void(0)" class="pt-0 showing-dropdown">
                                        <span style="font-size: 18px;padding-left: 25px;">Showing</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="dropdown-menu p-1">
                                        <button v-for="item in items" @click="getStoreList(item.qt)" class="dropdown-item" v-bind:class="[itemActive === item.qt? 'bg-light':'' ]" type="button">
                                            <i class="fa fa-check mr-2 align-middle col-1 text-success" v-bind:class="[item.qt === itemActive  ? 'visible' : 'invisible' ]"></i>
                                            {{ item.title }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="close-banner col-12 d-lg-none">
                        <button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body" style="min-height: 860px;">
                    <div class="container" v-if="!showLoader">
                        <ul class="stores-ul p-0">
                            <li class="col-lg-3 col-md-10 store-li" v-bind:class="[userData.outlet_id === store.outlet_id ? 'bg-lightC' : '']"
                            v-if="store.delivery_areas.includes(userData.location_id) &&  sortBy(store.store_type[1]) === itemActive"
                            @click="updateStore(store.outlet_id)"
                                v-for="store in storeList">
                                <a href="javascript:void(0)" title="">
                                    <div class="inerr_stores" v-bind:class="[width < 960 ? 'row' : '']">
                                        <div class="retailer_option_mimg">
                                            <img v-bind:src="store.logo_image" v-bind:alt="store.outlet_name" class="storeLogo">
                                        </div>
                                        <div class="retailer_option_body text-dark"
                                             v-bind:class="[width < 960 ? 'text-left pl-3' : '']">
                                            <h3 class="text-left text-lg-center">
                                                <span>{{store.outlet_name}}</span>
                                            </h3>
                                            <p style="display: block;padding: 5px;padding-left: 0"
                                               v-bind:class="[width < 960 ? 'text-left' : 'text-center']">
                                                <span class="retailer-option-categories"
                                                      v-for="type in store.store_type">
                                                    {{type.name}}
                                                </span>
                                            </p>
                                            <span class="col-12 pt-5 text-center p-0">
                                               <button class="btn btn-sm btn-outline-secondary uppercase m-auto">delivery</button>
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="container-fluid" v-else>
                        <div class="wrapper-loader row">
                            <div class="wrapper-cell col-lg-4 col-md-6 col-sm-12" v-for="i in 10">
                                <div class="image-wrapper animated-background">
                                    <div class="image"></div>
                                </div>
                                <div class="title p-2">
                                    <div class="text-line  animated-background"></div>
                                    <div class="text-line-2  animated-background"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container change-store-footer pt-5 pb-2">
                    <p class="text-center"
                       style="font-size: 14px; color: rgb(189, 189, 189);">Basket is
                        an independent business that is not necessarily
                        affiliated with, endorsed or sponsored by the retailers
                        mentioned here
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Cookies from 'js-cookie'
    export default {
        name: "ChangeStoreModal",
        data() {
            return {
                language: Cookies.get('languageId'),
                countryId: 46,
                storeList: [],
                userData: [],
                city: 21,
                cities: [],
                zones: [],
                zone: '',
                addressList: [],
                currentCity: 'Marka',
                width: window.screen.width,
                showLoader: true,
                chooseLocation:false,
                items: [
                    {qt: 0, title:'All'},
                    {qt: 5, title:'Bakery'},
                    {qt: 2, title:'Groceries'},
                    {qt: 3, title:'Meat'},
                    {qt: 8, title:'Speciality'},
                ],
                itemActive : 0
            };
        },
        methods: {

            getStoreList(id) {
                let _this = this;
                this.showLoader = true;
                axios.post(apiDev + '/store-list', {
                    language: _this.language,
                    city_id: _this.userData.city_id,
                    location_id: _this.userData.location_id,
                    store_type_ids:  id
                }).then(response => {
                    if (response.data.response.httpCode === 200) {
                        _this.storeList = response.data.response.store_list;
                        _this.showLoader = false;
                        this.itemActive = id ? id : 0;
                    }
                }).catch(error => {

                })
            },

            sortBy(storeType) {
                return  this.itemActive === 0 ?  0 : storeType !== undefined ? storeType.id : 1;
            },

            updateStore(id) {
                let _this = this;
                axios.post(apiDev + '/update-user-outlet', {
                    language: _this.language,
                    outlet_id: id,
                    token: _this.userData.token,
                    user_id: _this.userData.user_id
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        let newUserData = {
                            userData: {
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
                                city_id: _this.userData.city_id,
                                location_id: _this.userData.location_id,
                                outlet_id: id,
                                express_user: _this.userData.express_user,
                                express_user_end_date: _this.userData.express_user_end_date,
                                country_id: _this.userData.country_id,
                            }
                        };

                        Cookies.set('userData', newUserData);
                        bus.$emit('changeStoreAndCooke', id);
                        bus.$emit('refreshMyItems', {id: id});
                        // console.log(Cookies.get('userData'));

                    }

                }).catch(error => {
                    console.log(error)
                })
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
                axios.post(apiDev + '/get-address', {
                    user_id: _this.userData.user_id,
                    token: _this.userData.token
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.addressList = response.data.response.address_list;
                       _this.currentCity =  _this.addressList.find(address => address.location_id === _this.userData.location_id).address;
                    }
                }).catch(error => {

                })
            },


            updateUserLocation(addressId, cityId, cityName, locationId) {
                let _this = this;
                this.currentCity = cityName;
                axios.post(apiDev + '/update-user-location', {
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    language: _this.language,
                    location_id: locationId,
                    address_id: addressId,
                    city_id: cityId
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        let newUserData = {
                            userData: {
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
                        Cookies.set('userData', newUserData);
                        bus.$emit('changeLocationAndCooke', response.data.response.updated_location_id)
                    }
                }).catch(error => {

                })
            },


        },
        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData;
            this.getStoreList('');
            this.getAddressList();
            this.getCities();
            this.getZones();
            this.width = window.screen.width;
        },
    }
</script>

<style scoped>
    /*change Store Modall*/
    .store-li:hover{
       border-radius: 7px;
       background-color: #ffc1072e!important;
    }
    .bg-lightC{
        border-radius: 7px;
        background-color: #ffc1072e!important;
    }
    .storeLogo{
        height: 100px;
        width: 100px;
        border-radius: 50%;
    }
    #changeStore > .modal-dialog {
        width: 100%;
        margin-top: 65px;
        height: 800px;
        max-width: 100%;
    }

    .change-store-footer {
        border-top: 1px solid #dee2e6;
    }

    .showing-dropdown {
        color: rgb(117, 117, 117);
    }

    .showing-dropdown > i {
        color: green;
    }

    .store_chooser {
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
        font-weight: 600;
        border: none;
    }

    .input-with {
        width: 100%;
    }

    .stores-ul > li {
        float: left;
        display: inline-block;
        text-align: center;
        padding-top: 10px;
    }

    .stores-ul > li > a {
        width: 100%;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .retailer_option_body h3 {
        font-size: 15px;
    }

    @media only screen and (max-width: 350px) {
        .retailer_option_body {
            max-width: 5em;
        }

        .store_chooser {
            max-width: 8em;
        }
    }

    .retailer_option_body p {
        font-size: 12px;
    }

    .store-li:hover {
        background-color: #e5edec75;
    }

    .modal-content {
        width: 101%;
    }

    .marka-banner {
        text-align: center;
        max-height: 10vh;
        min-height: 7vh;
        position: absolute;
        top: 0;
        z-index: 100;
    }

    .marka-banner-card {
        position: relative;
        padding: 11px;
        padding-top: 7px;
        border-radius: 0;
    }

    .close-banner {
        position: absolute;
        top: -65px;
        height: 4.5rem;
        text-align: center;
        padding: 10px;
        left: 0;
        z-index: 0;
        background-color: #ededed;
    }

    /*      Loader Section    */

    .wrapper-loader {
        background: #fff;
        padding: 20px;
        height: 400px;
        display: flex;
        position: relative;
    }

    .wrapper-cell {
        display: flex;
        margin-bottom: 0;
        flex-direction: column;
        max-height: 200px;
        padding: 15px;
    }

    .text-line {
        width: 230px;
        height: 20px;
        margin-bottom: 8px;
    }

    .text-line-2 {
        width: 100px;
        height: 20px;
        margin-bottom: 25px;
    }
    .image-wrapper {
        max-width: 100%;
        border-radius: 50%;
        height: 100px;
        width: 100px;
        border: 1px solid #eee;
    }
    .image {
        width: 80%;
        height: 80%;
        margin: 0 auto;
    }
    .store_chooser{
        background-color: rgb(248, 249, 250);
        max-width: 130px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    /*Animation*/

    .animated-background {
        animation-duration: 2s;
        animation-fill-mode: forwards;
        animation-iteration-count: infinite;
        animation-name: placeHolderShimmer;
        animation-timing-function: linear;
        background: linear-gradient(to right, #F6F6F6 9%, #F0F0F0 27%, #F6F6F6 35%);
        margin: 0.5em auto;
    }

    @keyframes placeHolderShimmer {
        0% {
            background-position: -100px 0
        }
        100% {
            background-position: 100px 0
        }
    }

    @media (min-width: 992px) {
        .marka-banner-card {
            padding-left: 90px;
        }
    }

    p.user_address_p{
        text-overflow: ellipsis;
        white-space: nowrap;
        max-width: 100%;
        overflow: hidden;
    }
    .dropdown-item{
        padding: 0;
        vertical-align: middle;
    }
</style>
