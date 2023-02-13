<?php
namespace App\Traits;
trait apiResponseTrait {
    public function apiResponse($status,$data,$error){
        return response([
            'status' => $status,
            'data' => $data,
            'error' => $error,
        ],$status);
    }
}
