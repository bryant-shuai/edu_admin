<?php
include \view('adm_inc__header');
include \view('vue_comm_table');
include \view('vue_page');
?>

<!-- 邀请模板 -->
<template id="v_p__exercises_list">
  <!-- <Button-group> -->
    <i-button type="primary" @click="modify(v.id)">修改</i-button>
    <i-button type="error" @click="remove(v.id)">删除</i-button>
  <!-- </Button-group> -->
</template>

<script type="text/javascript">
$$.part('v_p__exercises_list', $('#v_p__exercises_list').html())


$$.comp('v_comment__operation_lh', $$.vCopy(__v__common_table(),{
  el: '#__v__common_table',
  EVENT:['ADD_EXERCISE_SUCC'],
  _setup: function(){
    this.manage_ = 'v_p__exercises_list'
  },
  methods: {
    remove: function(id){
        var self = this
        $$.ajax({
          url:'/adm_exercises/aj_deletedcourse',
          data:{
            id:id,
          },
          succ:function(data){
            self.$Message.success('删除成功');
            self.loadData()
          },
        })
    },
    hd_ADD_EXERCISE_SUCC:function(){
      var self = this
      self.loadData()
    },
    modify: function(id){
          $('#Id_Right_Drawer_Content').html('加载中')

          $$.event.pub('OPEN_DRAWER',{width:600})
          $.get('/adm_exercises/modify_exercises?id='+id,function(res){
            $('#Id_Right_Drawer_Content').html(res)
          })
    },
  },
}))
</script>

  <div id="v_adm_comment__ls" >
          
        <div class="example ivu-row">
          <div class="example-demo ivu-col ivu-col-span-17">
            <div class="example-case">


              <h1>习题列表</h1>
              <br/>
              <div class="ivu-table-header">
                <table style="width:100%">
                  <thead>
                    <tr>
                      <th style="width:30%;">
                        <i-input icon="android-search" placeholder="请输入习题名称"  :value.sync="search" ></i-input>
                      </th>
                      <th style="width:60%;text-align:right;">
                        <i-button type="success" @click="addot()">
                          <span>添加习题</span>
                        </i-button>
                      </th>
                    </tr>
                  </thead>
                </table>
              </div>


              <div class="box" >
                <div class="box-header">
                  <div class="box-tools" style="
                  margin-right:1300px;margin-top:5px">
                  </div>
                </div>
                <div v-if="loading"><i class="fa zfa-refresh fa-spin"></i>Loading....</div>
                <div class="box-body table-responsive no-padding">
                  <v_comment__operation_lh 
                    v-bind:func_loaded_="func_loaded"
                    v-bind:url_="url"
                    col_config_="exercises"
                    v-bind:th_width_="['150','150','80','170']"
                  >
                  </v_comment__operation_lh>
                </div>
              </div>
              <br />

              <v_page 
                v-bind:count_="count"
                v-bind:length_="length"
                v-bind:page_="page"
                v-bind:func_pagechanged_="func_pagechanged"
              >
              </v_page>

            </div>
          </div>

          <div class="example-split" style="left: 71%;"></div>
          <div class="example-demo ivu-col ivu-col-span-7 ivu-col-split-right">
            <div class="example-case" >
              <h1>提示</h1>
              <br/>
              <br/>

              <Card dis-hover>
                  <p slot="title">功能简介  </p>
                  <p><b>题目：</b>；</p>

                  <p><b>选项：</b>课程的主要标题；</p>
                  <p><b>答案：</b>课程的主要标题；</p>
                  <p><b>修改：</b>可以修改课程的名称和主要内容，以及添加课程包含视频；</p>
                   <p><b>删除：</b>删除选中的课程；</p><br/>

  <!-- ① ② ③ ④ ⑤ ⑥ ⑦ ⑧ ⑨ ⑩ -->

                   <p style="font-size:14px;color:#e96900;"><Icon type="alert-circled" size="16"></Icon>
                      功能注意事项:
                   </p>
                   <br/>
                    <p><span style="font-size:16px">①: </span>搜索输入框请输入课程名称关键字或准确的课程名称</p>
                    <p><span style="font-size:16px">②: </span>添加课程功能输入的课程名称不要为空</p>
                    <p><span style="font-size:16px">③: </span>新添加的课程默认是没有内容和视频，需要点击修改为课程添加内容和上传视频</p>
                    <p><span style="font-size:16px">④: </span>新添加的课程默认状态为禁用，可以点击选择框启用课程</p>
                    <p><span style="font-size:16px">⑤: </span>启用课程以前推荐先把课程的详情内容都完善</p>

              </Card>
            </div>
          </div>

  	    </div>
  </div>
  <script>
    var url = '/adm_exercises/ls?'
  	$$.vue({
  		el:'#v_adm_comment__ls',

  		data:function(){
  			return {
          url:null,
          loading:false,
          page:1,
          count:0,
  				length:10,
          search: '',
  			}
  		},

      _init: function() {
        this.resetUrl()
      },

      methods: {

        addot: function (){
          $('#Id_Right_Drawer_Content').html('加载中')

          $$.event.pub('OPEN_DRAWER',{width:600})
          $.get('/adm_exercises/modify_exercises',function(res){
            $('#Id_Right_Drawer_Content').html(res)
          })
        },

        resetUrl: function(){
          this.url = url+'&page='+this.page+'&length='+this.length+'&search='+this.search
        },

        func_loaded: function(data){
          this.count = data.count
        },

        func_pagechanged: function(idx){
          this.page = idx
          this.resetUrl()
        },


      },

      watch: {
        search: function(val){
          this.page = 1
          this.resetUrl()
        },
      }
  	})
  </script>

<?php
include \view('adm_inc__footer');
