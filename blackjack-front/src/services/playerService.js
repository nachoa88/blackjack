import api from "./api";

export const playerService = {
  getRanking: () => api.get("/players/ranking"),
  getWinner: () => api.get("/players/ranking/loser"),
  getLoser: () => api.get("/players/ranking/winner"),
};
