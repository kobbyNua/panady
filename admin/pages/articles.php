<?php include __DIR__ . '/../skeleton/header.php'; ?>
<?php include __DIR__ . '/../skeleton/side.php'; ?>

<div class="content-wrapper" style="margin-top:20px" >
    <!-- Main content -->
    <section class="content">
        <section style="background: #fff; width: 100%;padding:10px;margin-top:15px;marging-bottom:15px;">
            <h4>Article</h4>
        </section>
        <br>
        <div class="card p-4" >
              <div class="container-fluid">
                 <div class="card-header">
                    
                     <h3 class="card-title">Bordered Table</h3>
                     <button class="btn btn-primary" data-toggle="modal" data-target="#addArticle" style="float:right; margin-bottom:10px;">Add New Article</button>
                   </div>
                   <div class="row">
                         <div class="col-12">
                               <div class="table-responsive">
                                     <table class="table table-bordered">
                                             <thead>
                                                  <tr>
                                                      <th>Topic</th>
                                                      <th>category</th>
                                                      <th>Date Posted</th>
                                                      <th>Action</th>
                                                  </tr>
                                             </thead>
                                             <tbody></tbody> 
                                     </table>
                               </div>
                         </div>
                   </div>
              </div>
        </div>
        <!-- Your page content goes here -->
    </section>
    <!-- /.content -->
</div>
<!--Modal boxes-->$_COOKIE

<!--Add Articles Modal Box-->
<div class="modal" id="addArticle">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h4 class="modal-title">Add New Article</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                    <form id="articleForm" enctype="multipart/form-data">
                         <div class="form-group">
                              <label for="topic">Topic</label>
                              <input type="text" class="form-control" id="topic" name="topic" placeholder="Enter Topic" required>
                         </div>
                         <div class="form-group">
                              <label for="category">Category</label>
                              <select class="form-control" id="category" name="category" required>
                                   <option value="">Select Category</option>
                                   <option value="Technology">Technology</option>
                                   <option value="Health">Health</option>
                                   <option value="Science">Science</option>
                                   <option value="Business">Business</option>
                                   <option value="Entertainment">Entertainment</option>
                              </select>
                        </div>
                         <div class="form-group">
                              <label for="content">Content</label>
                              <textarea class="form-control" id="content" name="content" rows="5" placeholder="Enter Content" required></textarea>
                         </div>
                         <div class="form-group">
                              <label for="image">Image</label>
                              <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                         </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
          </div>
       </div>
</div>

<div class="modal" id="editArticle">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h4 class="modal-title">Edit Article</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                    <form id="editArticleForm" enctype="multipart/form-data">
                         <input type="hidden" id="edit_article_id" name="article_id">
                         <div class="form-group">
                              <label for="edit_topic">Topic</label>
                              <input type="text" class="form-control" id="edit_topic" name="topic" placeholder="Enter Topic" required>
                         </div>
                            <div class="form-group">
                              <label for="edit_category">Category</label>
                              <select class="form-control" id="edit_category" name="category" required>
                                   <option value="">Select Category</option>
                                   <option value="Technology">Technology</option>
                                   <option value="Health">Health</option>
                                   <option value="Science">Science</option>
                                   <option value="Business">Business</option>
                                   <option value="Entertainment">Entertainment</option>
                              </select>
                              </div>
                         <div class="form-group">
                              <label for="edit_content">Content</label>
                              <textarea class="form-control" id="edit_content" name="content" rows="5" placeholder="Enter Content" required></textarea>
                         </div>
                            <!--<div class="form-group">
                              <label for="edit_image">Image</label>
                              <input type="file" class="form-control-file" id="edit_image" name="image" accept="image/*">
                              <small class="form-text text-muted">Leave blank to keep existing image.</small>
                            </div>-->
                            <input type="hidden" id="edit_aticle_id" value="" name="existing_image">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                            </button>
                    </form>
                </div>
          </div>
      </div>
</div>
<div class="modal" id="deleteArticle">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <h4 class="modal-title">Delete Article</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                    <form id="deleteArticleForm">
                         <input type="hidden" id="delete_article_id" name="article_id">
                         <p>Are you sure you want to delete this article?</p>
                         <button type="submit" class="btn btn-danger">Delete</button>
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
     </div>
         
</div>

<div class="modal" id="viewArticle">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h4 class="modal-title">View Article</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                    <div id="articleDetails">
                         <!-- Article details will be loaded here via JavaScript -->
                    </div>
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
               <div class="modal-body">
                    <div id="imageDetails" style="text-align:center;">
                         <!-- Image will be loaded here via JavaScript -->
                    </div>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>
<div class="modal" id="uploadImageModal">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <div class="modal-header">
                    <h4 class="modal-title">Upload Image</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                    <form id="uploadImageForm" enctype="multipart/form-data">
                         <input type="hidden" id="upload_article_id" name="article_id">
                         <div class="form-group">
                              <label for="upload_image">Select Image</label>
                              <input type="file" class="form-control-file" id="upload_image" name="image" accept="image/*" required>
<div class="modal" id="loadingModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
            </div>
        </div>
</div>
<
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background: transparent; border: none; box-shadow: none;">
      <div class="d-flex justify-content-center">
        <div class="spinner-border text-primary" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
  </div>
<!--end Modal Box-->
<?php include __DIR__ . '/../skeleton/footer.php'; ?>