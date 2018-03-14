<?php
declare(strict_types=1);

namespace AndreLuizMachado\TicTacToe\EngineTests;

use AndreLuizMachado\TicTacToe\Engine\Bot;
use PHPUnit\Framework\TestCase;

final class BotTest extends TestCase
{
    /**
     * @test
     */
    public function withNoPlayShouldReturnAllPlays(): void
    {   
        $bot = new Bot();
        $nextPlays = $bot->getNextPlays([]);

        $expected = [
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

        $this->assertEquals(
            $expected,
            $nextPlays
        );
    }

    /**
     * @test
     */
    public function withANumberOfPlaysShouldReturnTheNextPlays(): void
    {   
        $bot = new Bot();

        $expected = [
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
        ];

        $nextPlays = $bot->getNextPlays(
            [
                [
                    'column' => 3,
                    'line' => 3,
                ],
            ]            
        );

        $this->assertEquals(
            $expected,
            $nextPlays
        );
    }

    /**
     * @test
     */
    public function withTwoPlaysShouldReturnTheNextPlays(): void
    {   
        $bot = new Bot();

        $expected = [
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
                'column' => 3,
                'line' => 1,
            ],
            [
                'column' => 3,
                'line' => 2,
            ],
        ];

        $nextPlays = $bot->getNextPlays(
            [
                [
                    'column' => 2,
                    'line' => 3,
                ],
                [
                    'column' => 3,
                    'line' => 3,
                ],
            ]            
        );

        $this->assertEquals(
            $expected,
            $nextPlays
        );
    }
}
