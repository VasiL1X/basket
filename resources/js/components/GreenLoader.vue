<template>
    <div class="row cf">
        <div class="three col">
            <div class="loader" id="loader-1"></div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "GreenLoader"
    }
</script>

<style scoped>

    /*   Loader Start */

    .three {
        position: absolute;
        padding: 0;
        margin: 0 auto;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        width: 100%;
        display: inline-block;
        background-color: #2125298c;
        z-index: 999;
    }

    .col:first-of-type {
        margin-left: 0;
    }

    /* CLEARFIX */

    .cf:before,
    .cf:after {
        content: " ";
        display: table;
    }

    .cf:after {
        clear: both;
    }

    .cf {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        bottom: 0;
        margin: auto;
        padding: 0;
        z-index: 999;
        height: 100%;
        display: inline-flex;
    }

    /* ALL LOADERS */

    .loader {
        width: 50px;
        height: 50px;
        border-radius: 100%;
        position: fixed;
        margin: auto;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        padding: 0;
        z-index: 999;
    }

    /* LOADER 1 */

    #loader-1:before, #loader-1:after {
        content: "";
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 100%;
        border: 7px solid transparent;
        border-top-color: green;
    }

    #loader-1:before {
        z-index: 100;
        animation: spin .9s infinite;
        animation-timing-function: linear;
    }

    #loader-1:after {
        border: 7px solid #61bf3d;
    }

    @keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    /*   Loader End   */
</style>
