<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Laravolt\Avatar\Facade as Avatar;

class ProfileController extends Controller
{
    public function editProfile()
    {
        return view('admin.profile-edit');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'                  => 'required|string|max:255',
            'email'                 => ['required', 'email', Rule::unique('users', 'email')->ignore(Auth::id())],
            'image'                 => 'nullable|image|max:5120',
        ]);

        $user = Auth::user();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store('users', 'public');
            if ($user->image && !$this->isAvatarImage($user->image)) {
                Controller::deleteFile($user->image);
            }
            $user->image = $image_path;
        } elseif ((is_null($request->image) && $this->isAvatarImage($user->image ?? '')|| isset($request->remove_img))) {
            $name = $request->name ?? $user->name;
            $avatar = Avatar::create($name)->toBase64();
            $image_content = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $avatar));
            $filename = 'users/' . uniqid() . '.png';
            Storage::disk('public')->put($filename, $image_content);
            $user->image = $filename;
        }

        $user->email = $request->email;
        $user->name = $request->name;
        $user->save();

        return redirect()->route('admins.dashboard')
        ->with('success',__('Profile Updated Successfully'));
    }

    public function editPassword()
    {
        return view('admin.password-edit');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'old_password'              =>'required|string',
            'new_password'              =>['required',Password::min(8)->uncompromised()->letters()->numbers()->symbols()],
            're_new_password'           =>['required','same:new_password'],
        ]);

        $user = Auth::user();

        $check = Hash::check($request->old_password , $user->password);

        if(! $check){
            return redirect()->back()
            ->with('error','Invalid Old Password');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('admins.dashboard')
        ->with('success',__('Password Updated Successfully'));
    }


    private function isAvatarImage(string $imagePath): bool
    {
        return preg_match('/users\/[a-f0-9]{13,}\.png$/', $imagePath);
    }
}
