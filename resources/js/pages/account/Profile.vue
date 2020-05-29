<template>
    <div class="account__content">
        <div class="account__content-common">
            <h4 class="account__content-header">Account Information</h4>
            <div class="account__content-row row">
                <div class="account__content-field col-md-4 col-sm-4">
                    <p>Email</p>
                </div>
                <div class="account__content-field col-md-5 col-sm-7">
                    <p>{{userData.email}}</p>
                </div>
                <div class="account__content-field col-md-3 col-sm-2">
                    <a href="javascript:void(0)">
                        Change
                    </a>
                </div>
            </div>
            <div class="account__content-row row">
                <div class="account__content-field col-md-4 col-sm-4">
                    <p>Password</p>
                </div>
                <div class="account__content-field col-md-5 col-sm-7">
                    <p>●●●●●●</p>
                </div>
                <div class="account__content-field col-md-3 col-sm-2">
                    <a href="javascript:void(0)" data-toggle="modal" data-target=".change-password-modal">
                        Change
                    </a>
                </div>
            </div>
        </div>
        <div class="account__content-common">
            <h4 class="account__content-header">Personal Information</h4>
            <div class="account__content-row row">
                <div class="account__content-field col-md-4 col-sm-4">
                    <p>First Name</p>
                </div>
                <div class="account__content-field col-md-8 col-sm-7">
                    <p>{{userData.first_name}}</p>
                </div>
            </div>
            <div class="account__content-row row">
                <div class="account__content-field col-md-4 col-sm-4">
                    <p>Last Name</p>
                </div>
                <div class="account__content-field col-md-8 col-sm-7">
                    <p>{{userData.last_name}}</p>
                </div>
            </div>
            <div class="account__content-row row">
                <div class="account__content-field col-md-4 col-sm-4">
                    <p>Phone</p>
                </div>
                <div class="account__content-field col-md-8 col-sm-7">
                    <p>{{userData.mobile}}</p>
                </div>
            </div>
            <div class="account__content-row row">
                <div class="account__content-field active_time_slotcol-md-4 col-sm-4">
                    <p>User Id</p>
                </div>
                <div class="account__content-field active_time_slotcol-md-8 col-sm-7">
                    <p>{{userData.user_id}}</p>
                </div>
            </div>
            <div class="account__content-row row">
                <div class="account__content-field active_time_slotcol-md-12 col-sm-4">
                    <p>
                        <a href="javascript:void(0)" class="editDetails" data-toggle="modal" data-target=".editAccountInformation">
                            Change
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="account__content-common">
            <h4 class="account__content-header">Accessibility</h4>
            <div class="account__content-row row">
                <div class="account__content-field col-sm-10 col-lg-11">
                    <p>Enamble High Contrast Colors</p>
                </div>
                <div class="account__content-field col-sm-2 col-lg-1">
                    <label class="switch switch-left-right">
                        <input class="switch-input" type="checkbox"
                            name="contrast_colors">
                        <span class="switch-label"></span>
                        <span class="switch-handle"></span>
                    </label>
                </div>
            </div>
            <div class="account__content-row row">
                <div class="account__content-field col-sm-10 col-lg-11">
                    <p>Enamble Increased Toast Duration</p>
                </div>
                <div class="account__content-field col-sm-2 col-lg-1">
                    <label class="switch switch-left-right">
                        <input class="switch-input" type="checkbox"
                            name="toast_duration">
                        <span class="switch-label"></span>
                        <span class="switch-handle"></span>
                    </label>
                </div>
            </div>
        </div>
        <change-password-modal>
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

        created(){
            this.userData = JSON.parse(Cookies.get('userData')).userData

            bus.$on('editDetails', (data) => {
                if (data) {
                    this.userData = data.userData
                }
            });
            bus.$emit('changePage' , this.$route.name);

        }
    }
</script>

<style lang="scss" scoped>
    .account__content {
        &-header {
            padding: 0;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 600;
            color: #262c1d;
        }
        &-row {
            margin-bottom: 14px;
            p {
                font-size: 14px;
                margin: 0;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            a {
                color: var(--green-color);
                font-weight: 600;
            }
        }
    }


    @media (max-width: 991px){
        .account__content {
            &-header {
                margin-bottom: 14px;
                font-size: 20px;
            }
            &-row {
                p {
                    font-size: 12px;
                }
                a {
                    font-size: 12px;
                }
            }
        }
    }
    @media (max-width: 575px){
        .account__content-header {
            font-size: 18px;
        }
        .account__content-field {
            margin-bottom: 4px;
        }
    }
</style>
