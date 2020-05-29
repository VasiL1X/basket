<template>
    <div>
        <PolicyAndTermsHeader></PolicyAndTermsHeader>
        <div>
            <section class="hero_sections">
                <div class="hero-inner">
                    <h1 class="hero-title u-textCenter">{{privacyPolicy.title}} </h1>
                </div>
            </section>
            <section class="hero_sections_bottom">
                <div class="constrain_width">
                    <h3 class="section-heading"> Last Updated: {{updatedDate}} </h3>
                    <div class="constrain-width">
                        <p v-html="privacyPolicy.content"></p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>
<script>
    import PolicyAndTermsHeader from "./PolicyAndTermsHeader";
    export default {
        name: "PrivacyPolicy",
        components:{
            PolicyAndTermsHeader
        },

        data () {
            return {
                language:1,
                privacyPolicy:[],
                updatedDate:''
            };
        },

        methods: {
            getPrivacyPolicy() {
                let _this = this;
                axios.post(apiDev + '/cms-details', {
                    cms_url:'privacy-policy',
                }).then(response => {
                    let updateTime = response.data.response.cms_details.updated_date;
                    if (response.data.response.httpCode == 200) {
                        _this.privacyPolicy = response.data.response.cms_details;
                        _this.updatedDate = moment(updateTime).format('MMMM D, Y');
                    }
                }).catch(error => {

                })
            },
        },

        created() {
            this.getPrivacyPolicy();
        },

        mounted(){

        },
    }
</script>

<style scoped>

</style>
