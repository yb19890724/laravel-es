<template>

    <div>

        <div class="input-group col-lg-12 col-md-12 col-sm-12">
            <input type="text" v-model="text" @input="matchPhrasePrefix()" class="form-control search-text" placeholder="请输入商品名称"
                   @keyup.enter="search">
            <div class="input-group-btn">
                <button class="btn btn-success" type="button" @click="search">搜索</button>
                <button class="btn btn-default" type="button" @click="resetText">重置</button>
            </div>

        </div>

        <div v-if="phrasesPrefix.length" >
            <ul class=" mt-2 my-2 col-8"  v-for="phrasePrefix in phrasesPrefix">
                <li class="list-group-item" @click="resetText(phrasePrefix.name)">{{ phrasePrefix.name }}</li>
            </ul>
        </div>


        <div class="container my-5">
            <p>商品分类：</p>
            <div class="btn-group" v-for='category in categories' >
                <button type="button" class="btn btn-primary">{{ category.name }}</button>
            </div>
        </div>

        <div class="card-columns my-5">
            <div class="card" v-for='product in products'>

                <div class="card-header text-right bg-transparent">
                    <small> 商品名称：{{ product.name }},商品分类：{{  product.category}}</small>
                </div>
                <div class="card-body text-center text-success">
                    <img :src="product.avatar" width="350" height="300">
                </div>

                <div class="card-footer bg-transparent">
                    <h5 class="card-text"> {{ product.description }}</h5>
                </div>
            </div>
        </div>
    </div>


</template>


<script>

    export default{
        data(){
            return {
                text          : '',
                products      : [],//商品数据
                phrasesPrefix : [],//联想搜索
                categories : []//分类数据
            }
        },
        created(){
            axios.get('/api/select/categories', {text:this.text})
                    .then(response=> {
                this.categories = response.data.data
            })
        },
        methods: {
            search(){

                this.phrasesPrefix=[];
                if(this.text!=''){
                    axios.post('/api/search/product', {text:this.text})
                            .then(response=> {
                        this.products = response.data.data
                    })
                }
            },
            resetText(text){
                this.text=text
                this.phrasesPrefix=[];
                this.search()
            },
            matchPhrasePrefix(){

                if(this.text!=''){
                    axios.post('/api/search/product/prefix', {text:this.text})
                            .then(response=>{
                        this.phrasesPrefix = response.data.data
                    })
                }
            }
        }

    }
</script>