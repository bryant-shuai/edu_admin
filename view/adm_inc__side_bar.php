<?php 
// print_r($_SESSION);
if( !empty($_SESSION['IS_ADMIN']) && $_SESSION['user']['company_id'] == 0 ) { 
?>
<ul>
  <li>
    <!-- <div>组件</div> -->
    <ul>



        <p>超级管理</p>
        <ul>
          <li><a href="/adm_company/establish" <?php if($__nav == '/adm_course/establish'){ ?> style="color:#39f" <?php } ?> ><i class="ivu-icon ivu-icon-ios-home-outline" style="font-size:16px"></i>创建公司</a ></li>
          <li><a href="/adm_company/ls" <?php if($__nav == '/adm_company/ls'){ ?> style="color:#39f" <?php } ?> ><i class="ivu-icon ivu-icon-ios-people-outline" style="font-size:16px"></i>公司列表</a ></li>

          
          
        </ul>

<?php } ?>

<?php if( !empty($_SESSION['IS_ADMIN']) ) { ?>
        <p>课程管理</p >
        <ul>
          <li><a href="/adm_course/index" <?php if($__nav == '/adm_course/index'){ ?> style="color:#39f" <?php } ?> ><i class="ivu-icon ivu-icon-ios-bookmarks" style="font-size:16px"></i>公司课程</a ></li>

 <!-- 
          <li><a href="/adm_video/ls" <?php if($__nav == '/adm_video/ls'){ ?> style="color:#39f" <?php } ?> ><i class="ivu-icon ivu-icon-social-youtube" style="font-size:16px"></i>视频列表</a ></li>
           -->

          <li><a href="/adm_exercises/index" <?php if($__nav == '/adm_exercises/index'){ ?> style="color:#39f" <?php } ?> ><i class="ivu-icon ivu-icon-android-clipboard" style="font-size:16px"></i>习题列表</a ></li>

        </ul>

        <p>基础数据</p >
        <ul>
          <li><a href="/adm_company_role/manage" <?php if($__nav == '/adm_company_role/manage'){ ?> style="color:#39f" <?php } ?> ><i class="ivu-icon ivu-icon-android-contacts" style="font-size:16px"></i>部门管理</a ></li>
          <li><a href="/adm_invite/ls" <?php if($__nav == '/adm_invite/ls'){ ?> style="color:#39f" <?php } ?> ><i class="ivu-icon ivu-icon-android-person-add" style="font-size:16px"></i>员工审核</a ></li>
          <li><a href="/adm_company/index" <?php if($__nav == '/adm_company/index'){ ?> style="color:#39f" <?php } ?> ><i class="ivu-icon ivu-icon-card" style="font-size:16px"> </i>修改行业信息</a ></li>
          <li><a href="/adm_company_join/index" <?php if($__nav == '/adm_company_join/index'){ ?> style="color:#39f" <?php } ?> ><i class="ivu-icon ivu-icon-card" style="font-size:16px"> </i>修改企业邀请码</a ></li>
        </ul>

        <p>任务管理</p >
        <ul>
          <li>
            <a href="/adm_task/index" <?php if($__nav == '/adm_task/index'){ ?> style="color:#39f" <?php } ?> ><i class="ivu-icon ivu-icon-android-list" style="font-size:16px"></i>分配任务</a ></li>
          <li>

        </ul>

     
        <p>模块管理</p >
        <ul>
          <li><a href="/adm_comment/index" <?php if($__nav == '/adm_comment/index'){ ?> style="color:#39f" <?php } ?> ><i class="ivu-icon ivu-icon-chatboxes" style="font-size:16px"></i>评论管理</a ></li>
        </ul>


        <ul>
          <li><a href="/adm_news/index"><i class="ivu-icon ivu-icon-social-buffer" style="font-size:16px"></i>论坛/问答管理</a></li>
        </ul>

      </li>





    </ul>
  </li>
</ul>

<?php } ?>



<!-- <li><a href="/adm_course/pub" <?php if($__nav == '/adm_course/pub'){ ?> style="color:#39f" <?php } ?> ><i class="ivu-icon ivu-icon-ios-book-outline" style="font-size:16px"></i>公共课程</a ></li> -->







<!-- 
 <li>
        <p>模块管理</p >
        <ul>
          <li><a href="/adm_comm_cate/index?type=<?=\model\comm_cate::$CONF_TYPE['corp']?>" <?php if($__nav == "/adm_comm_cate/index?type=1"){ ?> style="color:#39f" <?php } ?>  ><i class="ivu-icon ivu-icon-ios-compose-outline"></i>企业大学</a ></li>
          <li><a href="/adm_comm_cate/index?type=<?=\model\comm_cate::$CONF_TYPE['news']?>" <?php if($__nav_news == "/adm_comm_cate/index?type=2"){ ?> style="color:#39f" <?php } ?>  ><i class="ivu-icon ivu-icon-ios-compose-outline"></i>企业通知</a ></li>
          <li><a href="/adm_comment/ask_ls?type=<?=\CONF_TYPE::$TYPE['ASK']?>" <?php if($__nav == "/adm_comment/ask_ls?type=3"){ ?> style="color:#39f" <?php } ?>  ><i class="ivu-icon ivu-icon-ios-compose-outline"></i>问答</a ></li>
        </ul>
      </li>

      <li>
 -->






