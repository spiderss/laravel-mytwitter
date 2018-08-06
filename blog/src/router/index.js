import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'

import SignUp from '@/components/Admin/SignUp'
import LogIn from '@/components/Admin/LogIn'
import Users from '@/components/Admin/Users'
import UserDetail from '@/components/Admin/UserDetail'
import AddPost from '@/components/Admin/AddPost'
import Posts from '@/components/Admin/Posts'
import PostDetail from '@/components/Admin/PostDetail'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/signup',
      name: 'SignUp',
      component: SignUp
    },
    {
      path: '/login',
      name: 'LogIn',
      component: LogIn
     },
      {
          path: '/admin/users',
          name: 'Users',
          component: Users
      },{
          path: '/admin/users/:id',
          name: 'UserDetail',
          component: UserDetail,
          props: true
      },
      {
          path: '/admin/posts/new',
          name: 'AddPost',
          component: AddPost
      },
      {
          path: '/admin/posts',
          name: 'Posts',
          component: Posts
      },
      {
          path: '/posts',
          name: 'Posts',
          component: Posts
      },
      {
          path: '/posts/:id',
          name: 'PostDetail',
          component: PostDetail,
          props: true
      }
  ]
})
