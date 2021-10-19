<?php 

include_once('config.php');

if(!empty($_POST['userid'])){

    $sql = "DELETE FROM user WHERE Id = '{$_POST['userid']}';";
    if(mysqli_query($conn,$sql)){

        if($_POST['userimg'] != "test.com-user.png"){
            unlink($upload_path.$_POST['userimg']);
        }
        
        echo 1;

    }else{
        echo 0;
    }
}else{
    echo 0;
}