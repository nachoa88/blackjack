<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";
import { authService } from "@/services/authService";

const router = useRouter();
const nickname = ref("");
const email = ref("");
const password = ref("");
const error = ref(null);
const loading = ref(false);

const handleSubmit = async (e) => {
  e.preventDefault();
  loading.value = true;
  error.value = null;

  try {
    await authService.register({
      nickname: nickname.value,
      email: email.value,
      password: password.value,
    });
    router.push("/login"); // Redirect to login after successful registration
  } catch (err) {
    error.value = err.message || err; 
  } finally {
    loading.value = false;
  }
};
</script>

<template>
  <div class="w-full mx-auto max-w-screen-xl p-4">
    <h1 class="text-slate-200 my-4 md:my-8 text-3xl md:text-4xl lg:text-5xl font-semibold text-center">
      Do you want to play? <span class="text-teal-400 font-extrabold">Join us!</span>
    </h1>

    <div class="sm:mx-auto sm:w-full sm:max-w-sm bg-sky-950/50 rounded-lg shadow-lg p-4">
      <h2 class="mt-4 text-center text-2xl font-bold text-slate-200">Register a new player account</h2>

      <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-sm">
        <form @submit="handleSubmit" class="space-y-6">
          <div>
            <label for="nickname" class="block text-sm/6 font-medium text-slate-200">Your Nickname</label>
            <div class="mt-2">
              <input
                v-model="nickname"
                type="text"
                name="nickname"
                id="nickname"
                required
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-teal-400 sm:text-sm/6"
              />
            </div>
          </div>
          <div>
            <label for="email" class="block text-sm/6 font-medium text-slate-200">Email address</label>
            <div class="mt-2">
              <input
                v-model="email"
                type="email"
                name="email"
                id="email"
                required
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-teal-400 sm:text-sm/6"
              />
            </div>
          </div>

          <div>
            <div class="flex items-center justify-between">
              <label for="password" class="block text-sm/6 font-medium text-slate-200">Password</label>
            </div>
            <div class="mt-2">
              <input
                v-model="password"
                type="password"
                name="password"
                id="password"
                required
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-teal-400 sm:text-sm/6"
              />
            </div>
          </div>

          <div v-if="error" class="mt-4 p-2 text-xs uppercase tracking-widest font-semibold text-center text-red-500 ">
            {{ error }}
          </div>

          <div>
            <button
              type="submit"
              :disabled="loading"
              class="flex w-full justify-center nav-link bg-teal-600 hover:bg-teal-700 rounded-lg px-4 py-2 mt-8 mb-4"
            >
              {{ loading ? "Registering..." : "Register" }}
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<style></style>
