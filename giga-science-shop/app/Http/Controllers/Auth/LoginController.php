<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the incoming request
        $credentials = $request->only('email', 'password');

        // Attempt to log the user in
        if (Auth::attempt($credentials)) {
            // Regenerate session after successful login
            $request->session()->regenerate();

            // Fetch the authenticated user
            $user = Auth::user();

            // Check if user is admin and add the flag
            $isAdmin = $user->isAdmin();

            // Return success response with user data and admin flag
            return $this->authenticated($request, $user, $isAdmin);
        }

        // Return error if credentials are invalid
        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    // Custom method to send authenticated user response
    protected function authenticated(Request $request, $user, $isAdmin)
    {
        return response()->json([
            'user' => $user,
            'is_admin' => $isAdmin,
            'message' => 'Logged in successfully'
        ]);
    }

    // Logout method
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out successfully']);
    }
}
