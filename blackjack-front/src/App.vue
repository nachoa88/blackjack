<script setup>
import { RouterLink, RouterView } from "vue-router";
</script>

<template>
  <div class="min-h-screen flex flex-col bg-slate-400">
    <!-- Navbar -->
    <header>
      <nav class="flex justify-center gap-6 p-4 m-4 bg-slate-600 rounded-lg shadow-lg">
        <div class="text-slate-200">Logo Here!</div>
        <RouterLink to="/" class="nav-link">Home</RouterLink>
        <RouterLink to="/ranking" class="nav-link">Ranking</RouterLink>
        <RouterLink to="/players" class="nav-link">Players</RouterLink>
        <!-- Login / Register / Logut -->
      </nav>
    </header>

    <!-- Main Content -->
    <main class="flex flex-1">
      <div class="flex-1 m-4 bg-slate-600 rounded-lg shadow-lg">
        <RouterView />
      </div>
    </main>

    <!-- Footer -->
    <footer class="m-4 bg-slate-600 rounded-lg shadow-lg">
      <div
        class="w-full mx-auto max-w-screen-xl p-4 flex flex-col items-center lg:flex-row lg:items-center lg:justify-between"
      >
        <p class="text-sm text-slate-200">Here goes the logo</p>
        <span class="text-sm text-slate-200">© 2025. You can copy whatever you want.</span>
      </div>
    </footer>
  </div>
</template>

<style scoped>
.nav-link {
  color: whitesmoke;
  text-decoration: none;
  text-transform: uppercase;
  font-weight: 500;
}
.nav-link:hover {
  text-decoration: underline;
}
</style>
