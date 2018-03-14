<?php
declare(strict_types=1);

namespace AndreLuizMachado\TicTacToe\Engine;

class Bot
{
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

    /**
     * return the next plays of the game
     * @param array $madePlays the made plays aready done
     * @return array a list with the possible next plays
     */
    public function getNextPlays(array $madePlays): array
    {
    	$nextPlays = array_filter(
        	$this->possiblePlays,
        	function ($possiblePlay) use ($madePlays) {
        		return false === $this->playWasMade($madePlays, $possiblePlay);
        	}
        );

        return array_values($nextPlays);
    }

    /**
     * check if tha play was made
     * @param array $madePlays the made plays aready done
     * @param array $playToCompare the play to compare
     * @return boolean
     */
    private function playWasMade(array $madePlays, array $playToCompare): bool
    {
    	foreach ($madePlays as $madePlay) {
    		if ($madePlay['column'] === $playToCompare['column']
    			&& $madePlay['line'] === $playToCompare['line']) {
    			return true;
    		}
    	}

    	return false;
    }
}
