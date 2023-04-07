<?php

namespace src\Helpers;

class CSRFHelper { 
    // Credito do codigo HASH
    // https://pt.stackoverflow.com/questions/114663/como-prevenir-o-ataque-csrf-sem-frameworks-php
    private static function randomString($length = 15){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++)
            $randomString .= $characters[rand(0, $charactersLength - 1)];
    
        return $randomString;
    }

    public static function getInput(){
        $nameToken = CSRFHelper::randomString();
        $tokenDecode = CSRFHelper::randomString();
        $_SESSION['CSRFToken'] = $nameToken;
        $_SESSION['TokenDecode'] = $tokenDecode;

        $html = "<input type='hidden' name=". $nameToken ." 
        value=". $tokenDecode ." />";
        return $html;
    }

    public static function compareTokens($tokenA, $tokenB){
        if ($tokenA != $_SESSION['CSRFToken'] || $tokenB != $_SESSION['TokenDecode']) {
           $text = "Por favor tente novamente mais tarde.";
           FlashMessagesHelper::setMessage($text, "WARN"); 
           header('Location: '. '/contact');die;
        } 
    }

}
