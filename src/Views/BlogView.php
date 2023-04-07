<?php

namespace src\Views;

class BlogView extends View{
    public function render($args = []){
        echo"<pre>";
        echo"<img src=" . $args[0]['img'] . " alt='capivarias' />";
        var_dump($args);
    }
}
