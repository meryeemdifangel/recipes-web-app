

   $("#caloriesFilter").on( "change", function( event ) {
    console.log(document.getElementById("caloriesFilter").value)
    document.getElementById("selectedCalories").innerHTML=" less then " +document.getElementById("caloriesFilter").value;  
  });
  $("#cookingTimeFilter").on( "change", function( event ) {
    document.getElementById("selectedCookingTime").innerHTML=" less then " +document.getElementById("cookingTimeFilter").value; 
  });
  $("#preparationTimeFilter").on( "change", function( event ) {
    document.getElementById("selectedPreparationTime").innerHTML=" less then " +document.getElementById("preparationTimeFilter").value;
  });

  $("#restTimeFilter").on( "change", function( event ) {
    document.getElementById("selectedRestTime").innerHTML=" less then " +document.getElementById("restTimeFilter").value;
  });

  $("#totalTimeFilter").on( "change", function( event ) {
    document.getElementById("selectedTotalTime").innerHTML=" less then " +document.getElementById("totalTimeFilter").value;
  });

  $("#notationFilter").on( "change", function( event ) {
    document.getElementById("selectedNotation").innerHTML=" " +document.getElementById("notationFilter").value;
  });

  $("#filterBtnTry").click(function(e) {
  e.preventDefault();
  var valueSeason = $("input[type=checkbox]:checked").val();
  var valueCooking = $("#cookingTimeFilter").val();
  var valuePreparation = $("#preparationTimeFilter").val();
  var valueRest = $("#restTimeFilter").val();
  var valueTotal = $("#totalTimeFilter").val();
var valueCalories= $("#caloriesFilter").val();
var valueNotation = $("#notationFilter").val();
var valueOrder = $("#order").val();
console.log(valueOrder);

  $.ajax({
        type: "POST",
        url: "../filterCategoryPage.php",
        data: {filterSaison:valueSeason ,cookingTimeFilter:valueCooking , preparationTimeFilter:valuePreparation , restTimeFilter:valueRest ,totalTimeFilter:valueTotal,  caloriesFilter:valueCalories , filterNotation:valueNotation,order:valueOrder},
        success: function(data) {
          $('.filterMeryem').html(data); 
        }
      });

   
   });




$("#summerS").click(function() {
 var value = $("#summerS").val();
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

  $( "#autumnS" ).click(function() {
    var value = $("#autumnS").val()
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

   $( "#marriage" ).click(function() {
    var value = $("#marriage").val()
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
   

$( "#achoura" ).click(function() {
    var value = $("#achoura").val()
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

$( "#noteRecipeBtn").click(function(e) {
    e.preventDefault();
    var value = $("#rangeNote").val();
    var idM = $("#noteRecipeBtn").attr("name");
    console.log(value) ;
    console.log(idM) ;
    $.ajax({
        type: "POST",
        url: "../noteRecipe.php",
        data: {idd: idM,note:value} ,
        success: function(data) {
          $('.filterFete').html(data); 
        }
     });

     console.log("idM") ;

});
