<script setup>
import { ref, onMounted } from "vue";
import { playerService } from "@/services/playerService";
import RankingTable from "@/components/ranking/RankingTable.vue";

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
    <h1 class="text-slate-200 mb-4 text-3xl md:text-4xl lg:text-5xl font-semibold">
      This is <span class="text-sky-600 dark:text-teal-400 font-extrabold">Rankings Page</span>
    </h1>
    <div v-if="loading">Loading...</div>

    <div v-else-if="error">Error: {{ error }}</div>

    <div v-else>
      <section>
        <h2 class="text-xl">Best Player</h2>
        <div>Nickname: {{ winner["user_nickname"] }}</div>
      </section>

      <section>
        <h2 class="text-xl">Worst Player</h2>
        <pre>{{ JSON.stringify(loser) }}</pre>
      </section>
      
      <RankingTable :players="ranking.ranking" />
    </div>
  </div>
</template>

<style></style>
