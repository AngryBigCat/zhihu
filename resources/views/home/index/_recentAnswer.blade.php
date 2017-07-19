@foreach($questions as $key => $question)
    @if(!$question->answers->isEmpty())
        <div class="media recent-new-item">
            <div class="media-left">
                <a href="#">
                    <img class="media-object" src="img/avatar04.png" width="50" height="50">
                </a>
                <div class="topic-vote">
                    <a href="#" class="topic-vote-up">
                        <span class="fa fa-caret-up"></span>
                        <span class="topic-vote-up-counts">{{ $question->answers->first()->countVote() }}</span>
                    </a>
                    <a href="#" class="topic-vote-down"><span class="fa fa-caret-down"></span></a>
                </div>
            </div>
            <div class="media-body">
                <div class="index-topic-from">
                    <span>来自话题：
                    @foreach($question->tags as $tag)
                        <a href="{{ route('topic', $tag->id) }}">{{ $tag->tag_name }}</a>
                    @endforeach
                    </span>
                </div>
                <div class="media-heading index-topic-title">
                    <a href="/question/{{ $question->id }}/answer/{{ $question->answers->first()->id }}">{{ $question->title }}</a>
                </div>
                <div class="index-topic-author">
                    <span class="author-name"><a href="#">{{ $question->answers->first()->user->name }}</a></span>
                    <span class="author-intro">{{ $question->answers->first()->user->user_details->a_word or '' }}</span>
                </div>
                <div class="index-topic-content">
                    <div>{!! $question->answers->first()->content !!}</div>
                </div>
                <div class="index-topic-footer">
                    @component('home.component._footerCon')
                        <!-- 评论 -->
                        <li v-on:click="onToggleComment({{ $key }})">
                            <a href="javascript:void(0);">
                                <span class="fa fa-comment"></span>
                                {{ $question->answers->first()->comments()->count()
                                ? $question->answers->first()->comments()->count().'条评论'
                                : '添加评论' }}
                            </a>
                        </li>
                        @slot('delete')
                        @endslot
                    @endcomponent
                </div>
            </div>
            <comment-list parent-id="{{ $question->answers->first()->id }}" ref="{{ $key }}"></comment-list>
        </div>
        @endif
@endforeach