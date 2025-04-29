<?php include "../config/config.php"; ?>
<?php 

$theater = $_POST['theaterValue'];
$date = $_POST['DateValue'];


$theater_query = "SELECT `timeslot` FROM `shows` where `theater_id` = :theater_id and `date` = :date";

$theater_prepare = $connection->prepare($theater_query);
$theater_prepare->bindParam(':theater_id',$theater);
$theater_prepare->bindParam(':date',$date);
$theater_prepare->execute();

$theaterTime = $theater_prepare->fetchAll(PDO::FETCH_ASSOC);


?>


<option value="">Select your Time</option> 

<?php foreach($theaterTime as $time){ ?>

<option value="<?= $time['timeslot'] ?>" > <?= $time['timeslot'] ?> </option>

<?php } ?>