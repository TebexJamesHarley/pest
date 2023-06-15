<?php

namespace App\Http\Services;

class GameService implements GameServiceInterface
{
    public function getGames(): array
    {
        return [
            'Minecraft',
            'Call of Duty',
            'FIFA',
            'Overwatch',
        ];
    }
}
