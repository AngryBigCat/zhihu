
@foreach($answers as $key => $answer)
    @if(!$answer->trashed())
        <div class="question-answer-item">
            <div class="item-box">
                @include('home.question._author', ['user' => $answer->user])
            </div>
            <div class="answer-thumbs-counts">
                <span class="text-count">{{ $answer->countVote() }}</span>
                <span>人赞同了该回答</span>
            </div>
            <div class="answer-main-box">
                <div class="answer-main-content">{!! $answer->content !!}</div>
            </div>
            @component('home.component._footerCon')
                <!-- 点赞 -->
                <li class="vote-button">
                    <button class="vote {{ $answer->isVote() ? 'vote-active' : ''}}"
                            data-href="{{ $answer->isVote() ? url("answer/$answer->id/upVote") : url("answer/$answer->id/cancelVote") }}">
                        <span class="num">{{ $answer->countVote() }}</span> <span class="fa fa-caret-up"></span>
                    </button>
                    <button><span class="fa fa-caret-down"></span></button>
                </li>
                <!-- 评论 -->
                <li v-on:click="onToggleComment({{ $key }})">
                    <a href="javascript:void(0);">
                        <span class="fa fa-comment"></span>
                        {{ $answer->comments()->count() ? $answer->comments()->count().'条评论' : '添加评论' }}
                    </a>
                </li>
                    @slot('delete')
                        @can('delete', $answer)
                            <li class="remove">
                                @include('home.question._toggleLink', [
                                         'text' => '删除',
                                         'module' => 'answer',
                                         'id' => $answer->id,
                                         'faIcon' => 'fa fa-remove'
                                        ])
                            </li>
                        @else
                            <li><a href="#"><span class="fa fa-heart"></span> 感谢</a></li>
                        @endcan
                    @endslot
            @endcomponent
        </div>
        <comment-list parent-id="{{ $answer->id }}" ref="{{ $key }}"></comment-list>
    @endif
@endforeach