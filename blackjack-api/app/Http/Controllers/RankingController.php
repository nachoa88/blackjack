<?php

namespace App\Http\Controllers;

use App\Services\GameService;
use Illuminate\Http\JsonResponse;

class RankingController extends Controller
{
    private function handleEmptyRanking(): JsonResponse
    {
        return response()->json([
            'message' => 'No players found',
            'ranking' => [],
        ], 404);
    }

    public function ranking(GameService $gameService): JsonResponse
    {
        $playersRanking = $gameService->calculateRanking();
        if ($playersRanking->isEmpty()) {
            return $this->handleEmptyRanking();
        }

        $playersRanking = $playersRanking->sortByDesc('gameStats.win_percentage')->values();

        return response()->json([
            'message' => 'Ranking found successfully',
            'ranking' => $playersRanking->map(function ($player) {
                return [
                    'nickname' => $player->nickname,
                    'gameStats' => $player->gameStats,
                ];
            }),
        ], 200);
    }

    public function bestPlayer(GameService $gameService): JsonResponse
    {
        $playersRanking = $gameService->calculateRanking();
        if ($playersRanking->isEmpty()) {
            return $this->handleEmptyRanking();
        }

        $bestUser = $playersRanking->sortByDesc('gameStats.win_percentage')->first();

        return response()->json([
            'message' => 'Best player found successfully',
            'user_nickname' => $bestUser->nickname,
            'user_stats' => $bestUser->gameStats,
        ], 200);
    }

    public function worstPlayer(GameService $gameService): JsonResponse
    {
        $playersRanking = $gameService->calculateRanking();
        if ($playersRanking->isEmpty()) {
            return $this->handleEmptyRanking();
        }

        $worstUser = $playersRanking->sortBy('gameStats.win_percentage')->first();

        return response()->json([
            'message' => 'Worst player found successfully',
            'user_nickname' => $worstUser->nickname,
            'user_stats' => $worstUser->gameStats,
        ], 200);
    }
}
