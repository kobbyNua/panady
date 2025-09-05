$(document).ready(function(){

    // 1. View/Fetch all users and populate the table
    const fetchUsers = () => {
        $.ajax({
            url: 'http://localhost/panady/api/users/fetch-users.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
             //   console.log(response,'okay!!!!!!!!!')
                const result=fetchUserdata(response);
                //console.log(result,'okay!!!!!!!!!')
                $('#usersTableBody').html(result);
                /*console.log(response,'hellooo fine');
                if (response.length>2) {
                    console('okay!!!')
                    let usersTableBody = $('#usersTableBody');
                    usersTableBody.empty(); // Clear existing rows

                    response.forEach((user,index) => {
                        console.log(user[index],'okay')
                        let row = `<tr>
                            <td>${user[index].id}</td>
                            <td>${user[index].full_name }</td>
                            <td>${user[index].username}</td>
                            <td>
                                <button class="btn btn-sm btn-warning edit-btn" 
                                        data-id="${user.id}" 
                                        data-fullname="${user.full_name || ''}" 
                                        data-username="${user.username || ''}"
                                        data-toggle="modal" 
                                        data-target="#editUserModal">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-danger delete-btn" data-id="${user.id}">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>`;
                        usersTableBody.append(row);
                    });
                } else {
                    console.error("Failed to fetch users:", response.message);
                }*/
            },
            error: function(xhr, status, error) {
                console.error("An error occurred:", status, error);
            }
        });
    };

    // Initial fetch of users when the page loads
    fetchUsers();

    const fetchUserdata=(data)=>{
          return data.map((user,index)=>{
           // user[index]+' am heare okay'
            return `<tr>
            <td>${user.id}</td>
            <td>${user.full_name}</td>
            <td>${user.username}</td>
                                 <td>
                                <button class="btn btn-sm btn-warning user-edit-btn" 
                                        id="${user.id}" 
                                       
                                        data-toggle="modal" 
                                        data-target="#editUserModal">
                                    <i class="fas fa-edit"></i> Edit
                                </button>
                                <button class="btn btn-sm btn-danger delete-btn" id="${user.id}">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>      
            </tr> 
            `;
        }).join('')
    }
   $('#usersTableBody').on('click','.user-edit-btn',function(){
        let id=$(this).attr('id');
        $('#editUserId').val(id)
       getUser(id);
    

   })
    // 2. Add a new user
    $('#addUserForm').on('submit', function(e) {
        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: 'http://localhost/panady/api/users/add-user.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    $('#addUserModal').modal('hide');
                    $('#addUserForm')[0].reset();
                    fetchUsers(); // Refresh the table
                    // You might want to use a more modern notification system than alerts.
                    alert('User added successfully!');
                } else {
                    alert('Error: ' + (response.message || 'An unknown error occurred.'));
                }
            },
            error: function(xhr, status, error) {
                console.error("An error occurred while adding user:", status, error);
                alert('An error occurred while adding the user.');
            }
        });
    });

    // 3. Get user data and populate the edit modal
    $('#usersTableBody').on('click', '.edit-btn', function() {
        let userId = $(this).data('id');
        let fullName = $(this).data('fullname');
        let username = $(this).data('username');

        $('#editUserId').val(userId);
        $('#editFullName').val(fullName);
        $('#editUsername').val(username);
    });

    // 4. Edit an existing user
    $('#editUserForm').on('submit', function(e) {
        e.preventDefault();
        let formData = $(this).serialize();

        $.ajax({
            url: 'http://localhost/panady/api/users/edit-user.php',
            type: 'POST',
            data: formData,
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                   // $('#editUserModal').modal('hide');
                   // fetchUsers(); // Refresh the table
                   window.location.reload();
                } else {
                    alert('Error updating user: ' + (response.message || 'An unknown error occurred.'));
                }
            },
            error: function(xhr, status, error) {
                console.error("An error occurred during edit:", status, error);
                alert('An error occurred while updating the user.');
            }
        });
    });
});


let getUser=(id)=>{
   // alert(id);
      $.ajax({
           url:'http://localhost/panady/api/users/get-user.php',
           type:'GET',
           data:{id:id},
           dataType:'json',
           success:function(data){
              //console.log(data,' okay my friend ')
              $('#editFullName').val(data[0].full_name)
              $('#editUsername').val(data[0].username)
           },
           error:function(xhr,status,error){
                console.error("error :", status, error);
           }

      })
}



