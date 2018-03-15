<?php
declare(strict_types=1);

namespace AndreLuizMachado\TicTacToe\Engine;

interface PlayerInterface
{
    public function getNextPlay():? array;

    public function getPreviousPlays():? array;

    public function setWinner(bool $winner): self;

    public function isWinner(): bool;

    public function getAllPlays(): array;
}
