@extends('layouts.default')
   @section('style') 
  <style>
    body{
      background-color:#FFFFFF;
     }
     .eamil-a{
      height:220px;
      border-bottom:1px solid #CCCCCC;
     }
     .eamil-b{
      height:230px;
      border-bottom:1px solid #EEEEEE;
     }
     .eamil-c{
      height:120px;
      border-bottom:1px solid #EEEEEE;
     }
     .eamil-d{
      height:70px;
      border-bottom:1px solid #EEEEEE;
     }
     .eamil-e{
      height:180px;
      border-bottom:1px solid #EEEEEE;
     }
     
       a{
      font-size:16px;
      color:#225599;
    }
    label{
      font-family:正楷;
      text-decoration:none;
      font-size:16px;
      font-weight: normal;
    }
    span{
      font-weight:bold;
      font-size:16px;
      color:#222222;
    }
    h3{
      color:#222222;
    }
    p{
      font-size:16px;
      color:#999999;
    }

  </style>
 @stop 
 @section('content') 
 			<div class="container"> 
 				<!--选项-->
 				<div class="daohang"> 
				    <ul class="nav nav-tabs"> 
				     <li role="presentation"><a href="./user-Settings">基本资料</a></li> 
				     <li role="presentation"><a href="./user-account">账户和密码</a></li> 
				     <li role="presentation" class="active"><a href="./user-Messages">消息和邮件</a></li> 
				     <li role="presentation"><a href="./user-shield">屏蔽</a></li> 
				    </ul> 
				   </div> 

           <!--私信设置-->
           <!--私信设置-->
          <div class="eamil-a">
            <br> <span>&nbsp;&nbsp;私信设置</span><br><br>
            <div class="eamil-left">
                <div data-type="inboxmsg" class="eamil-right"> 
                       <div >
                        <span class="col-md-2">有人给我发了私信</span>
                       <label class="col-md-offset-1"> <input type="radio" name="inboxmsg-receive" value="all" checked="" /> 允许所有人给我发私信 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 只允许我关注的人给我发私信 </label> 
                      </div> <br>
                      <div class="col-md-offset-3"> 
                       <label> <input type="checkbox" /> 开启陌生人私信箱 </label> 
                      </div> <br>

                      <div class="col-md-offset-3"> 
                       <label> <input type="checkbox" /> 有私信时邮件提醒我 </label> 
                      </div> 
                 
                </div> 
            </div>
          </div>
        <div class="clearfix"></div> 

        <!--消息设置-->
        <div class="eamil-b">
             <br><span>&nbsp;&nbsp;消息设置</span><br><br>
             <p>&nbsp;&nbsp;你可以在这里设置接收的消息类型。「邀请我回答问题」和「关注的问题有了新回答」不支持关闭消息。</p><br>
            <div>
                <div data-type="inboxmsg" class="eamil-right"> 
                       <div >
                        <span class="col-md-2">邀请我回答问题</span>
                       <label class="col-md-offset-1"> <input type="radio" name="inboxmsg-receive" value="all" checked="" /> 接收所有人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 只接收关注人消息 </label> 
                      </div> <br>
                      <div class="col-md-offset-3"> 
                       <label> <input type="checkbox" /> 有消息时邮件提醒我 </label> 
                      </div> <br>
                </div> 
            </div>
          </div>
        <div class="clearfix"></div> 

        <!--关注的问题有新回答-->
        <div class="eamil-c">
            <div class="eamil-left"><br>
                <div data-type="inboxmsg" class="eamil-right"> 
                       <div >
                        <span class="col-md-2">关注的问题有新回答</span>
                       <label class="col-md-offset-1"> <input type="radio" name="inboxmsg-receive" value="all" checked="" /> 接收所有人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 只接收关注人消息 </label> 
                      </div> <br>
                      <div class="col-md-offset-3"> 
                       <label> <input type="checkbox" /> 获取你接收消息范围内的全部新回答通知，即便这些回答质量可能不够高。 </label>
                       <a href="" style=" text-decoration:none">选中这个会发生什么？</a> 
                      </div> <br>
                </div> 
            </div>
          </div>
        <div class="clearfix"></div>

        <!--关注的专栏有新文章-->
        <div class="eamil-d">
            <div class="eamil-left"><br>
                <div data-type="inboxmsg" class="eamil-right"> 
                       <div >
                        <span class="col-md-2">关注的专栏有新回答</span>
                       <label class="col-md-offset-1"> <input type="radio" name="inboxmsg-receive" value="all" checked="" /> 接收所有人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 不接收消息 </label> 
                      </div> <br>
                      
                </div> 
            </div>
          </div>
        <div class="clearfix"></div>

        <!--关注的人有新电子书-->
        <div class="eamil-d">
            <div class="eamil-left"><br>
                <div data-type="inboxmsg" class="eamil-right"> 
                       <div >
                        <span class="col-md-2">关注的人有新电子书</span>
                       <label class="col-md-offset-1"> <input type="radio" name="inboxmsg-receive" value="all" checked="" /> 接收所有人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 不接收消息 </label> 
                      </div> <br>
                      
                </div> 
            </div>
          </div>
        <div class="clearfix"></div>

        <!--@评论我-->
        <div class="eamil-d">
            <div class="eamil-left"><br>
                <div data-type="inboxmsg" class="eamil-right"> 
                       <div >
                        <span class="col-md-2">@/评论我</span>
                       <label class="col-md-offset-1"> <input type="radio" name="inboxmsg-receive" value="all" checked="" /> 接收所有人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 只接收专注人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 只接收专注人消息 </label> 
                      </div> <br>
                      
                </div> 
            </div>
          </div>
        <div class="clearfix"></div>

        <!--赞同/感谢回答我的问题-->
        <div class="eamil-d">
            <div class="eamil-left"><br>
                <div data-type="inboxmsg" class="eamil-right"> 
                       <div >
                        <span class="col-md-2">赞同/感谢我的回答</span>
                       <label class="col-md-offset-1"> <input type="radio" name="inboxmsg-receive" value="all" checked="" /> 接收所有人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 只接收关注人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 不接收任何人 </label>
                      </div> <br>
                      
                </div> 
            </div>
          </div>
        <div class="clearfix"></div>

        <!--赞了我的评论-->
        <div class="eamil-d">
            <div class="eamil-left"><br>
                <div data-type="inboxmsg" class="eamil-right"> 
                       <div >
                        <span class="col-md-2">赞了我的评论</span>
                       <label class="col-md-offset-1"> <input type="radio" name="inboxmsg-receive" value="all" checked="" /> 接收所有人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 只接收关注人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 不接收所有人消息 </label>
                      </div> <br>
                      
                </div> 
            </div>
          </div>
        <div class="clearfix"></div>

        <!--赞了我的文章-->
        <div class="eamil-d">
            <div class="eamil-left"><br>
                <div data-type="inboxmsg" class="eamil-right"> 
                       <div >
                        <span class="col-md-2">赞了我的文章</span>
                       <label class="col-md-offset-1"> <input type="radio" name="inboxmsg-receive" value="all" checked="" /> 接收所有人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 只接收关注人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 不接收任何人消息 </label>
                      </div> <br>
                      
                </div> 
            </div>
          </div>
        <div class="clearfix"></div>

         <!--赞了我的电子书-->
        <div class="eamil-d">
            <div class="eamil-left"><br>
                <div data-type="inboxmsg" class="eamil-right"> 
                       <div >
                        <span class="col-md-2">赞了我的电子书</span>
                       <label class="col-md-offset-1"> <input type="radio" name="inboxmsg-receive" value="all" checked="" /> 接收所有人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 只接收关注人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 不接收任何人消息 </label>
                      </div> <br>
                      
                </div> 
            </div>
          </div>
        <div class="clearfix"></div>

         <!--赞赏了我的文章-->
        <div class="eamil-d">
            <div class="eamil-left"><br>
                <div data-type="inboxmsg" class="eamil-right"> 
                       <div >
                        <span class="col-md-2">赞赏了我的文章</span>
                       <label class="col-md-offset-1"> <input type="radio" name="inboxmsg-receive" value="all" checked="" /> 接收所有人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 只接收关注人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 不接收任何人消息 </label>
                      </div> <br>
                      
                </div> 
            </div>
          </div>
        <div class="clearfix"></div>

        <!--有人关注了我-->
        <div class="eamil-c">
            <div class="eamil-left"><br>
                <div data-type="inboxmsg" class="eamil-right"> 
                       <div >
                        <span class="col-md-2">有人关注了我</span>
                       <label class="col-md-offset-1"> <input type="radio" name="inboxmsg-receive" value="all" checked="" /> 接收所有人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 只接收关注人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 不接收任何人消息 </label> 
                       </div><br>
                       <div class="col-md-offset-3"> 
                       <label> <input type="checkbox" /> 开启陌生人私信箱 </label> 
                      </div> 
                      <br>
                      
                </div> 
            </div>
          </div>
        <div class="clearfix"></div>

        <!--有人关注了我的专栏-->
        <div class="eamil-d">
            <div class="eamil-left"><br>
                <div data-type="inboxmsg" class="eamil-right"> 
                       <div >
                        <span class="col-md-2">有人专注了我的专栏</span>
                       <label class="col-md-offset-1"> <input type="radio" name="inboxmsg-receive" value="all" checked="" /> 接收所有人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 只接收关注人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 不接收任何人消息 </label>
                      </div> <br>
                      
                </div> 
            </div>
          </div>
        <div class="clearfix"></div>

        <!--有人关注了我的收藏夹-->
        <div class="eamil-d">
            <div class="eamil-left"><br>
                <div data-type="inboxmsg" class="eamil-right"> 
                       <div >
                        <span class="col-md-2">有人关注我的收藏夹</span>
                       <label class="col-md-offset-1"> <input type="radio" name="inboxmsg-receive" value="all" checked="" /> 接收所有人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 只接收关注人消息 </label> 
                       <label class="col-md-offset-1" > <input type="radio" name="inboxmsg-receive" value="follow" /> 不接收任何人消息 </label> 
                      </div> <br>
                      
                </div> 
            </div>
          </div>
        <div class="clearfix"></div>

        <!--邮件设置-->
        <div class="eamil-e">
             <br><span>&nbsp;&nbsp;邮件设置</span><br><br>
             <p>&nbsp;&nbsp;你可以在这里设置是否接收来自知乎的邮件。</p><br>
            <div>
                <div data-type="inboxmsg" class="eamil-right"> 
                       <div >
                        <span class="col-md-2">知乎每周精选</span>
                       <div class="col-md-offset-3"> 
                       <label> <input type="checkbox" /> 接收每周精选邮件 </label> 
                      </div>  
                      </div> <br>
                      
                </div> 
            </div>
          </div>
        <div class="clearfix"></div>

         <!--新品发布-->
        <div class="eamil-e">
             <br>
                <div data-type="inboxmsg" class="eamil-right"> 
                       <div >
                        <span class="col-md-2">新品发布</span>
                       <div class="col-md-offset-3"> 
                       <label> <input type="checkbox" />有新品或活动举行时发给我 </label> 
                      </div>  
                      </div> <br>
                      
                </div> 
            </div>
          </div>
        <div class="clearfix"></div>

       
      </div>
  @endsection