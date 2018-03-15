<?php

namespace AndreLuizMachado\TicTacToe\Engine;

trait AllPlaysTrait
{
    /**
     * sum the all plays (previous + next) and return then
     * @return array the all plays (previous + next)
     */
    public function getAllPlays(): array
    {
        $allPlays =  $this->getPreviousPlays();

        if ($this->getNextPlay() !== null) {
            array_push($allPlays, $this->getNextPlay());
        }
        return $allPlays;
    }
}
