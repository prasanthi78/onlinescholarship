<?php
    include 'config.php';
    session_start();
?>
<?php
if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $select_login = mysqli_query($conn, "SELECT * FROM admin where username = '".$username."' and password = '".$password."' and status='1'");
    $count = mysqli_num_rows($select_login);
    $fetch_login = mysqli_fetch_array($select_login);
    if($count==1)
    {
      $_SESSION['username'] = $username;
      echo "<script>window.location.href ='Admin/index1.php?pages=home';</script>";
    }
    else
    {
    echo "<script>alert('Make sure that both username and password should be same...!!!');</script>";
    }
  }
?>
<!doctype html>
<html>
        <head>
        <title>Login And Signup Form</title>
        <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
  
        <style>
            body{
                    background: rgba(0, 0, 0, 0.11);
                }
                .row{
                margin:15% 0;
                }
                .col-sm-4{
                background-color:white;
                padding:20px;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
                }
                .text-center{
                  margin-bottom: 20px;
                  padding: 10px;
                  color :white;
                  background: linear-gradient(70deg, #58b76c, #3fa142);
                }
                .form-group{
                   margin-bottom: 20px;
                }
                .form-control, .btn{
                  min-height: 40px;
          border-radius: 2px; 
              transition: all 0.5s;
                }
                .bg-warning{
                background-color:#cc0066;
                padding:10px 0;
                }
                 .btn-success{
                     padding: 5px 20px;
                     background-image: linear-gradient(green,lightgreen);
                 } 
                a, a:hover{
                    text-decoration: none;
                    color: green;
                }
                .text-right{
                   margin-bottom: 20px;
                }
          </style>
    </head>
    <body>
    <div class="container">
    <div class="row"> 
    <div class="col-sm-4 col-sm-offset-4">
    <div class="login">
    <h4 class="text-center">Admin Login</h4> 
    <form name="loginform" method="post" action="login.php">
    <div class="form-group">
    <input type="text" name="username" class="form-control" placeholder="Enter Username" required>           
    </div>
    <div class="form-group">
    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
    </div>
    <div class="text-right">
    <a href="forgotpassword.php">Forget Password?</a>
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-success btn-block btn-lg center-block" name="login" value="Login"><br>
    </div>
    </form> 
    </div>
    </div>
    </div>
    </div>
    </body>
</html>