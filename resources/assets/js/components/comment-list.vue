<template>
    <transition name="fade">
        <div class="panel panel-default" v-show="show">
            <div class="panel-heading">{{ commentData.length ? commentData.length + '条评论' : '评论' }}</div>
            <div class="panel-body">
                <template v-if="commentData.length != 0">
                    <transition-group name="list" tag="div">
                        <div class="comment-item" v-for="(item, index) in commentData" v-bind:key="index">
                            <div class="comment-top">
                                <div class="comment-user">
                                    <img src="/img/avatar04.png" class="comment-face">
                                    <span class="comment-name">{{ item.name }}</span>
                                </div>
                                <div class="comment-time">{{ item.time }}</div>
                            </div>
                            <div class="comment-content">{{ item.content }}</div>
                        </div>
                    </transition-group>
                </template>
                <template v-else>
                    <div class="text-center">
                        <img v-if="loading" src="/img/loading.gif" alt="">
                        <span v-else>这里还没有评论...</span>
                    </div>
                </template>
            </div>
            <div class="panel-footer comment-footer">
                <input type="text" class="form-control" placeholder="写下你的评论..." v-model="content">
                <button v-if="commentBtn"
                        @click="postComment"
                        class="btn btn-primary comment-submit">评论</button>
                <button class="btn btn-primary comment-submit" v-else>........</button>
            </div>
        </div>
    </transition>
</template>

<script>
    export default {
        props: {
            parentId: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                url: '',
                loading: true,
                commentBtn: true,
                content: '',
                show: false,
                commentData: []
            }
        },
        methods: {
            /**
             * 该组件被触发时的初始化方法
             * @param module
             */
            toggleShow(module) {
                this.url = `/${module}/${this.parentId}/comment`;
                this.show = !this.show;
                if (module == 'question') {
                    $('#commentModal').on('hidden.bs.modal', event => {
                        this.show = false;
                    });
                }
                if (this.show === true) {
                    this._initLoad();
                }
                if (this.show === false) {
                    setTimeout(() => {
                        this.commentData = [];
                    }, 500);
                }
            },
            /**
             * 提交评论
             */
            postComment() {
                let _this = this;
                axios.post(this.url, {
                    content: _this.content
                }).then((res) =>{
                    this.content = '';
                    this.commentBtn = true;
                    this.commentData.push(res.data);
                }).catch((err) => {
                    console.log(err);
                });
            },
            /**
             * 加载评论
             * @private
             */
            _initLoad() {
                axios.get(this.url).then((res) => {
                    if (res.data.length != 0) {
                        this.commentData = res.data;
                    } else {
                        this.loading = false;
                    }
                }).catch((err) => {
                    console.log(err);
                })
            }
        }
    }
</script>

<style lang="sass" scoped>
    .fade-enter-active, .fade-leave-active
        transition: opacity .5s
    .fade-enter, .fade-leave-to
        opacity: 0
    .list-item
        display: inline-block
        margin-right: 10px
    .list-enter-active, .list-leave-active
        transition: all 1s
    .list-enter, .list-leave-to
        opacity: 0
        transform: translateY(30px)
    .comment-item
        padding-bottom: 10px
        margin-bottom: 10px
        border-bottom: 1px solid #eee
        &:last-child
            border-bottom: none
        .comment-top
            display: flex
            justify-content: space-between
            margin-bottom: 10px
            .comment-face
                height: 30px
                width: 30px
                margin-right: 10px
            .comment-name
                font-weight: bold
    .comment-footer
        display: flex
        justify-content: space-between
        .comment-submit
            margin-left: 10px
</style>