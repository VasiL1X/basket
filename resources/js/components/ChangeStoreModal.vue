<template>
    <div class="modal fade store-change p-0" id="changeStore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog store-change__wrapper" role="document">
            <div class="modal-content store-change__inner">
                <div class="modal-header store-change__header">
                    <div class="store-change__close-wrapper d-lg-none">
                            <div class="store-change__close-text">
                                <span>Choose a store</span>
                            </div>
                            <button type="button" class="store-change__close-btn close" data-dismiss="modal" aria-label="Close" @click="closeStoresModal()">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <div class="container">
                        <div class="row store-change__header-inner">
                            <div class="row col-lg-10 store-change__delivery">
                                <div class="store-change__buttons mr-lg-3">
                                    <button class="store-change__btn store-change__btn--active">delivery</button>
                                    <button class="store-change__btn">pickup</button>
                                </div>
                                <div class="store-change__address" data-toggle="dropdown">
                                    <span class="text-secondary">TO</span>
                                    <div class="store-change__address-current">{{ currentCity }}</div>
                                    <i class="fa fa-pen text-success"></i>
                                    <div class="dropdown-menu p-3 store-change__locations-list" data-flip="false">
                                        <button
                                            @click="updateUserLocation( item.address_id,item.city_id, item.address, item.location_id)"
                                            class="dropdown-item" type="button"
                                            v-for="item in addressList"
                                            :key="item.id">
                                            <p class="store-change__locations-address mt-2">
                                                <i class="fas fa-map-marker-alt text-success mr-1"></i>
                                                <span>{{item.address}},</span>
                                                <span v-for="city in cities" :key="city.id">
                                                    <span v-if="city.id == item.city_id" class="city-zone">{{city.city_name}},</span>
                                                </span>
                                                <span v-for="zone in zones" :key="zone.id">
                                                    <span v-if="zone.id == item.location_id" class="city-zone">{{zone.zone_name}}</span>
                                                </span>
                                            </p>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 d-lg-inline d-none text-right store-change__category">
                                <div class="store-change__category-inner">
                                    <button data-toggle="dropdown" class="pt-0 store-change__category-btn">
                                        <span>Showing</span>
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <div class="dropdown-menu p-1">
                                        <button v-for="item in items" :key="item.id" @click="getStoreList(item.qt)" class="dropdown-item" v-bind:class="[itemActive === item.qt? 'bg-light':'' ]" type="button">
                                            <i class="fa fa-check mr-2 align-middle col-1 text-success" v-bind:class="[item.qt === itemActive  ? 'visible' : 'invisible' ]"></i>
                                            {{ item.title }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body store-change__list stores-list__wrapper">
                    <div class="container" v-if="!showLoader">
                        <ul class="stores-list__list row p-0">
                            <li class="col-xl-3 col-lg-4 col-md-6 text-left text-md-center stores-list__item" v-bind:class="[userData.outlet_id === store.outlet_id ? 'bg-lightC' : '']"
                                v-if="store.delivery_areas.includes(userData.location_id) &&  sortBy(store.store_type[1]) === itemActive"
                                @click="updateStore(store.outlet_id)"
                                v-for="store in storeList"
                                :key="store.id">
                                <div class="stores-list__item-inner">
                                    <div class="stores-list__item-img">
                                        <img class="" v-bind:src="store.logo_image" v-bind:alt="store.outlet_name">
                                    </div>
                                    <div class="stores-list__item-descr">
                                        <h3 class="stores-list__item-name">
                                            {{store.outlet_name}}
                                        </h3>
                                        <p class="stores-list__item-categories">
                                            <span class="stores-list__item-category"
                                                    v-for="type in store.store_type"
                                                    :key="type.id">
                                                {{type.name}}
                                            </span>
                                        </p>
                                        <button class="stores-list__item-btn m-md-auto">delivery</button>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="container" v-else>
                        <div class="wrapper-loader row">
                            <div class="wrapper-cell col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                <!-- it was unused v-for="i in 10" below-->
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
                <div class="container store-change__footer py-4 py-md-5">
                    <p class="text-center store-change__footer-text">
                        Basket is
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
            closeStoresModal() {
                bus.$emit('closeStoresModal')
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

<style lang="scss" scoped>
    /*change Store Modall*/
    .bg-lightC{
        border-radius: 7px;
        background-color: #ffc1072e;
    }
    .store-change {
        margin-top: 84px;
        height: calc(100% - 84px);
        &__wrapper {
            display: flex;
            margin: 0;
            max-width: 100%;
            min-height: 100%;
        }
        &__inner {
            min-height: 100%;
            margin: 0;
            border: none;
            border-radius: 0;
        }
        &__header {
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.16);
            padding: 0;
            flex-direction: column;
            &-inner {
                align-items: center;
                padding: 0 4rem;
                height: 49px;
            }
        }
        &__delivery {
            margin: 0;
            align-items: center;
        }
        &__buttons {
            display: flex;
            border: solid 1px #61bf3d;
            border-radius: 3px;
            height: 32px;
        }
        &__btn {
            width: 170px;
            background: #fff;
            border: none;
            font-size: 14px;
            font-weight: 600;
            letter-spacing: 0.6px;
            text-transform: uppercase;
            color: #61bf3d;
            transition: all .3s;
            &--active, &:hover {
                background: #61bf3d;
                color: #fff;
            }
        }
        &__address {
            position: relative;
            max-width: 300px;
            display: flex;
            align-items: baseline;
            cursor: pointer;
            &-current {
                font-size: 16px;
                font-weight: 600;
                margin: 0 5px;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
        }
        &__category {
            &-inner {
                position: relative;
            }
            &-btn {
                color: #757575;
                font-size: 16px;
                font-weight: 600;
                border: none;
                background: none;
                i {
                    color: #61bf3d;
                }
            } 
        }
        &__footer-text {
            font-size: 14px;
            color: #cccccc;
        }
        &__close {
            &-wrapper {
                height: 76px;
                text-align: center;
                padding: 16px 10px 10px;
                width: 100%;
                background-color: #ededed;
            }
            &-text {
                font-size: 15px;
                font-weight: 700;
                color: #000;
            }
            &-btn {
                position: absolute;
                right: 10px;
                top: 15px;
                padding: 0;
                margin: 0;
                font-size: 32px;
                line-height: 18px;
                font-weight: 400;
            }
        }
        &__locations {
            &-list {
                width: 100%;
                min-width: 30rem;
                max-height: 40vh;
                overflow: auto;
            }
            &-address {
                text-overflow: ellipsis;
                white-space: nowrap;
                max-width: 100%;
                overflow: hidden;
                line-height: 18px;
            }
        }
    }
    .stores-list {
        &__list {
            margin: 0;
            list-style: none;
        }
        &__item {
            padding-top: 10px;
            padding-bottom: 10px;
            &:hover {
                border-radius: 7px;
                background-color: #ffc1072e;
            }
            &-inner {
                margin-top: 10px;
                margin-bottom: 10px;
            }
            &-img {
                img {
                    border-radius: 50%;
                    height: 100px;
                    width: 100px;
                    box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.12);
                }
            }
            &-descr {
                margin: 16px 6px 6px;
            }
            &-name {
                color: #262c1d;
                font-size: 18px;
                font-weight: 600;
                margin: 0;
            }
            &-categories {
                color: #000;
                font-size: 14px;
                margin: 4px 0px 46px;
            }
            &-category {
                display: inline-block;
            }
            &-category + &-category {
                padding-left: 4px;
                position: relative;
                &::before {
                    content: '•';
                }
            }
            &-btn {
                position: absolute;
                bottom: 16px;
                left: 0;
                right: 0;
                border-radius: 4px;
                border: solid 1px #cccccc;
                background: none;
                min-width: 96px;
                font-weight: 600;
                text-transform: uppercase;
                color: #757575;
                transition: background .3s;
                &:hover {
                    background: #eaeaea;
                }
            }
        }
    }

    /* new styles */
    .dropdown-item {
        padding: 0;
        vertical-align: middle;
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

    @media (max-width: 991px) {
        .store-change {
                margin: 0;
                height: 100%;
            &__header {
                &-inner {
                    padding: 0;
                    height: 86px;
                }
            }
            &__delivery {
                flex-direction: column-reverse;
            }
            &__address {
                max-width: 100%;
                width: 100%;
                margin-top: -48px;
                margin-bottom: 15px;
                padding: 13px 26px 13px 13px;
                font-size: 13px;
                font-weight: 600;
                border-radius: 2px;
                box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.12);
                background-color: #ffffff;
                .fa-pen {
                    position: absolute;
                    right: 13px;
                    top: 50%;
                    transform: translateY(-50%);
                }
            }
            &__buttons {
                width: 100%;
            }
            &__btn {
                width: 50%;
            }
            &__locations-list {
                min-width: 100%;
                max-height: 60vh;
            }
        }
    }
    @media (max-width: 767px) {
        
        .stores-list {
            &__wrapper {
                padding: 0;
            }
            &__item {
                border-bottom: 1px solid #f0f0f0;
                padding: 18px 3px;
                &-inner {
                    display: flex;
                    align-items: center;
                    margin: 0;
                }
                &-img img {
                    width: 64px;
                    height: 64px;
                }
                &-descr {
                    margin: 0 16px;
                }
                &-name {
                    font-size: 13px;
                }
                &-categories {
                    font-size: 11px;
                    margin: 3px 0px 5px;
                }
                &-btn {
                    position: static;
                    border-radius: 2px;
                    min-width: 83px;
                    font-size: 11px;
                }
            }
        }
        .store-change__footer-text {
            font-size: 11px;
        }
    }
    @media (max-width: 575px) {

    }
</style>