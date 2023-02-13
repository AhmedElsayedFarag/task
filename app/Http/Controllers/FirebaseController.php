<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class FirebaseController extends Controller
{

    public function sendFirebaseMessage($chat_id,$message)
    {
        $factory = (new Factory)
            ->withServiceAccount(__DIR__.'/aiishaii-firebase-adminsdk-xcp23-524acfd9e0.json')
            ->withDatabaseUri('https://aiishaii-default-rtdb.firebaseio.com/');

        $database = $factory->createDatabase();

        $newPost = $database
            ->getReference($chat_id)->getSnapshot()->getValue();
        if ($newPost){
            //update
            $newPost = $database
                ->getReference($chat_id)
                ->update($message);
        }else{
            //create
            $newPost = $database
                ->getReference($chat_id)
                ->set($message);
        }
//        if (auth('api')->check()){
//            $this->sendFirebaseMessage("users/" . auth('api')->id(), UserResource::make(User::find(auth('api')->id()))->resolve());
//        }

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
