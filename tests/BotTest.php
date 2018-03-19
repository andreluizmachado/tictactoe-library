<?php
declare(strict_types=1);

namespace AndreLuizMachado\TicTacToe\EngineTests;

use AndreLuizMachado\TicTacToe\Engine\Bot;
use AndreLuizMachado\TicTacToe\Engine\SimpleBotMove;
use PHPUnit\Framework\TestCase;

final class BotTest extends TestCase
{
    /**
     * @test
     * @group getNextPlay
     */
    public function withNoPlayShouldReturnTheNextPlay(): void
    {
        $bot = new Bot([]);
        $nextPlays = $bot->getNextPlay();

        $expected = [
            'column' => 1,
            'line' => 1,
        ];

        $this->assertEquals(
            $expected,
            $nextPlays
        );
    }

    /**
     * @test
     * @group getNextPlay
     */
    public function withOnePlayShouldReturnTheNextPlay(): void
    {
        $bot = new Bot(
            [
                [
                    'column' => 3,
                    'line' => 3,
                ],
            ]
        );

        $expected = [
            'column' => 1,
            'line' => 1,
        ];

        $nextPlays = $bot->getNextPlay();

        $this->assertEquals(
            $expected,
            $nextPlays
        );
    }

    /**
     * @test
     * @group getNextPlayxxx
     */
    public function withTwoPlaysShouldReturnTheNextPlay(): void
    {
        $bot = new Bot(
            [
                [
                    'column' => 1,
                    'line' => 1,
                ],
                [
                    'column' => 3,
                    'line' => 3,
                ],
            ]
        );

        $expected = [
            'line' => 1,
            'column' => 2,
        ];

        $nextPlays = $bot->getNextPlay();

        $this->assertEquals(
            $expected,
            $nextPlays
        );
    }

    /**
     * @test
     * @group getNextPlay
     */
    public function withoutPlaysShouldReturnNull(): void
    {
        $bot = new Bot(
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
            ]
        );

        $expected = [
            'column' => 1,
            'line' => 2,
        ];

        $nextPlays = $bot->getNextPlay();

        $this->assertNull(
            $nextPlays
        );
    }
}
