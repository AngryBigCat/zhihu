@extends('home.layouts.session')

@section('form')
	
<form class="form-horizontal" method="post" action="doRegister">
	<input type="text" name="email" class="form-control" placeholder="邮箱" required>
	<input type="password" name="password" class="form-control" placeholder="密码" required>
	<input type="password" name="repassword" class="form-control" placeholder="确认密码" required>
	{{csrf_field()}}
	<br>
	<button class="form-control btn btn-primary" type="submit">注册知乎</button>
</form>
<br><br>
<span>点击[注册]按钮，即代表你同意
<!-- Button trigger modal -->
	<!-- <a data-toggle="modal" href="remote.html" data-target="#mymodal">《知乎协议》</a> -->
	<a type="button" class="btn " data-toggle="modal" data-target="#myModal">
	  《知乎协议》
	</a>
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">知乎协议</h4>
	      </div>
	      <div class="modal-body">
	        <div class="zh-terms-content zh-document text-left">

				<h2>知乎协议（草案）</h2>
				<p>欢迎您来到知乎。</p>
				<p>
				请您仔细阅读以下条款，如果您对本协议的任何条款表示异议，您可以选择不进入知乎。当您注册成功，无论是进入知乎，还是在知乎上发布任何内容（即「内容」），均意味着您（即「用户」）完全接受本协议项下的全部条款。
				</p>
				<div id="section-rule" data-section="sec-rule">
				<a name="sec-rule" class="zg-anchor-hidden"></a>
				<h2>使用规则</h2>
				<ol>
				<li>用户注册成功后，知乎将给予每个用户一个用户帐号及相应的密码，该用户帐号和密码由用户负责保管；用户应当对以其用户帐号进行的所有活动和事件负法律责任。</li>
				<li>用户须对在知乎的注册信息的真实性、合法性、有效性承担全部责任，用户不得冒充他人；不得利用他人的名义发布任何信息；不得恶意使用注册帐号导致其他用户误认；否则知乎有权立即停止提供服务，收回其帐号并由用户独自承担由此而产生的一切法律责任。</li>
				<li>用户直接或通过各类方式（如 RSS 源和站外 API 引用等）间接使用知乎服务和数据的行为，都将被视作已无条件接受本协议全部内容；若用户对本协议的任何条款存在异议，请停止使用知乎所提供的全部服务。</li>
				<li>知乎是一个信息分享、传播及获取的平台，用户通过知乎发表的信息为公开的信息，其他第三方均可以通过知乎获取用户发表的信息，用户对任何信息的发表即认可该信息为公开的信息，并单独对此行为承担法律责任；任何用户不愿被其他第三人获知的信息都不应该在知乎上进行发表。</li>
				<li>用户承诺不得以任何方式利用知乎直接或间接从事违反中国法律以及社会公德的行为，知乎有权对违反上述承诺的内容予以删除。</li>
				<li>
				<p>用户不得利用知乎服务制作、上载、复制、发布、传播或者转载如下内容：</p>
				<ul>
				<li>反对宪法所确定的基本原则的；</li>
				<li>危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的；</li>
				<li>损害国家荣誉和利益的；</li>
				<li>煽动民族仇恨、民族歧视，破坏民族团结的；</li>
				<li>破坏国家宗教政策，宣扬邪教和封建迷信的；</li>
				<li>散布谣言，扰乱社会秩序，破坏社会稳定的；</li>
				<li>散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的；</li>
				<li>侮辱或者诽谤他人，侵害他人合法权益的；</li>
				<li>含有法律、行政法规禁止的其他内容的信息。</li>
				</ul>
				</li>
				<li>所有用户同意遵守<a href="/terms2">知乎社区管理规定（试行）</a>和<a href="/terms/video">知乎视频服务协议（试行）</a>。</li>
				<li>机构用户同意遵守<a href="/org_service_agreement">知乎机构帐号服务协议</a>，以及<a href="/org_use_norm">知乎机构帐号使用规范（试行）</a>。</li>
				<li>知乎有权对用户使用知乎的情况进行审查和监督，如用户在使用知乎时违反任何上述规定，知乎或其授权的人有权要求用户改正或直接采取一切必要的措施（包括但不限于更改或删除用户张贴的内容、暂停或终止用户使用知乎的权利）以减轻用户不当行为造成的影响。</li>
				</ol>
				</div>
				<div id="section-licence" data-section="sec-licence">
				<a name="sec-licence" class="zg-anchor-hidden"></a>
				<h2>知识产权</h2>
				<p>知乎是一个信息获取、分享及传播的平台，我们尊重和鼓励知乎用户创作的内容，认识到保护知识产权对知乎生存与发展的重要性，承诺将保护知识产权作为知乎运营的基本原则之一。</p>
				<ol>
				<li data-section="sec-licence-1">
				<a name="sec-licence-1" class="zg-anchor-hidden"></a>
				用户在知乎上发表的全部原创内容（包括但不仅限于回答、文章和评论），著作权均归用户本人所有。用户可授权第三方以任何方式使用，不需要得到知乎的同意。
				</li>
				<li data-section="sec-licence-2">
				<a name="sec-licence-2" class="zg-anchor-hidden"></a>
				知乎上可由多人参与编辑的内容，包括但不限于问题及补充说明、答案总结、话题描述、话题结构，所有参与编辑者均同意，相关知识产权归知乎所有。
				</li>
				<li data-section="sec-licence-3">
				<a name="sec-licence-3" class="zg-anchor-hidden"></a>
				知乎提供的网络服务中包含的标识、版面设计、排版方式、文本、图片、图形等均受著作权、商标权及其它法律保护，未经相关权利人（含知乎及其他原始权利人）同意，上述内容均不得在任何平台被直接或间接发布、使用、出于发布或使用目的的改写或再发行，或被用于其他任何商业目的。
				</li>
				<li data-section="sec-licence-4">
				<a name="sec-licence-4" class="zg-anchor-hidden"></a>
				为了促进知识的分享和传播，用户将其在知乎上发表的全部内容，授予知乎免费的、不可撤销的、非独家使用许可，知乎有权将该内容用于知乎各种形态的产品和服务上，包括但不限于网站以及发表的应用或其他互联网产品。
				</li>
				<li data-section="sec-licence-5">
				<a name="sec-licence-5" class="zg-anchor-hidden"></a>
				第三方若出于非商业目的，将用户在知乎上发表的内容转载在知乎之外的地方，应当在作品的正文开头的显著位置注明原作者姓名（或原作者在知乎上使用的帐号名称），给出原始链接，注明「发表于知乎」，并不得对作品进行修改演绎。若需要对作品进行修改，或用于商业目的，第三方应当联系用户获得单独授权，按照用户规定的方式使用该内容。
				</li>
				<li data-section="sec-licence-6">
				<a name="sec-licence-6" class="zg-anchor-hidden"></a>
				知乎为用户提供「保留所有权利，禁止转载」的选项。除非获得原作者的单独授权，任何第三方不得转载标注了「禁止转载」的内容，否则均视为侵权。
				</li>
				<li data-section="sec-licence-7">
				<a name="sec-licence-7" class="zg-anchor-hidden"></a>
				在知乎上传或发表的内容，用户应保证其为著作权人或已取得合法授权，并且该内容不会侵犯任何第三方的合法权益。如果第三方提出关于著作权的异议，知乎有权根据实际情况删除相关的内容，且有权追究用户的法律责任。给知乎或任何第三方造成损失的，用户应负责全额赔偿。
				</li>
				<li data-section="sec-licence-8">
				<a name="sec-licence-8" class="zg-anchor-hidden"></a>
				如果任何第三方侵犯了知乎用户相关的权利，用户同意授权知乎或其指定的代理人代表知乎自身或用户对该第三方提出警告、投诉、发起行政执法、诉讼、进行上诉，或谈判和解，并且用户同意在知乎认为必要的情况下参与共同维权。
				</li>
				<li data-section="sec-licence-9">
				<a name="sec-licence-9" class="zg-anchor-hidden"></a>
				知乎有权但无义务对用户发布的内容进行审核，有权根据相关证据结合《侵权责任法》、《信息网络传播权保护条例》等法律法规及知乎社区指导原则对侵权信息进行处理。
				</li>
				</ol>
				</div>
				<div id="section-privacy" data-section="sec-privacy">
				<a name="sec-privacy" class="zg-anchor-hidden"></a>
				<h2>个人隐私</h2>
				<p>尊重用户个人隐私信息的私有性是知乎的一贯原则，知乎将通过技术手段、强化内部管理等办法充分保护用户的个人隐私信息，除法律或有法律赋予权限的政府部门要求或事先得到用户明确授权等原因外，知乎保证不对外公开或向第三方透露用户个人隐私信息，或用户在使用服务时存储的非公开内容。同时，为了运营和改善知乎的技术与服务，知乎将可能会自行收集使用或向第三方提供用户的非个人隐私信息，这将有助于知乎向用户提供更好的用户体验和服务质量。</p>
				<p>如果用户不希望被搜索引擎检索，可在「<a href="/settings/account">个人设置</a>」中修改「个人信息」部分的设置，对于站外的用户与搜索引擎，你的姓名会显示为「知乎用户」，头像图片也将被隐藏。</p>
				</div>
				<div id="section-report" data-section="sec-report">
				<a name="sec-report" class="zg-anchor-hidden"></a>
				<h2>侵权举报</h2>
				<ol>
				<li>
				<p>处理原则</p>
				<p>知乎作为知识讨论社区，高度重视自由表达和个人、企业正当权利的平衡。依照法律规定删除违法信息是知乎社区的法定义务，知乎社区亦未与任何中介机构合作开展此项业务。</p>
				</li>
				<li>
				<p>受理范围</p>
				<p>受理知乎社区内侵犯企业或个人合法权益的侵权举报，包括但不限于涉及个人隐私、造谣与诽谤、商业侵权。</p>
				<ol>
				<li>涉及个人隐私：发布内容中直接涉及身份信息，如个人姓名、家庭住址、身份证号码、工作单位、私人电话等详细个人隐私；</li>
				<li>造谣、诽谤：发布内容中指名道姓（包括自然人和企业）的直接谩骂、侮辱、虚构中伤、恶意诽谤等；</li>
				<li>商业侵权：泄露企业商业机密及其他根据保密协议不能公开讨论的内容。</li>
				</ol>
				</li>
				<li>
				<p>举报条件</p>
				<p>用户在知乎发表的内容仅表明其个人的立场和观点，并不代表知乎的立场或观点。如果个人或企业发现知乎上存在侵犯自身合法权益的内容，可以先尝试与作者取得联系，通过沟通协商解决问题。如您无法联系到作者，或无法通过与作者沟通解决问题，您可通过点击内容下方的举报按钮来向知乎平台进行投诉。为了保证问题能够及时有效地处理，请务必提交真实有效、完整清晰的材料，否则投诉将无法受理。您需要向知乎提供的投诉材料包括：</p>
				<ol>
				<li>权利人对涉嫌侵权内容拥有商标权、著作权和/或其他依法可以行使权利的权属证明，权属证明通常是营业执照或组织机构代码证；</li>
				<li>举报人的身份证明，身份证明可以是身份证或护照；</li>
				<li>如果举报人非权利人，请举报人提供代表权利人进行举报的书面授权证明。</li>
				<li>
				<p>为确保投诉材料的真实性，在侵权举报中，您还需要签署以下法律声明：</p>
				<ul>
				<li>我本人为所举报内容的合法权利人；</li>
				<li>我举报的发布在知乎社区中的内容侵犯了本人相应的合法权益；</li>
				<li>如果本侵权举报内容不完全属实，本人将承担由此产生的一切法律责任，并承担和赔偿知乎因根据投诉人的通知书对相关帐号的处理而造成的任何损失，包括但不限于知乎因向被投诉方赔偿而产生的损失及知乎名誉、商誉损害等。</li>
				</ul>
				</li>
				</ol>
				</li>
				<li>
				<p>处理流程</p>
				<p>出于网络平台的监督属性，并非所有申请都必须受理。知乎自收到举报的七个工作日内处理完毕并给出回复。处理期间，不提供任何电话、邮件及其他方式的查询服务。</p>
				<p>出现知乎已经删除或处理的内容，但是百度、谷歌等搜索引擎依然可以搜索到的现象，是因为百度、谷歌等搜索引擎自带缓存，此类问题知乎无权也无法处理，因此相关申请不予受理。您可以自行联系搜索引擎服务商进行处理。</p>
				<p>此为知乎社区唯一的官方侵权投诉渠道，暂不提供其他方式处理此业务。</p>
				<p>用户在知乎中的商业行为引发的法律纠纷，由交易双方自行处理，与知乎无关。</p>
				</li>
				<ol>
				</ol></ol></div>
				<div id="section-impunity" data-section="sec-impunity">
				<a name="sec-impunity" class="zg-anchor-hidden"></a>
				<h2>免责申明</h2>
				<ol>
				<li>知乎不能对用户发表的回答或评论的正确性进行保证。</li>
				<li>用户在知乎发表的内容仅表明其个人的立场和观点，并不代表知乎的立场或观点。作为内容的发表者，需自行对所发表内容负责，因所发表内容引发的一切纠纷，由该内容的发表者承担全部法律及连带责任。知乎不承担任何法律及连带责任。</li>
				<li>知乎不保证网络服务一定能满足用户的要求，也不保证网络服务不会中断，对网络服务的及时性、安全性、准确性也都不作保证。</li>
				<li>对于因不可抗力或知乎不能控制的原因造成的网络服务中断或其它缺陷，知乎不承担任何责任，但将尽力减少因此而给用户造成的损失和影响。</li>
				</ol>
				</div>
				<div id="section-modification" data-section="sec-modification">
				<a name="sec-modification" class="zg-anchor-hidden"></a>
				<h2>协议修改</h2>
				<ol>
				<li>根据互联网的发展和有关法律、法规及规范性文件的变化，或者因业务发展需要，知乎有权对本协议的条款作出修改或变更，一旦本协议的内容发生变动，知乎将会直接在知乎网站上公布修改之后的协议内容，该公布行为视为知乎已经通知用户修改内容。知乎也可采用电子邮件或私信的传送方式，提示用户协议条款的修改、服务变更、或其它重要事项。</li>
				<li>如果不同意知乎对本协议相关条款所做的修改，用户有权并应当停止使用知乎。如果用户继续使用知乎，则视为用户接受知乎对本协议相关条款所做的修改。</li>
				</ol>
				</div>

				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-info" data-dismiss="modal">退出</button>

	      </div>
	    </div>
	  </div>
	</div>
</span>
@stop
