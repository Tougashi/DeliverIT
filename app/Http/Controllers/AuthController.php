<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function SignIn()
    {
        return view('Auth.SignIn.index', [
            'title' => 'Sign In' 
        ]);
    }
    public function loginPost(Request $request)
    {
        // Validasi data yang masuk
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
         if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('dashboard')->with('toast', ['type' => 'success', 'message' => 'Login berhasil']);
        }
        return back()->withToast(['email' => 'Wrong Email or Password.'])->withInput();
    }

      
    public function SignOut(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }



// API LOGIN METHOD 
    public function login(Request $request)
    {
        try {
            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                $user = Auth::user();

                if ($user->roleId === 1) {
                    $token = $this->generateToken($user);
                    return response()->json(['message' => 'Login Success', 'token' => $token], 200);
                } else {
                    throw ValidationException::withMessages(['message' => 'You don\'t have permission to this API']);
                }
            } else {
                throw ValidationException::withMessages(['message' => 'Unauthorized']);
            }
        } catch (ValidationException $e) {
            return response()->json(['message' => $e->getMessage()], 401);
        }
    }

    protected function generateToken($user)
    {
        $token = $user->createToken('authToken')->plainTextToken;
        return $token;
    }


    public function Logout(Request $request) 
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }

    public function SignUp()
    {
        return view('Auth.SignUp.index', [
            'title' => 'Sign Up' 
        ]);
    }


 
}
