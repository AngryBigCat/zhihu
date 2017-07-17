<div class="media">
    <div class="media-left">
        <a href="{{ route('topic.show', $topic->id) }}">
            <img class="media-object topic-item-img" src="{{ $topic->img_url }}">
        </a>
    </div>
    <div class="media-body">
        <div class="media-heading topic-item-heading">
            <h5 class="topic-item-title"><a href="{{ route('topic.show', $topic->id) }}">{{ $topic->name }}</a></h5>
            <a href="#"><i class="fa fa-plus"></i> 关注</a>
        </div>
        <div class="topic-item-describe">{{ $topic->describe }}</div>
    </div>
</div>