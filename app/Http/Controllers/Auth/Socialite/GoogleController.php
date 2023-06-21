<?php

namespace App\Http\Controllers\Auth\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Socialite;
use Laravel\Socialite\Facades\Socialite as Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function redirectToGoogle()
   {
       return Socialite::driver('google')->redirect();
   }

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function handleGoogleCallback()

    {

        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if ($finduser) {
                $this->generateAccessToken($finduser);
                Auth::login($finduser);
                $redirect=$this->authenticated();
                return $redirect;
            } else {
                $userEmail = User::where('email', $user->email)->first();
                if($userEmail)
                {
                    $userEmail->google_id=$user->id;
                    $userEmail->save();
                    $this->generateAccessToken($userEmail); 
                    Auth::login($userEmail);     
                }
                else{
                    
                    $newUser = User::create([
                        'username' => $user->name,
                        'email' => $user->email,
                        'google_id' => $user->id,
                        'password' => Hash::make($user->name),
                        'role_id'=>3,
                        'is_vendor'=>0,
                    ]);
                    $this->generateAccessToken($newUser);
                    Auth::login($newUser);
                        
                }
                $redirect=$this->authenticated();
                return $redirect;
            }
        } catch (\Throwable $e) {

            Log::error($e->getMessage());
        }
    }

    private function generateAccessToken($user)
    {
        $success['token'] =  $user->createToken($user->username . $user->id)->accessToken; 
        $success['name'] =  $user->username;

        Session::put('token', $success['token']);
        Session::put('user', $success['name']);
    }

    public function authenticated()
    {
        $url = session()->get('url.intended');
       
        if (!empty($url) && strpos(config('app.url'),$url) === false) {
            return redirect($url);
        }
        else if (auth()->user()->role->role == "admin") {
            return redirect()->route('dashboard');
        }
        else if (auth()->user()->role->role == "vendor") {
            return redirect()->route('vendor.dashboard');
        }
        else{
            return redirect('/');
        }
    }
}
