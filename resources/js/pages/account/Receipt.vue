<template>
    <section class="container-fluid p-0">
        <div class="list" v-if="!showLoader">
            <nav class="navbar navbar-light bg-white">
                <router-link class="navbar-brand m-auto" :to="{name:'home'}">
                    <img src="/images/logo-normal.png" width="200" height="60" alt="">
                </router-link>
            </nav>
            <div class="row font-weight-bolder mt-2 d-block">
                <ul class="list-group col-lg-6 col-md-9 col-sm-11 m-auto mt-5 p-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center orderList">
                        <h4 class="text-white">{{ order.outlet_name }}</h4>
                        <h4>
                            <b-badge variant="light" pill>{{ order.shopped_item_list[0].product_list.length }}</b-badge>
                        </h4>
                    </li>
                    <li class="list-group-item">
                        <h4 class="text-secondary">Refunded Items</h4>
                    </li>
                    <li class="list-group-item d-inline" v-for="product in  order.shopped_item_list[0].product_list">
                        <tr class="row">
                            <td class="align-middle col-2 p-2 text-center">
                                <div class="d-inline-block">
                                    <img :src="product.product_image" @error="errorSrc" height="65" width="65">
                                </div>
                            </td>
                            <td class="align-middle col-6">
                                <div class="d-inline-block">
                                    <h6 class="text-info">{{ product.product_name }}</h6>
                                    <h6 class="text-secondary">
                                        <span v-if="product.status_available === 0">OUT OF STOCK</span>
                                        <div v-else>
                                            <span>{{ product.our_selling_price }} JD </span>
                                            - <span v-if="product.sold_per == 3 || product.sold_per == 4">each</span>
                                            <span v-if="product.sold_per === 2">each</span>
                                            <span v-if="product.sold_per === 1">{{ product.label_value }}  {{ product.unit }}</span>
                                        </div>
                                    </h6>
                                    <h6 class="text-dark mt-3">Reason: <i class="text-danger">Cancelled</i></h6>
                                </div>
                            </td>
                            <td class="align-middle col-2 p-4 font-weight-bolder">
                                <h6 class="text-dark">{{ product.actual_qty }} x</h6>
                            </td>
                            <td class="align-middle col-1 p-md-4 pt-4 font-weight-bolder">
                                <h6 class="text-secondary">{{ product.item_qty }}</h6>
                            </td>
                        </tr>
                    </li>
                </ul>
                <div class="order-total col-lg-6 col-md-9 col-sm-11  m-auto p-4 font-weight-bolder">
                    <h4 class="text-secondary border-bottom border-secondary p-1">Order Total</h4>
                    <div class="col-9 offset-3 p-2 text-secondary">
                        <ul class="p-0 list-type-none border-bottom  border-secondary">
                            <li><span>Subtotal </span> <span class="float-right ">JD {{ order.outlet_subtotal }}</span>
                            </li>
                            <li><span>Delivery Fee </span> <span class="float-right ">JD {{ order.outlet_total_delivery_fee }}</span>
                            </li>
                            <li><span>Discount </span> <span class="float-right ">JD {{ order.outlet_free_delivery_discount }}</span>
                            </li>
                            <li><span>Shopper Adjustment upon checkout  </span> <span class="float-right ">JD {{ order.shopper_adjustment }}</span>
                            </li>
                        </ul>
                        <p class="pr-0"><span>Total</span> <span class="float-right">JD {{ order.outlet_total }}</span>
                        </p>
                    </div>
                    <div class="col-12 p-5 text-center">
                        <button class="btn btn-outline-success" @click="printPage">Download PDF</button>
                    </div>
                </div>
            </div>
        </div>
        <green-loader v-else></green-loader>
    </section>
</template>

<script>
    import Cookies from "js-cookie";
    import GreenLoader from "../../components/GreenLoader";
    import jsPDF from 'jspdf'

    export default {
        name: "Receipt",
        components: {GreenLoader},
        data() {
            return {
                orderID: 0,
                userData: {},
                order: {},
                showLoader: true
            }
        },

        methods: {
            errorSrc(event) {
                event.target.src = "/images/no_image.jpg"
            },

            getOrderHistory() {
                bus.$emit('showGreenLoader', this.showLoader);
                axios.post(apiDev + '/order-history-info', {
                    user_id: this.userData.user_id,
                    token: this.userData.token,
                    language: this.language,
                    orders_outlets_id: this.orderID,
                }).then(response => {
                    this.showLoader = false;
                    this.order = response.data.response.order_outlet_detail;
                }).catch(error => {

                })
            },

            printPage() {
                let pdfName = 'test';
                let productsName = [];
                let productsPrice = [];
                this.order.shopped_item_list[0].product_list.forEach(product => {
                    productsName.push(product.product_name);
                    productsPrice.push("JD "+product.our_selling_price+"");
                });


                var doc = new jsPDF();
                let img = new Image(120,30);
                img.src = '/images/logo-normal.png';
                doc.addImage(img,'JPEG',75,15,50,15);
                let head = "Your order was placed on "+moment(this.order.created_date ).format('dddd, D MMM')+" from "+this.order.outlet_name;
                doc.text(head, 20, 45);
                doc.text("Order Totals:", 22, 70);
                doc.lstext(['Order Summary','Delivery Fee','Total'], 35, 85, 0);
                doc.lstext(["JD "+this.order.outlet_subtotal+"","JD "+this.order.outlet_total_delivery_fee+"","JD "+this.order.outlet_total+""], 155, 85, 0);
                doc.lstext(productsName, 35, 110, 0);
                doc.lstext(productsPrice, 155, 110, 0);
                doc.text('Total', 35, 220);
                doc.text("JD "+this.order.outlet_subtotal, 155, 220);
                doc.text("Thank you for choosing Basket.jo - The technology of the future. ", 25, 280);
                doc.save(pdfName + '.pdf');
            }
        },

        mounted() {
            this.orderID = this.$route.params.id;
            this.userData = JSON.parse(Cookies.get('userData')).userData;
            this.getOrderHistory();
        }
    }
</script>

<style scoped>
    .list-type-none {
        list-style-type: none;
    }

    .orderList {
        background-color: #cd55eb;
    }
</style>
