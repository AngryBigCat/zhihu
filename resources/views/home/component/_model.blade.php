<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <form id="addQuestion" class="modal-content" method="post" action="{{ route('question.store') }}">
            {{ csrf_field() }}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <div>写下你的问题</div>
                    <small>描述精确的问题更易得到解答</small>
                </h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger errMessage" style="display: none;">
                    <ul class="list-unstyled">
                    </ul>
                </div>
                <div class="form-group">
                    <textarea name="title" class="form-control model-border-normal" placeholder="问题标题"></textarea>
                </div>
                <div class="form-group">
                    <div>
                        <!-- 已选择的话题 -->
                        <ul v-show="topicList.length != 0" class="list-unstyled list-inline tags-list" v-on:click="onRemoveTopic">
                            <li v-for="item in topicList"><span class="label label-primary">@{{ item.text }} <i class="fa fa-close"></i></span></li>
                        </ul>
                        <input v-model="modelTopic" name="topic" type="text" class="form-control model-border-normal" placeholder="添加话题，最多选择5个">
                        <!-- 选择话题列表 -->
                        <ul class="topicList" v-show="searchResult.length != 0" v-on:click="onInsertTopic">
                            <li v-for="(item, index) in searchResult" v-bind:data-id="item.id">@{{ item.name }}</li>
                        </ul>
                    </div>
                </div>
                <div class="form-group model-question-descripe">
                    <div class="model-question-descripe-head">
                        <div>问题描述（可选）：</div>
                    </div>
                    <div class="editor-box">
                        <div id="toolbar"></div>
                        <div id="editor"></div>
                    </div>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> 匿名提问
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">提交问题</button>
            </div>
        </form>
    </div>
</div>