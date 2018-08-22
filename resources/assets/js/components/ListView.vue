<template>
    <div>
        <div class="row">
            <div class="col-2 ">
                <AsideView></AsideView>
            </div>
            <div class="col-8">
                <form class="form-inline">

                    <div class="input-group col-lg-12 col-md-12 col-sm-12">
                        <input type="text" v-model="form.text"  class="form-control search-text" @keyup.enter="search">
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
        </div>

    </div>
</template>

<script>
    import AsideView from "./AsideView.vue"

    export default {
        components: { AsideView },
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
