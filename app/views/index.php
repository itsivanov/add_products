<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8">
    <title>Test</title>
    <link href="public/css/main.css" rel="stylesheet">
  </head>
  <body>
    <div class="content">
      <h2>Product scroll</h2>
      <p class="title_2">Enter a new product</p>
      <form action="" method="post" id="test_form">
        <div class="input_block">
          <span class="span_block">Name</span><input type="text" class="input_style" name="input_name" id="check1" >
          <span class="span_block">Price</span><input type="text" class="input_style" name="input_price" id="check2" >
          <span class="span_block">Url</span><input type="text" class="input_style" name="input_url" id="check3">
          <button type="button" class="btn">Add product</button>
        </div>
      </form>
      <div class="info_block"></div>
    </div>
    <div id="carousel">
      <div class="carousel-prev"></div>
      <div class="carousel-next"></div>
      <div class="carousel-holder">
        <div class="carousel-slider">
          <div class="show_ajax">
              <?php for ($i=0; $i < count($arr_product['id']) ; $i++) :?>
                    <div class=catousel-item id="<?php echo $arr_product['id'][$i]?>">
                        <div class=url>
                          <img src="<?php echo $arr_product['url'][$i] ?>" width=100 height=100 alt=альтернативный текст />
                        </div>
                        <div class=name>
                          <?php echo $arr_product['name'][$i] ?>
                        </div>
                        <div class=price>
                          <?php echo $arr_product['price'][$i] . '$'?>
                        </div>
                     </div>
              <?php endfor;?>
           </div>
        </div>
      </div>
    </div>

  </body>
  <script src="public/js/jquery-3.1.0.min.js"></script>
  <script src="public/js/main.js"></script>
</html>
