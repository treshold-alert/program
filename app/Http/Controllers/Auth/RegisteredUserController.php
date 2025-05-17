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
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone_number' => [
                'required',
                'numeric',
                'digits_between:10,15',
                'unique:' . User::class,
                'regex:/^628[0-9]{7,12}$/'
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [
            'phone_number.regex' => 'Nomor telepon harus diawali dengan 628, bukan 08.',
        ]);


        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        return redirect()->route('login')->with([
            'status' => 'Registrasi berhasil. Silakan login.',
            'show_verification_modal' => true,
        ]);
    }
}
