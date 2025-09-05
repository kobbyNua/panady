
/**
 * article types
 */

//suubmit a request to get all article types
$("#addArticleTypeForm").submit(function(e){
    e.preventDefault();

    /*const articleTypeName=$("#articleTypeName").val().trim();
    if(articleTypeName===''){
        alert('Article type name is required');
        return;
    }*/
    const articleTypeName=$("#type_name").val().trim();
    $.ajax({
        url:'http://localhost/panady/api/article/articles-types/articles-types.php',
        type:'POST',
        data:{article_type_name:articleTypeName},
        success:function(data){
           // const res=JSON.parse(response);
            if(res.status==='success'){
                /*alert(res.message);
                $("#addArticleTypeModal").modal('hide');
                $("#addArticleTypeForm")[0].reset();
                fetchArticleTypes();*/
                window.location.reload();
            }
        },
        error:function(){
          //  alert('An error occurred while adding the article type.');
        }
    });
})