<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingController extends Controller
{
    public function index(User $user, $following)
    {

    if($following !== "following" && $following !== "follower") {
        return redirect(route("profile", $user->username));
    }
    
        return view('users.following', [
                    'follows' => $following == "following" ? $user->follows : $user->followers,
                    'user' => $user
        ]);
    }

    public function store(Request $request, User $user)
    {
        Auth::user()->hasFollow($user) ? Auth::user()->unFollow($user) : Auth::user()->follow($user);
        return back()->with('success', "you are follow the user");
    }
}