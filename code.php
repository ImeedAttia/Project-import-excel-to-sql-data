<?php
include("connection.php");
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

        if(isset($_POST["importFileBtn"])){
            $allowed_ext = ['xls','csv','xlsx'];
            $filename = $_FILES['importFile']['name'];
            $checking = explode(".",$filename);
            $file_ext = end($checking);
            if(in_array($file_ext , $allowed_ext)){
                $targetpath = $_FILES["importFile"]['tmp_name'];
                $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($targetpath);
                $data = $spreadsheet->getActiveSheet()->toArray();
                foreach($data as $row){
                   echo $id = $row['0'];
                    $fname = $row['1'];
                    $lname = $row['2'];
                    $email = $row['3'];
                    $password= $row['4'];
                    $availble= 1;
                    //UPDATE
                    $sql= "SELECT * from super_user1 where id='$id' "; //id khw mech hata ky yabda esmo majoud yetkteb mara okhra hama baylt mel 7  wena nekhdem borjoliya ahhahahahahaha
                    $sql_result= mysqli_query($con,$sql);
                    if(mysqli_num_rows($sql_result)>0){
                        $update_sql="UPDATE super_user1 SET fname= '$fname', lname = '$lname',email='$email',password= '$password' where id='$id'";
                        $update_result= mysqli_query($con,$update_sql);
                    }else{
                        $input_sql="INSERT INTO super_user1 (fname,lname,email,password,availble) VALUES ('$fname','$lname','$email','$password','$availble')";
                        $input_result= mysqli_query($con,$input_sql);


                    }

                }
               header("Location: dashboard/dashboard.php");
            }else{
                header("Location: dashboard/dashboard.php");
                exit(0);
            }

}


?>