<?php
include ("connection.php");
if (isset($_GET['recordId'])){
    $recordId = $_GET['recordId'];
    $availble= 0;
    $query = "UPDATE super_user1 SET  availble='{$availble}' WHERE id='$recordId'";
    $result = $con->query($query) or die("Error in query2".$con->error);
    $delete = $result;
    if ($delete){
        echo '<script>alert("votre supprision est verifier")</script>';
        header("Refresh:0; url=../dashboard.php");
    }
}



