<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil
            $user = Auth::user();

            if ($user->active == 1) {
                return redirect()->intended($this->redirectPath());
            } else {
                // Jika user tidak aktif, logout dan kirim pesan error
                Auth::logout();
                return back()->with('error', 'Akun Anda tidak aktif.');
            }
        }

        // Jika login gagal
        return $this->sendFailedLoginResponse($request);
    }
}
