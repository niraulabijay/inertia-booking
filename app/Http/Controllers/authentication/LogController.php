<?php

namespace App\Http\Controllers\authentication;

use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Laravel\Socialite\Facades\Socialite;

class LogController extends Controller
{
    public function login()
    {
        return Inertia::render('Authentication/Login');
    }

    public function check(Request $request)
    {
//        $input = $request->values;
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
//        dd($request);
        try {
            $remember=false;
            if($request->remember ==1 || $request->remember == true){
                $remember=true;
            }
            if (Sentinel::authenticate($request->all(), $remember)) {
                if (Sentinel::getUser()->roles->first()->slug == "admin" || Sentinel::getUser()->roles->first()->slug == "developer") {
                    return redirect()->route('admin.dashboard');
                } else {
                    return response()->json(['success'=>'success','redirect' =>'/']);
                }
            } else {
                add_error('Invalid email or password','loginFailed');
                return redirect()->route('admin_login');
            }
        } catch (ThrottlingException $e) {
            $delay = $e->getDelay();
            $msg = 'Too Many Retries. You have been banned for ' . $delay . ' seconds';
            add_error($msg,'loginFailed');
            return redirect()->route('admin_login');
        } catch (NotActivatedException $e) {
            add_error('Account Not Activated','loginFailed');
            return redirect()->route('admin_login');
        }

    }

    public function logout()
    {
        Sentinel::logout();
        return redirect('/');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleProviderCallback($service)
    {
        $client = Socialite::driver($service)->user();

//        check if the user already exists
        $user = User::where('google_id', $client->getId())->first();


        if (!$user) {
//        add user to database
            $user = Sentinel::registerAndActivate(array(
                'name' => $client->getName(),
                'email' => $client->getEmail(),
                'google_id' => $client->getId(),
            ));
        }
//        log the user in
//        Auth::login($user, true);
        Sentinel::authenticate($user, false);
        return redirect('/');


    }

    public function admin_login(){
        return view('authentication.admin_login');
    }
}
