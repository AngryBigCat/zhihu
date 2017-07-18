<div class="question-answer-top">
    @section('question-answer-top')
        <span>{{ $question->answers()->count() }} 个回答</span>
        <div class="btn-group pull-right">
                        <span href="#" class="dropdown-toggle sort-toggle" data-toggle="dropdown">
                            {{ $sort['selection'] }} <span class="fa fa-sort"></span>
                        </span>
            <ul class="dropdown-menu ">
                @foreach($sort['options'] as $key => $value)
                    <li><a href="{{ url("question/$question->id/$key") }}">{{ $value }}</a></li>
                @endforeach
            </ul>
        </div>
    @show
</div>