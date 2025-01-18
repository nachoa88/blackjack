<?php

namespace App\Annotations\OpenApi\Controllers\Auth;

/**
 * @OA\Post(
 *     path="/players",
 *     tags={"Register"},
 *     summary="Register a new player",
 *     description="This is the endpoint to create and register a new player.",
 *     operationId="registerPlayer",
 *     @OA\RequestBody(
 *         description="Player registration details",
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="nickname", type="string"),
 *             @OA\Property(property="email", type="string", format="email"),
 *             @OA\Property(property="password", type="string", format="password")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Player created successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Player created successfully"),
 *             @OA\Property(property="uuid", type="string", example="3fa85f64-5717-4562-b3fc-2c963f66afa6"),
 *         )
 *     ),
 *     @OA\Response(
 *         response=422,
 *         description="Validation error",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="The given data was invalid."),
 *             @OA\Property(property="errors", type="object",
 *                 @OA\Property(property="email", type="array",
 *                     @OA\Items(type="string", example="The email field is required.")
 *                 ),
 *                 @OA\Property(property="password", type="array",
 *                     @OA\Items(type="string", example="The password field is required.")
 *                 )
 *             )
 *         )
 *     )
 * )
 */

class RegisterControllerAnnotation {}
