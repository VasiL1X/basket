<template>
    <section class="container-fluid heroes_page" :style="bg_image">
        <div class="row p-1">
            <div class="col-12 text-center">
                <img class="white_logo" src="images/logo-white.png" alt="Our Logo">
            </div>
            <div class="col-md-6 col-sm-12 p-2 my_form_layout">
                <div class="card col-md-8 col-sm-12 m-auto">
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold text-center">Are you a student and looking to make extra
                            income? <span class="text-warning">Join Basket Heroes Program Now!</span></h4>
                        <div class="col-12">
                            <form onsubmit="return false">
                                <div class="container">
                                    <div class="form-row">
                                        <div class="form-group col-md-6 mb-2">
                                            <input  type="text"
                                                   v-model="user.first_name"
                                                   class="form-control"
                                                   id="first_name"
                                                   placeholder="First Name"
                                                   v-validate="'required'"
                                                   :options="user.first_name"
                                                   name="first_name">
                                            <span class="error-message" v-if="errors.has('last_name')">The first name filed is required</span>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <input  type="text"
                                                   v-model="user.last_name"
                                                   class="form-control"
                                                   id="last_name"
                                                   placeholder="Last Name"
                                                   v-validate="'required'"
                                                   :options="user.last_name"
                                                   name="last_name">
                                            <span class="error-message" v-if="errors.has('last_name')">The last name filed is required</span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 mb-2">
                                            <multiselect id="mobile_code"
                                                         v-model="user.country_code"
                                                         v-validate="'required'"
                                                         name="mobile_code"
                                                         :options="mobileCode.options"
                                                         class="multiselect"
                                                         track-by="text"
                                                         label="text">
                                                <template slot="singleLabel" slot-scope="{ option }">
                                                    <span>{{ option.text }}</span>
                                                </template>
                                            </multiselect>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <input  type="text"
                                                   v-model="user.mobile"
                                                   class="form-control"
                                                   id="mobile"
                                                   placeholder="Phone Number"
                                                   v-validate="'required|numeric'"
                                                   :options="user.mobile"
                                                   name="mobile">
                                            <span class="error-message" v-if="errors.has('mobile')">{{errors.first('mobile')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 mb-2">
                                            <input  type="email"
                                                   v-model="user.email"
                                                   class="form-control"
                                                   id="email"
                                                   placeholder="Email"
                                                   v-validate="'required|email'"
                                                   :options="user.email"
                                                   name="email">
                                            <span class="error-message" v-if="errors.has('email')">{{errors.first('email')}}</span>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <multiselect id="city"
                                                         v-model="city.value"
                                                         :options="city.options"
                                                         name="city"
                                                         v-validate="'required'"
                                                         placeholder="Please Choose"
                                                         class="multiselect">
                                            </multiselect>
                                            <span class="error-message" v-if="errors.has('city')">{{errors.first('city')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6 mb-2">
                                            <multiselect
                                                          id="gender"
                                                          v-model="user.gender"
                                                          :options="gender.options"
                                                          name="gender"
                                                          v-validate="'required'"
                                                          placeholder="Please Choose"
                                                          class="multiselect">
                                            </multiselect>
                                            <span class="error-message" v-if="errors.has('gender')">{{errors.first('gender')}}</span>
                                        </div>
                                        <div class="form-group col-md-6 mb-2">
                                            <input  type="date" class="form-control"
                                                   id="date_of_birth"
                                                   name="date_of_birth"
                                                   v-validate="'required'"
                                                   placeholder="Date Of Birth"
                                                   v-model="user.date_of_birth">
                                            <span class="error-message" v-if="errors.has('date_of_birth')">The date of birth filed is required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar"></div>
                                </div>
                                <div class="container">
                                    <div class="form-row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label for="university">Name of University?</label>
                                            <multiselect  id="university"
                                                         v-model="user.graduation"
                                                         name="university"
                                                         v-validate="'required'"
                                                         :options="university.options"
                                                         class="multiselect"
                                                         placeholder="Please Choose">
                                            </multiselect>
                                            <span class="error-message" v-if="errors.has('university')">{{errors.first('university')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label for="major">What is your major?</label>
                                            <input  type="major" v-model="user.major"
                                                   class="form-control"
                                                   id="major"
                                                   placeholder="Please type"
                                                   v-validate="'required'"
                                                   :options="user.major"
                                                   name="major">
                                            <span class="error-message" v-if="errors.has('major')">{{errors.first('major')}}</span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label for="workExp">Do you have prior work experience?</label>
                                            <multiselect
                                                id="workExp"
                                                v-model="user.work"
                                                :options="work.options"
                                                class="multiselect"
                                                v-validate="'required'"
                                                name="work"
                                                placeholder="Please Choose">
                                            </multiselect>
                                            <span class="error-message" v-if="errors.has('work')">The work experience filed is required</span>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 mb-2">
                                            <label for="englishLevel">How good is your spoken English?</label>
                                            <multiselect
                                                id="englishLevel"
                                                v-model="user.english"
                                                aria-required="true"
                                                v-validate="'required'"
                                                :options="englishLevel.options"
                                                class="multiselect"
                                                placeholder="Please Choose"
                                                name="english">
                                            </multiselect>
                                            <span class="error-message" v-if="errors.has('english')">The spoken English filed is required</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-2">
                                    <button class="btn btn-lg btn-success font-weight-bold text-center col-12" @click="createHero">
                                        Submit <i class="fa fa-arrow-right text-justify pt-1"></i>
                                    </button>
                                    <span class="font-weight-bold text-secondary pt-1">
                                    We will use this information to communicate with you about your application.
                                </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
    import Multiselect from 'vue-multiselect'
    export default {
        name: "Heroes",
        components: {
            Multiselect
        },
        data() {
            return {
                bg_image: {'background-image': 'url(images/heroes_background.jpg)'},
                mobileCode: {
                    options: [],
                },
                city: {
                    options: ["Amman", "Irbid", "Zarqa"]
                },
                gender: {
                    options: ['Male','Female']
                },
                university: {
                    options: [
                        'University of Jordan',
                        'University of Petra',
                        'Princess Sumaya University for Technology',
                        'American University of Madaba',
                        'German Jordanian University',
                        'Applied Science Private University',
                        'Middle East University',
                        'Hashemite University',
                        'Other'
                    ]
                },
                work: {
                    options: ['Yes', 'No']
                },
                englishLevel: {
                    options: ['Begginer', 'Intermediate', 'Fluent']
                },
                user: {
                    first_name: '',
                    last_name: '',
                    mobile: '',
                    email: '',
                    major: '',
                    date_of_birth: '',
                    country_code: {text: 'Jordan (+962)', code: 962},
                    city: 'Amman',
                    graduation: '',
                    english: '',
                    work: '',
                    gender: ''
                },
                myErrors: {}
            }
        },
        methods: {
            filterPhoneCodes() {
                let codesObj = window.phone_codes;
                codesObj.forEach((item) => {
                    this.mobileCode.options.push({
                        text: item.name + ' (' + item.dial_code + ')',
                        code: parseInt(item.dial_code)
                    });
                });
            },

            createHero() {
                this.$validator.validate().then(validate => {
                    let old_code_obj = this.user.country_code;
                    if (validate) {
                        this.user.country_code = this.user.country_code.code;
                        this.user.work = this.user.work === "Yes" ? 1 : 0;
                        axios.post(apiDev + '/heroes-applicant', this.user).then(response => {
                            if (response.data.response.httpCode == 200) {
                                this.$router.push({ name: 'heroes.thank.you' });
                            } else {
                                this.user.country_code = old_code_obj;
                                this.user.work = this.user.work === 1 ? "Yes" : "No";
                            }
                        }).catch(error => {
                            this.user.country_code = old_code_obj;
                            this.user.work = this.user.work === 1 ? "Yes" : "No";
                        })
                    }else{
                        this.myErrors = {
                            first_name: "first_name",
                            last_name: "last_name",
                            mobile: "mobile",
                            major: "major",
                            email: "email",
                        };
                    }
                });
            },
        },
        created() {
            this.filterPhoneCodes();
        },
        mounted() {

        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>
    .heroes_page {
        min-height:100vh;
        background-size: cover;
        height: 100%;
        background-position: top;
        background-repeat: no-repeat;
    }

    @media only screen and (min-width: 768px) {
        .my_form_layout {
            left: 26%;
            top: 2rem;
        }

        .my_form_layout .m-auto {
            width: 100%;
        }
    }

    .white_logo {
        height: 40px;
    }

    .progress {
        height: 3px;
        border: none;
        margin: 30px auto;
    }

    .text-justify {
        position: relative;
        top: 1px;
    }
    .form-control {
        height: calc(1.5em + 0.90rem + 2px);
        border-color: #e8e8e8;
    }
    .multiselect{
        font-size: 1rem;
    }

    .h-tooltip {
        z-index: 99999!important;
    }

    .error-message{
        color: red;
    }

</style>
