<?php include __DIR__ . '/../skeleton/header.php'; ?>
<?php include __DIR__ . '/../skeleton/side.php'; ?>

<div class="content-wrapper">
      <div class="content-header">
            <div class="container-fluid">
                  <div class="row mb-2">
                        <div class="col-sm-6">
                              <h1 class="m-0">Contens</h1>
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
                                                       <h3 class="card-title">page Contents</h3>
                                                       <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addContent" style="float:right; margin-bottom:10px;">Add New Content</button>
                                                  </div>
                                                  <div class="card-body">
                                                        <div class="table-responsive">
                                                           <table class="table table-bordered table-hover" id="tableConteData">
                                                                    <thead>
                                                                            <tr>
                                                                             <th>ID</th>
                                                                             <th>Title</th>
                                                                             <th>category</th>
                                                                             <!--<th>Category</th>
                                                                             <th>URL Slug</th>
                                                                             <th>Photo</th>
                                                                             <th>Banner</th>-->
                                                                             <th>Actions</th>
                                                                            </tr>
                                                                    </thead>
                                                                    <tbody id="contentTableData">
                                                
                                                                    </tbody>
                                                           </table>
                                                       </div>
                                                  </div>
                                                
                                        </div>
                                    </div>
                            
                            </div>
            
                  </section>
            </div>
        </div>
</div>


<!-- Add Content Modal -->
 <div class="modal fade" id="addContent" tabindex="-1" role="dialog" aria-labelledby="addContentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="addContentLabel">Add New Content</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body">
                        <form id="addContentForm" method="POST" enctype="multipart/form-data">
                              <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" id="category" name="category" required>
                                        <!-- Categories will be populated here -->
                                         <option></option>
                                    </select>
                                </div>
                                <div class="form-group" id="selectedArticleField">
                                     <label for="urlSlug">Select Article Fields</label>
                                     <select class="form-control" id="aticlesele"  name="aticlesele" required></select>
                                </div>
                               <!-- <div class="form-group">
                                    <label for="urlSlug">URL Slug</label>
                                    <input type="text" class="form-control" id="urlSlug" name="urlSlug" required>
                                </div>-->
                                <div class="form-group">
                                    <label for="photo">Photo URL</label>
                                    <input type="file" class="form-control" id="photo" name="photo" required>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="banner" name="banner">
                                    <label class="form-check-label" for="banner">Banner</label>
                                </div>
                                <div class="form-group">
                                    <label for="content">Content</label>
                                    <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Add Content</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                  </div>
            </div>
      </div>
</div>
<!--end Add Content Modal-->
<!--edit Content Modal-->
<div class="modal fade" id="editContent" tabindex="-1" role="dialog" aria-labelledby="editContentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="editContentLabel">Edit Content</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body">
                        <form id="editContentForm" method="POST">
                              <input type="hidden" id="editContentId" name="id">
                              <div class="form-group">
                                    <label for="editTitle">Title</label>
                                    <input type="text" class="form-control" id="editTitle" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="editCategory">Category</label>
                                    <select class="form-control" id="editCategory" name="category" required>
                                        <!-- Categories will be populated here -->
                                    </select>
                                </div>
                                <div class="form-group" id="editSelectedArticleField">
                                     <label for="urlSlug">Select Article Fields</label>
                                     <select class="form-control" id="editAticlesele"  name="editAticlesele" required></select>
                                </div>
                                <!--<div class="form-group">
                                    <label for="editUrlSlug">URL Slug</label>
                                    <input type="text" class="form-control" id="editUrlSlug" name="urlSlug" required>
                                </div>
                                <div class="form-group">
                                    <label for="editPhoto">Photo URL</label>
                                    <input type="text" class="form-control" id="editPhoto" name="photo" required>
                                </div>-->
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="editBanner" name="banner">
                                    <label class="form-check-label" for="editBanner">Banner</label>
                                </div>
                                <div class="form-group">
                                    <label for="editContent">Content</label>
                                    <textarea class="form-control" id="editContentText" name="content" rows="4" required></textarea>
                                </div>
                                <inpuy type="hidden" id="editContentId" name="id">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                    </div>
            </div>
      </div>
</div>


<div class="modal fade" id="deleteContentModal" tabindex="-1" role="dialog" aria-labelledby="deleteContentLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteContentLabel">Delete Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this content?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteContent">Delete</button>
            </div>
        </div>
    </div>
</div>
    <!--end delete Content Modal-->

<!--view Content Modal-->
<div class="modal fade" id="viewContentModal" tabindex="-1" role="dialog" aria-labelledby="viewContentLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewContentLabel">View Content</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h3 id="viewContentTitle"></h3>
                <p><strong>Category:</strong> <span id="viewContentCategory"></span></p>
                <p><strong>URL Slug:</strong> <span id="viewContentUrlSlug"></span></p>
                <!--<p><strong>Photo:</strong> <img id="viewContentPhoto" src="" alt="Content Photo" style="max-width: 100%; height: auto;"></p>
                <p><strong>Banner:</strong> <span id="viewContentBanner"></span></p>-->
                <hr>
                <div id="viewContentBody"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

</div>
<!--end view Content Modal-->

<!-- edit content photo Moda-->
 <div class="modal fade" id="editContentPhotoModal" tabindex="-1" role="dialog" aria-labelledby="editContentPhotoLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="editContentPhotoLabel">Edit Content Photo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body">
                        <form id="editContentPhotoForm" method="POST" enctype="multipart/form-data">
                             
                              <div class="form-group">
                                    <label for="editContentPhotoUrl">Photo URL</label>
                                    <input type="file" class="form-control" id="editContentPhotoUrl" name="photo" required>
                                </div>
                                <input type="hidden" id="editContentPhotoId" name="id">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </form>
                  </div>
            </div>
      </div>
</div>
<!--end edit content photo Modal-->
<!-- view content photo Modal-->
 <div class="modal fade" id="viewContentPhotoModal" tabindex="-1" role="dialog" aria-labelledby="viewContentPhotoLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                  <div class="modal-header">
                        <h5 class="modal-title" id="viewContentPhotoLabel">View Content Photo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                  </div>
                  <div class="modal-body text-center">
                        <img id="viewContentPhotoImg" src="" alt="Content Photo" style="max-width: 100%; height: 350px;">
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
</div>
<?php include __DIR__ . '/../skeleton/footer.php'; ?>