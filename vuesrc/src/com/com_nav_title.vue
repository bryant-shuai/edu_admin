<template> 
  <v-navbar style="height:130px;">
    <div style="color:#FFF;font-size:50px;font-weight:300;padding:32px 0 0 43px;">
      {{title}}
      <p style="color:#FFF;font-size:18px;font-weight:100;padding:30px 0 0 2px;">{{desc}}</p>
    </div>
  </v-nabvar>
</template>

<script>

  export default $$.Aaa({
    EVENT:['CHANGE_NAV'],

    data: function() {
      return {
        title:'管理面板',
        desc:'请选择模块',
      }
    },

    methods :{
      hd_CHANGE_NAV: function(data) {
        this.title = data.title
        this.desc = data.desc
      },
    },

  })
</script>
