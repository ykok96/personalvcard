function sendMail(){
    console.log("test")
    var name = $("#name").val();
    var email = $("#email").val();
    var subject = $("#subject").val();
    var message = $("#txtmessage").val();
    
    console.log(name)
    console.log(email)
    if((name == "") || (email == "") || (subject == "") || (message == "") || (email.indexOf("@") == -1) || (email.indexOf(".") == -1)) {
        return;
          }
    else {
      $.ajax({
        type: "POST",
        url: "php/mailme.php",
        data: "name="+name+"&email="+email+"&subject="+subject+"&message="+message,
        success: function(html){

        var text = $(html).text();
            //Pulls hidden div that includes "true" in the success response
            var response = text.slice(1,6);
            console.log(response);
          if(response == "Thank"){

     $('#submit').hide();
    $("#message").html(html);
   }
  else {
   $("#message").html(html);
   $('#submit').show();
   }
        },
        beforeSend: function()
        {
          $('#submit').hide();
          $("#message").html('<div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div>')
        }
      });
    }
    return false;
}
