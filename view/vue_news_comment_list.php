
<!-- 子组件模板 -->
<template id="vue_news_comment_list">
  <div>
    <div>
      <mu-list>
        <mu-sub-header>评论</mu-sub-header>
        <div  v-for="item in ls" >
          <mu-list-item disabled>
            <!-- 头像标签需要完整 -->
            <div slot="title">
               <mu-flexbox>
                <div style="width: 50px;">
                  <div style="position: absolute; top: 0;">
                    <mu-avatar :src="members[item.member_id].avatar" ></mu-avatar>
                  </div>
                </div>
                <mu-flexbox-item >
                  <div style="margin-top: 5px;">
                      <div>{{members[item.member_id].name}}</div>
                      <div style="color: gray;">
                        <small>{{item.create_at}}</small>
                      </div>
                  </div>
                  <p style="margin-top: 10px;">
                     {{item.comment}}
                  </p>
                </mu-flexbox-item>
              </mu-flexbox>
            </div>
          </mu-list-item>
          <mu-divider />
        </div>
      </mu-list>

    </div>

    <div v-if="autoload || firstload || 0">
      <div v-if="!no_more || firstload || 0">

        <div>
              
          <div class="dropload-down" style="text-align:center;-webkit-transform: scale(0.4);transform: scale(0.8);">
            <div class="ball-pulse"><div></div><div></div><div></div></div>
          </div>
        </div>

      </div>
      <div v-if="no_more" style="clear:both;width:100%;text-align:center;;height:50px;padding-top:20px;color:#999;font-size:1.7rem;">没有更多了</div>
    </div>

  </div>
</template>



<script type="text/javascript">

  $$.comp('vue_news_comment_list', {
    el: '#vue_news_comment_list',
    props: ['url','length','autoload','cache','should_reload_'],
    props_watch: ['should_reload_'],
    EVENT:['SCROLL_TO_PAGE_END','ADD_COMMENT_SUCC'],
    data: function () {
      return {
        loading: false,
        no_more: false,
        page: 0,
        sending:false,
        firstload:true,
        append: true, // 是重新刷新列表还是继续追加
        ls:[],
        members:{},
      }
    },
    _init: function(){
      // alert('评论')
      var self = this
      var findFromCache = false

      // if(self.cache){
      //   var _data = store.get(self.cache)
      //   if(_data){
      //     // alert('read.cache:'+self.cache)
      //     // alert('data:'+$$.js2str(_data))
      //     for(var i in _data){
      //       self[i] = _data[i]
      //     }
      //     findFromCache = true
      //   }else{
      //     // alert('not found:'+self.cache)
      //   }
      // }

      if(!findFromCache){
        self.loadData()
      }

      if(self.autoload=="false"){
        self.autoload = false
      }
      if(!self.autoload){
        $$.event.fire(self)
      }


    },
    
    _change: function() {
      this.no_more = false;
      this.page = 0;
      this.append = false;
      this.loadData();
    },

    methods: {

      hd_SCROLL_TO_PAGE_END: function(){
        var self = this
        self.loadData()
      },

      hd_ADD_COMMENT_SUCC: function(){
        var self = this
        self.loadData()
      },

      loadData: function(){
        var self = this

        // alert('001')

        
        if(self.no_more){
          // alert('no_more')
          return ;
        }


        if(self.no_more || self.sending){
          // alert('sending')
          return ;
        }

        self.sending = true
        self.loading = true

        $$.ajax({
          url:self.url+'&length='+self.length+'&page='+self.page,
          succ:function(data){
            self.loading = false
            self.firstload = false

            var _new = $$.copy(self.ls)
            // 是重新刷新列表还是继续追加
            if (!self.append) {
              _new = []
            }
            for(var i in data.ls){
              _new.push(data.ls[i])
            }

            for(var i in data.members){
              self.members[i] = data.members[i]
            }

            self.ls = _new

            if(data.ls.length<self.length){
              self.no_more = true
            }
            self.page = data.page
            self.sending = false;
            self.append = true;
            
            // if(self.cache){
            //   // alert('write cache:'+self.cache)
            //   store.set(self.cache, $$.copy(self.$data))
            // }

            // window.setTimeout(function(){
            //   $$.atPageEnd(function(){
            //     self.loadData()
            //   })
            // },10)

          }
        })

      },

    },

  }) // panel-wait
</script>
