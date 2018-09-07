<template>
    <div>
        <ul class="list-group">
            <li class="list-group-item">
                <router-link to="/dashboard/categories">搜索分类名称</router-link>
            </li>
            <li class="list-group-item">
                <router-link to="/dashboard/product">商品检索(名称搜索)</router-link>
            </li>
            <li class="list-group-item">
                <router-link to="/dashboard/shop">搜索周边店铺</router-link>
            </li>
            <li class="list-group-item">
                <router-link to="/dashboard/aggs/category/product">统计分类下商品数量</router-link>
            </li>
            <li class="list-group-item">
                <router-link to="/dashboard/aggs/category/product/avg">列出分类下商品，计算价格平均值</router-link>
            </li>
        </ul>
    </div>

</template>

<script>

    export default {}
</script>