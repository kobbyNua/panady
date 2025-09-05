//add article selectbox box to the add conetnt model only show it while article is selected from the page


    $(document).ready(function(){
      $('#selectedArticleField').hide()
      $('#aticlesele').attr('disabled',true)

      $('#editSelectedArticleField').hide()
      $('#editAticlesele').attr('disabled',true)
      $('#category').change(function(e){
          e.preventDefault()
          let results=displayArticle(this);
          articeFileds(results)
      })

      /*$('#editCategory').change(function(e){
          e.preventDefault()
          let results=displayArticle(this);
          articeFileds(results)
      })*/
})

const articeFileds=(results)=>{
          if(results=='articles'.toUpperCase()){
                    $('#selectedArticleField').show()
                    $('#aticlesele').attr('disabled',false)
          }
          else{
                     $('#selectedArticleField').hide()
                     $('#aticlesele').attr('disabled',true)
          }
}

$(document).ready(function(){
      $('#addContentForm').submit(function(e){
           e.preventDefault()
           let opti=document.getElementById('aticlesele')
        //console.log(this,'alright ')
           let optionValue="";
           (opti.disabled==true)?optionValue="":optionValue=opti.value
           let banners=document.getElementById('banner')
           let bannerValue='';

           (banners.checked==true)?bannerValue='1':bannerValue='0';
           //console.log(banners.checked)
           let data=JSON.stringify({title:$('#title').val(),category:$('#category').val(),photo:$('#photo').val(),banner:bannerValue,content:$('#content').val(),'article_types':optionValue})
          // console.log(data)
           let form_data=new FormData(this)
          // console.log('hello ',form_data)
          //form_data.append(data,this)
           //console.log(form_data);
           //console.log(JSON.stringify({$(this).serialize()}))
           //console.log(form_data);
           //console.log()
           $.ajax({
               url:'http://localhost/panady/api/content/add-contents.php',
               data:form_data,
               type:'POST',
               dataType:'json',
               contentType:false,
               processData:false,
               success:function(data){
                   console.log(data)
                   window.location.reload()
               }
           })
      })
})


function displayArticle(sel){
     let res=sel.options[sel.selectedIndex].text
     return res
    // console.log(res)
}


window.onload=(function(){
       $.ajax({
           url:'http://localhost/panady/api/content/fetch-content.php',
           dataType:'json',
           type:'GET',
           success:function(data){
               console.log(data)
               // The API likely returns an object like { "data": [...] }, so we pass data.data to the contents function.
              let result=contents(data.success)
              $('#contentTableData').html(result)
             // for(let index=)
           }
       })
   }
());


const contents=(data)=>{
     return data.map((items)=>{
          return `<tr>
                  <td>${items.id}</td> 
                  <td>${items.title}</td> 
                  <td>${items.category_name}</td> 
                                          <td>
                            <button class="btn btn-sm btn-info editContentinfos" data-toggle="modal" data-target="#editContent" id="${items.id}" >Edit</button>
                            <button class="btn btn-sm btn-danger editContentImage" data-toggle="modal" data-target="#viewContentPhotoModal" id="${items.id}" ><i class="fa fa-photo"></i>photo</button>
                            <button class=btn btn-sm btn-info updateContentImage" data-toggle="modal" data-target="#editContentPhotoModal" id="${items.id}" ><i class="fa fa-photo"></i>photo</button>
                            
                        </td>
           </tr>`
     }).join('')
}

//not done
$('#tableConteData').on('click','.editContentinfos',function(e){
      e.preventDefault();
      $('#editContentId').val($(this).attr('id'))
      //alert($(this).attr('id'))
      $.ajax({
           url:'http://localhost/panady/api/content/get-content.php',
           type:'GET',
           data:{id:$(this).attr('id')},
           dataType:'JSON',
           success:function(data){
              // console.log(data,'hii')
               $('#editTitle').val(data[0].title) 
               //console.log('results', data[0].categories_id)
               $('#editCategory option[value='+data[0].categories_id+']').prop('selected',true)

               $('#editContentText').val(data[0].content) 
               let cate=getCategory(data[0].categories_id);
               if(data[0].banner === 1){
                    $('#editBanner').prop('checked',true)
               }else{
                    $('#editBanner').prop('checked',false)
               }
           }
      })
})


const getCategory=(id)=>{
    let result="";
        $.ajax({
        url:'http://localhost/panady/api/category/get-category.php',
        type:'GET',
        data:{id:id},
        dataType:'json',
        success:function(data){
            if(data.data.toLowerCase()=='articles'){
                displayArticlefiles();
            }else{
                hideArticlefiles();
            }
        }
})
    //console.log(result,' final')

        };
const resultCat=(data)=>{
     return data;
}
const displayArticlefiles=()=>{
     
      $('#editSelectedArticleField').show()
      $('#editAticlesele').attr('disabled',false)
      
}
const hideArticlefiles=()=>{
     
      $('#editSelectedArticleField').hide()
      $('#editAticlesele').attr('disabled',true)
}
$('#tableConteData').on('click','.editContentImage',function(e){
      e.preventDefault();
      //alert($(this).attr('id'))
      $.ajax({
           url:'http://localhost/panady/api/content/get-content.php',
           type:'GET',
           data:{id:$(this).attr('id')},
           dataType:'JSON',
           success:function(data){}
        })
    }) 
    //submit cont for updates

    $('#editContentForm').submit(function(e){
      e.preventDefault()
      $.ajax({
          url:'http://localhost/panady/api/content/edit-content.php',
          type:'POST',
          data:$(this).serialize(),
          dataType:'json',
          success:function(data){
              console.log(data)
              window.location.reload()

          }
      })
  })


  //
$('#tableConteData'). on('click','.editContentImage',function(e){
       let id=$(this).attr('id')
       $.ajax({
           url:"http://localhost/panady/api/content/get-content.php",
           type:'GET',
           data:{id:id},
           dataType:'json',
           success:function(data){
               //console.log(data[0])
               $("#viewContentPhotoImg").attr('src','http://localhost/panady/uploads/'+data[0].photo)

           }
       })
})
  

$('#tableConteData').on('click','.updateContentImage',function(e){
    e.preventDefault()
    let id=$(this).attr('id')
    $.ajax({

           url:"http://localhost/panady/api/content/get-content.php",
           type:'GET',
           data:{id:id},
           dataType:'json',
           success:function(data){
            console.log(data[0])
            $('#editContentPhotoId').val(data[0].id)
            alert(data[0].id)
               //console.log(data[0])
           //  $("#viewContentPhotoImg").attr('src','http://localhost/panady/uploads/'+data[0].photo)

           }
       


    })
})


$(document).ready(function(){
      $('#editContentPhotoForm').submit(function(e){
        e.preventDefault()
        let form_data = new FormData(this);
           $.ajax({
               url:'http://localhost/panady/api/content/update-image.php',
               data:form_data,
               type:'POST',
               dataType:'json',
               contentType:false,
               processData:false,
               success:function(data){
                   console.log(data)
                   window.location.reload()
               }
           })
        })
})
