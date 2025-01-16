<script setup>
import { ref, onMounted } from "vue";
import { playerService } from "@/services/playerService";
import RankingTable from "@/components/ranking/RankingTable.vue";
import PlayerStats from "@/components/ranking/PlayerStats.vue";

const ranking = ref(null);
const winner = ref(null);
const loser = ref(null);
const loading = ref(true);
const error = ref(null);

onMounted(async () => {
  try {
    const [rankingData, winnerData, loserData] = await Promise.all([
      playerService.getRanking(),
      playerService.getWinner(),
      playerService.getLoser(),
    ]);

    ranking.value = rankingData;
    winner.value = winnerData;
    loser.value = loserData;
  } catch (err) {
    error.value = err.message || "An unexpected error occurred"; // if there is no message, display a generic message
  } finally {
    loading.value = false;
  }
});
</script>

<template>
  <div class="w-full mx-auto max-w-screen-xl p-4">
    <h1 class="text-slate-200 my-4 md:my-8 text-3xl md:text-4xl lg:text-5xl font-semibold text-center">
      These are the player's <span class="text-teal-400 font-extrabold">Rankings</span>
    </h1>
    <div class="nav-link" v-if="loading">Loading...</div>
    <div class="nav-link" v-else-if="error">Error: {{ error }}</div>
    <div v-else>
      <PlayerStats :winner="winner" :loser="loser" />
      <RankingTable :players="ranking.ranking" />
    </div>
  </div>
</template>

<style></style>
