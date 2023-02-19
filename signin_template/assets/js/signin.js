$(document).ready(function(){
     
    $("#submit").on("click",function(e){
        e.preventDefault();
       $.ajax({
            type: 'POST',
            url: base_url+"connect/signin",
            dataType:"JSON",
            data: $('#signin').serialize(),
            success: function(data){
            if(data.process == 1)
                {
                    window.location.replace(base_url+"dashboard");
                }
                else
                {
                    toastr["error"]("Invalid parameters!")
                }
            }          
         });     
    });  
});

