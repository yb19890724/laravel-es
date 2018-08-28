
export default [
    {
        path: '/dashboard',
        component: require('./views/layouts/Home.vue'),
        children: [
            {
                path: '/',
                redirect: '/dashboard/product'
            },
            {
                path: 'product',
                component: require('./views/SearchProduct.vue')
            },
            {
                path: 'post',
                component: require('./views/SearchPost.vue')
            }
        ]
    }
]
