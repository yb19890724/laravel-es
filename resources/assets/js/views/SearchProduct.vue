<template>

    <div>

        <div class="input-group col-lg-12 col-md-12 col-sm-12">
            <input type="text" v-model="text" @input="matchPhrasePrefix()" class="form-control search-text"
                   placeholder="请输入商品名称"
                   @keyup.enter="search">
            <div class="input-group-btn">
                <button class="btn btn-success" type="button" @click="search">搜索</button>
                <button class="btn btn-default" type="button" @click="resetText">重置</button>
            </div>

        </div>

        <div v-if="phrasesPrefix.length">
            <ul class=" mt-2 my-2 col-8" v-for="phrasePrefix in phrasesPrefix">
                <li class="list-group-item" @click="resetText(phrasePrefix.name)">{{ phrasePrefix.name }}</li>
            </ul>
        </div>


        <div class="container my-5">
            <p>商品分类：</p>
            <div class="btn-group" v-for='category in categories'>
                <button type="button" class="btn btn-primary" @click="resetCategoryId(category.id)">{{ category.name }}
                </button>
            </div>
        </div>

        <div class="card-columns my-5">
            <div class="card" v-for='product in products'>

                <div class="card-header text-right bg-transparent">
                    <div class="container">
                        <button type="button" class="btn btn-success btn-sm">商品名称</button>：
                            <span style="color: #dc3545;font-weight:bold;font-size: 20px;" v-html="product.highlight"></span>,
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

<style>

</style>

<script>

    export default{
        data(){
            return {
                text: '' ,
                products: [] ,//商品数据
                phrasesPrefix: [] ,//联想搜索
                categories: [] ,//分类数据
                selectCategoryId: ""
            }
        } ,
        created(){
            axios.post('/api/select/categories' , {text: this.text})
                    .then(response=> {
                this.categories = response.data.data
        })
        } ,
        methods: {
            search(){
                this.phrasesPrefix = [];
                if (this.text != '') {

                    let formData = {
                        text: this.text ,
                        category_id: this.selectCategoryId
                    }
                    axios.post('/api/search/product' , formData)
                            .then(response=> {
                        this.products = response.data.data.data
                    })
                }
            } ,
            resetText(text){
                this.text          = text
                this.phrasesPrefix = [];
                this.search()
            } ,
            resetCategoryId(categoryId){
                this.selectCategoryId = categoryId
                this.search()
            } ,
            matchPhrasePrefix(){

                if (this.text != '') {
                    axios.post('/api/search/product/prefix' , {text: this.text})
                            .then(response=> {
                        this.phrasesPrefix = response.data.data
                    })
                }
            }
        }

    }
</script>