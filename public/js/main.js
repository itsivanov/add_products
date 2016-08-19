jQuery(document).ready(function(){
  Products.init();
});

var Products = function () {

  var handleAjax = function( data ) {

    $.ajax({
      url: 'app/save_product.php',
      type: "POST",
      dataType: 'json',
      data: $.param(data),
      success: function(result){

        if ( data.action == "save" ) {
          $('body .show_ajax').html( result.product );
        }

      }
    });
  }

  var handleSave = function(){
    $('#test_form').on('click', ".btn", function(){

      var text_input  = $('input[name=input_name]').val();
      var input_price = $('input[name=input_price]').val();
      var input_url   = $('input[name=input_url]').val();

      if (text_input == '' || input_price == '' || input_url == '' ) {
        $('.info_block').css('display','block');
        $('.info_block').html('Fill in all the fields');
        return false;
      }else {
        $('.info_block').css('display','none');
      }

      if (input_url.indexOf('.jpg') < 0|| input_url.indexOf('http') < 0) {
        $('.info_block').css('display','block');
        $('.info_block').html('You must add a URL to the image format JPG. Example(http://site.com/images/shark.jpg)');
        return false;;
      }else {
        $('.info_block').css('display','none');

      }

      var data = {
        name : text_input,
        price : input_price,
        url : input_url,
        action: "save"
      }
      handleAjax(data);
    })
  }
  var govern = function() {

      var slider = $('#carousel .carousel-slider');
      var item = $('#carousel .catousel-item');
      var total = item.length;
      var width = item.width();
      var index = 0;
      var speed = 500;

      slider.width( total * width );

      function carouselSlide(index) {
        slider.stop().animate({left: -index * width +'px'}, speed);
      };

      $('.carousel-prev').on('click', function() {
        index -= 1;
        carouselSlide( index = (index < 0) ? total - 1 : index );
      });

      $('.carousel-next').on('click', function() {
        index += 1;
        carouselSlide( index = (index > total - 1) ? 0 : index );
      });
  }

  return {
      init: function () {
        handleSave();
        govern();
      }
  };
}();
