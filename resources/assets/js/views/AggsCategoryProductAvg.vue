<template>

    <div>
        <h1>列出分类下商品，计算价格平均值</h1>


        <div class="container my-5">
            <p>请选择商品分类：</p>
            <div class="btn-group" v-for='category in categories'>
                <button type="button" class="btn btn-primary" @click="resetCategoryId(category.id)">{{ category.name }}
                </button>
            </div>
        </div>

        <div class="container">
            <button type="button" class="btn btn-info btn-sm">商品总数量</button>：{{ doc_count }}
            <button type="button" class="btn btn-success btn-sm">分类商品平均价格</button>：{{ single_category_avg_price }}
            <button type="button" class="btn btn-warning btn-sm">全部商品平均价格</button>：{{ all_category_avg_price }}

        </div>
        <div class="card-columns my-5">
            <div class="card" v-for='product in products'>

                <div class="card-header text-right bg-transparent">
                    <div class="container">
                        <button type="button" class="btn btn-success btn-sm">商品名称</button>：{{ product.name }},
                        <button type="button" class="btn btn-info btn-sm">商品分类</button>：{{ product.category.name }}
                    </div>
                </div>
                <div class="card-body text-center text-success">
                    <img :src="product.avatar" width="350" height="300">
                </div>

                <div class="card-footer bg-transparent">
                    <button type="button" class="btn btn-warning btn-sm">商品价格</button>：{{ product.price }}<br />
                    <button type="button" class="btn btn-sm">商品简介</button>：{{ product.description }}
                </div>
            </div>
        </div>
    </div>


</template>


<script>

    export default{
        data(){
            return {
                products: [] ,//商品数据
                categories: [] ,//分类数据
                selectCategoryId: "",
                doc_count:0,
                all_category_avg_price:0,
                single_category_avg_price:0
            }
        } ,
        created(){
            axios.post('/api/select/categories' , {text: this.text})
                    .then(response=> {
                this.categories = response.data.data
            })
        },
        methods: {
            search(){
                axios.post('/api/aggs/category/'+this.selectCategoryId+'/product/avg/' , {})
                        .then(response=> {
                             this.products = response.data.data.product
                             this.doc_count = response.data.data.doc_count
                             this.all_category_avg_price = response.data.data.all_category_avg_price
                             this.single_category_avg_price = response.data.data.single_category_avg_price
                        })
            } ,
            resetCategoryId(categoryId){
                this.selectCategoryId = categoryId
                this.search()
            }
        }

    }
</script>