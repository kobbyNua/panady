
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
    const articleTypeName=$("#articleTypeName").val();
    console.log(articleTypeName);
    $.ajax({
        url:'http://localhost/panady/api/article/articles-types/add-articles-types.php',
        type:'POST',

        data:{article_type_name:articleTypeName},
        dataType:'json',
        success:function(data){
           // const res=JSON.parse(response);
            if(data.status==='success'){
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

window.onload=(function(){

    $.ajax({
        url:'http://localhost/panady/api/article/articles-types/fetch-articles-types.php',
        type:'GET',
        dataType:'json',
        success:function(data){
           // const res=JSON.parse(response);
            console.log(data);
            if(data.length>0){
                let results=fetchArticleTypes(data);
                let options=articlesOption(data)
                $('#articleTypesTableData').html(results)
                $("#aticlesele").html(options)
                $("#editAticlesele").html(options)
            }
        },
        error:function(){
          //  alert('An error occurred while fetching article types.');
        }
    });
}())


const fetchArticleTypes=(data)=>{
      
       return data.map((item)=>{
        return `<tr>
            <td>${item.id}</td>
            <td>${item.types.toUpperCase()}</td>
            <td>
                <button class="btn btn-primary btn-sm edit-article-type-btn" data-id="${item.id}" data-type-name="${item.type_name}" data-toggle="modal" data-target="#editArticleTypeModal">Edit</button>
                <!--<button class="btn btn-danger btn-sm delete-article-type-btn" data-id="${item.id}">Delete</button>-->
            </td>
        </tr>`;
        //articleTypesTable
        
       }).join('');
}

const articlesOption=(data)=>{

    return data.map((item)=>{
         return `<option value="${item.id}">${item.types.toUpperCase()}</option>`
    }).join('')
}

//get article type by id
$('#articleTypesTable').on('click','.edit-article-type-btn',function(){
    const id=$(this).data('id');
   // const typeName=$(this).data('type-name');
    $('#editArticleTypeForm #editArticleTypeId').val(id);
    //$('#editArticleTypeForm #editArticleTypeName').val(typeName);
    $.ajax({
        url:'http://localhost/panady/api/article/articles-types/get-articles-types.php',
        type:'GET',
        data:{id:id},
        dataType:'json',
        success:function(data){
            //const res=JSON.parse(response);
            console.log(data);
            $('#editArticleTypeForm #editArticleTypeName').val(data.data.toUpperCase());
        }
    });
})

$('#editArticleTypeForm').submit(function(e){
    e.preventDefault();
    const id=$('#editArticleTypeId').val();
    const typeName=$('#editArticleTypeName').val().trim();
    if(typeName===''){
        alert('Article type name is required');
        return;
    }
    $.ajax({
        url:'http://localhost/panady/api/article/articles-types/edit-articles-types.php',
        type:'POST',
        data:{id:id,article_type_name:typeName},
        dataType:'json',
        //content-type:"application/json",
        success:function(data){
           // const res=JSON.parse(response);
            if(data.status==='success'){
                /*alert(res.message);
                $("#editArticleTypeModal").modal('hide');
                $("#editArticleTypeForm")[0].reset();
                fetchArticleTypes();*/
                window.location.reload();
            }
        },
        error:function(){
          //  alert('An error occurred while updating the article type.');
        }
    });
})