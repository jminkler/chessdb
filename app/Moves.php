<?php

namespace App;

use Vinelab\NeoEloquent\Eloquent\Model as NeoEloquent;
use Illuminate\Database\Eloquent\Model;

class Moves extends NeoEloquent
{
    protected $connection = 'neo4j';

    protected $label = 'Moves'; // or array('User', 'Fan')

    protected $fillable = [
        'move'
    ];

    public function moves()
    {
        return $this->hasMany('Moves', 'PLY');
    }

}
