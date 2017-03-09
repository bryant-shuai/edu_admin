<!-- 子组件模板 -->
<template id="__v_task__common">
</template>

<script type="text/javascript">
var __v_task__common = function(){
  return  {
    el: '#__v_task__common',
    props:['ls_','title_','icon_','color_'],
    // props_watch:[''],

    data: function () {
      return {
        loading: false,
        ls: false,
      }
    },

    _init: function() {
      alert('yes')
    },
    
    _change: function(){
      // this.loadData()
    },

    methods: {
      getIcon: function(it){
        return 'play_circle_filled'
      },
    },
   
  }
}
</script>


<!-- 子组件模板 -->
<template id="tpl_task__list">
  <mu-list>
    
    <mu-sub-header style="" >{{title_}}</mu-sub-header>
<!-- 
    <mu-list-item v-if="!ls_" title="加载中" describeText="Jan 9, 2014">
      <mu-avatar icon="cached" slot="leftAvatar"></mu-avatar>
    </mu-list-item>
 -->
    <a v-bind:onclick="'javascript: call_native(\'video\',{url:\'/course/detail?id='+it.target_id+'&task_id='+it.id+'\', title: \''+it.title+'\', }); void(0);'"  v-for="it in ls_">
    <mu-list-item :title="it.id+':'+it.title" describeText="Jan 9, 2014" >
      <mu-avatar :icon="getIcon(it)" slot="leftAvatar"></mu-avatar>
      <mu-icon :value="icon_" :color="color_" slot="right"></mu-icon>
    </mu-list-item>
    </a>

    <mu-divider v-if="!ls_ || (ls_ && ls_.length>0)" inset></mu-divider>
  </mu-list>
</template>



<script type="text/javascript">
$$.comp('v_task__list', $$.vCopy(__v_task__common(),{
  el: '#tpl_task__list',
}))
</script>







