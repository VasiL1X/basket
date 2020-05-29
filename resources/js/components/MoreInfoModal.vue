<template>
    <div>
        <b-modal id="more_info_modal" size="lg" title="Overflowing Content" hide-header hide-footer>
            <div class="module-renderer" style="padding: 0px;">
                <b-button-close @click="$bvModal.hide('more_info_modal')" ></b-button-close>
                <div
                    class="rmq-e9fd10a8 rmq-94de0125 rmq-eeb4761a rmq-e60be48f rmq-799cda40 rmq-4105abab rmq-5ce9ef95"
                    data-radium="true">
                    <div class="rmq-22530f0f rmq-8bb68dbe rmq-bd8d1a29 rmq-1d4d8c66 rmq-d67cb54d"
                         data-radium="true" style="max-width: 100%;">
                        <div class="module-wrapper module-wrapper"
                             style="padding-left: 0px; padding-right: 0px; border-bottom: 0px; padding-bottom: 0px;">
                            <div
                                style="display: flex; flex-direction: column; align-items: center; text-align: center; color: rgb(66, 66, 66);">

                                <img v-bind:src="outletInfo.outlet_logo" class="modal-img"
                                     style="width: 100px; height: 100px; border-radius: 50%; box-shadow: rgba(0, 0, 0, 0.15) 0px 0px 0px 1px;">

                                <h2 style="font-size: 28px;">{{outletInfo.outlet_name}}</h2>
                                <ul style="font-weight: 700; color: rgb(117, 117, 117); margin-left: 0px;">
                                    <li style="display: inline;">{{outletInfo.outlet_address}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="module-wrapper module-wrapper"
                             style="padding-left: 0px; padding-right: 0px;">
                            <div>
                                <hr style="margin: 0px;">
                                <div aria-label="retailer info modal-more-info" class="react-tabs"
                                     data-tabs="true">
                                    <div
                                        style="border-bottom: 1px solid rgb(224, 224, 224); overflow: auto;">
                                        <ul aria-label="retailer info modal-more-info"
                                            class="react-tabs__tab-list" role="tablist"
                                            style="margin: 0px; display: flex; justify-content: center;">
                                            <li class="tab-model tab-modal-more-info-info "
                                                attr="info"
                                                role="tab" id="react-tabs-0"

                                                v-bind:class="{ tabModalMoreInfoLink: firstPage }"
                                                aria-disabled="false"
                                                aria-controls="react-tabs-1"
                                                style="list-style: none; text-align: center; background: transparent; cursor: pointer;     color: rgb(147, 146, 145); font-size: 16px; font-weight: 600; transition: all 0.25s ease-in-out 0s; display: block;  padding: 16px 7px;"
                                                @click="goToFirstPage()"
                                                tabindex="0">Info
                                            </li>
                                            <li class="tab-model tab-modal-more-info-delivery"
                                                attr="delivery" role="tab"
                                                v-bind:class="{ tabModalMoreInfoLink: !firstPage }"
                                                id="react-tabs-2" aria-selected="false"
                                                aria-disabled="false"
                                                href="#uploadTab"
                                                @click="goToSecondPage()"
                                                aria-controls="react-tabs-3"
                                                style="list-style: none; text-align: center;
                                                                                background: transparent; cursor: pointer;
                                                                                color: rgb(147, 146, 145); font-size: 16px; font-weight: 600; transition: all 0.25s ease-in-out 0s; display: block; border-bottom: 4px solid transparent; padding: 16px 7px;">
                                                Delivery times
                                            </li>
                                        </ul>
                                    </div>

                                    <div
                                        class="react-tabs__tab-panel react-tabs__tab-panel--selected first-tab"
                                        v-if="firstPage"
                                        role="tabpanel" id="react-tabs-1"
                                        aria-labelledby="react-tabs-0"
                                        style="display: block; background-color: rgb(247, 247, 247);">
                                        <div class="module-renderer">
                                            <div
                                                class="rmq-e9fd10a8 rmq-94de0125 rmq-eeb4761a rmq-3e10bf34 rmq-2295bbb9 rmq-108b114 rmq-5ce9ef95"
                                                data-radium="true">
                                                <div
                                                    class="rmq-22530f0f rmq-32e4a8df rmq-bd8d1a29 rmq-1d4d8c66 rmq-d67cb54d"
                                                    data-radium="true"
                                                    style="max-width: 100%;">
                                                    <div class="module-wrapper module-wrapper"
                                                         style="background-color: rgb(255, 255, 255); margin: 8px auto; border-bottom: 1px solid rgb(224, 224, 224); border-top: 1px solid rgb(224, 224, 224);">
                                                        <div>
                                                            <div>
                                                                <h3 style="text-transform: uppercase; color: rgb(117, 117, 117); font-weight: 700; letter-spacing: 0.6px; font-size: 14px;">
                                                                    Next delivery time</h3>
                                                                <button type="button"
                                                                        data-radium="true"
                                                                        style="touch-action: manipulation; cursor: pointer; border: none; border-radius: 4px; font-weight: 600; white-space: nowrap; user-select: none; -webkit-font-smoothing: antialiased; background-image: none; display: inline-flex; align-items: center; padding-left: 0px; padding-right: 16px; font-size: 16px; height: auto; background-color: transparent; color: rgb(67, 176, 42);">
                                                                    <span
                                                                        class="tab-model"
                                                                        @click="goToSecondPage()"
                                                                        attr="delivery">All delivery times
                                                                        <i class="fa fa-angle-right"
                                                                           style="margin-left: 3px; font-weight: bold;"
                                                                           aria-hidden="true"></i>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="module-wrapper module-wrapper"
                                                         style="background-color: rgb(255, 255, 255); margin: 0px auto 8px; border-bottom: 1px solid rgb(224, 224, 224); border-top: 1px solid rgb(224, 224, 224);">
                                                        <div>
                                                            <div style="display: flex;">
                                                                <div
                                                                    style="display: flex; align-items: center;">
                                                                    <i class="fa fa-info-circle exclamation-icon"
                                                                       aria-hidden="true"></i>
                                                                    <p>
                                                                                                                <span>
                                                                                                                    <span>
                                                                                                                        {{outletOpeningHours.outlet_margin_info}}
                                                                                                                    </span>
                                                                                                                </span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="module-wrapper module-wrapper"
                                                         style="background-color: rgb(255, 255, 255); margin: 0px auto 8px; border-bottom: 1px solid rgb(224, 224, 224); border-top: 1px solid rgb(224, 224, 224);">
                                                        <div>
                                                            <h3 style="font-weight: 600; font-size: 16px; padding-bottom: 10px; color: rgb(66, 66, 66); margin: auto;">
                                                                Hours</h3>
                                                            <ul>
                                                                <li style="display: flex; padding-bottom: 10px; margin-left: 0px;"
                                                                    v-for="store in outletOpeningHours.store_hours">
                                                                    <div style="flex-grow: 1;">
                                                                        {{store.day}}
                                                                    </div>
                                                                    <div>
                                                                        {{store.start_time}} -
                                                                        {{store.end_time}}
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="react-tabs__tab-panel react-tabs__tab-panel--selected second-tab"
                                        v-if="!firstPage"
                                        role="tabpanel" id="react-tabs-3"
                                        aria-labelledby="react-tabs-2"
                                        style=" background-color: rgb(247, 247, 247); ">
                                        <div class="module-renderer">
                                            <div
                                                class="rmq-e9fd10a8 rmq-94de0125 rmq-eeb4761a rmq-3e10bf34 rmq-2295bbb9 rmq-108b114 rmq-5ce9ef95"
                                                data-radium="true">
                                                <div
                                                    class="rmq-22530f0f rmq-32e4a8df rmq-bd8d1a29 rmq-1d4d8c66 rmq-d67cb54d div-modal-more-info-bar"
                                                    data-radium="true"
                                                    style="max-width: 100%;">
                                                    <div class="module-wrapper module-wrapper"
                                                         style="background-color: transparent; margin: 0px auto; border-bottom: none; border-top: none; padding-top: 16px; padding-bottom: 16px;">
                                                        <div style="display: flex; align-items: center;">

                                                            <i class="fa fa-info-circle exclamation-icon"
                                                               aria-hidden="true"></i>
                                                            <span>
                                                                                                <span>
                                                                                                   {{outletDeliveryInfo.outlet_delivery_info}}
                                                                                                </span>
                                                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="module-wrapper module-wrapper"
                                                         style="background-color: rgb(255, 255, 255); margin: 0px auto 8px; border-bottom: 1px solid rgb(224, 224, 224); border-top: 1px solid rgb(224, 224, 224);">
                                                        <div>

                                                            <div v-for="(delivery, index) in deliverySlot">

                                                                <div>
                                                                    <div tabindex="-1" class="delivery"
                                                                         v-if="index == 0">
                                                                        <div data-radium="true"
                                                                             style="font-size: 14px; font-weight: 600; line-height: 24px; color: rgb(66, 66, 66);">
                                                                            Today
                                                                        </div>
                                                                    </div>
                                                                    <div tabindex="-1" class="delivery"
                                                                         v-else>
                                                                        <div data-radium="true"
                                                                             style="font-size: 14px; font-weight: 600; line-height: 24px; color: rgb(66, 66, 66);">
                                                                            {{delivery.day}}
                                                                        </div>
                                                                    </div>

                                                                    <div tabindex="-1"
                                                                         v-bind:key="slot.id"
                                                                         class="delivery-"
                                                                         v-for="slot in delivery.slots">
                                                                        <div
                                                                            style="display: flex; justify-content: space-between; padding-top: 16px; padding-bottom: 16px;">
                                                                            <div data-radium="true"
                                                                                 style="font-size: 14px; font-weight: normal; line-height: 24px; color: rgb(66, 66, 66);">
                                                                                {{slot.delivery_time}}
                                                                            </div>
                                                                            <div style="display: flex;">
                                                                                <div>
                                                                                    <div data-radium="true"
                                                                                         style="font-size: 14px; font-weight: normal; line-height: 24px; color: rgb(66, 66, 66);">
                                                                                        JOD
                                                                                        {{slot.delivery_charge}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="button"
                                                                    class="more-button"
                                                                    data-radium="true"
                                                                    @click="seeMoreSlots()"
                                                                    style="touch-action: manipulation; cursor: pointer; border: none; border-radius: 4px; font-weight: 600; white-space: nowrap; user-select: none; -webkit-font-smoothing: antialiased; background-image: none; display: flex; align-items: center; padding-left: 16px; padding-right: 16px; font-size: 16px; height: 40px; background-color: transparent; color: rgb(95, 202, 68); width: 100%; justify-content: center;">
                                                                More times <i class="fa fa-angle-down"
                                                                              aria-hidden="true"
                                                                              style="margin-left: 3px; font-weight: bold;"></i>
                                                            </button>
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
            </div>
        </b-modal>
    </div>


</template>
<script>
    import Cookies from 'js-cookie';
    export default {
        name: "MoreInfoModal",
        props: {
            nextDelivery: Object,
        },
        data() {
            return {
                userData: [],
                outletInfo: [],
                outletOpeningHours: [],
                outletDeliveryInfo: [],
                language: Cookies.get('languageId'),
                countryId: 46,
                nextDeliverySlot: [],
                firstPage: true,
                numSlots: 1,
                deliverySlot: []
            };
        },
        methods: {
            seeMoreSlots() {
                if (this.numSlots < 7) {
                    var slot = this.outletDeliveryInfo.delivery_charges[this.numSlots];
                    this.deliverySlot.push(slot);
                    this.numSlots++
                }
            },
            goToSecondPage() {
                this.firstPage = false;
            },
            goToFirstPage() {
                this.firstPage = true;
            },
            getOutletDeliveryInfo() {
                let _this = this;
                bus.$emit('showLoader', 'show')
                axios.post(apiDev + '/customer/outlet_pricing_and_delivery_info', {
                    language: _this.language,
                    customer_id: _this.userData.user_id,
                    token: _this.userData.token,
                    country_id: _this.countryId,
                    city_id: 21,
                    outlet_id: _this.userData.outlet_id ? _this.userData.outlet_id : 67,
                }).then(response => {
                    if (response.status == 200) {
                        _this.outletInfo = response.data.data[0].outlet_info;
                        _this.outletOpeningHours = response.data.data[0].outlet_opening_hours;
                        _this.outletDeliveryInfo = response.data.data[0].outlet_delivery_info;
                        _this.deliverySlot.push(_this.outletDeliveryInfo.delivery_charges[0]);
                    }
                    bus.$emit('showLoader', 'hide')
                }).catch(error => {
                    bus.$emit('showLoader', 'hide')
                })
            },
            closeModal() {
                $("body").css("overflow", "");
                bus.$emit('moreInfo', true)
            },

        },
        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.getOutletDeliveryInfo();
            bus.$on('changeStoreAndCooke', (data) => {
                if (data) {
                    this.userData.outlet_id = data;
                    this.getOutletDeliveryInfo();

                }
            })
        },
    }
</script>

<style>
    .react-tabs__tab-panel{
        padding: 15px;
    }
    .module-wrapper.module-wrapper{
        padding: 1rem;
    }

    .exclamation-icon {
        margin-right: 5px;
        font-size: 21px !important;

    }

    .table-no-border td,
    .table-no-border th {
        border: 0;
    }

    .address-form input,
    .address-form input[type=text],
    .address-form textarea {
        width: 100%;
        max-width: 100%;
        box-sizing: border-box;
        margin: 0;
        transition: color .2s;
    }

    .address-form input[type=text],
    .address-form input[type=search] {
        padding: 0;
        height: 36px;
    }

    .address-form .address-form-type-controls input,
    .address-form .address-form-type-controls input[type=radio],
    .address-form .address-form-type-controls input[type=radio]:checked {
        background-image: none;
        visibility: hidden;
    }

    .address-form .address-form-type-controls input[type=radio] {
        display: none;
    }


    .QtyStepper button:disabled {
        color: gray;
        background: #ececec;
    }

    .shop-with-friends-main-modal-more-info .icModalRow {
        border: none;
    }

    .shop-with-friends-main-modal-more-info .icModalHeader {
        height: 160px;
        padding: 0;

        background-repeat: no-repeat;
        background-position: center 20px;
        background-color: #E6E9F0;
    }

    @media only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 1.3 / 1), only screen and (min-resolution: 125dpi), only screen and (min-resolution: 1.3dppx) {
        .shop-with-friends-main-modal-more-info .icModalHeader {

            background-size: 175px 191px;
        }
    }

    .shop-with-friends-main-modal-more-info .body-header {
        text-align: center;
    }

    .shop-with-friends-main-modal-more-info .body-header h1 {
        color: #43B02A;
        margin: 0;
        font-size: 32px;
        font-weight: 500;
    }

    .shop-with-friends-main-modal-more-info .body-header p {
        font-size: 18px;
        font-weight: 400;
        margin: 0;
    }

    .shop-with-friends-main-modal-more-info .body-action .ic-btn {
        padding: 10px 14px;
        font-size: 18px;
    }

    .shop-with-friends-main-modal-more-info .body-action .ic-btn-secondary {
        color: #43B02A;
        border-color: #43B02A;
    }

    .shop-with-friends-main-modal-more-info .icModalRow .ic-btn + .ic-btn {
        float: right;
        margin: 0;
    }

    .shop-with-friends-main-modal-more-info .body-content {
        padding: 0 40px;
    }

    .shop-with-friends-main-modal-more-info .body-content ul {
        margin: 0;
        margin-top: 20px;
    }

    .shop-with-friends-main-modal-more-info .body-content input[type="text"] {
        margin: 20px auto;
        display: block;
        width: 50%;
        text-align: center;
        font-size: 16px;
        font-weight: 300;
    }

    @media (max-width: 991px) {
        .shop-with-friends-main-modal-more-info .body-content input[type="text"] {
            width: 100%;
        }
    }

    .shop-with-friends-main-modal-more-info .body-content .ic-loading {
        height: 66px;
        padding-top: 30px;
    }

    .shop-with-friends-main-modal-more-info .body-content .shared-carts-list li {
        padding: 10px 14px;
    }

    .shop-with-friends-main-modal-more-info .body-content .shared-carts-list li:hover p {
        color: #43B02A;
    }

    .shop-with-friends-main-modal-more-info .body-content .shared-carts-list li p {
        text-align: left;
        display: inline-block;
        margin: 0;
        font-size: 16px;
        font-weight: 400;
    }

    .shop-with-friends-main-modal-more-info .body-content .shared-carts-list li a {
        text-align: right;
        display: inline-block;
        font-size: 12px;
        line-height: 21px;
    }

    .shop-with-friends-main-modal-more-info .body-content .shared-carts-list li strong {
        font-weight: 600;
    }

    .shop-with-friends-main-modal-more-info .body-content .shared-carts-list li .ic-text-truncate {
        max-width: 75%;
    }

    @media (max-width: 500px) {
        .shop-with-friends-main-modal-more-info .body-content .shared-carts-list li .ic-text-truncate {
            max-width: 64%;
        }
    }

    .shop-with-friends-main-modal-more-info .body-content .shared-link-wrapper {
        padding-bottom: 20px;
    }

    .shop-with-friends-main-modal-more-info .body-content .shared-link-wrapper a {
        font-size: 16px;
        color: #43B02A;
        margin-right: 20px;
    }

    .shop-with-friends-main-modal-more-info .body-content .shared-link-wrapper .ic-btn-secondary {
        color: #43B02A;
        border: 1px solid #43B02A;
        background-color: #fff;
        border-radius: 15px;
    }

    .shop-with-friends-common-modal-more-info .body-header {
        text-align: center;
    }

    .shop-with-friends-common-modal-more-info .body-header h1 {
        margin: 0;
        margin-bottom: 10px;
        font-size: 28px;
        font-weight: bold;
        text-align: center;
        color: #424242;
    }

    .shop-with-friends-common-modal-more-info .subheader-text {
        font-size: 20px;
        text-align: center;
        color: #757575;
    }

    .shop-with-friends-common-modal-more-info .body-action button {
        display: block;
        margin: 0 auto;
        font-size: 18px;
    }

    .shop-with-friends-invited-modal-more-info .icModalHeader {
        height: 220px;
        padding: 0;

        background-repeat: no-repeat;
        background-size: cover;
        background-color: #E6E9F0;
    }

    .shop-with-friends-invited-modal-more-info .decline-link {
        color: #43B02A;
        display: block;
        text-align: center;
        margin-top: 20px;
    }

    .shop-with-friends-invited-modal-more-info .decline-link:hover {
        cursor: pointer;
    }

    .shop-with-friends-invited-modal-more-info .subheader-text {
        margin: 0;
    }

    .shop-with-friends-invited-modal-more-info .collaborators {
        text-align: center;
        padding: 10px 0;
    }

    .shop-with-friends-invited-modal-more-info .cart-collaborator {
        background-repeat: no-repeat;
        height: 65px;
        width: 65px;
        border-radius: 50%;
        overflow: hidden;
        display: inline-block;
        margin: 5px;
    }

    .shop-with-friends-invited-modal-more-info .cart-collaborator p {
        margin: 0;
        font-size: 36px;
        line-height: 1.7em;
        text-align: center;
        color: #ffffff;
        text-transform: uppercase;
    }

    .shared-cart-guest-invited-modal-more-info label {
        font-size: 16px;
        font-weight: 600;
        text-align: center;
        color: #333333;
        width: 100%;
        margin-top: 15px;
    }

    .splashgateModal .rcp-slash-banner .head-stone i {
        display: block;
        margin: auto;
        height: 80px;
        width: 80px;
        border-radius: 160px;
        font-size: 40px;
        background-color: #caf2c2;
        color: #61b450;
        line-height: 80px;
    }

    @media (max-width: 767px) {
        .splashgateModal .rcp-slash-banner .head-stone i {
            height: 40px;
            width: 40px;
            border-radius: 40px;
            font-size: 40px;
        }
    }

    .splashgateModal .rcp-slash-banner h3 {
        margin: 0;
        font-size: 24px;
        line-height: 34px;
        font-weight: 600;
        color: inherit;
    }

    @media (max-width: 767px) {
        .splashgateModal .rcp-slash-banner h3 {
            font-size: 21px;
            line-height: 30px;
        }
    }

    .splashgateModal .rcp-slash-banner p {
        margin-top: 10px;
        line-height: 24px;
        font-size: 16px;
        color: inherit;
    }

    .splashgateModal .rcp-slash-banner p span {
        display: block;
    }

    @media (max-width: 767px) {
        .splashgateModal .rcp-slash-banner p {
            font-size: 14px;
            display: inline;
        }
    }

    .splashgateModal .signup-vs-login li {
        list-style: none;
    }

    .splashgateModal .rcp-signup-widget fieldset {
        margin: 0 0 0 0;
    }

    .splashgateModal .rcp-signup-widget .rcp-terms-of-service div {
        display: inline;
    }

    .splashgateModal .rcp-signup-widget .rcp-terms-of-service div:after {
        content: ' ';
    }

    .splashgateModal .rcp-signup-widget .ic-btn {
        line-height: 28px;
    }

    .splashgateModal .rcp-signup-widget .ic-btn i {
        top: 3px;
    }

    .module-renderer .browse-header .hero h1 {
        font-weight: 600;
    }

    .module-renderer .browse-header.department .hero h1 {
        font-size: 44px;
        text-align: left;
    }

    .module-renderer .browse-header.aisle .hero h1 {
        width: 67%;
        text-align: left;
        font-size: 28px;
    }

    .module-renderer .browse-header.modal-more-info-header .hero {
        padding: 0px;
        border-bottom: 0px;
    }

    .module-renderer .browse-header.modal-more-info-header .hero h1 {
        font-size: 28px;
    }

    .module-renderer .browse-header.modal-more-info-header .hero p {
        font-size: 18px;
    }

    .cart-container .module-renderer {
        display: flex;
        flex-direction: column;
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .cart-container .module-renderer .header-modules-wrapper .module-wrapper {
        margin: 0 auto;
    }

    .cart-container .module-renderer .module-wrapper {
        width: 100%;
        margin: 0 auto;
        background-color: #fff;
    }

    .cart-container .module-renderer .module-renderer {
        overflow-y: auto;
        position: relative;
        padding: 0;
    }

    .cart-container .module-renderer .module-renderer .module-wrapper {
        margin: 0 auto;
        width: 100%;
        background-color: white;
    }

    .cart-container .remove-item-wrapper {
        padding: 0;
        border: 0;
        background-color: white;
        position: absolute;
        top: -36px;
        right: 4px;
        font-size: 18px;
        font-weight: 100;
        line-height: 38px;
        text-shadow: none;
        margin-right: 10px;
        color: #929292;
        cursor: pointer;
    }

    .cart-progress p {
        font-size: 24px;
        text-align: center;
        margin-bottom: 5px;
    }

    @media (max-width: 767px) {

        .cart-progress p {
            font-size: 16px;
        }

        .cart-progress .muted {
            font-size: 11px;
        }
    }

    @-webkit-keyframes loading-state {
        0% {
            background-color: #efefef;
        }
        100% {
            background-color: #ddd;
        }
    }

    @-moz-keyframes loading-state {
        0% {
            background-color: #efefef;
        }
        100% {
            background-color: #ddd;
        }
    }

    @keyframes loading-state {
        0% {
            background-color: #efefef;
        }
        100% {
            background-color: #ddd;
        }
    }

    .condensed-retailer-chooser .retailer-option-logo-wrapper img {
        width: 96px;
        height: 96px;
        box-shadow: 0px 0px 0px 1px rgba(0, 0, 0, 0.15);
        border-radius: 50%;
        background-color: #fff;
    }

    .condensed-retailer-chooser .retailer-option-body h3 {
        color: #424242;
        font-size: 18px;
        line-height: 22px;
        font-weight: bold;
        margin: 0;
        margin-bottom: 2px;
        max-width: 252px;
    }

    .condensed-retailer-chooser .retailer-option-body p {
        margin: 0;
    }

    .container-navigation-mobile li {
        list-style: none;
    }

    .container-navigation-mobile li a {
        white-space: normal;
        color: black;
    }

    .container-navigation-mobile .container-navigation-mobile-inner-wrapper .button-wrapper i {
        top: 1px;
        margin: 0 auto;
        display: block;
        line-height: 36px;
    }

    .container-navigation-mobile .container-navigation-mobile-inner-wrapper .button-wrapper.right-side i {
        width: 20px;
    }

    .container-navigation-mobile .container-navigation-mobile-inner-wrapper .button-wrapper.left-side i {
        width: 23px;
    }

    .container-navigation-mobile .container-navigation-mobile-inner-wrapper i {
        font-size: 22px;
    }

    .container-navigation-mobile ul.subcontainer-list li.subcontainer .action-wrapper a {
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 165px;
        white-space: nowrap;
        display: inline-block;
    }

    .container-navigation-mobile ul.subcontainer-list li.subcontainer .action-wrapper a:hover {
        text-decoration: none;
    }

    .container-navigation-mobile ul.subcontainer-list li {
        font-weight: 600;
    }

    .education-hero button.cta {
        margin-bottom: 25px;
        width: 220px;
    }

    .education-hero .content.text-below-icon .row-icon img {
        max-width: 100px;
        max-height: 55px;
    }

    .education-hero .content.text-below-icon .row-text td {
        padding-top: 10px;
    }

    .education-hero .content.text-below-icon .row-text p {
        font-size: 15px;
        text-align: center;
        font-weight: 600;
    }

    @media (max-width: 767px) {
        .education-hero .content .outer-box .content-card table {
            width: 100%;
        }
    }

    .education-hero .content .outer-box h6 {
        margin: 0;
        font-weight: 600;
    }

    .education-hero .content .outer-box p {
        color: #757575;
        margin: 0;
    }

    .error-module h1 {
        margin-top: 0px;
        font-weight: 900;
    }

    .error-module img {
        max-width: 250px;
        max-height: 250px;
        margin-bottom: 10px;
    }

    .error-module p {
        margin-bottom: 5px;
    }

    .image-banner .dp-header .dp-header-image img {
        position: absolute;
        margin: auto;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .image-banner .dp-cta {
        height: 35px;
        width: 97px;
        position: absolute;
        margin: auto 15px auto auto;
        top: 0;
        bottom: 0;
        right: 0;
        overflow: hidden;
    }

    @media (max-width: 767px) {
        .image-banner .dp-cta {
            display: none;
        }
    }

    @-webkit-keyframes banner-loading {
        0% {
            background-color: #efefef;
        }
        100% {
            background-color: #ddd;
        }
    }

    @-moz-keyframes banner-loading {
        0% {
            background-color: #efefef;
        }
        100% {
            background-color: #ddd;
        }
    }

    @keyframes banner-loading {
        0% {
            background-color: #efefef;
        }
        100% {
            background-color: #ddd;
        }
    }

    .item-detail-module .item-flag-form textarea {
        width: 100%;
    }

    .item-detail-module .QuantityForm select, .item-detail-module .QuantityForm input {
        height: 43px;
        text-align: center;
        text-align-last: center;
        width: 100%;
        font-size: 18px;
        line-height: 1.33333;
    }

    .items-list .thumb-wrapper img {
        background-color: #fff;
    }

    .items-list .items-list-header-wrapper h4 {
        display: inline-block;
        font-size: 18px;
        font-weight: normal;
        color: #424242;
        margin: 0;
        padding: 0;
    }

    @media (max-width: 991px) {
        .items-list .items-list-header-wrapper h4 {
            font-size: 14px;
            line-height: 18px;
        }
    }

    .items-list .items-list-header-wrapper h4 a {
        vertical-align: middle;
        text-transform: none;
        border: none;
        font-size: inherit;
        color: inherit;
    }

    .items-list .items-list-header-wrapper h4 a:hover {
        color: #43B02A;
    }

    .items-list .items-list-header-wrapper h4 a:not([href]) {
        color: inherit;
    }

    .items-list .items-list-header-wrapper h4 a:not([href]):hover {
        color: inherit;
        text-decoration: initial;
    }

    .item-sort .nav-pills > li > button {
        padding-top: 8px;
        padding-bottom: 8px;
        margin-top: 2px;
        margin-bottom: 2px;
        padding-right: 12px;
        padding-left: 12px;
        line-height: 14px;
        display: block;
        text-align: left;
    }

    .item-sort .nav-pills > li > button.dropdown-toggle i {
        padding-left: 15px;
        color: #a9a9a9;
    }

    .item-sort .nav-dropdown .dropdown-menu > li:last-child {
        border: none;
        padding: 0;
        margin-top: 0;
    }

    .item-sort .dropdown-menu .active > a {
        color: #43b02a;
        background-color: transparent;
    }

    .item-sort .dropdown-menu .active > a i {
        margin: 0 10px;
    }

    .item-sort .dropdown-menu li a,
    .item-sort .dropdown-menu li a {
        padding: 0 0 0 36px;
        color: #757575;
    }

    .item-sort .dropdown-menu li a:hover {
        color: white;
        background-color: #43b02a;
    }

    .list-builder .shopping-list li {
        line-height: 26px;
        color: #212121;
        position: relative;
        padding-right: 20px;
        text-transform: capitalize;
    }

    .list-builder .shopping-list li:hover {
        color: #43B02A;
    }

    .list-builder .popular-terms .popular-terms-list i {
        opacity: 0.3;
        cursor: not-allowed !important;
    }

    .ModalContainerRenderer .module-renderer {
        padding-top: 0;
        margin: 0;
    }

    .ModalContainerRenderer .module-renderer .module-wrapper {
        padding: 24px;
        margin: 0;
        border-bottom: 1px solid #F0EFEC;
        width: 100%;
    }

    .ModalContainerRenderer .module-renderer .module-wrapper:empty {
        display: none;
    }

    .ModalContainerRenderer .module-renderer .module-wrapper:last-of-type {
        padding-bottom: 0;
        border-bottom: 0;
    }

    .module-renderer {
        width: auto;
        padding: 24px 0;
    }

    .module-renderer:focus {
        outline: none;
    }

    .module-renderer .module-wrapper {
        width: auto;
        margin: 0 auto 24px auto;
    }

    @media (max-width: 991px) {
        .module-renderer .module-wrapper {
            margin: 0 auto 12px auto;
        }
    }

    .module-renderer .module-wrapper:empty {
        margin: 0;
    }

    .module-renderer.with-navigation-modules .modules-wrapper .module-wrapper,
    .module-renderer .modules-wrapper .module-wrapper {
        /* this selector is here to override the below for $items selector */
    }

    @media (max-width: 991px) {
        .module-renderer.with-navigation-modules .modules-wrapper .module-wrapper,
        .module-renderer .modules-wrapper .module-wrapper {
            width: 100%;
        }
    }

    @media (max-width: 767px) {
        .module-renderer {
            padding-bottom: 0;
        }

        .module-renderer:empty {
            display: none;
        }
    }

    @media (max-width: 991px) {
        .module-renderer {
            margin: 0;
        }
    }

    .icModalContentContainer .module-wrapper {
        max-width: 100%;
    }

    .icModalContentContainer .module-wrapper:last-of-type {
        margin-bottom: 0;
    }

    .header-modules-wrapper .module-wrapper {
        margin-bottom: 0;
    }

    .footer-modules-wrapper .module-wrapper {
        margin-bottom: 0;
    }

    .module-renderer.with-navigation-modules .navigation-modules .module-wrapper {
        width: 280px;
    }

    @media (max-width: 991px) {
        .module-renderer.with-navigation-modules .navigation-modules .module-wrapper {
            margin: 0 auto 12px auto;
            width: 100%;
        }

        .module-renderer.with-navigation-modules .navigation-modules .module-wrapper:last-child {
            margin: 0 auto;
        }
    }

    .nav-footer .nav-links .nav-links-inner-wrapper ul {
        list-style-type: none;
        display: inline-block;
        padding: 0;
        text-align: center;
        line-height: 80px;
    }

    .nav-footer .nav-links .nav-links-inner-wrapper ul li {
        display: inline;
    }

    .nav-footer .nav-links .nav-links-inner-wrapper ul li a {
        color: white;
        padding: 0 .6em;
        font-size: 16px;
    }

    @media (max-width: 767px) {

        .nav-footer .nav-links .nav-links-inner-wrapper ul {
            line-height: 30px;
            margin: 0;
        }

        .nav-footer .nav-links .nav-links-inner-wrapper ul li {
            display: inline-block;
            width: 50%;
        }
    }

    .navigation-link-box .action-label-icon i {
        font-size: 24px;
        top: 8px;
        left: 12px;
        color: #757575;
        text-decoration: none;
    }

    @media (max-width: 767px) {

        .navigation-link-box .action-label-arrow-right i {
            font-size: 24px;
            font-weight: bold;
        }
    }

    .navigation-links-list ul {
        margin: 0;
        border-bottom: none;
        padding-bottom: 16px;
    }

    @media (max-width: 767px) {
        .navigation-links-list ul {
            border-bottom: 1px solid #eeeeee;
        }
    }

    .navigation-links-list .page-header-container .page-header-content {
        font-size: 28px;
        font-weight: bold;
        text-align: left;
    }

    @media (max-width: 767px) {
        .navigation-links-list .page-header-container .page-header-content {
            font-size: 24px;
            text-align: center;
        }
    }

    .module-renderer .navigation-modules .plain-header {
        display: none;
        margin-top: 0;
    }

    .module-renderer .navigation-modules .plain-header .hero {
        padding: 5px 0 0 15px;
        margin: 0;
    }

    .module-renderer .navigation-modules .plain-header .hero h1 {
        font-size: 20px !important;
    }

    @media (max-width: 991px) {

        .module-renderer .navigation-modules .plain-header .hero h1 {
            margin: 0;
            font-size: 16px !important;
        }
    }

    @media (max-width: 991px) {

        .module-renderer .modules-wrapper .plain-header.nested .hero {
            padding: 0 16px;
            margin: 0;
            background-color: white;
        }

        .module-renderer .modules-wrapper .plain-header.nested .hero .module-wrapper {
            margin: 0;
        }
    }


    .module-renderer .plain-header .hero h1 {
        font-size: 44px;
        text-align: left;
        font-weight: 600;
    }

    .module-renderer .plain-header.nested .hero {
        background-color: inherit;
    }

    .module-renderer .plain-header.nested .hero h1 {
        width: 67%;
        text-align: left;
        font-size: 28px;
    }

    @media (max-width: 991px) {
        .module-renderer .plain-header.nested .hero h1 {
            width: 90%;
        }
    }

    .aisle-filter-web h4, .department-aisle h4 {
        padding: 5px 0;
        margin: 0;
    }

    .department-aisle .aisle-filter .title a {
        color: #212121;
    }

    @-webkit-keyframes aisle-loading {
        0% {
            background-color: #efefef;
        }
        100% {
            background-color: #ddd;
        }
    }

    @-moz-keyframes aisle-loading {
        0% {
            background-color: #efefef;
        }
        100% {
            background-color: #ddd;
        }
    }

    @keyframes aisle-loading {
        0% {
            background-color: #efefef;
        }
        100% {
            background-color: #ddd;
        }
    }

    .aisle-filter-web .aisle-loading-lighter, .department-aisle .aisle-loading-lighter {
        animation-name: aisle-loading-lighter;
        animation-duration: 2s;
        animation-direction: alternate;
        animation-timing-function: ease-in-out;
        animation-iteration-count: 100;
    }

    @-webkit-keyframes aisle-loading-lighter {
        0% {
            background-color: #f0f0f0;
        }
        100% {
            background-color: #eee;
        }
    }

    @-moz-keyframes aisle-loading-lighter {
        0% {
            background-color: #f0f0f0;
        }
        100% {
            background-color: #eee;
        }
    }

    @keyframes aisle-loading-lighter {
        0% {
            background-color: #f0f0f0;
        }
        100% {
            background-color: #eee;
        }
    }

    .aisle-filter-web ul.department-selector, .department-aisle ul.department-selector {
        font-size: 14px;
        margin: 0px;
        list-style: none;
    }

    .aisle-filter-web ul.department-selector li, .department-aisle ul.department-selector li {
        line-height: 26px;
        text-overflow: ellipsis;
    }

    .aisle-filter-web ul.department-selector li.department a, .department-aisle ul.department-selector li.department a {
        font-weight: 600;
    }

    .aisle-filter-web ul.department-selector li.department-selector__more, .department-aisle ul.department-selector li.department-selector__more {
        padding-top: 5px;
        font-weight: 600;
        font-size: 12px;
    }

    .aisle-filter-web ul.department-selector li.department-selector__more a, .department-aisle ul.department-selector li.department-selector__more a {
        color: #43B02A;
    }

    .aisle-filter-web ul.department-selector li.department-selector__more a:hover, .department-aisle ul.department-selector li.department-selector__more a:hover {
        color: #338620;
    }

    .aisle-filter-web ul.department-selector a, .department-aisle ul.department-selector a {
        color: #757575;
    }

    .aisle-filter-web ul.department-selector a.department, .department-aisle ul.department-selector a.department {
        font-weight: 600;
    }

    .aisle-filter-web ul.department-selector a:hover, .department-aisle ul.department-selector a:hover, .aisle-filter-web ul.department-selector a:active, .department-aisle ul.department-selector a:active, .aisle-filter-web ul.department-selector a:focus, .department-aisle ul.department-selector a:focus {
        text-decoration: none;
    }

    .aisle-filter-web ul.department-selector a:hover, .department-aisle ul.department-selector a:hover {
        color: #43B02A;
    }

    .aisle-filter-web ul.department-selector a.active, .department-aisle ul.department-selector a.active, .aisle-filter-web ul.department-selector a.action-active, .department-aisle ul.department-selector a.action-active {
        color: #000;
        font-weight: 600;
    }

    @media (max-width: 767px) {
        .filter-container {
            display: none;
        }
    }

    .filter-container .separator {
        height: 1px;
        background: #e0e0e0;
        margin-bottom: 8px;
        max-width: 260px;
        margin-right: 5px;
    }

    .filter-container a {
        color: #43B02A;
    }

    .filter-container a:hover, .filter-container a:active, .filter-container a:focus {
        text-decoration: none;
    }

    .filter-container a:hover {
        color: #338620;
    }

    .filter-container .title {
        font-weight: 700;
        font-size: 18px;
        padding-bottom: 10px;
    }

    .filter-container .clear-all {
        font-weight: 600;
        font-size: 12px;
        color: #43B02A;
        font-stretch: normal;
        cursor: pointer;
        padding-top: 7px;
        margin-right: 5px;
    }

    .filter-container .clear-all:hover {
        color: #338620;
    }

    .filter-container .more {
        padding-top: 5px;
        font-weight: 600;
        font-size: 12px;
    }

    .filter-container .search-filter-view {
        margin-bottom: 20px;
    }

    .filter-container .search-filter-view .title {
        font-size: 14px;
        text-transform: uppercase;
        color: #212121;
        font-weight: bold;
        padding-bottom: 5px;
    }

    .filter-container .empty-filter {
        color: #757575;
        font-size: 14px;
        font-weight: normal;
    }

    .filter-container li {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .filter-container .filter-option, .filter-container .multi-filter-option, .filter-container .single-filter-option, .filter-container .sort-and-filter-container-mobile .filter-container-mobile .multi-filter-option, .sort-and-filter-container-mobile .filter-container-mobile .filter-container .multi-filter-option, .filter-container .sort-and-filter-container-mobile .filter-container-mobile .single-filter-option, .sort-and-filter-container-mobile .filter-container-mobile .filter-container .single-filter-option {
        line-height: 30px;
        color: #424242;
    }

    .filter-container .filter-option:hover, .filter-container .multi-filter-option:hover, .filter-container .single-filter-option:hover {
        cursor: pointer;
        color: #43b02a;
    }

    .filter-container .filter-option .badge.badge--exclusive, .filter-container .multi-filter-option .badge.badge--exclusive, .filter-container .single-filter-option .badge.badge--exclusive {
        padding: 0px 9px;
        border-radius: 12px;
        background-color: grey;
        display: inline-block;
        font-size: 12px;
        font-weight: 600;
        text-align: center;
        letter-spacing: 0.01em;
        text-shadow: none;
        color: white;
        height: 21px;
        line-height: 21px;
        margin-left: 10px;
    }

    .filter-container .filter-option.active, .filter-container .active.multi-filter-option, .filter-container .active.single-filter-option {
        color: #000;
    }

    .filter-container .filter-option div.check, .filter-container .multi-filter-option div.check, .filter-container .single-filter-option div.check {
        margin-top: 1px;
        width: 20px;
        height: 20px;
        border: solid;
        border-width: 1px;
        border-color: #757575;
        color: #f7f7f7;
        margin-right: 10px;
        margin-bottom: -5px;
        position: relative;
    }

    .filter-container .filter-option div.check.active, .filter-container .multi-filter-option div.check.active, .filter-container .single-filter-option div.check.active {
        background-color: #43B02A;
        border-width: 0px;
    }

    .filter-container .filter-option div.inline, .filter-container .multi-filter-option div.inline, .filter-container .single-filter-option div.inline {
        display: inline-block;
    }

    .filter-container .multi-filter-option div.check {
        border-radius: 15%;
    }

    .filter-container .single-filter-option div.check {
        border-radius: 50%;
    }

    .search-footer-box {
        max-width: 960px;
        margin: 11px auto 0px auto;
        background: white;
        border: solid 1px #E0E0E0;
        border-radius: 4px;
        padding-top: 15px !important;
        padding-bottom: 15px;
    }

    .search-footer-box .title {
        color: #424242;
        font-size: 14px;
        font-weight: 600;
        margin-right: 12px;
    }

    @media (max-width: 767px) {
        .search-footer-box .title {
            display: block;
            margin: 5px 0;
        }
    }

    .search-footer-box .divider {
        margin-left: 15px;
        margin-right: 15px;
        border-left: 1px solid #E0E0E0;
    }

    @media (max-width: 767px) {
        .search-footer-box .divider {
            display: none;
        }
    }

    .search-footer-box .storeChooser .store-link {
        color: #3EA327;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
    }

    .search-footer-box .storeChooser .store-link .left-icon {
        margin-right: 8px;
    }

    .search-footer-box .storeChooser .store-link .store-name:hover {
        text-decoration: underline;
    }

    .search-footer-box .warehouse-dropdown {
        display: inline-block;
        max-width: 260px;
        width: 100%;
    }

    .search-footer-box .warehouse-dropdown .dropdown-toggle-button {
        text-align: left;
        width: 100%;
    }

    .search-footer-box .warehouse-dropdown .dropdown-toggle-button .left-icon {
        margin-right: 8px;
    }

    .search-footer-box .warehouse-dropdown .icDropdownItems {
        text-align: left;
        max-width: 260px;
        width: 100%;
    }

    .search-footer-box .warehouse-dropdown .icDropdownItem {
        padding-left: 36px;
    }

    .search-footer-box .warehouse-dropdown .icDropdownItem:before {
        content: "\E009";
        font-family: 'ic-icons' !important;
        font-style: normal !important;
        font-weight: normal !important;
        font-variant: normal !important;
        text-transform: none !important;
        speak: none;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        box-sizing: border-box;
        position: absolute;
        left: 14px;
        top: 3px;
        padding: 9px 0;
        font-size: 14px;
    }

    @media (max-width: 767px) {
        .search-footer-box .warehouse-dropdown {
            display: block;
            margin: 0 auto;
        }
    }

    .search-footer-box .specialRequestLink {
        display: inline-block;
    }

    .search-footer-box .special-request {
        color: #3EA327;
        font-size: 14px;
        font-weight: 600;
    }

    .special-request-v2 {
        color: #3EA327;
        font-size: 14px;
        font-weight: 600;
    }

    .search-messaging {
        margin-top: 8px;
    }

    .search-messaging h3 {
        margin: 0;
    }

    .search-pagination {
        width: 100%;
        margin-top: 20px;
        margin-bottom: 25px;
    }

    .search-pagination a {
        color: #3EA327;
    }

    .search-pagination a:hover {
        text-decoration: none;
    }

    .search-pagination .pagination-info {
        padding-left: 15px;
        padding-right: 15px;
        font-size: 14px;
        color: #424242;
        font-weight: 600;
    }

    .search-pagination .ic-icon {
        font-size: 22px;
        cursor: pointer;
        top: 7px;
    }

    .related-searches {
        padding-left: 18px;
        padding-right: 18px;
    }

    .related-searches .title {
        font-size: 14px;
        font-weight: 600;
        line-height: 34px;
        color: #4e4e4e;
        margin-bottom: 5px;
    }

    .related-searches .terms a {
        color: #3EA327;
        font-size: 14px;
        font-weight: 600;
        border: none;
    }

    .related-searches .terms a i {
        padding-right: 5px;
    }

    .related-searches .terms a:not(:first-child) {
        margin-left: 8px;
    }

    .search-feedback-modal-more-info .feedback-form {
        width: 500px;
        margin: 0 auto;
    }

    @media (max-width: 576px) {
        .search-feedback-modal-more-info .feedback-form {
            width: 100%;
        }
    }

    .search-feedback-modal-more-info .feedback-form .icDropdown {
        margin-bottom: 17px;
        width: 320px;
    }

    .search-feedback-modal-more-info .feedback-form .ic-btn-feedback-category {
        width: 320px;
        text-align: left;
        height: 36px;
        border-radius: 4px;
        background-color: #fbfaf9;
        border: solid 1px rgba(56, 56, 56, 0.1);
        color: #393939;
        font-weight: 600;
        padding-left: 14px;
        font-size: 14px;
    }

    .search-feedback-modal-more-info .feedback-form .ic-btn-feedback-category i {
        top: 3px;
        float: right;
    }

    .search-feedback-modal-more-info .feedback-form .icDropdownItem {
        padding-left: 14px;
        width: 320px;
    }

    @media (max-width: 576px) {
        .search-feedback-modal-more-info .send-button {
            display: flex;
            flex-direction: column-reverse;
            align-items: center;
        }
    }

    .search-feedback-modal-more-info .feedback-icon {

        display: block;
        width: 110px;
        height: 110px;
        margin: 0 auto;
    }

    @media only screen and (-webkit-min-device-pixel-ratio: 1.3), only screen and (min--moz-device-pixel-ratio: 1.3), only screen and (-o-min-device-pixel-ratio: 1.3 / 1), only screen and (min-resolution: 125dpi), only screen and (min-resolution: 1.3dppx) {
        .search-feedback-modal-more-info .feedback-icon {

            background-size: 110px 110px;
        }
    }

    .search-feedback-modal-more-info h1 {
        font-size: 28px;
        font-weight: bold;
        color: #393939;
        margin-bottom: 5px;
    }

    .search-feedback-modal-more-info h2 {
        margin-top: 0px;
        margin-bottom: 31px;
        font-size: 20px;
        color: #626262;
        font-weight: normal;
        font-style: normal;
    }

    .search-feedback-modal-more-info .comment-box {
        width: 500px;
        height: 100px;
        margin-bottom: 33px;
    }

    .ic-btn-group-vertical > .ic-btn,
    .ic-btn-group-vertical > .ic-btn-group,
    .ic-btn-group-vertical > .ic-btn-group > .ic-btn {
        display: block;
        float: none;
        width: 100%;
        max-width: 100%;
    }

    .ic-btn-group-vertical > .ic-btn-group:before, .ic-btn-group-vertical > .ic-btn-group:after {
        content: " ";
        display: table;
    }

    .ic-btn-group-vertical > .ic-btn-group:after {
        clear: both;
    }

    .ic-btn-group-vertical > .ic-btn-group > .ic-btn {
        float: none;
    }

    .ic-btn-group-vertical > .ic-btn + .ic-btn,
    .ic-btn-group-vertical > .ic-btn + .ic-btn-group,
    .ic-btn-group-vertical > .ic-btn-group + .ic-btn,
    .ic-btn-group-vertical > .ic-btn-group + .ic-btn-group {
        margin-top: -1px;
        margin-left: 0;
    }

    .ic-btn-group-vertical > .ic-btn:not(:first-child):not(:last-child) {
        border-radius: 0;
    }

    .ic-btn-group-vertical > .ic-btn:first-child:not(:last-child) {
        border-top-right-radius: 4px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .ic-btn-group-vertical > .ic-btn:last-child:not(:first-child) {
        border-bottom-left-radius: 4px;
        border-top-right-radius: 0;
        border-top-left-radius: 0;
    }

    .ic-btn-group-vertical > .ic-btn-group:not(:first-child):not(:last-child) > .ic-btn {
        border-radius: 0;
    }

    .ic-btn-group-vertical > .ic-btn-group:first-child:not(:last-child) > .ic-btn:last-child,
    .ic-btn-group-vertical > .ic-btn-group:first-child:not(:last-child) > .dropdown-toggle {
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }

    .ic-btn-group-vertical > .ic-btn-group:last-child:not(:first-child) > .ic-btn:first-child {
        border-top-right-radius: 0;
        border-top-left-radius: 0;
    }

    .ic-btn-group-justified {
        display: table;
        width: 100%;
        table-layout: fixed;
        border-collapse: separate;
    }

    .ic-btn-group-justified > .ic-btn,
    .ic-btn-group-justified > .ic-btn-group {
        float: none;
        display: table-cell;
        width: 1%;
    }

    .ic-btn-group-justified > .ic-btn-group .ic-btn {
        width: 100%;
    }

    .ic-btn-group-justified > .ic-btn-group .dropdown-menu {
        left: auto;
    }

    .tabModalMoreInfoLink{
        color: #42b02a!important;
        padding-left: 15px;
        border-bottom: 5px solid #42b02a!important;
    }

    [data-toggle="buttons"] > .ic-btn input[type="radio"],
    [data-toggle="buttons"] > .ic-btn input[type="checkbox"],
    [data-toggle="buttons"] > .ic-btn-group > .ic-btn input[type="radio"],
    [data-toggle="buttons"] > .ic-btn-group > .ic-btn input[type="checkbox"] {
        position: absolute;
        clip: rect(0, 0, 0, 0);
        pointer-events: none;
    }

    @font-face {
        font-family: 'ic-icons';
        font-weight: normal;
        font-style: normal;
    }

    [data-icon]:before {
        font-family: "ic-icons" !important;
        content: attr(data-icon);
        font-style: normal !important;
        font-weight: normal !important;
        font-variant: normal !important;
        text-transform: none !important;
        speak: none;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    [class^="ic-icon-"]:before,
    [class*=" ic-icon-"]:before {
        font-family: "ic-icons" !important;
        font-style: normal !important;
        font-weight: normal !important;
        font-variant: normal !important;
        text-transform: none !important;
        speak: none;
        line-height: 1;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .ic-loading *,
    .ic-loading *:before,
    .ic-loading *:after {
        -webkit-box-sizing: content-box !important;
        -moz-box-sizing: content-box !important;
        box-sizing: content-box !important;
    }

    .ic-loading .ic-spinner {
        height: 20px;
        width: 20px;
        margin: 0 auto;
        position: relative;
        -webkit-animation: rotation .6s infinite linear;
        -moz-animation: rotation .6s infinite linear;
        -o-animation: rotation .6s infinite linear;
        animation: rotation .6s infinite linear;
        border: 3px solid rgba(163, 163, 163, 0.3);
        border-radius: 100%;
    }

    .ic-loading .ic-spinner:before {
        content: "";
        display: block;
        position: absolute;
        left: -3px;
        top: -3px;
        height: 100%;
        width: 100%;
        border-top: 3px solid rgba(186, 186, 186, 0.8);
        border-left: 3px solid transparent;
        border-bottom: 3px solid transparent;
        border-right: 3px solid transparent;
        border-radius: 100%;
    }

    @-webkit-keyframes rotation {
        from {
            -webkit-transform: rotate(0deg);
        }
        to {
            -webkit-transform: rotate(359deg);
        }
    }

    @-moz-keyframes rotation {
        from {
            -moz-transform: rotate(0deg);
        }
        to {
            -moz-transform: rotate(359deg);
        }
    }

    @-o-keyframes rotation {
        from {
            -o-transform: rotate(0deg);
        }
        to {
            -o-transform: rotate(359deg);
        }
    }

    @keyframes rotation {
        from {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(359deg);
        }
    }

    @media (max-width: 850px) {
        .topbar--static {
            border-bottom: 1px solid #01abb3;
        }
    }

    .topbar--static .logo {
        position: absolute;
        height: 56px;
        text-align: center;
        width: 100%;
    }

    .topbar--static .logo a {
        display: inline-block;

        background-size: 149px 30px;
        background-repeat: no-repeat;
        background-position: center;
        height: 56px;
        width: 149px;
        margin: 0px;
        opacity: 0.95;
        z-index: 100;
    }

    .topbar--static .logo a:hover {
        opacity: 1;
    }

    .topbar--static .links {
        position: relative;
        z-index: 200;
    }

    @media (max-width: 850px) {
        .topbar--static .links {
            display: block;
            float: none;
            background-color: #01939A;
            top: 56px;
            text-align: center;
            height: 44px;
            line-height: 44px;
            border-top: 1px solid #68BF54;
        }
    }

    .topbar--static ul {
        margin: 0;
        padding: 0;
    }

    .topbar--static ul.right > li {
        float: right;
    }

    .topbar--static ul li {
        display: block;
        float: left;
        list-style: none;
        position: relative;
    }

    @media (max-width: 850px) {
        .topbar--static ul li {
            display: inline;
            float: none;
        }
    }

    .topbar--static ul li.has-button {
        line-height: 52px;
    }

    .topbar--static .left li a {
        color: #fff;
        font-size: 16px;
        font-weight: 400;
        line-height: 20px;
        opacity: 0.8;
        padding: 18px 6px;
        text-decoration: none;
    }

    .topbar--static .left li a:hover {
        opacity: 1;
    }

    .topbar--static .left li a:focus {
        box-shadow: none;
    }

    .topbar--static li a.ic-button {
        color: #01939A;
        background-color: #fff;
        line-height: 0px;
    }

    .topbar--static .left {
        float: left;
        padding-left: 10px;
    }

    @media (max-width: 850px) {
        .topbar--static .left {
            float: none;
        }
    }

    .topbar--static .right {
        float: right;
        padding-right: 10px;
    }

    .u-listInline li {
        display: inline;
    }

    .u-verticalCenter {
        display: table;
        height: 100%;
        width: 100%;
    }

    .u-vcCell {
        display: table-cell;
        vertical-align: middle;
    }

    .ic-fresh h1, .ic-fresh h2, .ic-fresh h3, .ic-fresh h4, .ic-fresh h5, .ic-fresh p {
        color: #393939;
    }

    .ic-fresh h1 {
        font-weight: 700;
        font-size: 36px;
    }

    .ic-fresh h2 {
        font-size: 26px;
        font-weight: 700;
    }

    .ic-fresh h3 {
        font-size: 16px;
        font-weight: 700;
        line-height: 22px;
    }

    .ic-fresh h4 {
        color: #8e8e8e;
        font-size: 16px;
        font-weight: 500;
        letter-spacing: normal;
    }

    .ic-fresh a:hover {
        text-decoration: none;
    }

    .ic-fresh a.admin-action {
        color: #AB00E7;
        display: block;
        margin: 2px;
    }

    .ic-fresh a.admin-action:hover {
        color: #8500b4;
    }

    .ic-fresh a.disabled {
        pointer-events: none;
    }

    .ic-fresh a .ic-icon {
        display: inline-block;
    }

    .ic-fresh a.link--orange {
        color: #FF5600;
    }

    .ic-fresh a.link--green {
        color: #43B02A;
    }

    .ic-fresh .ic-btn-link:hover, .ic-fresh .ic-btn-link:focus {
        text-decoration: none;
    }

    .ic-fresh .hero {
        background-color: #fff;
        padding: 30px;
        text-align: center;
        border-bottom: 1px solid #F0EFEC;
    }

    .ic-fresh .hero a h1, .ic-fresh .hero h1 a {
        color: #393939;
    }

    .ic-fresh .hero .navigation-pills {
        margin-top: 10px;
        max-width: 100vw;
        margin-left: auto;
        margin-right: auto;
    }

    .ic-fresh .hero .navigation-pills :last-child {
        margin-right: 0px;
    }

    .ic-fresh .hero .navigation-active, .ic-fresh .hero .action-active {
        background-color: #43B02A;
        color: white;
        border-color: #43B02A;
    }

    .ic-fresh .hero .navigation-pill {
        margin-right: 6px;
        border-radius: 18px;
        margin-top: 10px;
    }

    @media (max-width: 767px) {
        .ic-fresh .hero {
            margin-left: 0;
            margin-right: 0;
        }
    }

    .ic-fresh .ic-container {
        margin: 0px auto;
        padding-left: 8px;
        padding-right: 8px;
        width: 960px;
    }

    .ic-fresh .ic-container:before, .ic-fresh .ic-container:after {
        content: " ";
        display: table;
    }

    .ic-fresh .ic-container:after {
        clear: both;
    }

    .icModalContentContainer > .icModalContentContainer {
        padding-bottom: 0px;
    }

    @media (max-width: 991px) {
        .icModalContentContainer > .icModalContent {
            /* included here for specificty */
            width: 100vw;
        }
    }

    @media (max-width: 767px) {
        .icModalContentContainer > .icModalContent {
            /* included here for specificty */
            border: none;
            box-shadow: none;
            position: initial;
        }
    }

    .icModalContent {
        position: relative;
        background-color: #fff;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        border: 1px solid #999;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 6px;
        outline: 0;
        -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
        box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
        margin: 0px auto;
        z-index: 1001;
        max-width: 100vw;
    }

    .icModalClose {
        color: #6f6f6f;
        cursor: pointer;
        font-size: 20px;
        position: absolute;
        right: -2px;
        top: -20px;
    }

    .icModalClose button {
        background: none;
        border: none;
        font-size: 50px;
    }

    .icModalClose.dark {
        color: #000;
        right: 5px;
    }

    @media (max-width: 991px) {
        .icModalClose {
            color: #757575;
            top: 10px;
            right: 10px;
        }
    }

    @media (max-width: 991px) {
        .CheckoutAddItemsModal .icModalClose {
            top: 18px;
            right: 0;
            left: 18px;
        }
    }

    @media (max-width: 991px) {
        .StorefrontTrialOfferModal .icModalClose {
            color: #fff;
        }
    }

    .icModalRow .leftCol {
        float: left;
        margin: 0px auto;
        width: 380px;
    }

    @media (max-width: 767px) {
        .icModalRow .leftCol {
            width: auto;
        }
    }

    .icModalRow .rightCol {
        float: right;
        width: 380px;
        border-top-right-radius: 4px;
    }

    .itemModalFooter > .leftCol > div + div {
        border-top: 1px solid #F0EFEC;
    }

    .icModalContent.loadingModal {
        width: 850px;
    }

    .icModalContent.loadingModal .ic-loading {
        padding: 30px 0px;
    }

    @media (max-width: 767px) {
        .icModalContent.loadingModal {
            width: 100vw;
        }
    }

    .icModalContent.icModal-default .icModalHeader {
        padding: 25px;
        background-color: #e5edec;
        text-align: center;
    }

    .icModalContent.icModal-xs {
        max-width: 380px;
    }

    .icModalContent.icModal-xs .header {
        margin-top: 0px;
        margin-bottom: 20px;
        text-align: center;
    }

    .icModalContent.icModal-xs .body {
        padding: 30px;
    }

    .icModalContent.icModal-sm {
        width: 500px;
    }

    @media (max-width: 520px) {
        .icModalContent.icModal-sm {
            width: 90%;
            margin: 0 5%;
        }
    }

    .icModalContent.icModal-md {
        max-width: 700px;
    }

    .icModalContent.icModal-default {
        max-width: 1200px;
    }

    .icDropdown.is-open > .icDropdownItems {
        display: block;
    }

    .icDropdownItem .ic-icon {
        float: right;
    }

    .icModalRow .ic-btn + .ic-btn {
        margin-left: 5px;
    }

    .icModalRow .ic-btn-group > .ic-btn + .ic-btn,
    .icModalRow .ic-btn-group-vertical > .ic-btn + .ic-btn {
        margin-left: 0px;
    }

    @media (max-width: 1200px) {
        .icModalContentContainer {
            padding: 30px 0;
        }
    }

    @media (max-width: 767px) {
        .icModalContentContainer {
            padding: 0;
        }
    }

    .instacart-modal-more-info .instacart-list {
        margin: 0 auto;
        border-radius: 5px;
        box-shadow: 0 22px 70px 4px rgba(0, 0, 0, 0.56);
    }

    .instacart-modal-more-info .instacart-list.is_recipe {
        width: 900px;
    }

    .instacart-modal-more-info .instacart-list.is_recipe .instacart-list-tabs {
        display: none;
    }

    .instacart-modal-more-info .instacart-list.is_recipe .instacart-list-tab-containers {
        position: relative;
    }

    .instacart-modal-more-info .instacart-list.is_recipe .instacart-list-tab-containers > div {
        width: 50%;
        display: inline-block;
    }

    .instacart-modal-more-info .instacart-list.is_recipe .instacart-list-directions {
        float: right;
        min-height: 363px;
        max-height: 500px;
        width: 50%;
        background-color: #F7FBFF;
    }

    .instacart-modal-more-info .instacart-list.is_recipe .instacart-list-directions {
        padding: 30px 50px;
        font-size: 14px;
    }

    .instacart-modal-more-info .instacart-list.is_recipe .instacart-list-directions li {
        line-height: 1.5;
        margin-bottom: 5px;
    }

    .instacart-list * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .instacart-list-header-links > div {
        display: inline-block;
        padding: 0 10px;
        cursor: pointer;
        position: relative;
    }

    .instacart-list-header-dropdown > * {
        padding: 15px;
        color: #747379;
        cursor: pointer;
        -webkit-transition: all 0.1s ease-in-out;
        -moz-transition: all 0.1s ease-in-out;
        -o-transition: all 0.1s ease-in-out;
        transition: all 0.1s ease-in-out;
        display: block;
    }

    .instacart-list-header-dropdown > * .fa {
        margin-right: 5px;
        float: left;
        display: block;
        width: 20px;
        text-align: center;
    }

    .instacart-list-header-dropdown > *:hover {
        background-color: #458eab;
        color: white;
    }

    .instacart-list-header-dropdown > *:first-child {
        border-top-right-radius: 5px;
        border-top-left-radius: 5px;
    }

    .instacart-list-header-dropdown > *:last-child {
        border-bottom-right-radius: 5px;
        border-bottom-left-radius: 5px;
    }

    .instacart-list .instacart-list-header-dropdown-share-link input {
        border: none;
        width: 145px;
        display: inline-block;
        cursor: pointer;

        margin: 0;
        color: #747379;
    }

    .instacart-list-header-avatar img {
        float: left;
        margin-right: 10px;
        width: 30px;
        height: 30px;
        border-radius: 15px;
    }

    .instacart-list-product-image img {
        width: 50px;
        height: 50px;
    }

    .instacart-list-product-image span {
        position: absolute;
        bottom: -3px;
        left: -10px;
        white-space: nowrap;
    }

    .instacart-list-product-size > * {
        vertical-align: middle;
    }
</style>
