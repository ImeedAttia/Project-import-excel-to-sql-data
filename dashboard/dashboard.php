<?php 
session_start();
	include("../connection.php");
	include("../functions.php");
	include ("delete_dashboard/delete.php");	
	$user_data = check_login($con);
	$sql = "SELECT * FROM super_user1"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>dashboard</title>
	<meta charset="UTF-8">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="icon" type="image/png" href="favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="dashboard.css">

</head>
<body>
	
	
	<div class="limiter">
	
		<div class="container-table100">
		
			<div class="wrap-table100">
				<div class="table100">
				<div>
					<form action="../code.php" method="POST" enctype="multipart/form-data">
					<input type="file" class="btn btn-lg btn-success " value=" insert ur excel file" name="importFile"/>
					<input type="submit" class="btn btn-lg btn-success" name="importFileBtn">
					</form>
				</div>
					<table>
						<thead>
							<tr class="table100-head">
								<th class="column1">ID</th>
								<th class="column2">name</th>
								<th class="column3">lastname</th>							
								<th class="column4">email</th>
								<th class="column5">password</th>
								<th class="column7">supprime</th>
								
								
							</tr>
						</thead>
						<tbody>

							<?php 
								$result = $con->query($sql);

								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
										if($row["availble"]==1){
											$recordId = $row["id"];
										//print the users data
										echo '<tr><td class="column1" id="id"> ' . $row["id"] . "</td>";
										echo '<td class="column2 row_data" col_name="user_name" id="user_name"> ' . $row["fname"] . "</td>";
										echo '<td class="column3 row_data" col_name="user_lastname" id="user_lastname" > ' . $row["lname"] . "</td>";
										
										echo '<td class="column5 row_data" col_name="email" id="email" > ' . $row["email"] . "</td>";
										
										echo '<td class="column7 row_data" col_name="password" id="password" > ' . $row["password"] . "</td>";
										//return the id on click
										echo   "<td  ><a href='delete_dashboard/delete.php?recordId=" . $recordId . "' class='btn btn-danger btn-sm' >Delete</a> </td>";
									
										}
							
									}
								}			 
								else 
								{
								echo "0 results";
								}
								$con->close();
							?>
										
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
	</div>


	

	
</body>
</html>