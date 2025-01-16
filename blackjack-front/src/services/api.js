import axios from "axios";

const api = axios.create({
  baseURL: "https://blackjack-api.ignacioalbiol.es/api",
  timeout: 5000, // Set the timeout to 5 seconds, if the request takes longer than that, it will be cancelled
  headers: {
    "Content-Type": "application/json",
  },
});
export default api;

// Interceptors could be applied in a separated file if the application grows.

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
        // Bad request - validation errors
        console.error("Bad request:", error.response.data);
        return Promise.reject(error.response.data);

      case 404:
        // Not found - ranking doesn't exist
        console.error("Resource not found");
        return Promise.reject(new Error("Resource not found"));

      case 500:
        // Server error
        console.error("Server error:", error.response.data);
        return Promise.reject(new Error("Internal server error"));

      default:
        console.error("API error:", error.response.data);
        return Promise.reject(error);
    }
  }
);

// Later I'll need to add the Auth interceptor

