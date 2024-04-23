$(function(){
    $('.imagen').click(function(){
        var imagen1=$(this).attr('src');
       // var titleimagen=$(this).attr('alt');
        if (imagen1==""){
          $('.recibir-imagen').attr('src','http://www.51allout.co.uk/wp-content/uploads/2012/02/Image-not-found.gif');
          $('#modalimagen').modal();
        }else{
	        $('.recibir-imagen').attr('src',imagen1);
	      //  $('.texto-imagen').text(titleimagen);
	        $('#modalimagen').modal();
      }
    });

  });

 