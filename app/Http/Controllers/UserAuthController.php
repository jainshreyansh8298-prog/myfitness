<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Laravolt\Avatar\Facade as Avatar;


class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'first_name'                    => 'required|string|max:50',
            'last_name'                    => 'required|string|max:50',
            'email'                         => ['required', 'email', Rule::unique('users', 'email')],
            'phone'                         => 'required|number|length:13|unique:user_details,phone',
            'password'                      => ['required', Password::min(8)->numbers()->letters()],
            'cnf_password'                  => 'required|same:password',
        ]);

        $name = $request->first_name . ' ' . $request->last_name;

        $avatar = Avatar::create($name)->toBase64();
        $image_content = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $avatar));
        $filename = 'users/' . uniqid() . '.png';
        Storage::disk('public')->put($filename, $image_content);
        $image_path = $filename;



        try {
            DB::beginTransaction();

            $user = User::create([
                'name'                  => $name,
                'email'                 => $request->email,
                'password'              => Hash::make($request->password),
                'image'                 => $image_path,
            ]);

            $user->details()->create([
                'phone'                 => $request->phone,
            ]);

            DB::commit();

            $user->sendEmailVerificationNotification();
            
            return redirect()->route('front.login')
                ->with('success', 'Your Account Created Please Check Your Inbox');
        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()
                ->with('error', 'try again later');
        }
    }
}
