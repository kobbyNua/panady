//view Team Members

$(document).ready(function(){
    $.ajax({
        url: 'http://localhost/panady/api/team/fetch-team.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            console.log(response)
            if (response.data && Array.isArray(response.data)) {
                const teamData = response.data;
                const tableBody = $('#temmembersdet');

                // Clear existing rows before populating
                tableBody.empty();

                // Use .map() to create table rows from the data
                const rows = teamData.map(member => {
                    // The database column is `name`, not `full_name`
                    return `<tr>
                                <td>${member.full_name}</td>
                                <td>${member.role}</td>
                                <td>
                                 <button class="btn btn-sm btn-info editTeamDetail" data-toggle="modal" data-target="#editTeam" id="${member.id}">Edit</button>
                                 <button class="btn btn-sm btn-primary viewTeamImage" data-toggle="modal" data-target="#viewTeamPhotoModal" id="${member.id}"><i class="fa fa-photo"></i> Photo</button>
                                  <button class="btn btn-sm btn-info editTeamImage" data-toggle="modal" data-target="#updateTeamPhotoModal" id="${member.id}" ><i class="fa fa-photo"></i>photo</button>
                            
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

    $('#temmembersdet').on('click', '.editTeamDetail', function() {
        const memberId = $(this).attr('id');
        getTeamMemberById(memberId);
    });

    $('#temmembersdet').on('click', '.viewTeamImage', function() {
        const memberId = $(this).attr('id');
        viewTeamMemberPhoto(memberId);
    });

        $('#temmembersdet').on('click', '.editTeamImage', function() {
        const memberId = $(this).attr('id');
        $('#updateTeamImageId').val(memberId);
        //viewTeamMemberPhoto(memberId);
    });
});



function getTeamMemberById(memberId) {
    $.ajax({
        url: 'http://localhost/panady/api/team/get-team.php', // Path to your PHP file
        type: 'GET',
        dataType: 'json',
        data: { id: memberId }, // Action to retrieve a specific team member by ID
        success: function(response) {
            console.log('hello ',response)
            if (response.data[0]) {
                const teamMember = response;
                $("#editTeamId").val(teamMember.data[0].id);
                $("#editFullname").val(teamMember.data[0].full_name)
                $("#editRole").val(teamMember.data[0].role)
                
                // Process the teamMember here, e.g., display it on the page
                console.log("Team member retrieved successfully:", teamMember);
            } else {
                console.error("Error retrieving team member:", response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX error:", status, error);
        }
    });

}


function updateTeamMember(data){
        $.ajax({
            url: 'http://localhost/panady/api/team/update-team.php', // Path to your PHP file
            type: 'POST',
            dataType: 'json',
            data: data, // Action to retrieve a specific team member by ID
            success: function(response) {
                   console.log(response)
                   window.location.reload();
                
            },
        error: function(xhr, status, error) {
            console.error("AJAX error:", status, error);
        }
    });


}


function viewTeamMemberPhoto(member_id){
    $.ajax({
        url: 'http://localhost/panady/api/team/get-team.php',
        type: 'GET',
        dataType: 'json',
        data: { id: member_id },
        success: function(response) {
            // Check if data exists and has at least one member with a photo
            if (response && response.data && response.data.length > 0 && response.data[0].photo) {
                const photoUrl = "http://localhost/panady/uploads/" + response.data[0].photo;
                // Set the src attribute of the image in the modal
                $('#viewPhotoImage').attr('src', photoUrl);
            } else {
                console.error("Could not find photo for member:", response.message || "No data returned");
                // Optionally, set a placeholder image if the photo is not found
                $('#viewPhotoImage').attr('src', 'assets/images/placeholder.png'); // Make sure you have a placeholder image at this path
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX error fetching team photo:", status, error);
        }
    });
}

function updateTeamMemberPhoto(data){
      $.ajax({
          url:'http://localhost/panady/api/team/update-team-photo.php',
          dataType:'json',
          data:data,
          type:'POST',
          contentType: false,
          processData: false,
          success:function(response){
            window.location.reload();
          },
          error: function(xhr, status, error) {
            console.error("AJAX error:", status, error);
        }
      })
}

$('#editTeamForm').submit(function(e) {
    e.preventDefault();
    //const formData = new FormData(this);
    updateTeamMember($(this).serialize());
});


$('#addTeamForm').submit(function(e){
      e.preventDefault();
      var formData = new FormData(this);
      console.log(formData)
      addTeamMember(formData);
})

$('#updateTeamImageForm').submit(function(e){
    e.preventDefault();
    var formData = new FormData(this);
    updateTeamMemberPhoto(formData);
})

function addTeamMember(data) {
    $.ajax({
        url: 'http://localhost/panady/api/team/add-team.php', // Path to your PHP file for adding team members
        type: 'POST',
        dataType: 'json',
        data: data, // Data for the new team member
        contentType:false,
        processData:false,
        success: function(response) {
            if (response.success) {
                console.log("Team member added successfully:", response.message);
                window.location.reload(); // Reload to see the new member
            } else {
                console.error("Error adding team member:", response.message);
            }
        },
        error: function(xhr, status, error) {
            console.error("AJAX error:", status, error);
        }
    });
}
