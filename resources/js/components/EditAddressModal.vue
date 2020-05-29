<template>
    <div>
        <b-modal class="left_edit_address" size="lg" id="left_edit_address" hide-header hide-footer>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    @click="$bvModal.hide('left_edit_address')">
                <span aria-hidden="true" class="fa fa-times"></span>
            </button>
            <h1 class="text-center">Edit an address</h1>
            <div class="new_address_sec add_aaddress_popup">

                <div class="form-group">
                    <div class="select_city_sect">
                        <multiselect
                            v-model="oldOptions.addressType"
                            v-validate="'required'"
                            :options="oldOptions.addressTypes"
                            track-by="id"
                            label="name"
                            placeholder="Select Address Type"
                            name="address_type"
                            :allow-empty="false"
                            :aria-selected="true"
                        >
                        </multiselect>
                        <span class="error-message" v-if="submitted && errors.has('address type')">{{errors.first('address type')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="select_city_sect">
                        <multiselect
                            v-model="oldOptions.city"
                            track-by="id"
                            :options="oldOptions.cities"
                            label="city_name"
                            placeholder="Select City"
                            @input="getZones"
                            v-validate="'required'"
                            name="city name"
                        >
                        </multiselect>
                        <span class="error-message" v-if="submitted && errors.has('city name')">{{errors.first('city name')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="select_city_sect">
                        <multiselect
                            v-model="oldOptions.zone"
                            track-by="id"
                            :options="oldOptions.zones"
                            label="zone_name"
                            placeholder="Select Zone"
                            v-validate="'required'"
                            name="zone name"
                        >
                        </multiselect>
                        <span class="error-message" v-if="submitted && errors.has('zone name')">{{errors.first('zone name')}}</span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="map_location_after">
                        <div class="row">
                            <div class="col-md-8 pr-0">
                                <input type="text" v-validate="'required'" id="found_address1" :value="address.address" readonly
                                       name="street address" placeholder="Street Address"
                                       class="form-control street-input  inspectletIgnore street_inp">
                                <span class="error-message" v-if="submitted && errors.has('street address')">{{errors.first('street address')}}</span>
                            </div>
                            <div class="col-md-4 pl-0">
                                <a href="javascript:void(0)"
                                   class="btn btn-link"
                                   data-toggle="modal"
                                   data-target="#add_popupaddress"
                                   @click="openGoogleMap()"
                                >Pin on map</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control department_building_inp"
                           placeholder="Apt # / Suit / Building  (optional)"
                           aria-label="Apt # / Suit / Building  (optional)" v-model="appartment" value="" type="text"
                           name="appartment">
                </div>
                <div class="form-group">
                         <textarea name="note" v-model="note" class="form-control additional_info"
                                   placeholder="Instructions for delivery (e.g. your door code) (optional)"
                                   type="text"></textarea>
                </div>
                <div class="form-group">
                    <button type="button" onclick="" class="btn btn-primary save_btn" @click="saveAddress">Edit</button>
                    <button type="button" onclick="" class="btn btn-danger" @click="showMsgBoxOne">Delete</button>
                    <button type="button" class="btn btn-info cancel_btn" @click="$bvModal.hide('left_edit_address')">Cancel</button>
                </div>
            </div>
        </b-modal>
        <!--Modal Google mapp-->
        <GoogleMapComponent></GoogleMapComponent>
    </div>
</template>
<script>
    import GoogleMapComponent from '../components/GoogleMapModal'
    import Cookies from 'js-cookie'
    import Multiselect from 'vue-multiselect'

    export default {
        name: "AddAddressModal",
        components: {
            GoogleMapComponent,
            Multiselect
        },
        data() {
            return {
                googleMap: false,
                userData: [],
                oldOptions: {
                    addressType: {},
                    addressTypes: [],
                    city: {},
                    cities: [],
                    zone:{},
                    zones:[]

                },
                language: Cookies.get('languageId'),
                zone: '',
                locationCoordinates: {lat:'',lng:''},
                address: {},
                note: '',
                appartment: '',
                submitted: false,
            };
        },
        methods: {
            openGoogleMap() {
                bus.$emit('setLocation' , this.locationCoordinates)
                this.googleMap = true
            },

            showMsgBoxOne() {
                this.$bvModal.msgBoxConfirm('Are you sure?')
                    .then(value => {
                        if (value){
                            this.deleteAddress()
                        }
                    })
                    .catch(err => {
                        // An error occurred
                    })
            },

            getAddressTyps() {
                let _this = this;
                axios.post(apiDev + '/address-type-list', {}).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.oldOptions.addressTypes = response.data.response.address_type;
                    }
                }).catch(error => {

                })
            },

            getCities() {
                let _this = this;
                axios.post(apiDev + '/city-list', {}).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.oldOptions.cities = response.data.response.city_list;
                    }
                }).catch(error => {

                })
            },

            getZones() {
                let address = this.address;
                axios.post(apiDev + '/location-list', {city_id: address.city_id}).then(response => {
                    if (response.data.response.httpCode === 200) {
                        this.oldOptions.zones = response.data.response.location_list;
                    }
                }).catch(error => {

                })
            },

            saveAddress() {
                this.submitted = true;
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post(apiDev + '/update-address', {
                            language: this.language,
                            address_id: this.address.address_id,
                            user_id: this.userData.user_id,
                            token: this.userData.token,
                            address_type: this.oldOptions.addressType.id,
                            address: this.address.address,
                            department_building: this.appartment,
                            city_id: this.oldOptions.city.id,
                            location_id: this.oldOptions.zone.id,
                            additional_info: this.note,
                            country_id: 46,
                            latitude: this.locationCoordinates.lat,
                            longtitude: this.locationCoordinates.lng,
                            near_landmark: ''
                        }).then(response => {
                            if (response.data.response.httpCode == 200) {
                                this.$bvToast.toast(response.data.response.Message, {
                                    title: 'Basket',
                                    autoHideDelay: 5000,
                                    toaster: 'b-toaster-bottom-left',
                                    appendToast: true
                                });
                            }
                            bus.$emit('runGetAddress', true);
                            this.$bvModal.hide("left_edit_address")
                            $("#left_edit_address").modal('hide')
                        }).catch(error => {

                        })
                    }
                })
            },

            deleteAddress() {
                        axios.post(apiDev + '/delete-address', {
                            address_id: this.address.address_id,
                            user_id: this.userData.user_id,
                            token: this.userData.token,
                        }).then(response => {
                            if (response.data.response.httpCode == 200) {
                                this.$bvToast.toast(response.data.response.Message, {
                                    title: 'Basket',
                                    autoHideDelay: 5000,
                                    toaster: 'b-toaster-bottom-left',
                                    appendToast: true
                                });
                            }
                            this.$bvModal.hide("left_edit_address");
                            bus.$emit('runGetAddress', true);
                        }).catch(error => {

                        })
                    },

            getAllData() {
                let address = this.address;
                if (this.oldOptions.zones.length > 0){
                    let name =  this.oldOptions.zones[this.oldOptions.zones.findIndex(x => x.id === address.location_id)].zone_name ;
                    this.oldOptions.zone = {id: address.location_id, zone_name: name};
                }else{
                    this.oldOptions.zone = {id: 0,zone_name:'Select Zone' , disabled:true}
                }
                this.oldOptions.addressType = {id: address.address_type_id, name: address.address_type};
                this.oldOptions.city = {id: address.city_id, city_name: address.address.split(',',)[1].trim()};
            },
            },



        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData
        },
        created() {
            bus.$on('closeGoogleMap', (data) => {
                if (data) {
                    this.googleMap = false
                }
            });
            bus.$on('locationCoordinates', (data) => {
                if (data){
                    this.address.address = data.address;
                    this.locationCoordinates = data.coordinates;
                }
            });
            bus.$on('left_edit_address', (address) => {
                if (address) {
                    this.address = address;
                    this.locationCoordinates.lat = address.latitude;
                    this.locationCoordinates.lng = address.longtitude;
                    this.getZones();
                    this.getCities();
                    this.getAddressTyps();
                    this.getAllData();
                }
            });

        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
    .error-message {
        color: red;
    }
    .close{
        right: 10px;
        position: absolute;
    }
</style>
