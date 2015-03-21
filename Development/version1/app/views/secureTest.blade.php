@extends('layouts.basic')
@section('maincontent')

<h3>Welcome <?php echo $user->email?> !! </h3><br>
<?php
$email = $user->email;
$imageData = $user->image2;
echo '<img src="data:image/png;base64,' . base64_encode($imageData) . '" />';
echo '';

//links and shit
$links = $user->href;
$arrayOfLinks = (explode("|",$links));
$counter = 0;


?>

<br>
{{Form::open(array('route' => array('update-profile'), 'files' => true))}}


<input type="checkbox" name="image2" value="delete">

    <div class="field">
        <h3>Notes</h3>
         <textarea rows="5" type="text" name="notes" value="{{$user->notes}}"></textarea>

    </div>

    <div class="field">
        <h3>Websites</h3>

        <?php $urlInputs = "";

        for($i = 0; $i < count($arrayOfLinks); $i++){
            echo '<input type="url" name="websites[]" value="' .$arrayOfLinks[$i] . '"><br>';
        }
        for($i = 0; $i < 3; $i++){
            echo ' <input type="url" name="websites[]"><br>';
        }
        ?>
    </div>

    <div class="field">
        <h3>Images</h3>

        @if($user->number_images < 4)
        {{Form::file('image')}}
        @endif

    </div>



    <div class="field">
       <h3> To Do List</h3>
        <input type="text" name="to-do-list" value="{{$user->to_do_list}}">

    </div>
    <input type="submit" value="Save">
{{ Form::hidden('email', $user->email) }}
{{Form::close()}}

<br>

<a href="{{URL::route('account-logout')}}">Log Out</a>
@stop