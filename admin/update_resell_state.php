<?php
include('functions.php');

$order_id = $_POST['repair_id'];
$user_id = $_POST['signup_id'];
$admin_id = $_POST['admin_id'];
$state = $_POST['state'];

require_once('livechat/database_connection.php');

$sql = "UPDATE resell_order SET status = '$state' Where resell_id = $order_id";

$result = $connect->prepare($sql);
$result->execute();

if($result->rowCount() > 0)
{
    $url = "resell_order_show.php";
    $title = "Employee ".$_SESSION['admin']['first']. " updated status to Recieved of resell order of order id $order_id";
    $notification = notificationInsert($admin_id, $url, $title, $connect);

    if($notification === 1)
    {
        header("location:resell_employee_order_show.php?success=Status has been changed Successfully");
    }

}
else
{
    header("location:resell_employee_order_show.php?You cant change same status");
}
