<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ConversationResource;
use App\Http\Resources\UserResource;
use App\Models\Ad;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\User;
use App\Traits\apiResponseTrait;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    use apiResponseTrait;

    public function adConversations($ad_id)
    {
        $ad = Ad::findOrFail($ad_id);
        $conversations = Chat::where('ad_id', $ad->id)->orderBy('last_message_at', 'desc')->get();
        return $this->apiResponse(config('globals.success_code'), ConversationResource::collection($conversations), []);
    }

    public function getAllConversations()
    {
        $user_chats = Chat::where('owner_id', auth('api')->id())
            ->orWhere('sender_id', auth('api')->id())->orderBy('last_message_at', 'DESC')->get();
        return $this->apiResponse(config('globals.success_code'), ConversationResource::collection($user_chats), []);

    }

    public function getChatDetails($id)
    {
        $chat = Chat::find($id);
        return $this->apiResponse(config('globals.success_code'), new ConversationResource($chat), []);

    }

    public function getAllMessages($chat_id)
    {
        $chat = Chat::findOrFail($chat_id);
        $messages = ChatMessage::where('chat_id', $chat_id)->orderBy('id', 'desc')->get();
        //make all previous messages
        $unread_messages = ChatMessage::where([
            ['chat_id', $chat_id], ['sender_id', '!=', auth()->id()], ['read_at', null]
        ])->get();
        foreach ($unread_messages as $unread_message) {
            $unread_message->read_at = date('Y-m-d H:i:s');
            $unread_message->save();
            $firebase_key = "chat/$chat->ad_id-user$chat->owner_id-user$chat->sender_id/message-$unread_message->id";
            app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage($firebase_key, $unread_message->toArray());
            app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage("users/" . auth('api')->id(), UserResource::make(User::find(auth('api')->id()))->resolve());
        }
        //remove chat notifications mark as read
        $notifications = auth()->user()->notifications;
        foreach ($notifications as $notification) {
            if (isset($notification->data['chat_id']) && $notification->data['chat_id'] == $chat_id) {
                $notification->markAsRead();
                app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage("users/" . auth('api')->id(), UserResource::make(User::find(auth('api')->id()))->resolve());
            }
        }

        return $this->apiResponse(config('globals.success_code'), $messages, []);
    }

    public function get_chat_id($ad_id)
    {
        $ad = Ad::findOrFail($ad_id);
        $owner_id = $ad->user_id;
        $sender_id = auth()->id();
        //check if there an existance chat
        $chat = Chat::where([
            ['owner_id', $owner_id], ['sender_id', $sender_id], ['ad_id', $ad_id],
        ])->first();
        if ($chat) {
            return $this->apiResponse(config('globals.success_code'), $chat->id, []);
        } else {
            return $this->apiResponse(config('globals.success_code'), null, []);

        }
    }
}
