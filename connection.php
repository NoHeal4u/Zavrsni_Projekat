<?php
//
//require 'core/bootstrap.php';
//
//if (Request::method() === 'POST') {
//    App::get('post')->create();
    // ako su mysql username/password i ime baze na vasim racunarima drugaciji
    // obavezno ih ovde zamenite
    $servername = "127.0.0.1:3306";
    $username = "root";
    $password = "vivify";
    $dbname = "blog2";

    try {

        $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }
?>