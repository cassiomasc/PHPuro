<?php

namespace src\Views;

class BlogView extends View{
    public function render($args = []){
        echo"<pre>";
        echo"<img src=" . $args[0]['img'] . " alt='capivarias' />";
        var_dump($args);
    }

    public function pagination($total, $page){
       $total = ceil($total/10); 
       if ($page != 0) {       
        if (($page-1) == 0) {
            $text = '/blog';
        }else{            
            $text = "/blog/".($page-1);
        }
        echo "<a href='".$text."'>Anterior</a>" ;
       }
       for ($i=0; $i < $total; $i++) { 
        $v = $i +1 ;
        echo "<a href='/blog/$v'>$v</a>" ;
       }  
       if ($page != $total) {               
        echo "<a href='/blog/".($page+1)."'>Proxima</a>" ;
       }     
    }
}
