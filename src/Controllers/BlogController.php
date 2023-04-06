<?php

namespace src\Controllers;

use src\Models\BlogModel;
use src\Views\BlogView;

class BlogController {    
    public function show() {     
        echo "oi";
    }

    public function articleShow($URI) {       
        if (strlen($URI) <= 5) {
            return $this->show();
        }else {
            $titleURI = substr($URI,6,strlen($URI));            
            $db = new BlogModel();
            $title = $db->getDataFromDB($titleURI);

            if (!is_null($title)) {          
                $v = new BlogView();
                $v->render($title);
            }else{
                $NotFound = new NotFoundController();
                $NotFound->show();
            }
        }        
    }
}