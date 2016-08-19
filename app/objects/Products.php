<?php

class Products {

  private $name;
  private $price;
  private $url;
 
  function __construct($items)
  {
    $this->name   = ($items['name']) ? $items['name'] : 0 ;
    $this->price  = ($items['price']) ? $items['price'] : 0;
    $this->url    = ($items['url']) ? $items['url'] : 0;
  }

  /**
  *
  * It handles the parameters passed to the subject and writes them to the database
  */
  public function push(){

    $db = self::getProduct();

    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/app/file.txt')) {
      $id = end($db['id']);
      $id += 1;
    }else {
      $id = 0;
    }

    array_push($db['id'], $id);
    array_push($db['name'], $this->name);
    array_push($db['price'], $this->price);
    array_push($db['url'], $this->url);

    $db = json_encode($db);
    $fp = fopen($_SERVER['DOCUMENT_ROOT'] . '/app/file.txt', "w");
    fwrite($fp, $db . "\r\n");
    fclose($fp);

  }
  /**
  *
  * Returns an array of goods from the database
  *
  * @return array
  */
  public static function getProduct(){

    $arr  = [];
    $db   = [];
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/app/file.txt')) {
      $arr = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/app/file.txt');
      $arr = json_decode($arr);

      foreach ($arr->id as $name) {
        $db['id'][] = $name;
      }
      foreach ($arr->name as $name) {
        $db['name'][] = $name;
      }
      foreach ($arr->price as $name) {
        $db['price'][] = $name;
      }
      foreach ($arr->url as $name) {
        $db['url'][] = $name;
      }
    }else {
      $db = [
        'id' => [],
        'name' =>  [],
        'price' =>  [],
        'url' =>  []
      ];

    }

    return $db;
  }
}
