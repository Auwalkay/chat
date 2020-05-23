<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Events\MessageSent;
use App\Events\PrivateMessageSent;

use Auth;
use App\User;
class MessageController extends Controller
{
    

    public function fetchMessages()
    {
        return Message::with('user')
            ->where('reciever_id','=',null)
            ->get();
    }

    public function sendMessage(Request $request)
    {
        $message = auth()->user()->messages()->create(['message'=>$request->message]);

        broadcast(new MessageSent(auth()->user(),$message->load('user')))->toOthers();

        return response(['message'=>$message]);
    }

    public function privateMessages( User $user)
    {
        $message= Message::with('user')
        ->where(['user_id'=>auth()->id(),'reciever_id'=>$user->id])
        ->orWhere(function($query) use($user){
            $query->where(['user_id' => $user->id, 'reciever_id' => auth()->id()]);
        })
        ->get();

        return $message;
    }

    public function sendPrivateMessage(Request $request,User $user)
    {
        $input= $request->all();
        $input['reciever_id']=$user->id;
        $message = auth()->user()->messages()->create($input);

        broadcast(new PrivateMessageSent($message->load('user')))->toOthers();

        return response(['message'=>$message]);
    }
}
