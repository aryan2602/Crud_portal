<?php 

include_once('config.php');

$sql = 'Select * From user';
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res) > 0){
    $data = array();
    while($row = mysqli_fetch_assoc($res)){
        $data[] = $row;
    }
    echo json_encode($data);
}else{
    echo 0;
}