<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $primaryKey = 'TrackId';
    public $timestamps = false;

    public function playlists()
    {
        // The 3rd argument is the FK name of the model on which you are defining the relationship
        // The 4th argument is the FK name of the model that you are joining to
        return $this->belongsToMany('App\Playlist', 'playlist_track', 'TrackId', 'PlaylistId');
    }

    public function genre()
    {
        return $this->belongsTo('App\Genre', 'GenreId');
    }

    public function album()
    {
        return $this->belongsTo('App\Album', 'AlbumId');
    }
}
