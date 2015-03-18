<?php

class AccountController extends BaseController
{
    public function getCreate()
    {
        return View::make('users/create');
    }
    
    public function postCreate()
    {
        $validator = Validator::make(Input::all(),
                array(
                    'email' => 'required|unique:users|max:50|email',
                    'password' => 'required|min:6|max:30',
                    'confirm_password' => 'required|same:password'
                    )
                );
        
        if($validator->fails())
        {
            // redirect back to create-account with error message
            return Redirect::route('create-account')->withErrors($validator)->withInput();
        }
        else
        {
            $user = new User;
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->activation_token = Input::get('_token');
            $user->activation = false;
            $user->save();
            
            if($user)
            {
                require_once('Mailer.php');
                $mailer = new Mailer();
                $mailer->SendMail($user->activation_token);
                return Input::all();
            }
            else
            {
                return 'Insert failed';
            }
        }
    }
    
    public function initialActivation($token)
    {
        // Verify if token is valid
        $user = User::where('activation_token', '=', $token)->where('activation', '=', false);
                //select('SELECT activation_token FROM users WHERE activation_token = \''.$token.'\'');
        if(count($user) > 0)
        {
            // Update activation status
            //DB::update('UPDATE users SET activation = true WHERE activation_token = \''.$token.'\'');
            
            $user = $user->first();
            $user->activation = true;
            $user->save();
            return 'suceess';
        }
        else
        {
            return 'failed';
        }
    }
    
    public function getSignin()
    {
        return View::make('loginTest');
    }
    
    public function postSignin()
    {
        $auth = Auth::attempt(
                    array(
                        'email' => Input::get('email'),
                        'password' => Input::get('password')
                    )
                );
        
        if($auth)
        {
            return "logged in";
        }
        else
        {
            return "failed to login";
        }
//        return $auth;
    }
            
}