$(document).ready(function(){
   $("#login_form").validate({
      rules: {
         username: {
            required: true
               }
         },
         messages: {
        	 username: "Required Field"
         }
     });
});

