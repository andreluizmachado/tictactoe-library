<?php
declare(strict_types=1);

namespace AndreLuizMachado\TicTacToe\Engine;

use AndreLuizMachado\TicTacToe\Engine\PlayerInterface;

class Game
{
    private $playerOne;

    private $playerTwo;

    private $gameStatus;

    const GAME_OVER_STATUS = "Game Over";
    const GAME_RUNNING_STATUS = "Game Running";

    public function __construct(
        PlayerInterface $playerOne,
        PlayerInterface $playerTwo,
        string $gameStatus
    ) {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
        $this->gameStatus = $gameStatus;
    }

    public function getStatus(): string
    {
        return $this->gameStatus;
    }

    public function getWinnerPlayer():? PlayerInterface
    {
        if ($this->playerOne->isWinner()) {
            return $this->playerOne;
        }

        if ($this->playerTwo->isWinner()) {
            return $this->playerTwo;
        }
        return null;
    }
}
