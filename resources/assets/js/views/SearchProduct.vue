<template>

    <div>

        <div class="input-group col-lg-12 col-md-12 col-sm-12">
            <input type="text" v-model="text" @input="matchPhrasePrefix()" class="form-control search-text" laceholder="请输入商品名称"
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


        <div class="card-columns my-5">
            <div class="card" v-for='product in products'>

                <div class="card-header text-right bg-transparent">
                    <small> {{ product.name }}</small>
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
                products      : [],
                phrasesPrefix : []
            }
        },
        methods: {
            search(){
                axios.post('/api/search', {text:this.text})
                        .then(response=> {
                    this.products = response.data.data
                })
            },
            resetText(text){
                this.text=text
                this.phrasesPrefix=[];
            },
            matchPhrasePrefix(){

                this.text

                this.phrasesPrefix=[
                    {
                        name:'测试1'
                    },
                    {
                        name:'测试2'
                    }
                ]
            }
        }

    }
</script>