

@extends('layouts.basic')

@section('maincontent')
    <h1>Create a New Account</h1>

    {{Form::open(['route'=>'users.store')}}
        <div>
            {{Form::label('email', 'Email (will be your username): ')}}
            {{Form::text('email')}}
        </div>

        <div>
            {{Form::label('password', 'Password: ')}}
            {{Form::password('password')}}
        </div>

        <div>
            {{Form::label('confirm_password', 'Confirm password: ')}}
            {{Form::password('confirm_password')}}
        </div>

          <div>
            {{Form::submit('Create Account')}}
        </div>
    {{Form::close()}}
@stop
