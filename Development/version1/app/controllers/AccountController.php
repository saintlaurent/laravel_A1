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
                /*
                 * Please go to Mailer.php and replace some contents with 
                 * the actual user name and password of your email account
                 * in order to make email function work.
                 */ 
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
        if($token == null)
        {
            if($token == '')
            {
                return View::make('hello');
            }
        }
        // Verify if token is valid
        $user = User::where('activation_token', '=', $token)->where('activation', '=', false)->first();
                //select('SELECT activation_token FROM users WHERE activation_token = \''.$token.'\'');
        if($user)
        {
            // Update activation status
            $user->activation = true;
            $user->save();
            return View::make('account_activation', array('message' => 'Account successfully activated.'));
        }
        else
        {
            return View::make('account_activation', array('message' => 'Account activation failed.'));
        }
    }
    
    public function getSignin()
    {
        return View::make('loginTest');
    }
    
    public function postSignin()
    {
        // How to implement http://laravel.com/docs/4.2/security
        $auth = Auth::attempt(
                    array(
                        'email' => Input::get('email'), // Check email
                        'password' => Input::get('password'), // Check password
                        'activation' => 1 // Check activation if equals to one
//                        , true // The forth parameter is set to be remembering user
                        
                        /*
                           All parameters above on the left of => must match 
                           column names on database table
                        */
                    )
                );
        
        if($auth)
        {
            $email = Input::get('email');
            $user = User::where('email', '=', $email)->first();
            //return "logged in";
            return View::make('secureTest')->with('user', $user);
        }
        else
        {
            return "failed to login";
        }
    }
    
    public function getSecure()
    {
        if(Auth::id() == '' && Auth::user() == null)
        {
            return Redirect::route('sign-in', array('error' => 'You have not logged in yet'));
        }
        return View::make('/secureTest');
    }
    
    public function getForgotPassword()
    {
        return View::make('forgot_password');
    }
    
    public function postForgotPassword()
    {
        // implement send email to user's email address
        $user = User::where('email', '=', Input::get('email'))->first();
        
        if($user)
        {
            $user->reset_token = Input::get('_token');
            $user->save();
            require_once('Mailer.php');
                $mailer = new Mailer();
                $mailer->SendMail($user->reset_token);
        }

        return Redirect::route('sign-in');
    }
    
    public function getResetPassword($token, $id)
    {
        //http://localhost:8000/account/activation/'.$tokenMessage

        // Verify if token is valid
        $user = User::where('reset_token', '=', $token)->where('id', '=', $id)->first();
                //select('SELECT activation_token FROM users WHERE activation_token = \''.$token.'\'');
        if($user)
        {
            return View::make('reset_password');
        }
        else
        {
            return View::make('hello');
        }
    }
    
    public function postResetPassword()
    {
        // implement reset password function
        $user = User::where('email', '=', Input::get('email'))->where('reset_token', '=', Input::get('_token'))->first();
        if($user)
        {
            $user->password = Hash::make(Input::get('password'));
            $user->save();
        }
        return Redirect::route('sign-in');
        //return "got in";
        //return var_dump($user->password."     ".$user->reset_token);
    }
            
}