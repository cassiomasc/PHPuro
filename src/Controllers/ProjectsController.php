<?php

namespace src\Controllers;

use src\Models\ProjectsModel;
use src\Views\ProjectsView;

class ProjectsController {    
    public function show() {     
        echo "oi";
    }

    public function articleShow($URI) {       
        if (strlen($URI) <= 9) {
            return $this->show();
        }else {
            $titleURI = substr($URI,10,strlen($URI));  
            $db = new ProjectsModel();
            $title = $db->getDataFromDB($titleURI);

            if (!empty($title)) {          
                $v = new ProjectsView();
                $v->render($title);
            }else{
                $NotFound = new NotFoundController();
                $NotFound->show();
            }
        }        
    }
}