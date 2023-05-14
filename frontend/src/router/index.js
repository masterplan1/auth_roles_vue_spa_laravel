import { createRouter, createWebHistory } from 'vue-router'
import Dashboard from '../views/Dashboard.vue'
import Post from '../views/Posts/Post.vue'
import PostView from '../views/Posts/PostView.vue'
import PostCreate from '../views/Posts/PostCreate.vue'
import PostEdit from '../views/Posts/PostEdit.vue'
import User from '../views/Users/User.vue'
import UserView from '../views/Users/UserView.vue'
import UserCreate from '../views/Users/UserCreate.vue'
import UserEdit from '../views/Users/UserEdit.vue'
import Role from '../views/Roles/Role.vue'
import RoleEdit from '../views/Roles/RoleEdit.vue'
import Login from '../views/Login.vue'
import AppLayout from '../components/AppLayout.vue'
import {useAuthStore} from '../store/auth'

import ability from '../services/ability'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'app',
      component: () => import('../components/AppLayout.vue'),
      redirect: '/dashboard',
      meta: {requiresAuth: true},
      children: [
        {
          path: '/dashboard',
          name: 'app.dashboard',
          meta: {shouldAuth: false},
          component: Dashboard
        },
        
        {
          path: '/post/:id',
          name: 'app.post-view',
          meta: {shouldAuth: true, accept_info: {action: 'view', subject: 'articles'}},
          component: PostView
        },
        {
          path: '/post/create',
          name: 'app.post-create',
          meta: {shouldAuth: true, accept_info: {action: 'create', subject: 'articles'}},
          component: PostCreate
        },
        
        {
          path: '/post/edit/:id',
          name: 'app.post-edit',
          meta: {shouldAuth: true, accept_info: {action: 'edit', subject: 'articles'}},
          component: PostEdit
        },
        {
          path: '/post',
          name: 'app.post',
          meta: {shouldAuth: false},
          component: Post
        },
        
        {
          path: '/user/:id',
          name: 'app.user-view',
          meta: {shouldAuth: true, accept_info: {action: 'view', subject: 'user'}},
          component: UserView
        },
        {
          path: '/user/create',
          name: 'app.user-create',
          meta: {shouldAuth: true, accept_info: {action: 'create', subject: 'user'}},
          component: UserCreate
        },
        {
          path: '/user/edit/:id',
          name: 'app.user-edit',
          meta: {shouldAuth: true, accept_info: {action: 'edit', subject: 'user'}},
          component: UserEdit
        },
        {
          path: '/user',
          name: 'app.user',
          meta: {shouldAuth: true, accept_info: {action: 'view', subject: 'users_list'}},
          component: User
        },
        
        {
          path: '/role/edit/:id',
          name: 'app.role-edit',
          meta: {shouldAuth: true, accept_info: {action: 'edit', subject: 'role'}},
          component: RoleEdit
        },
        {
          path: '/role',
          name: 'app.role',
          meta: {shouldAuth: true, accept_info: {action: 'view', subject: 'roles'}},
          component: Role
        },
      ]
    },
    
    {
      path: '/login',
      name: 'login',
      component: Login,
      meta: {requiresGuest: true}
    },
  ]
})

router.beforeEach((to, from, next) => {
  const store = useAuthStore()
  const accept = ability.can(to.meta?.accept_info?.action, to.meta?.accept_info?.subject)
  if (to.meta.requiresAuth && !store.user.token) {
    next({name: 'login'})
  } else if (to.meta.requiresGuest && store.user.token) {
    next({name: 'app.dashboard'})
  } else if (to.meta.shouldAuth && !accept) {
    next(from)
  } else {
    next()
  }
})

export default router
