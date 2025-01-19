<?php

namespace App\Annotations\OpenApi\Controllers;

use OpenApi\Annotations as OA;

class UserControllerAnnotation
{
    /**
     * @OA\Put(
     *     path="/players/{user}",
     *     tags={"Users"},
     *     summary="Update nickname for player",
     *     description="This endpoint updates the nickname for a player. Only the player themselves can access this endpoint.",
     *     operationId="updatePlayer",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="user",
     *         in="path",
     *         description="UUID of the user to update",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *         description="Nickname to update",
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="nickname", type="string", example="NewNickname"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Nickname modified successfully"),
     *             @OA\Property(property="new_nickname", type="string", example="NewNickname"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthorized"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Forbidden"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="User not found"),
     *         )
     *     ),
     * )
     */
    public function update() {}

    /**
     * @OA\Get(
     *     path="/players",
     *     tags={"Users"},
     *     summary="Show all players & their average win percentages",
     *     description="This endpoint returns all players and their average win percentages. Only authenticated users with the appropriate permissions can access this endpoint.",
     *     operationId="getAllPlayers",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="total_wins_average", type="number", example="0.52"),
     *             @OA\Property(property="total_losses_average", type="number", example="0.30"),
     *             @OA\Property(property="total_ties_average", type="number", example="0.18"),
     *             @OA\Property(property="user_details", type="array", @OA\Items(ref="#/components/schemas/User")),
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthorized"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Forbidden"),
     *         )
     *     ),
     * )
     */
    public function getAll() {}

    /**
     * @OA\Delete(
     *     path="/players/{id}",
     *     tags={"Users"},
     *     summary="Delete a user",
     *     description="This endpoint deletes a user by its UUID. Only authenticated users with the appropriate permissions can access this endpoint.",
     *     operationId="deleteUser",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="UUID of the user to delete",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="User deleted successfully"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthorized"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Forbidden",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Forbidden"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Not Found",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="User not found"),
     *         )
     *     ),
     * )
     */
    public function destroy() {}
}
