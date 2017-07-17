<div class="topic-list">
    @foreach($topics as $topic)
        <div class="topic-item">
            @include('home.topic._topic-item')
        </div>
    @endforeach
</div>

