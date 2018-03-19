<?php
declare(strict_types=1);

namespace AndreLuizMachado\TicTacToe\Engine;

use AndreLuizMachado\TicTacToe\Engine\AllPlaysTrait;
use AndreLuizMachado\TicTacToe\Engine\MoveInterface;
use AndreLuizMachado\TicTacToe\Engine\SimpleBotMove;

class Bot implements PlayerInterface
{
    use AllPlaysTrait;

    private $possiblePlays = [
        [
            'column' => 1,
            'line' => 1,
        ],
        [
            'column' => 1,
            'line' => 2,
        ],
        [
            'column' => 1,
            'line' => 3,
        ],
        [
            'column' => 2,
            'line' => 1,
        ],
        [
            'column' => 2,
            'line' => 2,
        ],
        [
            'column' => 2,
            'line' => 3,
        ],
        [
            'column' => 3,
            'line' => 1,
        ],
        [
            'column' => 3,
            'line' => 2,
        ],
        [
            'column' => 3,
            'line' => 3,
        ],
    ];

    private $previousPlays;
    private $botMove;

    /**
     * @param array $previousPlays the made plays aready done
     */
    public function __construct(
        array $previousPlays,
        MoveInterface $botMove = null
    ) {
        $this->botMove = $botMove;
        $this->previousPlays = $previousPlays;
    }

    /**
     * return the next play of the game
     * @return array the next play
     */
    public function getNextPlay():? array
    {
        $board = [
            ['', '', ''],
            ['', '', ''],
            ['', '', ''],
        ];

        if (is_null($this->getPreviousPlays())) {
            return null;
        }

        foreach ($this->getPreviousPlays() as $play) {
            $lineBoard = $play['line'] - 1;
            $columnBoard = $play['column'] - 1;

            $board[$lineBoard][$columnBoard] = 'x';
        }

        $move = $this->getBotMove()->makeMove(
            $board
        );

        if (empty($move)) {
            return null;
        }

        return [
            'line' => ($move[1] + 1),
            'column' => ($move[0] + 1),
        ];
    }

    /**
     * return the previous plays of the game
     * @return array a list with the possible next plays
     */
    public function getPreviousPlays():? array
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

    /**
     * check if tha play was made
     * @param array $playToCompare the play to compare
     * @return boolean
     */
    private function playWasMade(array $playToCompare): bool
    {
        foreach ($this->previousPlays as $previousPlay) {
            if ($previousPlay['column'] === $playToCompare['column']
                && $previousPlay['line'] === $playToCompare['line']) {
                return true;
            }
        }

        return false;
    }

    private function getBotMove(): MoveInterface
    {
        if (is_null($this->botMove)) {
            $this->botMove = new SimpleBotMove();
        }
        return $this->botMove;
    }
}
