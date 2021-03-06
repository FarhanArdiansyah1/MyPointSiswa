<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredSiswaController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */


    public function create()
    {
        return view('auth.registersiswa');
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nis' => ['required'],
        ]);

        $poin = 3000;
        $role_id = "siswa";
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nis_nim_nik' => $request->nis,
            'jabatan' => $role_id,
            'poin' => $poin,
            'kelas' => $request->kelas
        ]);


        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'nis_nim_nik' => $request->nis,
        //     'jabatan' => $request->role_id,
        //     'poin' => $this->poin
        // ]);

        $user->attachRole($role_id);

        event(new Registered($user));

        Auth::login($user);
        if (Auth::user()->hasRole('admin')) {
            return redirect(RouteServiceProvider::HOME1);
        } else if (Auth::user()->hasRole('pelapor')) {
            return redirect(RouteServiceProvider::HOME2);
        } else {
            return redirect(RouteServiceProvider::HOME3);
        }
    }
}
