<div id="retui">
	<div>

	  <!-- Nav tabs -->
	  <ul class="nav nav-tabs" role="tablist">
	    @yield('tou')
	  </ul>
		
	  <!-- Tab panes -->
	  <div class="tab-content">
	    <div role="tabpanel" class="tab-pane active masonry" id="home">
	    	@yield('record')
			<!-- 上传收藏夹：弹出框 -->
			<div id="ljq"></div>
	    </div>
	    
	  </div>
	</div>
</div>