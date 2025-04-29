<?php

include '../backend/db.php';


session_start();


if (!isset($_SESSION['userlogin'])) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/print.css" media="print"> 
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
   <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <title>COURIER</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h2 class="text-center mb-4">Courier Detail</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tracking Number</th>
                            <th>Sender Name</th>
                            <th>Receiver Name</th>
                            <th>Courier Status</th>
                            <th>Delivery Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $tracking_number = $_POST['tracking_number'];

                            // Prepare the SQL statement to prevent SQL injection
                            $stmt = $conn->prepare("SELECT * FROM courier LEFT JOIN status ON courier.courier_status = status.status_id WHERE tracking_number = ?");
                            $stmt->bind_param("s", $tracking_number);

                            // Execute the statement
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                        ?>
                        <tr>
                            <td><?php echo $row['tracking_number']?></td>
                            <td><?php echo $row['sender_name']?></td>
                            <td><?php echo $row['receiver_name']?></td>
                            <td><?php echo $row['status_type']?></td>
                            <td><?php echo $row['delivery_date']?></td>
                        </tr>
                        <?php
                            //  // Output escaping to prevent XSS
                            //  echo "Name: " . htmlspecialchars($row['sender_name']) . "<br>";
                            //  echo "Tracking Number: " . htmlspecialchars($row['tracking_number']) . "<br>";
                            //  echo "Status: " . htmlspecialchars($row['status_type']) . "<br>";
                         } else {
                             echo "No courier found with that tracking number";
                         }

                         // Close the statement and connection
                         $stmt->close();
                         $conn->close();
                     }
                        ?>
                    </tbody>
                </table>
                <div class="text-end">
                    <button onclick="window.print();" class="btn btn-primary py-2 px-4" id="print-btn">Print</button>
                    <!-- <a href="user_data_print.php" class="btn btn-primary py-2 px-4">Print</a> -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>