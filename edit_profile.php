<?php 
session_start();
include("connection.php");
include("functions.php");
$user_data = check_login($con);
	$recordId = $user_data['id'];
	$sql = "SELECT * FROM super_user1 WHERE id='" . $recordId . "'"; 
	$result = $con->query($sql);
	
	$row = $result->fetch_assoc();

	






//send data


	if($_SERVER['REQUEST_METHOD'] == "POST")
{
	//get variables
	$user_name = $_POST['user_name'];
	$user_lastname = $_POST['user_lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
		// SAVE DATA
		$sql = "UPDATE super_user1 SET 
	   fname='{$user_name}',
	   email='{$email}',
	   
	   password='{$password}',
	  lname='{$user_lastname}'
	  
	    WHERE id='{$recordId}'";

		mysqli_query($con, $query);

    if ($con->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $con->error;
    }
	header("Refresh:0;");


    $con->close();

}
?>

<!DOCTYPE html>
<html>
<title>Edit Page</title>
<link rel="icon" type="png" href="OIP.png"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
	.box select {
    
		color: white;
		padding: 12px;
		width: 100%;
		border: 1px solid #ccc;
		font-size: 20px;
		
	   
		appearance: button;
		outline: none;
		
		padding: 15px;
		border: 1px solid #ccc;
		border-radius: 3px;
		margin-bottom: 10px;
		width: 100%;
		box-sizing: border-box;
		font-family: montserrat;
		color: #2C3E50;
		font-size: 13px;
		
	  }
	  input[type=button],
      input[type=submit] {
        background-color: #2565AE;
        border: none;
        color: #fff;
        padding: 15px 30px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
      }
	 
</style>
<body>

<form  class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin" method="POST">
<h2 class="w3-center">Edit User Data</h2>
 
<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="user_name" type="text" placeholder="First Name" value="<?php echo $row["fname"]?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="user_lastname" type="text" placeholder="Last Name" value="<?php echo $row["lname"] ?>">
    </div>
</div>

<div class="w3-row w3-section">
  <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
    <div class="w3-rest">
      <input class="w3-input w3-border" name="email" type="text" placeholder="Email" value="<?php echo $row["email"]?>">
    </div>
</div>




<div class="w3-row w3-section">
	<div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-unlock-alt"></i></div>

    <div class="w3-rest">
		
      <input class="w3-input w3-border" name="password" type="text" placeholder="password" value="<?php echo $row["password"]?>">
    </div>
</div>
</div>

	<a href="login/logout.php"><input type="button" value="logout"></a>
    <input type="submit" value="Submit">


</form>

</body>
</html> 
