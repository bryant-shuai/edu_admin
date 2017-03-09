<template> 
  <v-app top-navbar footer left-fixed-sidebar>
    <header>
      <com_nav_title></com_nav_title>
    </header>
    <main>
      <v-sidebar id="sidebar" fixed style="color:#FFF;">
        <async-example></async-example>
        <async_main_nav v-bind:aaa_="aaaa"></async_main_nav>
      </v-sidebar>
      <v-content>
        <v-container style="position:relative;padding:20px 50px 0 50px;">
          <transition name="slide-fade">
            <router-view style="position:absolute;top:0;left:0px;right:0px;" keep-alive="false"></router-view>
          </transition>
        </v-container>
      </v-content>
    </main>
  </v-app>
</template>

<script>
  import main_nav from './main_nav.vue'
  import com_nav_title from './com/com_nav_title.vue'

  Vue.component('async-example', function (resolve, reject) {
      resolve({
        template: '<div style="margin:20px auto 20px auto;"><img src="/public/v.png" height="100" ><br />I am async!</div>'
      })
    // setTimeout(function () {
    // }, 0)
  })

  Vue.component('async_main_nav', function (resolve, reject) {
    require(['./main_nav.vue'], resolve)
    // setTimeout(function () {
    // }, 0)
  })

  export default {

    data () {
      // alert($$.getTime())
      return {
        item: {
          href: '/',
          text: 'Get Started',
        },
        aaaa: $$.getTime(),
      }
    },

    components: {
      main_nav,
      com_nav_title,
    },

    mounted () {
      this.$vuetify.init()

      var self = this
      window.setInterval(function(){
        self.$data.aaaa = $$.getTime()
        console.log(self.aaaa)
        // self.$data.aaaa = $$.getTime()
        // self.setState({
        //   aaaa : $$.getTime()
        // })
      },1000)
    }
  }
</script>

<style lang="stylus">
  @import '../node_modules/vuetify/src/stylus/main'
  @import './css/main.css'

</style>