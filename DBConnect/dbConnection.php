<?php

    //Constant
    define("HOST", 'localhost');
    define("USERNAME", 'root');
    define("PASSWORD", '');
    define("DATABASE", 'contribution_university_magazine');

    //Create connection
    $conn = mysqli_connect(HOST,USERNAME,PASSWORD,DATABASE);

    if(!$conn){
        die('Connection Failed: ' .mysqli_connect_error());
    }

    // echo "Connection Successfully Established";


?>