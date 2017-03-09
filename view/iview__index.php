<?php
include \view('adm_inc__header');
?>
<template id="v_adm_comment__ls">
    <i-table :columns="columns7" :data="data6"></i-table>
</template>
<script>
$$.vue({
  el:'#v_adm_comment__ls',
  data:function () {
    return {
      self: this,
      columns7: [
        {
          title: '习题名称',
          key: 'name',
            
        },
        {
          title: '选项',
          key: 'age'
        },
        {
          title: '答案',
          key: 'address'
        },
  
      ],
      data6: [
        {
            name: '王小明',
            age: 18,
            address: '北京市朝阳区芍药居'
        },
        {
            name: '张小刚',
            age: 25,
            address: '北京市海淀区西二旗'
        },
        {
            name: '李小红',
            age: 30,
            address: '上海市浦东新区世纪大道'
        },
        {
            name: '周小伟',
            age: 26,
            address: '深圳市南山区深南大道'
        }
      ]
    }
  },
  methods: {

  }
})
</script>















