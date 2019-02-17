<?php
    include 'config.php';
    session_start();
?>
<?php
$error='';
if(isset($_POST['login']))
{ 
    @$otpno = mysqli_real_escape_string($conn,$_POST['otpno']);
    @$new_password = mysqli_real_escape_string($conn,$_POST['new_password']);
    @$confirm_password = mysqli_real_escape_string($conn,$_POST['confirm_password']);
    $result=mysqli_query($conn,"SELECT * FROM admin WHERE otpno='".$otpno."'");
    $fetch_otp= mysqli_fetch_array($result);
    $count=mysqli_num_rows($result);
    if($count==1)
    { 
      if($fetch_otp['password']==$new_password){
        echo "you have already use this password";
      }
      elseif($new_password==$confirm_password)
      {
       $change_password = mysqli_query($conn, "UPDATE admin SET password='".$new_password."', otpno=''");
       if($change_password)
       {
          @$_SESSION['username'] = $username;

          echo "<script>alert('Password changed') ,window.location.href ='login.php';</script>";
       }
       else
       {
          $error='Password is not reset';
       }
      }
      else
      {
          $error='Both passwords should be same';
      }
    }
    else
    {
      $error='OTP is not correct';
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
    <form method="post" action="">
    <label class="text-danger"><?php echo @$error;?></label>
    <div class="form-group">
    <input  type="password" id="otpno" name="otpno" placeholder="Enter OTP" class="form-control" required> 
    </div>
    <div class="form-group">
    <input  type="password" id="new_password" name="new_password" placeholder="Enter New Password" class="form-control" required>
    </div>
    <div class="form-group">
    <input type="password" id="confirm_password" name="confirm_password" placeholder="Enter Confirm Password" class="form-control" required> 
    </div>
    <div class="form-group">
    <input type="submit" class="btn btn-success btn-block btn-lg" name="login" value="Change Password">
    </div>
    </form> 
    </div>
    </div>
    </div>
    </div>
    </body>
</html>