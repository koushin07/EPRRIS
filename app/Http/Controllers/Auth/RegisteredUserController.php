<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Municipality;
use App\Models\Province;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\RegisterAsMunicaplity;
use App\Rules\RegisterAsProvince;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register', [
            'municipalities' => Municipality::get(['id', 'municipality_name']),
            'provinces' => Province::get(['id', 'province_name']),
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        if ($request->role == 'municipality') {
            $municipality = Municipality::where('municipality_name', $request->municipality)->first(['id', 'municipality_name']);
            // dd($municipality->id);
            $request->validate([
                'municipality' => ['required', new RegisterAsMunicaplity()],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([

                'name' => $municipality->municipality_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'municipality_id' => $municipality->id,
                'role' => 'municipality'
            ]);
            //  event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }
        if ($request->role == 'province') {
            $province = Province::where('province_name', $request->province)->first(['id', 'province_name']);

            $request->validate([
                'province' => ['required', new RegisterAsProvince()],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $user = User::create([
                'province_id' => $province->id,
                'name' => $province->province_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'province'
            ]);
            //  event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }
    }
}
