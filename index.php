<?php
  include 'config.php';
  include 'checkdata.php';

  session_start();

  $arr=Array("photo"=>"","signature"=>"","phy_certi"=>"","cap_cat_file"=>"","sports_cat_file"=>"","ncc_cat_file"=>"","nss_cat_file"=>"","extra_act_file"=>"");
  if(isset($_POST['register']))
  {  //Starting code for inserting new record  

      @$rollno = mysqli_real_escape_string($conn, $_POST['rollno']);
      @$sname = mysqli_real_escape_string($conn, $_POST['sname']);
      @$fname = mysqli_real_escape_string($conn, $_POST['fname']);
      @$mname = mysqli_real_escape_string($conn, $_POST['mname']);
      @$ssc_hall = mysqli_real_escape_string($conn, $_POST['ssc_hall']);
      @$aadhar = mysqli_real_escape_string($conn, $_POST['aadhar']);
      @$ssc_year_pass = mysqli_real_escape_string($conn, $_POST['ssc_year_pass']);
      @$ssc_passtype = mysqli_real_escape_string($conn, $_POST['ssc_passtype']);
      @$gender = mysqli_real_escape_string($conn, $_POST['gender']);
      @$religion = mysqli_real_escape_string($conn, $_POST['religion']);
      @$caste = mysqli_real_escape_string($conn, $_POST['caste']);
      @$subcaste = mysqli_real_escape_string($conn, $_POST['subcaste']);
      @$mtongue = mysqli_real_escape_string($conn, $_POST['mtongue']);
      @$nation = mysqli_real_escape_string($conn, $_POST['nation']);
      @$pocu = mysqli_real_escape_string($conn, $_POST['pocu']);
      @$village = mysqli_real_escape_string($conn, $_POST['village']);
      @$mandal = mysqli_real_escape_string($conn, $_POST['mandal']);
      @$district = mysqli_real_escape_string($conn, $_POST['district']);
      @$state = mysqli_real_escape_string($conn, $_POST['state']);
      @$habitation = mysqli_real_escape_string($conn, $_POST['habitation']);
      @$street = mysqli_real_escape_string($conn, $_POST['street']);
      @$doorno = mysqli_real_escape_string($conn, $_POST['doorno']);
      @$pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
      @$email = mysqli_real_escape_string($conn, $_POST['email']);
      @$pmobile = mysqli_real_escape_string($conn, $_POST['pmobile']);
      @$smobile = mysqli_real_escape_string($conn, $_POST['smobile']);
      @$mole1 = mysqli_real_escape_string($conn, $_POST['mole1']);
      @$mole2 = mysqli_real_escape_string($conn, $_POST['mole2']);
      @$course = mysqli_real_escape_string($conn, $_POST['course']);
      @$year_study = mysqli_real_escape_string($conn, $_POST['year_study']);
      @$section = mysqli_real_escape_string($conn, $_POST['section']);
      @$adm_cat = mysqli_real_escape_string($conn, $_POST['adm_cat']);
      @$cap_cat = mysqli_real_escape_string($conn, $_POST['cap_cat']);
      @$cap_cat_name = mysqli_real_escape_string($conn, $_POST['cap_cat_name']);
      @$sports_cat_name = mysqli_real_escape_string($conn, $_POST['sports_cat_name']);
      @$ncc_cat_name = mysqli_real_escape_string($conn, $_POST['ncc_cat_name']);
      @$nss_cat_name = mysqli_real_escape_string($conn, $_POST['nss_cat_name']);
      @$extra_act_name = mysqli_real_escape_string($conn, $_POST['extra_act_name']);
      @$second_lang = mysqli_real_escape_string($conn, $_POST['second_lang']);
      @$adm_no = mysqli_real_escape_string($conn, $_POST['adm_no']);
      @$adm_date = mysqli_real_escape_string($conn, $_POST['adm_date']);
      @$phy_chal = mysqli_real_escape_string($conn, $_POST['phy_chal']);
      @$phy_certi = mysqli_real_escape_string($conn, $_POST['phy_certi']);
      @$seligible = mysqli_real_escape_string($conn, $_POST['seligible']);
      @$sch_type = mysqli_real_escape_string($conn, $_POST['sch_type']);
      @$caste_num = mysqli_real_escape_string($conn, $_POST['caste_num']);
      @$income_num = mysqli_real_escape_string($conn, $_POST['income_num']);
      @$ifsc = mysqli_real_escape_string($conn, $_POST['ifsc']);
      @$bankname = mysqli_real_escape_string($conn, $_POST['bankname']);
      @$bank_ac = mysqli_real_escape_string($conn, $_POST['bank_ac']);
      @$banktown = mysqli_real_escape_string($conn, $_POST['banktown']);

      $obj = new check();
      $error = $obj->checkData($_POST);
      if (count($error)==0) {
        if(@$_GET['id']==''){
          // Insert
        }
        else {
          // Update
        }
      }

      
      
      @$date = date("Y/m/d");
      $select_registered = mysqli_query($conn, "SELECT * FROM fee where aadhar = '".$aadhar."' or ssc_hall='".$ssc_hall."' or smobile='".$smobile."' or email='".$email."' or rollno='".$rollno."'");
      $count = mysqli_num_rows($select_registered);
      if($count==0){
        $sql="INSERT INTO fee set  rollno = '".$rollno."',sname = '".$sname."', fname = '".$fname."',mname = '".$mname."',ssc_hall= '".$ssc_hall."',aadhar= '".$aadhar."',ssc_year_pass = '".$ssc_year_pass."',ssc_passtype = '".$ssc_passtype."',gender = '".$gender."',religion= '".$religion."',caste= '".$caste."',subcaste= '".$subcaste."',mtongue= '".$mtongue."',nation = '".$nation."',pocu = '".$pocu."',village = '".$village."',mandal = '".$mandal."',district = '".$district."',state = '".$state."',habitation = '".$habitation."',street = '".$street."',doorno = '".$doorno."',pincode = '".$pincode."',email = '".$email."',pmobile = '".$pmobile."',smobile = '".$smobile."',mole1 = '".$mole1."',mole2 = '".$mole2."',course = '".$course."',year_study = '".$year_study."',section = '".$section."',adm_cat = '".$adm_cat."',cap_cat = '".$cap_cat."', cap_cat_name = '".$cap_cat_name."', sports_cat_name = '".$sports_cat_name."', ncc_cat_name = '".$ncc_cat_name."', nss_cat_name = '".$nss_cat_name."', extra_act_name = '".$extra_act_name."',second_lang = '".$second_lang."',adm_no = '".$adm_no."',adm_date= '".$adm_date."',phy_chal='".$phy_chal."', seligible = '".$seligible."',sch_type = '".$sch_type."',caste_num = '".$caste_num."',income_num= '".$income_num."',ifsc= '".$ifsc."',bankname= '".$bankname."',bank_ac= '".$bank_ac."',banktown= '".$banktown."', reg_date = '".$date."', status = '1' ";
        @$insert = mysqli_query($conn, $sql);
        $last_id = mysqli_insert_id($conn);
        if($insert){
          $_SESSION['id'] = $last_id;
          $_SESSION['smobile'] = $smobile;
          $_SESSION['adm_cat'] = $adm_cat;

      if($result1 && $result2){
        echo "<script>window.location.href='table.php';</script>";
      }
    }
    else{
       echo "<script>alert('Adhar number or rollno or phoneno or email or ssc hall ticket no should be unique')</script>";
      $last_id = mysqli_insert_id($conn);
       @$sql="UPDATE  fee set  rollno = '".$rollno."',sname = '".$sname."', fname = '".$fname."',mname = '".$mname."',ssc_hall= '".$ssc_hall."',aadhar= '".$aadhar."',ssc_year_pass = '".$ssc_year_pass."',ssc_passtype = '".$ssc_passtype."',gender = '".$gender."',religion= '".$religion."',caste= '".$caste."',subcaste= '".$subcaste."',mtongue= '".$mtongue."',nation = '".$nation."',pocu = '".$pocu."',village = '".$village."',mandal = '".$mandal."',district = '".$district."',state = '".$state."',habitation = '".$habitation."',street = '".$street."',doorno = '".$doorno."',pincode = '".$pincode."',email = '".$email."',pmobile = '".$pmobile."',smobile = '".$smobile."',mole1 = '".$mole1."',mole2 = '".$mole2."',course = '".$course."',year_study = '".$year_study."',section = '".$section."',adm_cat = '".$adm_cat."',cap_cat = '".$cap_cat."', cap_cat_name = '".$cap_cat_name."', sports_cat_name = '".$sports_cat_name."', ncc_cat_name = '".$ncc_cat_name."', nss_cat_name = '".$nss_cat_name."', extra_act_name = '".$extra_act_name."', second_lang = '".$second_lang."',adm_no = '".$adm_no."',adm_date= '".$adm_date."',phy_chal='".$phy_chal."', seligible = '".$seligible."',sch_type = '".$sch_type."',caste_num = '".$caste_num."',income_num= '".$income_num."',ifsc= '".$ifsc."',bankname= '".$bankname."',bank_ac= '".$bank_ac."',banktown= '".$banktown."', status = '1' where id='".$last_id."'";
    }
  }
}
//Ending for inserting new record
//Staring code for updating existing record
else{
 //     updated by admin
  @$sql="UPDATE  fee set  rollno = '".$rollno."',sname = '".$sname."', fname = '".$fname."',mname = '".$mname."',ssc_hall= '".$ssc_hall."',aadhar= '".$aadhar."',ssc_year_pass = '".$ssc_year_pass."',ssc_passtype = '".$ssc_passtype."',gender = '".$gender."',religion= '".$religion."',caste= '".$caste."',subcaste= '".$subcaste."',mtongue= '".$mtongue."',nation = '".$nation."',pocu = '".$pocu."',village = '".$village."',mandal = '".$mandal."',district = '".$district."',state = '".$state."',habitation = '".$habitation."',street = '".$street."',doorno = '".$doorno."',pincode = '".$pincode."',email = '".$email."',pmobile = '".$pmobile."',smobile = '".$smobile."',mole1 = '".$mole1."',mole2 = '".$mole2."',course = '".$course."',year_study = '".$year_study."',section = '".$section."',adm_cat = '".$adm_cat."',cap_cat = '".$cap_cat."', cap_cat_name = '".$cap_cat_name."', sports_cat_name = '".$sports_cat_name."', ncc_cat_name = '".$ncc_cat_name."', nss_cat_name = '".$nss_cat_name."', extra_act_name = '".$extra_act_name."', second_lang = '".$second_lang."',adm_no = '".$adm_no."',adm_date= '".$adm_date."',phy_chal='".$phy_chal."', seligible = '".$seligible."',sch_type = '".$sch_type."',caste_num = '".$caste_num."',income_num= '".$income_num."',ifsc= '".$ifsc."',bankname= '".$bankname."',bank_ac= '".$bank_ac."',banktown= '".$banktown."', status = '1' where id='".$_GET['id']."'";
  @$update = mysqli_query($conn, $sql);
  if($update){
    $Message = file_get_contents("http://alerts.adeeptechnologies.com/api/v4/?api_key=A3ca2502007ffe7f750f2ef5e91370064&method=sms&message=Hi+student+your+Epass+Appication+Registered+Succesfully,%0aThanks+Your+ID+is+%0aRegards,%0aAditya+Epass+Team&to=$smobile&sender=ADITYA");
    if ($Message) {
      echo "<script>alert('success');</script>";
    }
    else {
      echo "<script>alert('sms failed');</script>";
    }
  }
  $last_id = $_GET['id'];

}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Shanti" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <style>
  body{
    padding:0px;
    margin:0px;
    background-image: url('images/bg.png');
    font-family: 'Shanti', sans-serif;
  }
  input{
    border-radius: 25px
  }
  input[type="text"]:focus, input[type="number"]:focus, input[type="email"]:focus
  {
    background:#f0f5f5;
  } 
  label
  {
    color:navy;
  }
</style>
</head>
<body>
  <center><div class="container banner" style=" margin: 0px !important;padding: 0px; background: url('images/web.png'); height: 150px; background-repeat: no-repeat; background-size: 100% 100%;">             
  </div></center>
  <div class="container">
    <?php
    @$select_fee = mysqli_query($conn, "select * from fee where id = '".@$_GET['id']."'");
    @$fetch_fee = mysqli_fetch_array($select_fee);
    ?>
    <form method="post" enctype="multipart/form-data" style="background-image: url('images/bg1.png');  background: white;">
      <div class="row">
        <div class="col-md-8 col-sm-12">
          <div class="row">
            <div class="col-sm-6 col-xs-12">
              <div class="form-group">
                <label for="rollno">Student Roll No:</label>
                <input type="text" value="<?php if($_POST){ echo @$_POST['rollno'];} if($_GET){ echo @$fetch_fee['rollno'];}?>" class="form-control" id="rollno" maxlength="10" placeholder="Enter your Roll number" name="rollno">
                <label id="rollno_error" class="text-danger"></label>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12">
              <div class="form-group">
                <label for="name">Student Name:</label>
                <input type="text" value="<?php if($_POST){ echo @$_POST['sname'];} if($_GET){ echo @$fetch_fee['sname'];}?>"class="form-control" id="name" maxlength="50" placeholder="Enter your Name" name="sname">
                <label></label>
              </div>
            </div> 
          </div>
          <div class="row">
            <div class="col-sm-6 col-xs-12">
              <div class="form-group">
                <label for="fathername">Father Name:</label>
                <input type="text" value="<?php if($_POST){ echo @$_POST['fname'];} if($_GET){ echo @$fetch_fee['fname'];}?>" class="form-control" id="fname" placeholder="Enter your Father Name" name="fname">
              </div>
            </div>
            <div class="col-sm-6 col-xs-12">
              <div class="form-group">
                <label for="mothername">Mother Name:</label>
                <input type="text" value="<?php if($_POST){ echo @$_POST['mname'];} if($_GET){ echo @$fetch_fee['mname'];}?>" class="form-control" id="mname" placeholder="Enter your Mother Name" name="mname">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-xs-12">
              <div class="form-group">
                <label for="HTNO">SSC/CBSE/ICSE/Other Board HT No:</label>
                <input type="text" value="<?php if($_POST){ echo @$_POST['ssc_hall'];} if($_GET){ echo @$fetch_fee['ssc_hall'];}?>" class="form-control" id="ssc_hall" maxlength="15" placeholder="Enter your Hall Ticket Number" name="ssc_hall">
                <label id="ssc_hall_error" class="text-danger"></label>
              </div>
            </div>
            <div class="col-sm-6 col-xs-12">
              <div class="form-group">
                <label for="adhar">Student Aadhar Number:<span style="color:red;">*</span></label>
                <input type="number" value="<?php if($_POST){ echo @$_POST['aadhar'];} if($_GET){ echo @$fetch_fee['aadhar'];}?>" class="form-control" id="aadhar" maxlength="12" placeholder="Enter your AadharNumber" name="aadhar" >
                <label class="text-danger" id="aadhar_error"></label>
              </div>
            </div>  
          </div>
          <div class="row">
            <div class="col-sm-6 col-xs-12">
              <div class="form-group">
                <label for="number">Year of Pass(SSC/CBSE/ICSE/Other):</label>
                <select class="form-control" name="ssc_year_pass" value="<?php if($_POST){ echo @$_POST['ssc_year_pass'];} if($_GET){ echo @$fetch_fee['ssc_year_pass'];}?>">
                 <option value="">--Select--</option>
                 <option  value="2011" <?php if(@$_POST['ssc_year_pass']==2011) echo "selected" ?> >2011</option>
                 <option value="2012" <?php if(@$_POST['ssc_year_pass']==2012) echo "selected" ?> > 2012</option>
                 <option value="2013" <?php if(@$_POST['ssc_year_pass']==2013) echo "selected" ?> >2013</option>
                 <option value="2014" <?php if(@$_POST['ssc_year_pass']==2014) echo "selected" ?> >2014</option>
                 <option value="2015" <?php if(@$_POST['ssc_year_pass']==2015) echo "selected" ?> >2015</option>
                 <option value="2016" <?php if(@$_POST['ssc_year_pass']==2016) echo "selected" ?> >2016</option>
                 <option value="2017" <?php if(@$_POST['ssc_year_pass']==2017) echo "selected" ?> >2017</option>
                 <option value="2018" <?php if(@$_POST['ssc_year_pass']==2018) echo "selected" ?> >2018</option>
               </select>
             </div>
           </div><br>
           <div class="col-sm-6 col-xs-12">
            <div class="form-group">
              <label>Pass Type:</label>
              <label class="radio-inline"><input type="radio" value="Regular" name="ssc_passtype" value="<?php if($_POST){ echo @$_POST['ssc_passtype'];} if($_GET){ echo @$fetch_fee['ssc_passtype'];}?>">Regular</label>
              <label class="radio-inline"><input type="radio" value="Supply" name="ssc_passtype" value="<?php if($_POST){ echo @$_POST['ssc_passtype'];} if($_GET){ echo @$fetch_fee['ssc_passtype'];}?>">Supply</label> 
            </div>
          </div>
          <div class="clearfix"></div>
           <div class="col-sm-6">
            <div class="form-group">
              <label for="Date Of Birth">Date Of Birth:</label>
              <input type="date" class="form-control" id="dateofbirth" placeholder="Date of Birth" name="birth_date">
            </div>
          </div><br>
          <div class="col-sm-6 col-xs-12">
            <div class="form-group">
             <label>Gender:</label> 
             <label class="radio-inline"><input type="radio" value="Male" name="gender" value="<?php if($_POST){ echo @$_POST['gender'];} if($_GET){ echo @$fetch_fee['gender'];}?>">Male</label>
             <label class="radio-inline"><input type="radio" value="Female" name="gender" value="<?php if($_POST){ echo @$_POST['gender'];} if($_GET){ echo @$fetch_fee['gender'];}?>"> Female</label> 
           </div>
         </div>
       </div>
       <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="religion">Religion:</label>
            <input type="text"  value="<?php if($_POST){ echo @$_POST['religion'];} if($_GET){ echo @$fetch_fee['religion'];}?>" class="form-control" id="religion" placeholder="Enter your Religion"  name="religion">  
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="caste">Caste Category</label>
            <input type="text" value="<?php if($_POST){ echo @$_POST['caste'];} if($_GET){ echo @$fetch_fee['caste'];}?>" class="form-control" id="caste" placeholder="Enter your Caste"  name="caste">  
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="scaste">Sub Caste </label>
            <input type="text" value="<?php if($_POST){ echo @$_POST['subcaste'];} if($_GET){ echo @$fetch_fee['subcaste'];}?>" class="form-control" id="scaste" placeholder="Enter your Sub Caste" name="subcaste"></div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
            <label for="mtongue">Mother Tongue</label>
            <input type="text" value="<?php if($_POST){ echo @$_POST['mtongue'];} if($_GET){ echo @$fetch_fee['mtongue'];}?>" class="form-control" id="mtongue" placeholder="Enter your Mother Tongue"  name="mtongue">  
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="nation">Nationality</label>
            <input type="text" value="<?php if($_POST){ echo @$_POST['nation'];} if($_GET){ echo @$fetch_fee['nation'];}?>" class="form-control" id="nation" placeholder="Enter your Nationality"  name="nation">  
          </div>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="poccupation">(Parent Occupation)</label>
            <input type="text" value="<?php if($_POST){ echo @$_POST['pocu'];} if($_GET){ echo @$fetch_fee['pocu'];}?>" class="form-control" id="pocc" placeholder="Enter your Parent Occupation"  name="pocu">  
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <br>
      <div class="col-md-6" style="margin-left: 17%;">
       <div  style="background:url(images/user.png); background-repeat: no-repeat; background-position: center center; background-size: 100% 100%; height: 200px; width:170px;">
         <img class="image_upload image-responsive" src="images/user.png" style="height: 200px; width:170px; border:1px solid black;">
         <div class="clearfix"></div>
       </div><br/>
       <div class="col-md-12">
        <input type="file" name="photo" value="<?php echo @$_POST['photo'] ?>" id="photo" required >
        <label class="text-primary" id="photo_message"></label>
      </div>
      <label class="text-danger"><?php if(isset($arr["photo"])){print_r($arr["photo"]);} ?></label>
      <div class="clearfix"></div>
    </div>
    <div class="col-md-12" style="margin-left:17%; margin-top: 5%;">
      <label>Upload your Signature</label>
      <div>
        <img class="signature_upload image-responsive" src="images/sign1.png" style="height: 60px; width:140px; border:1px solid black;" >
        <div class="clearfix"></div>
      </div><br/>
      <div class="col-md-12">
        <input type="file" name="signature" value="<?php echo @$_POST['signature'] ?>" id="signature" required>
        <label class="text-danger"><?php if(isset($arr["signature"])){print_r($arr["signature"]);} ?></label>
      </div>
    </div>
  </div>
</div>
<hr style="height:2px; background-color:black">
<h3>Present Address</h3><br>
<div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <label for="Village">Village:<span style="color:red;">*</span></label>
      <input type="text" value="<?php if($_POST){ echo @$_POST['village'];} if($_GET){ echo @$fetch_fee['village'];}?>" class="form-control" id="village" placeholder="Enter Village Name" name="village" >
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label for="mandal">Mandal:<span style="color:red;">*</span></label>
      <input type="text" value="<?php if($_POST){ echo @$_POST['mandal'];} if($_GET){ echo @$fetch_fee['mandal'];}?>" class="form-control" id="mandal" placeholder="Enter Mandal Name" name="mandal" >
    </div>
  </div>
  <div class="col-sm-4">
    <div class="form-group">
      <label for="district">District:<span style="color:red;">*</span></label>
      <input type="text" value="<?php if($_POST){ echo @$_POST['district'];} if($_GET){ echo @$fetch_fee['district'];}?>" class="form-control" id="district" placeholder="Enter district Name" name="district" >
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="form-group">
     <label for="states">States:<span style="color:red;">*</span></label>
     <select class="form-control" name="state" value="<?php if($_POST){ echo @$_POST['state'];} if($_GET){ echo @$fetch_fee['state'];}?>" >
       <option value="">--Select--</option>
       <option value="Andhra Pradesh" <?php if(@$_POST['state']=="Andhra Pradesh") echo "selected"; ?>>Andhra Pradesh</option>
       <option value="Arunachal Pradesh" <?php if(@$_POST['state']=="Arunachal Pradesh") echo "selected"; ?>>Arunachal Pradesh</option>
       <option value="Assam" <?php if(@$_POST['state']=="Assam") echo "selected"; ?> >Assam</option>
       <option value="Bihar" <?php if(@$_POST['state']=="Bihar") echo "selected"; ?> >Bihar</option>
       <option value="Chhattisgarh" <?php if(@$_POST['state']=="Chhattisgarh") echo "selected"; ?> >Chhattisgarh</option>
       <option value="Goa" <?php if(@$_POST['state']=="Goa") echo "selected"; ?> >Goa</option>
       <option value="Gujarat" <?php if(@$_POST['state']=="Gujarat") echo "selected"; ?> >Gujarat</option>
       <option value="Haryana" <?php if(@$_POST['state']=="Haryana") echo "selected"; ?> >Haryana</option>
       <option value="Himachal Pradesh" <?php if(@$_POST['state']=="Himachal Pradesh") echo "selected"; ?> >Himachal Pradesh</option>
       <option value="Jammu & Kashmir" <?php if(@$_POST['state']=="Jammu & Kashmir") echo "selected"; ?> >Jammu & Kashmir</option>
       <option value="Jharkhand" <?php if(@$_POST['state']=="Jharkhand") echo "selected"; ?> >Jharkhand</option>
       <option value="Kerala" <?php if(@$_POST['state']=="Kerala") echo "selected"; ?> >Kerala</option>
       <option value="Karnataka" <?php if(@$_POST['state']=="Karnataka") echo "selected"; ?> >Karnataka</option>
       <option value="Madhya Pradesh" <?php if(@$_POST['state']=="Madhya Pradesh") echo "selected"; ?> >Madhya Pradesh</option>
       <option value="Maharashtra" <?php if(@$_POST['state']=="Maharashtra") echo "selected"; ?> >Maharashtra</option>
       <option value="Manipur" <?php if(@$_POST['state']=="Manipur") echo "selected"; ?> >Manipur</option>
       <option value="Meghalaya" <?php if(@$_POST['state']=="Meghalaya") echo "selected"; ?> >Meghalaya</option>
       <option value="Mizoram" <?php if(@$_POST['state']=="Mizoram") echo "selected"; ?> >Mizoram</option>
       <option value="Nagaland" <?php if(@$_POST['state']=="Nagaland") echo "selected"; ?> >Nagaland</option>
       <option value="Odisha" <?php if(@$_POST['state']=="Odisha") echo "selected"; ?> >Odisha</option>
       <option value="Punjab" <?php if(@$_POST['state']=="Punjab") echo "selected"; ?> >Punjab</option>
       <option value="Rajasthan" <?php if(@$_POST['state']=="Rajasthan") echo "selected"; ?> >Rajasthan</option>
       <option value="Sikkim" <?php if(@$_POST['state']=="Sikkim") echo "selected"; ?> >Sikkim</option>
       <option value="Tamil Nadu" <?php if(@$_POST['state']=="Tamil Nadu") echo "selected"; ?> >Tamil Nadu</option>
       <option value="Telangana" <?php if(@$_POST['state']=="Telangana") echo "selected"; ?> >Telangana</option>
       <option value="Tripura" <?php if(@$_POST['state']=="Tripura") echo "selected"; ?> >Tripura</option>
       <option value="Uttarkhand" <?php if(@$_POST['state']=="Uttarkhand") echo "selected"; ?> >Uttarkhand</option>
       <option value="Uttar Pradesh" <?php if(@$_POST['state']=="Uttar Pradesh") echo "selected"; ?> >Uttar Pradesh</option>
       <option value="West Bengal" <?php if(@$_POST['state']=="West Bengal") echo "selected"; ?> >West Bengal</option>
     </select>
   </div>
 </div> 
 <div class="col-sm-6" >
  <div class="form-group">
    <label for="habitation">Habitation:<span style="color:red;">*</span></label>
    <input type="text" value="<?php if($_POST){ echo @$_POST['habitation'];} if($_GET){ echo @$fetch_fee['habitation'];}?>" class="form-control" id="habitation" placeholder="Enter your native place" name="habitation" >
  </div>
</div> 
</div>
<div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <label for="Street/Land mark"> Street/Land mark:<span style="color:red;">*</span></label>
      <input type="text" value="<?php if($_POST){ echo @$_POST['street'];} if($_GET){ echo @$fetch_fee['street'];}?>" class="form-control" id="street" placeholder="Enter Street/Land mark" name="street" >
    </div>
  </div> 
  <div class="col-sm-4">
    <div class="form-group">
      <label for="Door/House No">  Door/House No:<span style="color:red;">*</span></label>
      <input type="text" value="<?php if($_POST){ echo @$_POST['doorno'];} if($_GET){ echo @$fetch_fee['doorno'];}?>" class="form-control" id="doorno" placeholder="Enter  Door/House No" name="doorno" >
    </div>
  </div> 
  <div class="col-sm-4">
    <div class="form-group">
      <label for="Pincode">Pincode:<span style="color:red;">*</span></label>
      <input type="text" value="<?php if($_POST){ echo @$_POST['pincode'];} if($_GET){ echo @$fetch_fee['pincode'];}?>" class="form-control" id="Pincode" placeholder="Enter  Pincode" name="pincode" maxlength="6"
      >
    </div>
  </div> 
</div>
<hr style="height:1px; background-color:black">
<h3>Other Details</h3><br>
<div class="row">
  <div class="col-sm-12">
    <div class="form-group">
      <label for="email">Email:<span style="color:red;">*</span></label>
      <input type="email" value="<?php if($_POST){ echo @$_POST['email'];} if($_GET){ echo @$fetch_fee['email'];}?>" class="form-control" id="email" placeholder="Enter email" name="email"  >
      <label class="text-danger" id="email_error"></label>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="form-group">
      <label for="contact no">Parents contact no:<span style="color:red;">*</span></label>
      <input type="number" value="<?php if($_POST){ echo @$_POST['pmobile'];} if($_GET){ echo @$fetch_fee['pmobile'];}?>" class="form-control" id="contact"  min="6000000000" max="9999999999" placeholder="Enter contact no" name="pmobile" required >
    </div>
  </div> 
  <div class="col-sm-6">
    <div class="form-group">
      <label for="mobileno">Student MobileNo:<span style="color:red;">*</span></label>
      <input type="number" value="<?php if($_POST){ echo @$_POST['smobile'];} if($_GET){ echo @$fetch_fee['smobile'];}?>" class="form-control" id="smobile" min="6000000000" max="9999999999" placeholder="Enter Student MobileNo" name="smobile" required>
      <label class="text-danger" id="smobile_error"></label>
    </div>
  </div> 
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="form-group">
      <label for="marks1">Identification Marks1:</label>
      <input type="text" value="<?php if($_POST){ echo @$_POST['mole1'];} if($_GET){ echo @$fetch_fee['mole1'];}?>" class="form-control" id="marks1" placeholder="Enter identification moles1" name="mole1">
    </div>
  </div> 
  <div class="col-sm-6">
    <div class="form-group">
      <label for="marks2">Identification Marks2:</label>
      <input type="text" value="<?php if($_POST){ echo @$_POST['mole2'];} if($_GET){ echo @$fetch_fee['mole2'];}?>" class="form-control" id="marks2" placeholder="Enter Identification moles2" name="mole2">
    </div>
  </div> 
</div>
<hr style="height:1px; background-color:black">
<h3>Admission Details</h3><br>
<div class="row">
  <div class="col-sm-4">
    <div class="form-group">
      <label for="course/group">Course/Group:</label>
      <select class="form-control" name="course" value="<?php if($_POST){ echo @$_POST['course'];} if($_GET){ echo @$fetch_fee['course'];}?>">
        <option value="">--Select--</option>
        <option value="agri" <?php if(@$_POST['course']=="agri") echo "selected";?>>Agriculture Engineering</option>
        <option value="civil" <?php if(@$_POST['course']=="civil") echo "selected";?> >Civil Engineering</option>
        <option value="cse" <?php if(@$_POST['course']=="cse") echo "selected";?>>ComputerScienceEngineeering</option>
        <option value="ece" <?php if(@$_POST['course']=="ece") echo "selected";?>>Electronics and Communication Engineeering</option>
        <option value="eee" <?php if(@$_POST['course']=="eee") echo "selected";?>>Electronics and Electrical Engineering</option>
        <option value="it" <?php if(@$_POST['course']=="it") echo "selected";?>>Information Technology</option>
        <option value="mech" <?php if(@$_POST['course']=="mech") echo "selected";?>>Mechanical Engineeering</option>
        <option value="min" <?php if(@$_POST['course']=="min") echo "selected";?>>Mining </option>
        <option value="pt" <?php if(@$_POST['course']=="pt") echo "selected";?>>Petroleum</option>
      </select>
    </div>
  </div> 
  <div class="col-sm-4">
    <div class="form-group">
      <label for="year of study">Year of study:</label>
      <input type="text" value="<?php if($_POST){ echo @$_POST['year_study'];} if($_GET){ echo @$fetch_fee['year_study'];}?>" class="form-control" id="study" placeholder="Enter year of study" name="year_study">
    </div>
  </div> 
  <div class="col-sm-4">
    <div class="form-group">
      <label for="Section">Section:</label>
      <select class="form-control" name="section" value="<?php if($_POST){ echo @$_POST['section'];} if($_GET){ echo @$fetch_fee['section'];}?>">
        <option value="">--Select--</option>
        <option value="A" <?php if(@$_POST['section']=="A") echo"selected";?>>A</option>
        <option value="B" <?php if(@$_POST['section']=="B") echo"selected";?>>B</option>
        <option value="C" <?php if(@$_POST['section']=="C") echo"selected";?>>C</option>
        <option value="D" <?php if(@$_POST['section']=="D") echo"selected";?>>D</option>
      </select>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="form-group">
      <label for="category">Admission Category:</label>
      <select class="form-control" name="adm_cat" value="<?php if($_POST){ echo @$_POST['adm_cat'];} if($_GET){ echo @$fetch_fee['adm_cat'];}?>" >
        <option value="">--Select--</option>
        <option value="Convener" <?php if(@$_POST['adm_cat']=="Convener") echo "selected";?>>Convener</option>
        <option value="Management" <?php if(@$_POST['adm_cat']=="Management") echo "selected";?>>Management</option>
        <option value="Management" <?php if(@$_POST['adm_cat']=="Management") echo "selected";?>>Spot Admission</option>
      </select>
    </div>
  </div>  
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="form-group">
      <label for="special category">Special Category:</label>
      <select class="form-control" name="cap_cat" id="cap_cat" value="<?php if($_POST){ echo @$_POST['cap_cat'];} if($_GET){ echo @$fetch_fee['cap_cat'];}?>" onchange="cap()" multiple>
       <option value="">--Select--</option>
       <option value="CAP Category" <?php if(@$_POST['cap_cat']=="CAP Category") echo "selected";?>>Cap Category</option>
       <option value="Sports Category" <?php if(@$_POST['cap_cat']=="Sports Category") echo "selected";?>>Sports Category</option>
       <option value="NCC Category" <?php if(@$_POST['cap_cat']=="NCC Category") echo "selected";?>>NCC Category</option>
       <option value="NSS Category" <?php if(@$_POST['cap_cat']=="NSS Category") echo "selected";?>>NSS Category</option>
       <option value="Extracircular Activity" <?php if(@$_POST['cap_cat']=="Extracircular Activity") echo "selected";?>>Extracircular Activity</option>
     </select>
   </div>
 </div>
 <div class="col-sm-6">   
  <div class="col-sm-12" id="cap" style="display:none;">
    <div class="col-sm-6" >
      <div class="form-group"> 
        <label>cap Category certificate:</label>
        <input type="text" name="cap_cat_name" value="<?php if($_POST){ echo @$_POST['cap_cat_name'];} if($_GET){ echo @$fetch_fee['cap_cat_name'];}?>" id="cap_cat_name" class="form-control">
      </div>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <label style="display: inline-block;">Upload your Certificate</label>
        <input type="file" name="cap_cat_file" value="<?php if($_POST){ echo @$_POST['cap_cat_file'];} if($_GET){ echo @$fetch_fee['cap_cat_file'];}?>" id="cap_cat_file">
        <label class="text-danger"><?php if(isset($arr["cap_cat_file"])){print_r($arr["cap_cat_file"]);} ?></label>
      </div>
    </div>
    <div class="col-sm-1" id="close_cap" style="cursor: pointer;"><span class="badge text-center" style="background-color: red;">X</span></div>
  </div>
  <div class="col-sm-12" id="sports" style="display:none;">
    <div class="col-sm-6" >
      <div class="form-group"> 
        <label>Sports Category certificate:</label>
        <input type="text" name="sports_cat_name" value="<?php if($_POST){ echo @$_POST['sports_cat_name'];} if($_GET){ echo @$fetch_fee['sports_cat_name'];}?>" id="sports_cat_name" class="form-control">
      </div>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <label style="display: inline-block;">Upload your Certificate</label>
        <input type="file" name="sports_cat_file" value="<?php if($_POST){ echo @$_POST['sports_cat_file'];} if($_GET){ echo @$fetch_fee['sports_cat_file'];}?>" id="sports_cat_file">
        <label class="text-danger"><?php if(isset($arr["sports_cat_file"])){print_r($arr["sports_cat_file"]);} ?></label>
      </div>
    </div>
    <div class="col-sm-1" id="close_sports" style="cursor: pointer;"><span class="badge text-center" style="background-color: red;">X</span></div>
  </div>
  <div class="col-sm-12" id="ncc" style="display:none;">
    <div class="col-sm-6" >
      <div class="form-group"> 
        <label>NCC Category certificate:</label>
        <input type="text" name="ncc_cat_name" value="<?php if($_POST){ echo @$_POST['ncc_cat_name'];} if($_GET){ echo @$fetch_fee['ncc_cat_name'];}?>" id="ncc_cat_name" class="form-control">
      </div>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <label style="display: inline-block;">Upload your Certificate</label>
        <input type="file" name="ncc_cat_file" value="<?php if($_POST){ echo @$_POST['ncc_cat_file'];} if($_GET){ echo @$fetch_fee['ncc_cat_file'];}?>" id="ncc_cat_file">
        <label class="text-danger"><?php if(isset($arr["ncc_cat_file"])){print_r($arr["ncc_cat_file"]);} ?></label>
      </div>
    </div>
    <div class="col-sm-1" id="close_ncc" style="cursor: pointer;"><span class="badge text-center" style="background-color: red;">X</span></div>
  </div>
  <div class="col-sm-12" id="nss" style="display:none;">
    <div class="col-sm-6" >
      <div class="form-group"> 
        <label>NSS Category certificate:</label>
        <input type="text" name="nss_cat_name" value="<?php if($_POST){ echo @$_POST['nss_cat_name'];} if($_GET){ echo @$fetch_fee['nss_cat_name'];}?>" id="nss_cat_name" class="form-control">
      </div>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <label style="display: inline-block;">Upload your Certificate</label>
        <input type="file" name="nss_cat_file" value="<?php if($_POST){ echo @$_POST['nss_cat_file'];} if($_GET){ echo @$fetch_fee['nss_cat_file'];}?>" id="nss_cat_file">
        <label class="text-danger"><?php if(isset($arr["nss_cat_file"])){print_r($arr["nss_cat_file"]);} ?></label>
      </div>
    </div>
    <div class="col-sm-1" id="close_nss" style="cursor: pointer;"><span class="badge text-center" style="background-color: red;">X</span></div>
  </div>
  <div class="col-sm-12" id="extra" style="display:none;">
    <div class="col-sm-6" >
      <div class="form-group"> 
        <label>Extracircular Activity certificate:</label>
        <input type="text" name="extra_act_name" value="<?php if($_POST){ echo @$_POST['extra_act_name'];} if($_GET){ echo @$fetch_fee['extra_act_name'];}?>" id="extra_act_name" class="form-control">
      </div>
    </div>
    <div class="col-sm-5">
      <div class="form-group">
        <label style="display: inline-block;">Upload your Certificate</label>
        <input type="file" name="extra_act_file" value="<?php if($_POST){ echo @$_POST['extra_act_file'];} if($_GET){ echo @$fetch_fee['extra_act_file'];}?>" id="extra_act_file">
        <label class="text-danger"><?php if(isset($arr["extra_act_file"])){print_r($arr["extra_act_file"]);}?></label>
      </div>
    </div>
    <div class="col-sm-1" id="close_extra" style="cursor: pointer;"><span class="badge text-center" style="background-color: red;">X</span></div>
  </div>
</div>
</div>
<div class="row">
  <div class="col-sm-12">
    <div class="form-group">
      <label for="second">Second language:</label>
      <input type="text" class="form-control" id="second" value="<?php if($_POST){ echo @$_POST['second_lang'];} if($_GET){ echo @$fetch_fee['second_lang'];}?>" placeholder="Enter second language" name="second_lang">
    </div>
  </div> 
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="form-group">
      <label for="Admission No">Admission No:</label>
      <input type="number" class="form-control" value="<?php if($_POST){ echo @$_POST['adm_no'];} if($_GET){ echo @$fetch_fee['adm_no'];}?>" id="adno" placeholder="Enter Admission No" name="adm_no">
    </div>
  </div>
  <div class="col-sm-6">
    <div class="form-group">
      <label for="Date Of Admission">Date Of Admission:</label>
      <input type="date" class="form-control" value="<?php if($_POST){ echo @$_POST['adm_date'];} if($_GET){ echo @$fetch_fee['adm_date'];}?>" id="dateadno" placeholder="Enter Date Of Admission" name="adm_date">
    </div>
  </div> 
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label>Is the Student Eligible for Scholarship:</label>
              <select class="form-control" name="seligible" id="seligible" value="<?php echo $fetch_fee['seligible'] ?>" >
                <option value="">--Select--</option>
                <option value="Yes" <?php if($fetch_fee['seligible']=="Yes") echo "selected";?>>Yes</option>
                <option value="No" <?php if($fetch_fee['seligible']=="No") echo "selected";?>>No</option>
              </select>
       </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="form-group">
      <label for="Date Of Admission">Physically Challenged:</label>
      <select class="form-control" name="phy_chal" value="<?php if($_POST){ echo @$_POST['phy_chal'];} if($_GET){ echo @$fetch_fee['phy_chal'];}?>" id="phy_chal" onchange="physically()">
        <option value="">--Select--</option>
        <option value="yes"  >Yes</option>
        <option value="no"  >No</option>
      </select>
    </div>
  </div> 
  <div class="col-sm-6" id="phy_certi" style="display: none;">
    <div class="form-group">
     <label style="display: inline-block;">Upload your Certificate</label>
     <input type="file" name="phy_certi" value="<?php if($_POST){ echo @$_POST['phy_certi'];} if($_GET){ echo @$fetch_fee['phy_certi'];}?>">
     <label class="text-danger"><?php if(isset($arr["phy_certi"])){print_r($arr["phy_certi"]);} ?></label>
   </div>
 </div> 
</div>
<div class="row">
  <div class="col-sm-12">
    <div class="form-group">
      <label>ScholarShip Type:<span style="color:red;">*</span></label>
      <select class="form-control" name="sch_type" id="sch_type" value="<?php if($_POST){ echo @$_POST['sch_type'];} if($_GET){ echo @$fetch_fee['sch_type'];}?>" >
        <option value="">--Select--</option>
        <option value="Day Scholar" <?php if(@$_POST['sch_type']=="Day Scholar") echo "selected";?>>Day Scholar(DS)</option>
        <option value="Student managed hostel" <?php if(@$_POST['sch_type']=="Student managed hostel") echo "selected";?>>Student managed hostel(SMH)</option>
        <option value="Department Hostel" <?php if(@$_POST['sch_type']=="Department Hostel") echo "selected";?>>Department Hostel(Government Hostel)</option>     
      </select>
    </div>
  </div>
</div> 
<div class="row">
  <div class="col-sm-6">
    <label for="Admission No">Caste Certificate Details:</label>
    <div class="form-group">
      <label for="Admission No">Meeseva Certificate Number:</label>
      <input type="text" maxlength="20" class="form-control" id="meesevanum"   name="caste_num" value="<?php if($_POST){ echo @$_POST['caste_num'];} if($_GET){ echo @$fetch_fee['caste_num'];}?>">
    </div>
  </div> 
  <div class="col-sm-6">
    <label for="Admission No">Income Certificate Details:</label>
    <div class="form-group">
      <label for="Admission No">Meeseva Certificate Number/White Ration Card Number</label>
      <input type="text" maxlength="20" class="form-control" id="meesevanum"   name="income_num" value="<?php if($_POST){ echo @$_POST['income_num'];} if($_GET){ echo @$fetch_fee['income_num'];}?>">
    </div>
  </div> 
</div>
<hr style="height:2px; background-color:black">
<h3>Bank Account Details</h3>
<div class="row">
  <div class="col-sm-6">
    <div class="form-group">
      <label for="ifsc">Bank IFSC Code:<span style="color:red;">*</span></label>
      <input type="text" class="form-control" id="ifsc" placeholder="Enter Bank IFSC Code" name="ifsc" value="<?php if($_POST){ echo @$_POST['ifsc'];} if($_GET){ echo @$fetch_fee['ifsc'];}?>" >
    </div>
  </div>
  <div class="col-sm-6">
    <div class="form-group">
      <label for="bankname">Bank Name</label>
      <input type="text" class="form-control" id="bankname" placeholder="Enter Bank Name" name="bankname" value="<?php if($_POST){ echo @$_POST['bankname'];} if($_GET){ echo @$fetch_fee['bankname'];}?>">
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <div class="form-group">
      <label for="bacno">Bank Account No:<span style="color:red;">*</span></label>
      <input type="number" class="form-control" id="bacno" placeholder="Enter Bank Account No" name="bank_ac" value="<?php if($_POST){ echo @$_POST['bank_ac'];} if($_GET){ echo @$fetch_fee['bank_ac'];}?>" >
    </div>
  </div>
  <div class="col-sm-6">
    <div class="form-group">
      <label for="banktown">Bank Town</label>
      <input type="text" class="form-control" id="banktown" placeholder="Enter Bank Town" name="banktown" value="<?php if($_POST){ echo @$_POST['banktown'];} if($_GET){ echo @$fetch_fee['banktown'];}?>">
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-2 col-md-offset-8 pull-right">
    <br>
    <input type="submit" name="register" value="submit" class="btn btn-success">
  </div>
</div>
<br><br>
</form>
</div>
</body>
</html>
<script>
  function physically(){
    var phy_status = document.getElementById('phy_chal').value;
    if(phy_status=="yes"){
      document.getElementById('phy_certi').style.display = "block";
          }else{
            document.getElementById('phy_certi').style.display = "none";
          }
        }
        function cap(){
         var capcat = document.getElementById('cap_cat').value;
         if(capcat=="CAP Category")
         {
          document.getElementById('cap').style.display = "block";
         }
         else if(capcat=="Sports Category")
         {
          document.getElementById('sports').style.display = "block";
         }
         else if(capcat=="NCC Category")
        {
          document.getElementById('ncc').style.display = "block";
        }
        else if(capcat=="NSS Category")
        {
          document.getElementById('nss').style.display = "block";
        }
        else if(capcat=="Extracircular Activity")
        {
         document.getElementById('extra').style.display = "block";
        }
        else
        {
         document.getElementById('cap').style.display = "none";
         document.getElementById('ncc').style.display = "none";
         document.getElementById('sports').style.display = "none";
         document.getElementById('nss').style.display = "none";
         document.getElementById('extra').style.display = "none";
       }
     }  
 </script>
 <script>
  $('#close_cap').click(function(){
    $('#cap').hide();
  });

  $('#close_sports').click(function(){
    $('#sports').hide();
  });

  $('#close_nss').click(function(){
    $('#nss').hide();
  });

  $('#close_ncc').click(function(){
    $('#ncc').hide();
  });

  $('#close_extra').click(function(){
    $('#extra').hide();
  });
</script>
 <script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('.image_upload').attr('src', e.target.result);
        // alert(e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#photo").change(function(){
    readURL(this);
  });
</script>
<script>
 $("#signature").change(function(){
    readURLS(this);
  }); 
   function readURLS(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('.signature_upload').attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script> 
<script>
 $('#aadhar').keyup(function(){
    var aadhar = document.getElementById('aadhar').value;
    $.ajax({url:"ajax.php?act=error&aadhar="+aadhar,success:function(result){
     document.getElementById('aadhar_error').innerHTML=result; }
   });
  }); 
  $('#email').keyup(function(){
    var email=document.getElementById('email').value;
    $.ajax({url:"ajax.php?email="+email,success:function(result){
      document.getElementById('email_error').innerHTML=result;
    }
  });

  });
  $('#smobile').keyup(function(){
    var mobileno = document.getElementById('smobile').value;
    $.ajax({url:"ajax.php?act=error&smobile="+mobileno ,success:function(result){
     document.getElementById('smobile_error').innerHTML=result; }
   }); 

  });
  $('#rollno').keyup(function(){
    var rollno=document.getElementById('rollno').value;
    $.ajax({url:"ajax.php?rollno="+rollno, success:function(result){
     document.getElementById('rollno_error').innerHTML=result;
   }});

  });
  $('#ssc_hall').keyup(function(){
    var ssc_hall=document.getElementById('ssc_hall').value;
    $.ajax({url:"ajax.php?ssc_hall="+ssc_hall, success:function(result){
      document.getElementById('ssc_hall_error').innerHTML=result;
    }
  });
  });

  $('#photo').onclick(function(){
    var photo=document.getElementById('photo').value;
    $.ajax({url:"ajax.php?photo="+photo, success:function(result){
      document.getElementById('photo_message').innerHTML=result;
    }
  });
  });
</script>