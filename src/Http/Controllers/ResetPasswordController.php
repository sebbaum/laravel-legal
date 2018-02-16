<?php

namespace Sebbaum\Legal\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeNewPassword(Request $request)
    {
        Validator::make($request->all(), [
            'new_password' => 'required|confirmed|min:6',
        ])->validate();

        $lawyer = Auth::guard('legal')
            ->user();

        $lawyer->password = bcrypt($request->input('new_password'));
        $lawyer->force_reset_password = false;
        $lawyer->update();

        return redirect()
            ->intended('/legal/editor');
    }
}
