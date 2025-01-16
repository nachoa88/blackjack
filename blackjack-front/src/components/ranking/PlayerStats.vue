<script setup>
defineProps({
  winner: {
    type: Object,
    required: true,
  },
  loser: {
    type: Object,
    required: true,
  },
});
</script>

<template>
  <section class="grid md:grid-cols-2 gap-4 md:gap-40 p-4 mx-auto">
    <div class="bg-sky-950/50 p-4 rounded-lg">
      <h2 class="stats-title text-teal-400">Best Player</h2>
      <dl class="flex justify-around items-center text-slate-200 mb-2">
        <div class="text-center">
          <dt class="nav-link mb-2">Nickname</dt>
          <dd>{{ winner.user_nickname }}</dd>
        </div>
        <div class="text-center">
          <dt class="nav-link mb-2">Win Rate</dt>
          <dd>{{ winner.user_stats.win_percentage }}%</dd>
        </div>
      </dl>
    </div>
    
    <div class="bg-sky-950/50 p-4 rounded-lg">
      <h2 class="stats-title text-amber-600">Worst Player</h2>
      <dl class="flex justify-around items-center text-slate-200">
        <div class="text-center">
          <dt class="nav-link mb-2">Nickname</dt>
          <dd>{{ loser.user_nickname }}</dd>
        </div>u
        <div class="text-center">
          <dt class="nav-link mb-2">Lose Rate</dt>
          <dd>{{ loser.user_stats.lose_percentage }}%</dd>
        </div>
      </dl>
    </div>
  </section>
</template>
