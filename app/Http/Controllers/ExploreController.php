<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ExploreController extends Controller
{
    public function index() {
        $users = User::select('username', 'name', 'avatar');
        $users_arr = [];

        foreach ($users->get() as $user) {
            $temp = [
                'username' => $user->username,
                'name' => $user->name,
                'avatar' => $user->avatar,
                'path' => $user->path()
            ];
            array_push($users_arr, $temp);
        };
        $users = $users->paginate(9);

        return view('explore', [
            'users' => $users,
            'users_arr' => $users_arr
        ]);
    }
}
