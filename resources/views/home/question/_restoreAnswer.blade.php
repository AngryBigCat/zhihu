<div class="panel panel-default">
    <div class="panel-heading text-center">
        你已经删除了该问题的回答，如果需要修改，请先
        <span class="restoreAnswer">
        @include('home.question._toggleLink', [
                 'text' => '撤销删除',
                 'id' => $myAnswer->id,
                ])
        </span>
    </div>
</div>