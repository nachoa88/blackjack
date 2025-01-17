<script setup>
import { useAuthStore } from "@/stores/useAuthStore";

const authStore = useAuthStore();
</script>

<template>
  <div class="w-full mx-auto max-w-screen-xl p-4">
    <h1 class="text-slate-200 my-4 md:my-8 text-3xl md:text-4xl lg:text-5xl font-semibold text-center">
      This is <span class="text-teal-400 font-extrabold">Home Page</span>
    </h1>
    <!-- Guest welcome -->
    <h2 v-if="!authStore.isLoggedIn" class="text-lg md:text-2xl text-slate-200 my-4 md:my-8">
      Welcome! This is the guest home page. As a guest you can only see the ranking.
      <span class="underline decoration-4 decoration-teal-400 font-semibold"
        >Please login or register to start playing.</span
      >
    </h2>

    <!-- Authenticated user welcome -->
    <h2 v-else class="text-lg md:text-2xl text-slate-200 my-4 md:my-8">
      Welcome back!
      <span class="underline decoration-4 decoration-teal-400 font-semibold">Ready to play?</span>
    </h2>
  </div>
</template>

<style></style>
