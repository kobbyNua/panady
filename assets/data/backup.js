    $(document).ready(function(){
    // --- Helper Functions ---

    // Toggles the visibility of article-specific fields in forms
    const toggleArticleFields = (selectedText, formType = 'add') => {
        const field = formType === 'add' ? $('#selectedArticleField') : $('#editSelectedArticleField');
        const select = formType === 'add' ? $('#aticlesele') : $('#editAticlesele');

        if (selectedText.toLowerCase() === 'articles') {
            field.show();
            select.prop('disabled', false);
        } else {
            field.hide();
            select.prop('disabled', true);
        }
    };

    // Renders the content table rows from data
    const renderContentsTable = (data) => {
        if (!data || data.length === 0) {
            return '<tr><td colspan="4" class="text-center">No content found.</td></tr>';
        }
        return data.map((item) => {
            // FIX: Added missing quote before class attribute. Using data-id is better practice.
            return `<tr>
                <td>${item.id}</td> 
                <td>${item.title}</td> 
                <td>${item.category_name}</td> 
                <td>
                    <button class="btn btn-sm btn-info editContentinfos" data-toggle="modal" data-target="#editContent" data-id="${item.id}">Edit</button>
                    <button class="btn btn-sm btn-secondary viewContentImage" data-toggle="modal" data-target="#viewContentPhotoModal" data-id="${item.id}"><i class="fa fa-photo"></i> View</button>
                    <button class="btn btn-sm btn-primary updateContentImage" data-toggle="modal" data-target="#editContentPhotoModal" data-id="${item.id}"><i class="fa fa-edit"></i> Update Photo</button>
                </td>
            </tr>`;
        }).join('');
    };

    // Fetches content from the API and populates the table
    const fetchContents = () => {
        $.ajax({
            url: 'http://localhost/panady/api/content/fetch-content.php',
            dataType: 'json',
            type: 'GET',
            success: function(data) {
                const tableHtml = renderContentsTable(data);
                $('#contentTableData').html(tableHtml);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error fetching content:", textStatus, errorThrown);
                console.error("Server Response:", jqXHR.responseText);
                $('#contentTableData').html('<tr><td colspan="4" class="text-center text-danger">Error loading content. Check console.</td></tr>');
            }
        });
    };

    // --- Initial Load & Setup ---
    toggleArticleFields('', 'add');
    toggleArticleFields('', 'edit');
    fetchContents();

    // --- Event Handlers ---

    // Toggle article fields on category change for both forms
    $('#category').change(function() {
        toggleArticleFields($(this).find('option:selected').text(), 'add');
    });
    $('#editCategory').change(function() {
        toggleArticleFields($(this).find('option:selected').text(), 'edit');
    });

    // --- Form Submissions ---

    // Handle the photo update form submission
    $('#editContentPhotoForm').submit(function(e) {
        e.preventDefault();
        
        // FIX: Use FormData for file uploads. .serialize() does not work for files.
        const formData = new FormData(this);

        $.ajax({
            // FIX: Point to the correct API endpoint
            url: 'http://localhost/panady/api/content/update-content-photo.php',
            data: formData,
            type: 'POST',
            dataType: 'json',
            contentType: false, // Required for FormData
            processData: false, // Required for FormData
            success: function(response) {
                if (response.status === 'success') {
                    alert('Photo updated successfully!');
                    $('#editContentPhotoModal').modal('hide');
                    fetchContents(); // Refresh the table
                } else {
                    alert('Error: ' + (response.message || 'An unknown error occurred.'));
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error updating photo:", textStatus, errorThrown);
                // This will show the exact server output, which is key to solving the parsererror
                console.error("Server Response:", jqXHR.responseText); 
                alert('A server error occurred while updating the photo. Check the console for details.');
            }
        });
    });

    // (Other form submission handlers can be placed here)

    // --- Event Delegation for Table Buttons ---

    // FIX: This click handler is now much more efficient.
    // It just sets the ID in the modal form without an extra AJAX call.
    $('#contentTableData').on('click', '.updateContentImage', function(e) {
        e.preventDefault();
        const contentId = $(this).data('id'); 
        $('#editContentPhotoId').val(contentId);
    });

    $('#contentTableData').on('click', '.viewContentImage', function() {
        const id = $(this).data('id');
        $.ajax({
            url: "http://localhost/panady/api/content/get-content-photo.php",
            type: 'GET',
            data: { id: id },
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success' && response.data.photo) {
                    $("#viewContentPhotoImg").attr('src', 'http://localhost/panady/' + response.data.photo);
                } else {
                    $("#viewContentPhotoImg").attr('src', ''); // Clear image if not found
                    alert(response.message || 'Photo not found.');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error("Error viewing photo:", textStatus, errorThrown);
                console.error("Server Response:", jqXHR.responseText);
            }
        });
    });

    $('#contentTableData').on('click', '.editContentinfos', function(e) {
        e.preventDefault();
        const id = $(this).data('id');
        $('#editContentId').val(id);

        $.ajax({
            url: 'http://localhost/panady/api/content/get-content.php',
            type: 'GET',
            data: { id: id },
            dataType: 'JSON',
            success: function(data) {
                if (data && data.length > 0) {
                    const item = data[0];
                    $('#editTitle').val(item.title);
                    $('#editCategory').val(item.categories_id).trigger('change');
                    $('#editContentText').val(item.content);
                    $('#editBanner').prop('checked', item.banner === '1');
                }
            }
        });
    });
});
