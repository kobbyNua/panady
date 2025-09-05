<?php include __DIR__ . '/../skeleton/header.php'; ?>
<?php include __DIR__ . '/../skeleton/side.php'; ?>

<div class="content-wrapper">
      <div class="content-header">
            <div class="container-fluid">
                  <div class="row mb-2">
                        <div class="col-sm-6">
                              <h1 class="m-0">Team</h1>
                        </div>
                        <div class="col-sm-6">
                              <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Contents</li>
                              </ol>
                              </div>
                  </div>
                  <section class="content">
                            <div class="container-fluid">
                                  <div class="row">
                                        <div class="col-12">
                                             <div class="card">
                                                  <div class="card-header">
                                                       <h3 class="card-title">page members</h3>
                                                       <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addTeamModal" style="float:right; margin-bottom:10px;">Add New Content</button>
                                                  </div>
                                                  <div class="card-body">
                                                        <div class="table-responsive">
                                                               <table class="table table-striped">
                                                                     <thead>
                                                                        <tr>
                                                                            <th>Fullname</th>
                                                                            <th>Role</th>
                                                                            <th>action button</th>
                                                                        </tr>
                                                                    </thead>
                                                                     <tbody  id="temmembersdet">
                                                                     </tbody>
                                                                     </table>
                                                        </div>
                                                  </div>
                                             </div>
                                        </div>
                                    </div>
                            </div>
                    </section>
              </div>
       </div>
</div>


<div class="modal fade" id="addTeamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
       <div class="modal-content">
            <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New Content</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            <div class="modal-body">
            <form id="addTeamForm" enctype="multipart/form-data">

 <div class="form-group">
 <label for="fullname">Full Name</label>
 <input type="text" class="form-control" id="fullname" name="fullname" required>
 </div>
 <div class="form-group">
 <label for="role">Role</label>
 <input type="text" class="form-control" id="role" name="role" required>
 </div>
 <div class="form-group">
 <label for="image">Image</label>
 <input type="file" class="form-control-file" id="image" name="photo" accept="image/*" required>
 </div>
 <!--<div class="form-group">
 <label for="description">Description</label>
 <textarea class="form-control" id="description" name="description" rows="3"></textarea>
 </div>-->
 <div class="modal-footer">
 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
 <button type="submit" class="btn btn-primary">Save changes</button>
 </div>
            </form>
 </div>
 </div>
 </div>
</div>


<div class="modal" id="editTeam"> <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTeamLabel">Edit Team Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editTeamForm" method="POST" >
          <input type="hidden" id="editTeamId" name="editTeamId">
          <div class="form-group">
            <label for="editFullname">Full Name</label>
            <input type="text" class="form-control" id="editFullname" name="editFullname" required>
          </div>
          <div class="form-group">
            <label for="editRole">Role</label>
            <input type="text" class="form-control" id="editRole" name="editRole" required>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
 

<div class="modal" id="viewTeamPhotoModal" tabindex="-1" role="dialog" aria-labelledby="viewPhotoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewPhotoLabel">Team Member Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img id="viewPhotoImage" class="img-fluid" alt="Team Member Photo"  style="width:100%;height:400px">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="updateTeamPhotoModal" tabindex="-1" role="dialog" aria-labelledby="updateImageLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateImageLabel">Update Team Member Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="updateTeamImageForm" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="updateTeamImageId" name="id">
          <div class="form-group">
            <label for="newImage">New Image</label>
            <input type="file" class="form-control-file" id="newImage" name="photo" accept="image/*" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
    // Your JavaScript for this page will go here.
</script>

<?php include __DIR__ . '/../skeleton/footer.php'; ?>