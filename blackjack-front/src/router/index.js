import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: "/ranking",
      name: "ranking",
      component: () => import("../views/RankingView.vue"),
    },
    {
      path: "/players",
      name: "players",
      component: () => import("../views/PlayersView.vue"),
    }
  ],
})

export default router
