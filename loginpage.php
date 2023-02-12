
<?php
session_start();
include ("connection.php");

if(isset($_SESSION["id"])){
		$id = $_SESSION["id"];
		
		$get_record = mysqli_query ($connections,"SELECT * FROM user where id='$user_id' ");
		$row = mysqli_fetch_assoc($get_record);
		$account_type = $row ["account_type"];
		
		
		
					echo "<script>window.location.href='home.php'</script>";	
				
}
include("connection.php");

$email = $password="";
$emailErr = $passwordErr="";

if(isset($_POST["btnLogin"])){
	
	
	//Login
	
	if(empty($_POST["email"])){
		$emailErr = "email is Required !";
	
	}else{
		$email= $_POST["email"];
		 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
	  $check_email=strlen($email);
	  if($check_email < 6){
				$emailErr = "Your email is too short , try email 6 characters above !";
			}
    }
	
	}
	//PAssword
}if(empty($_POST["password"])){
	
	$passwordErr ="password is Required !";
}else{
	
	$password = $_POST["password"];
	 $password = md5($password); 
}
	if($email AND $password){
		
		$check_email = mysqli_query($connections,"SELECT * from user WHERE Email='$email'");
		 $check_email_row = mysqli_num_rows ($check_email);
		
		if($check_email_row  > 0){
			
			$row = mysqli_fetch_assoc($check_email);
			$id  = $row["id"];
			$db_password = $row["Password"];
			
			
			if($password==$db_password){
				
			$_SESSION["id"]=$id; 
			
			
				
					echo "<script>window.location.href='home.php?id=$id'</script>";	
				
				
			}else{
				
				$passwordErr="Password incorrect !";
				
			}
		}else{
			
			
			$emailErr = "Email is Not Registered !";
		}
		
		
	

}
?>
<style></style>
<!DOCTYPE html>
<html lnag="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        
        <title> Login</title>
    </head>
    <body style="background-color:#00b4fe;"> <!--dito start code-->
        
		
        <div class="p-3 mb-2 bg-white text-dark rounded-5" style="border:1px solid; height:fit-content; width:30%; margin-top:7%;;margin-left:35.5%">
            <div class="p-3">
           <center>     <h2>Login</h2></center><br>
                <form method="POST">
                    <div class="mb-3">
					
                        <h5>Email:</h5>
                        <input type="text" class="form-control rounded-4" id="loginusername" name="email">
                    </div><span class="error"><?php echo $emailErr; ?></span>
                    <div class="mb-3">
                        <h5>Password:</h5>
                        <input type="password" class="form-control rounded-4" id="loginpassword" name="password">
                    </div><span class="error"><?php echo $passwordErr; ?></span>
					
					<hr style="margin-top:5%">  <div class="mb-3">
                        <input type="submit" name="btnLogin" value="Login">
                    </div><hr style="margin-top:5%">
                </form>
                <div class="container-fluid">
                    <div class="row">
                       <center> <div class="col-md-5">
                            <a href="signuppage.php"><h5>SIGN UP</h5></a>
                        </div>
                        </center>
                       
                    </div>
                </div>
            </div>
        </div>
       
    </body>
</html>
