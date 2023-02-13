<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadImageRequest;
use App\Http\Resources\AdResource;
use App\Http\Resources\ReportReasonResource;
use App\Http\Resources\SellingAdResource;
use App\Http\Resources\UserResource;
use App\Models\Ad;
use App\Models\AdFavourite;
use App\Models\AdImage;
use App\Models\AdOption;
use App\Models\AdReport;
use App\Models\Category;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\ReportReason;
use App\Models\User;
use App\Notifications\DefaultUserNotification;
use App\Traits\apiResponseTrait;
use App\Traits\firebaseNotificationTrait;
use App\Traits\paginationTrait;
use App\Traits\saveImageTrait;
use App\Traits\viewAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{
    use apiResponseTrait,saveImageTrait,paginationTrait,viewAd,firebaseNotificationTrait;
    public function createNewAd(Request $request){
        $request->request->add(['user_id' => auth()->id()]); //add user_id
        $ad = Ad::create($request->except('option_ids','option_values','image'));
        //add options
        $option_ids = (isset($request->option_ids) && count($request->option_ids))?$request->option_ids:[];
        $option_values = (isset($request->option_values) && count($request->option_values))?$request->option_values:[];
        if (count($option_ids) == count($option_values)){
            foreach ($option_ids as $key => $option_id){
                $ad_option = new AdOption();
                $ad_option->option_id = $option_id;
                $ad_option->ad_id = $ad->id;
                $ad_option->option_value = $option_values[$key];
                $ad_option->save();
            }//end foreach
        }
        $ad = Ad::find($ad->id);
        activity()
            ->causedBy(auth()->user())
            ->performedOn($ad)
            ->log('Create new Ad called '.$ad->title);
        return $this->apiResponse(config('globals.success_code'),new AdResource($ad),[]);

    }

    public function autoComplete(Request $request){
        $text = $request->text;
        $filters = [];
        $categories = Category::whereTranslationLike('name', "%$text%")->get();
        $ads = Ad::where('status',1)->where('sold',0)->where('title','like',"%$text%")->orderBy('id','desc')->get();
        foreach ($ads as $ad){
            $filters[] = [
                'text'=>$ad->title.' '.trans('messages.in').' '.Category::find($ad->category_id)->name,
                'ad_id'=>$ad->id,
                'sub_category_id'=>$ad->category_id,
                'category_id'=>0,
            ];
        }
        foreach ($categories as $cat){
            $filters[] = [
                'text'=>$cat->name,
                'ad_id'=>0,
                'sub_category_id'=>($cat->parent_id == 0)?0:$cat->id,
                'category_id'=>($cat->parent_id == 0)?$cat->id:0,
            ];
        }
        return $this->apiResponse(config('globals.success_code'),$filters,[]);
    }

    public function uploadAdImage(UploadImageRequest $request){
        $ad = Ad::findOrFail($request->ad_id);
        $ad_image = new AdImage();
        $ad_image->ad_id = $ad->id;
        $ad_image->is_cover = $request->is_cover;
        $ad_image->image = $this->saveImage($request->file('image'),'ads');
        $ad_image->save();
        if ($request->is_cover == true){
            $ad->image =  $ad_image->image;
            $ad->save();
        }
        return $this->apiResponse(config('globals.success_code'),trans('messages.saved_successfully'),[]);
    }
    public function changeAdCover($ad_id,Request $request){
        $ad = Ad::findOrFail($ad_id);
        //change old cover to 0
        $old_covers = AdImage::where([
            ['ad_id',$ad_id],['is_cover',1]
        ])->get();
        foreach ($old_covers as $old_cover){
            $old_cover->is_cover = 0;
            $old_cover->save();
        }//end foreach
        //find new cover
        $new_cover = AdImage::find($request->new_cover_id);
        $new_cover->is_cover = 1;
        $new_cover->save();
        return $this->apiResponse(config('globals.success_code'),trans('messages.saved_successfully'),[]);
    }
    public function adDetails($id){
        $ad = Ad::findOrFail($id);
        $this->viewAd($id);
        return $this->apiResponse(config('globals.success_code'),new AdResource($ad),[]);
    }
    public function relatedAds($id,Request $request){
        $ad = Ad::findOrFail($id);
        $ad_category = $ad->category_id;
        $ads = Ad::where('status',1)
            ->where('sold',0)
            ->where('id','!=',$id)
            ->where('category_id',$ad_category)
            ->orderBy('id','desc')->take(10)->get();
        return $this->apiResponse(config('globals.success_code'),AdResource::collection($ads),[]);
    }
    public function makeOffer($id,Request $request){
        $ad = Ad::findOrFail($id);
        //find if there is an existing chat before
        $offer= Chat::where([
            ['ad_id',$id],['owner_id',$ad->user_id],['sender_id',auth()->id()]
        ])->first();
        if ($offer){
            if ($request->has('offer') && $request->offer != null){
                //send offer
                $message = new ChatMessage();
                $message->chat_id = $offer->id;
                $message->sender_id = auth()->id();
                $message->message = trans('messages.i_would_like_to_buy_your').' '.$ad->title.' '.trans('messages.for').' '.$request->offer;
                $message->save();
                $offer->last_message_at = now();
                $offer->save();
                $message = ChatMessage::find($message->id);
                $firebase_key = "chat/$offer->ad_id-user$offer->owner_id-user$offer->sender_id/message-$message->id";
                app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage($firebase_key,$message->toArray());
                app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage("users/$ad->user_id",UserResource::make(User::find($ad->user_id))->resolve());
                //send notification to other user
                $user = User::find($ad->user_id);
                $notification_data = [
                    'user_id' => auth()->id(),
                    'type' => 'offer',
                    'chat_id' => $message->chat_id,
                    'url' => url('user-profile/' . auth()->id()),
                ];
                $user->notify(new DefaultUserNotification($notification_data));
                //send push firebase notification
                $this->sendNotification([$user->device_token], 'offer', $notification_data);
            }
            return $this->apiResponse(config('globals.success_code'),$offer->id,[]);
        }else{
            //create new chat (offer)
            $offer = new Chat();
            $offer->ad_id = $id;
            $offer->owner_id = $ad->user_id;
            $offer->sender_id = auth()->id();
            $offer->save();
            if ($request->has('offer') && $request->offer != null){
                //send offer
                $message = new ChatMessage();
                $message->chat_id = $offer->id;
                $message->sender_id = auth()->id();
                $message->message = trans('messages.i_would_like_to_buy_your').' '.$ad->title.' '.trans('messages.for').' '.$request->offer;
                $message->save();
                $offer->last_message_at = now();
                $offer->save();
                $message = ChatMessage::find($message->id);
                $firebase_key = "chat/$offer->ad_id-user$offer->owner_id-user$offer->sender_id/message-$message->id";
                app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage($firebase_key,$message->toArray());
                app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage("users/$ad->user_id",UserResource::make(User::find($ad->user_id))->resolve());
                //send notification to other user
                $user = User::find($ad->user_id);
                $notification_data = [
                    'user_id' => auth()->id(),
                    'type' => 'offer',
                    'chat_id' => $message->chat_id,
                    'url' => url('user-profile/' . auth()->id()),
                ];
                $user->notify(new DefaultUserNotification($notification_data));
                //send push firebase notification
                $this->sendNotification([$user->device_token], 'offer', $notification_data);
                activity()
                    ->causedBy(auth()->user())
                    ->performedOn($ad)
                    ->log('Made an offer on AD '.$ad->title);
            }
            return $this->apiResponse(config('globals.success_code'),$offer->id,[]);
        }
    }
    public function sendMessage($chat_id,Request $request){
        $chat = Chat::findOrFail($chat_id);
        $ad = Ad::find($chat->ad_id);
        $message = new ChatMessage();
        $message->chat_id = $chat_id;
        $message->sender_id = auth()->id();
        $message->message = $request->message;
        $message->save();
        $chat->last_message_at = now();
        $chat->save();
        $message = ChatMessage::find($message->id);
        $firebase_key = "chat/$chat->ad_id-user$chat->owner_id-user$chat->sender_id/message-$message->id";
        app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage($firebase_key,$message->toArray());
        $user_id = ($chat->owner_id == auth()->id())?$chat->sender_id:$chat->owner_id;
        app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage("users/".$user_id,UserResource::make(User::find($user_id))->resolve());
        //send notification to other user
        $notified_user_id = ($chat->owner_id == auth()->id())?$chat->sender_id:$chat->owner_id;
        $user = User::find($notified_user_id);
        $notification_data = [
            'user_id' => auth()->id(),
            'type' => 'message',
            'chat_id' => $message->chat_id,
            'url' => url('user-profile/' . auth()->id()),
        ];
        $user->notify(new DefaultUserNotification($notification_data));
        //send push firebase notification
        $this->sendNotification([$user->device_token], 'message', $notification_data);

        //make all previous messages
        $unread_messages = ChatMessage::where([
            ['chat_id',$chat_id],['sender_id','!=',auth()->id()],['read_at',null]
        ])->get();
        foreach ($unread_messages as $unread_message){
            $unread_message->read_at = date('Y-m-d H:i:s');
            $unread_message->save();
            $firebase_key = "chat/$chat->ad_id-user$chat->owner_id-user$chat->sender_id/message-$unread_message->id";
            app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage($firebase_key,$unread_message->toArray());
            app('App\Http\Controllers\FirebaseController')->sendFirebaseMessage("users/".auth('api')->id(),UserResource::make(User::find(auth('api')->id()))->resolve());
        }
        return $this->apiResponse(config('globals.success_code'),$message,[]);
    }
    public function archiveAd($id){
        $ad = Ad::findOrFail($id);
        $ad->status = 3;
        $ad->save();
        return $this->apiResponse(config('globals.success_code'),trans('messages.saved_successfully'),[]);
    }
    public function unarchiveAd($id){
        $ad = Ad::findOrFail($id);
        $ad->status = 1;
        $ad->save();
        return $this->apiResponse(config('globals.success_code'),trans('messages.saved_successfully'),[]);
    }
    public function addToFavourites($id,Request $request){
        $ad = Ad::findOrFail($id);
        $fav = AdFavourite::where([
            ['user_id',auth()->id()],['ad_id',$id]
        ])->first();
        if ($fav){
            //remove
            $fav->delete();
            return $this->apiResponse(config('globals.success_code'),trans('messages.removed_successfully'),[]);
        }else{
            //add
            $fav = new AdFavourite();
            $fav->user_id = auth()->id();
            $fav->ad_id = $id;
            $fav->save();
            return $this->apiResponse(config('globals.success_code'),trans('messages.saved_successfully'),[]);
        }
    }//end addToFavourites

    public function deleteAd($id){
        $ad = Ad::findOrFail($id);
        $user = auth()->user();
        if ($user->id == $ad->user_id){
            $ad->status = 4;//make status = deleted
            $ad->save();
            //delete all chats belongs to this ad
            Chat::where('ad_id',$id)->delete();
            $ad->delete();//soft delete
            return $this->apiResponse(config('globals.success_code'),trans('messages.saved_successfully'),[]);
        }else{
            return $this->apiResponse(config('globals.error_code'),[],[trans('messages.you_are_not_the_owner')]);
        }
    }
    public function deleteAdImage($id){
        $image = AdImage::findOrFail($id)->delete();
        return $this->apiResponse(config('globals.success_code'),trans('messages.removed_successfully'),[]);
    }

    public function editAd($id,Request $request){
        $ad = Ad::findOrFail($id);
        $user = auth()->user();
        if ($user->id == $ad->user_id){
            $ad = $ad->update($request->except('option_ids','option_values','image'));
            //add options
            $option_ids = (isset($request->option_ids) && count($request->option_ids))?$request->option_ids:[];
            $option_values = (isset($request->option_values) && count($request->option_values))?$request->option_values:[];
            if (count($option_ids) == count($option_values)){
                //remove old options
                $old_options = AdOption::where('ad_id',$id)->delete();
                foreach ($option_ids as $key => $option_id){
                    $ad_option = new AdOption();
                    $ad_option->option_id = $option_id;
                    $ad_option->ad_id = $id;
                    $ad_option->option_value = $option_values[$key];
                    $ad_option->save();
                }//end foreach
            }
            $ad = Ad::find($id);
            return $this->apiResponse(config('globals.success_code'),new AdResource($ad),[]);
        }else{
            return $this->apiResponse(config('globals.error_code'),[],[trans('messages.you_are_not_the_owner')]);
        }
    }

    public function adsFilter(Request $request){

        if ($request->has('distance')&&$request->has('lat')&&$request->has('lng')){
            $lat = $request->lat;
            $lng = $request->lng;
            $distance = $request->distance;

            $ads = DB::table("ads")
                ->select("ads.id", DB::raw("6371 * acos(cos(radians(" . $lat . "))
     * cos(radians(ads.lat))
     * cos(radians(ads.lng) - radians(" . $lng . "))
     + sin(radians(" .$lat. "))
     * sin(radians(ads.lat))) AS distance"))
                ->having('distance', '<', $distance)
                ->pluck('id')->toArray();
            $ads = Ad::where('status',1)->where('sold',0)->whereIn('id',$ads);
        }else{
            $ads = Ad::where('status',1)->where('sold',0);
        }

        if ($request->has('category_id')){
            //get sub categories
            $subs = Category::where('parent_id',$request->category_id)->pluck('id')->toArray();
            $ads = $ads->whereIn('category_id',$subs);
        }
        if ($request->has('sub_category_id')){
            $ads = $ads->where('category_id',$request->sub_category_id);
        }

        if ($request->has('price_from')){
            $ads = $ads->where('price','>=',$request->price_from);
        }

        if ($request->has('price_to')){
            $ads = $ads->where('price','<=',$request->price_to);
        }

        if ($request->has('title')){
            $ads = $ads->where('title','like',"%$request->title%");
        }

        if ($request->has('user_id')){
            $ads = $ads->where('user_id',$request->user_id);
        }


        if ($request->has('sort')){
            if ($request->sort == 'price_low_to_high'){
                $ads = $ads->orderBy('price','ASC');
            }elseif ($request->sort == 'price_high_to_low'){
                $ads = $ads->orderBy('price','DESC');
            }elseif ($request->sort == 'recent'){
                $ads = $ads->orderBy('id','DESC');
            }
        }else{
            $ads = $ads->orderBy('id','DESC');
        }
        if ($request->has('ads_per_page')){
            $ads =  $ads->paginate($request->ads_per_page);
        }else{
            $ads =  $ads->paginate(10);
        }


        return $this->apiResponse(config('globals.success_code'),$this->paginateData(AdResource::collection($ads)),[]);
//        return $this->apiResponse(config('globals.success_code'),[
//            'ads'=>AdResource::collection($ads),
//            'total_ads_count'=>$ads->total(),
//            'total_pages_number'=>$ads->lastPage(),
//            'current_page'=>$ads->currentPage(),
//        ],[]);
    }//end adsFilter

    public function reportReasons(){
        $reasons = ReportReason::all();
        return $this->apiResponse(config('globals.success_code'),ReportReasonResource::collection($reasons),[]);

    }
    public function reportAd(Request $request){
        $report = new AdReport();
        $report->ad_id = $request->ad_id;
        $report->report_reason_id = $request->report_reason_id;
        $report->notes = $request->notes;
        $report->user_id = auth()->id();
        $report->save();
        return $this->apiResponse(config('globals.success_code'),trans('messages.saved_successfully'),[]);
    }//end reportAd

    public function userAds(Request $request){
        $user = auth('api')->user();
        $ads = Ad::where('user_id',$user->id)->where('status',$request->status)->orderBy('id','desc');
        if ($request->has('ads_per_page')){
            $ads =  $ads->paginate($request->ads_per_page);
        }else{
            $ads =  $ads->paginate(10);
        }
        return $this->apiResponse(config('globals.success_code'),$this->paginateData(SellingAdResource::collection($ads)),[]);
    }
    public function userFavouriteAds(Request $request){
        $user = auth('api')->user();
        $ads = $user->favAds()->where('status',1)->orderBy('id','desc')->get();
//        if ($request->has('ads_per_page')){
//            $ads =  $ads->paginate($request->ads_per_page);
//        }else{
//            $ads =  $ads->paginate(10);
//        }
        return $this->apiResponse(config('globals.success_code'),SellingAdResource::collection($ads),[]);
//        return $this->apiResponse(config('globals.success_code'),$this->paginateData(SellingAdResource::collection($ads)),[]);
    }
    public function markAdAsSold($id,Request $request){
        $ad = Ad::findOrFail($id);
        $user = auth()->user();
        if ($user->id == $ad->user_id){
            $ad->sold = 1;
            if ($request->has('buyer_id')){
                $ad->buyer_id = $request->buyer_id;
            }
            $ad->save();
            return $this->apiResponse(config('globals.success_code'),trans('messages.saved_successfully'),[]);
        }else{
            return $this->apiResponse(config('globals.error_code'),[],[trans('messages.you_are_not_the_owner')]);

        }
    }//end markAdAsSold
}
