<?php

namespace src\Views;

class FlashMessageView {
   
    public function __construct($message, $flag){
        echo('
        <div class='.$flag.'>
        <strong>'.$flag.'!</strong> '.$message.'
        </div>'); 
    }
}
