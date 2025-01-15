<script setup>
defineProps({
  players: {
    type: Array,
    required: true,
  },
});
</script>

<template>
  <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <h1 class="text-slate-200 text-2xl font-semibold p-4">Ranking Table</h1>
    <table class="w-full text-sm text-left text-slate-200">
      <thead class="text-xs uppercase bg-slate-700">
        <tr>
          <th scope="col" class="px-6 py-3">Nickname</th>
          <th scope="col" class="px-6 py-3">Win %</th>
          <th scope="col" class="px-6 py-3">Lose %</th>
          <th scope="col" class="px-6 py-3">Tie %</th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="player in players"
          :key="player.nickname"
          class="odd:bg-slate-800 even:bg-slate-700 border-b border-slate-600"
        >
          <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
            {{ player.nickname }}
          </th>
          <td class="px-6 py-4">{{ player.gameStats.win_percentage }}%</td>
          <td class="px-6 py-4">{{ player.gameStats.lose_percentage }}%</td>
          <td class="px-6 py-4">{{ player.gameStats.tie_percentage }}%</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
