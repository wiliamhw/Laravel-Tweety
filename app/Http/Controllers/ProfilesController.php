<?php

namespace App\Http\Controllers;

use App\Services\DeleteFileService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->timeline(True),
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user, DeleteFileService $deleteFileService)
    {
        $attributes = request()->validate([
            'username' => [
                'string',
                'required',
                'max:255',
                'alpha_dash',
                Rule::unique('users')->ignore($user),
            ],
            'name' => ['string', 'required', 'max:255'],
            'avatar' => ['image'],
            'profile_banner' => ['image'],
            'email' => [
                'string',
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user),
            ],
            'password' => [
                'nullable',
                'string',
                'min:8',
                'max:255',
                'confirmed'
            ],
            'profile_text' => 'nullable|string|max:280'
        ]);

        if (request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
            $deleteFileService->deleteLocalFile($user->avatar_path);
        }

        if (request('profile_banner')) {
            $attributes['profile_banner'] = request('profile_banner')->store('profile-banners');
            $deleteFileService->deleteLocalFile($user->profile_banner_path);
        }

        if (request('password')) {
            $attributes['password'] = Hash::make(request('password'));
        } else {
            unset($attributes['password']);
        }
        $user->update($attributes);

        return redirect($user->path())->with('success', 'Profile updated successfully!');
    }
}
