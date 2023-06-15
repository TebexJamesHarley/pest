<?php

namespace App\Http\Controllers;

use App\Http\Services\GameServiceInterface;
use Illuminate\Http\JsonResponse;

class GameController extends Controller
{
    public function index(GameServiceInterface $gameService): JsonResponse
    {
        $gameService->getGames();

        return response()->json([
            'data' => [
                [
                    'name' => 'Call of Duty: Modern Warfare 2',
                    'description' => 'A modern day shooter',
                ],
                [
                    'name' => 'FIFA 23',
                    'description' => 'A football game',
                ],
                [
                    'name' => 'The Legend of Zelda: Breath of the Wild',
                    'description' => 'An action-adventure game',
                ]
            ]
        ]);
    }
}
