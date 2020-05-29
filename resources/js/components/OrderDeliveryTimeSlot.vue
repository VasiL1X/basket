<template>
    <div class="modal change_time_slot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="checkout-card-actions clearfix" v-for="deliver in orderDeliverySlots">
                    <div>
                        <div :id="'update_outlet_slot'+outletDeliverySlot.outlet_id"
                             v-for="(outletDeliverySlot, outletIndex) in orderDeliverySlots">
                            <div class="RetailerServiceOptions">
                                <div class="p-y-md media d-block">
                                    <div class="media-left">
                                        <img class="img-circle media-object"
                                             :src="outletDeliverySlot.vendor_logo"
                                             style="width: 50px; height: 50px; box-shadow: rgba(0, 0, 0, 0.15) 0px 0px 0px 1px inset; max-width: 50px;">
                                        <button type="button" class="close mr-3" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="media-body p-l-sm">
                                        <div class="title-wrapper clearfix">
                                            <span class="title">{{outletDeliverySlot.outlet_name}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-b-sm checkout-promotion cursor-pointer"
                                     title="Head back to the store for more items"
                                     style="margin-top: -10px;">
                                    <span class="text-green"></span>
                                </div>
                                <div class="RetailerServiceOptionsBody show_elem"
                                     :id="'show-time-slot'+outletDeliverySlot.outlet_id"
                                     style="max-height: 900px;">
                                    <div class="ic-panel">
                                        <ul class="ic-panel-tabs nav nav-tabs" role="tablist">
                                            <li class="ic-panel-tab"
                                                role="presentation"
                                                v-bind:class="{ active: slot.day == selectedDay}"
                                                @click="selectDay(slot.day, outletDeliverySlot.outlet_id)"
                                                v-for="(slot, index) in outletDeliverySlot.delivery_slot">
                                                <a data-bypass="tabrue" href="#Sunday67" role="tab"
                                                   data-toggle="tab">
                                                    <div class="day">
                                                        <strong v-if="index == 0" style="font-size: 14px;">
                                                            Today
                                                        </strong>
                                                        <strong v-else-if="index == 1" style="font-size: 14px;">
                                                            Tomorrow
                                                        </strong>
                                                        <strong v-else style="font-size: 14px;">
                                                            {{slot.day}}
                                                        </strong>
                                                    </div>
                                                    <div class="checkout-service-day-heading">
                                                        {{ changeWeekDate(slot.week_date)}}
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="p-a-sm">
                                            <div
                                                class="ic-btn-group-vertical ic-btn-block tab-content"
                                                v-if="slot.day == selectedDay"
                                                v-for="(slot, index) in outletDeliverySlot.delivery_slot">
                                                <div role="tabpanel" class="tab-pane active" v-if="index < seeSlotCount"
                                                     v-for="(times, index) in slot.time">
                                                    <div class="ic-btn delivery-option-panel text-left ic-btn-white"
                                                         v-if="times.available == 1"
                                                         v-bind:class="{ active_time_slot: times.selected_slot ==1 }"
                                                         @click="updateOrderDeliverySlots(times.delivery_date, times.delivery_time,times.id,times.delivery_charge, outletDeliverySlot.outlet_id, outletDeliverySlot)">
                                                        <div class="time-box">
                                                            <input type="radio"
                                                                   class="timeslot_chkbox_16569"
                                                                   :checked="times.selected_slot ==1"
                                                                   style="margin:0px 10px 0 0; cursor: pointer;vertical-align: middle;"
                                                                   name="delivery_slot"
                                                            >
                                                        </div>
                                                        <span class="display-name"
                                                              v-if="times.label">{{times.label}}  </span>
                                                        <span class="display-name"
                                                              v-else>{{times.delivery_time}} </span>

                                                        <span class="p-l-sm display-data"></span>
                                                        <span
                                                            class="chooseBtn fa-pull-right">Choose</span>
                                                        <span class="price">JD {{times.delivery_charge}}</span>
                                                    </div>
                                                    <div
                                                        class="ic-btn delivery-option-panel text-left ic-btn-white"
                                                        v-else
                                                        style="pointer-events: none; padding: 15px 30px;">
                                                        <div style="height: 28px">
                                                            <div class="time-box">
                                                                <input data-v-2d101ea2=""
                                                                       type="radio"
                                                                       class="timeslot_chkbox_16569"
                                                                       style="margin: 0px 10px 0px 0px; cursor: pointer; vertical-align: middle;">
                                                            </div>
                                                            <span class="display-name"
                                                                  style="color: #848d8e">{{times.delivery_time}}</span>
                                                            <small class="text-muted fa-pull-right">UNAVAILABLE</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="more-time-box more-time-box67">
                                                    <a href="javascript:void(0)"
                                                       data-bypass="true"
                                                       @click="seeLessSlots()"
                                                       v-if="seeSlotCount >6">
                                                        Less times &nbsp;
                                                        <i class="fa fa-chevron-up"></i>
                                                    </a>
                                                    <a href="javascript:void(0)"
                                                       data-bypass="true"
                                                       @click="seeMoreSlots()"
                                                       v-else>
                                                        More times
                                                        &nbsp;<i class="fas fa-chevron-down"></i>
                                                    </a>
                                                </div>
                                                <span class="outlet_name_cls hide_elem">Carrefour City Mall</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {helpers} from "../mixins/helpers";
    import Cookies from 'js-cookie';

    export default {
        name: "OrderDeliveryTimeSlot",
        components: {},
        props: ['orderDeliverySlots', 'order'],
        mixins: [helpers],
        data() {
            return {
                selectedDay: '',
                seeSlotCount: 6,
                checkoutDetails: {},
                countryId: 46,

            };
        },
        methods: {
            dateChange: function (date) {
                return moment(date, 'DD-MM-YYYY').format('ddd, MMM DD');
            },

            changeWeekDate(weekDate) {
                return moment(weekDate, "DD-MM-YYYY").format('MMM D')
            },

            changeDay() {

            },

            selectDay(day, outletId) {
                this.selectedDay = day;
                this.seeSlotCount = 6;
                this.selectedOutletId = outletId
            },

            seeMoreSlots() {
                this.seeSlotCount = 11;
            },

            seeLessSlots() {
                this.seeSlotCount = 6;
            },


            updateOrderDeliverySlots(deliveryDate, deliveryTime, outletDeliverySlotsTimeId, deliveryCharge, outlet_id, item) {
                let _this = this;
                axios.post(apiDev + '/update-delivery-slot-order', {
                    delivery_date: deliveryDate,
                    delivery_time: deliveryTime,
                    delivery_slot_time_id: outletDeliverySlotsTimeId,
                    orders_outlets_id:this.order.orders_outlets_id,
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                }).then(response => {
                    if (response.data.response.httpCode == 200) {

                        bus.$emit('emitOrderDeliveryTimeSlot', true);
                        bus.$emit('changedDeliveryTime', {outlet_id: outlet_id, delivery_date:deliveryDate , delivery_time:deliveryTime});
                    }
                    this.$bvToast.toast(response.data.response.Message, {
                        title: 'Basket',
                        autoHideDelay: 5000,
                        toaster: 'b-toaster-bottom-left',
                        appendToast: true
                    });
                    $(".change_time_slot").modal('hide');
                }).catch(error => {

                })
            },




        },
        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData
            let _this = this;
            $(document).on('show.bs.modal', '.modal', function () {
                _this.selectedDay = _this.order.delivery_day
            });
        },
        created() {

        }
    }
</script>

<style scoped>
    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel-tabs {
        margin: 0px 6%;
        list-style: none;
        padding: 0;
        border: none;
        text-align: center;
    }

    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel-tabs .ic-panel-tab {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        margin-right: 10px;
        margin-bottom: 5px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        color: rgb(67, 176, 42);
        background: rgb(247, 247, 247) !important;
        cursor: pointer;
        padding: 10px;
        flex-wrap: wrap;
    }

    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel-tabs .ic-panel-tab:last-child {
        margin-right: 0px;
    }

    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel-tabs .ic-panel-tab.active {
        background: var(--theme-color) !important;
    }

    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel-tabs .ic-panel-tab.active a {
        color: rgb(255, 255, 255) !important;
        touch-action: manipulation;
        text-decoration: none;
        background-color: transparent;
        border: none;
    }

    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel-tabs .ic-panel-tab a {
        color: var(--theme-color) !important;
        touch-action: manipulation;
        text-decoration: none;
        background-color: transparent;
        padding: 0;
    }

    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel-tabs .ic-panel-tab.active a:hover, .choose_delivery .checkout-actions-container .checkout-card-actions .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel-tabs .ic-panel-tab a:hover, .choose_delivery .checkout-actions-container .checkout-card-actions .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel-tabs .ic-panel-tab.active a {
        border: 1px solid transparent;
    }

    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel .p-a-sm {
        background-color: white;
        margin-top: 15px;
    }

    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel .p-a-sm .ic-btn-group-vertical {
        display: block;
        width: 100%;
        position: relative;
        vertical-align: middle; /* border: 1px solid #eee; */
        padding: 0 20px;
    }

    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel .p-a-sm .ic-btn-group-vertical .ic-btn:first-child:not(:last-child) {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel .p-a-sm .ic-btn-group-vertical .delivery-option-panel.disabled {
        height: 52px;
        cursor: default !important;
        pointer-events: none !important;
        background-color: #FBFAF9;
        border-color: #E7E6E5;
        opacity: 0.65;
        box-shadow: none;
        border-bottom: none;
    }

    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel .p-a-sm .ic-btn-group-vertical .delivery-option-panel {
        padding: 15px 30px;
        font-weight: 400;
        float: none;
        width: 100%;
        max-width: 100%;
        position: relative;
        text-align: left;
        margin-bottom: 0;
        vertical-align: middle;
        touch-action: manipulation;
        background-image: none;
        /* border: 1px solid transparent; */
        white-space: nowrap;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 2;
        border-radius: 1px;
        user-select: none;
        margin-top: 0px;
        margin-left: 0;
        border: none;
    }

    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel .p-a-sm .ic-btn-group-vertical .delivery-option-panel .ic-btn-white {
        background-color: #fff;
        border-color: #E7E6E5;
    }

    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel .p-a-sm .ic-btn-group-vertical .delivery-option-panel .ic-btn-white .display-data {
        width: 74%;
        display: inline-block;
        padding-left: 10px !important;
    }

    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel .p-a-sm .ic-btn-group-vertical .delivery-option-panel.ic-btn-white .display-data .ic-btn-xs {
        padding: 1px 8px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 4px;
        text-transform: uppercase;
        color: #43B02A;
        background-color: #fff;
        border-color: #43B02A;
        display: inline-block;
        margin-bottom: 0;
        font-weight: 600;
        text-align: center;
        vertical-align: middle;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        white-space: nowrap;
        -webkit-font-smoothing: antialiased;
        user-select: none;
        float: right !important;
    }

    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel .p-a-sm .ic-btn-group-vertical .delivery-option-panel.ic-btn-white .display-data .choose_btn {
        padding: 1px 8px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 4px;
        text-transform: uppercase;
        color: var(--theme-color);
        background-color: #fff;
        display: inline-block;
        margin-bottom: 0;
        font-weight: 600;
        text-align: center;
        vertical-align: middle;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid var(--theme-color);
        white-space: nowrap;
        -webkit-font-smoothing: antialiased;
        user-select: none;
        margin-top: 5px;
    }

    .change_time_slot .media-left {
        width: 100%;
        display: block;
        padding: 20px 0px;
        background-color: var(--theme-color);
    }

    .change_time_slot span.title {
        font-size: 20px;
    }

    .change_time_slot .media-body.p-l-sm {
        width: 100%;
        float: none;
        display: block;
        text-align: center;
        padding: 10px 0px;
    }

    .change_time_slot .p-y-md.media {
        width: 100%;
        text-align: center;
        margin: 0 auto;
    }

    .change_time_slot .modal-dialog.modal-lg {
        width: 820px;
    }

    .change_time_slot .time-box {
        float: left;
    }

    .change_time_slot .display-name {
        width: 26%;
        display: inline-block;
        text-align: left;
        float: left;
        font-weight: 600;
    }

    .change_time_slot .ic-btn.delivery-option-panel:hover {
        background-color: #f0efec;
        cursor: pointer;
    }

    .change_time_slot img.img-circle.media-object {
        margin: 0 auto;
        text-align: center;
    }

    .change_time_slot .more-time-box a {
        cursor: pointer;
        border: none;
        background-image: none;
        display: flex;
        align-items: center;
        padding-left: 16px;
        padding-right: 16px;
        font-size: 16px;
        height: 40px;
        background-color: transparent;
        color: var(--theme-color);
        width: 100%;
        justify-content: center;
    }

    .change_time_slot input[type=checkbox], .change_time_slot input[type=radio], .change_time_slot input[type=checkbox], .change_time_slot input[type=radio] {
        line-height: 1.3em;
        width: 1.3em;
        height: 1.3em;
        margin: 0 0 0 -25px;
        padding: 10px;
        -webkit-appearance: none;
        background-image: url(https://d2guulkeunn7d8.cloudfront.net/assets/check-unfill_2x-6675c05adf356c1f19e3e3d88afd07a3.png);
        background-size: cover;
        outline: none;
    }

    .change_time_slot input[type=checkbox]:checked, .change_time_slot input[type=radio]:checked, .change_time_slot input[type=checkbox]:checked, .change_time_slot input[type=radio]:checked {
        background-image: url(https://d2guulkeunn7d8.cloudfront.net/assets/check-circle_2x-614c7b4c6f35cc72407e9a4bd615ec85.png);
    }

    .change_time_slot input[type=checkbox]{
        margin-right: 5px;
        background-image: url(https://d2guulkeunn7d8.cloudfront.net/assets/checkbox-inactive-ea0f5105f41865983a2782373eeb0d3c.png);
    }

    .change_time_slot input[type=checkbox]:hover{
        background-image: url(https://d2guulkeunn7d8.cloudfront.net/assets/checkbox-inactive-hover-31fad5d08bb6f4790a68a32857d4b440.png);
    }

    .change_time_slot input[type=checkbox]:checked {
        background-image: url(https://d2guulkeunn7d8.cloudfront.net/assets/checkbox-active-cb1c2e86b7c021772f3de2cc692999ec.png);
    }

    .change_time_slot .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel-tabs .ic-panel-tab a:hover {
        border: none;
    }

    .change_time_slot .active_time_slot {
        color: #000 !important;
        cursor: pointer !important;
        border: 1px solid var(--theme-color) !important;
        background: rgb(242, 251, 255) !important;
        border-radius: 4px !important;
    }
    .choose_delivery .checkout-actions-container .checkout-card-actions .RetailerServiceOptions .checkout-promotion {
        margin-top: -10px;
        cursor: pointer;
        margin-bottom: 10px !important;
        padding: 19px;
        border: 1px solid #e7e6e5;
        border-radius: 3px;
    }

    .choose_delivery .checkout-actions-container .checkout-card-actions {
        padding: 0px 30px 20px;
    }

    .choose_delivery .checkout-actions-container .checkout-card-actions .RetailerServiceOptions .media:first-child {
        margin-top: 0;
        padding-top: 15px !important;
        padding-bottom: 42px !important;
        display: table;
        width: 100%;
        overflow: hidden;
        zoom: 1;
    }

    .choose_delivery .checkout-actions-container .checkout-card-actions .RetailerServiceOptions .media-left {
        display: table-cell;
        vertical-align: middle;
        width: 50px;
        padding-right: 10px;
    }

    .choose_delivery .checkout-actions-container .checkout-card-actions .RetailerServiceOptions .media-body {
        display: table-cell;
        vertical-align: middle;
        padding-left: 10px !important;
        width: 10000px;
        overflow: hidden;
        zoom: 1;
    }

    .choose_delivery .checkout-actions-container .checkout-card-actions .RetailerServiceOptions .media-body .title-wrapper .title {
        display: inline-block;
        float: left;
        font-size: 18px;
        font-weight: 600;
    }

    .choose_delivery .checkout-actions-container .checkout-card-actions .RetailerServiceOptions .media-body .subtitle {
        display: block;
        font-size: 14px;
        font-weight: 500;
        color: #b0b0b0;
    }

    .choose_delivery .checkout-actions-container .checkout-card-actions .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel-tabs .ic-panel-tab.active {
        background: var(--theme-color) !important;
    }

    .choose_delivery .checkout-actions-container .checkout-card-actions .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel-tabs .ic-panel-tab {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        margin-right: 4px;
        margin-bottom: 5px;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        color: rgb(67, 176, 42);
        background: rgb(247, 247, 247) !important;
        cursor: pointer;
        padding: 10px;
        flex-wrap: wrap;
    }

    .choose_delivery .checkout-actions-container .checkout-card-actions .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel-tabs .ic-panel-tab.active a {
        color: rgb(255, 255, 255) !important;
        touch-action: manipulation;
        text-decoration: none;
        background-color: transparent;
    }

    .choose_delivery .checkout-actions-container .checkout-card-actions .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel-tabs .ic-panel-tab a {
        color: var(--theme-color) !important;
        touch-action: manipulation;
        text-decoration: none;
        background-color: transparent;
        padding: 0;
    }

    .choose_delivery .checkout-actions-container .checkout-card-actions .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel .p-a-sm .ic-btn-group-vertical {
        display: block;
        width: 100%;
        position: relative;
        vertical-align: middle;
    }

    .choose_delivery .checkout-actions-container .checkout-card-actions .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel .p-a-sm .ic-btn-group-vertical .delivery-option-panel {
        padding: 15px 30px;
        font-weight: 400;
        /* display: block; */
        float: none;
        width: 100%;
        max-width: 100%;
        position: relative;
        text-align: left;
        margin-bottom: 0;
        vertical-align: middle;
        touch-action: manipulation;
        background-image: none;
        /* border: 1px solid transparent; */
        white-space: nowrap;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 2;
        border-radius: 1px;
        user-select: none;
        margin-top: 0px;
        margin-left: 0;
        border: none;
    }

    .time-box {
        float: left;
    }

    .choose_delivery .checkout-actions-container .checkout-card-actions .RetailerServiceOptions .RetailerServiceOptionsBody .ic-panel .p-a-sm .ic-btn-group-vertical .delivery-option-panel .display-name {
        width: 26%;
        display: inline-block;
        text-align: left;
        float: left;
        font-weight: 600;
    }

    .modal-close {
        padding: 10px;
        font-size: 35px;
        color: #fff;
    }

    .chooseBtn {
        padding: 1px 8px;
        font-size: 12px;
        line-height: 1.5;
        border-radius: 4px;
        text-transform: uppercase;
        color: var(--theme-color);
        background-color: #fff;
        display: inline-block;
        margin-bottom: 0;
        font-weight: 600;
        text-align: center;
        vertical-align: middle;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid var(--theme-color);
        white-space: nowrap;
        -webkit-font-smoothing: antialiased;
        user-select: none;
        margin-top: 5px;
    }
</style>
