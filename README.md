# Tic Tac Toe Library

The engine of the tic tac tog game

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

* Docker >= v17.05
* php >= 7.2

### Installing

```
composer require andreluizmachado/tictactoe-library
```

## Usage
To get the next move by bot:
```php
    use AndreLuizMachado\TicTacToe\Engine\Bot;
    ...
    $bot = new Bot(
        [ //previous plays of current game
            [
                'column' => 3,
                'line' => 3,
            ],
        ]
    );

    $nextPlay = $bot->getNextPlay();
    var_dump($nextPlay);
    ....
```

To check the board
```php
    use AndreLuizMachado\TicTacToe\Engine\Board;
    use AndreLuizMachado\TicTacToe\Engine\Player;
    ...
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
        var_dump($game);
    ....
```

## Running the tests

```
./run-install.sh 
./run-testing.sh
```

## Authors

[André Luiz Machado](https://github.com/andreluizmachado)
