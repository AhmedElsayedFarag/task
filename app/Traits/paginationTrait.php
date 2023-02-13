<?php
namespace App\Traits;
trait paginationTrait {
    public function paginateData($ads){
        return [
            'items'=>$ads,
            'total_items_count'=>$ads->total(),
            'total_pages_count'=>$ads->lastPage(),
            'current_page'=>$ads->currentPage(),
        ];
    }
}
