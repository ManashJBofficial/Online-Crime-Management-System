<?php 
   session_start();
	include ("connection.php");
	$dbname="crime_management";
	$db=mysql_select_db($dbname,$con) or die("Failed to connect to MySQL: " . mysql_error());

	if(isset($_POST['submit'])){
		$ioid = $_POST['ioid'];
		$uname = $_POST ['uname'];
		$pass = $_POST ['pass'];

if($ioid=='')  
    {  
        //javascript use for input checking  
        echo"<script>alert('Please enter the officer in Charge ID')</script>";  
exit();//this use if first is not work then other will not show 
	}
		if($uname=='')  
    {  
        //javascript use for input checking  
        echo"<script>alert('Please enter the Username')</script>";  
exit();//this use if first is not work then other will not show  
    }  
  
    if($pass=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
exit();  
    }   

		$q =mysql_query("SELECT * FROM `create_subadmin` WHERE ioid ='$ioid' and uname ='$uname' and pass = '$pass'") or die("Failed to query database" .mysql_error());
		
		$rw = mysql_fetch_array($q);

		if($rw ['ioid'] == $ioid && $rw ['uname'] == $uname && $rw ['pass'] == $pass){
                  $_SESSION['ioid'] = $ioid;


				header('Location: ../dashboard/sub_admin_dashboard.php');
		}
	else {
		echo "<script>alert('WRONG USERNAME OR PASSWORD !')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../subadminLogin.php">
		<?php
	}


}
 ?>