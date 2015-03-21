<?php
/**
 * Created by PhpStorm.
 * User: Catherine
 * Date: 3/19/15
 * Time: 4:13 PM
 */

class ProfileController extends BaseController {

    public function updateProfile(){
        //Images

     //   $imageData = file_get_contents(Input::file('image'));

//        $image = Input::file('image');
//        $filename = $image->getClientOriginalName();
        $email = Input::get('email');
        $user = User::where('email', '=', $email)->first();
//        $user->image2 = $imageData;
//        $numberOfImages = $user->number_images + 1;
//        $user->number_images = $numberOfImages;
 //       $user->save();
//        $affectedRows = User::where('email', '=', $email)->update(array('image' => $filename));
//        if($affectedRows){
//            echo "You've saved the image";
//        }

//        if( Input::get('image2') === 'delete'){
//            $user->image2 = null;
//            $user->save();
//        }
        $links = "";

        for ($i = 0; $i < count($_POST['websites']); $i++)
        {
            if(isset($_POST['websites'][$i])&& $_POST['websites'][$i] !== ""){
                $links .= $_POST['websites'][$i] . "|";
            } elseif($_POST['websites'][$i] == ""){
                $links .= "";
            }
        }
        $user->href = $links;
        $user->save();
    }
}

