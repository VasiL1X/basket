<template>
    <div>
        <div class="modal fade  promocode_popup cvc-modal bs-example-modal-sm in" role="dialog" id="modalCvc"  style="display: none; padding-right: 15px;">
            <div class="modal-dialog " role="document" style=" width: 380px !important;">
                <div class="modal-content">
                    <div style="padding: 10px">
                        <button type="button" class="close pr-2" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div style="display: block;text-align: center;">
                            <img style="width: 70px" src="/images/logo-normal.png"
                                 alt="Basket">
                        </div>
                        <p  class="modal-title-cvc  pt-5 text-center" style="font-weight: bold" >
                            You are one Step Away! Enter your CVV to verify your card.</p>
                    </div>
                    <div class="modal-body">
                        <div class="promo_inner_sec">
                            <div class="form-group">
                                <input class="form-control"
                                       id="cvc_value" tabindex="0"
                                       v-model="cvv"
                                       placeholder="Enter CVV code"
                                       type="text" maxlength="3">

                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-default" @click="addCvv()"  id="add_cvc_code">Add CVV</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CVVModal",
        data () {
            return {
               cvv:''
            };
        },
        methods: {
            addCvv(){
                bus.$emit('addCvv', this.cvv);
                $('#modalCvc').modal('hide');
            }

        },
        mounted(){

        },
        created(){

        }
    }
</script>

<style scoped>
    .promocode_popup > .modal-sm {
        width: 380px;
    }
</style>
