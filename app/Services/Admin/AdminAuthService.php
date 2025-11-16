<?php

namespace App\Services\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminAuthService
{
    public function login(string $email, string $password)
    {
        $admin = Admin::where('email', $email)->first();

        if (!$admin || !Hash::check($password, $admin->password)) {
            return [
                'success' => false,
                'message' => 'Invalid login credentials'
            ];
        }

        $token = $admin->createToken('admin-token', abilities: ['admin'])->plainTextToken;


        return [
            'success' => true,
            'token'   => $token,
            'admin'   => $admin
        ];
    }

    public function logout($user)
    {
        $user->tokens()->delete();

        return true;
    }
}
