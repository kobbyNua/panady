$(document).ready(function(){
    $.ajax({
        url: 'http://localhost/panady/api/media/fetch-media.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log(response)
            if (response.success && Array.isArray(response.success)) {
                const teamData = response.success;
                const tableBody = $('#mediaTableBody');

                // Clear existing rows before populating
                tableBody.empty();

                // Use .map() to create table rows from the data
                const rows = teamData.map(member => {
                    // The database column is `name`, not `full_name`
                    return `<tr>
                                <td>${member.caption}</td>
                                <td>${member.file_type}</td>
                                <td>
                                
                                 <button class="btn btn-sm btn-info editMediaCaption" data-toggle="modal" data-target="#editMediaCaptionModal" id="${member.id}">Edit</button>
                                 <button class="btn btn-sm btn-primary editMediaFile" data-toggle="modal" data-target="#editMediaFileModal" id="${member.id}"><i class="fa fa-photo"></i> Photo</button>
                                  <!--<button class="btn btn-sm btn-info editTeamImage" data-toggle="modal" data-target="#updateTeamPhotoModal" id="${member.id}" ><i class="fa fa-photo"></i>photo</button>
                                 -->
                                </td>
                            </tr>`;
                });

                tableBody.html(rows.join(''));
            } else {
                console.error("Failed to fetch team data:", response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX error:", status, error);
        }
    });

    $('#mediaTableBody').on('click', '.editMediaCaption', function() {
      
        const mediaId = $(this).attr('id');
        
        getMedialCaptionDetail(mediaId);
       // getTeamMemberById(memberId);
    });

   /* $('#temmembersdet').on('click', '.viewTeamImage', function() {
        const mediaId = $(this).attr('id');
       // viewTeamMemberPhoto(memberId);
    });*/

    $('#mediaTableBody').on('click', '.editMediaFile', function() {
           const mediaId = $(this).attr('id');
          // alert(mediaId)
           getMedialCaptionDetail(mediaId);
        //$('#updateTeamImageId').val(memberId);
        //viewTeamMemberPhoto(memberId);
    });
});


$('#addMediaForm').submit(function(e){
      e.preventDefault();
      mediaUpload(new FormData(this));


})


const mediaUpload=(data)=>{
      $.ajax({
           url: 'http://localhost/panady/api/media/add-media.php',
           type: 'POST',
           data: data,
           processData: false,
           contentType: false,
           success: function(response) {
               console.log(response);
              // window.location.reload();
           },
           error:function(xhr,status,error){
               console.log(xhr,status,error);
           }
      })
}


const getMedialDetail=(id)=>{
      $.ajax({
           url: 'http://localhost/panady/api/media/get-media.php',
           type: 'GET',
           dataType: 'json',
           data: {id:id},
           success: function(response) {

               console.log(response);
               $('#mediaphoto').attr('src',"http://localhost/panady/uploads/"+response.success[0].file_name)
               $('#editMediaCaption ').val(response.success[0].caption)
               $('#editMediaId').val(response.success[0].id)


              
           },
           error:function(xhr,status,error){
               console.log(xhr,status,error);
           }
      })
}

const getMedialCaptionDetail=(id)=>{
      $.ajax({
           url: 'http://localhost/panady/api/media/get-media.php',
           type: 'GET',
           dataType: 'json',
           data: {id:id},
           success: function(response) {

               console.log(response);
               $('#mediaphotos').attr('src',"http://localhost/panady/uploads/"+response.success[0].file_name)
               //$('#editMediaCaptions').val(response.success[0].caption)
               $('#editMediaFileId').val(response.success[0].id)


              
           },
           error:function(xhr,status,error){
               console.log(xhr,status,error);
           }
      })
}
$('#editMediaCaptionForm').submit(function(e){
      e.preventDefault();
      editCaption($(this).serialize());


})

const editCaption=(data)=>{
      $.ajax({
          url: 'http://localhost/panady/api/media/edit-media-caption.php',
          type: 'POST',
          data: data,
          
          dataType: 'json',
          success: function(response) {
                 //console.log(response) 
              window.location.reload();

          },
          error:function(xhr,status,error){
               console.log(xhr,status,error);
           }
      
      })

}
$('#editMediaFileForm').submit(function(e){
      e.preventDefault();
      console.log(this)
      editMediaFiles(new FormData(this));


});
const editMediaFiles=(data)=>{
      $.ajax({
          url: 'http://localhost/panady/api/media/edit-media-photo.php',
          type: 'POST',
          data: data,
          dataType: 'json',
          processData: false,
          contentType: false,
          success: function(response) {
                 //console.log(response) 
              window.location.reload();

          },
          error:function(xhr,status,error){
               console.log(xhr,status,error);
           }
      
      })

}