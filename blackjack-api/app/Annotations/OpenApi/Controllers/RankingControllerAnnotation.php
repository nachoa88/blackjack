<?php

namespace App\Annotations\OpenApi\Controllers;

use OpenApi\Annotations as OA;

class RankingControllerAnnotation
{
    /**
     * @OA\Get(
     *     path="/players/ranking",
     *     tags={"Ranking"},
     *     summary="Get the ranking of all players",
     *     description="This endpoint returns the ranking of all players.",
     *     operationId="ranking",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Ranking found successfully"),
     *             @OA\Property(
     *                 property="ranking",
     *                 type="array",
     *                 @OA\Items(
     *                     type="object",
     *                     @OA\Property(property="nickname", type="string"),
     *                     @OA\Property(
     *                         property="gameStats",
     *                         type="object",
     *                         @OA\Property(property="win_percentage", type="number"),
     *                         @OA\Property(property="tie_percentage", type="number"),
     *                         @OA\Property(property="lose_percentage", type="number"),
     *                         @OA\Property(property="total_games", type="integer")
     *                     )
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="No players found"),
     *             @OA\Property(
     *                 property="ranking",
     *                 type="array",
     *                 @OA\Items(type="string"),
     *                 example={}
     *             )
     *         )
     *     )
     * )
     */
    public function ranking() {}

    /**
     * @OA\Get(
     *     path="/players/ranking/winner",
     *     tags={"Ranking"},
     *     summary="Get the best player and its stats",
     *     description="This endpoint returns the best player and their stats. It is a public endpoint and does not require authentication.",
     *     operationId="getBestPlayer",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Best player found successfully"),
     *             @OA\Property(property="user_nickname", type="string"),
     *             @OA\Property(
     *                 property="user_stats", 
     *                 type="object",
     *                 @OA\Property(property="win_percentage", type="number"),
     *                 @OA\Property(property="tie_percentage", type="number"),
     *                 @OA\Property(property="lose_percentage", type="number"),
     *                 @OA\Property(property="total_games", type="integer")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="No players found")
     *         )
     *     ),
     * )
     */
    public function bestPlayer() {}

    /**
     * @OA\Get(
     *     path="/players/ranking/loser",
     *     tags={"Ranking"},
     *     summary="Get the worst player and its stats",
     *     description="This endpoint returns the worst player and their stats. It is a public endpoint and does not require authentication.",
     *     operationId="getWorstPlayer",
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="message", type="string", example="Worst player found successfully"),
     *             @OA\Property(property="user_nickname", type="string"),
     *             @OA\Property(
     *                 property="user_stats", 
     *                 type="object",
     *                 @OA\Property(property="win_percentage", type="number"),
     *                 @OA\Property(property="tie_percentage", type="number"),
     *                 @OA\Property(property="lose_percentage", type="number"),
     *                 @OA\Property(property="total_games", type="integer")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="No players found")
     *         )
     *     ),
     * )
     */
    public function worstPlayer() {}
}
