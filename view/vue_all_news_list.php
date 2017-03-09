<?php
require \view('vue_comm_table');
?>

<template id="v_all_news_option">
	<i-button type="info" icon="ios-compose" @click="selectNews(v.id,'')">编辑</i-button>
	<i-button type="error" icon="close-circled" @click="deleted(v.id)">删除</i-button>
	<i-button type="success" v-if="v.sort_order == 0" icon="checkmark-circled" @click="setElite(v,idx)">设置精选</i-button>
	<i-button type="success" disabled v-if="v.sort_order > 0" icon="checkmark-circled">设置精选</i-button>
</template>

<script type="text/javascript">
	$$.part('v_all_news_option',$('#v_all_news_option').html())

	$$.comp('v_all_news_list',$$.vCopy(__v__common_table(),{
		el:'#__v__common_table',
		EVENT:['SAVE_LEVEL_SUCC','CENCEL_ELITE_SUCC','SAVENEWS_SUCC'],

		_setup:function(){
			this.manage_ = 'v_all_news_option'
		},

		methods:{

			selectNews:function(id,cate_id){
			  $('#Id_Right_Drawer_Content').html('加载中')
			  $$.event.pub('OPEN_DRAWER',{width:800})
			  $.get('/adm_news/adm_news_detail?cate_id='+cate_id+'&id='+id,function(res){
			    $('#Id_Right_Drawer_Content').html(res)
			  })
			},

			setElite:function(v,idx){
				var self = this
				$$.event.pub('SET_ELITE',{
					data:v,
					idx:idx,
				})
			},


			hd_SAVE_LEVEL_SUCC:function(v){
				var self = this
				var idx = v.idx
				var level = v.level
				self.ls[idx].sort_order = level
				$$.event.pub('SET_LEVEL_SUCC')
			},

			deleted:function(id){
				var self = this 
				$$.ajax({
					url:'/adm_news/delete_news',
					data:{
						id:id,
					},
					succ:function(data){
						self.loadData()
					},
				})
			},

			hd_CENCEL_ELITE_SUCC(){
				var self = this
				self.loadData()
			},

			hd_SAVENEWS_SUCC:function(){
				this.loadData()
			}
		}


	}))
</script>




<template id="v_elite_news_option">
	<i-button type="info" icon="ios-compose" @click="selectNews(v.id,'')">编辑</i-button>
	
	<i-button type="warning" icon="information-circled" @click="cancelLevel(v.id,idx)">取消精选</i-button>
</template>


<script type="text/javascript">
	$$.part('v_elite_news_option',$('#v_elite_news_option').html())

	$$.comp('v_elite_news_list',$$.vCopy(__v__common_table(),{
		el:'#__v__common_table',

		EVENT:['SET_LEVEL_SUCC','SAVENEWS_SUCC'],

		_setup:function(){
			this.manage_ = 'v_elite_news_option'
		},

		methods:{
			cancelLevel:function(id,idx){
				var self = this 
				$$.ajax({
					url:'/adm_news/cancel_news_level',
					data:{
						id:id,
					},
					succ:function(data){
						self.loadData()
						$$.event.pub('CENCEL_ELITE_SUCC')
					}
				})
			},

			hd_SET_LEVEL_SUCC:function(){
				var self = this
				self.loadData()
			},

			selectNews:function(id,cate_id){
			  $('#Id_Right_Drawer_Content').html('加载中')
			  $$.event.pub('OPEN_DRAWER',{width:800})
			  $.get('/adm_news/adm_news_detail?cate_id='+cate_id+'&id='+id,function(res){
			    $('#Id_Right_Drawer_Content').html(res)
			  })
			},

			hd_SAVENEWS_SUCC:function(){
				this.loadData()
			}
		},

		
	}))
</script>

