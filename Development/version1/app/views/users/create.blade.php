

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

            {{Form::submit('Create Account')}}
        </div>
    {{Form::close()}}
@stop
