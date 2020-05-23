<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\FriendRequest;

class FriendsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$meetup= Auth::user()->meetup;
    	return view('friendRequest')->with('meetup',$meetup);
    }

    public function acceptFriend($friendRequest)
    {
    	$friendRequest= FriendRequest::find($friendRequest);

    	$meetup=Auth::user()->meetup;
    	 $meet= $meetup->friends()->create([
    	 	'friend'=>$friendRequest->meet_up_id
    	 ]);
    	 $friendRequest->delete();

    	return view('friendRequest')->with('meetup',$meetup);;
    }

    public function declineFriend($friendRequest)
    {
    	$friendRequest= FriendRequest::find($friendRequest);

    	$meetup=Auth::user()->meetup;
    	 $friendRequest->status= 'declined'; 
    	 $friendRequest->save();

    	return view('friendRequest')->with('meetup',$meetup);;
    }

    public function cancelRequest($friendRequest)
    {
    	$friendRequest= FriendRequest::find($friendRequest);

    	$meetup=Auth::user()->meetup;
    	  
    	 $friendRequest->delete();

    	return view('friendRequest')->with('meetup',$meetup);;
    }
}
