<template>
    <div class="after_account_right">
        <div class="after_account_common">
            <h4 class="uppercase">Account Information</h4>
            <div class="my_list">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <p><strong>Phone</strong></p>
                    </div>
                    <div class="col-md-3 col-sm-7">
                        <p>{{userData.mobile}}</p>
                    </div>
                    <div class="col-md-3 col-sm-2">
                        <a href="javascript:void(0)">
                            Change
                        </a>
                    </div>
                </div>
                <div class="col-md-3 col-sm-2" style="display: none;">
                    <a href="javascript:void(0)" @click="changePassword">Change</a>
                </div>
            </div>
            <div class="my_list">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <p><strong>Password</strong></p>
                    </div>
                    <div class="col-md-3 col-sm-7">
                        <p>●●●●●●</p>
                    </div>
                    <div class="col-md-3 col-sm-2">
                        <a href="javascript:void(0)" data-toggle="modal" data-target=".change-password-modal">
                            Change
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="after_account_common">
            <h4 class="uppercase">Personal Information</h4>
            <div class="my_list">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <p><strong>First Name</strong></p>
                    </div>
                    <div class="col-md-9 col-sm-7">
                        <p>{{userData.first_name}}</p>
                    </div>
                </div>
            </div>
            <div class="my_list">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <p><strong>Last Name</strong></p>
                    </div>
                    <div class="col-md-9 col-sm-7">
                        <p>{{userData.last_name}}</p>
                    </div>
                </div>
            </div>
            <div class="my_list">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <p><strong>Email</strong></p>
                    </div>
                    <div class="col-md-9 col-sm-7">
                        <p>{{userData.email}}</p>
                    </div>
                </div>
            </div>
            <div class="my_list">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <p><strong>User Id</strong></p>
                    </div>
                    <div class="col-md-9 col-sm-7">
                        <p>{{userData.user_id}}</p>
                    </div>
                </div>
            </div>
            <div class="my_list">
                <div class="row">
                    <div class="col-md-12 col-sm-4">
                        <p>
                            <a href="javascript:void(0)" class="editDetails" data-toggle="modal" data-target=".editAccountInformation">
                                Change
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <change-password-modal >
        </change-password-modal>
        <EditAccountInformationModal >
        </EditAccountInformationModal>
    </div>
</template>

<script>


    import Cookies from 'js-cookie';
    import ChangePasswordModal from "../../components/ChangePasswordModal";
    import NextDeliveryModal from "../../components/NextDeliveryModal";
    import EditAccountInformationModal from "../../components/EditAccountInformationModal";
    export default {
        name: "profile",
        components: {EditAccountInformationModal, NextDeliveryModal, ChangePasswordModal},
        middleware: 'auth',

        data () {
            return {
              userData:[],
                passwordModal: false,
            };
        },

        methods:{
            changePassword(){

            }
        },

        created(){
            this.userData = JSON.parse(Cookies.get('userData')).userData

            bus.$on('editDetails', (data) => {
                if (data) {
                    this.userData = data.userData
                }
            });
            bus.$emit('changePage' , this.$route.name);

        },

        mounted(){

        }
    }
</script>

<style scoped>
    .after_account_right{
        margin-left: -50px;
    }

    .custom-switch .custom-control-label:before{
        background: gray;
        border: #E7E6E5;
    }
    .custom-switch .custom-control-label:after{
        background: white;
    }


    @media (max-width: 767px){
        .after_account_right{
            margin-left: 0 !important;

        }
    }
</style>
