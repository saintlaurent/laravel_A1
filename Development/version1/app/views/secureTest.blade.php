<link rel="stylesheet" href="{{URL::asset('css/bootstrap.css')}}" type="text/css">
<link rel="stylesheet" href="{{URL::asset('css/custom.css')}}" type="text/css">

@extends('layouts.basic')
@section('maincontent')


<h3>Welcome <?php echo $user->email?> !! </h3><br>

{{Form::open(array('route' => array('update-profile'), 'files' => true))}}
<?php


if(isset($message)){
    echo $message;
}

if($user->image_types != null)
{
    
    $fileTypeList = explode('|', $user->image_types);
    $_SESSION['fileTypeList'] = $fileTypeList;
}
else
{
    $fileTypeList = array('', '', '', '');
    $_SESSION['fileTypeList'] = $fileTypeList;
}



echo "<div class='row'>";
if($user->image1 !== null)
{
    echo '<div class="photo-holder col-lg-3"><img src="data:image/'.$fileTypeList[0].';base64,' . base64_encode($user->image1) . '" />';
    echo '<input type="checkbox" name="image1" value="delete1"> Delete Image</div>';
}


if($user->image2 !== null)
{
    echo '<div class="photo-holder col-lg-3"><img src="data:image/'.$fileTypeList[1].';base64,' . base64_encode($user->image2) . '" />';
    echo '<input type="checkbox" name="image2" value="delete2">Delete Image</div>'; 
}



if($user->image3 !== null)
{
    echo '<div class="photo-holder col-lg-3"><img src="data:image/'.$fileTypeList[2].';base64,' . base64_encode($user->image3) . '" />';
    echo '<input type="checkbox" name="image3" value="delete3">Delete Image</div>';
}
//
//die('passed');  

if($user->image4 !== null)
{
    echo '<div class="photo-holder col-lg-3"><img src="data:image/'.$fileTypeList[3].';base64,' . base64_encode($user->image4) . '" />';
    echo '<input type="checkbox" name="image4" value="delete4">Delete Image</div>';
}
    
echo "</div>";
    
  


//links and shit
$links = $user->href;
$arrayOfLinks = (explode("|",$links));
$counter = 0;

?>

<br>

<div class="row">
    

    <div class="field col-lg-3">
        <h3>Notes</h3>
        <textarea rows="6"  name="notes">{{$user->notes}}</textarea>
        
    </div>

    <div class="field  col-lg-3">
        <h3>Websites</h3>

        <?php $urlInputs = "";

        for($i = 0; $i < count($arrayOfLinks); $i++){
            echo '<input type="url" name="websites[]" value="' .$arrayOfLinks[$i] . '"><br>';
        }
        for($i = 0; $i < 3; $i++){
            echo ' <input type="url" name="websites[]"><br> ';
        }
        ?>
    </div>

    <div class="field  col-lg-3">
        <h3>Images</h3>

        @if($user->number_images < 4)
            {{Form::file('image', ['accept' => '.jpg,.gif'])}}
        @endif

    </div>



    <div class="field  col-lg-3">
       <h3> To Do List</h3>
       <textarea rows="6" name="to-do-list">{{$user->to_do_list}}</textarea>
       

    </div>
    
    <div class="row">
        <input class="btn btn-primary" type="submit" value="UPDATE">
    </div>
{{ Form::hidden('email', $user->email) }}
{{Form::close()}}
</div>


<br>

<a href="{{URL::route('account-logout')}}">Log Out</a>
@stop