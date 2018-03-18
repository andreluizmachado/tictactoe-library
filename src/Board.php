<?php
declare(strict_types=1);

namespace AndreLuizMachado\TicTacToe\Engine;

use AndreLuizMachado\TicTacToe\Engine\Game;
use AndreLuizMachado\TicTacToe\Engine\PlayerInterface;

class Board
{
    private $playerOne;
    private $playerTwo;

    public function __construct(
        PlayerInterface $playerOne,
        PlayerInterface $playerTwo
    ) {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    /**
     * return the game status
     * if has a winner it returns a game over status with the
     * winner player
     * if the game is running it returns the game running status
     * without a winner player
     * if has no plays it returns a game over status
     * without a winner player
     * @return Game
     */
    public function checkGame(): Game
    {
        $gameStatus = Game::GAME_RUNNING_STATUS;

        if ($this->playerWon($this->playerOne)) {
            $gameStatus = Game::GAME_OVER_STATUS;
            $this->playerOne->setWinner(true);
        }

        if ($this->playerWon($this->playerTwo)) {
            $gameStatus = Game::GAME_OVER_STATUS;
            $this->playerTwo->setWinner(true);
        }

        if ($this->hasPlays() === false) {
            $gameStatus = Game::GAME_OVER_STATUS;
        }

        return new Game(
            $this->playerOne,
            $this->playerTwo,
            $gameStatus
        );
    }

    /**
     * check if has plays
     * @return bool
     */
    private function hasPlays(): bool
    {
        $totalPlaysPlayerOne = count($this->playerOne->getAllPlays());
        $totalPlaysPlayerTwo = count($this->playerTwo->getAllPlays());
        $totalPlays = $totalPlaysPlayerOne + $totalPlaysPlayerTwo;

        return $totalPlays < 9;
    }

    /**
     * check if the player won
     * @param PlayerInterface $player the player to check
     * @return bool
     */
    private function playerWon(PlayerInterface $player): bool
    {
        $line = [
            1 => 0,
            2 => 0,
            3 => 0
        ];

        $column = [
            1 => 0,
            2 => 0,
            3 => 0
        ];

        $firstDiagonal = 0;
        $secondDiagonal = 0;

        $playerPlays =  $player->getAllPlays();

        foreach ($playerPlays as $play) {
            $linePosition = $play['line'];
            $columnPosition = $play['column'];

            $line[$linePosition]++;
            $column[$columnPosition]++;

            $firstDiagonal += $linePosition === $columnPosition? 1: 0;

            if ($linePosition === 3 && $columnPosition === 1
                || $linePosition === 1 && $columnPosition === 3
                || $linePosition === 2 && $columnPosition === 2) {
                $secondDiagonal++;
            }

            if ($line[$linePosition] === 3) {
                return true;
            }

            if ($column[$columnPosition] === 3) {
                return true;
            }

            if ($firstDiagonal === 3) {
                return true;
            }

            if ($secondDiagonal === 3) {
                return true;
            }
        }

        return false;
    }
}
