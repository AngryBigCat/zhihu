<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">相关问题</h3>
    </div>
    <ul class="list-group">
        @foreach($aboutQuestion as $question)
            <li class="list-group-item">
                <a href="{{ route('question.show', $question->id) }}">{{ $question->title }}</a>
            </li>
        @endforeach
    </ul>
</div>