<template>
    <div class="modal fade update_label bs-example-modal-md in" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="col-12">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h1 class="modal-title-new modal-title-new-card-label">Card Label</h1>
                </div>
                <div class="new_address_sec">
                    <form  onsubmit="return false" name="update_label_frm" id="update_label_frm">
                        <div class="form-row">
                            <div class="form-group required">
                                <label class="control-label">Card Label</label>

                                <input class="form-control" type="text" v-model="card_label" name="card_label" id="card_label" required="">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" @click="updateLabel()" class="btn btn-default shopper-continue">Continue <i class="glyph-icon flaticon-arrows"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Cookies from 'js-cookie';
    export default {
        name: "CardLabel",
        data() {
            return {
                userData:[],
                card_label: '',
                card: '',

            };
        },

        methods: {
            updateLabel(){
                axios.post(apiDev + '/update-user-card-label', {
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    language:this.language,
                    card_id:this.card.card_id,
                    card_label:this.card_label
                }).then(response => {
                    bus.$emit('cardUpdate', true);
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
                    $(".update_label").modal('hide')
                }).catch(error => {

                })

            }
        },

        created() {
            bus.$on('card', (data) => {
                if(data){
                    this.card_label = data.card_label
                    this.card = data
                }
            })
        },

        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData

        },


    }
</script>

<style scoped>
    .control-label{
        font-weight: 700;
    }

    .new_address_sec .form-control{
        width: 455px !important;

    }
</style>
