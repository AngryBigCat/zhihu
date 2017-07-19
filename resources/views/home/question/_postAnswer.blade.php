<div class="panel panel-default answeradd">
    <div class="answeradd-header">
        @include('home.question._author', ['user' => Auth::user()])
    </div>
    <div id="toolbar"></div>
    <div class="editable-box">
        <div id="editor2"></div>
        <div class="editable-box-btn">
            <a href="{{ route('answer.store') }}" class="btn btn-primary addAnswer">提交回答</a>
        </div>
    </div>
</div>