<template>
    <div class="modal fade common_border_sections editAccountInformation in" id="editDetails" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Edit Account Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    <form id="editData">
                        <div class="form-group">
                            <input class="form-control" v-validate="'required|min:5|max:30'"  v-model="first_name" name="first_name" placeholder="First name" autocomplete="off" type="text">
                            <span class="error-message" v-if="submitted && errors.has('first_name')">{{errors.first('first_name')}}</span>
                        </div>
                        <div class="form-group">
                            <input class="form-control" v-validate="'required|min:5|max:30'"  v-model="last_name" name="last_name" placeholder="Last name" autocomplete="off" type="text">
                            <span class="error-message" v-if="submitted && errors.has('last_name')">{{errors.first('last_name')}}</span>
                        </div>
                        <div class="form-group">
                            <input class="form-control" v-validate="'required|email'"  v-model="email" name="email" placeholder="Email" autocomplete="off" type="email">
                            <span class="error-message" v-if="submitted && errors.has('email')">{{errors.first('email')}}</span>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary editDetailsButton" @click="changeAccountInformation">Save Account Information</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Cookies from 'js-cookie'
    export default {
        name: "EditAccountInformationModal",
        data () {
            return {
                userData:[],
                passwordModal: false,
                submitted: false,
                first_name: '',
                last_name: '',
                email: '',
                dict : {
                    custom: {
                        first_name: {
                            required: 'Name can not be empty',
                            min: 'Name can not be less than 5 characters',
                            max: 'Name can not be more than 30 characters'
                        },
                        last_name: {
                            required: 'Surname can not be empty',
                            min: 'Surname can not be less than 5 characters',
                            max: 'Surname can not be more than 30 characters'
                        },
                        email: {
                            required: 'Email can not be empty',
                            email: 'Please enter valid email'
                        }
                    }
                }
            };
        },

        methods:{
            changeAccountInformation(){
                this.submitted = true;
                let _this = this;
                this.$validator.validate().then(valid => {
                    if (valid) {
                        axios.post(apiDev + '/update-profile', {
                            language:this.userData.language,
                            user_id:this.userData.user_id,
                            token:this.userData.token,
                            mobile: this.userData.mobile,
                            first_name: this.first_name,
                            last_name: this.last_name,
                            email: this.email,
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

                            if(response.data.response.httpCode == 200) {
                                this.$bvToast.toast(response.data.response.Message, {
                                    title: 'Basket',
                                    autoHideDelay: 5000,
                                    toaster: 'b-toaster-bottom-left',
                                    appendToast: true
                                })
                            }

                            let newUserData = {
                                userData:{
                                    httpCode: 200,
                                    Message: "User logged-in successfully",
                                    user_id: _this.userData.user_id,
                                    token: _this.userData.token,
                                    email: _this.email,
                                    mobile: _this.userData.mobile,
                                    first_name: _this.first_name,
                                    last_name: _this.last_name,
                                    image: _this.userData.image,
                                    facebook_id: _this.userData.facebook_id,
                                    mobile_verified: _this.userData.mobile_verified,
                                    city_id: _this.userData.city_id,
                                    location_id: _this.userData.location_id,
                                    outlet_id: _this.userData.outlet_id ? _this.userData.outlet_id : 67,
                                    express_user: _this.userData.express_user,
                                    express_user_end_date: _this.userData.express_user_end_date,
                                    country_id: _this.userData.country_id,
                                }
                            };

                            Cookies.set('userData', newUserData );
                            bus.$emit('editDetails', newUserData)
                            $('#editDetails').modal('hide')
                        }).catch(error => {

                        })
                    }
                })
            }
        },

        created(){
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.first_name = this.userData.first_name;
            this.last_name = this.userData.last_name;
            this.email = this.userData.email;
        },

        mounted(){
            this.$validator.localize('en', this.dict);

        }
    }
</script>

<style scoped>
    .fade{
        opacity: 1;
    }

    h4{
      font-size: 18px;
    }
</style>
