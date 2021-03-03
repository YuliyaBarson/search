<?php
try {
    $dsn = 'mysql:host=localhost; 
    dbname=COMP1006_PHP';   
    $username = 'root';
    $password = 'root';
    $db = new PDO($dsn, $username, $password); 
}
catch(PDOException $e){
    echo "<p> Something went wrong :( </p>"; 
    $error_message = $e->getMessage(); 
    echo $error_message; 
}
?>