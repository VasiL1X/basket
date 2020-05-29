<template>
    <div>
        <PolicyAndTermsHeader></PolicyAndTermsHeader>
        <div>
            <section class="hero_sections">
                <div class="hero-inner">
                    <h1 class="hero-title u-textCenter">{{termsConditions.title}}</h1>
                </div>
            </section>
            <section class="hero_sections_bottom">
                <div class="constrain_width">
                    <h3 class="section-heading"> Last Updated: {{updatedDate}}</h3>
                    <div class="constrain-width">
                        <p v-html="termsConditions.content"></p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>
<script>
    import PolicyAndTermsHeader from "./PolicyAndTermsHeader";
    export default {
        name: "TermsConditions",
        components:{
            PolicyAndTermsHeader
        },
        data () {
            return {
                language:1,
                termsConditions:[],
                updatedDate:''
            };
        },
        methods: {
            getTermsConditions() {
                let _this = this;
                axios.post(apiDev + '/cms-details', {
                    cms_url:'terms-conditions',
                }).then(response => {
                    let updateTime = response.data.response.cms_details.updated_date;
                    if (response.data.response.httpCode == 200) {
                        _this.termsConditions = response.data.response.cms_details;
                        _this.updatedDate = moment(updateTime).format('MMMM D, Y');
                    }
                }).catch(error => {

                })
            },
        },

        created() {
            this.getTermsConditions();
        },

        mounted(){

        },
    }
</script>

<style scoped>

</style>
