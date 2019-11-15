<?php
    $hostname = "localhost";
    $database = "noticias";
    $username = "root";
    $password = '';

        try{
            $conexion = new PDO ('mysql:host=' . $hostname . ';dbname=' . $database, $username, $password);
            //print "la DB se conecto. </br>";
        }
        catch(PDOException $e){
            print "ERROR: ".$e->getMessage();
            die();
        }
    ?>
