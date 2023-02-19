var base_url="https://app.linkera.com/platform/";
// ************add user************
$(document).ready(function(){

    $('#contact_form').on('submit', function(event){
     event.preventDefault();
     $.ajax({
      url:base_url+"users/addUser",
      method:"POST",
      data:$(this).serialize(),
      dataType:"json",
      beforeSend:function(){
       $('#contact').attr('disabled', 'disabled');
       $('#success_message').addClass("hide");     
       $('#error_message').addClass("hide");     
      $('#progress').removeClass("hide");    
      },
      success:function(data)
      {
        
       if(data.error)
       {
        if(data.error_message != '')
        {
         $('#error_message').html(data.error_message);
        }
        else
        {
         $('#error_message').html('');
        }

        if(data.user_firstname_error != '')
        {
         $('#user_firstname_error').html(data.user_firstname_error);
        }
        else
        {
         $('#user_firstname_error').html('');
        }
        
        if(data.user_lastname_error != '')
        {
         $('#user_lastname_error').html(data.user_lastname_error);
        }
        else
        {
         $('#user_lastname_error').html('');
        }
   
        if(data.user_email_error != '')
        {
         $('#user_email_error').html(data.user_email_error);
        }
        else
        {
         $('#user_email_error').html('');
        }
   
        if(data.user_phonenumber_error != '')
        {
         $('#user_phonenumber_error').html(data.user_phonenumber_error);
        }
        else
        {
         $('#user_phonenumber_error').html('');
        }
   
        if(data.user_password_error != '')
        {
         $('#user_password_error').html(data.user_password_error);
        }
        else
        {
         $('#user_password_error').html('');
        }
   
        if(data.confirm_user_password_error != '')
        {
         $('#confirm_user_password_error').html(data.confirm_user_password_error);
        }
        else
        {
         $('#confirm_user_password_error').html('');
        }
   
        if(data.fk_status_id_error != '')
        {
         $('#fk_status_id_error').html(data.fk_status_id_error);
        }
        else
        {
         $('#fk_status_id_error').html('');
        }
   
        if(data.fk_type_id_error != '')
        {
         $('#fk_type_id_error').html(data.fk_type_id_error);
        }
        else
        {
         $('#fk_type_id_error').html('');
        }
        
        $('#error_message').removeClass("hide");   

       
       }
       if(data.success)
       {
        $('#success_message').html(data.success);
        $('#user_firstname_error').html('');
        $('#user_lastname_error').html('');
        $('#user_email_error').html('');
        $('#user_phonenumber_error').html('');
        $('#user_password_error').html('');
        $('#confirm_user_password_error').html('');
        $('#fk_status_id_error').html('');
        $('#fk_type_id_error').html('');
        $('#contact_form')[0].reset();
        //window.location.reload();
        //setTimeout(location.reload(), 8000);
        //$('#error_message').attr('disabled', true);
        $('#success_message').removeClass("hide");   

       }
       
      },
      complete:function(data){
        $('#progress').addClass("hide");
        $('#contact').attr('disabled', false);
      }
     })
    });
   
   });
  //  ****************Edit User***************
  
$(document).ready(function(){
    $('#edit_form').on('submit', function(event){
     event.preventDefault();
     $.ajax({
      url:base_url+"users/update",
      method:"POST",
      data:$(this).serialize(),
      dataType:"json",
      beforeSend:function(){
       $('#contact').attr('disabled', 'disabled');
       $('#success_message').addClass("hide");     
       $('#error_message').addClass("hide");     
       $('#progress').removeClass("hide");  
      },
      success:function(data)
      {
        
       if(data.error)
       {
        if(data.error_message != '')
        {
         $('#error_message').html(data.error_message);
        }
        else
        {
         $('#error_message').html('');
        }
        if(data.user_firstname_error != '')
        {
         $('#user_firstname_error').html(data.user_firstname_error);
        }
        else
        {
         $('#user_firstname_error').html('');
        }
        
        if(data.user_lastname_error != '')
        {
         $('#user_lastname_error').html(data.user_lastname_error);
        }
        else
        {
         $('#user_lastname_error').html('');
        }
   
        if(data.user_email_error != '')
        {
         $('#user_email_error').html(data.user_email_error);
        }
        else
        {
         $('#user_email_error').html('');
        }
   
        if(data.user_phonenumber_error != '')
        {
         $('#user_phonenumber_error').html(data.user_phonenumber_error);
        }
        else
        {
         $('#user_phonenumber_error').html('');
        }
   
   
        if(data.fk_status_id_error != '')
        {
         $('#fk_status_id_error').html(data.fk_status_id_error);
        }
        else
        {
         $('#fk_status_id_error').html('');
        }
   
        if(data.fk_type_id_error != '')
        {
         $('#fk_type_id_error').html(data.fk_type_id_error);
        }
        else
        {
         $('#fk_type_id_error').html('');
        }
        $('#error_message').removeClass("hide"); 
        
       
       }
       if(data.success)
       {
        $('#success_message').html(data.success);
        $('#user_firstname_error').html('');
        $('#user_lastname_error').html('');
        $('#user_email_error').html('');
        $('#user_phonenumber_error').html('');
        $('#fk_status_id_error').html('');
        $('#fk_type_id_error').html('');
        
        $('#success_message').removeClass("hide");
       }
       
      },
      complete:function(data){
        $('#progress').addClass("hide");
        $('#contact').attr('disabled', false);
      }
     })
    });
   
   });
   // ****************DataTable***************
$(document).ready(function () {
  $('#users_table').DataTable({
    "language": { "url": base_url+"template/assets/datatables.json" },
    //"dom":"Bfrtlip",

  });
  
});