<template>
    <div class="account-notification-setting">
        <form name="notification_setting" id="notification_setting" method="post">
            <div class="account__content">
                <div class="account__content-common">
                    <div class="after_account_notfication">
                        <h2>When there is an update to your order...</h2>
                        <ul>
                            <li class="row">
                                <p class="col-10 d-inline-block mt-3">Send a push notification</p>
                                <div class="col-2 float-right d-inline-block">
                                    <div class="float-right">
                                        <label class="switch switch-left-right">
                                            <input class="switch-input" v-on:change="orderUpdatePushNotification()"
                                                   type="checkbox"
                                                   name="order_update_push_notification"
                                                   v-model="order_update_push_notification"
                                                   :checked="notificationSetting.order_update_push_notification">
                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li class="row">
                                <p class="col-10 d-inline-block mt-3">Send an SMS message</p>
                                <div class="col-2 float-right d-inline-block">
                                    <div class="float-right">
                                        <label class="switch switch-left-right">
                                            <input class="switch-input" type="checkbox" v-on:change="orderUpdatePushNotification()"
                                                   name="order_update_sms"
                                                   v-model="order_update_sms"
                                                   :checked="notificationSetting.order_update_sms">
                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                            <li class="row">
                                <div class="col-xs-10 d-inline-block">
                                    <p>Call before checkout</p>
                                    <p class="sub">We'll only call if there are pending changes</p>
                                </div>
                                <div class="col-2 float-right">
                                    <div class="float-right">
                                        <label class="switch switch-left-right">
                                            <input class="switch-input" type="checkbox" v-on:change="orderUpdatePushNotification()"
                                                   name="order_update_call_before_checkout"
                                                   v-model="order_update_call_before_checkout"
                                                   :checked="notificationSetting.order_update_call_before_checkout">
                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="account__content-common">
                    <div class="after_account_notfication">
                        <h2>Sales &amp; Promotions</h2>
                        <ul>
                            <li class="row">
                                <p class="col-10 d-inline-block mt-3">Send a push notification</p>
                                <div class="col-2 float-right">
                                    <div class="float-right">
                                        <label class="switch switch-left-right">
                                            <input class="switch-input" type="checkbox" v-on:change="orderUpdatePushNotification()"
                                                   name="promo_marketing"
                                                   v-model="promo_marketing_email"
                                                   :checked="notificationSetting.promo_marketing_email">
                                            <span class="switch-label" data-on="On" data-off="Off"></span>
                                            <span class="switch-handle"></span>
                                        </label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </form>
    </div>
</template>

<script>
    import Cookies from 'js-cookie';
    export default {
        name: "notifications",
        data() {
            return {
                userData:[],
                language:1,
                notificationSetting:{},
                order_update_push_notification:'',
                order_update_sms:'',
                order_update_call_before_checkout:'',
                promo_marketing_email:'',
            };
        },

        methods: {
            orderUpdatePushNotification() {
                axios.post(apiDev + '/update-user-notification-settings', {
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    language:this.language,
                    order_update_push_notification: this.order_update_push_notification,
                    order_update_sms: this.order_update_sms,
                    order_update_call_before_checkout: this.order_update_call_before_checkout,
                    promo_marketing_email: this.promo_marketing_email,
                    promo_marketing_push_notification: this.promo_marketing_email,
                    promo_marketing_sms: this.promo_marketing_email,
                    promo_marketing: this.promo_marketing,
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        });
                    }

                    if(response.data.response.httpCode == 400){
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

            getUserNotificationSetting() {
                axios.post(apiDev + '/user-notification-settings-details', {
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    language:this.language
                }).then(response => {
                    this.notificationSetting = response.data.response.notification_settings_details;
                    this.order_update_push_notification = this.notificationSetting.order_update_push_notification;
                    this.order_update_sms = this.notificationSetting.order_update_sms;
                    this.order_update_call_before_checkout = this.notificationSetting.order_update_call_before_checkout;
                    this.promo_marketing_email = this.notificationSetting.promo_marketing_email;
                }).catch(error => {

                })
            }

        },

        created() {
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.getUserNotificationSetting();
            bus.$emit('changePage' , this.$route.name);

        },

        mounted() {
        }


    }
</script>

<style scoped>
    .after_account_notfication a{
        color: rgb(80,180,50);
        text-decoration: none;
    }



    @media (max-width: 767px){
        .account-notification-setting{
            margin-left: 0px !important;

        }
    }
</style>
