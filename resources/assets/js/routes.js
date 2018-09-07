
export default [
    {
        path: '/dashboard',
        component: require('./views/layouts/Home.vue'),
        children: [
            {
                path: '/',
                redirect: '/dashboard/categories'
            },
            {
                path: 'categories',
                component: require('./views/SearchCategory.vue')
            },
            {
                path: 'product',
                component: require('./views/SearchProduct.vue')
            },
            {
                path: 'shop',
                component: require('./views/SearchNearyShop.vue')
            },
            {
                path: 'aggs/category/product',
                component: require('./views/AggsCategoryProducts.vue')
            },
            {
                path: 'aggs/category/product/avg',
                component: require('./views/AggsCategoryProductAvg.vue')
            }
        ]
    }
]
