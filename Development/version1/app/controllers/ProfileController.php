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
        $image = Input::file('image');
         $filename = $image->getClientOriginalName();

        $user = Input::get('user');
        var_dump($user);
    }

}

