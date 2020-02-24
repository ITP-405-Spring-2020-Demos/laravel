<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $primaryKey = 'AlbumId';
    public $timestamps = false;

    public function artist()
    {
        // ArtistId is the foregin key column
        return $this->belongsTo('App\Artist', 'ArtistId');
    }
}
