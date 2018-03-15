<?php

namespace AndreLuizMachado\TicTacToe\Engine;

trait AllPlaysTrait
{
    public function getAllPlays(): array
    {
        $allPlays =  $this->getPreviousPlays();

        if ($this->getNextPlay() !== null) {
            array_push($allPlays, $this->getNextPlay());
        }
        return $allPlays;
    }
}
