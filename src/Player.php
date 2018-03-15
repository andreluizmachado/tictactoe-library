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

    /**
     * return the next play of the game
     * @return array the next play
     */
    public function getNextPlay():? array
    {
        return $this->nextPlay;
    }

    /**
     * return the previous plays of the game
     * @return array a list with the possible next plays
     */
    public function getPreviousPlays(): array
    {
        return $this->previousPlays;
    }

    /**
     * @param bool $winner the winner value
     * @return PlayerInterface
     */
    public function setWinner(bool $winner): PlayerInterface
    {
        $this->winner = $winner;
        return $this;
    }

    /**
     * check if the player is the winner
     */
    public function isWinner(): bool
    {
        return $this->winner;
    }
}
