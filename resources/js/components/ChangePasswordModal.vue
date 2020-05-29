<template>
    <div class="modal fade common_border_sections change-password-modal in" id="myModalChangePassword" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel" style="padding-right: 15px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Change Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form   accept-charset="UTF-8" class="tab-form attribute_form" id="change_pwd">
                        <div class="form-group">
                            <input class="form-control" v-validate="'required'" v-model="old_password" name="old_password"
                                   placeholder="Current Password" autocomplete="off" type="password">
                            <span class="error-message" v-if="submitted && errors.has('old_password')">{{ errors.first('old_password') }}</span>
                        </div>
                        <div class="form-group">
                            <input class="form-control" v-validate="validate" v-model="password" name="password"
                                   placeholder="New Password" autocomplete="off" type="password">
                            <span class="error-message" v-if="submitted && errors.has('password')">{{ errors.first('password') }}</span>
                        </div>
                        <div class="form-group">
                            <input class="form-control" v-validate="validate" v-model="password_confirmation" name="password_confirmation"
                                   placeholder="New Password Confirmation" autocomplete="off" type="password">
                            <span class="error-message" v-if="submitted && errors.has('password_confirmation')">{{ errors.first('password_confirmation') }}</span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" @click="savePassword">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Cookies from 'js-cookie';
    export default {
        name: "ChangePasswordModal",
        data() {
            return {
                userData: [],
                old_password: '',
                password: '',
                password_confirmation: '',
                submitted: false,
                validate: 'required|min:6',
                dict : {
                    custom: {
                        old_password: {
                            required: 'Old Password can not be empty'
                        },
                        password: {
                            required: 'Password can not be empty',
                            min: 'Password can not be less then 6 character'
                        },
                        password_confirmation: {
                            required:  'New Password can not be empty',
                            min:  'Password can not be less then 6 character'
                        }
                    }
                }
            }
        },

        methods:{
            savePassword(){
                this.submitted = true;
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post(apiDev + '/update-password', {
                            language:this.userData.language,
                            user_id:this.userData.user_id,
                            token:this.userData.token,
                            old_password: this.old_password,
                            password: this.password,
                            password_confirmation: this.password_confirmation,
                        }).then(response => {
                            if(response.data.response.httpCode == 400){
                                var arr = response.data.response.Message.split(/,/g);
                                for (var i = 0; i<arr.length; i++){
                                    this.$bvToast.toast(arr[i], {
                                        title: 'Basket',
                                        autoHideDelay: 5000,
                                        toaster: 'b-toaster-bottom-left',
                                        appendToast: true
                                    })
                                }
                            }

                            if(response.data.response.httpCode == 200){
                                this.$bvToast.toast(response.data.response.Message, {
                                    title: 'Basket',
                                    autoHideDelay: 5000,
                                    toaster: 'b-toaster-bottom-left',
                                    appendToast: true
                                })

                                $('#myModalChangePassword').modal('hide')
                                this.old_password = '';
                                this.password = '';
                                this.password_confirmation = '';
                                this.submitted = false;
                            }
                        }).catch(error => {

                        })
                    }
                })
            },



        },

        created(){
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.$validator.localize('en', this.dict);
        },

        mounted(){

        }
    }
</script>

<style scoped>
    h4 {
        font-size: 18px;
    }

    .error-message{
        font-size: 12px;
        color: red;
    }
</style>
