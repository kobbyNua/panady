<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panady | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_ADDR']?>/panady/assets/styles/fontawesome/css/all.min.css">
    
    <!-- AdminLTE style -->
    <link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_ADDR']?>/panady/assets/dist/css/adminlte.min.css">

    <style>
        body.login-page {
            background: linear-gradient(-45deg, #70a1ff, #2e86de, #23a6d5, #23d5ab);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-box .card, .register-box .card {
            border-radius: .75rem;
            box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,0.2) !important;
        }
        
        .login-logo a, .register-logo a {
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .login-user-icon {
            width: 180px;
            height: 180px;
            margin: -30px auto 20px;
            background-color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            color: #495057;
        }
    </style>
</head>
<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <!-- The href should ideally point to your site's homepage -->
            <a href="http://<?php echo $_SERVER['SERVER_ADDR']?>/panady/"><b>Panady</b>System</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <br>
                <div class="msg-box"></div>
                <form method="post">

                    <div class="login-user-icon">
                        <span class="fas fa-user fa-3x"></span>
                    </div>
                    <div class="input-group my-3">
                        <input type="text" class="form-control" placeholder="username" required>
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                           <!-- <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>-->
                        </div>
                        <!-- /.col -->
                       <div class="col-4">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Sign In</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <!--<div class="social-auth-links text-center mt-2 mb-3">
                    <p>- OR -</p>
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-primary">
                            <i class="fab fa-facebook me-2"></i> Sign in using Facebook
                        </a>
                        <a href="#" class="btn btn-danger">
                            <i class="fab fa-google-plus me-2"></i> Sign in using Google+
                        </a>
                    </div>
                </div>-->
                <!-- /.social-auth-links -->

                <!--<p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>-->
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery, Bootstrap, and AdminLTE scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="http://<?php echo $_SERVER['SERVER_ADDR']?>/panady/assets/dist/js/adminlte.min.js"></script>
    <script>
         $(document).ready(function(){
            $('#login-form').submit(function(e){
                  $.ajax({
                    url:'http://localhost/panady/api/login.php',
                    data: $('#login-form').serialize(),
                    type: 'POST',
                     dataType:'json',
                     success:function(data){
                          if(data.status=="success"){
                            window.location="http://localhost/panady/admin/dashboard/";
                          }
                     },
                     
                  })
             })
         })
    </script>
</body>
</html>