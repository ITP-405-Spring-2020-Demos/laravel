<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $primaryKey = 'PlaylistId';
    public $timestamps = false;

    public function tracks()
    {
        // The 3rd argument is the FK name of the model on which you are defining the relationship
        // The 4th argument is the FK name of the model that you are joining to
        return $this->belongsToMany('App\Track', 'playlist_track', 'PlaylistId', 'TrackId');
    }
}
