<?php

namespace Tests\Unit\Models;

use App\Models\Lichess;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LichessTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $lichess = new Lichess();

        $parsed = $lichess->getGamesForUser('jminkler', []);

        $this->assertTrue(is_array($parsed->getGames()));
        $this->assertEquals(10, count($parsed->getGames()));

    }
}
