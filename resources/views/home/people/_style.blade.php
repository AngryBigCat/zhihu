<style type="text/css">
	.Card{
		margin-bottom: 20px;
		border-radius: 10px;
	}
	.nav-pills{
		border-bottom: 1px solid #F0F2F7;
	}
	.Button{
	    display: inline-block;
	    padding: 0 16px;
	    font-size: 14px;
	    line-height: 32px;
	    color: #8590a6;
	    text-align: center;
	    cursor: pointer;
	    background: none;
	    border: 1px solid #ccd8e1;
	    border-radius: 3px;
	}
	.UserCoverEditor-simpleEditButton{
		position: absolute;
	    top: 24px;
	    right: 24px;
	    z-index: 1;
	}
	.UserCoverEditor{
		position:relative;
	}
	.DynamicColorButton--white{
		color: hsla(0,0%,100%,.7);
		    border-color: hsla(0,0%,100%,.24);
	}
	.head-pic{
		width:170px;
		height:170px;
		position: relative;
		top:-30px;
		background: #fff;
		border-radius: 5px;
		margin-left:30px;
		box-sizing: border-box;
		float:left;
		border:5px solid white;
		z-index: 1000;
	}
	.head-pic > .Mask-mask{
		position: absolute;
		width:100%;
		height:100%;
		top:0px;
		left:0px;
		background: #000;
		opacity: .4;
		display: none;
		cursor: pointer;
	}

	.Mask-mask span{
		display: block;
		margin:0 auto;
		text-align: center;
	}
	.Mask-mask > span:first-child{
		color: #fff;
		font-size:30px;
		margin: 45px 20px 10px;
	}
	.Mask-mask > span:last-child{
		color: #fff;
		font-size:15px;
	}
	.ProfileHeader-detailLabel{
		width: 60px;
	    margin-right: 37px;
	    font-weight: 700;
	}
	.user-title{
		position:relative;
		left:40px;
		padding:10px;
		color:black;
	}

	.user-title .yiju{
		font-size:18px;
	}
	.see_userinfo{
		cursor: pointer;
	}
	.nosee_userinfo{
		display:none;
	}
	.nosee_userinfo a{
		cursor: pointer;
	}
	.ProfileHeader-infoItem{
		margin:10px 0px;
	}
	.user_info .ProfileHeader-infoItem{
		margin:20px 0px;
	}
	.user-title a{
		color:grey;
		text-decoration: none;
	}
	.ProfileHeader-divider{
		display: inline-block;
	    width: 1px;
	    height: 10px;
	    margin: 0 8px;
	    background: #e7eaf1;
	}
	.ProfileHeader-main{
		background: white;
		padding-bottom: 25px;
	}
	.btn-edit{
		float:right;
		position:relative;
		right:50px;
		bottom: 15px;
	}
	.tgge-follow{
		margin-top:-50px;
	}
	.btn-edit .btn{
		width:96px;
		color:#fff;
	}
	.btn-edit .btn-geren{
		width:118px;
		margin-top: -15px;
	}
	.dongtai{
		background: white;
	}
	.dongtai-dongtai{
		margin:7px 0px;
	}
	.dongtai-dongtai span{
		color:black;
		display: block;
		padding:5px 0px;
		font-weight: bold;
		font-size:16px;
	}
	.tab-pane{
		padding-bottom:10px;
	}
	.dongtai-content{
		padding:0px;
		border-top:1px solid #F0F2F7;
	}
	.dongtai-content-title{
		height: 45px;
		line-height: 45px;
	}
	.dongtai-content-title a{
		color:black;
		font-size:20px;
		font-weight: bold;
		text-decoration: none;
	}
	.dongtai-content-title a:hover{
		color: #1751B2;
	}
	.dongtai-content-info{
		height:50px;
		font-size:12px;
		float:left;
		margin-left: -15px;
	}
	.dongtai-content{
		padding: 15px 0px;
	}

	.dongtai-content-name{
		float:left;
		height:60px;
	}

	.dongtai-content-name a{
		font-size:15px;
		color:black;
		font-weight: bold;
		height:30px;
		line-height: 30px;
		text-decoration: none;
	}
	.dongtai-content-zan{
		margin-left: -15px;
		height:30px;
		line-height:30px;
	}
	.dongtai-content-zan a{
		color:grey;
		text-decoration: none;
	}
	.dongtai-content-con div{
		margin-left:-15px;
		font-size:15px;
		color:black;
		margin-bottom:7px;
	}
	.dongtai-content-con:hover{
		color:grey;
		cursor:pointer;
	}
	.dongtai-content-gongneng{
		margin:0px 0px;
	}
	.dongtai-content-gongneng a{
		text-decoration: none;
	}
	.dongtai-content-gongneng span{
		font-size:12px;
	}
	.dongtai-content-gongneng button{
		border:0px;
	}
	.btn-zan{
		width:60px;
		font-size:13px;
	}
	.btn-buzan{
		width:40px;
		font-size:13px;
	}
	.dongtai-content-link{
		border:0px;
		background: white;
	}
	.guanzhu{
		background: white;
		height:100px;
	}
	.guanzhu a{
		display: inline-block;
		margin-top:20px;
		text-decoration: none;
		cursor: pointer;
	}
	.zhuan-item{
		margin-bottom: 15px;
		padding-bottom: 15px;
		position: relative;
		padding-top: 20px;
		border-top:1px solid #F0F2F7;

	}
	.zhuan-item > .zhuan-right{
		margin-left:85px;
	}
	.zhuan-item .zhuan-right{
		width:340px;
	}
	.zhuan-item .btn-guanzhu{
		width:96px;
	}
	.zhuan-item .btn-beiguanzhu{
		width:96px;
		position: absolute;
		right: 10px;
		top:40px;
	}
	.zhuan-right a{
		display:inline-block;
		font-weight: bold;
		color:black;
		text-decoration: none;
	}
	.zhuan-right .xianghu{
		display: inline-block;
		background: #F7F8FA;
		font-size:12px;
		padding:3px;
		margin-left:10px;
	}
	.zhuan-right .zhuan-desc{
		color:#175199;
		display: inline-block;
		margin-top: 6px;
	}
	.zhuan-right .zhuan-bottom{
		margin-top:3px;
	}
	#message-text{
		resize:none;
	}
	.icon{
		color: #9FADC7;
	}
	.right-gongju a{
		cursor:pointer;
	}
	.modal-header{
		border-bottom: 0px;
		margin-bottom: -15px;
	}
	.foot_lianjie a{
		color: #666666;
		text-decoration: none;
	}
</style>