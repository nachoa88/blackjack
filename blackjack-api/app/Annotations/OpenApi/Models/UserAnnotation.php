<?php

namespace App\Annotations\OpenApi\Models;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="User",
 *     type="object",
 *     title="User",
 *     description="User model",
 *     @OA\Property(property="uuid", type="string", format="uuid", description="UUID of the user"),
 *     @OA\Property(property="nickname", type="string", description="Nickname of the user"),
 *     @OA\Property(property="email", type="string", format="email", description="Email of the user"),
 *     @OA\Property(property="password", type="string", format="password", description="Password of the user"),
 *     @OA\Property(property="wins", type="integer", description="Number of wins"),
 *     @OA\Property(property="losses", type="integer", description="Number of losses"),
 *     @OA\Property(property="ties", type="integer", description="Number of ties"),
 *     @OA\Property(property="email_verified_at", type="string", format="date-time", description="Email verification timestamp"),
 *     @OA\Property(property="remember_token", type="string", description="Remember token", nullable=true)
 * )
 */
class UserAnnotation {}
