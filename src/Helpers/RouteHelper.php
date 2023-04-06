<?php

namespace src\Helpers;

class RouteHelper {
    private $routes = [
        ''=>'src\Controllers\HomeController',
        'blog'=>'src\Controllers\BlogController',
        'contact'=>'src\Controllers\HomeController',
        'projects'=>'src\Controllers\HomeController',
        'about'=>'src\Controllers\HomeController',
        'notFound'=>'src\Controllers\NotFoundController'];

    private function notFound(){
        $c = new $this->routes['notFound'];
        $c->show();
    }

    private function validate($data){  
        $URI = explode('/', $data)[1]; 
        if (array_key_exists($URI, $this->routes)) {
            if (strlen($data) > 6 && $URI === 'blog' || 
                strlen($data) > 9 && $URI === 'projects' ) {
                $c = new $this->routes[$URI];
                $c->articleShow($data);
            } else {               
                $c = new $this->routes[$URI];
                $c->show();
            } 
        } else {
            $this->notFound();
        }
    }

    public function get($string){
        $this->validate($string);
    }
}
