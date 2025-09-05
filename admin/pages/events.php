<?php include __DIR__ . '/../skeleton/header.php'; ?>
<?php include __DIR__ . '/../skeleton/side.php'; ?>

<div class="content-wrapper">
      <div class="content-header">
            <div class="container-fluid">
                  <div class="row mb-2">
                        <div class="col-sm-6">
                              <h1 class="m-0">Events</h1>
                        </div>
                        <div class="col-sm-6">
                              <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Events</li>
                              </ol>
                              </div>
                  </div>
                  <div></div>
            </div>
        </div>




        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Events</h3>
                                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addBanner" style="float:right; margin-bottom:10px;">Add New Event</button>
                            </div>
                            <div class="card-body">
                                     <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Title</th>
                                                    <th>Date</th>
                                                   
                                                    <th>Actions</th>
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
            </div>
        </section>
        </div>
        </div>

<!-- Add Event Modal -->
<div class="modal fade" id="addBanner" tabindex="-1" role="dialog" aria-labelledby="addBannerLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBannerLabel">Add New Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addEventForm">
                    <div class="form-group">
                        <label for="eventTitle">Title</label>
                        <input type="text" class="form-control" id="eventTitle" name="title" required>
                        </div>
                    <div class="form-group">
                        <label for="eventDate">Date</label>
                        <input type="date" class="form-control" id="eventDate" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="eventDescription">Description</label>
                        <textarea class="form-control" id="eventDescription" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="eventImage">Image</label>
                        <input type="file" class="form-control-file" id="eventImage" name="image" accept="image/*" required>
                    </div>
                    <div class="form-group">
                          <label for="setBannerStatus">Status</label>
                          <input type="checkbox" id="setBannerStatus" name="status" value="1" checked data-toggle="toggle" data-on="Active" data-off="Inactive">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Event</button>
                </form>
            </div>
        </div>
    </div>
</div>
        
<?php include __DIR__ . '/../skeleton/footer.php'; ?>