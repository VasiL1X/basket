<template>
    <div class="checkoutPage">
        <div class="check_out_outer">
            <div class="checkout_logo">
                <router-link :to="{ name: 'home' }" class="col-1">
                    <img src="/images/logo-normal.png"
                         alt="Basket" style="width:140px;">
                </router-link>
            </div>
        </div>
        <section class="check_out_info">
            <div class="container">
                <center>
                    <h2 style="margin:15px 0px 25px 0px;font-size:20px;">
                        <b>Checkout</b>
                    </h2>
                </center>
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-12 common_check_out_basket">
                        <div class="cart_left_info">
                            <!--Address block-->
                            <div class="top_cart_info_sec shown_add  show_elem" v-if="!deliveryAddressSection"
                                 @click="openDeliveryAddress()">
                                <div class="checkout-selected_address"
                                     style="background-image: linear-gradient(270deg, rgba(255, 255, 255, 0) 33%, rgb(255, 255, 255)), url(https://dxa2xwubq89uv.cloudfront.net/v4/instacart.i6hd8pi8/pin-s+43B02A(-77…token=pk.eyJ1IjoiaW5zdGFjYXJ0IiwiYSI6ImZFMGJsVncifQ.a8WhVVE-IBJlcgJtr1QNOA);">
                                    <div class="row">
                                        <div class="col-sm-10 detail">

                                            <div class="icon action-icon">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </div>

                                            <div class="title">
                                                Delivers to
                                            </div>
                                            <div class="inspectlet-sensitive">
										<span  v-if="checkoutDetails.user_selected_address" class="user_select_add"
                                              style="background-color: rgba(255, 255, 255, 0.4);">
                                          {{checkoutDetails.user_selected_address.address}}                                                                                                                                                                                                                                                                   Amman
                                        </span>
                                            </div>
                                        </div>
                                        <div class="action col-sm-2"><a class="change_delivery_address"><i
                                            class="fa fa-angle-down" aria-hidden="true"></i></a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="top_cart_info_sec chose_add show_elem" style="display: block;"
                                 v-if="deliveryAddressSection">
                                <div class="checkout-card-title">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <div class="title">Delivery Address</div>
                                </div>
                                <div class="find_location_se_common">
                                    <div class="find_location_se">
                                        <ul>
                                            <li class="cmnAddli address_li15634"
                                                v-bind:class="{ active_address: address.address_id == selectedAddressId}"
                                                v-for="address in addressList" @click="changeAddress(address.address_id)">
                                                <div class="row">
                                                    <div class="col-md-11 col-sm-11 col-xs-10">
                                                        <span class="city_id15634 hide_elem">  Amman  </span>
                                                        <p>
                                                            <input type="radio" class="address_chkbox_15634" value=""
                                                                   name="all_address_chkbox"
                                                                   data-radium="true"
                                                                   :checked="address.address_id === selectedAddressId"
                                                                   @change="changeAddress(address.address_id)"
                                                                   style="margin:0px 10px 0 0; cursor: pointer;vertical-align: middle;">
                                                            {{address.address}}

                                                        </p>
                                                        <button v-show="address.address_id === selectedAddressId" class="btn btn-primary btn-block btn-md btn-continue"
                                                                type="button" @click="selectChangedAddress(address)">Choose Address
                                                        </button>
                                                    </div>
                                                    <div class="col-md-1 col-sm-1 col-xs-2">
                                                        <a href="javascript:void(0)"
                                                           data-toggle="modal"
                                                           class="right_edit edit_address"
                                                           @click="openEditddress(address)"

                                                           data-target=".left_edit_address"

                                                        >
                                                            <div class="left_add_icon_inf"
                                                                 data-department_building="">
                                                                <i class="fas fa-edit"></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="new_addres_chak">
                                        <button data-toggle="modal"
                                                class="btn btn-info add_new_address"
                                                type="button"
                                                @click="openAddAddress()"
                                                data-target=".left_add_address"
                                        >
                                            Add New Address
                                        </button>
                                    </div>
                                    <div class="new_addres_chak_left">
                                        <span class="phone_no">Phone Number</span>
                                        <span class="phone_no_right">{{userData.mobile}}</span>
                                        <a style="display: none;" class="right_edit">edit</a>

                                    </div>
                                </div>
                            </div>
                            <!--End Address Block-->
                            <!--Start Delivery time-->
                            <div class="top_cart_info_sec shown_delivery   show_elem" v-if="!deliveryTimesSection"
                                 @click="openDeliveryTimes()">
                                <div class="common_pay_cart">
                                    <ul>
                                        <li>
                                            <div class="col-md-12 pl-0">
                                                <div class="row">
                                                    <div class="col-sm-10 detail">
                                                        <div class="icon">
                                                            <i class="far fa-clock"></i>
                                                        </div>
                                                        <div class="title">Delivery time</div>
                                                        <div class="outlet_name_time" v-for="(checkoutDetail, index) in checkoutDetails.cart_list">
                                                            <span class="sh_outlet_name">{{checkoutDetail.outlet_name}}</span>
                                                            <span class="sh_outlet_time">{{dateChange(checkoutDetail.delivery_date)}} {{checkoutDetail.delivery_time}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="action col-sm-2 pr-0"
                                                         style="text-align: right; vertical-align: middle; cursor: pointer;">
                                                        <a class="cursor-pointer delivery_slot_change">
                                                            <i class="icon-slack fa fa-angle-down"
                                                               aria-hidden="true"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="top_cart_info_sec choose_delivery show_elem" v-if="deliveryTimesSection">
                                <div class="checkout-actions-container">
                                    <div class="checkout-card-title">
                                        <i class="far fa-clock"></i>
                                        <div class="title">Choose Delivery Times</div>
                                    </div>
                                    <div class="checkout-card-actions clearfix">
                                        <div>
                                            <div :id="'update_outlet_slot'+outletDeliverySlot.outlet_id" v-for="(outletDeliverySlot, outletIndex) in outletDeliverySlots" >
                                                <div  class="RetailerServiceOptions">
                                                    <div class="p-y-md media">
                                                        <div class="media-left">
                                                            <img class="img-circle media-object"
                                                             :src="outletDeliverySlot.vendor_logo"
                                                                 @error="errorSrc"
                                                             style="width: 50px; height: 50px; box-shadow: rgba(0, 0, 0, 0.15) 0px 0px 0px 1px inset; max-width: 50px;">
                                                        </div>
                                                        <div class="media-body p-l-sm">
                                                            <div class="title-wrapper clearfix">
                                                                <span class="title">{{outletDeliverySlot.outlet_name}}</span>
                                                            </div>
                                                            <span class="subtitle inspectlet-sensitive pl-0">
                                                                <span class="slot_time67" v-for="(checkoutDetail, index) in checkoutDetails.cart_list" v-if="checkoutDetail.outlet_id === outletDeliverySlot.outlet_id">
                                                                    {{dateChange(checkoutDetail.delivery_date)}} {{checkoutDetail.delivery_time}}
                                                                </span> - Delivery to: 																																																																																						<br>
																<span class="slot_address" v-if="checkoutDetails.user_selected_address">{{checkoutDetails.user_selected_address.address}} </span>
															</span>
                                                        </div>
                                                    </div>
<!--                                                    <div class="m-b-sm checkout-promotion cursor-pointer"
                                                         title="Head back to the store for more items"
                                                         style="margin-top: -10px;">
                                                        <span class="text-green"></span>
                                                    </div>-->
                                                    <div class="RetailerServiceOptionsBody show_elem"  :id="'show-time-slot'+outletDeliverySlot.outlet_id"
                                                         style="max-height: 900px;">
                                                        <div class="ic-panel">
                                                            <ul class="ic-panel-tabs nav nav-tabs" role="tablist">
                                                                <li class="ic-panel-tab"
                                                                    role="presentation"
                                                                    v-bind:class="{ active: (slot.day == selectedDay[outletDeliverySlot.outlet_id]) || (checkoutDetails.cart_list[outletIndex].delivery_date == slot.week_date  && checkoutDetails.cart_list[outletIndex].outlet_id == outletDeliverySlot.outlet_id && !selectedDay[outletDeliverySlot.outlet_id])}"
                                                                    @click="selectDay(slot.day, outletDeliverySlot.outlet_id)"
                                                                    v-for="(slot, index) in outletDeliverySlot.delivery_slot">
                                                                    <a data-bypass="tabrue" href="#Sunday67" role="tab"
                                                                       data-toggle="tab">
                                                                        <div class="day">
                                                                            <strong  v-if="index == 0" style="font-size: 14px;">
                                                                                Today
                                                                            </strong>
                                                                            <strong  v-else-if="index == 1" style="font-size: 14px;">
                                                                                Tomorrow
                                                                            </strong>
                                                                            <strong  v-else style="font-size: 14px;">
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
                                                                    v-if="(slot.day == selectedDay[outletDeliverySlot.outlet_id]) || (checkoutDetails.cart_list[outletIndex].delivery_date == slot.week_date  && checkoutDetails.cart_list[outletIndex].outlet_id == outletDeliverySlot.outlet_id && !selectedDay[outletDeliverySlot.outlet_id])"
                                                                    v-for="(slot, index) in outletDeliverySlot.delivery_slot">
                                                                    <div role="tabpanel" class="tab-pane active" v-if="index < seeSlotCount" v-for="(times, index) in slot.time">
                                                                        <div class="ic-btn delivery-option-panel text-left ic-btn-white" v-if="times.available == 1"
                                                                            v-bind:class="{ active_time_slot: times.id == checkoutDetails.cart_list[outletIndex].delivery_slot_time_id }"
                                                                            @click="updateoutletDeliverySlots(times.delivery_date, times.delivery_time,times.id,times.delivery_charge, outletDeliverySlot.outlet_id)">
                                                                            <div class="time-box">
                                                                                <input type="radio"
                                                                                       class="timeslot_chkbox_16569"
                                                                                       :checked="times.selected_slot ==1"
                                                                                       style="margin:0px 10px 0 0; cursor: pointer;vertical-align: middle;"
                                                                                >
                                                                            </div>
                                                                            <span class="display-name"
                                                                                  v-if="times.label">{{times.label}}  </span>
                                                                            <span class="display-name" v-else>{{times.delivery_time}} </span>

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
                            <!--End Delivery time-->
                            <!--Start Payment-->
                            <div class="top_cart_info_sec shown_payment show_elem" v-if="!paymentSection"
                                 @click="openPayment()">
                                <div class="common_pay_cart">
                                    <ul>
                                        <li>
                                            <div class="row">
                                                <div class="col-sm-10 col-xs-10">
                                                    <div class="icon">
                                                        <i class="far fa-newspaper"></i>
                                                    </div>
                                                    <div class="title">Payment</div>
                                                    <p class="payment_method_type"v-if="checkoutDetails.user_selected_payment_method">{{checkoutDetails.user_selected_payment_method.name}}</p>
                                                </div>
                                                <div class="col-sm-2 action payment_change show_elem"
                                                     style="text-align: right; vertical-align: middle; cursor: pointer;">
                                                    <a class="cursor-pointer">
                                                        <i class="icon-slack fa fa-angle-down" aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="top_cart_info_sec choose_payment show_elem" v-if="paymentSection">
                                <div class="checkout-actions-container" style="overflow: visible; display: block;">
                                    <div class="checkout-card-title">
                                        <i class="far fa-newspaper"></i>
                                        <div class="title">Payment</div>
                                    </div>
                                    <div class="checkout-card-actions clearfix checkout-payment-actions">
                                        <div>
                                            <div>
                                                <div class="ic-btn-group-vertical ic-btn-block">

                                                    <div class="ic-btn get-type text-left test_0
                                                      ic-btn-white payment_0 ic-btn-white-selected"
                                                         tabindex="0"
                                                         role="button"
                                                         data-type="Cash On Delivery"
                                                         v-for="(paymentMethod,index) in paymentMethods"
                                                         @click="updateUserSelectedMethod(paymentMethod.payment_id,paymentMethod.card_id)"
                                                    >
                                                        <!--payment_id-->
                                                        <span>
                                                                  <input type="radio" class="payment_all_0"
                                                                         name="payment_all" value="1" data-radium="true"
                                                                         :checked="paymentMethod.payment_id == checkoutDetails.user_selected_payment.payment_gateway_id"
                                                                         style="margin:0px 10px 0 0; cursor: pointer;vertical-align: middle;">
                                                                     {{paymentMethod.name}}
                                                                  <span class="card-number-span0">{{paymentMethod.card_number}}</span>
                                                            </span>
                                                    </div>
                                                    <button style="margin-bottom: 20px;"
                                                            class="btn btn-primary btn-block btn-md btn-pay choose_payment_last modal-cvc-open"
                                                            @click="updateDeliveryPaymentGateway()"
                                                    >
                                                        Choose Payment
                                                    </button>
                                                    <a style="cursor: pointer;font-weight: 600;"
                                                       class="choose_payment_last add-new-card"
                                                       data-toggle="modal" data-target="#addNewCard">
                                                        Add Credit Card
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Payment-->
                            <div class="user-delivery_instruction">
                                <div class="form-group">

                                    <div class="row">
                                        <div class="col-lg-9">
                                           <textarea name="delivery_instructions"
                                                     id="delivery_instructions"
                                                     class="form-control"
                                                     cols="10"
                                                     rows="2"
                                                     placeholder="Enter your Instruction"
                                                     v-model="instruction"
                                                     v-validate="'required|max:50'"
                                           ></textarea>
                                            <span class="error-message" v-if="submitted && errors.has('delivery_instructions')">{{errors.first('delivery_instructions')}}</span>
                                        </div>
                                        <div class="col-lg-3 mt-2">
                                            <button type="button" class="btn btn-default"
                                                    :disabled="saveDisabled"
                                                    @click="updateDeliveryInstruction()">Save
                                                Instruction
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="top_cart_info_sec done_sections_but checkout-bottom-place-order done-box">
                                <div class="row">
                                    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 enjoy-text">
                                        <span class="text-muted" style="margin-left:64px;font-size: 16px; color: #333;"><strong>Done? </strong> Complete your order and enjoy !</span>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 button-container">
                                        <button type="button"
                                                style="background-color: #ccc;"
                                                v-if="checkoutDetails.overall_delivery_total == 0 "
                                                class="btn place_order_btn  btn-default"
                                        >Place Order
                                        </button>

                                        <button type="button"
                                                v-else
                                                class="btn place_order_btn btn-primary"
                                                @click="userCheckout()"
                                        >Place Order
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="top_cart_info_sec cart_right_info_common">
                            <div class="cart_right_info">
                                <div class="top_cat_update">
                                    <button type="button"
                                            v-if="checkoutDetails.overall_delivery_total == 0 "
                                            class="btn place_order_btn  btn-default"
                                    >Place Order
                                    </button>

                                    <button type="button"
                                            v-else
                                            class="btn place_order_btn btn-primary"
                                            @click="userCheckout()"
                                    >Place Order
                                    </button>
                                </div>
                            </div>
                            <div class="sub_total_info">
                                <span class="for_online_pay_hidden_details hide_elem">
                                    <span class="cart_id" data-cart_id="70297"></span>
                                    <span class="currency" data-cur="JD"></span>
                                    <span class="amount" data-amt="5.55"></span>
                                </span>
                                <table>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <p>Subtotal</p>
                                        </td>
                                        <td>
                                            <p> JD {{checkoutDetails.overall_subtotal}}</p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <p>Delivery Charges</p>
                                        </td>

                                        <td class="currency">
                                            JD
                                            <span
                                                class="delivery_chrg">{{checkoutDetails.overall_delivery_total}}</span>
                                        </td>
                                    </tr>
                                    <tr v-if="checkoutDetails.overall_service_fee > 0">
                                        <td>
                                            <p>Service fee</p>
                                        </td>

                                        <td class="currency">
                                            JD
                                            <span class="delivery_chrg">{{checkoutDetails.overall_service_fee}}</span>
                                        </td>
                                    </tr>

                                    <tr class="tr_free_delivery_discount"
                                        v-if="checkoutDetails.overall_free_delivery_discount > 0">
                                        <td>
                                            <p>Delivery Discount</p>
                                        </td>
                                        <td>
                                            JD
                                            <span class="free_delivery_discount"> {{checkoutDetails.overall_free_delivery_discount}}</span>
                                        </td>
                                    </tr>
                                    <tr class="tr_overall_promo_code_amount"
                                        v-if="checkoutDetails.overall_promo_delivery_discount > 0">
                                        <td>
                                            <p>Promo Code Discount</p>
                                        </td>
                                        <td>
                                            JD
                                            <span class="overall_promo_code_amount">{{ checkoutDetails.overall_promo_delivery_discount}}</span>
                                        </td>
                                    </tr>
                                    <tr class="divider_border"></tr>
                                    <tr>
                                        <td><b>Total <i class="glyph-icon flaticon-round-info-button"></i></b></td>
                                        <td class="total"><b> JD
                                            {{checkoutDetails.overall_total}}
                                        </b></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="promo_code_apply" v-if="checkoutDetails.promo_code_details">
                                <span>PROMO CODE APPLIED</span>
                                <span>
                                    <i class="far fa-trash-alt delete-promo-Icon" @click="deletePromoCod()"></i>
                                </span>

                                <br>
                                <span>{{checkoutDetails.promo_code_details.description}}</span>
                            </div>
                            <div class="promocodes" v-else>
                                <a href="javascript:void(0)"
                                   id="promocode_popup"
                                   data-toggle="modal"
                                   data-target="#modalPromo"
                                   @click="openPromoCod()"
                                >Add
                                    promo code</a>
                            </div>
                        </div>
                        <div class="bottom p-a-lg card-warning" id="disclaimer-info">
                            <i class="glyph-icon flaticon-business"></i>
                            <span class="text disclaimer">

                            <span class="p-r">By placing an order on Basket.jo, you agree to be abide by our
                                <router-link :to="{ name: 'terms.conditions' }"  data-bypass="true"
                                             target="_blank"><span>Terms &amp; Conditions Policy</span>
                                </router-link>,
                                <router-link :to="{ name: 'privacy.policy'}"   data-bypass="true" target="_blank">
                                    Privacy Policy
                                </router-link>
                                and all other Policies In the event you are choosing to pay by Credit Card , your card will be temporarily Pre-Authorized for
                            <span>JD<span class="pre_authorization_amount">10</span></span>
                            . This amount will be captured at the time of checkout.Your Credit card statement will reflect the final order total after order completion.</span>
                            <router-link :to="{ name: 'help.pricing' }" data-bypass="true" target="_blank">
                                Learn More
                            </router-link>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <green-loader v-show="showLoader"></green-loader>
        </section>
        <div v-if="addPromoCod">
            <AddPromoCodeComponent></AddPromoCodeComponent>
        </div>
        <AddNewCardComponent></AddNewCardComponent>
        <div v-if="addAddress">
            <AddAddressComponent></AddAddressComponent>
        </div>
        <div>
            <EditAddressComponent></EditAddressComponent>
        </div>
        <CVVModalComponent></CVVModalComponent>
    </div>
</template>

<script>
    import AddPromoCodeComponent from '../components/AddPromoCodeModal'
    import AddNewCardComponent from '../components/AddNewCardModal'
    import AddAddressComponent from '../components/AddAddressModal'
    import EditAddressComponent from '../components/EditAddressModal'
    import CVVModalComponent from '../components/CVVModal'
    import {helpers} from '../mixins/helpers'
    import GreenLoader from "../components/GreenLoader";
    import Cookies from 'js-cookie';

    export default {
        name: "checkout",
        middleware: 'auth',
        components: {
            GreenLoader,
            AddPromoCodeComponent,
            AddNewCardComponent,
            AddAddressComponent,
            EditAddressComponent,
            CVVModalComponent
        },
        mixins: [helpers],
        data() {
            return {
                submitted:false,
                countryId: 46,
                addAddress: false,
                editAddress: {},
                edit: false,
                addPromoCod: false,
                deliveryAddressSection: false,
                deliveryTimesSection: false,
                paymentSection: false,
                userData: {},
                addressList: [],
                outletDeliverySlots: [],
                paymentMethods: [],
                selectedAddressId: 0,
                selectedDay: [],
                selectedSlotId: '',
                seeSlotCount: 6,
                checkoutDetails: [],
                instruction: '',
                selectedSlot: [],
                cvv: '',
                cardId: '',
                outletInfo: '',
                outletName: '',
                selectedOutletId: '',
                cartListCount: 0,
                showLoader: false,
                counter: 0,
                saveDisabled: false,
                oldInstruction: '',
                dict : {
                    custom:{
                        delivery_instructions: {
                            required: 'Instruction can not be blank',
                            max: 'Instruction can not be more than 50 character',
                        }
                    }
                }
            };
        },
        methods: {
            errorSrc(event) {
                event.target.src = "/images/no_image.jpg"
            },
            selectDay(day, outletId) {
                this.selectedDay[outletId] = day;
                this.seeSlotCount = 6;
                this.selectedOutletId = outletId
                this.getOutletoutletDeliverySlots();
            },
            seeMoreSlots() {
                this.seeSlotCount = 16;
            },
            seeLessSlots() {
                this.seeSlotCount = 6;
            },
            openAddAddress() {
                this.addAddress = true
            },
            openPromoCod() {
                this.addPromoCod = true
            },
            openEditddress(address) {
                bus.$emit('left_edit_address', address);
                this.$bvModal.show('left_edit_address');
            },
            openDeliveryAddress() {
                this.deliveryAddressSection = true;
                this.deliveryTimesSection = false;
                this.paymentSection = false;
            },
            openDeliveryTimes() {
                this.deliveryAddressSection = false;
                this.deliveryTimesSection = true;
                this.paymentSection = false;
            },
            openPayment() {
                this.deliveryAddressSection = false;
                this.deliveryTimesSection = false;
                this.paymentSection = true;

            },

            getCheckoutDetails() {
                let _this = this;
                axios.post(apiDev + '/checkout-details', {
                    language: Cookies.get('languageId'),
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    country_id: _this.countryId,
                    city_id: _this.userData.city_id,
                    location_id: _this.userData.location_id
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.checkoutDetails = response.data.response;
                        _this.instruction = _this.checkoutDetails.delivery_instructions;
                        _this.addressList = response.data.response.address_list;
                        for (var i = 0; i < _this.addressList.length; i++) {
                            if (_this.addressList[i].is_selected == 1) {
                                _this.selectedAddressId = _this.addressList[i].address_id;
                            }
                        }
                        if (_this.checkoutDetails.overall_delivery_total == 0) {
                            _this.deliveryTimesSection = true
                        }
                        if (!_this.checkoutDetails.user_selected_payment.payment_gateway_id) {
                            _this.paymentSection = true
                        }


                    }
                }).catch(error => {

                })
            },

            updateAddressId(id) {
                let _this = this;
                axios.post(apiDev + '/update-delivery-address', {
                    language: Cookies.get('languageId'),
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    address_id: id,
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.getCheckoutDetails();
                        _this.deliveryAddressSection = false;
                        // this.$bvToast.toast(response.data.response.Message, {
                        //     title: 'Basket',
                        //     autoHideDelay: 5000,
                        //     toaster: 'b-toaster-bottom-left',
                        //     appendToast: true
                        // });

                    }
                }).catch(error => {

                })
            },

            getOutletoutletDeliverySlots() {
                let _this = this;
                axios.post(apiDev + '/cart-outlet-delivery-slot', {
                    language: Cookies.get('languageId'),
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    country_id: _this.countryId,
                    city_id: _this.userData.city_id
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.outletDeliverySlots = response.data.response.outlet_delivery_slot;
                    }
                }).catch(error => {

                })
            },

            changeWeekDate(weekDate){
                return  moment(weekDate, "DD-MM-YYYY").format('MMM D')
            },

            updateoutletDeliverySlots(deliveryDate, deliveryTime, outletDeliverySlotsTimeId, deliveryCharge, outlet_id) {
                let _this = this;
                this.cartListCount++
                axios.post(apiDev + '/update-delivery-slot', {
                    language: Cookies.get('languageId'),
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    outlet_id: outlet_id,
                    country_id: _this.countryId,
                    city_id: _this.userData.city_id,
                    delivery_date: deliveryDate,
                    delivery_time: deliveryTime,
                    delivery_slot_time_id: outletDeliverySlotsTimeId,
                }).then(response => {

                    if (response.data.response.httpCode == 200) {
                        _this.getOutletoutletDeliverySlots();
                        _this.getCheckoutDetails();
                        _this.checkoutDetails.overall_delivery_total = deliveryCharge;
                        $("#show-time-slot"+outlet_id).hide()


                        if(this.checkoutDetails.cart_list.length == this.cartListCount){
                            _this.deliveryTimesSection = false;
                            this.cartListCount = 0
                        }

                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        });

                    }
                    if (response.data.response.httpCode == 400) {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        })
                    }
                }).catch(error => {

                })
            },

            deletePromoCod() {
                let _this = this;
                axios.post(apiDev + '/remove-promo-code-from-cart', {
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,

                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        this.getCheckoutDetails();
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        });
                    }
                    if (response.data.response.httpCode == 400) {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        })
                    }
                }).catch(error => {

                })
            },
            updateDeliveryInstruction() {
                let  _this = this;
                _this.submitted = true;
                this.$validator.validate().then(valid=>{
                    if (valid){
                        this.saveDisabled = true;
                        this.oldInstruction = this.instruction;
                        axios.post(apiDev + '/update-delivery-instruction', {
                            user_id: _this.userData.user_id,
                            token: _this.userData.token,
                            delivery_instructions: _this.instruction
                        }).then(response => {
                            if (response.data.response.httpCode === 200) {
                                this.saveDisabled = false;
                                this.$bvToast.toast(response.data.response.Message, {
                                    title: 'Basket',
                                    autoHideDelay: 5000,
                                    toaster: 'b-toaster-bottom-left',
                                    appendToast: true
                                })

                            }
                            if (response.data.response.httpCode === 400) {
                                // this.$bvToast.toast(response.data.response.Message, {
                                //     title: 'Basket',
                                //     autoHideDelay: 5000,
                                //     toaster: 'b-toaster-bottom-left',
                                //     appendToast: true
                                // })
                            }
                            // this.instruction = '';
                            this.counter = 0;
                        }).catch(error => {

                        })
                    }else{
                        if (this.counter < 1){
                            // this.$bvToast.toast("Instruction can not be empty and need to change", {
                            //     title: 'Basket',
                            //     autoHideDelay: 5000,
                            //     toaster: 'b-toaster-bottom-left',
                            //     appendToast: true
                            // });
                        }
                        ++this.counter;

                    }
                });
            },

            getPaymentMethodList() {
                let _this = this;
                axios.post(apiDev + '/payment-method-list', {
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    page_id: 3
                }).then(response => {

                    if (response.data.response.httpCode == 200) {
                        _this.paymentMethods = response.data.response.payment_method_list
                        for (var i = 0; i < response.data.response.payment_method_list.length; i++) {
                            if (response.data.response.payment_method_list[i].payment_id == 24) {
                                _this.cardId = response.data.response.payment_method_list[i].card_id
                            }
                        }
                    }
                }).catch(error => {

                })
            },

            updateUserSelectedMethod(paymentId, cartId) {
                let _this = this;
                axios.post(apiDev + '/update-user-selected-method', {
                    language: Cookies.get('languageId'),
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    card_id: cartId ? cartId : 0,
                    payment_id: paymentId,
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.getPaymentMethodList();
                        _this.checkoutDetails.user_selected_payment.payment_gateway_id = paymentId;
                    }

                    if (response.data.response.httpCode == 400) {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        })
                    }
                }).catch(error => {

                })
            },

            updateDeliveryPaymentGateway() {
                let _this = this;

                if(_this.checkoutDetails.user_selected_payment.payment_gateway_id == 24 && !this.cvv){
                    $('#modalCvc').modal('show');
                    return false
                }

                axios.post(apiDev + '/update-delivery-payment-gateway', {
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    payment_gateway_id: _this.checkoutDetails.user_selected_payment.payment_gateway_id
                }).then(response => {

                    if (response.data.response.httpCode == 200) {
                        _this.getPaymentMethodList();
                        this.$bvToast.toast('Payment method update successfully', {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        });
                        this.getCheckoutDetails()
                        _this.paymentSection = false;

                    }

                    if (response.data.response.httpCode == 400) {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        })
                    }
                }).catch(error => {

                })
            },

            userCheckout() {
                axios.post(apiDev + '/my-order', {
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    language: this.language,
                    offset: 0,
                    count: 1,
                }).then(response => {
                    this.$ga.event('Place an order' , 'place an order' , 'order total' , this.checkoutDetails.overall_delivery_total);
                    if (response.data.response.total_order_count){
                        this.$ga.event('Subsequent Purchases' , 'place an order' , 'order total', this.checkoutDetails.overall_delivery_total);
                    }else {
                        this.$ga.event('First Purchase' , 'place an order' , 'order total' , this.checkoutDetails.overall_delivery_total);
                    }
                });
                if (this.checkoutDetails.user_selected_payment.payment_gateway_id == 18) {
                    this.offlinePayment();
                }
                if (this.checkoutDetails.user_selected_payment.payment_gateway_id == 24) {
                    this.onlinePayment();
                }
            },

            offlinePayment() {
                let _this = this;
                axios.post(apiDev + '/offline-payment', {
                    language: Cookies.get('languageId'),
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    country_id: _this.countryId,
                    city_id: _this.userData.city_id,
                    order_type: 1,
                    currency_code: 'JD',
                    payment_gateway_id: _this.checkoutDetails.user_selected_payment.payment_gateway_id,
                    delivery_charge: _this.checkoutDetails.overall_delivery_total,
                    user_type: 1,
                }).then(response => {

                    if (response.data.response.httpCode == 200) {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        });

                        this.$router.push({path: '/store/orders/' + response.data.response.order_id })
                    }
                    if (response.data.response.httpCode == 400) {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        });
                    }
                }).catch(error => {

                })
            },

            onlinePayment() {
                if (this.cvv) {
                    let _this = this;
                    this.showLoader = true;
                    axios.post(apiDev + '/web-online-payfort-payment', {
                        user_id: _this.userData.user_id,
                        token: _this.userData.token,
                        country_id: _this.countryId,
                        city_id: _this.userData.city_id,
                        location_id: _this.userData.location_id,
                        user_type: 1,
                        order_type: 1,
                        currency_code: 'JOD',
                        payment_gateway_id: _this.checkoutDetails.user_selected_payment.payment_gateway_id,
                        card_id: _this.cardId,
                        user_ip: '127.0.0.1',
                        security_code: this.cvv,
                    }).then(response => {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        });

                    }).catch(error => {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        });
                    })
                } else {
                    $('#modalCvc').modal('show');
                }

            },

            getOutletInfo() {
                let _this = this;
                axios.post(apiDev + '/store-department-list-web', {
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    address_id: _this.address_id,
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.outletInfo = response.data.response.outlet_details;
                        _this.outletName = response.data.response.outlet_details.outlet_id
                    }
                }).catch(error => {

                })
            },


            dateChange: function (date) {
                if (date){
                    return moment(date, 'DD-MM-YYYY').format('ddd, MMM DD');
                }else {
                    return 'Delivery Unavailable';
                }
            },

            changeAddress(id){
                this.selectedAddressId = id;
            },

            selectChangedAddress(address){
                this.deliveryAddressSection = false;
                axios.post(apiDev + '/update-delivery-address', {
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    address_id: address.address_id,
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        });
                    }
                }).catch(error => {
                    this.$bvToast.toast(response.data.response.Message, {
                        title: 'Basket',
                        autoHideDelay: 5000,
                        toaster: 'b-toaster-bottom-left',
                        appendToast: true
                    });
                })
            }

        },
        created() {
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.getCheckoutDetails();
            this.getOutletoutletDeliverySlots();
            this.getPaymentMethodList();
            this.getOutletInfo();
            this.$validator.localize('en', this.dict);


            bus.$on('addPromoCodeFromCart', (data) => {
                if (data) {
                    this.getCheckoutDetails()
                }
            });
            bus.$on('addCvv', (data) => {
                if (data) {
                    this.cvv = data;
                    this.updateDeliveryPaymentGateway()
                }
            });
        },


        mounted() {
            this.$ga.event('pageview', 'checkout');
        }




    }
</script>

<style scoped>
    .checkoutPage{
        overflow-y: scroll;
        height: 100vh;
        background-color: #f7f7f7
    }
    .checkout-selected_address {
        display: table;
        background-size: 70%, 70%;
        background-repeat: repeat, no-repeat;
        background-position: right center, right center;
        width: 102%;
        cursor: pointer;
        padding: 20px 23px;
    }

    .checkout-selected_address .title {
        display: table-cell;
        font-size: 18px;
        vertical-align: middle;
        font-weight: 600;
    }

    .checkout-selected_address .action a {
        padding: 5px 12px;
        font-size: 22px;
        line-height: 22px;
        font-weight: normal;
        cursor: pointer;
        border-radius: 4px;
        color: #337ab7;
        background-color: #fff;
        border-color: #E5EDEC;
        margin-bottom: 0;
        text-align: center;
        vertical-align: middle;
        touch-action: manipulation;
        background-image: none;
        border: 1px solid transparent;
        white-space: nowrap;
        -webkit-font-smoothing: antialiased;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .checkout-selected_address .action {
        text-align: right;
        display: table-cell;
        vertical-align: middle;
    }

    .action-icon {
        width: 44px;
        display: table-cell;
        vertical-align: middle;
        color: rgb(189, 189, 189);
    }

    .icon-slack {
        padding: 5px 2px;
        font-size: 22px;
        line-height: 22px;
        cursor: pointer;
        border-radius: 4px;
        background-color: #fff;
        margin-bottom: 0;
        text-align: center;
        vertical-align: middle;
        touch-action: manipulation;
        background-image: none;
        white-space: nowrap;
        -webkit-font-smoothing: antialiased;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        color: var(--theme-color) !important;
    }

    .new_addres_chak .btn-info:hover {
        text-decoration: underline;
    }

    .btn-info:hover {
        background-color: white;
        color: rgb(67, 176, 42);
    }

    .choose_payment .checkout-card-actions {
        padding: 0px 30px 20px;
    }

    .choose_payment .checkout-card-actions .ic-btn-group-vertical .ic-btn-white-selected {
        display: block;
        float: none;
        width: 100%;
        max-width: 100%;
        position: relative;
        border: 1px solid #ddd;
        background-color: #F3F8F7;
        z-index: 2;
        margin-bottom: 0;
        font-weight: 600;
        vertical-align: middle;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        white-space: nowrap;
        -webkit-font-smoothing: antialiased;
        padding: 6px 14px;
        font-size: 14px;
        line-height: 1.42857;
        border-radius: 4px;
        user-select: none;
    }

    .add-new-card {
        color: rgb(67, 176, 42);
    }

    .promocodes a {
        font-size: 13px;
        color: rgb(80, 180, 50) !important;
        text-decoration: none;
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

    .ic-btn.delivery-option-panel:hover {
        background-color: #f0efec;
        cursor: pointer;
    }

    .more-time-box a {
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

    .active_time_slot {
        color: #000 !important;
        cursor: pointer !important;
        border: 1px solid #00adaf !important;
        background: rgb(242, 251, 255) !important;
        border-radius: 4px !important;
    }

    .nav-tabs {
        border-bottom: none;
    }

    .check_out_info input[type=checkbox], .check_out_info input[type=radio], .check_out_info input[type=checkbox], .check_out_info input[type=radio] {
        line-height: 1.3em;
        width: 1.3em;
        height: 1.3em;
        margin: 0 0 0 -25px;
        padding: 10px;
        background-size: cover;
        outline: none;
    }


    .top_cart_info_sec {
        padding-bottom: 40px;
    }

    .delete-promo-Icon {
        position: relative;
        right: -114px;
        top: 0;
        font-size: 12px;
        color: #f00;
        cursor: pointer;
    }
    #delivery_instructions{
        height: 100%;
        max-height: 75px;
    }
</style>
