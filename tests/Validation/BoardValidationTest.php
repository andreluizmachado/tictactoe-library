<?php

declare(strict_types=1);

namespace AndreLuizMachado\TicTacToe\EngineTests;

use AndreLuizMachado\TicTacToe\Engine\Board;
use AndreLuizMachado\TicTacToe\Engine\Bot;
use AndreLuizMachado\TicTacToe\Engine\Player;
use AndreLuizMachado\TicTacToe\Engine\Validation\BoardValidation;
use PHPUnit\Framework\TestCase;

final class BoardValidationTest extends TestCase
{
    /**
     * @test
     * @expectedException \AndreLuizMachado\TicTacToe\Engine\Validation\PlayRepeatedlyException
     */
    public function playsRepeatedlySamePlayerShouldThrowException(): void
    {
   		$player2 = new Player(
            [
                [
                    'column' => 2,
                    'line' => 2,
                ],
                [
                    'column' => 2,
                    'line' => 2,
                ],
            ]
        );

        $player1 = new Player([]);

        $board = new BoardValidation();
        $game = $board->validate($player1, $player2);
    }
    /**
     * @test
     * @expectedException \AndreLuizMachado\TicTacToe\Engine\Validation\PlayRepeatedlyException
     */
    public function playsRepeatedlyDifferentPlayerShouldThrowException(): void
    {
   		$player2 = new Player(
            [
                [
                    'column' => 2,
                    'line' => 2,
                ],
            ]
        );

        $player1 = new Player(
        	[
        		[
                    'column' => 2,
                    'line' => 2,
                ],
        	]
        );

        $board = new BoardValidation();
        $game = $board->validate($player1, $player2);
    }

    /**
     * @test
     */
    public function playsOkPlayerShouldNotThrowException(): void
    {
   		$player2 = new Player(
            [
                [
                    'column' => 2,
                    'line' => 2,
                ],
            ]
        );

        $player1 = new Player(
        	[
        		[
                    'column' => 1,
                    'line' => 2,
                ],
        	]
        );

        $board = new BoardValidation();
        $validation = $board->validate($player1, $player2);
        $this->assertTrue($validation);
    }

    /**
     * @test
     * @group xxx
     * @expectedException \AndreLuizMachado\TicTacToe\Engine\Validation\InvalidPositionException
     */
    public function invalidLinePositionThowException(): void
    {
   		$player2 = new Player(
            [
                [
                    'column' => 1,
                    'line' => 4,
                ]
            ]
        );

        $player1 = new Player(
        	[]
        );

        $board = new BoardValidation();
        $validation = $board->validate($player1, $player2);
    }

    /**
     * @test
     * @expectedException \AndreLuizMachado\TicTacToe\Engine\Validation\InvalidPositionException
     */
    public function invalidColumnPositionThowException(): void
    {
   		$player2 = new Player(
            [
                [
                    'column' => 0,
                    'line' => 1,
                ]
            ]
        );

        $player1 = new Player(
        	[]
        );

        $board = new BoardValidation();
        $validation = $board->validate($player1, $player2);
    }
}
