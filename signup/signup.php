<?php



session_start();

	include("../connection.php");


if($_SERVER['REQUEST_METHOD'] == "POST" )
	{
		
    //variable to enter to data
    $user_name = $_POST['user_name'];
    $user_lastname = $_POST['user_lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $availble = 1;
    $cpass = $_POST["cpass"];
    $admin_user = "admin";
		

    //check the inputs
		if(!empty($user_name) && !empty($password) && !is_numeric($user_name) && $password == $cpass)
		{
    

			//save to database
			$query = "insert into super_user1 (fname,lname,email,password,availble,admin_user) values ('$user_name','$user_lastname','$email','$password','$availble','$admin_user')";
			mysqli_query($con, $query);
      header( "Refresh:0; url=../login/login.php");
      
			die;

		}
    else
		{
    echo '<script type="text/javascript">';
		echo ' alert("Please enter some valid information!")';  
		echo '</script>';
		}
	}else
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Sign UP</title>
    <link rel="icon" type="image/png" href="R.png"/>
    <link rel="stylesheet" type="text/css" href="signup.css"/>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

        $(document).ready(function(){
          $(document).on('click', function(e) {
            if ( e.target.id != 'cpass' && $("#cpass").val() != ""  ) {
                if ($('#password').val() == $('#cpass').val()) {
                    $('#message').html('Matching').css('color', 'green');
                      } 
                else 
                    $('#message').html('Not Matching').css('color', 'red');
            }   
          });
        })
    </script>

</head>
<body>
<form id="msform" action="signup.php" method="post" >

  <fieldset>

    <h2 class="fs-title">Create your account</h2>

    <input type="text"  placeholder="Votre Prenom" name="user_name"  value="<?php echo isset($_POST["user_name"]) ? $_POST["user_name"] : ''; ?>" required/>
    <input type="text"  placeholder="Votre Nom"name="user_lastname" value="<?php echo isset($_POST["user_lastname"]) ? $_POST["user_lastname"] : ''; ?>" required />
    <input type="email" name="email" placeholder="Email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>" required />
    <input type="password"  minlength="8" placeholder="Password" id="password" name="password"  required />


    <p id="message" style="font-size : 14px;padding : 6px 12px"></p>


    <span id="cc"><input type="password" name="cpass" id="cpass" placeholder="Confirm Password" required  /></span>


    
  
    
   <a href="../login/login.php"> <input type="button" name="annuler" class="submit action-button" value="Annuler"  /></a>
    <input type="submit" name="submit" id="submit"  class="submit action-button" value="Submit" />

  </fieldset>
 
</form>    
</body>
</html>


