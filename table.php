<?php
include "config.php";
?>
<?php
session_start();
include "config.php";
$id= $_SESSION['id'];
$smobile= $_SESSION['smobile'];
$adm_cat=$_SESSION['adm_cat'];
$arr = array("sscfee"=>"","incomefee"=>"","castefee"=>"","saadharfee"=>"","bankbookfee"=>"","clgallotfee"=>"","sscnonfee"=>"","saadharnonfee"=>"","clgallotnonfee"=>"");
if(isset($_POST['update'])){
  $i=0;
  if($adm_cat=="Convener"){ 
    //Start of ssc certificate for non-fee file uploading
    if($_FILES['ssc_scan_fee']['name']!='')
    {
      $_SESSION['ssc_scan_fee']=$_FILES['ssc_scan_fee']['tmp_name'];
      $sscmarkslist_target="images/sscmarkslist/";
      $ssc_scan_fee=$_FILES['ssc_scan_fee']['name'];
      $sscmarkslist_temp_name=$_FILES['ssc_scan_fee']['tmp_name'];
      $ssc_name_array=explode('.', $ssc_scan_fee);
      $ssc_count=count($ssc_name_array)-1;
      $ssc_format=$ssc_name_array[$ssc_count];
      $final_ssc_marks_list = substr($ssc_scan_fee, 0, strlen($ssc_scan_fee)-4).$id.".".$ssc_format;
      $size2=$_FILES['ssc_scan_fee']['size'];
      if( $ssc_format!='pdf' &&  $ssc_format!='doc' &&  $ssc_format!='txt')
      {
        $arr["sscfee"]="Please check your file format";
      }
      elseif($size2>204800){
        $arr["sscfee"]="Your file size should be less that 200kb";
      }
      else
      {
        $sign3=move_uploaded_file($sscmarkslist_temp_name,$sscmarkslist_target.$final_ssc_marks_list);
        if ($sign3)
        {
          $update= mysqli_query($conn, "UPDATE fee set ssc_scan_fee='".$final_ssc_marks_list."' where id='".$id."'");
          if($update)
          {
            
            $arr["sscfee"]="File Uploaded Succesfully";
          }else
          {
           
            $arr["sscfee"]="Your File not Uploaded....";
          }
        }
      }   
    }
// End of ssc certificate for non-fee file uploading
// ..................income certificate..................................
    if($_FILES['income_scan_fee']['name']!=''){
      $income_cert_target="images/incomecertificatelist/";
      $income_certificate_list=$_FILES['income_scan_fee']['name'];
      $income_certificate_temp_name=$_FILES['income_scan_fee']['tmp_name'];
      $income_certificate_array=explode('.', $income_certificate_list);
      $income_count=count($income_certificate_array)-1;
      $income_format=$income_certificate_array[$income_count];
      $final_income_name = substr($income_certificate_list, 0, strlen($income_certificate_list)-4).$id.".".$income_format;
      $income_size=$_FILES['income_scan_fee']['size'];
      if( $income_format!='pdf' &&  $income_format!='doc' &&  $income_format!='txt')
      {
        $arr["incomefee"]="Please check your file format";
      }
      elseif($income_size>204800){
        $arr["incomefee"]="Your file size should be less that 200kb";
      }
      else
      {
        $sign4=move_uploaded_file($income_certificate_temp_name,$income_cert_target.$final_income_name);
        if ($sign4)
        {
          $update= mysqli_query($conn, "UPDATE fee set income_scan_fee='".$final_income_name."', status = '1' where id='".$id."'");
          if($update){
            
            $arr["incomefee"]="File Uploaded Succesfully";
          }else{
           
            $arr["incomefee"]="Your File not Uploaded....";
          }
        }
      }
    }
// End of Income certificate
// ...................caste certificate............................................
    if($_FILES['caste_scan_fee']['name']!=''){
      $caste_cert_target="images/castecertificatelist/";
      $caste_certificate_list=$_FILES['caste_scan_fee']['name'];
      $caste_certificate_temp_name=$_FILES['caste_scan_fee']['tmp_name'];
      $caste_certificate_array=explode('.',$caste_certificate_list );
      $caste_count=count($caste_certificate_array)-1;
      $caste_format=$caste_certificate_array[$caste_count];
      $final_caste_name = substr($caste_certificate_list, 0, strlen($caste_certificate_list)-4).$id.".".$caste_format;
      $caste_size=$_FILES['caste_scan_fee']['size'];
      if( $caste_format!='pdf' &&  $caste_format!='doc' &&  $caste_format!='txt')
      {

        $arr["castefee"]= "Please check your file format";
      }
      elseif($caste_size>=204800)
      {
       $arr["castefee"]="Your file size should be less that 200kb";
     }
     else
     {
      $sign5=move_uploaded_file($caste_certificate_temp_name,$caste_cert_target.$caste_certificate_list);
      if ($sign5)
      {

        $update= mysqli_query($conn, "UPDATE fee set caste_scan_fee = '".$final_caste_name."', status = '1' where id='".$id."'");
        if($update){
         
         $arr["castefee"]="File Uploaded Succesfully";
       }else{
        
        $arr["castefee"]="Your File not Uploaded....";
      }
    }
  }
}
// End of Caste certificate
// .............aadhar...........................
if($_FILES['saadhar_fee']['name']!=''){
  $saadhar_fee_target="images/saadhar_fee/";
  $saadhar_fee_name=$_FILES['saadhar_fee']['name'];
  $saadhar_fee_temp_name=$_FILES['saadhar_fee']['tmp_name'];
  $saadhar_fee_name_arrary=explode('.', $saadhar_fee_name);
  $saadhar_fee_count=count($saadhar_fee_name_arrary)-1;
  $saadhar_fee_format=$saadhar_fee_name_arrary[$saadhar_fee_count];
  $final_saadhar_fee_name = substr($saadhar_fee_name, 0, strlen($saadhar_fee_name)-4).$id.".".$saadhar_fee_format;
  $saadhar_fee_size=$_FILES['saadhar_fee']['size'];
  if($saadhar_fee_format!='pdf' && $saadhar_fee_format!='doc' && $saadhar_fee_format!='txt')
  {
    $arr["saadharfee"]="Aadhar certificate Not Updated successfully";
  }
  elseif($saadhar_fee_size>204800)
  {
   $arr["saadharfee"]="Your file size should be less that 200kb";
 }
 else{
  $saadhar_fee_upload=move_uploaded_file($saadhar_fee_temp_name,$saadhar_fee_target.$final_saadhar_fee_name);
  if ($saadhar_fee_upload)
  {
    $update= mysqli_query($conn, "UPDATE fee set saadhar_fee = '".$final_saadhar_fee_name."', status = '1' where id='".$id."'");
    if($update)
    {
      $arr["saadharfee"]="File Uploaded Succesfully";
    }
    else
    {
      $arr["saadharfee"]="Your File not Uploaded....";
    }
  }
}
}
// .............End of aadhar...........................
// .............Bank Passbook...........................
if($_FILES['bank_book_fee']['name']!=''){
  $bank_book_fee_target="images/bank_book_fee/";
  $bank_book_fee_name=$_FILES['bank_book_fee']['name'];
  $bank_book_fee_temp_name=$_FILES['bank_book_fee']['tmp_name'];
  $bank_book_fee_name_arrary=explode('.', $bank_book_fee_name);
  $bank_book_fee_count=count($bank_book_fee_name_arrary)-1;
  $bank_book_fee_format=$bank_book_fee_name_arrary[$bank_book_fee_count];
  $final_bank_book_name = substr($bank_book_fee_name, 0, strlen($bank_book_fee_name)-4).$id.".".$bank_book_fee_format;
  $bank_book_fee_size=$_FILES['bank_book_fee']['size'];
  if($bank_book_fee_format!='pdf' && $bank_book_fee_format!='doc' && $bank_book_fee_format!='txt')
  {
    $arr["bankbookfee"]="Bank Pass book Not Updated successfully";
  }
  elseif($bank_book_fee_size>204800)
  {
   $arr["bankbookfee"]="Your file size should be less that 200kb";
 }
 else{
  $bank_book_fee_upload=move_uploaded_file($bank_book_fee_temp_name,$bank_book_fee_target.$final_bank_book_name);
  if ($bank_book_fee_upload)
  {
    $update= mysqli_query($conn, "UPDATE fee set bank_book_fee = '".$final_bank_book_name."', status = '1' where id='".$id."'");
    if($update)
    {
      $arr["bankbookfee"]="File Uploaded Succesfully";
    }else{
      $arr["bankbookfee"]="Your File not Uploaded....";
    }
  }
}
}
// .............End for Bank Passbook...........................
if($_FILES['clgallot_fee']['name']!=''){
  $clgallot_fee_target="images/clgallot_fee/";
  $clgallot_fee_name=$_FILES['clgallot_fee']['name'];
  $clgallot_fee_temp_name=$_FILES['clgallot_fee']['tmp_name'];
  $clgallot_fee_name_array=explode('.', $clgallot_fee_name);
  $clgallot_fee_count=count($clgallot_fee_name_array)-1;
  $clgallot_fee_format=$clgallot_fee_name_array[$clgallot_fee_count];
  $final_clgallot_fee_name = substr($clgallot_fee_name, 0, strlen($clgallot_fee_name)-4).$id.".".$clgallot_fee_format;
  $clgallot_fee_size=$_FILES['clgallot_fee']['size'];
  if($clgallot_fee_format !='pdf' && $clgallot_fee_format !='doc' && $clgallot_fee_format !='txt')
  {
    $arr["clgallotfee"]="Allotment order not updated";
  }
  elseif($clgallot_fee_size>204800)
  {
    $arr["clgallotfee"]="Your file size should be less that 200kb";
  }
  else{
    $clgallot_fee_upload=move_uploaded_file($clgallot_fee_temp_name,$clgallot_fee_target.$final_clgallot_fee_name);
    if($clgallot_fee_upload)
    {
      $update= mysqli_query($conn, "UPDATE fee set clgallot_fee = '".$final_clgallot_fee_name."', status = '1' where id='".$id."'");
      if($update){
        $arr["clgallotfee"]="File Uploaded Succesfully";
      }else{
        $arr["clgallotfee"]="Your File not Uploaded....";
      }
    }
  }
}
}
elseif($adm_cat=="Management"){ 
  if($_FILES['ssc_scan_nonfee']['name']!=''){
    $ssc_scan_nonfee_target="images/ssc_scan_nonfee/";
    $ssc_scan_nonfee_name=$_FILES['ssc_scan_nonfee']['name'];
    $ssc_scan_nonfee_temp_name=$_FILES['ssc_scan_nonfee']['tmp_name'];
    $ssc_scan_nonfee_name_arrary=explode('.', $ssc_scan_nonfee_name);
    $ssc_scan_nonfee_count=count($ssc_scan_nonfee_name_arrary)-1;
    $ssc_scan_nonfee_format=$ssc_scan_nonfee_name_arrary[$ssc_scan_nonfee_count];
    $final_ssc_scan_nonfee_name = substr($ssc_scan_nonfee_name, 0, strlen($ssc_scan_nonfee_name)-4).$id.".".$ssc_scan_nonfee_format;
    $ssc_scan_nonfee_size=$_FILES['ssc_scan_nonfee']['size'];
    if($ssc_scan_nonfee_format!='pdf' && $ssc_scan_nonfee_format!='doc' && $ssc_scan_nonfee_format!='txt')
    {
      $arr["sscnonfee"]="SSC Non fee Certificate not updated";
    }
    elseif($ssc_scan_nonfee_size>204800)
    {
      $arr["sscnonfee"]="Your file size should be less that 200kb";
    }
    else{
      $ssc_scan_nonfee_upload=move_uploaded_file($ssc_scan_nonfee_temp_name,$ssc_scan_nonfee_target.$final_ssc_scan_nonfee_name);
      if($ssc_scan_nonfee_upload)
      {
        $update= mysqli_query($conn, "UPDATE fee set ssc_scan_nonfee = '".$final_ssc_scan_nonfee_name."', status = '1' where id='".$id."'");
        if($update){
          $arr["sscnonfee"]="File Uploaded Succesfully";
        }
        else
        {
          $arr["sscnonfee"]="Your File not Uploaded....";
        }
      }
    }
  }
 // .............aadhar...........................
  if($_FILES['saadhar_nonfee']['name']!=''){
    $saadhar_nonfee_target="images/saadhar_nonfee/";
    $saadhar_nonfee_name=$_FILES['saadhar_nonfee']['name'];
    $saadhar_nonfee_temp_name=$_FILES['saadhar_nonfee']['tmp_name'];
    $saadhar_nonfee_name_arrary=explode('.', $saadhar_nonfee_name);
    $saadhar_nonfee_count=count($saadhar_nonfee_name_arrary)-1;
    $saadhar_nonfee_format=$saadhar_nonfee_name_arrary[$saadhar_nonfee_count];
    $final_saadhar_nonfee_name = substr($saadhar_nonfee_name, 0, strlen($saadhar_nonfee_name)-4).$id.".".$saadhar_nonfee_format;
    $saadhar_nonfee_size=$_FILES['saadhar_nonfee']['size'];
    if($saadhar_nonfee_format!='pdf' && $saadhar_nonfee_format!='doc' && $saadhar_nonfee_format!='txt')
    {
      $arr["saadharnonfee"]="saadhar nonfee certificate not updated";
    }
    elseif($saadhar_nonfee_size>204800)
    {
     $arr["saadharnonfee"]="Your file size should be less that 200kb";
   }
   else{
    $saadhar_nonfee_upload=move_uploaded_file($saadhar_nonfee_temp_name,$saadhar_nonfee_target.$final_saadhar_nonfee_name);
    if($saadhar_nonfee_upload)
    {
      $update= mysqli_query($conn, "UPDATE fee set saadhar_nonfee = '".$final_saadhar_nonfee_name."', status = '1' where id='".$id."'");  
      if($update)
      {
        $arr["saadharnonfee"]="File Uploaded Succesfully";
      }else
      {
        $arr["saadharnonfee"]="Your File not Uploaded....";
      }
    }
  } 
} 
// .............................allotment order..................................
if($_FILES['clgallot_nonfee']['name']!=''){
  $clgallot_nonfee_target="images/clgallot_nonfee/";
  $clgallot_nonfee_name=$_FILES['clgallot_nonfee']['name'];
  $clgallot_nonfee_temp_name=$_FILES['clgallot_nonfee']['tmp_name'];
  $clgallot_nonfee_name_arrary=explode('.', $clgallot_nonfee_name);
  $clgallot_nonfee_count=count($clgallot_nonfee_name_arrary)-1;
  $clgallot_nonfee_format=$clgallot_nonfee_name_arrary[$clgallot_nonfee_count];
  $final_clgallot_nonfee_name = substr($clgallot_nonfee_name, 0, strlen($clgallot_nonfee_name)-4).$id.".".$clgallot_nonfee_format;
  $clgallot_nonfee_size=$_FILES['clgallot_nonfee']['size'];
  if($clgallot_nonfee_format!='pdf' && $clgallot_nonfee_format!='doc' && $clgallot_nonfee_format!='txt')
  {
    $arr["clgallotnonfee"]="college allotment is not updated"; 
  }
  elseif($clgallot_nonfee_size>204800)
  {
   $arr["clgallotnonfee"]="Your file size should be less that 200kb"; 
 }
 else{
  $clgallot_nonfee_upload=move_uploaded_file($clgallot_nonfee_temp_name,$clgallot_nonfee_target.$final_clgallot_nonfee_name);
  if ($clgallot_nonfee_upload)
  {
    $update= mysqli_query($conn, "UPDATE fee set clgallot_nonfee = '".$final_clgallot_nonfee_name."', status = '1' where id='".$id."'"); 
    if($update)
    {
      $arr["clgallotnonfee"]="File Uploaded Succesfully";
    }
    else
    {
      $arr["clgallotnonfee"]="Your File not Uploaded....";
    }      
  }
}
}
}
$check=mysqli_query($conn,"select * from fee where id='".$id."'");
$valueat = mysqli_fetch_array($check);
if(($valueat['ssc_scan_fee']!='' && $valueat['income_scan_fee']!='' && $valueat['caste_scan_fee']!='' && $valueat['saadhar_fee']!='' && $valueat['bank_book_fee']!='' && $valueat['clgallot_fee']!='')||($valueat['ssc_scan_nonfee']!='' && $valueat['saadhar_nonfee']!='' && $valueat['clgallot_nonfee']!='')){
  $unique_id="SCH"."00".$id;
  @$Message = file_get_contents("http://alerts.adeeptechnologies.com/api/v4/?api_key=A3ca2502007ffe7f750f2ef5e91370064&method=sms&message=Hi+student+your+Epass+Application+Registered+Succesfully,%0aThanks+Your+ID+is+$unique_id+%0aRegards,%0aAditya+Epass+Team&to=$smobile&sender=ADITYA");
  if ($Message) {
    mysqli_query($conn,"UPDATE fee SET unique_id='".$unique_id."' WHERE id='".$id."'");
    echo "<script>alert('success');</script>";
  }
  else {
    echo "<script>alert('sms failed');</script>";
  }
}
}
?>
<!doctype html>
<html>
<head>
  <title>Fee Reimbursement Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
  
</head>
<style>
body{
  padding:10px;
}
.container{
  padding: 10px;
  box-shadow:0 0 5px  #003300;
}
.jumbotron{
  background-color: #cc6600;
  color:white;
}
</style>
<body>
  <center><div class="container banner" style=" margin: 0px !important;padding: 0px; background: url('images/web.png'); height: 200px; background-repeat: no-repeat; background-size: 100% 100%;">             
  </div></center>
  <div class="container"> 
    <form action="" method="post" enctype="multipart/form-data">
      <?php
      $select_fee = mysqli_query($conn, "select * from fee where id = '".$id."'");
      $fetch_fee = mysqli_fetch_array($select_fee);
      $res=mysqli_query($conn,"SELECT adm_cat from fee where id='".$id."'");
      $fetch_adm_cat = mysqli_fetch_array($res);
      if($fetch_adm_cat['adm_cat']=="Convener"){
       ?>
       <div class="col-md-12 enclosure_left">
        <br/>
        <u><h4 class="text-center">Enclosures: (Fee Reimbursement Students Only)</h4></u>
        <br/>
        <div class="row">
          <div class="col-md-5 col-md-offset-1">
            <label> 1. SSC Mark List:<span style="color:red;">*</span></label>
          </div>
          <div class="col-md-5 col-md-offset-1">
            <input type="file" name="ssc_scan_fee"  id="ssc_scan_fee" value="<?php echo $_SESSION['ssc_scan_fee']; ?>">
            <?php 
            if(isset($arr["sscfee"])){
              if($arr["sscfee"]=="File Uploaded Succesfully"){?>
              <label class="text-success" id="sccfee_error">
                <?php
                print_r($arr["sscfee"]);
                ?>
              </label>
              <?php }
              else{
                ?>
                <label class="text-danger" id="sccfee_error">
                  <?php
                  print_r($arr["sscfee"]);
                  ?>
                </label>
                <?php
              }
            }
            ?>
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-md-5 col-md-offset-1">
            <label> 2. Income Certificate / White Ration Card:<span style="color:red;">*</span></label>
          </div>
          <div class="col-md-5 col-md-offset-1">
            <input type="file" name="income_scan_fee" value="<?php echo $fetch_fee['income_scan_fee'] ?>">
            <?php 
            if(isset($arr["incomefee"])){
              if($arr["incomefee"]=="File Uploaded Succesfully"){?>
              <label class="text-success" id="sccfee_error">
                <?php
                print_r($arr["incomefee"]);
                ?>
              </label>
              <?php }
              else{
                ?>
                <label class="text-danger" id="sccfee_error">
                  <?php
                  print_r($arr["incomefee"]);
                  ?>
                </label>
                <?php
              }
            }
            ?>
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-md-5 col-md-offset-1">
            <label> 3. Caste Certificate (SC, ST, BC, EBC, Minority):<span style="color:red;">*</span></label>
          </div>
          <div class="col-md-5 col-md-offset-1">
            <input type="file" name="caste_scan_fee" value="<?php echo $fetch_fee['caste_scan_fee'] ?>">
            <?php 
            if(isset($arr["castefee"])){
              if($arr["castefee"]=="File Uploaded Succesfully"){?>
              <label class="text-success" id="sccfee_error">
                <?php
                print_r($arr["castefee"]);
                ?>
              </label>
              <?php }
              else{
                ?>
                <label class="text-danger" id="sccfee_error">
                  <?php
                  print_r($arr["castefee"]);
                  ?>
                </label>
                <?php
              }
            }
            ?>
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-md-5 col-md-offset-1">
            <label> 4. Student Aadhar Card:<span style="color:red;">*</span></label>
          </div>
          <div class="col-md-5 col-md-offset-1">
            <input type="file" name="saadhar_fee" value="<?php echo $fetch_fee['saadhar_fee'] ?>">
            <?php 
            if(isset($arr["saadharfee"])){
              if($arr["saadharfee"]=="File Uploaded Succesfully"){?>
              <label class="text-success" id="sccfee_error">
                <?php
                print_r($arr["saadharfee"]);
                ?>
              </label>
              <?php }
              else{
                ?>
                <label class="text-danger" id="sccfee_error">
                  <?php
                  print_r($arr["saadharfee"]);
                  ?>
                </label>
                <?php
              }
            }
            ?>
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-md-5 col-md-offset-1">
            <label> 5. Bank Pass Book:<span style="color:red;">*</span></label>
          </div>
          <div class="col-md-5 col-md-offset-1">
            <input type="file" name="bank_book_fee" value="<?php echo $fetch_fee['bank_book_fee'] ?>">
            <?php 
            if(isset($arr["bankbookfee"])){
              if($arr["bankbookfee"]=="File Uploaded Succesfully"){?>
              <label class="text-success" id="sccfee_error">
                <?php
                print_r($arr["bankbookfee"]);
                ?>
              </label>
              <?php }
              else{
                ?>
                <label class="text-danger" id="sccfee_error">
                  <?php
                  print_r($arr["bankbookfee"]);
                  ?>
                </label>
                <?php
              }
            }
            ?>
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-md-5 col-md-offset-1">
            <label> 6. College Allotment Order:<span style="color:red;">*</span></label>
          </div>
          <div class="col-md-5 col-md-offset-1">
            <input type="file" name="clgallot_fee" value="<?php echo $fetch_fee['clgallot_fee'] ?>">
            <?php 
            if(isset($arr["clgallotfee"])){
              if($arr["clgallotfee"]=="File Uploaded Succesfully"){?>
              <label class="text-success" id="sccfee_error">
                <?php
                print_r($arr["clgallotfee"]);
                ?>
              </label>
              <?php }
              else{
                ?>
                <label class="text-danger" id="sccfee_error">
                  <?php
                  print_r($arr["clgallotfee"]);
                  ?>
                </label>
                <?php
              }
            }
            ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5 col-md-offset-1">
            <hr style="height:1px; background-color: black;">
            <h4>HINT:</h4>
            <P>1.File format should be either 'pdf' or 'doc' or 'txt'</P>
            <P>2.File size should be 100kb</P>
          </div>
        </div>
      </div>
      <div class="clearfix"></div>
      <?php
    }elseif($fetch_adm_cat['adm_cat']=="Management"){
      ?>
      <div class="col-md-12 enclosure_right">
        <br/>
        <u><h4 class="text-center">Enclosures: (Non -Fee Reimbursement Students Only)</h4></u>
        <br/>
        <div class="row">
          <div class="col-md-5 col-md-offset-1">
            <label> 1. SSC Mark List:<span style="color:red;">*</span></label>
          </div>
          <div class="col-md-5 col-md-offset-1">
            <input type="file" name="ssc_scan_nonfee" value="<?php echo $fetch_fee['ssc_scan_nonfee'] ?>">
            <?php 
            if(isset($arr["sscnonfee"])){
              if($arr["sscnonfee"]=="File Uploaded Succesfully"){?>
              <label class="text-success" id="sccfee_error">
                <?php
                print_r($arr["sscnonfee"]);
                ?>
              </label>
              <?php }
              else{
                ?>
                <label class="text-danger" id="sccfee_error">
                  <?php
                  print_r($arr["sscnonfee"]);
                  ?>
                </label>
                <?php
              }
            }
            ?>
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-md-5 col-md-offset-1">
            <label> 2. Student Aadhar Card:<span style="color:red;">*</span></label>
          </div>
          <div class="col-md-5 col-md-offset-1">
            <input type="file" name="saadhar_nonfee" value="<?php echo $fetch_fee['saadhar_nonfee'] ?>">
            <?php 
            if(isset($arr["saadharnonfee"])){
              if($arr["saadharnonfee"]=="File Uploaded Succesfully"){?>
              <label class="text-success" id="sccfee_error">
                <?php
                print_r($arr["saadharnonfee"]);
                ?>
              </label>
              <?php }
              else{
                ?>
                <label class="text-danger" id="sccfee_error">
                  <?php
                  print_r($arr["saadharnonfee"]);
                  ?>
                </label>
                <?php
              }
            }
            ?>
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-md-5 col-md-offset-1">
            <label> 3. College Allotment Order:<span style="color:red;">*</span></label>
          </div>
          <div class="col-md-5 col-md-offset-1">
            <input type="file" name="clgallot_nonfee" value="<?php echo $fetch_fee['clgallot_nonfee'] ?>">
            <?php 
            if(isset($arr["clgallotnonfee"])){
              if($arr["clgallotnonfee"]=="File Uploaded Succesfully"){?>
              <label class="text-success" id="sccfee_error">
                <?php
                print_r($arr["clgallotnonfee"]);
                ?>
              </label>
              <?php }
              else{
                ?>
                <label class="text-danger" id="sccfee_error">
                  <?php
                  print_r($arr["clgallotnonfee"]);
                  ?>
                </label>
                <?php
              }
            }
            ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5 col-md-offset-1">
            <hr style="height:1px; background-color: black;">
            <h4>HINT:</h4>
            <P>1.File format should be either 'pdf' or 'doc' or 'txt'</P>
            <P>2.File size should be 100kb</P>
          </div>
        </div>
        <br/>
      </div>
      <?php 
    } 
    else{
      ?>
      <div class="row">
        <div class="col-sm-12">
          <h4 align="center">Please choose Admission Category</h4>
        </div>
      </div>
      <?php
    }
    ?>
    <div class="row">
      <div class="col-md-2 col-md-offset-8 pull-right">
        <br>
        <input type="submit" class="btn btn-success" name="update" value="Submit">
      </div>
    </div>
  </form>
</body>
</html>