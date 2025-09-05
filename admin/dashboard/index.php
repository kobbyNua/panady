<?php
// Include header
include_once __DIR__ . '/../skeleton/header.php';

// Include sidebar
include_once __DIR__ . '/../skeleton/side.php';
?>

        <!-- Page Content -->

        <div class="content-wrapper p-3">
        <div class="row">
            <!-- Total Events Card -->
            <div class="col-md-3 mb-4">
                <div class="card text-white bg-primary h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total Events</h5>
                        <p class="card-text display-4">
                            <?php
                            // Replace with your actual query
                            $events_count = 0;
                           /* $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM events");
                            if ($row = mysqli_fetch_assoc($result)) {
                                $events_count = $row['total'];
                            }*/
                            echo $events_count;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Total Users Card -->
            <div class="col-md-3 mb-4">
                <div class="card text-white bg-success h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text display-4">
                            <?php
                            $users_count = 0;
                            /*$result = mysqli_query($conn, "SELECT COUNT(*) as total FROM users");
                            if ($row = mysqli_fetch_assoc($result)) {
                                $users_count = $row['total'];
                            }*/
                            echo $users_count;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Total Articles Card -->
            <div class="col-md-3 mb-4">
                <div class="card text-white bg-warning h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total Articles</h5>
                        <p class="card-text display-4">
                            <?php
                            $articles_count = 0;
                           /* $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM articles");
                            if ($row = mysqli_fetch_assoc($result)) {
                                $articles_count = $row['total'];
                            }*/
                            echo $articles_count;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Total Photos Card -->
            <div class="col-md-3 mb-4">
                <div class="card text-white bg-danger h-100">
                    <div class="card-body">
                        <h5 class="card-title">Total Photos</h5>
                        <p class="card-text display-4">
                            <?php
                            $photos_count = 0;
                            /*$result = mysqli_query($conn, "SELECT COUNT(*) as total FROM photos");
                            if ($row = mysqli_fetch_assoc($result)) {
                                $photos_count = $row['total'];
                            }*/
                            echo $photos_count;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Content goes here -->
    </div>
<?php
// Include footer
include_once __DIR__ . '/../skeleton/footer.php';
?>