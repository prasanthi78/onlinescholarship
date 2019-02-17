<?php
    include 'config.php';
    session_start();
?>
<?php
if(isset($_POST['login'])){
  $error='';
  @$phoneno=mysqli_real_escape_string($conn, $_POST['phoneno']);
  $result=mysqli_query($conn,"SELECT * FROM admin WHERE phoneno='".$phoneno."'");
  $count=mysqli_num_rows($result);
  $fetch_phone=mysqli_fetch_array($result);
  $smobile=$fetch_phone['phoneno'];
  if($count==1){
    $random_number=mt_rand(100000,999999);
    $result=mysqli_query($conn,"UPDATE admin SET otpno='".$random_number."' WHERE phoneno='".$phoneno."'");
   
   @$Message = file_get_contents("http://alerts.adeeptechnologies.com/api/v4/?api_key=A3ca2502007ffe7f750f2ef5e91370064&method=sms&message=Your+OTP+for+changing+password+%0a$random_number,%0aThanks+Your+ID+is+%0aRegards,%0aAditya+Epass+Team&to=$smobile&sender=ADITYA");
    if($Message){
      echo "<script>window.location.href='otppassword.php';</script>";
    }
  }
  else{
    $error='Enter correct phoneno';
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
    <h4 class="text-center"><b>Forgot Password</b></h4> 
    <form method="post" action="">
    <label class="text-danger"><?php echo @$error;?></label>
    <div class="form-group">
    <input type="text" name="phoneno" id ="phoneno" placeholder="Enter your Phoneno" class="form-control"><br>
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-success btn-block btn-lg center-block" value="Send OTP" name="login">
    </div>
    </form> 
    </div>
    </div>
    </div>
    </div>
    </body>
</html>