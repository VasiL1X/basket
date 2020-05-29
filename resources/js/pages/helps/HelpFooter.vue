<template>
    <div>
        <div class="modal fade report_user_popup bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="report_user_popup">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="promo_inner_sec">
                        <div class="form-group">
                            This feature is currently in development . Kindly contact support directly for any issues.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="basket_contact_us">
            <div class="container-fluid" style="max-width: 1201px;">
                <div class="row-fluid">
                    <div class="row">
                        <div class="col-md-4 col-xs-12 col-sm-4 border-right row-fluid_border_right">
                            <h3 class="row-fluid_h3">Problem with an order?</h3>
                            <div class="light row-fluid_light"> Tell us what went wrong with a previous order and request a refund or redelivery.
                            </div>
                            <a href="javascript:void(0)" class="btn btn-primary row-fluid_btn-primary" data-toggle="modal"
                               data-target=".report_user_popup">Report a problem
                            </a>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-4 border-right">
                            <h3>Email us</h3>
                            <div class="light"> We're here to help. Email a Customer Happiness member.</div>
                            <a class="btn btn-primary row-fluid_btn-primary" href="mailto:WeCare@basket.jo"> Email us </a>
                        </div>
                        <div class="col-md-4 col-xs-12 col-sm-4 border-none">
                            <h3>Call us</h3>
                            <div class="light">We're available 9:00 AM - 12:00 AM.</div>
                            <a class="btn btn-primary row-fluid_btn-primary" href="#">+9622009944</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navi_footer">
            <div class="container-fluid">
                <ul class="footer_naviv">
                    <li class="naviv-item-list-item">
                        <a href="" class="naviv-item-list-item-link"> Basket.jo </a>
                    </li>
                    <li class="naviv-item-list-item">
                        <a href="" class="naviv-item-list-item-link"> Careers </a>
                    </li>
                    <li class="naviv-item-list-item">
                        <a href="" class="naviv-item-list-item-link"> Privacy </a>
                    </li>
                    <li class="naviv-item-list-item">
                        <a href="" class="naviv-item-list-item-link"> Terms </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "HelpFooter"
    }
</script>

<style scoped>
    .modal-header {
        border-bottom: none;
    }
</style>
