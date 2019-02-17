<?php
    include '1.php';
    session_start();
?>
<?php
if(isset($_POST['signup'])){
    $username = mysqli_real_escape_string($conn,$_POST['username']);
    $mailid = mysqli_real_escape_string($conn,$_POST['mailid']);
    $phoneno = mysqli_real_escape_string($conn,$_POST['phoneno']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $repassword = mysqli_real_escape_string($conn,$_POST['repassword']);
    $select_login = mysqli_query($conn, "SELECT * FROM admin where mailid = '".$mailid."'");
    $count = mysqli_num_rows($select_login);
    if($count==1){
        echo "<script>alert('Email already eixsted');</script>";
       
    }else if($password!=$repassword){

        echo "<script>alert('Make sure that both passwords should be same...!!!');</script>";

    }
    else
    {
      echo "<script>alert('Registration Successfull'); window.location.href='login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" type="text/css" href="css/login.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="js/login.js"></script>
</head>
  <body>
        <div class="container">
            <div class="login-container animated slideInDown">
                <div id="output"></div>
                <div class="avatar"></div>
                <div class="form-box">
                    <form method="post">
                        <input  type="text" id="username" name="username" placeholder="Enter Username" required>
                        <input  type="email" id="mailid" name="mailid" placeholder="Enter MailID" required>
                        <input  type="number" id="phno" name="phno" placeholder="Enter Phoneno" required>
                        <input type="password" id="password" name="password" placeholder="Enter Password" required>
                        <input type="password" id="repassword" name="repassword" placeholder="Re-enter Password" required><br/><br/>
                        <input type="submit" class="btn btn-info btn-block login" name="signup" value="Signup">
                        
                    </form>
                </div>
            </div>   
        </div>
  </body>
</html>