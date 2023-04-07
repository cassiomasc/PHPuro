<?php

namespace src\Models;

use src\Models\DB;
use src\Helpers\LogHelper;
use \PDO;

class BlogModel  {      
  /*
    `title` 
    `img` 
    `resumo` 
    `especial` 
    `visitas`
    `link` 
    `tag`  
  */
    public function getLink($link){
        try {
          $db = new DB();
          $uri = $db->select('SELECT * FROM blogtable WHERE link = :link', [':link' => $link])[0];
          return $uri['link'];
        } catch (\Throwable $e) {
          LogHelper::log($e);
        }
    }

    public function getData($link){
      try {
        $db = new DB();
        return $db->select('SELECT * FROM blogtable WHERE link = :link', [':link' => $link]);
      } catch (\Throwable $e) {
        LogHelper::log($e);
      }
    }

    public function getAll($page){
      try {
        $db = new DB();
        $data = $db->select('SELECT * FROM blogtable ORDER BY Created_at DESC LIMIT 10 OFFSET ' . $page);
        return $data;
      } catch (\Throwable $e) {
        LogHelper::log($e);
      }
    }
    public function getTotal(){
      try {
        $db = new DB();
        $data = $db->select('SELECT COUNT(*) as num_posts FROM blogtable');
        return $data;
      } catch (\Throwable $e) {
        LogHelper::log($e);
      }
    }

    public function getTags(){
      try {
        $db = new DB();
        $data = $db->select('SELECT tag, COUNT(*) AS num_posts FROM blogtable GROUP BY tag;');
        return $data;
      } catch (\Throwable $e) {
        LogHelper::log($e);
      }
    }

    public function getPostByTag($tag){
      try {
        $db = new DB();
        $data = $db->select('SELECT * FROM blogtable WHERE tag = :tag', [':tag' => $tag]);
        return $data;
      } catch (\Throwable $e) {
        LogHelper::log($e);
      }
    }

    public function search($keyWord){
      try {
        $db = new DB();
        $data = $db->select('SELECT * FROM blogtable WHERE title LIKE :keyWord OR resumo LIKE :keyWord OR tag LIKE :keyWord', [':keyWord' => '%'.$keyWord.'%']);
        return $data;
      } catch (\Throwable $e) {
        LogHelper::log($e);
      }
    }
}

