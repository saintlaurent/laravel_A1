<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body>

Welcome <?php echo $user->email?> !! <br>
<?php
$email = $user->email;

?>

<br>




    <div class="field">
        <h3>Notes</h3>
         <input type="text" name="notes" value="{{$user->notes}}">

    </div>

    <div class="field">
        <h3>Websites</h3>
         <input type="url" name="websites"><br>
        <input type="url" name="websites"><br>
        <input type="url" name="websites"><br>
        <input type="url" name="websites"><br>
    </div>

    <div class="field">
        <h3>Images</h3>
        {{Form::file('image')}}

    </div>



    <div class="field">
       <h3> To Do List</h3>
        <input type="text" name="to-do-list" value="{{$user->to_do_list}}">

    </div>
    <input type="submit" value="Save">


<br>


</body>
</html>