import api from "./api";

export const authService = {
  async login(credentials) {
    const response = await api.post("/login", credentials);
    return response.token;
  },

  async register(userData) {
    const response = await api.post("/players", userData);
    return response;
  }
};