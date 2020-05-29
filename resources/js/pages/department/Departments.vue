<template>
    <div>
        <home-header></home-header>
        <div v-if="showDepartment" class="container">
            <div class="row depLIst">
                <div class="space"></div>
                <h1 class="main_title mt-4">Departments</h1>
                <div class="row_list_centered common_aisle_list department-content">
                    <div class="col-12 text-center">
                        <div v-for="department in departments"
                             class="col-lg-1 col-md-3 col-sm-4 m-1 p-0 departament bg-white">
                            <div class="top_position">
                                <router-link :to="{ path: '/store/'+outletName +'/departments/'+department.id }"
                                             :title="department.name">
                                    <img :src="department.image" @error="errorSrc">
                                </router-link>
                            </div>
                            <div class="aisle_list">
                                <h2 class="">
                                    <router-link :to="{ path: '/store/'+outletName +'/departments/'+department.id }"
                                                 data-bypass="false"
                                                 :title="department.name"
                                                 class="department_dept_title">
                                        {{department.name}}
                                    </router-link>
                                </h2>
                                <ul>
                                    <template v-for="(aisle, index) in department.aisle_list" v-if="index <= 3">
                                        <li>
                                            <router-link
                                                :to="{ path: 'store/'+outletName +'/departments/'+department.id+'/aisles/'+aisle.aisle_id}"
                                                :title="aisle.aisle_id"
                                                class="department_aisle_title">
                                                {{aisle.aisle_name}}
                                            </router-link>
                                        </li>
                                        <li v-if="index == 3">
                                            <router-link class="view_more"
                                                         :to="{ path: '/store/'+outletName +'/departments/'+department.id }">
                                                View more
                                                <i class="glyph-icon flaticon-arrows"></i>
                                            </router-link>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="space"></div>
                </div>
            </div>
        </div>
        <!--Loader-->
        <div class="container" v-else>
            <div class="row depLIst">
                <div class="space mt-5"></div>
                <div class="col-10 row_list_centered common_aisle_list department-content">
                    <div class="col-lg-2 col-md-3 col-sm-4 m-1 p-0 departament" style="width: 12rem;border: none;"
                         v-for="i in 16">
                        <div class="card-img-top animated-background"></div>
                        <div class="card-body">
                            <div class="text-animated card-title animated-background"></div>
                            <div class="text-animated card-title animated-background"></div>
                            <div class="text-animated card-title animated-background"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Loader-->
    </div>

</template>

<script>
    import Cookies from "js-cookie";
    import HomeHeader from "../../components/HomeHeader";

    export default {
        name: "Departments",
        middleware: 'auth',
        components: {HomeHeader},
        data() {
            return {
                language: Cookies.get('languageId'),
                userData: [],
                departments: {},
                showDepartment: false,
                outletInfo: {},
                outletName: ''
            };
        },

        methods: {
            errorSrc(event) {
                event.target.src = "/images/no_image.jpg"
            },

            getDepartments() {
                let _this = this;
                console.log(this.departments.length)
                axios.post(apiDev + '/store-department-aisle-list', {
                    language: _this.language,
                    user_id: _this.userData.user_id,
                    token: _this.userData.token,
                    outlet_id: _this.userData.outlet_id ? _this.userData.outlet_id : 67,
                }).then(response => {
                    _this.departments = response.data.response.department_list;
                    _this.showDepartment = true;
                }).catch(error => {

                })
            },

            getOutletInfo() {
                let _this = this;
                axios.post(apiDev + '/store-department-list-web', {
                    language: this.language,
                    outlet_id: this.userData.outlet_id ? this.userData.outlet_id : 67,
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.outletInfo = response.data.response.outlet_details;
                        _this.outletName = response.data.response.outlet_details.outlet_id
                    }
                }).catch(error => {

                })
            },
        },

        created() {

        },

        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.getOutletInfo();
            this.getDepartments();
        },
    }
</script>

<style scoped>
    .bg-success,.btn-success{
        background-color: #61bf3d!important;
    }
    .department_dept_title {
        max-width: 70%;
    }

    .card-img-top {
        height: 75px;
    }
    .depLIst{
        margin-top: 9rem;
        font-weight: 900;
    }

    .text-animated {
        height: 25px;
        width: 120px;
    }


    .row_list_centered {
        width: 100%;
        text-align: center;
    }

    .row_list {
        display: inline;
    }

    .departament {
        overflow: hidden;
        display: inline-block;
        border-radius: 5px;
        min-height: 200px;
        min-width: 200px;
    }

    .aisle_list {
        padding: 10px;
        margin-bottom: 9px;
        text-align: left !important;
        max-height: 15rem;
        height: 100%;
        min-height: 11rem;
    }

    .aisle_list h2 {
        color: #373a3c;
        font-size: 16px;
        font-weight: bolder;
        margin: 0;
        padding-bottom: 13px;
        z-index: 2;
        right: 10px;
    }

    .aisle_list h2 a {
        color: #262c1d;
        line-height: 16px;
        text-decoration: none;
        width: 100% !important;
        text-align: left !important;
    }

    .aisle_list ul {
        max-width: 70%;
        color: #757575;
        padding: 0;
        list-style-type: none;
        margin: 0;
        font-size: 16px;
    }

    .aisle_list li a {
        color: #757575;
        display: inline-block;
        font-size: 13px;
        text-align: left;
        font-weight: bolder;
        padding: 7px 7px 5px 0;
        line-height: 5px;
    }

    .top_position {
        position: absolute;
        top: -40px;
        left: 67%;
        bottom: 0;
        max-height: 100px;
        max-width: 100px;
        z-index: 1;
        border-radius: unset;
    }

    .top_position img {
        height: 100%;
        z-index: 1;
        position: relative;
        background-color: transparent;
    }

    .margin-auto {
        margin: auto;
    }

    .department-content {
        margin-top: 20px;
    }

    @media (min-width: 1025px) and (max-width: 1550px) {
        .col-md-2 {
            -webkit-box-flex: 0;
            flex: 0 0 16.666667%;
            max-width: 29.666667% !important;
        }
        .depLIst{
            margin-top: 5rem;
        }
    }


</style>
