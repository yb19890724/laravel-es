<template>

    <div>

        <div class="input-group col-lg-12 col-md-12 col-sm-12">
            <input type="text" v-model="position" @input="matchPhrasePrefix()" class="form-control"
                   placeholder="请输入坐标点"
                   @keyup.enter="search">
            <div class="input-group-btn">

                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">{{ this.distanceTitle}}</button>
                    <div class="dropdown-menu" >
                        <a class="dropdown-item" v-for="distance in distances" href="javascript:;" @click="setDistance(distance)">{{ distance }}公里</a>
                    </div>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary dropdown-toggle" data-toggle="dropdown">{{ sortTitle }}</button>
                    <div class="dropdown-menu" >
                        <a class="dropdown-item" href="javascript:;" v-for="(val,index) in sortDistance" @click="setSort(index)">{{val}}</a>
                    </div>
                </div>


                <button class="btn btn-success" type="button" @click="search">搜索</button>
                <button class="btn btn-default" type="button" @click="resetText">重置</button>
            </div>
        </div>

        <div class="card-columns my-5">
            <div class="card" v-for='shop in shops'>

                <div class="card-header text-right bg-transparent">
                    <small> 店铺名称：{{ shop.name }}</small>
                </div>
                <div class="card-body text-center text-success">
                    <p>距离:{{ shop.distance }}</p>
                    <p>经度:{{ shop.location.lat }}</p>
                    <p>纬度:{{ shop.location.lon }}</p>
                </div>

                <div class="card-footer bg-transparent">
                    <h5 class="card-text"> {{ shop.address }}</h5>
                </div>
            </div>
        </div>
    </div>


</template>


<script>

    export default{
        data(){
            return {
                position     : '39.903731,116.397743' ,
                distance     :  1,
                distances    : [1,2,3] ,
                shops        : [], //商品数据
                distanceTitle: '选择距离(默认一公里)',
                sortTitle    : '排序(默认由近到远)',
                sortDistance : {
                    asc :'由近到远',
                    desc:'由远到近'
                },
                sort         : 'asc'
            }
        },
        methods: {
            search(){
                if (this.location != '') {
                    let formData={
                        position:this.position,
                        distance:this.distance,
                        sort:this.sort,
                    }
                    axios.post('/api/search/nearby/shop' , formData)
                            .then(response=> {
                        this.shops = response.data.data
                    })
                }
            },
            setDistance(distance){
                this.distance=distance
                this.distanceTitle=distance+'公里'
                this.search()
            },
            setSort(sort){
                this.sort=sort
                this.sortTitle=this.sortDistance[sort]
                this.search()
            },
            resetText(){
                this.text = ''
                this.distanceTitle = '选择距离(默认一公里)'
                this.position = '39.903731,116.397743'
                this.sort = 'asc'
                this.sortTitle = '排序(默认由近到远)'
            }

        }

    }
</script>