<template lang="pug">
    div.search-content
        div.time-sort
            div.btn-group
                a(href="#" data-toggle="dropdown").btn.btn-default.btn-sm.dropdown-toggle
                    | 时间不限
                    span.fa.fa-caret-down
                ul.dropdown-menu
                    li: a(href="#") 一天内
                    li: a(href="#") 一周内
                    li: a(href="#") 三个月内
        div.content-main
            div.content-item
                h3: a(href="#") 互联网的下一波红利在哪里？
                div.item-main
                    div.left
                        a(href="#")
                            span.fa.fa-caret-up
                            | {{ msg }}
                        a(href="#")
                            span.fa.fa-caret-down
                    div.right
                        div.author-info
                            span.author-name 宋健，
                            span.author-intro 技术元素主义者（Techniumist）
                        div.summary 不得不佩服作者对商业理解的精道 —— 成功的商人,就是比别人更懂得抢先把有价值的东西算到自己的账本上.商业的本质与必然趋势商业的本质是在市场交换中逐利,而市场交换的基础是物权和人们的需求.互联网时代与工业时代相比,商业上变化的根本动因就是物权分…显示全部
                        ul.list-unstyled.list-inline.actions
                            li: a(href="#") <span class="fa fa-plus"></span> 关注问题
                            li: a(href="#") <span class="fa fa-comment"></span> 242 条评论
                            li: a(href="#") <span class="fa fa-heart"></span> 感谢
                            li: a(href="#") <span class="fa fa-share"></span> 分享
        div.loadmore
            a(href="#").btn.btn-default.btn-md.btn-block 更多
</template>

<script type="text/ecmascript-6">
    export default {
        data() {
            return {
                msg: 23778
            }
        },
        created() {
        },
        mounted() {
        }
    }
</script>

<style scoped lang="sass">
    $item-border-color: #ddd
    $item-left-a-bg: #eff6fa
    $item-left-a-color: #698ebf
    .time-sort
        padding: 10px 0
    .content-item
        border-top: 1px solid $item-border-color
        padding-top: 20px
        padding-bottom: 10px
        h3
            font-size: 16px
            margin-bottom: 10px
            a
                font-weight: bold
        .item-main
            display: flex
            .left
                display: flex
                width: 50px
                margin-right: 10px
                flex-direction: column
                text-align: center
                a
                    padding: 5px 0
                    width: 50px
                    background-color: $item-left-a-bg
                    color: $item-left-a-color
                    margin-bottom: 5px
                    border-radius: 4px
                    text-decoration: none
                    &:hover
                        background-color: $item-left-a-color
                        color: #fff
                    span
                        display: block
            .right
                .author-info
                    margin-bottom: 5px
                    .author-name
                        font-weight: bold
                    .author-intro
                        color: #aaa
                .summary
                    margin-bottom: 5px
                .actions li a
                    color: #ccc
                    font-size: 13px

</style>