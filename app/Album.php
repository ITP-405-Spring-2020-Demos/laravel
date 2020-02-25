<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $primaryKey = 'AlbumId'; // default is "id"
    public $timestamps = false;

    public function artist()
    {
        // ArtistId is the foreign key column
        return $this->belongsTo('App\Artist', 'ArtistId');
    }
}
