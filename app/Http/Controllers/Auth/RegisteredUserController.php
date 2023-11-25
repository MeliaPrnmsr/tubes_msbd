<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'username' => ['required'],
            'role' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

         // Redirect based on user role
         $name = $user->name;
         //$request->session()->put('username', $name);
 
         if ($user->role == 'admin') {
            return redirect()->route('dashboard.admin');
        } elseif ($user->role == 'staff') {
            return redirect()->route('dashboard.staff');
        } elseif ($user->role == 'dosen') {
            return redirect()->route('landingpage.dosen');
        } else {
            return redirect()->route('landingpage.mahasiswa');
        }
        
 
 
         return back()->withErrors([
             'username' => 'The provided credentials do not match our records.',
         ]);

        //return redirect(RouteServiceProvider::HOME);
    }
}
