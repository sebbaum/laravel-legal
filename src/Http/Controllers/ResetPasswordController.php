<?php

namespace Sebbaum\Legal\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ResetPasswordController extends Controller
{

    /**
     * Show reset password form.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showPasswordForm()
    {
        return view('legal::resetPasswordForm');
    }

    /**
     * Store the new password and remove password reset flag.
     *
     * @param Request $request
     */
    public function storeNewPassword(Request $request)
    {
        // TODO: validation
        // TODO: update

        dd($request);
    }
}
