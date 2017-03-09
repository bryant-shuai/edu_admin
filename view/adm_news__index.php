<?php
require \view('adm_inc__header');
require \view('vue_all_news_list');
require \view('vue_page');
?>

<div id="v_news_list">

				<div class="example ivu-row">
			    <div class="example-demo ivu-col ivu-col-span-24">
			      <div class="example-case">
			      	<h1>话题管理</h1><a name="top"></a>

			      	<br/>

			      	<div class="ivu-table-header">
							    <table cellspacing="0" cellpadding="0" border="0" style="width:100%;">

							      <thead>
							        <tr>
							        	<th style="width:10%;text-align:left">
							        		
							        		<Dropdown >
											        <i-button type="info" style="font-size:14px;-font-weight:bold;">
											            {{select_text}}
											            <Icon type="arrow-down-b"></Icon>
											        </i-button>
											        <Dropdown-menu slot="list" v-for="v in types">
											            <Dropdown-item @click="clickItem(v)">{{v}}</Dropdown-item>
											        </Dropdown-menu>
											    </Dropdown>

							        	</th>

							          <th style="width:41%;text-align:left">

							              <i-input  icon="search" placeholder="请输入标题名称" size="large"  :value.sync="search" ></i-input>
							          </th>

							          <th style="width:49%;text-align:right;" >
							              <i-button type="success" :loading="button_loading" icon="plus-round"
							              style="font-size:14px;-font-weight:bold;box-shadow:0 0 7px #999;"
							              @click="addNews('')">
							                  <span>添加话题</span>
							              </i-button>
							          </th>



							        </tr>
							      </thead>
							    </table>
							  </div>

							  <br/>

							  <Tabs type="card" @on-click="selectTab()">

						        <Tab-pane  label="最新" icon="social-apple" >
						        	<v_all_news_list
							      		v-bind:url_="new_url"
							      		v-bind:func_loaded_="func_loaded"
							      		col_config_="news"
							      		v-bind:th_width_="th_width"
							      		img_="document-text"
							      		img_text_="title"
							      	>
							      	</v_all_news_list>

			      					<br />

							      	<v_page 
				                v-bind:count_="count[0]"
				                v-bind:length_="length"
				                v-bind:page_="page"
				                v-bind:func_pagechanged_="func_pagechanged"
				              >
				              </v_page>
						        </Tab-pane>


						        <Tab-pane label="精选" icon="social-windows" >
						        	<v_elite_news_list
							      		v-bind:url_="elite_url"
							      		v-bind:func_loaded_="func_loaded"
							      		col_config_="news"
							      		v-bind:th_width_="th_width"
							      	>
							      	</v_elite_news_list>

			      					<br />

							      	<v_page 
				                v-bind:count_="count[1]"
				                v-bind:length_="length"
				                v-bind:page_="page"
				                v-bind:func_pagechanged_="func_pagechanged"
				              >
				              </v_page>
						        </Tab-pane>
						    </Tabs>

			      </div>

			    </div>

			    <Modal :visible.sync="alert" width="360">
		        <p slot="header" style="color:#464c5b;text-align:center">
		        		<Icon type="compose"></Icon>
		            <span>{{title_name}}</span>
		        </p>
		        <div style="text-align:center">
		        	<h3>Level:<h3><i-input icon="gear-a" placeholder="请输入优先级数字" style="width: 200px" :value.sync="level"></i-input>
		        </div>
		        <div slot="footer">
		            <i-button type="success" size="large" long  @click="sevaLevel">保存</i-button>
		        </div>
		    </Modal>

</div>

<script type="text/javascript">
	var url = '/adm_news/get_topics?' 

	$$.vue({
		el:'#v_news_list',
		EVENT:['SET_ELITE'],
		data:function(){
			return {
				new_url:null,
				elite_url:null,
				url:null,
        loading:false,

        page:1,
        count:[],
				length:10,

				search: '',
				types:['论坛','问答'],
				select_type: 1,
				select_text:'论坛',
				alert:false,
				th_width:[220,100,150,80,300],
				level:null,
				title_id:'',
				title_name:'',
				title_idx:'',
			}
		},
		_init:function(){
			this.resetUrl()
		},

		methods:{
			hd_SET_ELITE:function(v){
				var self = this
				self.title_name = v.data.title
				self.title_id = v.data.id
				self.title_idx = v.idx
				self.alert = true
			},

			resetUrl:function(){
				var self = this
				this.new_url = url+'&page='+this.page+'&length='+this.length+'&type='+this.select_type+'&search='+this.search
				
				window.setTimeout(function(){
				  self.elite_url = url+'&page='+self.page+'&length='+self.length+'&type='+self.select_type+'&how=hotnews'+'&search='+self.search
					},1000)
			},
				

			func_loaded: function(data){
        this.count.push(data.count)
        window.location.href = "#top"
      },

      func_pagechanged: function(idx){
        this.page = idx
        this.resetUrl()
      },

      clickItem:function(val){
      	var self = this 
      	self.select_text = val

      	var data = 1

      	if( val == '论坛' ){
      		self.select_type = 1
      		self.count = []
      		self.page = 1
      		self.resetUrl()
      	}

      	if( val == '问答' ){
      		self.select_type = 3
      		self.count = []
      		self.page = 1
      		self.resetUrl()
      	}

			},

			selectTab:function(){
				var self = this 
				self.page = 1
				self.search = ''
			},


      addNews:function(id){
      	var self = this
      	var cate_id
      	if(self.select_type == 1){
      		cate_id = 33
      	}
      	if(self.select_type == 3){
      		cate_id = 1
      	}

			  $('#Id_Right_Drawer_Content').html('加载中')
			  $$.event.pub('OPEN_DRAWER',{width:800})
			  $.get('/adm_news/adm_news_detail?cate_id='+cate_id+'&id='+id+'&type='+self.select_type,function(res){
			    $('#Id_Right_Drawer_Content').html(res)
			  })
			},

			sevaLevel:function(){
				var self = this
				$$.ajax({
					url:'/adm_news/set_news_level',
					data:{
						id:self.title_id,
						sort_order:self.level,
					},
					succ:function(data){
						self.alert = false
						$$.event.pub('SAVE_LEVEL_SUCC',{
							idx:self.title_idx,
							level:self.level,
						})
					},
				})
			},

		},

		watch:{
      search: function(val){
        this.page = 1
        this.count = []
        this.resetUrl()
      },
    },

	})
</script>


<?php
require \view('adm_inc__footer');
?>
