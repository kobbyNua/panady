<?php include __DIR__ . '/../skeleton/header.php'; ?>
<?php include __DIR__ . '/../skeleton/side.php'; ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Article types</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Article Types</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addArticleTypeModal">
                                    <i class="fa fa-plus"></i> Add Article Type
                                </button>
                                </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" id="articleTypesTable">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Type Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="articleTypesTableData">
                                    <!-- Data will be populated here via JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add Article Type Modal -->
<div class="modal fade" id="addArticleTypeModal" tabindex="-1" role="dialog" aria-labelledby="addArticleTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addArticleTypeModalLabel">Add Article Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addArticleTypeForm" method="POST" >
                <div class="modal-body">
                    <div class="form-group">
                        <label for="articleTypeName">Type Name</label>
                        <input type="text" class="form-control" id="articleTypeName" name="type_name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Type</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Article Type Modal -->
<div class="modal fade" id="editArticleTypeModal" tabindex="-1" role="dialog" aria-labelledby="editArticleTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editArticleTypeModalLabel">Edit Article Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editArticleTypeForm" method="POST" >
                <div class="modal-body">
                    <input type="hidden" id="editArticleTypeId" name="id">
                    <div class="form-group">
                        <label for="editArticleTypeName">Type Name</label>
                        <input type="text" class="form-control" id="editArticleTypeName" name="type_name" required>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Type</button>
            </div>
            </form>
        </div>
    </div>
</div>


<?php include __DIR__ . '/../skeleton/footer.php'; ?>