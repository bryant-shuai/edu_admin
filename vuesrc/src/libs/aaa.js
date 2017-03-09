$$ = {}
$$.Vue = Vue
Vue.config.debug = true
Vue.config.unsafeDelimiters = ['{{{', '}}}']
Vue.config.async = false
Vue.config.devtools = true

Vue.filter('debug', function (value) {
  var str = ''
  try{
    for(var i in value){
      var tmp = '{'+i+':'+value[i]+'}'
      str += (tmp+'<br />')
    }
  }catch(e){}
  return str
})

Vue.filter('price', function (value,howmany0=2) {
  var str = parseFloat(value)
  if(howmany0==1){
    return (Math.floor(str*10)/10).toFixed(1)
  }else if(howmany0==2){
    $$.log(str)
    $$.log(Math.floor((str*100)))
    $$.log(Math.floor((str*100)/100))
    return (Math.floor(str*100)/100).toFixed(2)
  }else{
    // $$.log(str)
    // $$.log(Math.floor((str*100)))
    // $$.log(Math.floor((str*100)/100))
    return (Math.floor(str*1000)/1000).toFixed(3)
  }
})


$$.timestr = function(nS) {
  return new Date(parseInt(nS)).toLocaleString().replace(/:\d{1,2}$/,' ');
}

Vue.filter('time', function (nS) {
  return new Date(parseInt(nS)).toLocaleString().replace(/:\d{1,2}$/,' ');
})

String.prototype.gblen = function() {    
    var len = 0;    
    for (var i=0; i<this.length; i++) {    
        if (this.charCodeAt(i)>127 || this.charCodeAt(i)==94) {    
             len += 2;    
         } else {    
             len ++;    
         }    
     }    
    return len;    
}

Vue.filter('autosize', function (str) {
  var len = str.gblen()
  if(len<=12){
    return '<font style="font-size:18px;" alt="'+len+'">'+str+'</font>'
  }else if(len>12 && len<14){
    return '<font style="font-size:15px;" alt="'+len+'">'+str+'</font>'
  }else{
    return '<div style="position:absolute;top:7px;padding-right:15px;"><font style="font-size:16px;line-height:13px;padding-top:-5px;margin-top:-5px;" alt="'+len+'">'+str+'</font></div>'
  }
  // return str.length
})

$$.data = {TREEDATA:{},cache:{}}
$$.data.loading = true
$$.TREE = {
  app: null
}

$$.ok = function(data){
  return new Promise((resolve, reject) => {
    resolve(data)
  })
}

$$.fail = function(err){
  return new Promise((resolve, reject) => {
    throw err;
    // reject(err)
  })
}

$$.time = function () {
  return (new Date()).getTime()
};
$$.getTime = $$.time

var __secs__ = {}
$$.waitSecsLater = function (func,key,secs) {
  secs=secs*1000
  if(!__secs__[key]) __secs__[key] = 0
  var now = $$.time()
  console.log(now - __secs__[key])
  if(now > __secs__[key]){
    __secs__[key] = now + secs
    func()
  }
};

$$.timestr = function(nS) {
  return new Date(parseInt(nS)).toLocaleString().replace(/:\d{1,2}$/,' ');     
}

$$.servertime = function () {
  return (new Date()).getTime()
};
$$.jsonToString = function (json) {
  return JSON.stringify(json)
};
$$.stringToJSON = function (str) {
  // console.log('str:')
  // console.log(str)
  return JSON.parse(str)
};
$$.js2str = $$.jsonToString
$$.str2js = $$.stringToJSON
$$.copy = function(v) {
  return  $$.str2js($$.js2str(v))
}

$$.then = Thenjs

$$.Aaa = function(opt) {
  // alert('AAA')
  opt.data = opt.data || function(){return {}}
  opt._init = opt._init || function(){return {}}
  opt._change = opt._change || function(){return {}}
  opt._unmount = opt._unmount || function(){return {}}
  
  opt._created = opt._created || function(){return {}}
  opt.methods = opt.methods || {}

  for(var i in opt){
    var v = opt[i]
  }

  if(opt.props){
    // console.log($$.js2str(opt.props))
  }

  opt.created = function() {
    opt._created()
  }

  opt.mounted = function() {
    var self = this

    // self.$nextTick(function () {
    //   doSomething()
    // })

    if (opt.APP) {
      $$.TREE.app = this
    }
    if (opt.EVENT) {
      for (var i in opt.EVENT) {
        $$.event.sub(opt.EVENT[i], this)
      }
    }

    // alert('_init:'+$$.js2str(this.$data))
    if(this._setup){
      // console.dir(this)
      // alert('setup')
      this._setup.apply(this) 
    }else{
      opt._init.apply(this) 
    }

    if(this._render){
      this._render.apply(this) 
    }else if(this._change){
      this._change.apply(this) 
    }else{
      opt._change.apply(this) 
    }
    // opt._change.apply(this)


    if (opt.props) {
      for (var i in opt.props) {
        self.$watch(i,function(val){
          // alert('change...'+i+ ' to:'+val)
          // if(self._render){
          //   console.log('_render')
          //   self._render.apply(self) 
          // }else 
          if(self._change){
            console.log('_change')
            self._change.apply(self) 
          }else{
            console.log('opt _change')
            opt._change.apply(self) 
          }     
        })
      }
    }
  }

  // opt.watch = function(){
  //   console.log('watchwatchwatchwatch')
  //   opt._change.apply(this)
  // }

  opt.beforeDestroy = function(){
    // alert('beforeDestroy:'+$$.js2str(this.$data))
  }

  opt.detached = function() {
    alert('detached')
    if(opt.TAG){
      $$.data.TREEDATA[opt.TAG] = $$.copy(this.$data)
    }
    $$.event.fire(this)
    opt._unmount.apply(this)
  }

  return opt
}


Vue.prototype.setState = function(data){
  for(var i in data){
    this.$set(i,$$.copy(data[i]))
  }
}






////////////// $$.event

;(function ($) {
  $.event = $.event || function () {
      var _observer = {};
      var subscribe = function (eventName_, obj_, args_) {
        args_ = args_ || {};

        var fireOthers_ = args_.fireOthers || false;
        if (fireOthers_) {
          _observer[eventName_] = [];
        }
        _observer[eventName_] = _observer[eventName_] || [];

        if (_observer[eventName_].length > 0) {
          $.event.remove(eventName_, obj_);
        }

        _observer[eventName_].push(obj_);
        return true;
      };

      var publish = function (eventName_, data_, data2_, from_) { 
        // data_ = data_ || {};
        from_ = from_ || null

        var handlers = _observer[eventName_] || [];
        
        var l = handlers.length;
        
        var _stop = false;
        if (from_) {
          from_['hd_' + eventName_](data_, data2_);
          return
        }

        for (var _i = l - 1; _i >= 0; _i--) {
          if (!_stop) {
            var obj = handlers[_i];
            if (typeof obj === 'string') {
              if (!obj) {
                console.log('........fire')
                $.event.fire(obj)
              }
            }

            if (obj && obj['hd_' + eventName_]) {
              var res = obj['hd_' + eventName_](data_, data2_);
              if(res && res.stop){
                _stop = true 
              }
              // _stop = obj['hd_' + eventName_](data_, data2_);
            }
          }
        }
      };

      var remove = function (eventName_, obj_) {
        var handlers = _observer[eventName_];
        var l = handlers.length;
        for (var i = l - 1; i >= 0; i--) {
          if (handlers[i] === obj_) {
            handlers.splice(i, 1);
            break;
          }
        }
      };

      var removeEvent = function (eventName_) {
        _observer[eventName_] = [];
      };

      var fire = function (obj_) {
        for (var eventName in _observer) {
          var handlers;
          if (_observer.hasOwnProperty(eventName)) {
            handlers = _observer[eventName];
          }
          var length = handlers.length;
          for (var i = length; i > -1; i--) {
            if (handlers[i] === obj_) {
              handlers.splice(i, 1);
            }
          }
        }
      };

      var fireAll = function () {
        _observer = {};
      };

      return {
        nodes: _observer,
        sub: subscribe,
        pub: publish,
        remove: remove,
        fire: fire,
        fireAll: fireAll
      };
    }();
})($$);






// js loader
var _js_caches = $$._js_caches = {}
$$.loadJs = function (file,cb){
  $('#loading').show()
  $$.data.loading = true
  if(!cb){ cb = function(){} }

  if(_js_caches[file]){
    if($$.TREE.app){
      try{
        $$.TREE.app.$remove(function(){
          $$.TREE.app = null
          eval(''+_js_caches[file])
          $('#loading').hide()
          cb()
        })
      }catch(e){
          eval(''+_js_caches[file])
          $('#loading').hide()
          cb()
      }
    }else{
      eval(''+_js_caches[file])
      $('#loading').hide()
      cb()
    }
    return 
  }

  // $.ajax({
  //   type:'get',
  //   dataType:'text',
  //   url:'./dist/'+file+'.js?'+__ver__,
  //   success: function(data){
  //     _js_caches[file] = data
  //     if($$.TREE.app){
  //       $$.TREE.app.$remove(()=>{
  //         $$.TREE.app = null
  //         eval(''+data)
  //         $('#loading').hide()
  //         cb()
  //       })
  //     }else{
  //       eval(''+data)
  //       $('#loading').hide()
  //     }

  //   }
  // })
}




export default $$



