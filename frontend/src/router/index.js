import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import LoginRegisterView from '../views/LoginRegisterView.vue'
import JobsView from '../views/JobsView.vue'
import AccInfoView from '../views/AccInfoView.vue'
const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: function () {
      return import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
    }
  },
  {
    path: '/login&register',
    name: 'login&register',
    component: LoginRegisterView
  },
  {
    path:'/jobs',
    name: 'jobs',
    component:JobsView
  },
  {
    path:'/Accinfo',
    name: 'Accinfo',
    component:AccInfoView
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
  linkActiveClass: 'active-link'
})

export default router
