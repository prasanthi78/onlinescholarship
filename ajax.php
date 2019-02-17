<?php 
include "config.php";
?>
<?php
if(@$_GET['aadhar']!='')
{
	@$select_registered = mysqli_query($conn, "SELECT * FROM fee where aadhar = '".$_GET['aadhar']."'");
	@$count = mysqli_num_rows($select_registered);
	if(strlen($_GET['aadhar'])<12)
	{
		echo 'aadhar number should be 12 digits';
	}
	else if($count!=0)
	{
		echo 'Aadhar number already Registered';
	}
	else
	{
		echo 'proceed';
	}
}

if(@$_GET['smobile']!='')
{
	@$select_registered = mysqli_query($conn, "SELECT * FROM fee where smobile = '".$_GET['smobile']."'");
	@$count = mysqli_num_rows($select_registered);
	if(strlen($_GET['smobile'])<10)
		{ echo 'mobile no should be 10 digits';
}
	else if($count!=0)
	{
		echo 'Mobile number already Registered';
	}
	else
	{
		echo 'proceed';
	}
}
if(@$_GET['email']!='')
{
	@$select_registered = mysqli_query($conn, "SELECT * FROM fee where email = '".$_GET['email']."'");
	@$count = mysqli_num_rows($select_registered);
	if($count!=0)
	{
		echo 'Email is  already Registered';
	}
	else
	{
		echo 'proceed';
	}
}
if(@$_GET['rollno']!='')
{
	@$select_registered = mysqli_query($conn, "SELECT * FROM fee where rollno = '".$_GET['rollno']."'");
	@$count = mysqli_num_rows($select_registered);
	if(strlen($_GET['rollno'])<10){
		echo 'Rollno length should be 10';
	}else if($count!=0)
	{
		echo 'Rollno is  already Registered';
	}
	else
	{
		echo 'proceed';
	}
}
if(@$_GET['ssc_hall']!='')
{
	@$select_registered = mysqli_query($conn, "SELECT * FROM fee where  ssc_hall = '".$_GET['ssc_hall']."'");
	@$count = mysqli_num_rows($select_registered);
	if(strlen($_GET['ssc_hall'])<=10)
	{
		echo "hall ticket no should be 10 digits";
	}
	else if($count!=0)
	{
		echo 'Hall Ticket number is  already Registered';
	}
	else
	{
		echo 'proceed';
	}
}
?>