<?php
	class check {
		// function display() {
		// 	echo "asdf";
		// }
		function checkData($data) {
			//print_r($data);
			//echo $_FILES['photo']['name'];
			
          // Photo Upload
          if ($_FILES['photo']['name']!="") {
            $target     = "images/students_photos/";
            $img_name   = $_FILES['photo']['name'];
            $temp_name  = $_FILES['photo']['tmp_name'];
            $size       = $_FILES['photo']['size'];
            list($width, $height) = getimagesize($temp_name);
            $ext        = pathinfo($img_name, PATHINFO_EXTENSION);
            
            if(strtolower($ext)!='jpg'){
              $arr["photo"]="Please select only jpg image";
            }else if($width>132 || $height>105){
              $arr["photo"]="Your width and height should be 35X45 dimensions";
            }else if($size>51200)
            { 
             $arr["photo"]="Size of your image crosses the limit size 50kb";
            }else
            {
              // $final_photo_name = $data['rollno'].".".$ext;
              // $upload = move_uploaded_file($temp_name, $target.$final_photo_name);
              // if($upload){
              //   $result=mysqli_query($conn, "update fee set  photo='".$final_photo_name."' where id=$last_id");
              // }else
              // {
              //   $arr["photo"]="Image uploaded is failed";
              // }
            }
          }

          // Start for Signature uploading
          if ($_FILES['signature']['name']!="") {
            $target="images/students_signatures/";        // orginal nm
            $sign_name=$_FILES['signature']['name'];      // temp nm
            $temp_name=$_FILES['signature']['tmp_name'];   // to get image format like jpg
            $ext = pathinfo($sign_name, PATHINFO_EXTENSION);
            list($width,$height)=getimagesize($temp_name);
            $size1=$_FILES['signature']['size'];
            if(strtolower($y)!='jpg')
            {
              $arr["signature"]="Please select only jpg image";

            }
            elseif ($width>132 || $height>105) 
            {
              $arr["signature"]="signature image  width and height should be 140 and 60";
            }
            elseif($size1>51200)
            {
              $arr["signature"]="size should be 20kb";
            }
            else
            {
              // $sign=move_uploaded_file($temp_name1, $target1.$final_signature_name);
              // if($sign){
              //   $result2=mysqli_query($conn, "update fee set signature='".$final_signature_name."' where id=$last_id");
              // }
              // else{
              //   $arr["signature"]="Signature upload is failed";
              // }
            }
          }
          // End for Signature uploading
          // Starting for phychallenge file uploading
          if ($_FILES['phy_certi']['name']!="") {
            $target2="images/physically_challenged/";
            $phychallenge=$_FILES['phy_certi']['name'];
            $temp_name2=$_FILES['phy_certi']['tmp_name'];
            $ext = pathinfo($phychallenge, PATHINFO_EXTENSION);
            $size2=$_FILES['phy_certi']['size'];
            if($ext2!='pdf' && $ext2!='doc' && $ext!='txt')
            {
              $arr["phy_certi"]="file format should be either pdf or pfx";
            }elseif($size2>204800){
              $arr["phy_certi"]="file size should be less than 200kb";
            }
            else
            {
              // $sign2=move_uploaded_file($temp_name2,$target2.$final_phy_certi);
              // if($sign2){
              //   $result3=mysqli_query($conn, "update fee set  phy_certi = '".$final_phy_certi."' where id=$last_id");
              // }
              // else{
              //   $arr["phy_certi"]="File upload failed";
              // }
            }
          }
           // End for physically challenged file uploading
           // Starting for Cap Category file uploading
          if ($_FILES['cap_cat_file']['name']!="") {
            $cap_cat_target="images/cap_category/";
            $cap_name=$_FILES['cap_cat_file']['name'];
            $cap_temp_name=$_FILES['cap_cat_file']['tmp_name'];
            $cap_format = pathinfo($cap_name, PATHINFO_EXTENSION); 
            $cap_size=$_FILES['cap_cat_file']['size'];
            if($cap_format!='pdf' && $cap_format!='doc' && $cap_format!='txt')
            {
              $arr["cap_cat_file"]="file format should be either pdf or doc";
            } 
            elseif($cap_size>204800)
            {
              $arr["cap_cat_file"]="file size should be less than or equal to 200kb";
            }
            else{
              $cap_upload=move_uploaded_file($cap_temp_name,$cap_cat_target.$final_cap_cat_name);
              if($cap_upload){
                $result4=mysqli_query($conn, "update fee set cap_cat_file = '".$final_cap_cat_name."' where id=$last_id");
              }
              else{
                $arr["cap_cat_file"]="File upload failed";
              }
            }
          }
           // Ending for Cap Category file uploading
           // Starting for Sports Category file uploading
          if ($_FILES['sports_cat_file']['name']!="") {
            $sports_cat_target="images/sports_category/";
            $sports_name=$_FILES['sports_cat_file']['name'];
            $sports_temp_name=$_FILES['sports_cat_file']['tmp_name'];
            $sports_format = pathinfo($sports_name, PATHINFO_EXTENSION);
            $sports_size=$_FILES['sports_cat_file']['size'];
            if($sports_format!='pdf' && $sports_format!='doc' && $sports_format!='txt')
            {
              $arr["sports_cat_file"]="file format should be either pdf or doc";
            }elseif($sports_format==''){

            }
            elseif($sports_size>204800)
            {
              $arr["sports_cat_file"]="file size should be less than or equal to 200kb";
            }
            else{
              $sports_upload=move_uploaded_file($sports_temp_name,$sports_cat_target.$final_sports_cat_name);
              if($sports_upload){
                $result5=mysqli_query($conn, "update fee set sports_cat_file = '".$final_sports_cat_name."' where id=$last_id");
              }
              else{
                $arr["sports_cat_file"]="File upload failed";
              }
            }
          }
         // Ending for Sports Category file uploading
         // Starting for NCC Category file uploading
          if ($_FILES['ncc_cat_file']['name']!="") {
            $ncc_cat_target="images/ncc_category/";
            $ncc_name=$_FILES['ncc_cat_file']['name'];
            $ncc_format = pathinfo($ncc_name, PATHINFO_EXTENSION);
            $ncc_size=$_FILES['ncc_cat_file']['size'];
            if($ncc_format!='pdf' && $ncc_format!='doc' && $ncc_format!='txt')
            {
              $arr["ncc_cat_file"]="file format should be either pdf or doc";
            }elseif($ncc_name==''){

            }
            elseif($ncc_size>204800)
            {
              $arr["ncc_cat_file"]="file size should be less than or equal to 200kb";
            }
            else{
              $ncc_upload=move_uploaded_file($ncc_temp_name,$ncc_cat_target.$final_ncc_cat_name);
              if($ncc_upload){
                $result6=mysqli_query($conn, "update fee set ncc_cat_file = '".$final_ncc_cat_name."' where id=$last_id");
              }
              else{
                $arr["ncc_cat_file"]="File upload failed";
              }
            }
          }
         // Ending for NCC Category file uploading
         // Starting for NSS Category file uploading
          if ($_FILES['nss_cat_file']['name']!="") {
            $nss_cat_target="images/nss_category/";
            $nss_name=$_FILES['nss_cat_file']['name'];
            $nss_temp_name=$_FILES['nss_cat_file']['tmp_name'];
            $nss_format = pathinfo($nss_name, PATHINFO_EXTENSION);
            $nss_size=$_FILES['nss_cat_file']['size'];
            if($nss_format!='pdf' && $nss_format!='doc' && $nss_format!='txt')
            {
              $arr["nss_cat_file"]="file format should be either pdf or doc";
            }elseif($nss_format==''){

            }
            elseif($nss_size>204800)
            {
             $arr["nss_cat_file"]="file size should be less than or equal to 200kb";
           }
           else{
             $nss_upload=move_uploaded_file($nss_temp_name,$nss_cat_target.$final_nss_cat_name);
             if($nss_upload)
             {

               $result7=mysqli_query($conn, "update fee set nss_cat_file = '".$final_nss_cat_name."' where id=$last_id");
               
             }
             else
             {
              $arr["nss_cat_file"]="File upload failed";
            }
          }
        }
         // Ending for NSS Category file uploading
         // Start for Extra category file uploading
          if ($_FILES['extra_act_file']['name']!="") {
            $extra_act_target="images/extra_category/";
            $extra_act_name=$_FILES['extra_act_file']['name'];
            $extra_act_temp_name=$_FILES['extra_act_file']['tmp_name'];
            $extra_act_format = pathinfo($extra_cat_name, PATHINFO_EXTENSION);
            $extra_act_size=$_FILES['extra_act_file']['size'];
            if($extra_act_format!='pdf' && $extra_act_format!='doc' && $extra_act_format!='txt')
            {
              $arr["extra_act_file"]="file format should be either pdf or doc";
            }elseif($extra_act_format==''){

            }
            elseif($extra_act_size>204800)
            {
              $arr["extra_act_file"]="file size should be less than or equal to 200kb";
            }
            else{
              $extra_act_upload=move_uploaded_file($extra_act_temp_name,$extra_act_target.$final_extra_act_name);
              if($extra_act_upload)
              {  
               $result8=mysqli_query($conn, "update fee set extra_act_file = '".$final_extra_act_name."' where id=$last_id");
             }
             else{
              $arr["extra_act_file"]="File upload failed";
            }
          }
        }
      return $arr;
		}
	}
?>