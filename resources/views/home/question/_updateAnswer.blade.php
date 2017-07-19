<div class="panel panel-default">
    <div class="panel-heading text-center">
        一个问题你只能回答一次，但你可以对
        <a class="on-modify-show"
           data-toggle="collapse"
           data-parent="#accordion"
           href="#collapseOne">现有回答</a>
        进行修改
    </div>
    <div id="collapseOne" class="panel-collapse collapse">
        <div class="answeradd-header">
            @include('home.question._author', ['user' => Auth::user()])
        </div>
        <div id="toolbar"></div>
        <div class="editable-box">
            <div id="editor2"><p>{!! $myAnswer->content !!}</p></div>

            <a href="{{ route('answer.update', $myAnswer->id) }}"
               class="btn btn-primary updateAnswer">更新回答</a>
        </div>
    </div>
</div>