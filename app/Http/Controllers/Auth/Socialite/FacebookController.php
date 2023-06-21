<?php

namespace App\Http\Controllers\Auth\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class FacebookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleFacebookCallback()
    {
        try {
        
            $user = Socialite::driver('facebook')->user();
         
            $findUser = User::where('facebook_id', $user->id)->first();
         
            if($findUser){
                $this->generateAccessToken($findUser);   
                Auth::login($finduser);
       
                return redirect('/');
         
            }else{
                // $newUser = User::updateOrCreate(['email' => $user->email],[
                //         'name' => $user->name,
                //         'facebook_id'=> $user->id,
                //         'password' => encrypt('123456dummy')
                //     ]);

                $newUser = User::create([
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'username' => $user->name,
                    'password' => Hash::make($user->name),
                    'role_id' => 3,
                    'is_vendor' => 0
                ]);
                    
                $this->generateAccessToken($newUser);    
                Auth::login($newUser);
        
                return redirect('/');
            }
       
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    private function generateAccessToken($user)
    {
        $success['token'] =  $user->createToken($user->username . $user->id)->accessToken; 
        $success['name'] =  $user->username;

        Session::put('token', $success['token']);
        Session::put('user', $success['name']);
    }
}
