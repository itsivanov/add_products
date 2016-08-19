<?php
include_once('objects/Products.php');
include_once('objects/Filter.php');
$data = [];
$filter = new Filter;
$data['name']  = $filter->sanitize($_POST['name'], ['string', 'trim', 'striptags']);
$data['price'] = $filter->sanitize($_POST['price'], 'int');
$data['url']   = $filter->sanitize($_POST['url'], ['string', 'trim', 'striptags']);


$products = new Products($data);
$products->push();
$arr_product = Products::getProduct();
$return = [];
// var_dump($arr_product['id']);die;
for ($i=0; $i < count($arr_product['id']) ; $i++) {
  $return['product'] .= "<div class=carousel-slider>
                          <div class=catousel-item id=".$arr_product['id'][$i].">
                              <div class=url>
                               <img src=". $arr_product['url'][$i] . " width=100 height=100 alt=text />
                              </div>
                              <div class=name>
                               ". $arr_product['name'][$i] . "
                              </div>
                              <div class=price>
                               ". $arr_product['price'][$i] . "$
                              </div>
                           </div>
                          </div>";

}


echo json_encode($return);
