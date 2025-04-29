<?php include "../config/config.php"; ?>
<?php 

$theater = $_POST['theaterValue'];
$movieId = $_POST['movieId'];


$theater_query = "SELECT distinct `date` FROM `shows` where `theater_id` = :theater_id and `movie_id` = :movieId";

$theater_prepare = $connection->prepare($theater_query);
$theater_prepare->bindParam(':theater_id',$theater);
$theater_prepare->bindParam(':movieId',$movieId);
$theater_prepare->execute();

$theaterDate = $theater_prepare->fetchAll(PDO::FETCH_ASSOC);


?>


<option value="">Select your Date</option> 

<?php foreach($theaterDate as $date){ ?>

<option value="<?= $date['date'] ?>" > <?= $date['date'] ?> </option>

<?php } ?>