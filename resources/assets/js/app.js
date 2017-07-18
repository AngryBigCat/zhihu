
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//Vue
window.Vue = require('vue');
//富文本编辑器
window.E = require('wangeditor');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//import components
import searchView from './components/search-view/search-view.vue';
import commentList from './components/comment-list.vue';
import followerList from './components/follower-list.vue';




let app = new Vue({
    data: {
        postTitleError: false,
        postTopicError: false,
        postTitle: '',
        selectTopic: '',
        topicList: [],
        searchResult: [],
    },
    watch: {
        selectTopic(newValue) {
            this.getTopics(newValue);
        }
    },
    mounted() {
        $('#author-follower').on('hidden.bs.modal', (event) => {
            this.$refs.authorFollower.followerList = [];
        }, 1000);
    },
    methods: {
        onPostQuestion() {
            //判断提问标题有没有问号
            if (this.postTitle.search(/(\?|\uff1f)$/) === -1) {
                this.postTitleError = true;
                setTimeout(() => {
                    this.postTitleError = false;
                }, 2000);
                return false;
            }
            if (this.topicList.length < 1) {
                this.postTopicError = true;
                setTimeout(() => {
                    this.postTopicError = false;
                }, 2000);
                return false;
            }
            let ids = this._filterIds();
            let data = {
                title: this.postTitle,
                topic_ids: ids,
            };
            if (editor.txt.text()) {
                data['describe'] = editor.txt.html()
            }
            axios.post('/question', data).then(res => {
                if (res.status == 200) {
                    $('.alert-info-box').addClass('alert-success').html(res.data.msg).show('fast');
                    window.location.href = res.data.redirect_url;
                }
            });
        },
        _filterIds() {
            let topic_ids = this.topicList,
                ids = [];
            for (let v of topic_ids) {
                ids.push(v.id);
            }
            return ids;
        },
        onRemoveTopic(event) {
            let index = event.target.dataset.index;
            this.topicList.splice(index, 1);
        },
        onInsertTopic(event) {
            let id = event.target.dataset.id,
                text = event.target.innerText,
                isTopic = this._isExsisTopicList(id);
            if (!(this.topicList.length >= 5) && isTopic) {
                let topic = { text, id };
                this.topicList.push(topic);
                this.selectTopic = '';
                this.searchResult = [];
            }
        },
        _isExsisTopicList(id) {
            let topicList = this.topicList;
            for(let k in topicList) {
                if (topicList[k].id === id) {
                    return false;
                }
            }
            return true;
        },
        getTopics: _.debounce(function (nV) {
            var isMulti = nV.indexOf(',') > -1,
                url = '/search/topic/' + nV;
            if (!isMulti) {
                axios.get(url).then((res) => {
                    console.log(res);
                    this.searchResult = res.data;
                });
            }
        }, 1000),
        onToggleComment(key) {
            if (key instanceof Object) {
                this.$refs.question.toggleShow('question');
            } else if (key === 'topAnswer') {
                this.$refs.topAnswer.toggleShow('answer');
            } else {
                this.$refs[key].toggleShow('answer');
            }
        },
        onGetFollower(type) {
            if (type === 'question') {
                this.$refs.questionFollower.onGetFollower('question');
            }  else {
                this.$refs.authorFollower.onGetFollower('user');
            }
        }
    },
    components: {
        searchView,
        commentList,
        followerList
    }
}).$mount('#app');
