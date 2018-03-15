<?php

declare(strict_types=1);

namespace AndreLuizMachado\TicTacToe\EngineTests;

use AndreLuizMachado\TicTacToe\Engine\Board;
use AndreLuizMachado\TicTacToe\Engine\Bot;
use AndreLuizMachado\TicTacToe\Engine\Player;
use AndreLuizMachado\TicTacToe\Engine\Game;
use PHPUnit\Framework\TestCase;

final class BoardTest extends TestCase
{
    /**
     * @test
     */
    public function boardWithWinnerColumnShouldReturnAGameWithWinnerPlayer(): void
    {
        $player2 = new Player(
            [
                [
                    'column' => 3,
                    'line' => 2,
                ],
                [
                    'column' => 3,
                    'line' => 3,
                ],
            ]
        );

        $player1 = new Player(
            [
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
            ]
        );

        $board = new Board($player1, $player2);
        $game = $board->checkGame();

        $this->assertInstanceOf(Game::class, $game);
        $this->assertEquals(Game::GAME_OVER_STATUS, $game->getStatus());
        $this->assertEquals($player1, $game->getWinnerPlayer());
    }

    /**
     * @test
     */
    public function boardWithWinnerLineShouldReturnAGameWithWinnerPlayer(): void
    {
        $player2 = new Player(
            [
                [
                    'column' => 3,
                    'line' => 2,
                ],
                [
                    'column' => 3,
                    'line' => 3,
                ],
            ]
        );

        $player1 = new Player(
            [
            [
                    'column' => 1,
                    'line' => 1,
                ],
                [
                    'column' => 2,
                    'line' => 1,
                ],
                [
                    'column' => 3,
                    'line' => 1,
                ],
            ]
        );


        $board = new Board($player1, $player2);
        $game = $board->checkGame();

        $this->assertInstanceOf(Game::class, $game);
        $this->assertEquals(Game::GAME_OVER_STATUS, $game->getStatus());
        $this->assertEquals($player1, $game->getWinnerPlayer());
    }

    /**
     * @test
     */
    public function boardWithWinnerFirstDiagonalShouldReturnAGameWithWinnerPlayer(): void
    {
        $player2 = new Player(
            [
                [
                    'column' => 3,
                    'line' => 2,
                ],
                [
                    'column' => 3,
                    'line' => 1,
                ],
            ]
        );

        $player1 = new Player(
            [
            [
                    'column' => 1,
                    'line' => 1,
                ],
                [
                    'column' => 2,
                    'line' => 2,
                ],
                [
                    'column' => 3,
                    'line' => 3,
                ],
            ]
        );


        $board = new Board($player1, $player2);
        $game = $board->checkGame();

        $this->assertInstanceOf(Game::class, $game);
        $this->assertEquals(Game::GAME_OVER_STATUS, $game->getStatus());
        $this->assertEquals($player1, $game->getWinnerPlayer());
    }

    /**
     * @test
     */
    public function boardWithWinnerSecondDiagonalShouldReturnAGameWithWinnerPlayer(): void
    {
        $player2 = new Player(
            [
                [
                    'column' => 3,
                    'line' => 2,
                ],
                [
                    'column' => 3,
                    'line' => 1,
                ],
            ]
        );

        $player1 = new Player(
            [
            [
                    'line' => 1,
                    'column' => 3,
                ],
                [
                    'line' => 2,
                    'column' => 2,
                ],
                [
                    'line' => 3,
                    'column' => 1,
                ],
            ]
        );


        $board = new Board($player1, $player2);
        $game = $board->checkGame();

        $this->assertInstanceOf(Game::class, $game);
        $this->assertEquals(Game::GAME_OVER_STATUS, $game->getStatus());
        $this->assertEquals($player1, $game->getWinnerPlayer());
    }

    /**
     * @test
     */
    public function boardGameRunningShouldReturnAGameWithGameRunningStatus(): void
    {
        $player2 = new Player(
            [
                [
                    'column' => 3,
                    'line' => 2,
                ],
                [
                    'column' => 3,
                    'line' => 3,
                ],
            ]
        );

        $player1 = new Player(
            [
            [
                    'column' => 1,
                    'line' => 1,
                ],
                [
                    'column' => 1,
                    'line' => 2,
                ],
            ]
        );

        $board = new Board($player1, $player2);
        $game = $board->checkGame();

        $this->assertInstanceOf(Game::class, $game);
        $this->assertEquals(Game::GAME_RUNNING_STATUS, $game->getStatus());
        $this->assertNull($game->getWinnerPlayer());
    }

    /**
     * @test
     */
    public function boardDrawGameShouldReturnAGameWithGameOverStatus(): void
    {
        $player2 = new Player(
            [
                [
                    'line' => 1,
                    'column' => 2,
                ],
                [
                    'line' => 2,
                    'column' => 3,
                ],
                [
                    'line' => 2,
                    'column' => 2,
                ],
                [
                    'line' => 3,
                    'column' => 3,
                ],
            ],
            [
                'line' => 3,
                'column' => 1,
            ]
        );

        $player1 = new Player(
            [
            [
                    'line' => 1,
                    'column' => 1,
                ],
                [
                    'line' => 2,
                    'column' => 1,
                ],
                [
                    'line' => 3,
                    'column' => 2,
                ],
                [
                    'line' => 1,
                    'column' => 3,
                ],
            ]
        );

        $board = new Board($player1, $player2);
        $game = $board->checkGame();

        $this->assertInstanceOf(Game::class, $game);
        $this->assertEquals(Game::GAME_OVER_STATUS, $game->getStatus());
        $this->assertNull($game->getWinnerPlayer());
    }
}
