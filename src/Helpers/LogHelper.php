<?php

namespace src\Helpers;

class LogHelper 
{
    public static function log($e){   
        $file = fopen(LogHelper::getDirectory($e) . '.txt','w');
        if ($file == false) die('Não foi possível criar o arquivo.');       
        fwrite($file, LogHelper::getMessage($e));
        fclose($file);
    }

    private static function getFileName($e){
        return rtrim(substr($e->getFile(),strrpos($e->getFile(), '\\')+1), '.php');
    }

    private static function getFlag($e){
        $flags = [0=>'TEST',1=>'INFO',2=>'WARN',3=>'DANGER',4=>'FATAL'];
       if (array_key_exists($e->getCode(), $flags)) {
        return $flags[$e->getCode()];
       }
       return $e->getCode();
    }
    
    private static function getDirectory($e){
        return  __DIR__ . '/../../logs/' .
        LogHelper::getFileName($e) . '_' .
        LogHelper::getFlag($e) . '_' .
        date('Y-m-d_H-i');
    }

    private static function getMessage($e){
        return  LogHelper::getFlag($e) . ': ' .
        $e->getFile() .' on line' .
        $e->getLine() .': ' . $e->getMessage();
    }
}
