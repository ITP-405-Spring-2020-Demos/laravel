<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $primaryKey = 'ArtistId';
    public $timestamps = false;

    public function albums()
    {
        // ArtistId is the foregin key column
        return $this->hasMany('App\Album', 'ArtistId');
    }
}
