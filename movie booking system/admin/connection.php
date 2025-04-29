<?php

    try
    {
        $connection = new PDO("mysql:host=localhost;dbname=OMBS", 'root', '');
    }

    catch(PDOException $e)
    {
        echo $e->getMessage();
    }




?>