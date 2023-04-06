<?php

namespace src\Helpers;

use src\Views\FlashMessageView;

class FlashMessagesHelper 
{
    public static function setMessage($message, $flag){
        $_SESSION['FlashMessage'] = ['message'=>$message, 'flag'=>$flag];
    }

    public static function getMessage(){
        new FlashMessageView($_SESSION['FlashMessage']['message'],
        $_SESSION['FlashMessage']['flag']);
        $_SESSION['FlashMessage'];
        FlashMessagesHelper::clearMessage();
    }

    public static function clearMessage(){
        $_SESSION['FlashMessage'] = [];
        unset($_SESSION['FlashMessage']);
    }
}