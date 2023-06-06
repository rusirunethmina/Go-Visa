<?php

namespace App\Services\Shared\Chat;

use App\Models\Chat;
use App\Models\ChatUser;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ChatService
{
    public function sendMessage($sender_id,$receiver_id,$message)
    {
        $send_user_check = ChatUser::where('my_id', $sender_id)->where('user_id', $receiver_id)->first();
        if ($send_user_check) {
            $new_version = $send_user_check->version +1;
            ChatUser::where('my_id', $sender_id)->update(['version'=>$new_version]);
        } else {
            $ChatUser = new ChatUser;
            $ChatUser->my_id=$sender_id;
            $ChatUser->user_id=$receiver_id;
            $ChatUser->version=1;
            $ChatUser->save();
        }
        $recive_user_check = ChatUser::where('my_id', $receiver_id)->where('user_id', $sender_id)->first();
        if ($recive_user_check) {
            $new_version = $recive_user_check->version +1;
            ChatUser::where('my_id', $sender_id)->update(['version'=>$new_version]);
        } else {
            $ChatUser = new ChatUser;
            $ChatUser->my_id=$receiver_id;
            $ChatUser->user_id=$sender_id;
            $ChatUser->version=1;
            $ChatUser->save();
        }

        $chat = new Chat;
        $chat->sender_id=$sender_id;
        $chat->receiver_id=$receiver_id;
        $chat->message=$message;
        $chat->save();
       return true;
    }

    public function getByUserId()
    {
    }

    public function getChatUsers($myId)
    {
        return ChatUser::where('my_id', $myId)->orderBy('id', 'DESC')->get();
    }
    
    public function loadChat($sender_id,$id){
        return Chat::where(function ($query) use ($sender_id, $id) {
            $query->where('sender_id', $sender_id)
                  ->where('receiver_id', $id);
        })
        ->orWhere(function ($query) use ($sender_id, $id) {
            $query->where('sender_id', $id)
                  ->where('receiver_id', $sender_id);
        })
        ->get();
    }

    public function MessageCount($sender_id,$id)
    {
        
        $message_count = Chat::where(function ($query) use ($sender_id, $id) {
            $query->where('sender_id', $sender_id)
                  ->where('receiver_id', $id);
        })
        ->orWhere(function ($query) use ($sender_id, $id) {
            $query->where('sender_id', $id)
                  ->where('receiver_id', $sender_id);
        })
        ->pluck('id')->toArray();
        $message_count = Chat::whereIn('id', $message_count)->where('status', 0)->count();
        return $message_count;
    }

    public function updateChat($sender_id,$id)
    {
        Chat::where(function ($query) use ($sender_id, $id) {
            $query->where('sender_id', $sender_id)
                  ->where('receiver_id', $id);
        })
        ->orWhere(function ($query) use ($sender_id, $id) {
            $query->where('sender_id', $id)
                  ->where('receiver_id', $sender_id);
        })
        ->update(['status'=>1]);
    }

    public function delete()
    {
    }

}
