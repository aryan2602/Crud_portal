<?php 

    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'crudportal';

    $conn = mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die('Connection Failed');
    $upload_path = '../upload/';