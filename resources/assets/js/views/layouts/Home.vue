<template>
    <div>
        <div class="row col mt-5">
            <div class="col-2 ">
                <Aside-View></Aside-View>
            </div>
            <div class="col-8">

                <router-view></router-view>
                    <!-- end row -->

            </div>
        </div>

    </div>
</template>

<script type="text/ecmascript-6">

    import AsideView from "../../components/AsideView.vue"

    export default {
        components: { AsideView }
    }
</script>
