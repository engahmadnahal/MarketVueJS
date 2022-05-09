import { createRouter, createWebHistory,createWebHashHistory  } from 'vue-router'
import HomeView from '../views/front/HomeView.vue'
import LoginView from '../views/front/LoginView.vue'
import RegisterView from '../views/front/RegisterView.vue'
import CategoryView from '../views/front/CategoryView.vue'
import StoreView from '../views/front/StoreView.vue'
import LogoutView from '../views/front/LogoutView.vue'


const router = createRouter({
  history: createWebHashHistory(),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/login',
      name: 'Login',
      component: LoginView
    },
    {
      path: '/register',
      name: 'Register',
      component: RegisterView
    },
    {
      path: '/category/:id',
      name: 'Category',
      component: CategoryView
    },
    {
      path: '/store/:id',
      name: 'Store',
      component: StoreView
    },
    {
      path: '/logout/:id',
      name: 'Logout',
      component: LogoutView
    },
    

  ]
})

export default router
