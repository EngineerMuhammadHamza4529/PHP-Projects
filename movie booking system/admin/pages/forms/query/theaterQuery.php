<?php include '../../../connection.php' ?>
<?php 

   $theaterInput = $_POST['theaterInput'];

    $theater_query = "INSERT INTO `theatre`(`theatre_name`) VALUES (:theaterInput)";
    $theater_prepare = $connection->prepare($theater_query);
    $theater_prepare->bindParam(":theaterInput", $theaterInput, PDO::PARAM_STR);
    $theater_prepare->execute();



?>