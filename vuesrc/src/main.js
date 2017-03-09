import $$ from './libs/aaa'
import App from './App.vue'
import Vuetify from 'vuetify'
import Vuex from 'vuex'
Vue.use(Vuetify)

// 0. 如果使用模块化机制编程，導入Vue和VueRouter，要调用 Vue.use(VueRouter)
Vue.use(VueRouter)

// 1. 定义（路由）组件。
// 可以从其他文件 import 进来
// const Bar = { template: '<div><router-link to="/foo">Bar</router-link></div>' }
const Index = { template: '<div><router-link to="/">Index</router-link></div>' }

import PageStaffInvite from './com/page_staff_invite.vue'
import PageCateCommBbs from './com/page_cate_comm.vue'
const PageCateCommNews = Object.assign({},PageCateCommBbs,{})

// 2. 定义路由
// 每个路由应该映射一个组件。 其中"component" 可以是
// 通过 Vue.extend() 创建的组件构造器，
// 或者，只是一个组件配置对象。
// 我们晚点再讨论嵌套路由。
const routes = [
  { path: '/', component: Index },
  { path: '/cate/bbs/:title/:desc', component: PageCateCommBbs },
  { path: '/cate/news/:title/:desc', component: PageCateCommNews },
  { path: '/staff/invite', component: PageStaffInvite },
  // { path: '/bar', component: Bar },
]

// 3. 创建 router 实例，然后传 `routes` 配置
// 你还可以传别的配置参数, 不过先这么简单着吧。
const router = new VueRouter({
  mode: 'history', //history模式 去掉锚点
  saveScrollPosition: true, //记住页面的滚动位置 html5模式适用
  routes // （缩写）相当于 routes: routes
})

// 4. 创建和挂载根实例。
// 记得要通过 router 配置参数注入路由，
// 从而让整个应用都有路由功能



// const store = new Vuex.Store({
//   state: {
//     count: 0
//   },
//   mutations: {
//     increment (state) {
//       state.count++
//     }
//   }
// })



const store = new Vuex.Store({
  state: {
    todos: [
      { id: 1, text: '...', done: true },
      { id: 2, text: '...', done: false }
    ]
  },
  mutations: { 
    ['INC'] (state) {
      // 变更状态
      state.count++
    }
  },
  getters: {
    doneTodos: state => {
      return state.todos.filter(todo => todo.done)
    },

    doneTodosCount: (state, getters) => {
      return getters.doneTodos.length
    },

  }
})

  // store.commit('increment', 10)

// computed: {
//   doneTodosCount () {
//     return this.$store.getters.doneTodosCount
//   }
// }


new Vue({
  el: '#app',
  render: h => h(App),
  router,
  store,
})
