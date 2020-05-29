<template>
    <div>
        <HelpHeaderComponent></HelpHeaderComponent>
        <div class="order_summary_help">
            <div class="container">
                <div class="row">
                    <div class="help_tabs_sections">
                        <div class="row">
                            <div class="col-md-4 right_border">
                                <ul class="help_tabs_sections_list">
                                    <li class="section help_tabs_sections_list_item">
                                        <a href="javascript:void(0)" class="help_tabs_sections_list_item_link">
                                            Pricing
                                        </a>
                                    </li>
                                    <li class="help-links"
                                        v-bind:class="{ active: detail.id == selectedQuestionId}"
                                        @click="selectQuestion(detail.id)"
                                        data-id=""
                                        v-for="detail in helpDetails">
                                        <a href="javascript:void(0)">{{detail.question}}</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8">
                                <div class="right_helps_text">
                                    <p class="term_txt">The <a href="/terms-conditions" target="_blank">
                                        Basket Terms of Service </a> apply for any and all Basket Orders, Promotions, Credits, Refunds, and Possible Returns.
                                        In addition, the following additional terms apply with respect to the specific matters below</p>
                                    <br>
                                    <div class="inner_text_info show_help" v-if="detail.id == selectedQuestionId" v-for="detail in helpDetails">
                                        <div class="text">
                                            <img class="helps_imgs" src="/images/prising-01.png" alt="">
                                            {{detail.question}}
                                        </div>
                                        <div class="answer"  v-html="detail.answer"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <HelpFooterComponent></HelpFooterComponent>
    </div>
</template>

<script>
    import HelpFooterComponent from './HelpFooter'
    import HelpHeaderComponent from './HelpHeaderDetails'
    export default {
        name: "HelpPricing",
        data () {
            return {
                language:1,
                categoryId:2,
                helpDetails:[],
                selectedQuestionId:'',

            };
        },
        components: {
            HelpFooterComponent,
            HelpHeaderComponent
        },
        methods: {
            getHelpDetails() {
                let _this = this;
                axios.post(apiDev + '/help-details', {
                    category_id:_this.categoryId,
                    language: _this.language
                }).then(response => {

                    if (response.data.response.httpCode == 200) {
                        _this.helpDetails = response.data.response.help_details;
                        _this.selectedQuestionId = response.data.response.help_details[0].id
                    }
                }).catch(error => {

                })
            },
            selectQuestion(id){
                this.selectedQuestionId = id;
            }
        },

        created() {
            this.getHelpDetails();
        },

        mounted(){

        },
    }
</script>

<style scoped>

</style>
