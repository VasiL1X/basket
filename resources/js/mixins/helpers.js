export const helpers = {
    methods: {
        getToken() {
            let r = Math.random().toString(36).substr(2, 8);
            let t = Math.random().toString(36).substr(2, 7);
            return r + t;
        },

        // addItemToCartHelper(outletItemId, language, userData, cartQty){
        //     axios.post(apiDev + '/add-cart', {
        //         language: language,
        //         user_id: userData.user_id,
        //         token: userData.token,
        //         outlet_id:userData.outlet_id,
        //         outlet_item_id:outletItemId,
        //         quantity: 1 + cartQty,
        //         notes:''
        //     }).then(response => {
        //         if (response.data.response.httpCode == 200) {
        //             if(cartQty == 0){
        //                 bus.$emit('addToCart', response.data.response.cart_count)
        //             }
        //             this.getStoreHomePageList();
        //         }
        //     }).catch(error => {
        //         this.showLoader = false;
        //     })
        // },

        addItemToCartHelper(item,  languageID, userData, cartQty) {
            axios.post(apiDev + '/add-cart', {
                language: languageID,
                user_id: userData.user_id,
                token: userData.token,
                outlet_id: item.outlet_id,
                outlet_item_id: item.outlet_item_id,
                quantity: cartQty,
                notes: ''
            }).then(response => {
                if (response.data.response.httpCode == 200) {
                    bus.$emit('showTo', item);
                    bus.$emit('addToCart', response.data.response.cart_count);
                    this.$bvToast.toast(response.data.response.Message, {
                        title: 'Basket',
                        autoHideDelay: 5000,
                        toaster: 'b-toaster-bottom-left',
                        appendToast: true
                    });
                    this.$ga.query('ecommerce:add_to_cart' , item);
                    this.$ga.event('Add To Cart' , 'added');
                    bus.$emit('add-item-to-cart', true);
                }

                if (response.data.response.httpCode == 400) {
                    this.$bvToast.toast(response.data.response.Message, {
                        title: 'Basket',
                        autoHideDelay: 5000,
                        toaster: 'b-toaster-bottom-left',
                        appendToast: true
                    })
                }
            }).catch(error => {
            })
        },
    }
}
