

<div id="v_add_news_detail">
    <Row>
           <!--      <i-col span="18" >
                  <Alert type="error" show-icon closable @on-close="closeError">
                      错误提示
                      <span slot="desc">
                          {{error_text}}
                      </span>
                  </Alert>  
                </i-col> -->


        <i-col span="18">
          <input id="id_news_detail__comm_cate_id" type="hidden" name="name" value="<?php echo $_GET['cate_id'];?>" />

          <h1><?=$__how;?>内容:</h1>

          <br/>

          <form class="ivu-form ivu-form-label-right">
            <div class="ivu-form-item ivu-form-item-required">
              <label class="ivu-form-item-label" style="">标题名</label>
              <div class="ivu-form-item-content" style="margin-left: 60px;">
                <div class="ivu-input-wrapper ivu-input-type">
                  <input id="id_news_detail_title" class="ivu-input" type="text" placeholder="请输入任务名称" value="<?php echo $__news['title'];?>"></div>
              </div>
            </div>

            <div id="id_news_detail_content" style="height:400px;"><?php echo $__news['content'];?>
            </div>

            <br/>

            <div class="ivu-form-item">
              <div class="ivu-form-item-content">
                <button class="ivu-btn ivu-btn-primary" type="button" @click="save">
                  <span>保存</span></button>
                <button style="margin-left: 8px" class="ivu-btn ivu-btn-ghost" type="button">
                  <span>重置</span></button>
              </div>
            </div>
          </form>




        </i-col>


    </Row>
</div>

<script type="text/javascript">
    $$.vue({
        el:'#v_add_news_detail',
        data:function(){
          return{
            type:'<?=$__type?>',
          }
        },

        methods:{
            save:function(){
              $$.ajax({
                method:'post',
                url:'/adm_news/aj_news_save',
                data: {
                  id:'<?=$_GET['id']?>',
                  content: $('#id_news_detail_content').html(),
                  title: $('#id_news_detail_title').val(),
                  cate_id:0,
                  type:this.type,
                },
                succ: function(res){
                  $$.event.pub('CLOSE_DRAWER')
                  $$.event.pub('SAVENEWS_SUCC')
                },

                fail:function(msg){
                    alert(msg)
                }
              })
            }
        },
    })
</script>

<script type="text/javascript">
    var editor = new wangEditor('id_news_detail_content');

    editor.config.uploadImgUrl = '/upload/ajax';

    editor.config.uploadParams = {
        key: 'editor',
        // user: 'wangfupeng1988'
    };

    // 自定义load事件
    editor.config.uploadImgFns.onload = function (resultText, xhr) {
        // resultText 服务器端返回的text
        // xhr 是 xmlHttpRequest 对象，IE8、9中不支持

        // 上传图片时，已经将图片的名字存在 editor.uploadImgOriginalName
        var originalName = editor.uploadImgOriginalName || '';  

        // 如果 resultText 是图片的url地址，可以这样插入图片：
        editor.command(null, 'insertHtml', '<img src="' + resultText + '" alt="' + originalName + '" style="max-width:100%;"/>');
        // 如果不想要 img 的 max-width 样式，也可以这样插入：
        // editor.command(null, 'InsertImage', resultText);
    };

    // 自定义timeout事件
    editor.config.uploadImgFns.ontimeout = function (xhr) {
        alert('上传超时');
    };

    // 自定义error事件
    editor.config.uploadImgFns.onerror = function (xhr) {
        alert('上传错误');
    };

    // // 设置 headers（举例）
    // editor.config.uploadHeaders = {
    //     'Accept' : 'text/x-json'
    // };
    editor.config.hideLinkImg = true;

    editor.create();
</script>


<style type="text/css">
  .add_option_button{
    background:#33CC66;
    padding:7px 50px;
    border-radius:5px;
    color:#FFF;
    margin-left:30px;
    cursor:pointer;
    float: right;
    font-size: 20px;
    margin-top: 5px;
    box-shadow: 2px 2px 5px #CDCDCD;
  }
</style>