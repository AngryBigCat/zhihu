<template lang="pug">
    div.topic
        div.topic-box
            div.media.topic-item
                div.media-left
                    a(href="#")
                        img(src="img/avatar04.png").media-object.topic-img
                div.media-body
                    h4.media-heading.topic-title: a(href="#") 互联网
                    div 互联网（英语：Internet），是网络与网络之间所串连成的庞大网络，这些网络以一组标准的网络TCP/IP协议族相连，链接全世界几十亿个设备，形成逻辑上的单一巨大国际网络。这是一个网络的网络，它是由从地方到全球范围内几百万个私人的，学术界的，企业的和政府的网络所构成，通过电子，无线和光纤网络技术等等一系列广泛的技术联系在一起.这种将计算机网络互相联接在一起的方法可称作“网络互联”，在这基础上发展出覆盖全世界的全球性互联网络称互联网，即是互相连接一起的网络。
                    div.bottom
                        ul.list-unstyled.list-inline
                            li: a(href="#") <span class="fa fa-comment"></span> 127683 个问题
                            li: a(href="#") <span class="fa fa-user"></span> 10279107 个关注
                        a.btn.btn-primary.btn-sm 关注
        div.topic-bottom
            a.btn.btn-default.btn-md.btn-block 更多
</template>

<script type="text/ecmascript-6">
    export default {
        created() {

        }
    }
</script>

<style scoped lang="sass">
    .topic-box
        padding-top: 10px
        margin-bottom: 10px
        .topic-item
            border-bottom: 1px solid #eee
            padding: 10px 0
            &:last-child
                border-bottom: none
            .topic-img
                width: 60px
                height: 60px
                border-radius: 5px
            .topic-title a
                font-size: 16px
            .bottom
                display: flex
                justify-content: space-between
                align-items: center
                ul li a
                    color: #ccc
                    font-size: 13px
</style>