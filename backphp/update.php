<?php 

include_once('config.php');


if(!empty($_POST['userid']) && $_POST['update'] == 'getdata'){

    $sql = "SELECT * from user WHERE Id = '{$_POST['userid']}';";
    $res = mysqli_query($conn,$sql); 
    $row = mysqli_fetch_assoc($res);
    echo json_encode($row);

}else if($_POST['update'] == 'update'){

    extract($_POST);

    if($_FILES['edit_photo']['name'] != ''){

        $filename = $_FILES['edit_photo']['name'];

        $extention = pathinfo($filename,PATHINFO_EXTENSION); 
        $valid_extentions = array("jpg","jpeg","png");
        
        if(in_array($extention,$valid_extentions)){

            $new_name = rand().".".$extention;
            $path = $upload_path.$new_name;

            // Delete old photo except test.com-user.png
            if($old_photo != "test.com-user.png"){
                unlink($upload_path.$old_photo);
            }

            if(move_uploaded_file($_FILES['edit_photo']['tmp_name'],$path)){
                
                $sql = "UPDATE `user` SET `Name` = '$edit_name',`Email` = '$edit_email',`Phone` = '$edit_phone',`Age` = '$edit_age',`Gender` = '$edit_gender',`Photo` = '$new_name',`Address` = '$edit_address' WHERE `Id` = '$id'";
            
            }else{
                echo "Image Updation failed";    
            }

        }else{
            echo "Image extention not valid ! try again";
            
        }

    }else{

        $sql = "UPDATE `user` SET `Name` = '$edit_name',`Email` = '$edit_email',`Phone` = '$edit_phone',`Age` = '$edit_age',`Gender` = '$edit_gender',`Photo` = '$old_photo',`Address` = '$edit_address' WHERE `Id` = '$id'";
    }

    if(isset($sql)){
        if(mysqli_query($conn,$sql)){
            echo 1;
        }else{
            echo "Updation failed";
        }
    }

}else{
   echo 'opration denied';
}