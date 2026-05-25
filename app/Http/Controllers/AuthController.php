<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

   // Cek user aktif dulu sebelum attempt
$user = \App\Models\User::where('email', $credentials['email'])->first();

class AuthController extends Controller
{
    private array $roleRoutes = [
        'admin'       => 'admin.dashboard',
        'owner'       => 'owner.dashboard',
        'engineering' => 'engineering.dashboard',
        'kepala_wh'   => 'kepala-wh.dashboard',
        'sopir'       => 'sopir.dashboard',
        'mandor'      => 'mandor.dashboard',
        'tukang'      => 'tukang.dashboard',
    ];

    public function showLogin()
    {
        if (auth()->check()) {
            return $this->redirectByRole(auth()->user()->role);
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

     

        if ($user && !$user->is_active) {
            return back()
                ->withErrors(['email' => 'Akun Anda tidak aktif. Hubungi Admin.'])
                ->onlyInput('email');
        }

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return $this->redirectByRole(auth()->user()->role);
        }

        return back()
            ->withErrors(['email' => 'Email atau password salah.'])
            ->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Berhasil keluar.');
    }

    private function redirectByRole(string $role)
    {
        $route = $this->roleRoutes[$role] ?? 'login';
        return redirect()->route($route);
    }
}
