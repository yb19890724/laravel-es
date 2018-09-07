<template>

    <div>
        <h2>统计商品分类下商品</h2>

        <div class="form-group">
            <label >排序规则:</label>
            <button type="button" class="btn btn-primary" @click="setSort('asc')">从小到大</button>
            <button type="button" class="btn btn-danger" @click="setSort('desc')">从大到小</button>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>序号</th>
                    <th>分类名称</th>
                    <th>商品数量</th>
                </tr>
            </thead>
            <tbody v-if="aggs!=''">
                <tr v-for="(val,index) in aggs">
                    <td>{{ index+1 }}</td>
                    <td>{{ val.key }}</td>
                    <td>{{ val.doc_count }}</td>
                </tr>

            </tbody>
        </table>
    </div>


</template>


<script>

    export default{
        data(){
            return {
                sort: 'asc',
                aggs: [] //统计数据
            }
        },
        created(){
            this.aggsCategoryProducts()
        },
        methods: {
            setSort(sort){
              this.sort=sort
                this.aggsCategoryProducts()
            },
            aggsCategoryProducts(){
                axios.post('/api/aggs/category/products' , {sort:this.sort})
                        .then(response=> {
                    this.aggs = response.data.data
                })
            }
        }

    }
</script>