<template>
    <div class="after_account_right">
        <div class="after_account_common">
            <div class="after_account_addres">
                <div class="icModalRow_basket">
                    <ul class="icModalRow_basket-list">
                        <li v-for="language in languages"
                            class="change-language icModalRow_basket-list-item"
                            :onclick="(language.id != cookiesLanguageId) ? getLanguageId(language.id) : ''"
                            :data-target="(language.id != cookiesLanguageId) ? '#modal-promo' : ''"
                            :data-toggle="(language.id != cookiesLanguageId) ? 'modal' : ''">
                            <div class="row">
                                <div class="text-left" style="padding-left: 15px; width: 49%; display: inline-block">
                                    <p>{{language.name}}</p>
                                </div>
                                <div class=" text-right" style="padding-right: 15px; width: 49%; display: inline-block">
                                    <i v-if="language.id == cookiesLanguageId" class="fa fa-check" aria-hidden="true"
                                       style="font-size: 18px;"></i>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <change-country-and-language-modal :text="modalText" :type="type"
                                           :languageId="languageId"></change-country-and-language-modal>
    </div>
</template>

<script>
    import Cookies from 'js-cookie'
    import ChangeCountryAndLanguageModal from "../../components/ChangeCountryAndLanguageModal";

    export default {
        name: "languages",
        components: {ChangeCountryAndLanguageModal},
        middleware: 'auth',
        data() {
            return {
                userData: [],
                languages: {},
                modalText: "language",
                type: 'language',
                languageId: '',
                cookiesLanguageId: Cookies.get('languageId'),
            };
        },

        methods: {
            getLanguages() {
                axios.get(apiDev + '/language-list').then(response => {
                    this.languages = response.data.response.language_list;
                }).catch(error => {
                    this.showLoader = false;
                })
            },

            getLanguageId(id) {
                this.languageId = id;
            }
        },

        created() {
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.getLanguages();

            bus.$on('languageId', (data) => {
                if (data) {
                    this.cookiesLanguageId = data
                }
            }),
                bus.$emit('changePage' , this.$route.name);


        },

        mounted() {

        }
    }
</script>

<style scoped>
    .after_account_right {
        margin-left: -50px;
    }

    @media (max-width: 767px) {
        .after_account_right {
            margin-left: 0px !important;

        }
    }
</style>
