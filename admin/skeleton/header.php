<?php
session_start();

// If the user is not logged in, redirect to the login page.
if (!isset($_SESSION['user_id'])) {
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/panady/admin/');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/all.min.css">
    <!-- Google Fonts: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
    <!-- Bootstrap 4 (required by AdminLTE) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light bg-white">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notification bell with dropdown -->
            <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="far fa-bell"></i>
                <span class="badge badge-danger navbar-badge">0</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <span class="dropdown-item dropdown-header">0 Notifications</span>
            </div>
            </li>
            <!-- User profile dropdown -->
            <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle"></i>
                <span class="ml-2"><?php echo htmlspecialchars($_SESSION['username'] ?? 'User'); ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right text-center" style="min-width: 300px;">
                <div class="my-3">
                    <i class="fas fa-user-circle" style="font-size: 48px; width: 60px; height: 60px; display: inline-block;"></i>
                </div>
                <a class="dropdown-item" href="#"><i class="fas fa-user"></i> User Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="http://<?php echo $_SERVER['HTTP_HOST']; ?>/panady/api/auth/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
            </li>
        </ul>
        </nav>
