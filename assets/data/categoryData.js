import {addCategory} from "../configs/category.js";
import {catagorieResults,categoryOption} from "../configs/category.js";

$(document).ready(function(){
    //fetchCategoriesData();
    
    /*document.getElementById('addCategoryForm').addEventListener('submit',async ()=>{
        e.preventDefault();
        //console.log($('#addCategoryForm').serialize())
        let data =await addCategory();
        if(data.status==='success'){
             $().html()
             window.location.reload();
        }
        //fetchCategoriesData();
        //document.getElementById('addCategoryForm').reset();
    });*/
    $('#addCategoryForm').submit(async (e)=>{
       
        e.preventDefault();
       /* console.log("from page",$('#categoryName').val())
        let data =await addCategory({category_name:$('#categoryName').val()});
         
        if(data.status==='success'){
             //$('#categoriesTableData').html('');
             window.location.reload();
        }*/
       $.ajax({
            url:"http://localhost/panady/api/category/add-category.php",
            method:"POST",
            data:{"category_name":$('#categoryName').val()},
            dataType:"json",
           // content-type:"application/json",
            success:function(data){
                if(data.status==='success'){
                    //$('#categoriesTableData').html('');
                    window.location.reload();
               }
            }
       })
    })
})

window.onload=(function(){
    //alert('hello World')
    $.ajax({
        url:"http://localhost/panady/api/category/fetch-category.php",
        method:"GET",
        dataType:"json",
        success:function(data){
            //console.log(' helloo ',data);
            let result=catagorieResults(data);
            let cat=categoryOption(data)
           // console.log(cat)
            $('#categoriesTableData').html(result);
            $('#category').append(cat)
            $('#editCategory').append(cat)
        }
    });
}())


$('#categoriesTable').on('click','.editCategory',async function(){
   $('#editCategoryForm #editCategoryId').val(this.id);
   $.ajax({
        url:"http://localhost/panady/api/category/get-category.php",
        method:"GET",
        data:{"id":this.id},
        dataType:"json",
        success:function(data){
            console.log(data.data);
            $('#editCategoryForm #editCategoryName').val(data.data.toUpperCase());
        }
   })
    
})

$(document).ready(function(){
    $('#editCategoryForm').submit(async (e)=>{
        e.preventDefault();
       // console.log($('#editCategoryForm').serialize())
        $.ajax({
            url:"http://localhost/panady/api/category/edit-category.php",
            method:"POST",
            data:{"id":$('#editCategoryId').val(),"category_name":$('#editCategoryName').val()},
            dataType:"json",
           // content-type:"application/json",
            success:function(data){
                if(data.status==='success'){
                    //$('#categoriesTableData').html('');
                    window.location.reload();
               }
            }
       })
    });
})