

$("#fat").click(function() {
    var value = $("#fat").val()
    console.log(value)
    $.ajax({
        type: "POST",
        url: "filterNutrition.php",
        data: "request="+value ,
        success: function(data) {
          $('.filterNutrition').html(data); 
        }
      });
  });
  
  $( "#lipide" ).click(function() {
    var value = $("#lipide").val()
    console.log(value)
    $.ajax({
        type: "POST",
        url: "filterNutrition.php",
        data: "request="+value ,
        success: function(data) {
          $('.filterNutrition').html(data); 
        }
      });
  });
  
  $( "#glucide" ).click(function() {
    var value = $("#glucide").val()
    console.log(value)
    $.ajax({
        type: "POST",
        url: "filterNutrition.php",
        data: "request="+value ,
        success: function(data) {
          $('.filterNutrition').html(data); 
        }
      });
  });
  
  
  $( "#Carbohydrate" ).click(function() {
    var value = $("#Carbohydrate").val()
    console.log(value)
    $.ajax({
        type: "POST",
        url: "filterNutrition.php",
        data: "request="+value ,
        success: function(data) {
          $('.filterNutrition').html(data); 
        }
      });
  });

  $( "#proteine" ).click(function() {
    var value = $("#proteine").val()
    console.log(value)
    $.ajax({
        type: "POST",
        url: "filterNutrition.php",
        data: "request="+value ,
        success: function(data) {
          $('.filterNutrition').html(data); 
        }
      });
  });
  
  console.log("mounir");