<template>
    <div>
        <div class="basket_header_outer_help" >
            <div class="container-fluid">
                <div class="container_middle">
                    <div class="help_logo">
                        <router-link :to="{ name: 'home' }" title="Basket"><img
                            src="/images/logo-white.png" alt=""
                            style="width:200px;">
                        </router-link>
                    </div>
                    <span>
                        <router-link :to="{ name: 'help' }">
                            Help Center
                        </router-link>
                    </span>
                    <div class="search_help">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button class="btn btn-success search-button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <input class="form-control" id="" placeholder="How can we help you?"
                                   type="text">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "HelpHeaderHome"
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
        background-color: white;
        vertical-align: middle;
        border-color: white;
        height: 46px !important;
        border-bottom-right-radius: 0px;
        border-top-right-radius: 0px;
    }
</style>
