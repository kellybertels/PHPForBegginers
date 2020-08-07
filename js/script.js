
// alert ('hello from script.js')

$('a.delete').on("click", function(e){
    e.preventDefault();

    if(confirm("Are you sure you want to delete?")){

        var frm = $("<form>");
        frm.attr('method', 'post');
        frm.attr('action', $(this).attr('href'));
        frm.appendTo("body");
        frm.submit();
    }

});


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

   });

});

$('#published_at').datetimepicker();
