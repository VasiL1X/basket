<template>
    <div>
        <ul class="list-group">
            <li v-for="address in addresss" class="list-group-item-white">
                <a href="javascript:void(0)" title="" data-toggle="modal" @click="editAddress(address)"
                   class="edit_address text-success p-2">
                    <i class="fas fa-home"></i>
                    <div class="left_add_icon_inf"
                         :data-address="address.address"
                         :data-address_id="address.address_id"
                         :data-address_type_id="address.address_type_id"
                         :data-city_id="address.city_id"
                         :data-location_id="address.location_id"
                         :data-latitude="address.latitude"
                         :data-longtitude="address.longtitude"
                         :data-near_landmark="address.near_landmark"
                         :data-additional_info="address.additional_info"
                         :data-department_building="address.department_building"
                         :data-country_id="address.country_id">


                        <p>{{address.address}}</p>
                    </div>
                </a>
            </li>
            <li class="list-group-item-white">
                <a href="javascript:void(0)" title="New Delivery Address" class="text-success add_new_address" data-toggle="modal"
                   data-target=".left_add_address">
                    <i class="fas fa-plus"></i>
                    New Delivery Address
                </a>
            </li>
        </ul>
        <AddAddressModal></AddAddressModal>
        <EditAddressComponent></EditAddressComponent>
    </div>
</template>

<script>
    import Cookies from 'js-cookie';
    import AddAddressModal from "../../components/AddAddressModal";
    import EditAddressComponent from "../../components/EditAddressModal";

    export default {
        name: "addresses",
        components: {AddAddressModal,EditAddressComponent},
        data() {
            return {
                userData: [],
                language: Cookies.get('languageId'),
                addresss: [],
            };
        },

        methods: {
            getAddress() {
                let _this = this;
                axios.post(apiDev + '/get-address', {
                    language: _this.language,
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                }).then(response => {
                    this.addresss = response.data.response.address_list
                }).catch(error => {

                })
            },

            editAddress(address){
                bus.$emit('left_edit_address',address);
                this.$bvModal.show('left_edit_address');
            }
        },

        created() {
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.getAddress();
            bus.$on('runGetAddress', (data) => {
                if (data) {
                    this.getAddress();
                }
            });
            bus.$emit('changePage', this.$route.name);

        },

        mounted() {

        }
    }
</script>

<style scoped>
    .after_account_right {
        margin-left: -50px;
    }

    @media (max-width: 767px) {
        .after_account_right {
            margin-left: 0px !important;

        }
    }
    .list-group {
        list-style: none;
        margin: 0 0 30px;
        padding: 0
    }

    .list-group li {
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        border-color: #eee #eee currentcolor;
        border-image: none;
        border-style: solid solid none;
        border-width: 1px 1px 0;
        font-size: 18px;
        line-height: 36px;
        list-style: none;
        color: #727272;
        overflow: hidden;
        padding: 20px
    }

    .list-group li:first-child {
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        border-bottom: 1px solid #eee
    }

    .list-group li:last-child {
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        border-bottom: 1px solid #eee
    }

    .list-group li a {
        color: #69dada
    }
</style>
