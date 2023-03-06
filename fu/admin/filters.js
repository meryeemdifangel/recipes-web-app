

$("#saisonsAdmin").change(function() {
    
   var value = $("#saisonsAdmin").children("option:selected").val();
    console.log(value)
       $.ajax({
           type: "POST",
           url: "../actions/filterSaisonAdmin.php",
           data: "saisonsAdmin="+value ,
           success: function(data) {
             $('.recetteAdmin').html(data); 
           }
         });
     });
   

     $("#fetesAdmin").change(function() {
    
        var value = $("#fetesAdmin").children("option:selected").val();
        console.log(value)

            $.ajax({
                type: "POST",
                url: "../actions/filterFeteAdmin.php",
                data: "fetesAdmin="+value ,
                success: function(data) {
                  $('.recetteAdmin').html(data); 
                }
              });
          });
        
          
          $("#prenomAdminFilter").change(function() {
            console.log("value");
            var value = $("#prenomAdminFilter").children("option:selected").val();
    console.log(value);
                $.ajax({
                    type: "POST",
                    url: "../actions/filterAgeAdmin.php",
                    data: "prenomAdminFilter="+value ,
                    success: function(data) {
                      $('.userAdmin').html(data); 
                    }
                  });
              });


        

    

      

   

   



   
   


