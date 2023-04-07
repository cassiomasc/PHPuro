<?php

namespace src\Models;

use src\Models\DB;
use src\Helpers\LogHelper;
use \PDO;

class BlogModel  {       
    public function getTitleFromDB($link){
        try {
          $db = new DB();
          $uri = $db->select('SELECT * FROM blogtable WHERE link = :link', [':link' => $link])[0];
          return $uri['link'];
        } catch (\Throwable $e) {
          LogHelper::log($e);
        }
    }

    public function getDataFromDB($link){
      try {
        $db = new DB();
        return $db->select('SELECT * FROM blogtable WHERE link = :link', [':link' => $link]);
      } catch (\Throwable $e) {
        LogHelper::log($e);
      }
    }
}
