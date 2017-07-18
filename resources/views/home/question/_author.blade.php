<div class="author-info">
    <a href="">
        <img class="author-info-img"
             src="{{ $user->user_details->headpic ?
                 '/uploads/headpic/'.$user->user_details->headpic :
                 '/img/default-avatar.png' }}"
             width="50"
             height="50">
    </a>
    <div class="author-info-dec">
        <span class="author-info-name"><a href="">{{ $user->name }}</a></span>
        <span class="author-info-intro">{{ $user->user_details->a_word }}</span>
    </div>
</div>