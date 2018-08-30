
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
            }
        ]
    }
]
