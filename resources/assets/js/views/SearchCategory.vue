<template>

    <div>

        <div class="input-group col-lg-12 col-md-12 col-sm-12">
            <input type="text" v-model="form.text" class="form-control search-text"  placeholder="请输入分类名称" @keyup.enter="search">
            <div class="input-group-btn">
                <button class="btn btn-success" type="button" @click="search" >搜索</button>
                <button class="btn btn-default" type="button" @click="resetText">重置</button>
            </div>
        </div>

        <div class="my-5">
            <div class="container">
                <div class="btn-group" v-for='category in categories' >
                    <button type="button" class="btn btn-primary">{{ category.name }}</button>
                </div>
            </div>
        </div>

<!--
        <div class="card-columns my-5">

            <ul>
                <li v-for='category in categories'  >{{ category.name }}</li>
            </ul>

        </div>-->
    </div>



</template>

<script>

    export default{
        data(){
            return {
                form: {
                    text: ''
                },
                categories: []
            }
        },
        methods: {
            search(){
                axios.post('/api/search/categories', this.form)
                        .then(response => {
                    this.categories = response.data.data
                })
            },
            resetText(){
                this.form.text="";
            }
        }

    }
</script>