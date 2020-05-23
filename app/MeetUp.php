<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class MeetUp extends Model
{
    public function user()
    {
    		return $this->belongsTo('App\User');
    }	
    public function recievedRequest()
    {
    	return $this->hasMany('App\FriendRequest','to');

    }
    public function state()
    {
    	return $this->belongsTo('App\State','state');
    }
    public function sentRequest()
    {
    	return $this->hasMany('App\FriendRequest','meet_up_id');
    }
    public function name()
    {
    	return $this->user->name;
    }

    public function friends()
    {
    	return $this->hasMany('App\Friends','meet_up_id');
    }

    

    
}
