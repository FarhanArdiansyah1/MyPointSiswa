<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended(RouteServiceProvider::HOME1.'?verified=1');
            }else if (Auth::user()->hasRole('pelapor')) {
                return redirect()->intended(RouteServiceProvider::HOME2.'?verified=1');
            } else {
                return redirect()->intended(RouteServiceProvider::HOME3.'?verified=1');
            }
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        if (Auth::user()->hasRole('admin')) {
            return redirect()->intended(RouteServiceProvider::HOME1.'?verified=1');
        }else if (Auth::user()->hasRole('pelapor')) {
            return redirect()->intended(RouteServiceProvider::HOME2.'?verified=1');
        } else {
            return redirect()->intended(RouteServiceProvider::HOME3.'?verified=1');
        }
    }
}
