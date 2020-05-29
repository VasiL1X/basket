<template>
    <div>
        <!-- cash on delivery -->
        <div class="after_account_right">
            <div class="after_account_common info_cridt">
                <div class="credit-card-info">
                    <p class="centered curr_card_text">
                        <strong>
                            <span>Cash on delivery</span>
                        </strong>
                    </p>
                    <div class="clearfix">

                    </div>
                </div>
            </div>
        </div>
        <!--       end cash on delivery-->
        <div class="add_card_infos add-card-infos-div">
            <ul>
                <li>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#addNewCard">New
                        card
                    </button>
                </li>
            </ul>
        </div>
        <div class="after_account_right">
            <div v-for="item in cardLists" class="after_account_common info_cridt">
                <div class="credit-card-info">
                    <p class="centered curr_card_text">
                        <strong>
                            <span id="card_label_410">{{item.card_label}}</span>
                            <span class="card-number-span0">{{item.card_number}}</span>

                        </strong></p>
                    <div id="card_btn" style="display: inline-block"><strong>
                        <div class="dropdown">
                            <button @click="showDropDown(item.card_id, open)" class="dropbtn">...
                            </button>
                            <div :id="'myDropdown_'+item.card_id" class="dropdown-content">
                                <a href="javascript:void(0)" class="cart-btn-link" @click="deleteCard(item.card_id)">Delete</a>
                                <a href="javascript:void(0)" class="cart-btn-link" @click="updateLabel(item)">Update
                                    label</a>
                                <a href="javascript:void(0)" class="cart-btn-link" @click="makeDefault(item.card_id)"> Make default </a>
                            </div>
                        </div>
                    </strong></div>
                    <strong>
                        <i v-if="item.default_card" class="glyph-icon flaticon-star"></i>
                    </strong>
                    <p></p>
                    <div class="clearfix">
                    </div>
                </div>

            </div>

        </div>
        <AddNewCardComponent></AddNewCardComponent>
        <CardLabel></CardLabel>
    </div>
</template>

<script>
    import Cookies from 'js-cookie';
    import AddNewCardComponent from '../../components/AddNewCardModal'
    import CardLabel from "../../components/CardLabel";

    export default {
        name: "payment",
        components: {
            CardLabel,
            AddNewCardComponent
        },

        data() {
            return {
                userData: [],
                language: 1,
                cardLists: [],
                open: false
            };
        },

        methods: {
            getUserCardList() {
                let _this = this;
                axios.post(apiDev + '/card-list', {
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    language: this.language
                }).then(response => {
                    this.cardLists = response.data.response.card_list
                }).catch(error => {

                })
            },

            showDropDown(id) {
                if (this.open == false) {
                    $('#myDropdown_' + id).show();
                    this.open = true;
                } else {
                    $('#myDropdown_' + id).hide();
                    this.open = false;
                }
            },

            deleteCard(cardId) {
                axios.post(apiDev + '/delete-card', {
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    language: this.language,
                    card_id: cardId
                }).then(response => {
                    if (response.data.response.httpCode == 200) {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        });
                        $('#myDropdown_' + cardId).hide();
                        this.open = false;
                    }

                    if (response.data.response.httpCode == 400) {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        })
                    }
                    this.getUserCardList();
                }).catch(error => {

                })
            },

            updateLabel(card) {
                $(".update_label").modal()
                bus.$emit('card', card);

                if (this.open == false) {
                    $('#myDropdown_' + card.card_id).show();
                    this.open = true;
                } else {
                    $('#myDropdown_' + card.card_id).hide();
                    this.open = false;
                }

            },

            makeDefault(cardId) {
                let _this = this;
                axios.post(apiDev + '/update-user-card-default-status', {
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    language: this.language,
                    card_id: cardId
                }).then(response => {
                    $('#myDropdown_' + cardId).hide();
                    this.open = false;
                    if (response.data.response.httpCode == 200) {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        });
                    }

                    if (response.data.response.httpCode == 400) {
                        this.$bvToast.toast(response.data.response.Message, {
                            title: 'Basket',
                            autoHideDelay: 5000,
                            toaster: 'b-toaster-bottom-left',
                            appendToast: true
                        })
                    }
                    this.getUserCardList();
                }).catch(error => {

                })

            }
        },

        mounted() {
            this.userData = JSON.parse(Cookies.get('userData')).userData
            this.getUserCardList();
            bus.$on('cardUpdate', (data) => {
                if (data) {
                    this.getUserCardList();
                }
            });

            bus.$emit('changePage', this.$route.name);
        },

        created() {

        }
    }
</script>

<style scoped>
    .add_card_infos .btn-danger {
        background: 0 0;
        border: 1px solid #e5edec;
        height: 51px;
        padding: 0 30px;
        color: #e3e2df;
    }

    .add-card-infos-div > ul > li > button {
        width: 100%;
        color: var(--theme-color) !important;
        background-color: white !important;
    }

    .add-card-infos-div {
        width: 100%;
    }

    .add_card_infos {
        display: inline-block;
        margin-bottom: 14px;
    }

    .add_card_infos {
        padding-left: 15px;
    }

    .after_account_right {
        margin-left: -50px;
    }

    @media (max-width: 767px) {
        .after_account_right {
            margin-left: 0px !important;

        }
    }

    hr.part_cash {
        border-top: 2px solid #ff9259;
        width: 103.5%;
        margin-left: -10px;
        border-style: dashed;
    }

    .add-card-infos-div > ul > li {
        width: 100%;
    }

    .default_card a {
        border-radius: 8px;
        border: 3px solid #438ead;
    }

    .add-card-infos-div {
        width: 100%;
    }

    .add-card-infos-div > ul {
        width: 100%;
        margin-left: 0px;
    }

    .add-card-infos-div > ul > li {
        width: 100%;
    }

    .add-card-infos-div > ul > li > button {
        width: 100%;
        color: var(--theme-color) !important;
        background-color: white !important;
    }
</style>
