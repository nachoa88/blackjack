<?php

namespace App\Annotations\OpenApi\Models;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Game",
 *     type="object",
 *     @OA\Property(property="id", type="integer", description="The unique identifier of the game"),
 *     @OA\Property(property="user_uuid", type="string", description="The unique identifier of the user who played the game"),
 *     @OA\Property(property="deck_id", type="integer", description="The unique identifier of the deck used in the game"),
 *     @OA\Property(property="player_hand", type="string", description="The hand of the player in the game"),
 *     @OA\Property(property="dealer_hand", type="string", description="The hand of the dealer in the game"),
 *     @OA\Property(property="player_score", type="integer", description="The score of the player in the game"),
 *     @OA\Property(property="dealer_score", type="integer", description="The score of the dealer in the game"),
 *     @OA\Property(property="result", type="string", description="The result of the game, can be 'win', 'lose', or 'tie'"),
 * )
 */
class GameAnnotation {}
