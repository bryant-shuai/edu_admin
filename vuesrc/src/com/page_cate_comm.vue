<template>
  {{type_}}
  {{type_text_}}
  <async_cate_comm :title_="$route.params.desc"></async_cate_comm>
</template>

<script>

  Vue.component('async_cate_comm', function (resolve, reject) {
    require(['./com_cate_comm.vue'], resolve)
  })

  export default $$.Aaa({

    data: function() {
      return {
        title:'管理面板',
        desc:'请选择模块',
      }
    },

    _init: function() {
      // alert($$.js2str({title:this.$route.params.title,desc:this.$route.params.desc,}))
      $$.event.pub('CHANGE_NAV',{title:this.$route.params.title,desc:this.$route.params.desc,})
    },



    methods :{

    },

  })
</script>
