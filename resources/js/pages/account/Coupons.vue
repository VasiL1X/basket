<template>
    <div class="account__content">
        <div class="promo_code_sections">
            <div class="account-coupons" data-reactroot="">
                <div class="icon">
                    <div class="coupon-icon"></div>
                </div>
                <div class="green-title">
                    Promo Codes
                    <p class="subtitle">Apply discounts to your Account</p>
                </div>
                <a href="javascript:void(0)" data-bypass="true">
                    <button class="btn btn-danger" data-toggle="modal" data-target=".user_promocode_popup">
                        <i class="icon-magic"></i>
                        Add Promo Code
                    </button>
                </a>
                <p>
                    <small>
                        <router-link :to="{ name: 'terms.conditions' }" target="_blank">Terms &amp; Conditions apply</router-link>
                    </small>
                </p>
            </div>

            <div class="row">
                <template>
                    <div>
                        <b-table striped hover :items="myPromos" :fields="options" v-if="myPromos.length"></b-table>
                    </div>
                </template>
            </div>
        </div>
        <add-promo-from-account></add-promo-from-account>
    </div>
</template>

<script>
    import AddPromoFromAccount from "../../components/AddPromoFromAccount";
    import Cookies from "js-cookie";
    export default {
        name: "coupons",
        components: {AddPromoFromAccount},
        data(){
          return{
              userData:{},
              myPromos:{},
              options:['title','start_date','end_date', 'minimum_order_amount'],
            }
        },
        methods:{
            getPromoCodes(){
                axios.post(apiDev + '/list-promo-code-account',{user_id:this.userData.user_id,token:this.userData.token}).then(response =>{
                     this.myPromos = response.data.response.promo_list;
                });
            }
        },
        mounted(){
            this.userData = JSON.parse(Cookies.get('userData')).userData;
            this.getPromoCodes();
            bus.$emit('changePage' , this.$route.name);

        }
    }
</script>

<style scoped>

</style>
