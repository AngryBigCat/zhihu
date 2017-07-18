<div class="row question-top">
    <div class="col-md-8">
        <div class="question-head-tag">
            <ul class="list-unstyled list-inline">
                <li><a href="#">汽车</a></li>
                <li><a href="#">汽车</a></li>
                <li><a href="#">汽车</a></li>
                <li><a href="#">汽车</a></li>
                <li><a href="#">汽车</a></li>
            </ul>
        </div>
        <h1 class="question-head-h1">{{ $question->title }}</h1>
        <div class="question-head-des">
            {!! $question->describe !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="question-head-counts">
            <a href="#"
               v-on:click="onGetFollower('question')"
               data-toggle="modal"
               data-target="#question-follower">
                <span>关注者</span>
                <span class="count-follow">{{ $question->countFollow() }}</span>
            </a>
            <div class="modal fade" id="question-follower">
                <div class="modal-dialog">
                    <follower-list my-id="{{ Auth::user()->id }}" parent-id="{{ $question->id }}" ref="questionFollower"></follower-list>
                </div>
            </div>
            <a href="#">
                <span>被浏览</span>
                <span>{{ $question->visit_count }}</span>
            </a>
        </div>
    </div>
</div>