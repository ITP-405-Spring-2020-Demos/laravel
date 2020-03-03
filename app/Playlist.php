<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $primaryKey = 'PlaylistId';
    public $timestamps = false;

    public function tracks()
    {
        // 3rd arg is the FK name of the model on which you are defining the relationship
        // 4th arg is the FK name of the model that you are joining to
        return $this->belongsToMany('App\Track', 'playlist_track', 'PlaylistId', 'TrackId');
    }
}
