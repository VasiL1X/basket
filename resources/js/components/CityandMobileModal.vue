<template>
    <div class="modal" tabindex="-1" role="dialog" id="socialModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="col-12 p-2 socialModal">
                    <p id="mySmallModalLabel" class="text-center socialModalTitle">Provide Mobile Number</p>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group text-center" data-vv-scope="form-1">
                        <b-form-select  v-model="code" :options="countryModel"></b-form-select>
                        <span v-show="errors.has('code')"
                              class="error text-danger p-1">{{ errors.first('code') }}</span>

                    </div>
                    <div class="form-group text-center">
                        <input class="form-control socialMobile"
                               tabindex="0"
                               placeholder="Mobile"
                               type="text"
                               v-model="mobile"
                               v-validate="'required'"
                               name="mobile"
                        >
                        <span v-show="errors.has('mobile')"
                              class="error text-danger p-1">{{ errors.first('mobile') }}</span>
                    </div>
                    <div class="form-group text-center">
                        <div class="form-group">
                            <div class="select_city_sect">
                                <b-form-select v-model="city" :options="cities" name="city" v-validate="'required'" @change="getZones(city)"></b-form-select>
                            </div>
                            <span v-show="errors.has('city')"
                                  class="error text-danger p-1">{{ errors.first('city') }}</span>
                        </div>
                        <div class="form-group text-center">
                            <div class="select_city_sect">
                                <b-form-select v-model="zone" :options="zones" name="zone" v-validate="'required'"></b-form-select>
                                <span v-show="errors.has('zone')"
                                      class="error text-danger p-1">{{ errors.first('zone') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button  class="btn btn-success col-12"  @click="socialSignUp">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Select2 from "v-select2-component";

    export default {
        name: "CityandMobileModal",
        data() {
            return {
                mobile: '',
                code: '+962',
                countryModel: [{value:'+962',text:'Jordan (+962)'}],
                city: null,
                zone: null,
                cities: [{
                    value: null,
                    text: 'Select City',
                    disabled: true
                }],
                zones: [{
                    value: null,
                    text: 'Select Zone',
                    disabled: true
                }],
            }
        },
        methods: {
            socialSignUp() {
                this.$validator.validate().then(valid => {
                  if(valid){
                      bus.$emit('socialSignUp', {mobile: this.mobile,code:this.code,city: this.city, zone: this.zone});
                  }
                });
            },

            getCities() {
                let _this = this;
                axios.post(apiDev + '/city-list', {}).then(response => {
                    if (response.data.response.httpCode == 200) {
                        let cities = response.data.response.city_list;
                        cities.forEach(city => {
                           _this.cities.push({value:city.id,text:city.city_name,disabled:false});
                        });
                    }
                }).catch(error => {

                })
            },

            getZones(city) {
                let _this = this;
                axios.post(apiDev + '/location-list', {city_id: city}).then(response => {
                    if (response.data.response.httpCode == 200) {
                        let zones = response.data.response.location_list
                        zones.forEach(zone => {
                          _this.zones.push({value:zone.id,text:zone.zone_name,disabled:false});
                        });
                    }
                }).catch(error => {

                })
            },
        },
        mounted() {

            // $('#myModal').on('show.bs.modal', function() {
            //     $('#select2-sample').select2();
            // })
            bus.$on('enterMobile', () => {
                this.getCities();
                $("#socialModal").modal('show');
            });
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

    .get-your-local-stores {
        font-size: 18px;
        font-weight: 600;
        display: inline-block;
        margin: 18px 0 4px;
        width: 100%;
        text-align: center
    }

    #country_code {
        background-color: white;
        outline: none !important;
    }

    .SelectCity {
        background-color: white;
        outline: none !important;
    }

    .SelectZone {
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
        .basket_landing_page {
            min-height: 300px;
        }

        .basketLandingPageStepTwo {
            min-height: 650px;
        }

    }
</style>

