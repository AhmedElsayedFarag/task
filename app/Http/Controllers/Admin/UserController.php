<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.users.index', ['data' => $users]);
    }

    public function bulk(Request $request)
    {
        $users = User::whereIn('id', $request->id)->get();
        switch ($request->type) {
            case 'delete':
                foreach ($users as $user) {
                    $user->device_token = null;//not to send notifications
                    $user->save();
                    $user->ads()->delete();//delete user ads
                    //remove chats belongs to that user
                    Chat::where('owner_id', $user->id)
                        ->orWhere('sender_id', $user->id)->delete();
                    $user?->token()?->revoke();//logout
                    $user->delete();
                }
                break;
            case 'block':
                foreach ($users as $user) {
                    $user->blocked = 1;
                    $user->save();
                }
                break;
            case 'unblock':
                foreach ($users as $user) {
                    $user->blocked = 0;
                    $user->save();
                }
                break;
        }//end switch
        Session::flash('message','Saved Successfully');
        return redirect()->back();
    }

    public function block($id)
    {
        $user = User::findOrFail($id);
        $user->blocked = ($user->blocked == 1) ? 0 : 1;
        $user->save();
        Session::flash('message', 'Saved successfully');
        return redirect()->back();
    }


    public function create()
    {
        return view('admin.users.create');
    }


    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = '123456789';
        unset($data['role']);
        User::create($data)->assignRole($request->validated()['role']);
        Session::flash('message', 'Saved successfully');
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', ['user' => $user]);
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', ['user' => $user]);
    }


    public function update(UserRequest $request, $id)
    {
        $data = $request->validated();
        unset($data['role']);
        $user = User::findOrFail($id);
        $user->fill($data)->save();
        Session::flash('message', 'Updated successfully');
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->forceDelete();
        return redirect()->back();
    }
}
