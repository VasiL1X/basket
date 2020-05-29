<template>
    <div class="help__header">
        <div class="basket_header_outer_help" >
            <div class="container__middle">
                <div class="help__logo">
                    <router-link :to="{ name: 'home' }" title="Basket">
                        <img class="help__logo-img" 
                            src="/images/logo-white.png" 
                            alt="Basket">
                    </router-link>
                </div>
                <div class="help__header-title">
                    <router-link class="help__header-link" :to="{ name: 'help' }">
                        Help Center
                    </router-link>
                </div>
                <div class="help__header-search search_help">
                    <div class="input-group">
                        <div class="input-group-btn help__header-search-btn">
                            <button class="search-button">
                                <img src="/images/mobile_search.svg" alt="search">
                            </button>
                        </div>
                        <input class="form-control" id="" placeholder="How can we help you?" type="text">
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

<style lang="scss" scoped>
    .help {
        &__logo {
            padding-top: 80px;
            &-img {
                width: 240px;
            }
        }
        &__header {
            &-title {
                margin-top: 8px;
                margin-bottom: 64px;
            }
            &-link {
                font-size: 28px;
                font-weight: 600;
                color: #fff;
            }
            &-search {
                max-width: 640px;
                margin: 0 auto;
                padding-bottom: 48px;
                &-btn {
                    position: absolute;
                    z-index: 5;
                    top: 1px;
                }
            }
        }
    }
    .search-button:hover{
        background-color: rgb(212, 212, 212);
    }
    .search-button{
        background-color: white;
        border: none;
        height: 46px;
        padding: 0px 10px;
        border-radius: 4px;
        outline: none;
    }
</style>
