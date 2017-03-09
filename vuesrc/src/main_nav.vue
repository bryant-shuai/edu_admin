<template> 
  <v-sidebar id="main-nav" class="-sidebar sidebar--mobile sidebar--open" height="500vh" v-bind:items="items"></v-sidebar>
   
   

</template>

<script>

  let tag = 'client'
  export default $$.Aaa({
    NAME:tag,
    TAG:tag,
    EVENT:['IPC_ADD_SKU_TO_CART'],
    props:['aaa_'],

    components:{
    },

    data: function() {
      return {
        client_bg:'client_bg.png',
        items: [
          {
            parent: { text: '板块管理', href: '#!" ', icon: 'list'},
            items: [
              { text: '论坛板块', href: '/cate/bbs/论坛板块/修改论坛板块?a=b', router: true, icon: 'list' },
              { text: '通知板块', href: '/cate/news/通知板块/修改通知板块?a=b', router: true, icon: 'list'  },
              // { text: 'Child', href: '/' }, // , icon: 'list'
            ]
          },
          {
            parent: { text: '员工管理', href: '#!" ', icon: 'list'},
            items: [
              { text: '审核', href: '/staff/invite', router: true , icon: 'list'},
              // { text: 'Child', href: '/' }, // , icon: 'list'
            ]
          },
          { text: 'Link1', href: '#!' , icon: 'list'},
          { text: 'Link2', href: '#!' , icon: 'list'},
        ],
        order: null,
      }
    },

    _init: function() {
      var self = this
      // alert($$.js2str(this.data))
      window.setTimeout(function(){
        $$.event.pub('IPC_ADD_SKU_TO_CART','hahaha')
      })
    },

    _change: function() {
      console.dir( $$.js2str(this.$options.propsData) )
      console.log('change'+ $$.js2str(this.aaa_) )
    },

    methods :{

      hd_IPC_ADD_SKU_TO_CART: function(data) {
        // this.order = data
        // alert('got hd_IPC_ADD_SKU_TO_CART:'+data)
      },
    },

    // 这种方式可以监听事件
    watch: {
      'order': function (val, oldVal) {
        // alert('order changed:'+ val)
      },
    },

  })
</script>

<style lang="css">
  ul.sidebar__items li a span{
    color:#FFF;
  }
  
</style>