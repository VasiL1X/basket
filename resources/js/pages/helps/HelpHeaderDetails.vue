<template>
    <div>
        <div class="basket_header_outer_help height_elps" >
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="help_logo">
                            <router-link :to="{ name: 'home' }" title="Basket">
                                <img src="/images/logo-white.png" alt="" style="width:140px;">
                            </router-link>
                        <router-link :to="{ name: 'help' }" title="Basket">
                            <span> Help Center</span>
                        </router-link>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-8 col-xs-12">
                        <div class="search_help">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button class="btn search-button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                                <input class="form-control ui-autocomplete-input" id="appendedInput" placeholder="How can we help you?" type="text" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "HelpHeaderDetails"
    }
</script>

<style scoped>
    .fa-search{
        font-size: 24px;
    }
    .search-button:hover{
        background-color: white;
        border-color: white;
    }
    .search-button{
        color: #ccc;
        background: #fff;
        border: none;
        height: 48px;
        margin-right: -1px;
        border-bottom-right-radius: 0px;
        border-top-right-radius: 0px;
    }
</style>
