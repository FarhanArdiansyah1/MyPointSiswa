<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
                    ? if (Auth::user()->hasRole('admin')) {
                        return redirect()->intended(RouteServiceProvider::HOME1)
                    } else if (Auth::user()->hasRole('pelapor')) {
                        return redirect()->intended(RouteServiceProvider::HOME2)
                    } else {
                        return redirect()->intended(RouteServiceProvider::HOME3)
                    }
                    : view('auth.verify-email');
    }
}
