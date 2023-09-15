<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return $this->success(
            '',
            ['token' => $user->createToken($request->email)->plainTextToken]
        );
    }


    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out successfully']);
    }

    public function user(Request $request): JsonResponse
    {
        return $this->response(new UserResource($request->user()));
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        $user->assignRole('customer');

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('users/'.$user->id, 'public');
            $user->photos()->create([
                'full_name' => $request->file('photo')->getClientOriginalName(),
                'path' => $path,
            ]);
        }

        return $this->success(
            'user created',
            ['token' => $user->createToken($request->email)->plainTextToken]
        );
    }

    public function changePassword(Request $request): JsonResponse
    {
        $user = $request->user();

        $request->validate([
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json(['message' => 'Current password is incorrect'], 401);
        }

        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return response()->json(['message' => 'Password changed successfully']);
    }
}
