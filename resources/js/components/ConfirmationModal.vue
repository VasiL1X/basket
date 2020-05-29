<template>
    <div>
        <div class="modal fade  bs-example-modal-md" role="dialog" id="confirmationModal"
             aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog  modal-dialog-centered" role="document" style="width: 350px">
                <div class="modal-content">
                    <div style="padding: 15px; ">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                        <h4 id="mySmallModalLabel" class="modal-title text-center">Confirmation</h4>
                    </div>
                    <div class="modal-body" style="border: 1px solid rgb(222, 226, 230);">

                        <input type="hidden" id="checkout_orders_outlets_id">
                        <input type="hidden" id="checkout_outlet_id">
                        <div class="text-center"><b>Do you want to add <span id="store_outlet_name"></span> items to
                            existing
                            order?</b></div>


                    </div>
                    <div style="border-top: 1px solid #dee2e6; padding: 15px">

                        <button type="button"
                                class="btn btn-primary"
                                id="modal-btn-si"
                                @click.once="addMultipleItemToOrder()"
                        >Yes
                        </button>
                        <button type="button"
                                class="btn btn-default"
                                id="modal-btn-no"
                                @click="notConfirmation()"
                        >No
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Cookies from 'js-cookie';

    export default {
        name: "ConfirmationModal",
        data() {
            return {
                language: Cookies.get('languageId'),
                promoCodeList: [],
                userData: [],
                ordersOutletsId: []
            };
        },
        methods: {
            notConfirmation() {
                $('#confirmationModal').modal('hide');
                this.$router.push({name: 'checkout'})
            },

            addMultipleItemToOrder() {
                let _this = this;
                let message = '';
                _this.ordersOutletsId.forEach((item , key)  => {
                    axios.post(apiDev + '/add-multiple-item-to-order', {
                        language: _this.language,
                        user_id: _this.userData.user_id,
                        token: _this.userData.token,
                        outlet_id: _this.userData.outlet_id ? _this.userData.outlet_id : 67,
                        orders_outlets_id: item.orders_outlets_id,

                    }).then(response => {
                        bus.$emit('removeBasketFromConfirmationModal', item.outlet_id);
                    }).catch(error => {

                    });
                })

                setTimeout(function(){
                       $('#confirmationModal').modal('hide');
                       bus.$emit('multipleOrder', 'Item added successfully');
                    }, 100);

            },



        },
        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData


        },
        created() {
            bus.$on('ordersOutletsId', (data) => {
                if (data) {
                    this.ordersOutletsId = data
                }
            });
        }
    }
</script>

<style scoped>
    .modal-footer {
        padding: 15px;
        text-align: right;
        border-top: 1px solid #e5e5e5;
    }

    #modal-btn-si {
        width: 40%;
        background-color: var(--theme-color);
        border-color: var(--theme-color);
        color: #fff;
        font-size: 16px;
        line-height: 1.33333;
        padding: 6px;
        float: left;
    }

    #modal-btn-no {
        width: 40%;
        background-color: var(--theme-color);
        border-color: var(--theme-color);
        color: #fff;
        font-size: 16px;
        line-height: 1.33333;
        padding: 6px;
        float: right;
    }
</style>
