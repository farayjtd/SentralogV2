<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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

    public function showLogin(): View|RedirectResponse
    {
        if (auth()->check()) {
            return $this->redirectByRole(auth()->user()->role);
        }

        return view('auth.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cek user aktif dulu sebelum attempt
        $user = User::where('email', $credentials['email'])->first();

        if ($user && ! $user->is_active) {
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

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Berhasil keluar.');
    }

    private function redirectByRole(string $role): RedirectResponse
    {
        $route = $this->roleRoutes[$role] ?? 'login';

        return redirect()->route($route);
    }
}
