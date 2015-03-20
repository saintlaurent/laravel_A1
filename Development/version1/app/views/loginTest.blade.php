
<!--    <pre>{{ print_r($errors) }}</pre>-->
    

<!--    
    When array is passed into 'open' method, Form::open(array('url' => 'PAGE_NAME')),
    it is assumed that form is going to be posted to PAGE_NAME.
-->
    
    {{Form::open(array('url' => 'secureTest'))}} 
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
        {{Form::token()}}
        <div>
            {{Form::submit('Login')}}
        </div>
    {{Form::close()}}


<?php 
    if(isset($_GET['error']))
    {
        echo $_GET['error'];
    }
    