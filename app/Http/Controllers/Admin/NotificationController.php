<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\firebaseNotificationTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NotificationController extends Controller
{
    use firebaseNotificationTrait;

    public function index()
    {
        return view('admin.notifications.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        foreach ($request->users as $user) {
            if ($user == 'all') {
                $all_users = User::pluck('device_token')->toArray();
                foreach (array_chunk($all_users, 500) as $usr) {
                    //send push firebase notification
                   $this->sendAdminNotification($usr, $request->title, $request->body);
                }
            } elseif ($user == 'all_app_users') {
                $all_app_users = User::whereDoesntHave('roles')->pluck('device_token')->toArray();
                foreach (array_chunk($all_app_users, 500) as $provider) {
                   $this->sendAdminNotification($provider, $request->title, $request->body);
                }
            } elseif ($user == 'all_admins') {
                $all_providers = User::whereHas('roles', function ($q){
                    $q->where('name','admin');
                })->pluck('device_token')->toArray();
                foreach (array_chunk($all_providers, 500) as $usr) {
                    $this->sendAdminNotification($usr, $request->title, $request->body);
                }
            } else {
                $this->sendAdminNotification([User::find($user)->device_token], $request->title, $request->body);
            }
        }
        Session::flash('message', 'Your work has been saved');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
