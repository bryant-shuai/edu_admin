<?php
include \view('vue_comm_tag_sort');
?>
<div v-cloak  id="v_adm_course__tags" style="background:#FFF;width:100%;height:100%">
  <div class="example ivu-row">
    <div class="example-demo ivu-col ivu-col-span-24">
      <div class="example-case">

          <h1>选择标签</h1>
          <v_company_course_tag
            url_="/adm_comm_tag/get_tags?type=视频分类-职业"
            v-bind:tags_="tags"
            v-bind:course_id_="course_id"
          >
          </v_company_course_tag>
      </div>
    </div>
  </div>
</div>


<script>
  var v_course__detail = $$.vue({
    el:'#v_adm_course__tags',

    EVENT: ['ADD_VIDEO_SUCC'],

    data:function(){
      return {
        url:null,
        loading:false,
        page:1,
        count:0,
        length:10,
        search: '',
        tags:[],
        course_id:'<?=$__course_id?>',
       
      }
    },

    _init: function() {
      var self = this 
      var tags = '<?=$__tags?>'
      if(tags != '') self.tags = JSON.parse('<?=$__tags?>')
      // this.loadVideos()
    },

    methods: {


    },

    watch: {

      },

  })
</script>










