<?php

//update_last_activity.phps

include('database_connection.php');

session_start();

$query = "
UPDATE login_details
SET last_activity = now()
WHERE login_details_id = '".$_SESSION['admin']["login_details_id"]."'
";

$statement = $connect->prepare($query);

$statement->execute();
