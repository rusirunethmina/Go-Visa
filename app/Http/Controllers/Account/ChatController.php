<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\AuthTrait;
use App\Services\Shared\File\FileServiceInterface;
use App\Services\Shared\Chat\ChatService;
use Auth;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    use AuthTrait;

    private $fileService;
    private $chatService;

    public function __construct(FileServiceInterface  $fileService, ChatService $chatService)
    {
        $this->fileService = $fileService;
        $this->chatService = $chatService;
    }

    public function index()
    {
        $current_user = $this->getCurrentUser();
        $chat_users = $this->chatService->getChatUsers($current_user->id);
        return view('frontend.account.chat.index', compact('current_user', 'chat_users'));
    }

    public function sendMessage(Request $request)
    {
        $sender_id = Auth::user()->id;
        $receiver_id = $request->receiver_id;
        $message = $request->message;
        $sendMessage = $this->chatService->sendMessage($sender_id,$receiver_id,$message);

        if ($request->ajax()) {
            return 'success';
        }
         return redirect('account/load-chat/'.$receiver_id);
    }

    public function loadChat(Request $request, $id)
    {
        $current_user = $this->getCurrentUser();
        $chat_user_data = User::where('id', $id)->first();
        $sender_id =$current_user->id;
        $chat_users = $this->chatService->getChatUsers($current_user->id);
        $messages =$this->chatService->loadChat($sender_id,$id);
        return view('frontend.account.chat.index', compact('current_user', 'chat_users', 'messages', 'chat_user_data'));
    }

    public function loadChatAjx(Request $request, $id)
    {
        $current_user = $this->getCurrentUser();
        $chat_user_data = User::where('id', $id)->first();
        $sender_id =$current_user->id;
        $chat_users = $this->chatService->getChatUsers($current_user->id);
        $messages =$this->chatService->loadChat($sender_id,$id);
        $message_count = $this->chatService->MessageCount($sender_id,$id);
        if ($message_count>0) {
            $this->chatService->updateChat($sender_id,$id);
            $html = view('frontend.account.chat.chat', compact('current_user', 'chat_users', 'messages', 'chat_user_data'))->render();
            return response()->json(['html' => $html]);
        } else {
            return 'no message';
        }
    }
}
