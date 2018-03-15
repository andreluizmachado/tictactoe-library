<?php
declare(strict_types=1);

namespace AndreLuizMachado\TicTacToe\Engine;

use AndreLuizMachado\TicTacToe\Engine\AllPlaysTrait;

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

    /**
     * @param array $previousPlays the made plays aready done
     */
    public function __construct(array $previousPlays)
    {
        $this->previousPlays = $previousPlays;
    }

    /**
     * return the next plays of the game
     * @return array a list with the possible next plays
     */
    public function getNextPlay():? array
    {
        $nextPlays = array_filter(
            $this->possiblePlays,
            function ($possiblePlay) {
                return $this->playWasMade($possiblePlay) === false;
            }
        );

        return array_shift($nextPlays);
    }

    public function getPreviousPlays():? array
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
}
