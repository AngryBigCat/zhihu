<template lang="pug">
    div.people
        div.people-box
            div.people-item
                div.people-main
                    div.left
                        div.author-face
                            img(src="img/avatar04.png")
                        div.author-info
                            div.name
                                //fa-venus
                                a(href="#") 互联网吃货
                                span.fa.fa-mars
                            div.intro 写代码的手艺人，微信号:laoheipm
                    div.right
                        div.actions
                            a(href="#").actions-item
                                span 78
                                span 回答
                            a(href="#").actions-item
                                span 78
                                span 文章
                            a(href="#").actions-item
                                span 78
                                span 关注者
                div.item-bottom
                    a(href="#").btn.btn-primary.btn-sm.pull-right 关注用户
                    div.clearfix
        div.people-bottom
            a(href="#").btn.btn-default.btn-md.btn-block 更多
</template>

<script type="text/ecmascript-6">
    export default {}
</script>

<style scoped lang="sass">
    $item-bottom-border-color: #ddd
    .people
        padding-top: 10px
        .people-box
            margin-bottom: 10px
            .people-item
                border-bottom: 1px solid $item-bottom-border-color
                padding: 10px 0
                &:last-child
                    border: none
                .people-main
                    display: flex
                    justify-content: space-between
                    margin-bottom: 10px
                    .left
                        display: flex
                        .author-face
                            margin-right: 10px
                            img
                                width: 60px
                                height: 60px
                                border-radius: 5px
                        .author-info
                            .name a
                                margin-right: 5px
                            .intro
                                color: #bbb
                    .right
                        .actions
                            display: flex
                            .actions-item
                                padding: 0 10px
                                text-align: center
                                display: flex
                                flex-direction: column
                                border-right: 1px solid #eee
                                &:last-child
                                    border: none
                                span:first-child
                                    font-weight: bold
                                    color: #666
                                span:last-child
                                    color: #ccc
                                    font-size: 13px
                                &:hover
                                    color: #698ebf
                                    text-decoration: none
</style>