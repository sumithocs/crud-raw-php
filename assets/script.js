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
   
   
   $('.ele-view').on("click", function(){	  
       var student_id = $(this).attr('student_id');
           $.ajax({
                type: "POST",
                url: 'http://localhost/auth/student_handler.php',
                dataType:'json',
                data: {
                    student_id:student_id,
                    action:'view'
                },
                success: function(result) {
                    if(result.status=='success'){
                    	var html;                    	
                		html += '<div>';
                		html += '<p>'+result.data['fname']+'</p>';
                		html += '<p>'+result.data['lname']+'</p>';
                		html += '<p>'+result.data['coursename']+'</p>';
                		html += '<p><img width="250" src="photos/'+result.data['photo']+'"/></p>';
                		html += '</div>';
                		$('#div_student_detail').html(html);
                		$('#div_student_detail').bPopup();
                    }else{
                    	alert(result.msg);
                    }
                }
            });
    });
});

