<?php include ("connection.php");


$fname=$lname=$email=$phone= $password= $cunfirmPass="";
$fnameErr=$lnameErr=$emailErr=$phoneErr= $passwordErr= $cunfirmPassErr="";


if(isset($_POST["btnRegister"])){
	
		if(empty($_POST["lname"])){
		$lnameErr = "Last Name is Required !";
	
	}else{
		$lname= $_POST["lname"];
$check_lname = strlen($lname);	
			if($check_lname < 3){
				$lnameErr = "Your Last Name is too short , try FirstName More then 2 characters !";
			}
			if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
    }

	}
	
	
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
	
	if(empty($_POST["phone"])){
		$phoneErr = "phone is Required !";
	
	}else{
		$phone= $_POST["phone"];
		
		
			
			
				
			if(!ctype_digit($phone)==True){
		$phoneErr = "Invalid Contact Number";
	
	}
	}
	
	if(empty($_POST["fname"])){
		$fnameErr = "First Name is Required !";
	
	}else{
		$fname= $_POST["fname"];
$check_fname = strlen($fname);	
			if($check_fname < 3){
				$fnameErr = "Your FirstName is too short , try FirstName More then 2 characters !";
			}
			if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
    }

	}
	
	
	
	if(empty($_POST["password"])){
		$passwordErr = "password is Required !";
	
	}else{
		$password= $_POST["password"];
		 
		$check_password = strlen($password);	
			if($check_password < 8){
				$passwordErr = "Your password is too short , try password More then 8 characters !";
			}
			$check_password = $password;
			if(!ctype_alnum($check_password)==True){
			$passwordErr = "Your Password is not alphanumeric !";	
			
			}
	}
	
	if(empty($_POST["cunfirmPass"])){
		$cunfirmPassErr = "Confirmation Password Not Match !";
	
	}else{
		$cunfirmPass= $_POST["cunfirmPass"];
		
		if($cunfirmPass!=$password){
			echo "";
			
			
		}
		
	}
	if($fname&&$lname&&$email&&$phone&&$password){
		
		//echo"$first_name <br>  $middle_name <br> $last_name <br> $gender <br> $email";
		//
		
		//validation for username
		
		
			
			
				
			
				
				
		
				//$fname=$lname=$email=$phone= $password= $cunfirmPass="";
	$check_phone = strlen($phone);	
			if($check_phone != 11){
				$phoneErr = "Enter 11 Digit Contact Number";
			}else{
					if($cunfirmPass==$password){
					
					mysqli_query($connections,"INSERT INTO user(FirstName,Email,LastName,Phone,Password) 
					VALUES('$fname','$email','$lname','$phone',md5('$password'))");
					echo '
					
					<script> window.location.href = "loginpage.php";
					alert("SUCCESSFULL SIGN UP")</script>';
					
				}
					$cunfirmPassErr="Password Not Match";
					
					
				
				
			}
			
			}
		
	
}


 ?>
<!DOCTYPE html>
<html lnag="en">
<style>


</style>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
       
        <title>Signup</title>
    </head>
    <body style="background-color:#00b4fe;"> <!--dito start code-->
        <header> <!-- HEADER/NAVBAR CODE sa body mag code -->
           
        <div class="p-3 mb-2 bg-white text-dark rounded-5" style="border:1px solid; height:fit-content; width:30%; margin-top:7%;;margin-left:35.5%">
            <div class="p-3">
                <center><h2>Sign Up</h2></center><br>
                <form method="POST">
					<div class="mb-3">
                        <h5>First Name</h5>
                        <input type="text" class="form-control rounded-4" id="loginusername"name="fname" placeholder="First Name" value="<?php echo $fname;?>" size="4">
						
                    </div><span class="error"><?php echo $fnameErr;?></span>
					
					<div class="mb-3">
                        <h5>Last Name</h5>
                        <input type="text" class="form-control rounded-4" id="loginusername"name="lname" placeholder="Last Name" value="<?php echo $lname;?>" size="4">
						
                    </div><span class="error"><?php echo $lnameErr; ?></span>

				   <div class="mb-3">
                        <h5>Email</h5>
                        <input type="text" class="form-control rounded-4" id="loginusername"name="email" placeholder="Email" value="<?php echo $email;?>">
                    </div><span class="error"><?php echo $emailErr; ?></span>
                    
					<div class="mb-3">
                        <h5>Phone</h5>
                        <input type="text" class="form-control rounded-4" id="loginpassword"name="phone" placeholder="Phone Number" value="<?php echo $phone;?>">
                    </div><span class="error"><?php echo $phoneErr; ?></span>
					<div class="mb-3">
                        <h5>Password</h5>
                        <input type="password" class="form-control rounded-4" id="loginpassword"name="password" placeholder="Password" value="">
                    </div><span class="error"><?php echo $passwordErr; ?></span>
					
					
					<div class="mb-3">
                        <h5>Confirm Password</h5>
                        <input type="password" class="form-control rounded-4" id="signupconfirm"name="cunfirmPass" placeholder="Cunfirm Password" value="">
                    </div><span class="error"><?php echo $cunfirmPassErr;?></span>
					
					
					
					<div class="mb-3">
                        <input type="submit" name="btnRegister" value="Register">
                    </div><hr style="margin-top:5%">
					
                </form>
                <center><div class="container-fluid">
                    <div class="row">
                        <center><div class="col-md-5">
                           <a href="loginpage.php"><h5>LOGIN</h5></a>
                        </div></center>
                      
                        
                    </div>
                </div></center>
            </div>
        </div>
        
    </body>
</html>
