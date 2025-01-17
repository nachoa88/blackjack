import { defineStore } from "pinia";

export const useAuthStore = defineStore("auth", {
  state: () => ({
    token: localStorage.getItem("token") || null,
  }),
  actions: {
    setToken(newToken) {
      this.token = newToken;
      if (newToken) {
        localStorage.setItem("token", newToken);
      } else {
        localStorage.removeItem("token");
      }
    },
    logout() {
      this.setToken(null);
    },
  },
  getters: {
    isLoggedIn: (state) => !!state.token,
  },
});