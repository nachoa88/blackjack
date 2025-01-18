<?php

namespace App\Annotations\OpenApi\Controllers;

/**
 * @OA\Post(
 *     path="/login",
 *     tags={"Login"},
 *     summary="Log in a registered player",
 *     description="This is the endpoint to log in a registered player.",
 *     operationId="loginPlayer",
 *     @OA\RequestBody(
 *         description="Player login data",
 *         required=true,
 *         @OA\JsonContent(
 *             required={"email","password"},
 *             @OA\Property(property="email", type="string", format="email", example="test@mail.com"),
 *             @OA\Property(property="password", type="string", format="password", example="123456789"),
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Player logged in successfully",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="User logged in successfully"),
 *             @OA\Property(property="token", type="string", example="token"),
 *             @OA\Property(property="user", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="nickname", type="string", example="testUser")
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid login details",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Invalid login details"),
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

class AuthControllerAnnotation {}
