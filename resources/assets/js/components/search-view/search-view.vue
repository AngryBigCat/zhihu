<template>
    <div>
        <ul class="nav nav-tabs">
            <router-link tag="li" to="/content" active-class="active"><a>内容</a></router-link>
            <router-link tag="li" to="/people" active-class="active"><a>用户</a></router-link>
            <router-link tag="li" to="/topic" active-class="active"><a>话题</a></router-link>
        </ul>
        <router-view></router-view>
    </div>
</template>

<script>
    import router from '../../router/search';

    export default {
        router,
        data() {
            return {
                message: 'asd'
            }
        },
        created() {

        }
    }
</script>

<style lang="scss" scoped>

</style>
