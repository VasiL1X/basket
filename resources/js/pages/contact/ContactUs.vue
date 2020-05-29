<template>
    <section class="container-fluid p-0">
        <b-navbar type="dark" variant="success">
            <b-navbar-nav>
                <b-navbar-brand>
                    <router-link :to="{name: 'home'}">
                        <img src="/images/logo-white.png" class="nav-logo" alt="">
                    </router-link>
                </b-navbar-brand>

            </b-navbar-nav>

            <b-navbar-nav class="ml-auto">
                <b-nav-item :to="{name: 'apply'}">Careers</b-nav-item>
                <b-nav-item :to="{name: 'help'}">Help</b-nav-item>
                <b-nav-item :to="{name: 'apply'}" class="btn btn-outline-light btn-sm become-shopper p-0">Become aShopper</b-nav-item>
            </b-navbar-nav>
        </b-navbar>


        <div class="bg-success text-light text-center press-text">
            <h1>Contact Us</h1>
        </div>


        <section class="container">
            <ul  v-for="contact in contacts" class="list-group col-10 m-auto font-weight-bolder">
                <div class="text-center font-weight-bolder p-4">
                    <h1 class="font-weight-bolder">{{ contact.title }}</h1>
                    <h6 class="text-secondary" v-for="text in contact.subtitles">{{ text }}</h6>
                </div>
                <li class="list-group-item-lg d-flex justify-content-between font-weight-bolder align-items-center" v-for="type in contact.types">
                    <h4 class="font-weight-bolder text-secondary"><i :class="type.icon"></i> {{ type.title }}</h4>
                    <b-link  :href="type.url" variant="success" tar class="text-success" pill>{{ type.link }}</b-link>
                </li>
            </ul>

            <div class="text-center mt-5">
                <h6 class="text-secondary">#4 Saed Al Saleh Street - Amman,Jordan</h6>
                <h6 class="text-secondary">PO BOX 2333 Amman 11821 Jordan</h6>
            </div>

        </section>

        <b-jumbotron class="mt-5 contact_us" text-variant="dark">
            <div class="row text-center">
                <div class="col-lg-11 d-inline text-center m-auto">
                    <div class="col-lg-3 col-md-12  p-5 d-inline-block">
                        <h5>Problem with an order?</h5>
                        <span class="text-secondary">Tell us what went wrong with a previous order and request a refund or redelivery.</span>
                        <hr class="my-4">
                        <button class="btn btn-success btn-sm">Report a problem</button>
                    </div>
                    <div class="col-lg-3 col-md-12 p-5 second-cont-item d-inline-block">
                        <h5>Email us</h5>
                        <span class="text-secondary">We're here to help. Email a Customer Happiness member.</span>
                        <hr class="my-4">
                        <button class="btn btn-success btn-sm">Email us</button>
                    </div>
                    <div class="col-lg-3 col-md-12 p-5 d-inline-block" style="line-height: 42px">
                        <h5>Call us</h5>
                        <span class="text-secondary">We're available 9:00 AM - 12:00 AM.</span>
                        <hr class="my-4">
                        <button class="btn btn-success btn-sm">+9622009944</button>
                    </div>
                </div>
            </div>
        </b-jumbotron>

        <section class="footer text-center">
            <ul class="footer_menu text-secondary font-weight-bold list-inline p-3 m-0">
                <li class="list-inline-item btn btn-link">
                    <router-link :to="{name: 'home'}" class="text-secondary">Basket.jo</router-link>
                </li>
                <li class="list-inline-item btn btn-link">
                    <router-link :to="{name: 'apply'}" class="text-secondary">Carers</router-link>
                </li>
                <li class="list-inline-item btn btn-link">
                    <router-link :to="{name: 'privacy'}" class="text-secondary">Privacy</router-link>
                </li>
                <li class="list-inline-item btn btn-link">
                    <router-link :to="{name: 'terms'}" class="text-secondary">Terms</router-link>
                </li>
            </ul>
        </section>
    </section>
</template>

<script>
    export default {
        name: "ContactUs",
        data(){
            return{
                contacts:[
                    {
                        title:'Customer Happiness Team',
                        types:[
                            {icon:'',title:' Help Center',link:'Go To Help Center',url:''},
                            {icon:'fas fa-envelope',title:' Email a Happiness member',link:'wecare@basket.jo',url:''},
                            {icon:'fas fa-mobile',title:'  Call a Happiness Member',link:'(+962) 6 200-9944',url:''},
                        ]
                    },{
                        title:'Personal Shoppers',
                        types:[
                            {icon:'fas fa-dollar-sign',title:' Become a Shopper',link:'Apply Now',url:'apply'},
                            {icon:'fas fa-envelope',title:' Shopper Support',link:'shoppers@basket.jo',url:''},
                        ]
                    },{
                        title:'Press & Media',
                        subtitles:[
                            'For press inquires or media related questions, please email us.',
                            'For logos, screenshots and assets, download our press kit or visit the press page'],
                        types:[
                            {icon:'',title:' Download Press Kit',link:'Download Press Kit',url:''},
                            {icon:'fas fa-envelope',title:'  Advertising & Paid Media',link:'marketing@basket.jo',url:''},
                            {icon:'fas fa-envelope',title:'  PR & Press Inquiries',link:'marketing@basket.jo',url:''},
                        ]
                    },{
                        title:'Retailers & Manufacturers',
                        subtitles:['Retailers and manufacturers interested in partnership, please email us:'],
                        types:[
                                {icon:'fas fa-envelope',title:'  Partnership Questions',link:'partners@basket.jo',url:''},
                        ]
                    },{
                        title:'Latest News',
                        subtitles: [
                            'Connect with us for special deals, announcements, and news about Basket.'
                        ],
                        types:[
                            {icon:'fas fa-rss',title:' Blog',link:'Download Press Kit',url:''},
                            {icon:'fab fa-twitter',title:'Twitter',link:'Latest News',url:''},
                            {icon:'fab fa-facebook-f',title:'Facebook',link:'basketapp.jo',url:''},
                            {icon:'fab fa-instagram',title:'Instagram',link:'basketapp.jo',url:''},
                        ]
                    },{
                        title:'Press & Media',types:[
                            {icon:'',title:' Download Press Kit',link:'Download Press Kit',url:''},
                            {icon:'fas fa-envelope',title:'  Advertising & Paid Media',link:'marketing@basket.jo',url:''},
                            {icon:'fas fa-envelope',title:'  PR & Press Inquiries',link:'marketing@basket.jo',url:''},
                        ]
                    },
                ],
            }
        }
    }
</script>

<style scoped>
    .nav-logo {
        max-height: 5.5vh;
        height: 100%;
    }

    .become-shopper {
        border-radius: 10px;
        font-weight: 700;
    }

    .press-text {
        border-top: 1px solid #ffffff1a;
        min-height: 220px;
        padding-top: 30px;
    }

    .press-text h1 {
        font-weight: bolder;
        opacity: .9;
    }

    .contact_us {
        background-color: #eef5f4;
        border: solid #e3e2df !important;
        border-right: none !important;
        border-left: none !important;
    }

    .second-cont-item {
        line-height: 20px;
        display: inline-block;
        border: 5px solid #e3e2df;
        border-bottom: none;
        border-top: none;
    }
    .footer{
        word-spacing: 15px;
    }

    .list-group {
        list-style: none;
        margin: 0 0 30px;
        padding: 0
    }

    .list-group li {
        -moz-border-bottom-colors: none;
        -moz-border-left-colors: none;
        -moz-border-right-colors: none;
        -moz-border-top-colors: none;
        border-color: #eee #eee currentcolor;
        border-image: none;
        border-style: solid solid none;
        border-width: 1px 1px 0;
        font-size: 18px;
        line-height: 36px;
        list-style: none;
        color: #727272;
        overflow: hidden;
        padding: 20px
    }

    .list-group li:first-child {
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        border-bottom: 1px solid #eee
    }

    .list-group li:last-child {
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
        border-bottom: 1px solid #eee
    }

    .list-group li a {
        color: #69dada
    }
</style>

