
// alert ('hello from script.js')


$.validator.addMethod("dateTime", function(value, element){
    return (value == "") || ! isNaN(Date.parse(value));

},"must be a valid date and time");






$("#formArticle").validate({
    rules:{
        title: {
            required: true
        },
        content:{
            required: true
        },
        published_at:{
            dateTime: true
        }
    }
});

$("#formUser").validate({
    rules:{
        username: {
            required: true
        },
        password:{
            required: true
        },
        confirm_password:{
            required:true
        }
      
    }
});

$("button.publish").on("click", function(e){

    var id = $(this).data('id');
    var button = $(this);
   $.ajax({
        url:'/PHPForBegginers/admin/publish-article.php',
        
        type:'POST',
        data:{id: id}

   })
   .done(function(data){
       button.parent().html(data);

   })
   .fail(function()
   {

    alert("an Error ocurred");
   });

});

$('#published_at').datetimepicker({
    format:'Y-m-d H:i:s'

});

$('#formContact').validate({
rules:{
    email:{
        required:true,
        email:true
    },
    subject:{
        required:true,

    },
    message:{
        required:true,
    }
}


});
$("button.delete").on("click", function(e){
    alert("I am working");


    e.preventDefault();

    if(confirm("Are you sure you want to delete?")){

        var frm = $("<form>");
        frm.attr('method', 'post');
        frm.attr('action', $(this).attr('href'));
        frm.appendTo("body");
        frm.submit();
    }

});




$("button.delete2").on("click", function(e){

    var id = $(this).data('id');
    var button = $(this);
   $.ajax({
        url:'/PHPForBegginers/admin/manage-users.php',
        
        type:'POST',
        data:{id: id}

   })
   .done(function(data){
       button.parent().html(data);

   })
   .fail(function()
   {

    alert("an Error ocurred? - user deleted ");
   });

});

 // Function to check Whether both passwords 
            // is same or not. 


            $("#create").on("click", function(e){
    
                password = form.password.value; 
                confirm_password = form.confirm_password.value; 
  
                // If password not entered 
                if (password == '') 
                    alert ("Please enter Password"); 
                      
                // If confirm password not entered 
                else if (confirm_password == '') 
                    alert ("Please enter confirm password"); 
                      
                // If Not same return False.     
                else if (password != confirm_password) { 
                    alert ("\nPassword did not match: Please try again...") 
                    return false; 
                } 
  
                // If same return True. 
                else{ 
                    alert("Password Match: Welcome to GeeksforGeeks!") 
                    return true; 
                } 
            });
             

            $('#formUser').validate({
                rules:{
                    username:{
                        required:true,
                        email:true
                    },
                    password:{
                        required:true,
                
                    },
                    confirm_password:{
                        required:true,
                    }
                }
            });