<?php

namespace AndreLuizMachado\TicTacToe\Engine;

use AndreLuizMachado\TicTacToe\Engine\MoveInterface;

class SimpleBotMove implements MoveInterface
{

    /**
     * Makes a move using the $boardState
     * $boardState contains 2 dimensional array of the game
     * field
     * X represents one team, O - the other team, empty
     * string means field is
     * not yet taken.
     * example
     * [['X', 'O', '']
     * ['X', 'O', 'O']
     * ['', '', '']]
     * Returns an array, containing x and y coordinates for
     * next move, and the unit that now occupies it.
     * Example: [2, 0, 'O'] - upper right corner - O player
     *
     * @param array $boardState Current board state
     * @param string $playerUnit Player unit representation
     *
     * @return array
     */
    public function makeMove(array $boardState, string $playerUnit = 'X'): array
    {
        $allmoves = [];

        foreach ($boardState as $linePosition => $line) {
            foreach ($line as $columnPosition => $column) {
                if (empty($column)) {
                    return [$columnPosition, $linePosition, $playerUnit];
                }
            }
        }
        return [];
    }
}
