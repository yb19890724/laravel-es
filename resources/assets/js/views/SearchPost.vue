<template>

    <div>
        <form class="form-inline">

            <div class="input-group col-lg-12 col-md-12 col-sm-12">
                <input type="text" v-model="form.text" class="form-control search-text"  placeholder="请输入文章名称" @keyup.enter="search">
                <div class="input-group-btn">
                    <button class="btn btn-success" type="button" @click="search" >搜索</button>
                    <button class="btn btn-default" type="button" @click="resetText">重置</button>
                </div>
            </div>

        </form>

        <div class="card-columns my-5">
            <div class="card" v-for='product in products'>

                <div class="card-header text-right bg-transparent">
                    <small> {{ product.name }}</small>
                </div>
                <div class="card-body text-center text-success">
                    <img :src="product.avatar">
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
                form: {
                    text: ''
                },
                products: []
            }
        },
        methods: {
            search(){
                axios.post('/search', this.form)
                        .then(response => {
                    this.products = response.data.data
                })
            },
            resetText(){
                this.form.text="";
            }
        }

    }
</script>