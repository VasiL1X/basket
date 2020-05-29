<template>
    <!--modall Next Delivery-->
    <div class="modal fade outlet_available_time bs-example-modal-lg in" tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg outlet_available_time-modal-lg" role="document">
            <div class="modal-content">
                <div class="out_time_modles">
                    <button type="button" class="close text-white p-2" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <div class="icModalHeader retailerModalHeader">
                        <div class="logo">
                            <img class="hero-middle-logo retailerModalHeader-market-logo-general" v-bind:src="outletDeliverySlot.vendor_logo"  v-bind:alt="outletDeliverySlot.outlet_name">
                        </div>
                    </div>
                </div>
                <div class="new_address_sec_new">
                    <div class="top_time_counts">
                        <h2 class="top_time_counts-h2">Next Delivery Times</h2>
                        <small>Prices listed are for orders above JD 0 per store.
                            <span><a href="">Learn more about pricing.</a></span>
                        </small>
                        <h3 class="top_time_counts-h3">Today</h3>
                    </div>
                    <div class="inner_time_listing_list">
                        <ul class="unstyled clearfix hoursList today_time_list">
                            <li class="deliveryOption  hoursList-item"  v-for="item in today.time">
                                <span class="deliveryOption-window pull-left" v-if="item.label" >{{item.label}}  </span>
                                <span class="deliveryOption-window pull-left" v-else>{{item.delivery_time}} </span>

                                <span class="price pull-right deliveryOption-price">
                                    <span v-if="item.available == 1"> {{item.delivery_charge}} JD</span>
                                    <span v-else>Unavailable</span>
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div class="top_time_counts">
                        <h3 class="inner-time-listin">Tomorrow</h3>
                    </div>
                    <div class="inner_time_listing_list">
                        <ul class="unstyled clearfix hoursList today_time_list">
                            <li class="deliveryOption hoursList-item"  v-for="item in tomorrow.time">
                                <span class="window pull-left" v-if="item.label">{{item.label}} </span>
                                <span class="window pull-left" v-else>{{item.delivery_time}} </span>

                                <span class="price pull-right">
                                     <span v-if="item.available == 1"> {{item.delivery_charge}} JD</span>
                                    <span v-else>Unavailable</span>
                                </span>
                            </li>
                        </ul>
                    </div>
                    <div  v-for="(item, index) in outletDeliverySlot.delivery_slot" v-if="seeMore">
                       <div v-if="index > 1">
                           <div class="top_time_counts">
                               <h3 class="inner-time-listin">{{item.day}}</h3>
                           </div>
                           <div class="inner_time_listing_list">
                               <ul class="unstyled clearfix hoursList today_time_list">
                                   <li class="deliveryOption hoursList-item"  v-for="dayTimes in item.time">
                                       <span class="window pull-left" v-if="dayTimes.label">{{dayTimes.label}} </span>
                                       <span class="window pull-left" v-else>{{dayTimes.delivery_time}} </span>

                                       <span class="price pull-right">

                                     <span v-if="dayTimes.available == 1"> {{dayTimes.delivery_charge}} JD</span>
                                    <span v-else>Unavailable</span>
                                </span>
                                   </li>
                               </ul>
                           </div>
                       </div>
                    </div>
                    <div class="see_all_sections" v-if="seeMore == false" @click="seeMoreTimes(true)">
                        <a href="javascript:void(0)">
                            <button class="btn btn-danger see-all-times-stores">See more
                                times
                            </button>
                            <input type="hidden" class="open-see-times" value="0">
                        </a>
                    </div>
                    <div class="see_all_sections" v-if="seeMore">
                        <a href="javascript:void(0)">
                            <button class="btn btn-danger see-all-times-stores" @click="seeMoreTimes(false)">
                                See less times
                            </button>
                            <input type="hidden" class="open-see-times" value="0">
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Cookies from 'js-cookie'
    export default {
        name: "NextDeliveryModal",
        props: ['deliverInfo'],
        data () {
            return {
                userData:[],
                outletDeliverySlot:[],
                language: Cookies.get('languageId'),
                countryId:46,
                today:[],
                tomorrow:[],
                seeMore:false
            };
        },
        methods:{
            seeMoreTimes(param){
                this.seeMore = param;
            },
            getOutletDeliverySlot(){
                let _this = this;
                axios.post(apiDev+'/cart-outlet-delivery-slot', {
                    language:_this.language,
                    user_id:_this.userData.user_id,
                    token:_this.userData.token,
                    country_id:_this.countryId,
                    city_id:_this.userData.city_id,
                    outlet_id:_this.userData.outlet_id ? _this.userData.outlet_id : 67,
                }).then(response => {
                    if(response.data.response.httpCode === 200){
                        _this.outletDeliverySlot = response.data.response.outlet_delivery_slot[0];
                        _this.today = response.data.response.outlet_delivery_slot[0].delivery_slot[0];
                        _this.tomorrow = response.data.response.outlet_delivery_slot[0].delivery_slot[1];

                    }
                }).catch(error => {

                })
            },
        },
        mounted(){
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.getOutletDeliverySlot();
            bus.$on('changeStoreAndCooke', (data) => {
                if (data) {
                    this.userData.outlet_id = data;
                    this.getOutletDeliverySlot();

                }
            })
        },
    }
</script>

<style scoped>
    /*next delivery time Modal*/
    .icModalHeader{
        padding: 30px;
    }
    .top_time_counts >h2{
        margin-top: 20px;
    }
    .retailerModalHeader .logo {
         max-width: unset;
    }
    .pull-right{
        float: right;
    }
    .pull-left{
        float: left;
    }
    .inner-time-listin{
        font-size: 20px;
        margin: 0 0 11px;
        padding: 0;
        text-align: center;
        font-weight: 100;
    }

    .modal .new_address_sec  .shopper-continue:nth-of-type(1) {
        float: right;
    }

    .modal .new_address_sec  .shopper-continue:nth-of-type(2) {
        float: right;
    }

    .modal .new_address_sec .form-group {
        display: flow-root;
    }

</style>
