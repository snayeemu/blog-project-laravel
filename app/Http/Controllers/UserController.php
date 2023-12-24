<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::all();
        // foreach ($users as $user) {
        //     $user->posts = Post::where('user_id', $user->id)->get();

        // }
        // dd($users[0]->posts);
        return view('users.index', compact('users'));
    }
}
