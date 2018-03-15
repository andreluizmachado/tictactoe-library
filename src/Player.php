<?php

declare(strict_types=1);

namespace AndreLuizMachado\TicTacToe\Engine;

use AndreLuizMachado\TicTacToe\Engine\PlayerInterface;

use AndreLuizMachado\TicTacToe\Engine\AllPlaysTrait;

class Player implements PlayerInterface
{
    use AllPlaysTrait;

    private $nextPlay;
    private $previousPlays;
    private $winner = false;

    public function __construct(array $previousPlays, array $nextPlay = null)
    {
        $this->nextPlay = $nextPlay;
        $this->previousPlays = $previousPlays;
    }

    public function getNextPlay():? array
    {
        return $this->nextPlay;
    }

    public function getPreviousPlays(): array
    {
        return $this->previousPlays;
    }

    public function setWinner(bool $winner): PlayerInterface
    {
        $this->winner = $winner;
        return $this;
    }

    public function isWinner(): bool
    {
        return $this->winner;
    }
}
