<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Validator;
use Socialite;
use Exception;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


     public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

         public function gmailRedirect()
    {
        return Socialite::driver('google')->redirect();
    }


    public function loginWithFacebook()
    {
        try {
    
            $user = Socialite::driver('facebook')->user();
            $isUser = User::where('fd_id', $user->id)->first();
     
            if($isUser){
                Auth::login($isUser);

                 return redirect(route('homepage'));
            }else{
                  $isemailUser = User::where('email', $user->email)->first();
                if($isemailUser){
                    /*update*/
                    $upadateva['fd_id'] = $user->id;
                    $update =User::updateUser($upadateva,$isemailUser->id);
                    Auth::login($isemailUser);
                }
                else{
                $createUser = User::create([
                    'first_name' => $user->name,
                    'last_name' => $user->name,
                    'email' => $user->email,
                    'country_id' => 6,
                    'fd_id' => $user->id,
                     'password' => Hash::make('12345678')
                ]);
               Auth::login($createUser);
            }
    
                
                return redirect(route('homepage'));
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }


    public function loginWithGmail()
    {
        try {
    
            $user = Socialite::driver('google')->user();
            $isUser = User::where('gmail_id', $user->id)->first();
     
            if($isUser){
                Auth::login($isUser);

                 return redirect(route('homepage'));
            }else{
                $isemailUser = User::where('email', $user->email)->first();
                if($isemailUser){
                    /*update*/
                    $upadateva['gmail_id'] = $user->id;
                    $update =User::updateUser($upadateva,$isemailUser->id);
                    Auth::login($isemailUser);
                }
                else{
                $createUser = User::create([
                    'first_name' => $user->name,
                    'last_name' => $user->name,
                    'email' => $user->email,
                    'country_id' => 6,
                    'gmail_id' => $user->id,
                     'password' =>Hash::make('12345678')
                ]);
                 Auth::login($createUser);
            }
    
               
                return redirect(route('homepage'));
            }
    
        } catch (Exception $exception) {
            dd($exception->getMessage());
        }
    }

    /*end facebook login*/

    public function soymlink(){
        try{
            Artisan::call('storage:link');
          
        }
        catch(Exception $e){
            return $this->response($e->getMessage());
        }
         return 'success';
    }
}
