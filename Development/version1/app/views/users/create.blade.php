

@extends('layouts.basic')

@section('maincontent')
    <h1>Create a New Account</h1>



    
<!--    <pre>{{ print_r($errors) }}</pre>-->
    
    {{Form::open()}}
        <div>
            {{Form::label('email', 'Email (will be your username): ')}}
            {{Form::text('email')}} 
            
            <!-- print error message -->
            @if($errors->has('email'))
                {{$errors->first('email')}}
            @endif
        </div>

        <div>
            {{Form::label('password', 'Password: ')}}
            {{Form::password('password')}}
            
            <!-- print error message -->
            @if($errors->has('password'))
                {{$errors->first('password')}}
            @endif
        </div>
    
        <div>
            {{Form::label('confirm_password', 'Confirm Password: ')}}
            {{Form::password('confirm_password')}}
            
            <!-- print error message -->
            @if($errors->has('confirm_password'))
                {{$errors->first('confirm_password')}}
            @endif
        </div>
    <div>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        
        <?php
//            
//            //include("../FORGOT_PASS/captcha/simple-php-captcha.php");
//            //include('../version1/app/models/captcha/simple-php-captcha.php');
//            include('../version1/app/models/captcha/simple-php-captcha.php');
//            //require_once __DIR__.'/../models/captcha/simple-php-captcha.php';
//            $_SESSION['captcha'] = simple_php_captcha(array(
//                'min_length' => 5,
//                'max_length' => 5,
//                'backgrounds' => array('../backgrounds/45-degree-fabric.png'),
//                'fonts' => array('../fonts/times_new_yorker.ttf'),
//                'characters' => 'ABCDEFGHJKLMNPRSTUVWXYZabcdefghjkmnprstuvwxyz23456789',
//                'min_font_size' => 28,
//                'max_font_size' => 28,
//                'color' => '#666',
//                'angle_min' => 0,
//                'angle_max' => 10,
//                'shadow' => true,
//                'shadow_color' => '#fff',
//                'shadow_offset_x' => -1,
//                'shadow_offset_y' => 1    
//            ));
//            echo '<img src="'.$_SESSION['captcha']['image_src'].'" />';
//            die(var_dump(simple_php_captcha()));
//        ?>
       
        
    </div>
    <div>
        {{Form::submit('Create Account')}}
    </div>
    {{Form::close()}}
@stop
