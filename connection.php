<?php      
    $host = "127.0.0.1";
    $user = "root";  
    $password = 'Polin#96';  
    $db_name = "erp";  
    $port = "3366";
      
    $con = mysqli_connect($host, $user, $password, $db_name, $port);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  
