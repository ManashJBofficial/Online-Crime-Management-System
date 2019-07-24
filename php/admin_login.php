<?php 
	include ("connection.php");
	$dbname="crime_management";
	$db=mysql_select_db($dbname,$con) or die("Failed to connect to mysqli: " . mysql_error());

	if(isset($_POST['submit'])){
		$uname = $_POST ['uname'];
		$pass = $_POST ['pass'];

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
    	


		$q =mysql_query("SELECT * FROM `admin_login` WHERE uname ='$uname' and pass = '$pass'") or die("Failed to query database" .mysql_error());
		
		$rw = mysql_fetch_array($q);

		if($rw ['uname'] == $uname && $rw ['pass'] == $pass){
			header('Location: ../dashboard/admin_dashboard.php');
		}
	else {
		echo "<script>alert('WRONG USERNAME OR PASSWORD !')</script>";
				?>
				<META HTTP-EQUIV="Refresh" CONTENT="0; URL=../adminLogin.php">
	<?php 


			}


}
 ?>