<div class="index-entry">
    <div class="index-entry-avatar">
        <a href="">
            <img src="{{ isset(Auth::user()->user_details->headpic) ?
                                 '/uploads/headpic/'.Auth::user()->user_details->headpic :
                                 '/img/default-avatar04.png'}}">
        </a>
    </div>
    <span class="entry-box-arrow"></span>
    <span class="entry-box-arrow-border"></span>
    <div class="index-entry-box">
        <ul class="entry-box-list">
            <li>
                <a href="#" data-toggle="modal" data-target="#myModal">
                    <span class="fa fa-question-circle-o"></span> 提问
                </a>
            </li>
            <li><a href="#"><span class="fa fa-file-text-o"></span> 回答</a></li>
        </ul>
    </div>
</div>