<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            if (Auth::user()->hasRole('admin')) {
                return redirect()->intended(RouteServiceProvider::HOME1);
            }else if (Auth::user()->hasRole('pelapor')) {
                return redirect()->intended(RouteServiceProvider::HOME2);
            } else {
                return redirect()->intended(RouteServiceProvider::HOME3);
            }
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
