<?php include "../config/config.php"; ?>

<?php 

$theater = $_POST['theaterValue'];
$date = $_POST['DateValue'];
$time = $_POST['timeValue'];


$theater_query = "SELECT `seats` FROM `shows` where `theater_id` = :theater_id and `date` = :date and `timeslot` = :timeslot";

$theater_prepare = $connection->prepare($theater_query);
$theater_prepare->bindParam(':theater_id',$theater);
$theater_prepare->bindParam(':date',$date);
$theater_prepare->bindParam(':timeslot',$time);
$theater_prepare->execute();

$theaterSeats = $theater_prepare->fetch(PDO::FETCH_ASSOC);

$totalSeats = $theaterSeats['seats'];
echo $theaterSeats['seats'];


// *********************************************************
// for booked movies seats
// *********************************************************


$booked_seats_query = "SELECT `seats` FROM `movie_booking` where `theater_id` = :theater and `date` = :date and `time` = :time";
$booked_seats_prepare = $connection->prepare($booked_seats_query);
$booked_seats_prepare->bindParam(':theater',$theater);
$booked_seats_prepare->bindParam(':date',$date);
$booked_seats_prepare->bindParam(':time',$time);
$booked_seats_prepare->execute();

$bookedSeats = $booked_seats_prepare->fetchAll(PDO::FETCH_COLUMN);
print_r($bookedSeats);


    // $bookedSeats = [];


    if(in_array('22',$bookedSeats)){
        echo "exist";
    }else{
        echo "does'nt exist";

    }







?>

<h3 style="color:#fff;">Select your Seats:</h3>

<?php 

    for($i = 1; $i <= $totalSeats; $i++){ 
    
        if(in_array($i, $bookedSeats)){
    
    ?>
    <button class='col-2 seatBtn' style="background-image: linear-gradient(0deg, #636e72 0%, #535c68 100%);" disabled><?= $i; ?></button>
            <!-- <p>exist</p> -->
    <?php }else{ ?>
    

    <button class='col-2 seatBtn'><?= $i; ?></button>

<?php }} ?>


