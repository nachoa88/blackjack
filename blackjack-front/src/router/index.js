import { createRouter, createWebHistory } from 'vue-router'
import { useAuthStore } from '../stores/useAuthStore'
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
      meta: { requiresAuth: true },
    },
    {
      path: "/games",
      name: "games",
      component: () => import("../views/GamesView.vue"),
      meta: { requiresAuth: true },
    },
    {
      path: "/login",
      name: "login",
      component: () => import("../views/LoginView.vue"),
    },
    {
      path: "/register",
      name: "register",
      component: () => import("../views/RegisterView.vue"),
    }
  ],
})

// Global route guard
router.beforeEach((to, from, next) => {
  const authStore = useAuthStore();

  // Check if route requires auth
  if (to.meta.requiresAuth && !authStore.isLoggedIn) {
     // Redirect to login with return URL
     next({ 
      path: '/login', 
      query: { redirect: to.fullPath } 
    })
  } else {
    next() // Proceed normally
  }
});

export default router
