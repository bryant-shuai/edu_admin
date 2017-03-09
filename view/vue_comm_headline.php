<?php
include \view('vue_comm_headline_config');
?>

<!-- 子组件模板 -->
<template id="__v__common_headline">
 
</template>

<script type="text/javascript">
var __v__common_headline = function(){
  return  {
    el: '#__v__common_headline',
    data: function () {
      return {
        loading: false,
        ls: [],
        col_headline:null,
        col_subline:null,
      }
    },

    _init: function() {
      var head_config = __config__head_line__['head_line']
      var sub_line = __config__sub_line__['sub_line']
    },

    methods: {

      loadData: function(){
        var self = this
        // alert('yes')
        self.loading = true
        // alert(typeof this.empty_when_loading_)
        if( (typeof this.keep_data_when_loading_)+'' === 'undefined'){
          this.keep_data_when_loading_ = 'false'
        }
        if(this.keep_data_when_loading_==='false') self.ls = []

        // alert('第一次=='+self.url_)
        if(!self.url_) return ;

        $$
          .then($$.wait({
            url: self.url_,
            succ: function(data,cont){
              // alert($$.js2str(data))
              // alert('里面=='+url)

              self.loading = false
              self.ls = data.ls

              cont(null,data)
            },
            fail: function(msg,code,cont){
              // alert($$.js2str(msg))
            },
          }))
          .then(function(cont, data){
            // self.search()
            self.func_loaded_(data)
          })
      },

    },
   
  }
}
</script>