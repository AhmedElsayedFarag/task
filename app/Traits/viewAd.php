<?php
namespace App\Traits;
use App\Models\AdView;

trait viewAd {
    public function viewAd($ad_id){
        $view = new AdView();
        $view->ip = request()->ip();
        $view->ad_id = $ad_id;
        if (auth('api')->check()){
            $view->user_id = auth('api')->id();
        }
        $view->save();
    }
}
