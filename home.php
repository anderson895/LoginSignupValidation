<style>
form{
	border:1px solid;
	width:500;
	padding-bottom:100;
	
	border-radius:10px;
}

</style>
<?php
session_start();

if(isset($_SESSION["id"])){
	
			include ("connection.php");
		$ud = $_SESSION["id"];
		
	
		
	
}else{
	
	echo "<script>window.location.href='loginpage.php';</script>";
	
}
include("connection.php");

$id=$_GET['id'];

		$check_username = mysqli_query($connections,"SELECT * from user WHERE id='$id'");
		$check_username_row = mysqli_num_rows ($check_username);
		
		
			
			$row = mysqli_fetch_assoc($check_username);
			$user_id  = $row["id"];
			$db_password = $row["Password"];
			$db_email = $row["Email"];
				
			
				
			
			
			echo "<center><form class='form'><h1>WELCOME</h1> <h2>",$db_email,"</h2></form>";
					
		
		
		
		
	

?>
<a href="logout.php"><input type="submit" name="btnLogout" value="LOGOUT"></a></center>