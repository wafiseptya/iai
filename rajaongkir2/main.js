$(function(){
   
  $('#inputGroupSelect04').on('change', function() {
    
      var model=$('#inputGroupSelect04').val();
      // var url = 'https://api.rajaongkir.com/starter/city?province=5' + model;
      // console.log(url);
      // console.log(post_data);
      $.ajax({
        type: "POST",
        url: 'province.php',
        data: "province_id=" + model,
        success: function(data)
        {
            alert("success!");
        }

      });
  });
});
