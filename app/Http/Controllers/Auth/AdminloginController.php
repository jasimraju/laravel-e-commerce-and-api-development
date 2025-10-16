<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use App\Models\Category_info;
use App\Models\Frontpagelist;
use Illuminate\Support\Facades\Route;

class AdminloginController extends Controller
{
    /**
     * Display admin login view
     *
     * @return \Illuminate\View\View
     */

    Public $routename;
    public function __construct()
    {
     
        $this->routename = Route::currentRouteName();
    }

    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        } else {
            $category = new Category_info;
        $categorylist = $this->parent_catlist($category);
        $slider = new Frontpagelist();
      $metadata = $this->slider_meta_title($slider,$this->routename);
            return view('auth.adminlogin',compact('metadata','categorylist'));
        }
    }

    /**
     * Handle an incoming admin authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ], [
        'email.required' => __('message.email_address_required'),
        'email.email' => __('message.email_address_validtion'),
        'password.required' => __('message.password'),
    ]);

        if(auth()->guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            $user = auth()->user();

            return redirect()->intended(route('admin.dashboard'));
        } else {
            return redirect()->back()->withError('Credentials doesn\'t match.');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}