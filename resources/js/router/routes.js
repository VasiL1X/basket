import auth from "../middleware/auth";

function page (path) {
  return () => import(/* webpackChunkName: '' */ `~/pages/${path}`).then(m => m.default || m)
}

export default [
    { path: '*', name: '404', component: page('errors/404.vue') },
    { path: '/', name: 'login', component: page('auth/Login.vue') },
    { path: '/register', name: 'register', component: page('auth/Register.vue') },
    { path: '/forgot/password', name: 'forgot.password', component: page('auth/ForgotPassword.vue') },
    { path: '/verification/:id', name: 'verification', component: page('auth/Verification.vue') },
    { path: '/home', name: 'home', component: page('Home.vue') },
    { path: '/help', name: 'help', component: page('helps/Help.vue') },
    { path: '/help/pricing', name: 'help.pricing', component: page('helps/HelpPricing.vue') },
    { path: '/help/ordering', name: 'help.ordering', component: page('helps/HelpOrdering.vue') },
    { path: '/help/account', name: 'help.account', component: page('helps/HelpAccountSettings.vue') },
    { path: '/help/how/works', name: 'help.works', component: page('helps/HelpHowBasketWorks.vue') },
    { path: '/help/payments', name: 'help.payments', component: page('helps/HelpPayments.vue') },
    { path: '/help/delivery', name: 'help.delivery', component: page('helps/HelpDelivery.vue') },
    { path: '/checkout', name: 'checkout', component: page('Checkout.vue')},
    { path: '/apply', name: 'apply', component: page('apply/Apply.vue') },
    { path: '/apply/thank-you', name: 'apply.thank.you', component: page('apply/ThankYou.vue') },
    { path: '/terms-conditions', name: 'terms.conditions', component: page('termPolicy/TermsConditions.vue') },
    { path: '/privacy-policy', name: 'privacy.policy', component: page('termPolicy/PrivacyPolicy.vue') },
    { path: '/about-us', name: 'about.us', component: page('termPolicy/AboutUs.vue') },
    { path: '/contact-us', name: 'contact.us', component: page('contact/ContactUs.vue') },
    { path: '/account/orders-history-info/:id', name: 'orders.history.info', component: page('account/OrderHistoryInfo.vue') },
    { path: '/order-receipt/:id', name: 'orders.receipt', component: page('account/Receipt.vue') },
    { path: '/list/:name', name: 'list', component: page('discount/Discount.vue') },
    { path: '/search/:value', name: 'search', component: page('search/Search.vue') },
    { path: '/departments', name: 'departments', component: page('department/Departments.vue') },
    { path: '/store/:id/departments/:departmentId', name: 'department', component: page('department/Department.vue') },
    { path: '/store/:id/departments/:departmentId/aisles/:aisleId', name: 'aisle', component: page('department/Aisle.vue') },
    { path: '/store/orders/:id', name: 'new.order', component: page('orders/Order.vue') },
    { path: '/heroes', name: 'heroes', component: page('heroes/Heroes.vue') },
    { path: '/heroes/thank-you', name: 'heroes.thank.you', component: page('heroes/ThankYou.vue') },
    { path: '/press', name: 'press', component: page('termPolicy/Press.vue') },
    { path: '/chat', name: 'chat', component: page('Chat.vue') },



    {
        path: '/account',
        name: 'my.account.content',
        component: page('account/AccountContent.vue'),
        children: [
            {
                path: 'profile',
                name: 'profile',
                component: page('account/Profile.vue')
            },
            {
                path: 'order-history',
                name: 'orders.history',
                component: page('account/OrderHistory.vue')
            },
            {
                path: 'addresses',
                name: 'addresses',
                component: page('account/Addresses.vue')
            },
            {
                path: 'payment',
                name: 'payment',
                component: page('account/Payment.vue')
            },
            {
                path: 'coupons',
                name: 'coupons',
                component: page('account/Coupons.vue')
            },
            {
                path: 'notifications',
                name: 'notifications',
                component: page('account/Notifications.vue')
            },
            {
                path: 'express',
                name: 'express',
                component: page('account/Express.vue')
            },
            {
                path: 'help-works',
                name: 'account.help.works',
                component: page('account/HelpWorks.vue')
            },
            {
                path: 'countries',
                name: 'countries',
                component: page('account/Countries.vue')
            },
            {
                path: 'languages',
                name: 'languages',
                component: page('account/Languages.vue')
            }
        ]
    },



]
