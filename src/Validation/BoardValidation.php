<?php
declare(strict_types=1);

namespace AndreLuizMachado\TicTacToe\Engine\Validation;

use AndreLuizMachado\TicTacToe\Engine\PlayerInterface;
use AndreLuizMachado\TicTacToe\Engine\Validation\PlayRepeatedlyException;

class BoardValidation
{
    public function validate(PlayerInterface $playerOne, PlayerInterface $playerTwo): bool
    {
    	$allPlayers = array_merge($playerOne->getAllPlays(), $playerTwo->getAllPlays());

    	array_map(
    		function ($play) use (&$allPlayers)
    		{

    			$this->validateSamePosition($play['line']);
    			$this->validateSamePosition($play['column']);

    			array_shift($allPlayers);
    			foreach ($allPlayers as $playToCompare) {
		    		if ($playToCompare['line'] == $play['line']
		    			&& $playToCompare['column'] == $play['column']) {
    					throw new PlayRepeatedlyException("Error It's not possible repeat moves");
		    		}
		    	}
    		},
    		$allPlayers
    	);
    	return true;
    }

    private function validateSamePosition($value): void
    {
		if ($value < 1 || $value > 3) {
				throw new InvalidPositionException("Error It's not possible move in this position");
		}
    }
}
