<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $primaryKey = 'TrackId'; // default is "id"
    public $timestamps = false;

    public function genre()
    {
        // GenreId is the FK column
        return $this->belongsTo('App\Genre', 'GenreId'); // default is genre_id
    }

    public function album()
    {
        // AlbumId is the FK column
        return $this->belongsTo('App\Album', 'AlbumId'); // default is album_id
    }

    public function playlists()
    {
        // 3rd arg is the FK name of the model on which you are defining the relationship
        // 4th arg is the FK name of the model that you are joining to
        return $this->belongsToMany('App\Playlist', 'playlist_track', 'TrackId', 'PlaylistId');
    }
}
