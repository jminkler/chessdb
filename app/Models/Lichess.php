<?php

namespace App\Models;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;use Carbon\Carbon;
use GuzzleHttp\CLient;
use AmyBoyd\PgnParser\PgnParser;

class Lichess
{
    protected $base = 'https://lichess.org';

    protected $cleint;

    protected $defaultGameOptions;

    public function __construct()
    {
        $this->client = new Client();
        $this->defaultGameOptions = [
            'max' => 10,
            'since' => Carbon::parse('1 day ago')->format('U'),
        ];
    }

    public function getGamesForUser($user, $options = [])
    {
        $options = array_merge($this->defaultGameOptions, $options);
        $url = $this->base.'/games/export/'.$user.'?'.http_build_query($options);
        $response = $this->client->get($url);

        $filename = $user.'.pgn';
        $pgns = Storage::put($filename, $response->getBody()->getContents());

        $pgns = Storage::putFile(
            'games',
            new File(
                storage_path('app/'.$filename)
            )
        );


        $parsed = new PgnParser(storage_path('app/'.$pgns));

        return $parsed;

    }


}
