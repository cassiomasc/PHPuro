<?php

namespace src\Controllers;

use src\Models\BlogModel;
use src\Views\BlogView;

class BlogController {    
    public function show($page = '0') {
        
        $postagens = 10;
        $db = new BlogModel();
        $data = $db->getAll(($page * $postagens));       
        $total = $db->getTotal()[0]['num_posts'];       
       
        $v = new BlogView();
        if ($total>10) {           
            $v->render($data);
        }else{
            $v->pagination($total, $page);
        }
     
    }

    public function articleShow($URI) {
        if (strlen($URI) <= 5) {
            return $this->show();
        }else {
            $titleURI = substr($URI,6,strlen($URI));
            if(is_numeric($titleURI)){                
                return $this->show($titleURI);
            }else{               
                $db = new BlogModel();
                $title = $db->getData($titleURI);
                if (!empty($title)) {          
                    $v = new BlogView();
                    $v->render($title);
                }else{
                    $NotFound = new NotFoundController();
                    $NotFound->show();
                }
            }
        }
    }
}
