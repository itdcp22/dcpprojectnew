<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;


use App\User;

use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $arr['users'] = User::all();
        return view('users')->with($arr);
    }

    public function edit(User $usernew)
    {



        $arr['usernew'] = $usernew;
        return view('users.edit')->with($arr);
    }


    public function update(Request $request, User $usernew)
    {
        $usernew->name = $request->bm_name;


        $usernew->save();
        return redirect()->route('mall.brand.index')->with('info', 'Transaction updated successfully!');
    }



    public function index1(Request $request)
    {


        $arr['users'] = User::where('user_type', 'tenant')->whereNotNull('email_verified_at')
            ->get();
        return view('tenantusers')->with($arr);
    }

    public function userOnlineStatus()
    {
        $users = User::all();

        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
            else
                echo $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        }
    }
}
