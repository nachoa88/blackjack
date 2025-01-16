import { ref } from "vue";

export const useAuthStore = () => {
  const token = ref(localStorage.getItem("token"));

  // Methods
  const setToken = (newToken) => {
    token.value = newToken;
    if (newToken) {
      localStorage.setItem("token", newToken);
    }
  };

  const logout = () => {
    token.value = null;
    localStorage.removeItem("token");
  };

  return {
    token, // Reactive state
    setToken, // Method to update token
    logout, // Method to clear token
  };
};
