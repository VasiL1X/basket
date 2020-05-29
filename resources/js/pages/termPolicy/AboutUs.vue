<template>
    <div>
        <PolicyAndTermsHeader></PolicyAndTermsHeader>
        <div>
            <section class="hero_sections">
                <div class="hero-inner">
                    <h1 class="hero-title u-textCenter">{{aboutUs.title}} </h1>
                </div>
            </section>
            <section class="hero_sections_bottom">
                <div class="constrain_width">
                    <h3 class="section-heading"> Last Updated: {{updatedDate}} </h3>
                    <div class="constrain-width">
                        <p v-html="aboutUs.content"></p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>

<script>
    import PolicyAndTermsHeader from "./PolicyAndTermsHeader";
    export default {
        name: "AboutUs",
        components: {PolicyAndTermsHeader},
        data () {
            return {
                language:1,
                aboutUs:[],
                updatedDate:''
            };
        },

        methods: {
            getAboutUs() {
                let _this = this;
                axios.post(apiDev + '/cms-details', {
                    cms_url:'about-us',
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        _this.aboutUs = response.data.response.cms_details;
                        _this.updatedDate = moment(response.data.response.cms_details.updated_date).format('MMMM D, Y');
                    }
                }).catch(error => {

                })
            },
        },

        created() {
            this.getAboutUs();
        },

        mounted(){

        },
    }
</script>

<style scoped>

</style>
