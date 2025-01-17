import axios from "axios";

const api = axios.create({
  baseURL: "https://blackjack-api.ignacioalbiol.es/api",
  timeout: 5000, // Set the timeout to 5 seconds, if the request takes longer than that, it will be cancelled
  headers: {
    "Content-Type": "application/json",
  },
});
export default api;

// Interceptors could be applied in a separated file if the application gets bigger.

// Request interceptor
api.interceptors.response.use(
  // Success handler - return data directly
  (response) => response.data,
  // Error handler
  (error) => {
    if (!error.response) {
      // Network error or timeout
      console.error("Network error or timeout");
      return Promise.reject(new Error("Network error - please check your connection"));
    }

    switch (error.response.status) {
      case 400:
        console.error("Bad request:", error.response.data);
        return Promise.reject(error.response.data);

      case 401:
        console.error("Unauthorized access");
        return Promise.reject(error.response.data);

      case 403:
        console.error("Forbidden access:", error.response.data);
        return Promise.reject(error.response.data);

      case 404:
        console.error("Resource not found:", error.response.data);
        return Promise.reject(error.response.data);

      case 422:
        console.error("Validation error:", error.response.data);
        return Promise.reject(error.response.data);

      case 500:
        console.error("Server error:", error.response.data);
        return Promise.reject(error.response.data);

      default:
        console.error("API error:", error.response.data);
        return Promise.reject(error.response.data);
    }
  }
);

// Auth interceptor
api.interceptors.request.use(
  (config) => {
    const token = localStorage.getItem("token");
    if (token) {
      config.headers.Authorization = `Bearer ${token}`;
    }
    return config;
  },
  (error) => {
    return Promise.reject(error);
  }
);
