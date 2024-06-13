<?php

    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "hridoy");

    $conection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);


    if(!$connection){
        die("Connection Failed");

    }

    else{
        echo "yes";
    }

?>