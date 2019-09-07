<?php

namespace Tests\Unit;

use App\Games;
use App\Moves;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use AmyBoyd\PgnParser\PgnParser;
use Vinelab\NeoEloquent\NewEloquent;

class GamesTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanSaveGame()
    {
        $filename = base_path('tests/fixtures/jminkler.pgn');

        $pgns = new PgnParser($filename);

        foreach ($pgns->getGames() as $pgn)
        {

            $moves = explode(' ', $pgn->getMoves());
            $m = [];

            try {
                $game = new Games([
                    'pgn' => $pgn->getPgn(),
                    'white' => $pgn->getWhite(),
                    'black' => $pgn->getBlack(),
                    'pgnHash' => md5($pgn->getPgn()),

                ]);
                foreach($moves as $move) {
                    $move = new Moves([
                        'move' => $move,
                    ]);
                    $game->moves()->attach($move);
                }

                $game->save();
            } catch (\Exception $e) {
                echo $e->getMessage() . PHP_EOL;
            }

        }


    }
}
