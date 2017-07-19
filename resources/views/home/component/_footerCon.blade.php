<ul class="list-unstyled item-footer">
    {{ $slot }}
    <li class="dropdown">
        <a href="#" id="shareDrop" class="dropdown-toggle" data-toggle="dropdown">
            <span class="fa fa-share"></span> 分享
        </a>
        <div class="social-share dropdown-menu" aria-labelledby="shareDrop" data-initialized="true">
            <a style="margin-left: 11px" href="#" class="social-share-icon icon-wechat"></a>
            <a style="margin-left: 11px" href="#" class="social-share-icon icon-weibo"></a>
            <a style="margin-left: 11px" href="#" class="social-share-icon icon-qq"></a>
        </div>
    </li>
    {{ $delete }}
</ul>