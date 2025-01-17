<script setup>
import { RouterLink, RouterView } from "vue-router";
import { ref } from "vue";
import { useRouter } from "vue-router";
import { useAuthStore } from "@/stores/useAuthStore";

const showDropdown = ref(false);
const authStore = useAuthStore();
const router = useRouter();

const toggleDropdown = () => {
  showDropdown.value = !showDropdown.value;
};

const handleLogout = () => {
  authStore.logout();
  router.push("/");
};
</script>

<template>
  <div class="min-h-screen flex flex-col bg-slate-700">
    <!-- Navbar -->
    <header>
      <div class="flex justify-center p-4 m-4 bg-cyan-200/20 rounded-lg shadow-lg">
        <!-- Logo -->
        <div class="flex items-center text-slate-200 px-6">
          <a href="/"> Logo Here! </a>
        </div>
        <!-- Navigation Links -->
        <div class="flex items-center gap-6">
          <RouterLink to="/" class="inline-flex items-center nav-link nav-link-hover">Home</RouterLink>
          <RouterLink to="/ranking" class="inline-flex items-center nav-link nav-link-hover">Ranking</RouterLink>
          <RouterLink to="/players" class="inline-flex items-center nav-link nav-link-hover">Players</RouterLink>

          <!-- Authenticated user dropdown -->
          <!-- <div class="relative">
            <button
              type="button"
              @click="toggleDropdown"
              class="inline-flex items-center nav-link bg-teal-700 hover:bg-teal-800 rounded-lg px-4 py-2.5 gap-1"
            >
              Nickname
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                  fill-rule="evenodd"
                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </button>
            <div
              v-if="showDropdown"
              class="absolute right-0 mt-2 bg-white rounded shadow-lg py-2 text-sm text-slate-700"
            >
              <a href="#" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
              <a href="#" class="block px-4 py-2 hover:bg-gray-100">Logout</a>
            </div>
          </div> -->

          <!-- Guest user login and register -->
          <div v-if="!authStore.isLoggedIn" class="flex gap-4">
            <RouterLink
              to="/login"
              class="inline-flex items-center nav-link bg-teal-600 hover:bg-teal-700 rounded-lg px-4 py-2"
            >
              Log in
            </RouterLink>
            <RouterLink
              to="/register"
              class="inline-flex items-center nav-link bg-teal-600 hover:bg-teal-700 rounded-lg px-4 py-2"
            >
              Register
            </RouterLink>
          </div>
          <div v-else>
            <button
              @click="handleLogout"
              class="inline-flex items-center nav-link bg-red-700 hover:bg-red-800 rounded-lg px-4 py-2"
            >
              Logout
            </button>
          </div>
        </div>
        <!-- Hamburger Menu -->
      </div>
    </header>

    <!-- Main Content -->
    <main class="flex flex-1">
      <div class="flex-1 m-4 bg-cyan-200/20 rounded-lg shadow-lg">
        <RouterView />
      </div>
    </main>

    <!-- Footer -->
    <footer class="m-4 bg-cyan-200/20 rounded-lg shadow-lg">
      <div
        class="w-full mx-auto max-w-screen-xl p-4 flex flex-col items-center lg:flex-row lg:items-center lg:justify-between"
      >
        <p class="text-sm text-slate-200">Here goes the logo</p>
        <span class="text-sm text-slate-200">© 2025. You can copy whatever you want.</span>
      </div>
    </footer>
  </div>
</template>

<style scoped></style>
