<?php include "../config/config.php"; ?>
<?php 

$username = $_POST["username"];
$movieName = $_POST["movieName"];
$movieId = $_POST["movieId"];
$seatArray = $_POST["seatArray"];
$theater = $_POST["theater"];
$agelimit = $_POST["agelimit"];
$date = $_POST["date"];
$time = $_POST["time"];
$userId = $_POST["userId"];




    foreach($seatArray as $seats)
    {
        $sqlinsert = "INSERT INTO `movie_booking`(`username`, `movie_name`, `movie_id`, `seats`, `theater_id`, `age_limits`, `date`, `time`, `user_id`) VALUES (:user_name, :movie_name, :movie_id, :seats, :theatre, :age_limits, :date, :time, :user_id)";

        $insertPrepare = $connection->prepare($sqlinsert);
        $insertPrepare->bindParam(":user_name", $username);
        $insertPrepare->bindParam(":movie_name", $movieName);
        $insertPrepare->bindParam(":movie_id", $movieId);
        $insertPrepare->bindParam(":theatre", $theater);
        $insertPrepare->bindParam(":seats", $seats);
        $insertPrepare->bindParam(":age_limits", $agelimit);
        $insertPrepare->bindParam(":date", $date);
        $insertPrepare->bindParam(":time", $time);
        $insertPrepare->bindParam(":user_id", $userId);
        $insertPrepare->execute();
    }


 




?>