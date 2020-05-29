<template>
   <div>
       <div class="modal fade left_add_address bs-example-modal-lg" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel">
           <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content new_after_popups">
                   <div class="col-12">
                       <button class="close mt-2" type="button" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">×</span>
                       </button>
                       <h1 class="modal-title-new modal-title-address">Add an address</h1>
                   </div>
                   <div class="new_address_sec add_aaddress_popup">

                       <div class="form-group new_address_sec_form">
                           <div class="select_city_sect">
                               <multiselect
                                    v-model="addressType"
                                    v-validate="'required'"
                                    :options="addressTyps"
                                    track-by="id"
                                    label="name"
                                    placeholder="Select Address Type"
                                    name="address type"
                                >
                               </multiselect>
                               <span class="error-message" v-if="submitted && errors.has('address type')">{{errors.first('address type')}}</span>
                           </div>
                       </div>
                       <div class="form-group new_address_sec_form">
                           <div class="select_city_sect">
                               <multiselect
                                   v-model="city"
                                   track-by="id"
                                   :options="cities"
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
                       <div class="form-group new_address_sec_form">
                           <div class="select_city_sect">
                               <multiselect
                                   v-model="zone"
                                   track-by="id"
                                   :options="zones"
                                   label="zone_name"
                                   placeholder="Select Zone"
                                   v-validate="'required'"
                                   name="zone name"
                               >
                               </multiselect>
                               <span class="error-message" v-if="submitted && errors.has('zone name')">{{errors.first('zone name')}}</span>
                           </div>
                       </div>
                       <div class="form-group new_address_sec_form">
                           <div class="map_location_after">
                               <div class="row">
                                   <div class="col-md-8 pr-0">
                                       <input type="text"  v-validate="'required'" id="found_address1" :value="address"  readonly name="street address" placeholder="Street Address"
                                              class="form-coltrol new_address_sec_form_input street-input  inspectletIgnore street_inp">
                                       <span class="error-message" v-if="submitted && errors.has('street address')">{{errors.first('street address')}}</span>
                                   </div>
                                   <div class="col-md-4 pl-0">
                                       <a href="javascript:void(0)"
                                          class="btn btn-link openGogleMapBtn"
                                          data-toggle="modal"
                                          data-target="#add_popupaddress"
                                          @click="openGoogleMap()"
                                       >Pin on map</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="form-group new_address_sec_form">
                           <input class="form-coltrol new_address_sec_form_input department_building_inp"
                                  placeholder="Apt # / Suit / Building  (optional)"
                                  aria-label="Apt # / Suit / Building  (optional)" v-model="appartment" value="" type="text" name="appartment">
                       </div>
                       <div class="form-group new_address_sec_form">
                         <textarea name="note" v-model="note" class="form-coltrol new_address_sec_form_input additional_info"
                                   placeholder="Instructions for delivery (e.g. your door code) (optional)"
                                   type="text"></textarea>
                       </div>
                       <div class="form-group new_address_sec_form">
                           <button type="button" onclick="" class="btn btn-primary  save_btn" @click="saveAddress">Save Address</button>
                           <button type="button" class="btn btn-info cancel_btn close close close_add_address_model" data-dismiss="modal" aria-label="Close">Cancel</button>
                       </div>
                   </div>
               </div>
           </div>
       </div>
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
        components:{
            GoogleMapComponent,
            Multiselect
        },
        data () {
            return {
                googleMap:false,
                userData:[],
                cities:[],
                zones:[],
                addressTyps:[],
                language:Cookies.get('languageId'),
                city:'',
                zone:'',
                addressType:'',
                locationCoordinates:null,
                address: '',
                note: '',
                appartment: '',
                submitted: false,
            };
        },
        methods: {
            openGoogleMap(){
                bus.$emit('setLocation' , this.locationCoordinates)
                this.googleMap = true
                $(".left_add_address").modal('hide');
            },

            getAddressTyps() {
                let _this = this;
                axios.post(apiDev + '/address-type-list', {}).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.addressTyps = response.data.response.address_type
                    }
                }).catch(error => {

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
                axios.post(apiDev + '/location-list', {city_id: _this.city.id}).then(response => {
                    if (response.data.response.httpCode == 200) {
                        this.zones = response.data.response.location_list
                    }
                }).catch(error => {

                })
            },

            saveAddress(){
                this.submitted = true;
                this.$validator.validate().then(valid => {
                        if (valid) {
                            axios.post(apiDev + '/add-address', {
                                language: this.language,
                                user_id: this.userData.user_id,
                                token: this.userData.token,
                                address_type: this.addressType.id,
                                address: this.address,
                                department_building: this.appartment,
                                city_id: this.city.id,
                                location_id: this.zone.id,
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

                                $(".left_add_address").modal('hide')
                            }).catch(error => {

                            })
                        }
                })
            }
        },
        mounted(){
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.getCities();
            this.getAddressTyps();
        },
        created(){
            bus.$on('closeGoogleMap', (data) => {
                if(data){
                    $(".left_add_address").modal("show")
                    this.googleMap = false
                }
            });
            bus.$on('locationCoordinates', (data) => {
                if (data){
                    this.address = data.address;
                    this.locationCoordinates = data.coordinates;
                }
            });
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
    /*change Address modal*/
    .modal-title-address{
        margin-top: 20px;
        margin-bottom: 10px;
    }
    .SelectCity{
        background-color: white;
        width: 100%;
        outline: none !important;
    }
    .SelectZone{
        background-color: white;
        width: 100%;
        outline: none !important;
    }
    .SelectAddressType{
        background-color: white;
        width: 100%;
        outline: none !important;
    }

    .error-message{
        color: red;
    }
</style>
