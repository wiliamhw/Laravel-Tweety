<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\User;
use File;

class ProfilesController extends Controller
{
    public function show(User $user)
    {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->tweets()->withLikes()->paginate(getPaginate()),
        ]);
    }

    public function edit(User $user)
    {
        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
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
                'string',
                'required',
                'min:8',
                'max:255',
                'confirmed',
            ],
            'profile_text' => ['string']
        ]);

        if (request('avatar')) {
            $attributes['avatar'] = request('avatar')->store('avatars');
            $this->deleteLocalFile($user->avatar_path);
        }

        if (request('profile_banner')) {
            $attributes['profile_banner'] = request('profile_banner')->store('profile-banners');
            $this->deleteLocalFile($user->profile_banner_path);
        }

        $user->update($attributes);

        return redirect($user->path());
    }

    public function deleteLocalFile($path_to_file)
    {
        // Don't delete default image
        if ($path_to_file === 'storage/avatars/default-avatar.jpeg'
            || $path_to_file === 'storage/profile-banners/default-profile-banner.jpg') {
            return;
        }

        if (File::exists(public_path($path_to_file))) {
            File::delete(public_path($path_to_file));
        } else {
            abort(404, 'File does not exists');
        }
    }
}
