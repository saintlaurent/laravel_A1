{{Form::open()}}

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

            {{Form::submit('Reset')}}
        </div>
    {{Form::close()}}