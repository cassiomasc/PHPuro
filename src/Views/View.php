<?php

namespace src\Views;

class View {
    public function __construct(){
       echo('<!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Titulo</title>
            <link rel="stylesheet" href="\res/css/style.css">
            <script src="\res/js/script.js"></script>
        </head>
        <body>');
    }

    public function __destruct(){           
        echo('</body></html>');
    }
}
