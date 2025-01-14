import { fetchApi } from "./api";

export const playerService = {
  async getRanking() {
    return fetchApi("/players/ranking");
  },

  async getWinner() {
    return fetchApi("/players/ranking/winner");
  },

  async getLoser() {
    return fetchApi("/players/ranking/loser");
  },
};
