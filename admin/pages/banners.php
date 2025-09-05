<?php include __DIR__ . '/../skeleton/header.php'; ?>
<?php include __DIR__ . '/../skeleton/side.php'; ?>


<div class="content-wrapper">
      <div class="content-header">
            <div class="container-fluid">
                  <div class="row mb-2">
                        <div class="col-sm-6">
                              <h1 class="m-0">Banners</h1>
                        </div>
                        <div class="col-sm-6">
                              <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Banners</li>
                              </ol>
                              </div>
                  </div>
                  <div></div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                  <br>
                  <div class="card p-4" >
                        <div class="container-fluid">
                              <div class="card-header">
                                   <h3 class="card-title">Bordered Table</h3>
                                   <button class="btn btn-primary" data-toggle="modal" data-target="#addBanner" style="float:right; margin-bottom:10px;">Add New Banner</button>
                               </div>
                              <div class="row">
                                <div class="col-12">
                                      <div class="table-responsive">
                                            <table class="table table-bordered">
                                                  <thead>
                                                        <tr>
                                                              <th style="width: 10px">#</th>
                                                              <th>Title</th>
                                                              <th>Image</th>
                                                              <th style="width: 40px">Action</th>
                                                        </tr>
                                                  </thead>
                                                  <tbody>
                               
                                                  </tbody>
                                            </table>
                                      </div>
                                      </div>
                              </div>
                              </div>
                        </div>
</section>
</div><!-- content-wrapper -->

<div class="modal" id="addBanner">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h4 class="modal-title">Add New Banner</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" required>
                                </div>
                               <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="image" required>
                                </div>
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="text" class="form-control" name="link" id="link" required>
                                </div>
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="info">Info</label>
                                    <textarea class="form-control" name="info" id="info" rows="3" required></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary" name="addBanner">Submit</button>
                        </form>
                 </div>
            </div>
        </div>
</div>
</div>

<div class="modal" id="editBanner">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h4 class="modal-title">Edit Banner</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" name="title" id="edit_title" required>
                                </div>
                               <!--<div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control" name="image" id="edit_image">
                                    <input type="hidden" name="current_image" id="current_image">
                                </div>
                                <div class="form-group">
                                    <label for="link">Link</label>
                                    <input type="text" class="form-control" name="link" id="edit_link" required>
                                </div>
                                <div class="form-group>
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="edit_status" required>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>-->
                                <div class="form-group">
                                    <label for="info">Info</label>
                                    <textarea class="form-control" name="info" id="edit_info" rows="3" required></textarea>
                                </div>
                                <input type="hidden" name="banner_id" id="banner_id">
                                <button type="submit" class="btn btn-primary" name="updateBanner">Update</button>
                        </form>
                    </div>
            </div>
        </div>
</div>
<div class="modal" id="deleteBanner">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h4 class="modal-title">Delete Banner</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                        <form action="" method="post">
                                <p>Are you sure you want to delete this banner?</p>
                                <input type="hidden" name="banner_id" id="delete_banner_id">
                                <button type="submit" class="btn btn-danger" name="deleteBanner">Delete</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </form>
                  </div>
            </div>
      </div>
</div>
<div class="modal" id="viewBanner">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h4 class="modal-title">View Banner</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                        <p><strong>Title:</strong> <span id="view_title"></span></p>
                        <p><strong>Image:</strong> <br><img id="view_image" src="" alt="Banner Image" style="max-width:100%; height:auto;"></p>
                        <!--<p><strong>Link:</strong> <a href="#" id="view_link" target="_blank"></a></p>
                        <p><strong>Status:</strong> <span id="view_status"></span></p>-->
                        <p><strong>Info:</strong> <span id="view_info"></span></p>
                  </div>
           </div>
      </div>
</div>

<div class="modal" id="bannerSuccessModal">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                        <h4 class="modal-title">Success</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                        <p id="bannerSuccessMessage"></p>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
            </div>
      </div>
</div>

<div class="modal" id="viewImageModal">
      <div class="modal-dialog modal-lg">
            <div class="modal-content">
                  <div class="modal-header">
                        <h4 class="modal-title">View Image</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body text-center">
                        <img id="fullSizeImage" src="" alt="Full Size Banner Image" style="max-width:100%; height:auto;">
                  </div>
            </div>
      </div>
</div>
<div  class="modal" id="editImageModal">
      <div class="modal-dialog modal-lg">
            <div class="modal-content">
                  <div class="modal-header">
                        <h4 class="modal-title">Edit Image</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                    <label for="new_image">Select New Image</label>
                                    <input type="file" class="form-control" name="new_image" id="new_image" required>
                                    <input type="hidden" name="image_banner_id" id="image_banner_id">
                                    <input type="hidden" name="current_image_name" id="current_image_name">
                              </div>
                              <button type="submit" class="btn btn-primary" name="updateBannerImage">Update Image</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </form>
                  </div>
            </div>
      </div>
</div>


<?php include __DIR__ . '/../skeleton/footer.php'; ?>