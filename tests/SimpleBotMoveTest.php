<?php
declare(strict_types=1);

namespace AndreLuizMachado\TicTacToe\EngineTests;

use AndreLuizMachado\TicTacToe\Engine\SimpleBotMove;
use PHPUnit\Framework\TestCase;

final class SimpleBotMoveTest extends TestCase
{
    /**
     * @test
     * @group makeMove
     */
    public function withMoveShouldReturnTheNextMove(): void
    {
        $botMove = new SimpleBotMove([]);
        $nextMove = $botMove->makeMove(
            [
                ['X', 'O', ''],
                ['X', 'O', 'O'],
                ['', '', ''],
            ],
            'o'
        );

        $expected = [2, 0, 'o'];

        $this->assertEquals(
            $expected,
            $nextMove
        );
    }

    /**
     * @test
     * @group makeMove
     */
    public function withNoMoveShouldReturnEmptyArray(): void
    {
        $botMove = new SimpleBotMove([]);
        $nextMove = $botMove->makeMove(
            [
                ['X', 'O', 'X'],
                ['X', 'O', 'O'],
                ['O', 'O', 'X'],
            ],
            'x'
        );

        $expected = [];

        $this->assertEquals(
            $expected,
            $nextMove
        );
    }
}
