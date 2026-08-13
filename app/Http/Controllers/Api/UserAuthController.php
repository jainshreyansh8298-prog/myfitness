<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;
use Laravolt\Avatar\Facade as Avatar;

class UserAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name'                      => 'required|string|max:255',
            'image'                     => 'nullable|image|max:2048',
            'email'                     => 'required|email|unique:users,email',
            'password'                  => ['required', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
            're_password'               => 'required|same:password',
        ]);

        $image_path = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store('users', 'public');
        } else {
            $avatar = Avatar::create($request->name)->toBase64();
            $image_content = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $avatar));
            $filename = 'users/' . uniqid() . '.png';
            Storage::disk('public')->put($filename, $image_content);
            $image_path = $filename;
        }

        $user = User::create([
            'name'                      => $request->name,
            'image'                     => $image_path,
            'email'                     => $request->email,
            'password'                  => Hash::make($request->password),
            'remember_token'            => (string) rand(10000, 99999),
        ]);

        $auth_token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'                   => __('User Registered Successfully'),
            'user'                      => $user,
            'auth_token'                => $auth_token,
        ]);
    }

    public function confirmEmail(Request $request)
    {
        $request->validate([
            'code'                  => 'required|numeric|min:10000,max:99999',
        ]);

        $user = Auth::guard('sanctum')->user();
        if ($user->remember_token != $request->code) {
            return response()->json([
                'message'               => __('Invalid Code'),
            ], 401);
        }

        $user->email_verified_at = now();
        $user->save();

        return response()->json([
            'message'               => __('Email Verified Successfully'),
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'                         =>'required|email|exists:users,email',
            'password'                      => 'required|min:8',
        ]);

        $user = User::where('email', $request->email)
            ->first();

        if (!$user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'message'                   => __('Invalid Email Or Password'),
            ], 401);
        }

        $auth_token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'                   => 'logged in',
            'user'                      => $user,
            'auth_token'                => $auth_token,
        ]);
    }

    public function logout()
    {
        $user = Auth::guard('sanctum')->user();

        if (! $user) {
            return response()->json([
                'message'                   => 'Unauthenticated',
            ], 401);
        }

        $user->currentAccessToken()->delete();

        return response()->json([
            'message'                   => 'Logged out',
        ], 204);
    }

    public function updateTokens(Request $request)
    {
        $request->validate([
            'fcm_token'                     => 'required_without:player_id|string|max:255',
            'player_id'                     => 'required_without:fcm_token|string|max:255',
        ]);

        $user = Auth::guard('sanctum')->user();

        if (! $user) {
            return response()->json([
                'message'                   => 'Unauthenticated',
            ], 401);
        }

        if ($request->has('fcm_token')) {
            $user->fcm_token = $request->fcm_token;
        }

        if ($request->has('player_id')) {
            $user->player_id = $request->player_id;
        }

        $user->save();

        return response()->json([
            'message'               => 'user tokens updated'
        ]);
    }

    // public function sendVerificationCode()
    // {
    //     $user = Auth::guard('sanctum')->user();

    //     if ($user->is_phone_verified) {
    //         return response()->json([
    //             'message'                   => 'user phone already verified',
    //         ]);
    //     }

    //     $response = Http::post("https://identitytoolkit.googleapis.com/v1/accounts:sendVerificationCode?key=" . config('services.firbase.phone_verification_key'), [
    //         'phoneNumber'               => $user->phone
    //     ]);

    //     if ($response->failed()) {
    //         return response()->json(['message' => 'Failed to send code', 'error' => $response->json()], 422);
    //     }

    //     return response()->json([
    //         'sessionInfo' => $response['sessionInfo'],
    //         'message' => 'Verification code sent'
    //     ]);
    // }

    public function update(Request $request)
    {
        $request->validate([
            'name'        => "sometimes|required|max:255",
            'image'       => 'sometimes|nullable|image|max:2048',
            'password'    => ['sometimes', 'required', Password::min(8)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
            're_password' => 'required_with:password|same:password',
        ]);

        $user = Auth::guard('sanctum')->user();

        if (!$user) {
            return response()->json(['message' => 'Unauthenticated'], 401);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_path = $image->store('users', 'public');
            if ($user->image && !$this->isAvatarImage($user->image)) {
                Controller::deleteFile($user->image);
            }
            $user->image = $image_path;
        } elseif (is_null($request->image) && $this->isAvatarImage($user->image)) {
            $name = $request->name ?? $user->name;
            $avatar = Avatar::create($name)->toBase64();
            $image_content = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $avatar));
            $filename = 'users/' . uniqid() . '.png';
            Storage::disk('public')->put($filename, $image_content);
            $user->image = $filename;
        }

        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json(['message' => 'User updated']);
    }

    private function isAvatarImage(string $imagePath): bool
    {
        return preg_match('/users\/[a-f0-9]{13,}\.png$/', $imagePath);
    }
}
