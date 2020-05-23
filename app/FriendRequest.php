<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
    
    public function meetup()
    {
    	return $this->belongsTo('App\MeetUp','meet_up_id');
    }

    public function sent()
    {
    	return $this->belongsTo('App\MeetUp','to');
    }
    
}
