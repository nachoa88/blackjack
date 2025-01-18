<?php

namespace App\Services;

use App\Models\User;

class GameService
{
    public function getPlayers()
    {
        return User::role('player')->with('games')->get();
    }

    public function getGameStats(User $user): array
    {
        // Get the game stats of a user.
        $totalGames = $user->games->count();

        // It's not necessary to calculate the percentages if the user has not played any games.
        if ($totalGames === 0) {
            return [
                'win_percentage' => 0,
                'lose_percentage' => 0,
                'tie_percentage' => 0,
                'total_games' => 0,
            ];
        }

        return [
            'win_percentage' => round(($user->wins / $totalGames) * 100, 2),
            'lose_percentage' => round(($user->losses / $totalGames) * 100, 2),
            'tie_percentage' => round(($user->ties / $totalGames) * 100, 2),
            'total_games' => $totalGames,
        ];
    }

    // Calculate the game stats for all the players.
    public function calculateRanking()
    {
        $users = $this->getPlayers();
        // Get the game stats for all the players.
        foreach ($users as $user) {
            // Call the Accessor function from user model to get the game stats and assign it to the user object.
            $user->gameStats = $this->getGameStats($user);
        }

        return $users;
    }
}
