<script setup>
defineProps({
  players: {
    type: Array,
    required: true,
  },
});
</script>

<template>
  <section class="mb-20">
    <h2 class="text-lg md:text-2xl text-slate-200 my-4 md:my-8">
      You're neither the best nor the worst player?
      <span class="underline decoration-4 decoration-teal-400 font-semibold">See your stats!</span>
    </h2>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
      <table class="w-full text-sm text-left text-slate-200">
        <thead class="text-sm uppercase bg-sky-950/50 border-b border-sky-950/70">
          <tr>
            <th scope="col" class="px-6 py-3">Nickname</th>
            <th scope="col" class="px-6 py-3 text-center">Win %</th>
            <th scope="col" class="px-6 py-3 text-center">Lose %</th>
            <th scope="col" class="px-6 py-3 text-center">Tie %</th>
            <th scope="col" class="px-6 py-3 text-center">Games</th>
          </tr>
        </thead>
        <tbody>
          <tr
            v-for="player in players"
            :key="player.nickname"
            class="odd:bg-sky-900/40 even:bg-sky-950/40 border-b border-sky-950/70"
          >
            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
              {{ player.nickname }}
            </th>
            <td class="px-6 py-4 text-center">{{ player.gameStats.win_percentage }}%</td>
            <td class="px-6 py-4 text-center">{{ player.gameStats.lose_percentage }}%</td>
            <td class="px-6 py-4 text-center">{{ player.gameStats.tie_percentage }}%</td>
            <td class="px-6 py-4 text-center">Will be added soon</td>
          </tr>
        </tbody>
      </table>
    </div>
    <!-- Maybe i should add pagination in here... i'll see later -->
  </section>
</template>
