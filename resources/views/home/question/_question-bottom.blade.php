<div class="row question-bottom">
    <div class="col-md-8">
        @component('home.component._footerCon')
            <li v-on:click="onToggleComment({{ $question }})">
                <a href="javascript:void(0);"
                   data-toggle="modal"
                   data-target="#commentModal">
                    <span class="fa fa-comment"></span>
                    {{ $question->comments()->count() ? $question->comments()->count().'条评论' : '添加评论' }}
                </a>
            </li>
            @slot('delete')
                @can('delete', $question)
                    <li class="remove">
                        @include('home.question._toggleLink', [
                                 'text' => '删除',
                                 'module' => 'question',
                                 'id' => $question->id,
                                 'faIcon' => 'fa fa-remove'
                                ])
                    </li>
                @endcan
            @endslot
    @endcomponent
    <!-- Modal -->
        <div class="modal fade" id="commentModal">
            <div class="modal-dialog">
                <comment-list parent-id="{{ $question->id }}" ref="question"></comment-list>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="question-head-btn">
            <a href="{{ url("question/$question->id/toggleFollow") }}"
               class="btn btn-primary toggleFollow {{ $question->isFollow() ? 'following' : '' }}">
                {{ $question->isFollow() ? '正在关注' : '关注问题' }}
            </a>
            <a href="#postAnswerAAA" class="btn btn-default"><span class="fa fa-pencil"></span> 写回达</a>
        </div>
    </div>
</div>