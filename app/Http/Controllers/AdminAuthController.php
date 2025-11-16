<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use App\Services\Admin\AdminAuthService;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    protected $authService;

    public function __construct(AdminAuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Admin login
     */
    public function login(AdminLoginRequest $request)
    {
        $result = $this->authService->login(
            $request->email,
            $request->password
        );

        if (!$result['success']) {
            return response()->json([
                'message' => $result['message']
            ], ResponseAlias::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'message' => 'Login successful',
            'token'   => $result['token'],
            'admin'   => $result['admin']
        ], ResponseAlias::HTTP_OK);
    }


    /**
     * Admin logout
     */
    public function logout(Request $request)
    {
        $this->authService->logout($request->user());

        return response()->json([
            'message' => 'Logged out successfully'
        ], ResponseAlias::HTTP_OK);
    }
}
