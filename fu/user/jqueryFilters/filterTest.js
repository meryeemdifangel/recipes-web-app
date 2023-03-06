

console.log("dif") ;

$("#summerS").click(function() {
 var value = $("#summerS").val();
    $.ajax({
        type: "POST",
        url: "filterSaison.php",
        data: "request="+value ,
        success: function(data) {
          $('.filterSeason').html(data); 
        }
      });
  });

  $( "#winterS" ).click(function() {
    var value = $("#winterS").val();

    console.log(value);
    $.ajax({
        type: "POST",
        url: "filterSaison.php",
        data: "request="+value ,
        success: function(data) {
          $('.filterSeason').html(data); 
        }
      });
});

  $( "#springS" ).click(function() {
    var value = $("#springS").val()
 

    $.ajax({
        type: "POST",
        url: "filterSaison.php",
        data: "request="+value ,
        success: function(data) {
          $('.filterSeason').html(data); 
        }
      });
});

  $( "#autumnS" ).click(function() {
    var value = $("#autumnS").val()



    $.ajax({
        type: "POST",
        url: "filterSaison.php",
        data: "request="+value ,
        success: function(data) {
          $('.filterSeason').html(data); 
        }
      });
});







$( "#fitr" ).click(function() {
    var value = $("#fitr").val();
    console.log(value)
       $.ajax({
           type: "POST",
           url: "filterFete.php",
           data: "request="+value ,
           success: function(data) {
             $('.filterFete').html(data); 
           }
         });
     });
   
     $( "#adha" ).click(function() {
       var value = $("#adha").val();
       console.log(value);
       $.ajax({
           type: "POST",
           url: "filterFete.php",
           data: "request="+value ,
           success: function(data) {
             $('.filterFete').html(data); 
           }
         });
   });
   
     $( "#yennayer" ).click(function() {
       var value = $("#yennayer").val()
       console.log(value)
       $.ajax({
           type: "POST",
           url: "filterFete.php",
           data: "request="+value ,
           success: function(data) {
             $('.filterFete').html(data); 
           }
         });
   });
   
     $( "#mawlid" ).click(function() {
       var value = $("#mawlid").val()
       console.log(value)
       $.ajax({
           type: "POST",
           url: "filterFete.php",
           data: "request="+value ,
           success: function(data) {
             $('.filterFete').html(data); 
           }
         });
   });

   