<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <div>写下你的问题</div>
                    <small>描述精确的问题更易得到解答</small>
                </h4>
            </div>
            <div class="modal-body">

                <div class="form-group" v-bind:class="{ 'has-error': postTitleError }">
                    <label v-show="postTitleError" class="control-label">请在标题的最后包含一个问号</label>
                    <textarea v-model="postTitle" class="postQuestion-title border-normal form-control" placeholder="问题标题"></textarea>
                </div>
                <div class="form-group">
                    <!-- 已选择的话题 -->
                    <ul v-show="topicList.length != 0" class="list-unstyled list-inline tags-list" v-on:click="onRemoveTopic">
                        <li v-for="(tag, index) in topicList"><span class="label label-primary" v-bind:data-index="index">
                                @{{ tag.text }} <i class="fa fa-close"></i></span>
                        </li>
                    </ul>
                    <input v-model="postTopic" class="postQuestion-topic border-normal form-control" placeholder="
                    <!-- 选择话题列表 -->
                    <ul class="topicList" v-show="searchResult.length != 0" v-on:click="onInsertTopic">
                        <li v-for="topic in searchResult" v-bind:data-id="topic.id">@{{ topic.tag_name }}</li>
                    </ul>
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
            </div>
            <div class="modal-footer">
                <button v-on:click="onPostQuestion" class="btn btn-primary">提交问题</button>
            </div>
        </div>
    </div>
</div>