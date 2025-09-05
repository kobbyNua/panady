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
                                                       <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addMediaModal" style="float:right; margin-bottom:10px;">Add New Media File(Photo/Vide) </button>
                                                  </div>
                                                  <div class="card-body">
                                                       <div class="table-responsive">
                                                            <table class="table table-striped table-hover">
                                                                  <thead>
                                                                       <tr>
                                                                           <th>Caption</th>
                                                                           <th>File Types</th>
                                                                           <th>Action</th>
                                                                       </tr>
                                                                  </thead>
                                                                  <tbody id="mediaTableBody">
                                                                  </tbody>
                                                                  <tfoot></tfoot>
                                                                
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
    
    
    
    <!--Add Photo/video-->
    
    <div class="modal fade" id="addMediaModal" tabindex="-1" role="dialog" aria-labelledby="addMediaModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addTeamModalLabel">Add New Media File(Photo/Vide)o</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="addMediaForm" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="teamName">Title</label>
                  <input type="text" class="form-control" id="teamName" name="caption" required>
                </div>
                <div class="form-group">
                  <label for="teamPhoto">Photo/Video</label>
                  <input type="file" class="form-control-file" id="teamPhoto" name="photo" accept="image/*,video/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload</button>
              </form>
            </div>
          </div>
        </div>
      </div>

    <!-- Edit Media Modal -->
    <div class="modal fade" id="editMediaCaptionModal" tabindex="-1" role="dialog" aria-labelledby="editMediaModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editMediaModalLabel">Edit Media Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="editMediaCaptionForm" method="POST">
              <input type="hidden" class="form-control" id="editMediaId" name="id">
              
              <div class="form-group">
                  <label>Current Media</label>
                  <div id="mediaPreview" class="text-center" style="max-height: 300px; overflow: hidden;">
                      <!-- Image or video will be loaded here by JavaScript -->
                       <image style="width:100%" id="mediaphoto">
                  </div>
              </div>

              <div class="form-group">
                <label for="editMediaCaption">Caption</label>
                <input type="text" class="form-control" id="editMediaCaption" name="caption" required>
              </div>
    
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      
<!-- edit media file  Modal-->
<div class="modal fade" id="editMediaFileModal" tabindex="-1" role="dialog" aria-labelledby="editMediaFileModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editMediaFileModalLabel">Edit Media File</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editMediaFileForm" method="POST" enctype="multipart/form-data">
          <input type="hidden" id="editMediaFileId" name="id">
          
          <div class="form-group">
              <label>Current Media</label>
              <div id="currentMediaFilePreview" class="text-center" style="max-height: 300px; overflow: hidden;">
                  <!-- Current image or video will be loaded here by JavaScript -->
                   <image style="width:100%" id="mediaphotos">
              </div>
          </div>

          <div class="form-group">
            <label for="editMediaFile">New Photo/Video</label>
            <input type="file" class="form-control-file" id="editMediaFile" name="photo" accept="image/*,video/*" required>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update File</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include __DIR__ . '/../skeleton/footer.php'; ?>