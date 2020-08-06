$("#delete-article").on("click", function(e){
    e.preventDefault();
    if(confirm("are you sure?")){
        alert('delete the article');
    }
});