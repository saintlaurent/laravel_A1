
<!--    <pre>{{ print_r($errors) }}</pre>-->
    
<link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('css/custom.css')}}" type="text/css">
<!--    
<link href="../../public/css/bootstrap.css" rel="stylesheet" type="text/css"/>
    When array is passed into 'open' method, Form::open(array('url' => 'PAGE_NAME')),
    it is assumed that form is going to be posted to PAGE_NAME.
-->

<div class="container">
    {{Form::open(array('url' => 'secureTest', 'class'=>'form login-panel'))}} 
        <div>
            {{Form::label('email', 'Email (will be your username): ')}}
            {{Form::text('email', null, ['class' => 'form-control col-lg-6'])}} 
            
            <!-- print error message -->
            @if($errors->has('email'))
                {{$errors->first('email')}}
            @endif
        </div>

        <div>
            {{Form::label('password', 'Password: ')}}
            {{Form::password('password', ['class' => 'form-control col-lg-6'])}}
            
            <!-- print error message -->
            @if($errors->has('password'))
                {{$errors->first('password')}}
            @endif
        </div>
        {{Form::token()}}
        <div>
            {{Form::submit('Login', ['class' => 'btn btn-large btn-primary'])}}
        </div>
    {{Form::close()}}
    
    <p>Not yet a member? <a href="{{URL::route('create-account')}}">Register</a>
    
    </p>

    <p><a href="{{URL::route('forgot-password')}}">Forgot Password</a></p>
    <a href="{{URL::route('account-logout')}}">Logout</a>
</div>
    
    
<?php 
    if(isset($_GET['error']))
    {
        echo $_GET['error'];
        unset($_GET['error']);
    }
    
    if(isset($message))
    {
        echo $message;
    }
    
    