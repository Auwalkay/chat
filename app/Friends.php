<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
	protected $guarded=[];

    public function meetup()
    {
    	return $this->belongsTo('App\MeetUp','meet_up_id');
    }
    public function friends()
    {
    	return $this->belongsTo('App\MeetUp','friend');
    }
}
