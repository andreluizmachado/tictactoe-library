<?php
declare(strict_types=1);

namespace AndreLuizMachado\TicTacToe\Engine;

interface PlayerInterface
{
    /**
     * return the next play of the game
     * @return array the next play
     */
    public function getNextPlay():? array;

    /**
     * return the previous plays of the game
     * @return array a list with the possible next plays
     */
    public function getPreviousPlays():? array;

    /**
     * @param bool $winner the winner value
     * @return PlayerInterface
     */
    public function setWinner(bool $winner): self;

    /**
     * check if the player is the winner
     */
    public function isWinner(): bool;

    /**
     * sum the all plays (previous + next) and return then
     * @return array the all plays (previous + next)
     */
    public function getAllPlays(): array;
}
