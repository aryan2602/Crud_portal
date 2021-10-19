<?php 

include_once('config.php');

extract($_POST);

if($_FILES['photo']['name'] != ''){

    $filename = $_FILES['photo']['name'];
    $extention = pathinfo($filename,PATHINFO_EXTENSION); 
    $valid_extentions = array("jpg","jpeg","png");
    
    if(in_array($extention,$valid_extentions)){
        
        $new_name = rand().".".$extention;
        $path = $upload_path.$new_name;
        
        if(move_uploaded_file($_FILES['photo']['tmp_name'],$path)){
            
            $sql = "INSERT INTO `user` (`Name`, `Email`, `Phone`, `Age`, `Gender`, `Photo`, `Address`) VALUES ('$name', '$email', '$phone', '$age', '$gender', '$new_name', '$address')";
            
        }else{
            echo "Image Upload failed";    
        }
    }else{
        echo "Image extention not valid ! try again";
    }
}else{

    $sql = "INSERT INTO `user` (`Name`, `Email`, `Phone`, `Age`, `Gender`, `Address`) VALUES ('$name', '$email', '$phone', '$age', '$gender', '$address')";
}

if(isset($sql)){
    if(mysqli_query($conn,$sql)){
        echo 1;
    }else{
        echo "data already available";
    }
}
