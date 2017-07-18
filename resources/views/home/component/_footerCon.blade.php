<ul class="list-unstyled item-footer">
    {{ $slot }}
    <li><a href="#"><span class="fa fa-share-alt"></span> 分享</a></li>
    <li class="dropdown">
        <a href="#" id="shareDrop" class="dropdown-toggle" data-toggle="dropdown">
            <span class="fa fa-share"></span> 分享
        </a>
        <div class="social-share dropdown-menu" aria-labelledby="shareDrop" data-initialized="true">
            <a href="#" class="social-share-icon icon-wechat"></a>
            <a href="#" class="social-share-icon icon-weibo"></a>
            <a href="#" class="social-share-icon icon-qq"></a>
        </div>
    </li>
    <li><a href="#"><span class="fa fa-star"></span> 收藏</a></li>
    {{ $delete }}
</ul>