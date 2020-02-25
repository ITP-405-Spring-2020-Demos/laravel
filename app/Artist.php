<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $primaryKey = 'ArtistId'; // default is "id"
    public $timestamps = false;

    public function albums()
    {
        // ArtistId is the foreign key column
        // FK default = artist_id
        return $this->hasMany('App\Album', 'ArtistId');
    }
}
