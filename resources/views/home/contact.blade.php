@extends('home.layouts.default')

@section('style')
	<style>
		.ContactPage{
			padding:50px;
		}
		.ContactPage>h1,.ContactPage>div{
			margin-bottom: 20px;
		}
	</style>
	@include('home.layouts._foot_style')
@stop

@section('content')
<div class="ContactPage">
    <h1 class="ContactPage-title"> 联系我们 </h1>
    <div class="ContactPage-para">
        知乎属于北京智者天下科技有限公司旗下品牌。知乎，中文互联网最大的知识社交平台。知乎以知识连接一切为使命，凭借认真、专业和友善的社区氛围和独特的产品机制，聚集了中国互联网上科技、商业、文化等领域里最具创造力的人群，将高质量的内容透过人的节点来成规模地生产和分享，构建高价值人际关系网络。用户通过问答等交流方式建立信任和连接，打造和提升个人品牌价值，并发现、获得新机会。
    </div>
    <div class="ContactPage-para">
        公司名称：北京智者天下科技有限公司
        <br> 地址：北京市海淀区学院路甲 5 号 768 创意园 A 座西区四通道 3-010
        <br> 电话：010-61190680
    </div>
    <div class="ContactPage-para">
        请通过以下方式联系我们：）
    </div>
    <div class="ContactPage-para">
        品牌合作：<a href="mailto:bd@zhihu.com">bd@zhihu.com</a>
    </div>
    <div class="ContactPage-para">
        广告投放：<a href="mailto:ad@zhihu.com">ad@zhihu.com</a>
    </div>
    <div class="ContactPage-para">
        媒体垂询：<a href="mailto:media@zhihu.com">media@zhihu.com</a>
    </div>
</div>
@include('home.layouts._footer')
@stop