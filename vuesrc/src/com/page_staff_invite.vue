<template>
  {{type_}}
  {{type_text_}}
  <async_staff_invite ></async_staff_invite>
</template>

<script>

  Vue.component('async_staff_invite', function (resolve, reject) {
    require(['./com_staff_invite.vue'], resolve)
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
      $$.event.pub('CHANGE_NAV',{title:'员工审核',desc:'通过或拒绝',})
    },



    methods :{

    },

  })
</script>
