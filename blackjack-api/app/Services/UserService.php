<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public function updateNickname(User $user, ?string $nickname): string
    {
        $user->nickname = $nickname ?? 'Anonymous';
        $user->save();

        return $user->nickname;
    }

    public function getPlayersStatistics(Collection $players): array
    {
        return [
            'total_wins_average' => round($players->avg('gameStats.win_percentage'), 2),
            'total_losses_average' => round($players->avg('gameStats.lose_percentage'), 2),
            'total_ties_average' => round($players->avg('gameStats.tie_percentage'), 2),
            'user_details' => $players,
        ];
    }

    public function deleteUser(User $user): void
    {
        $user->delete();
    }
}
