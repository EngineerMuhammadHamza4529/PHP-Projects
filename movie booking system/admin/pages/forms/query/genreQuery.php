<?php include '../../../connection.php' ?>
<?php 

   $genreInput = $_POST['genreInput'];

    $genre_query = "INSERT INTO `genre`(`genre_name`) VALUES (:genreInput)";
    $genre_prepare = $connection->prepare($genre_query);
    $genre_prepare->bindParam(":genreInput", $genreInput, PDO::PARAM_STR);
    $genre_prepare->execute();



?>