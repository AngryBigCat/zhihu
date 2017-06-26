@extends('home.layouts.default')

@section('style')
	@include('home.found.style')
@stop

@section('content')

<div class="container">
	{{-- 发现页面左半部分 --}}
	<div class="col-md-8">
		<div id="tuijian" class="">
			<div class="pull-left">
			<i class="fa fa-outdent" aria-hidden="true"></i>
			<span>编辑推荐</span>
			</div>
			<div class="pull-right">
			<a href="#">更多推荐<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
			</div>
		</div>
		{{-- 发现页面标题部分 --}}
		<div id="wenda" class="clearfix">
			<div>
				<a href="#"><h5>山西炸酱面和北京炸酱面有什么区别？</h5></a>
				<div class="media">
				  <div class="media-left">
				    <a href="#">
				      <img class="media-object" src="img/avatar3.png" alt="..." width="40px">
				    </a>
				  </div>
				  <div class="media-body">
				    <h4 class="media-heading"><a href="">六月事就，</a><span>净食爱好者</span></h4>
				    <div>
					    <a href="#" class="pull-left">
					      <img class="media-object" src="img/photo3.jpg" alt="..." width="200px">
					    </a>
						<span class="pull-right">
							正宗之词非常可笑，两个不同发源地的东西，怎么可能放在一个角度去对比谁更正宗？ 山西人做的是山西正宗的，北京人做的就是北京正宗的，这种问题岂不是和说“张默和房祖名谁是周润发的亲儿子”一样了？荒谬。 至于山西北京二地炸酱面的差别，这个问题很不好…
						</span>
				    </div>
				  </div>
				</div>							
			</div>
			<div>
				<a href="#"><h5>TRX 训练和传统器械训练相比有什么优劣势呢？</h5></a>
			</div>
			<div>
				<a href="#"><h5>BMW历史课：从1959年破产危机到一辈子怼奔驰</h5></a>
			</div>
			<div>
				<a href="#"><h5>职场兵法之兵不厌诈—工伤私了协议的博弈</h5></a>
			</div>
		</div>
		{{-- 发现页面热推部分 --}}
		<div id="retui">
			<div>

			  <!-- Nav tabs -->
			  <ul class="nav nav-tabs" role="tablist">
			    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">今日最热</a></li>
			    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">本月最热</a></li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
			    <div role="tabpanel" class="tab-pane active" id="home">
					<div class="lizi">
						<a href="#" >
							<h5>Deep Learning 一书中有哪些论述被最新研究验证、拓展或推翻了？</h5>
						</a>
						<div >
							<a href="#" class="pull-left"><span class="badge">42</span></a>
							<div class="pull-left">
								<a href="#">贾晓晓</a>
								<span class="aria-hidden">实用主义是最棒的，不好吃请滚，不好用请…</span>
								<p class="aria-hidden ">
									被折叠了么？那我就添加一部分干货
									首先，同意大部分答主的观点，日本人对调味料的使用的能力，如果说食神的调味料使用能力是10，只会用盐的野蛮人是1，中国的是7
									，那么日本人在2－3上下。
									（以下部分指且仅指日本本土料理 舶来品和挂中华两个字的一律不评论）
									调味基本靠老汤，还有某些人趋之若鹜的食材的鲜味，我是个吃货，日本的朋友带我在那边溜达，吃了两天就感觉难受，不是吃坏了的那种，就是嘴里寡淡。
									还是老铁领我去了趟中华街吃了波担担面提神醒脑。
									日本本土料理，问题就在于没有冲击力，主观点说就是没有那种浑身一个激灵然后呼出热气说爽的感觉。
									也就是很多答主说的吃的时间长了，觉得丧。吃不惯还是算了，我是东北人，整天大鱼大肉红油赤酱的，你让我研究研究日本文化这套玄幽物哀的体系，我没问题，但是要研究这套饮食，我宁可挂科也不想。
									还有，希望某一部分人不要提到鲜味就艾特广东同胞，调味料这个东西，不会用是不会，会但是不用是另一回事。

									作者：贾小晓
									链接：https://www.zhihu.com/question/55370905/answer/189293359
									来源：知乎
									著作权归作者所有，转载请联系作者获得授权。
								</p>
								<div>
									<a href="#"><i class="fa fa-plus" aria-hidden="true"></i> 关注问题 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span>106</span>条评论 </a>
									<span> . </span>

									<div class="a">
									<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 感谢 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-share" aria-hidden="true"></i> 分享 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i> 收藏 </a>
									<span> . </span>
									<a href="#"> 没有帮助 </a>
									<span>.</span>
									<a href="#"> 举报 </a>
									</div>
									<span> . </span>
									<a href="#"> 作者保留权利 </a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="lizi">
						<a href="#" >
							<h5>Deep Learning 一书中有哪些论述被最新研究验证、拓展或推翻了？</h5>
						</a>
						<div >
							<a href="#" class="pull-left"><span class="badge">42</span></a>
							<div class="pull-left">
								<a href="#">贾晓晓</a>
								<span class="aria-hidden">实用主义是最棒的，不好吃请滚，不好用请…</span>
								<p class="aria-hidden ">
									被折叠了么？那我就添加一部分干货
									首先，同意大部分答主的观点，日本人对调味料的使用的能力，如果说食神的调味料使用能力是10，只会用盐的野蛮人是1，中国的是7
									，那么日本人在2－3上下。
									（以下部分指且仅指日本本土料理 舶来品和挂中华两个字的一律不评论）
									调味基本靠老汤，还有某些人趋之若鹜的食材的鲜味，我是个吃货，日本的朋友带我在那边溜达，吃了两天就感觉难受，不是吃坏了的那种，就是嘴里寡淡。
									还是老铁领我去了趟中华街吃了波担担面提神醒脑。
									日本本土料理，问题就在于没有冲击力，主观点说就是没有那种浑身一个激灵然后呼出热气说爽的感觉。
									也就是很多答主说的吃的时间长了，觉得丧。吃不惯还是算了，我是东北人，整天大鱼大肉红油赤酱的，你让我研究研究日本文化这套玄幽物哀的体系，我没问题，但是要研究这套饮食，我宁可挂科也不想。
									还有，希望某一部分人不要提到鲜味就艾特广东同胞，调味料这个东西，不会用是不会，会但是不用是另一回事。

									作者：贾小晓
									链接：https://www.zhihu.com/question/55370905/answer/189293359
									来源：知乎
									著作权归作者所有，转载请联系作者获得授权。
								</p>
								<div>
									<a href="#"><i class="fa fa-plus" aria-hidden="true"></i> 关注问题 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span>106</span>条评论 </a>
									<span> . </span>

									<div class="a">
									<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 感谢 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-share" aria-hidden="true"></i> 分享 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i> 收藏 </a>
									<span> . </span>
									<a href="#"> 没有帮助 </a>
									<span>.</span>
									<a href="#"> 举报 </a>
									</div>
									<span> . </span>
									<a href="#"> 作者保留权利 </a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="lizi">
						<a href="#" >
							<h5>Deep Learning 一书中有哪些论述被最新研究验证、拓展或推翻了？</h5>
						</a>
						<div >
							<a href="#" class="pull-left"><span class="badge">42</span></a>
							<div class="pull-left">
								<a href="#">贾晓晓</a>
								<span class="aria-hidden">实用主义是最棒的，不好吃请滚，不好用请…</span>
								<p class="aria-hidden ">
									被折叠了么？那我就添加一部分干货
									首先，同意大部分答主的观点，日本人对调味料的使用的能力，如果说食神的调味料使用能力是10，只会用盐的野蛮人是1，中国的是7
									，那么日本人在2－3上下。
									（以下部分指且仅指日本本土料理 舶来品和挂中华两个字的一律不评论）
									调味基本靠老汤，还有某些人趋之若鹜的食材的鲜味，我是个吃货，日本的朋友带我在那边溜达，吃了两天就感觉难受，不是吃坏了的那种，就是嘴里寡淡。
									还是老铁领我去了趟中华街吃了波担担面提神醒脑。
									日本本土料理，问题就在于没有冲击力，主观点说就是没有那种浑身一个激灵然后呼出热气说爽的感觉。
									也就是很多答主说的吃的时间长了，觉得丧。吃不惯还是算了，我是东北人，整天大鱼大肉红油赤酱的，你让我研究研究日本文化这套玄幽物哀的体系，我没问题，但是要研究这套饮食，我宁可挂科也不想。
									还有，希望某一部分人不要提到鲜味就艾特广东同胞，调味料这个东西，不会用是不会，会但是不用是另一回事。

									作者：贾小晓
									链接：https://www.zhihu.com/question/55370905/answer/189293359
									来源：知乎
									著作权归作者所有，转载请联系作者获得授权。
								</p>
								<div>
									<a href="#"><i class="fa fa-plus" aria-hidden="true"></i> 关注问题 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span>106</span>条评论 </a>
									<span> . </span>

									<div class="a">
									<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 感谢 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-share" aria-hidden="true"></i> 分享 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i> 收藏 </a>
									<span> . </span>
									<a href="#"> 没有帮助 </a>
									<span>.</span>
									<a href="#"> 举报 </a>
									</div>
									<span> . </span>
									<a href="#"> 作者保留权利 </a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="lizi">
						<a href="#" >
							<h5>Deep Learning 一书中有哪些论述被最新研究验证、拓展或推翻了？</h5>
						</a>
						<div >
							<a href="#" class="pull-left"><span class="badge">42</span></a>
							<div class="pull-left">
								<a href="#">贾晓晓</a>
								<span class="aria-hidden">实用主义是最棒的，不好吃请滚，不好用请…</span>
								<p class="aria-hidden ">
									被折叠了么？那我就添加一部分干货
									首先，同意大部分答主的观点，日本人对调味料的使用的能力，如果说食神的调味料使用能力是10，只会用盐的野蛮人是1，中国的是7
									，那么日本人在2－3上下。
									（以下部分指且仅指日本本土料理 舶来品和挂中华两个字的一律不评论）
									调味基本靠老汤，还有某些人趋之若鹜的食材的鲜味，我是个吃货，日本的朋友带我在那边溜达，吃了两天就感觉难受，不是吃坏了的那种，就是嘴里寡淡。
									还是老铁领我去了趟中华街吃了波担担面提神醒脑。
									日本本土料理，问题就在于没有冲击力，主观点说就是没有那种浑身一个激灵然后呼出热气说爽的感觉。
									也就是很多答主说的吃的时间长了，觉得丧。吃不惯还是算了，我是东北人，整天大鱼大肉红油赤酱的，你让我研究研究日本文化这套玄幽物哀的体系，我没问题，但是要研究这套饮食，我宁可挂科也不想。
									还有，希望某一部分人不要提到鲜味就艾特广东同胞，调味料这个东西，不会用是不会，会但是不用是另一回事。

									作者：贾小晓
									链接：https://www.zhihu.com/question/55370905/answer/189293359
									来源：知乎
									著作权归作者所有，转载请联系作者获得授权。
								</p>
								<div>
									<a href="#"><i class="fa fa-plus" aria-hidden="true"></i> 关注问题 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span>106</span>条评论 </a>
									<span> . </span>

									<div class="a">
									<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 感谢 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-share" aria-hidden="true"></i> 分享 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i> 收藏 </a>
									<span> . </span>
									<a href="#"> 没有帮助 </a>
									<span>.</span>
									<a href="#"> 举报 </a>
									</div>
									<span> . </span>
									<a href="#"> 作者保留权利 </a>
								</div>
								
							</div>
						</div>
					</div>
			    </div>
			    <div role="tabpanel" class="tab-pane" id="profile">
					<div class="lizi">
						<a href="#" >
							<h5>Deep Learning 一书中有哪些论述被最新研究验证、拓展或推翻了？</h5>
						</a>
						<div >
							<a href="#" class="pull-left"><span class="badge">42</span></a>
							<div class="pull-left">
								<a href="#">贾晓晓</a>
								<span class="aria-hidden">实用主义是最棒的，不好吃请滚，不好用请…</span>
								<p class="aria-hidden ">
									被折叠了么？那我就添加一部分干货
									首先，同意大部分答主的观点，日本人对调味料的使用的能力，如果说食神的调味料使用能力是10，只会用盐的野蛮人是1，中国的是7
									，那么日本人在2－3上下。
									（以下部分指且仅指日本本土料理 舶来品和挂中华两个字的一律不评论）
									调味基本靠老汤，还有某些人趋之若鹜的食材的鲜味，我是个吃货，日本的朋友带我在那边溜达，吃了两天就感觉难受，不是吃坏了的那种，就是嘴里寡淡。
									还是老铁领我去了趟中华街吃了波担担面提神醒脑。
									日本本土料理，问题就在于没有冲击力，主观点说就是没有那种浑身一个激灵然后呼出热气说爽的感觉。
									也就是很多答主说的吃的时间长了，觉得丧。吃不惯还是算了，我是东北人，整天大鱼大肉红油赤酱的，你让我研究研究日本文化这套玄幽物哀的体系，我没问题，但是要研究这套饮食，我宁可挂科也不想。
									还有，希望某一部分人不要提到鲜味就艾特广东同胞，调味料这个东西，不会用是不会，会但是不用是另一回事。

									作者：贾小晓
									链接：https://www.zhihu.com/question/55370905/answer/189293359
									来源：知乎
									著作权归作者所有，转载请联系作者获得授权。
								</p>
								<div>
									<a href="#"><i class="fa fa-plus" aria-hidden="true"></i> 关注问题 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span>106</span>条评论 </a>
									<span> . </span>

									<div class="a">
									<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 感谢 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-share" aria-hidden="true"></i> 分享 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i> 收藏 </a>
									<span> . </span>
									<a href="#"> 没有帮助 </a>
									<span>.</span>
									<a href="#"> 举报 </a>
									</div>
									<span> . </span>
									<a href="#"> 作者保留权利 </a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="lizi">
						<a href="#" >
							<h5>Deep Learning 一书中有哪些论述被最新研究验证、拓展或推翻了？</h5>
						</a>
						<div >
							<a href="#" class="pull-left"><span class="badge">42</span></a>
							<div class="pull-left">
								<a href="#">贾晓晓</a>
								<span class="aria-hidden">实用主义是最棒的，不好吃请滚，不好用请…</span>
								<p class="aria-hidden ">
									被折叠了么？那我就添加一部分干货
									首先，同意大部分答主的观点，日本人对调味料的使用的能力，如果说食神的调味料使用能力是10，只会用盐的野蛮人是1，中国的是7
									，那么日本人在2－3上下。
									（以下部分指且仅指日本本土料理 舶来品和挂中华两个字的一律不评论）
									调味基本靠老汤，还有某些人趋之若鹜的食材的鲜味，我是个吃货，日本的朋友带我在那边溜达，吃了两天就感觉难受，不是吃坏了的那种，就是嘴里寡淡。
									还是老铁领我去了趟中华街吃了波担担面提神醒脑。
									日本本土料理，问题就在于没有冲击力，主观点说就是没有那种浑身一个激灵然后呼出热气说爽的感觉。
									也就是很多答主说的吃的时间长了，觉得丧。吃不惯还是算了，我是东北人，整天大鱼大肉红油赤酱的，你让我研究研究日本文化这套玄幽物哀的体系，我没问题，但是要研究这套饮食，我宁可挂科也不想。
									还有，希望某一部分人不要提到鲜味就艾特广东同胞，调味料这个东西，不会用是不会，会但是不用是另一回事。

									作者：贾小晓
									链接：https://www.zhihu.com/question/55370905/answer/189293359
									来源：知乎
									著作权归作者所有，转载请联系作者获得授权。
								</p>
								<div>
									<a href="#"><i class="fa fa-plus" aria-hidden="true"></i> 关注问题 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span>106</span>条评论 </a>
									<span> . </span>

									<div class="a">
									<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 感谢 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-share" aria-hidden="true"></i> 分享 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i> 收藏 </a>
									<span> . </span>
									<a href="#"> 没有帮助 </a>
									<span>.</span>
									<a href="#"> 举报 </a>
									</div>
									<span> . </span>
									<a href="#"> 作者保留权利 </a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="lizi">
						<a href="#" >
							<h5>Deep Learning 一书中有哪些论述被最新研究验证、拓展或推翻了？</h5>
						</a>
						<div >
							<a href="#" class="pull-left"><span class="badge">42</span></a>
							<div class="pull-left">
								<a href="#">贾晓晓</a>
								<span class="aria-hidden">实用主义是最棒的，不好吃请滚，不好用请…</span>
								<p class="aria-hidden ">
									被折叠了么？那我就添加一部分干货
									首先，同意大部分答主的观点，日本人对调味料的使用的能力，如果说食神的调味料使用能力是10，只会用盐的野蛮人是1，中国的是7
									，那么日本人在2－3上下。
									（以下部分指且仅指日本本土料理 舶来品和挂中华两个字的一律不评论）
									调味基本靠老汤，还有某些人趋之若鹜的食材的鲜味，我是个吃货，日本的朋友带我在那边溜达，吃了两天就感觉难受，不是吃坏了的那种，就是嘴里寡淡。
									还是老铁领我去了趟中华街吃了波担担面提神醒脑。
									日本本土料理，问题就在于没有冲击力，主观点说就是没有那种浑身一个激灵然后呼出热气说爽的感觉。
									也就是很多答主说的吃的时间长了，觉得丧。吃不惯还是算了，我是东北人，整天大鱼大肉红油赤酱的，你让我研究研究日本文化这套玄幽物哀的体系，我没问题，但是要研究这套饮食，我宁可挂科也不想。
									还有，希望某一部分人不要提到鲜味就艾特广东同胞，调味料这个东西，不会用是不会，会但是不用是另一回事。

									作者：贾小晓
									链接：https://www.zhihu.com/question/55370905/answer/189293359
									来源：知乎
									著作权归作者所有，转载请联系作者获得授权。
								</p>
								<div>
									<a href="#"><i class="fa fa-plus" aria-hidden="true"></i> 关注问题 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span>106</span>条评论 </a>
									<span> . </span>

									<div class="a">
									<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 感谢 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-share" aria-hidden="true"></i> 分享 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i> 收藏 </a>
									<span> . </span>
									<a href="#"> 没有帮助 </a>
									<span>.</span>
									<a href="#"> 举报 </a>
									</div>
									<span> . </span>
									<a href="#"> 作者保留权利 </a>
								</div>
								
							</div>
						</div>
					</div>
					<div class="lizi">
						<a href="#" >
							<h5>Deep Learning 一书中有哪些论述被最新研究验证、拓展或推翻了？</h5>
						</a>
						<div >
							<a href="#" class="pull-left"><span class="badge">42</span></a>
							<div class="pull-left">
								<a href="#">贾晓晓</a>
								<span class="aria-hidden">实用主义是最棒的，不好吃请滚，不好用请…</span>
								<p class="aria-hidden ">
									被折叠了么？那我就添加一部分干货
									首先，同意大部分答主的观点，日本人对调味料的使用的能力，如果说食神的调味料使用能力是10，只会用盐的野蛮人是1，中国的是7
									，那么日本人在2－3上下。
									（以下部分指且仅指日本本土料理 舶来品和挂中华两个字的一律不评论）
									调味基本靠老汤，还有某些人趋之若鹜的食材的鲜味，我是个吃货，日本的朋友带我在那边溜达，吃了两天就感觉难受，不是吃坏了的那种，就是嘴里寡淡。
									还是老铁领我去了趟中华街吃了波担担面提神醒脑。
									日本本土料理，问题就在于没有冲击力，主观点说就是没有那种浑身一个激灵然后呼出热气说爽的感觉。
									也就是很多答主说的吃的时间长了，觉得丧。吃不惯还是算了，我是东北人，整天大鱼大肉红油赤酱的，你让我研究研究日本文化这套玄幽物哀的体系，我没问题，但是要研究这套饮食，我宁可挂科也不想。
									还有，希望某一部分人不要提到鲜味就艾特广东同胞，调味料这个东西，不会用是不会，会但是不用是另一回事。

									作者：贾小晓
									链接：https://www.zhihu.com/question/55370905/answer/189293359
									来源：知乎
									著作权归作者所有，转载请联系作者获得授权。
								</p>
								<div>
									<a href="#"><i class="fa fa-plus" aria-hidden="true"></i> 关注问题 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span>106</span>条评论 </a>
									<span> . </span>

									<div class="a">
									<a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> 感谢 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-share" aria-hidden="true"></i> 分享 </a>
									<span> . </span>
									<a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i> 收藏 </a>
									<span> . </span>
									<a href="#"> 没有帮助 </a>
									<span>.</span>
									<a href="#"> 举报 </a>
									</div>
									<span> . </span>
									<a href="#"> 作者保留权利 </a>
								</div>
								
							</div>
						</div>
					</div>			
			    </div>
			  </div>
			</div>
		</div>
	</div>
	{{-- 发现页面右半部分 --}}
	<div class="col-md-4 right">
		<img src="/img/default-50x50.gif" alt="" width="100%">
		<div>
			<div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading "><span class="pull-left">热门圆桌</span><a href="#" class="pull-right">更多圆桌<i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
			  <!-- List group -->
			  <ul class="list-group clearfix">
			    <li class="list-group-item ff">
			    	<img src="/img/avatar.png" alt="" width="40px">
			    	<div>
				    	<a href="#" class="pull-left">心理质询师的进阶之路</a>
				    	<span class="pull-right">还有7天结束</span>
			    	</div>
			    	<p id="ss"><a href="#"><span> 422</span>人关注 </a><span> . </span><a href="#"><span> 18</span>个问题 </a></p>
			    </li>
			    <li class="list-group-item ff">
			    	<img src="/img/avatar.png" alt="" width="40px">
			    	<div>
				    	<a href="#" class="pull-left">心理质询师的进阶之路</a>
				    	<span class="pull-right">还有7天结束</span>
			    	</div>
			    	<p id="ss"><a href="#"><span> 422</span>人关注 </a><span> . </span><a href="#"><span> 18</span>个问题 </a></p>
			    </li>
			  </ul>
			</div>
			<div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading"><span class="pull-left">热门话题</span><a href="#" class="pull-right">更多话题<i class="fa fa-angle-double-right" aria-hidden="true"></i></a></div>
			  <!-- List group -->
			  <ul class="list-group clearfix">
			    <li class="list-group-item ee">
			    	<div>
				    	<img src="/img/avatar.png" alt="" width="40px">
				    	<a href="#">NBA</a>
				    	<a href="#" class="g"><span>258045</span>人关注</a>
			    	</div>
			    	<a href="#">科比的巅峰是哪一个赛季？</a>
			    </li>
			    <li class="list-group-item ee">
			    	<div>
				    	<img src="/img/avatar.png" alt="" width="40px">
				    	<a href="#">NBA</a>
				    	<a href="#" class="g"><span>258045</span>人关注</a>
			    	</div>
			    	<a href="#">科比的巅峰是哪一个赛季？</a>
			    </li>
			    <li class="list-group-item ee">
			    	<div>
				    	<img src="/img/avatar.png" alt="" width="40px">
				    	<a href="#">NBA</a>
				    	<a href="#" class="g"><span>258045</span>人关注</a>
			    	</div>
			    	<a href="#">科比的巅峰是哪一个赛季？</a>
			    </li>
			  </ul>
			</div>
			<div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading"><span class="pull-left">热门收藏</span><a href="#" class="pull-right">换一批<i class="fa fa-repeat" aria-hidden="true"></i></a></div>
			  <!-- List group -->
			  <ul class="list-group clearfix shoucang">
			    <li class="list-group-item">
			    	<a href="#">生活真相</a>
			    	<span>2139人关注 * 112条内容</span>
			    </li>
			    <li class="list-group-item">
			    	<a href="#">生活真相</a>
			    	<span>2139人关注 * 112条内容</span>
			    </li>
			    <li class="list-group-item">
			    	<a href="#">生活真相</a>
			    	<span>2139人关注 * 112条内容</span>
			    </li>
			    <li class="list-group-item">
			    	<a href="#">生活真相</a>
			    	<span>2139人关注 * 112条内容</span>
			    </li>
			  </ul>
			</div>
			<div>
				 <div class="" id="dibu">
			        <!-- <div role="separator" class="divider"></div> -->
			        <ul class="li-horizontal">
			            <li><a href="https://liukanshan.zhihu.com" target="_blank">刘看山</a></li>
			            <li><a href="/question/19581624" target="_blank">知乎指南</a></li>
			            <li><a href="javascript:;" id="js-feedback-button">建议反馈</a></li>
			            <li><a href="/app" target="_blank">移动应用</a></li>
			            <li><a href="/careers">加入知乎</a></li>
			            <li><a href="/terms" target="_blank">知乎协议</a></li>
			            <li><a href="/jubao" target="_blank">举报投诉</a></li>
			            <li><a href="/contact">联系我们</a></li>
			        </ul>
			        <span class="copy">© 2017 知乎</span>
			        </div>  
			</div>
		</div>
	</div>
</div>
@stop