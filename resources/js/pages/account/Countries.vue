<template>
    <div class="account__content">
        <div class="account__content-common">
            <div class="after_account_addres">
                <div class="icModalRow_basket">
                    <ul>
                        <li :data-target="userData.country_id !== country.id ? '#modal-promo' : ''" data-toggle="modal" @click="getCountryId(country.id)" v-for="country in countries">
                            <div class="row">
                                <div class="text-left" style="padding-left: 15px; width: 49%; display: inline-block">
                                    <img :src="'https://www.countryflags.io/'+country.code+'/flat/64.png'" style="width: 28px; height: 28px">
                                    <span style="font-size: 15px; padding-left: 10px">{{ country.country_name }}</span>
                                </div>
                                <div class=" text-right" style="padding-right: 15px; width: 49%; display: inline-block">
                                    <i  class="fa fa-check" v-if="userData.country_id === country.id" aria-hidden="true" style="font-size: 18px;"></i>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <change-country-and-language-modal :text="modalText" :type="type" :countryId="countryId">

        </change-country-and-language-modal>
    </div>
</template>


<script>
    import ChangeCountryAndLanguageModal from "../../components/ChangeCountryAndLanguageModal";
    import Cookies from 'js-cookie';

    export default {
        name: "countries",
        components: {ChangeCountryAndLanguageModal},
        middleware: 'auth',
        data () {
            return {
                countries:{},
                userData:[],
                modalText : "countries",
                type: 'country',
                countryId: '',
                country: Cookies.get('languageId')
            };
        },

        methods:{
            getLanguages(){
                let flagsCodes = window.phone_codes;
                axios.post(apiDev + '/country-list').then(response => {
                    response.data.response.country_list.forEach((country)=>{
                        let finded = flagsCodes.find(code => code.name === country.country_name);
                        if (finded.hasOwnProperty('code')){
                            country.code = finded.code;
                        }
                    });
                    this.countries = response.data.response.country_list;
                }).catch(error => {
                    this.showLoader = false;
                })

            },

            getCountryId(countryId){
                this.countryId = countryId;
            }
        },

        created(){
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.getLanguages();
            bus.$emit('changePage' , this.$route.name);


        },

        mounted(){
            bus.$on('changeCountryId', (data) => {
                if (data) {
                    let newUserData = {
                        userData:{
                            httpCode: 200,
                            Message: "User logged-in successfully",
                            user_id: this.userData.user_id,
                            token: this.userData.token,
                            email: this.userData.email,
                            mobile: this.userData.mobile,
                            first_name: this.userData.first_name,
                            last_name: this.userData.last_name,
                            image: this.userData.image,
                            facebook_id: this.userData.facebook_id,
                            mobile_verified: this.userData.mobile_verified,
                            city_id: this.userData.city_id,
                            location_id: this.userData.location_id,
                            outlet_id: this.userData.outlet_id ? this.userData.outlet_id : 67,
                            express_user: this.userData.express_user,
                            express_user_end_date: this.userData.express_user_end_date,
                            country_id: data,
                        }
                    };
                    Cookies.set('userData', newUserData );
                    this.userData.country_id = data;
                }
            });
        }
    }
</script>

<style scoped>


    @media (max-width: 767px){
        .account__content{
            margin-left: 0 !important;

        }
    }
</style>
