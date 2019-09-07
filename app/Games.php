<?php

namespace App;

use App\Moves;
use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;
use Illuminate\Database\Eloquent\Model;

class Games extends NeoEloquent
{
    protected $connection = 'neo4j';

    protected $label = 'Games'; // or array('User', 'Fan')

    protected $fillable = [
        'pgn', 'moves', 'white', 'black', 'event',
        'whiteElo', 'blackElo', 'eco', 'round', 'pgnHash'
    ];

    public function moves()
    {
        return $this->hasMany('App\Moves', 'PLY');
    }

}
