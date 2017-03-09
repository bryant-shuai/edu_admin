<?php
$__autoheight = true;
include \view('inc_vue_header');
?>

<script src="/public/v_aaa_bundle.js"></script>
<?php include \view('inc_vue_header_js'); ?>

<?php
include \view('vue_company_join');
?>

  
  <style type="text/css">
    .zc-grids{
      display: flex; 
      flex-direction: row;
      flex-wrap: wrap;
      justify-content: flex-start;
    }
    .zc-grids div{
      width:25%;
      height: 100px;
      display: inline-block;
      display: flex;
      flex-direction: column;
      text-align: center;
      justify-content: center;
      align-items: center;
    }
    .weui_grid_label {
      margin:0;padding: 10px 0 0 0;
    }
  </style>







<div id="v_main" v-cloak style="background:#-FF0000;">
  

  <div style="background:#F0F0F0;">
    <div class="" style="background:#FFF;">
      <vue_company_join></vue_company_join>
    </div>








    <div class="zc-grids bgwhite" style="padding-top:4px;background:#FFF;margin-top:4px;">


      <div onclick="call_native('event',{event_name:'OPEN_MODAL'});">
          <div class="home-icon-div" style="background:#63BD77;width:40px;height:40px;">
            <i class="mu-icon material-icons" style="color:#FFF;">picture_in_picture</i>
          </div>
          <p class="weui_grid_label">
              签到
          </p>
      </div>



      <div onclick="call_native('open_win',{url:'/cate',title:'课程分类'});">
          <div class="home-icon-div" style="background:#4AC0C1;width:40px;height:40px;">
            <span class="icon icon-68 home-icon" style=""></span>
          </div>
          <p class="weui_grid_label">
              课程分类
          </p>
      </div>


      <div onclick="call_native('open_win',{url:'http://yfny.h5-legend.com/h5/yfny.html?t=1481948135839',title:'企业文化'});">
          <div class="home-icon-div" style="background:#4AC0C1;width:40px;height:40px;">
            <span class="icon icon-68 home-icon" style=""></span>
          </div>
          <p class="weui_grid_label">
              企业文化
          </p>
      </div>


      <div onclick="call_native('open_win',{url:'https://wj.qq.com/s/988862/fd0f',title:'调查问卷'});">
          <div class="home-icon-div" style="background:#FFC332;width:40px;height:40px;">
            <span class="icon icon-68 home-icon" style=""></span>
          </div>
          <p class="weui_grid_label">
              调查问卷
          </p>
      </div>


      <div onclick="call_native('openwin_with_nav',{nav_url_:'/news/aj_nav_ls',title:'通知'});">
          <div class="home-icon-div" style="background:#FB6B5B;width:40px;height:40px;">
            <span class="icon icon-68 home-icon" style=""></span>
          </div>
          <p class="weui_grid_label">
              通知
          </p>
      </div>




      <div onclick="call_native('event',{event_name:'OPEN_MODAL'});">
          <div class="home-icon-div" style="background:#63BD77;width:40px;height:40px;">
            <i class="mu-icon material-icons" style="color:#FFF;">picture_in_picture</i>
          </div>
          <p class="weui_grid_label">
              签到
          </p>
      </div>


      <div onclick="call_native('open_win',{url:'https://wj.qq.com/s/988862/fd0f',title:'调查问卷'});">
          <div class="home-icon-div" style="background:#FFC332;width:40px;height:40px;">
            <span class="icon icon-68 home-icon" style=""></span>
          </div>
          <p class="weui_grid_label">
              调查问卷
          </p>
      </div>


      <div onclick="call_native('openwin_with_nav',{nav_url_:'/news/aj_nav_ls',title:'通知'});">
          <div class="home-icon-div" style="background:#FB6B5B;width:40px;height:40px;">
            <span class="icon icon-68 home-icon" style=""></span>
          </div>
          <p class="weui_grid_label">
              更多
          </p>
      </div>





    </div>


    <div class="mu-sub-header inset" style="padding-left: 16px;">
        推荐课程
    </div>




    <?php
    foreach ($__courses as $course) {
    ?>
    <div  onclick="javascript: call_native('video',{url:'/course/detail?id=<?=$course['id']?>', title: '<?=$course['name']?>', }); void(0);" style="margin:0 0 10px 0;">
      
      <div class="mu-card">
        <div class="mu-card-media">
          <img src="<?=$course['pic']?>">
        </div>

        <div class="mu-card-title-container">
          <div class="mu-card-title" style="font-size: 18px;line-height: 24px;">
            <?=$course['name']?>
          </div>
          <div class="mu-card-sub-title" style="font-size: 12px;line-height: 16px;">
            <?=str_replace(['"','[',']'],'',$course['tags'])?>
          </div>
        </div>

      </div>

    </div>


    <?php
    }
    ?>



  </div>









  
</div>



<script type="text/javascript">

var v_instance = new Vue({
  el: '#v_main',

  data: function(){
    return {
      title:'',
      content:'',
      refreshing: true,
      can_save: false,
      files:[],
      uploading: false,
    }
  },

  methods: {

  },

  watch: {
  },

})

</script>


<?php
include \view('inc_home_footer');

