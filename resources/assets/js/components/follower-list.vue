<template>
    <div class="panel panel-default">
        <div class="panel-heading">{{ followerList.length }}人关注了</div>
        <div class="panel-body">
            <template v-if="followerList.length != 0">
                <div v-for="(item, index) in followerList" class="media follower-item">
                    <div class="media-left">
                        <a>
                            <img class="follower-avatar img-rounded" src="/img/avatar04.png" lass="media-object">
                        </a>
                    </div>
                    <div class="media-body">
                        <h5 class="media-heading" v-html="item.name"></h5>
                        <div class="count">
                            <span>{{ item.answers }} 回答</span> ·
                            <span>{{ item.questions }} 问题</span> ·
                            <span>{{ item.followers }} 关注者</span>
                        </div>
                    </div>
                    <div class="media-right media-middle">
                        <button v-show="myId != item.id" v-if="item.isFollow" @click="onToggleFollow(item.id, index)" class="btn is-follow">取消关注</button>
                        <button v-show="myId != item.id"  v-else @click="onToggleFollow(item.id, index)" class="btn btn-primary"><span class="fa fa-plus"></span> 关注</button>
                    </div>
                </div>
            </template>
            <template v-else>
                <div v-if="loading" class="loading"><img src="/img/loading.gif"></div>
                <div v-else class="loading">这里还没人关注！</div>
            </template>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    export default {
        props: {
            parentId: {
                type: String,
                required: true
            },
            myId: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                followerList: [],
                followHref: '',
                userHref: '',
                loading: true
            }
        },
        methods: {
            onGetFollower(module) {
                let url = `/${module}/${this.parentId}/followers`;
                axios.get(url).then((res) => {
                    if (res.data.length != 0) {
                        this.followerList = res.data;
                    } else {
                        this.loading = false;
                    }
                });
            },
            onToggleFollow(id, index) {
                let url = '/user/' + id + '/toggleFollow';
                axios.post(url).then((res) => {
                    if (res.data.attached.length != 0) {
                        this.followerList[index].isFollow = true;
                    } else {
                        this.followerList[index].isFollow = false;
                    }
                });
            }
        }
    }
</script>

<style lang="sass" scoped>
    .follower-item
        border-bottom: 1px solid #eee
        padding-bottom: 15px
        &:last-child
            border-bottom: none
        .follower-avatar
            width: 60px
            height: 60px
        count span
            color: #ccc
        .is-follow
            background: #c3ccd9
            color: #fff
    .loading
        text-align: center
</style>