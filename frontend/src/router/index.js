import { createRouter, createWebHistory } from 'vue-router'
import Dashboard from '../views/Dashboard.vue'
import Post from '../views/Posts/Post.vue'
import PostView from '../views/Posts/PostView.vue'
import PostEdit from '../views/Posts/PostEdit.vue'
import User from '../views/Users/User.vue'
import UserView from '../views/Users/UserView.vue'
import UserEdit from '../views/Users/UserEdit.vue'
import Login from '../views/Login.vue'
import AppLayout from '../components/AppLayout.vue'
import {useAuthStore} from '../store/auth'


const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'app',
      // component: AppLayout,
      component: () => import('../components/AppLayout.vue'),
      redirect: '/dashboard',
      meta: {requiresAuth: true},
      children: [
        {
          path: '/dashboard',
          name: 'app.dashboard',
          component: Dashboard
        },
        {
          path: '/post',
          name: 'app.post',
          component: Post
        },
        {
          path: '/post/:id',
          name: 'app.post-view',
          component: PostView
        },
        {
          path: '/post/edit/:id',
          name: 'app.post-edit',
          component: PostEdit
        },
        {
          path: '/user',
          name: 'app.user',
          component: User
        },
        {
          path: '/user/:id',
          name: 'app.user-view',
          component: UserView
        },
        {
          path: '/user/edit/:id',
          name: 'app.user-edit',
          component: UserEdit
        },
      ]
    },
    
    {
      path: '/login',
      name: 'login',
      component: Login,
      meta: {requiresGuest: true}
    },
    
    // {
    //   path: '/about',
    //   name: 'about',
    //   // route level code-splitting
    //   // this generates a separate chunk (About.[hash].js) for this route
    //   // which is lazy-loaded when the route is visited.
    //   component: () => import('../views/AboutView.vue')
    // }
  ]
})

router.beforeEach((to, from, next) => {
  const store = useAuthStore()
  if (to.meta.requiresAuth && !store.user.token) {
    next({name: 'login'})
  } else if (to.meta.requiresGuest && store.user.token) {
    next({name: 'app.dashboard'})
  } else {
    next()
  }
})

export default router
