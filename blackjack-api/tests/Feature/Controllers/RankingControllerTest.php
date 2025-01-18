<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;
use App\Models\User;

class RankingControllerTest extends TestCase
{
    public function testRanking(): void
    {
        $response = $this->json('GET', '/api/players/ranking');

        $response
            ->assertStatus(200) // STATUS 200 -> OK
            ->assertJsonStructure([
                'message',
                'ranking' => [
                    '*' => [
                        'nickname',
                        'gameStats' => [
                            'win_percentage',
                            'tie_percentage',
                            'lose_percentage',
                            'total_games',
                        ],
                    ],
                ],
            ]);
    }

    public function testBestPlayer(): void
    {
        $response = $this->json('GET', '/api/players/ranking/winner');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'user_nickname',
                'user_stats' => [
                    'win_percentage',
                    'tie_percentage',
                    'lose_percentage',
                    'total_games',
                ],
            ]);
    }

    public function testWorstPlayer(): void
    {
        $response = $this->json('GET', '/api/players/ranking/loser');

        $response
            ->assertStatus(200)
            ->assertJsonStructure([
                'message',
                'user_nickname',
                'user_stats' => [
                    'win_percentage',
                    'tie_percentage',
                    'lose_percentage',
                    'total_games',
                ],
            ]);
    }

    public function testEmptyRanking(): void
    {
        User::query()->delete();

        $response = $this->json('GET', '/api/players/ranking');

        $response
            ->assertStatus(404)
            ->assertJson([
                'message' => 'No players found',
                'ranking' => [],
            ]);
    }

    public function testEmptyBestPlayer(): void
    {
        User::query()->delete();

        $response = $this->json('GET', '/api/players/ranking/winner');

        $response
            ->assertStatus(404)
            ->assertJson([
                'message' => 'No players found',
            ]);
    }

    public function testEmptyWorstPlayer(): void
    {
        User::query()->delete();

        $response = $this->json('GET', '/api/players/ranking/loser');

        $response
            ->assertStatus(404)
            ->assertJson([
                'message' => 'No players found',
            ]);
    }
}
