<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UpdateNicknameRequest;
use App\Services\GameService;
use App\Services\UserService;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    private GameService $gameService;
    private UserService $userService;

    public function __construct(GameService $gameService, UserService $userService)
    {
        $this->gameService = $gameService;
        $this->userService = $userService;
    }

    public function update(UpdateNicknameRequest $request, User $user): JsonResponse
    {
        Gate::authorize('update', $user);

        $nickname = $this->userService->updateNickname($user, $request->input('nickname'));

        return response()->json([
            'message' => 'Nickname modified successfully',
            'new nickname' => $nickname
        ]);
    }

    public function getAll(): JsonResponse
    {
        Gate::authorize('viewAny', User::class);

        $playersStats = $this->userService->getPlayersStatistics(
            $this->gameService->calculateRanking()
        );

        return response()->json($playersStats);
    }

    public function destroy(User $user): JsonResponse
    {
        Gate::authorize('deleteUser', $user);

        $this->userService->deleteUser($user);

        return response()->json([
            'message' => 'User deleted successfully',
        ]);
    }
}
