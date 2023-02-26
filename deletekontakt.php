<?php
include './model/astronomy.php';
$astronomy = new astronomy();


if ($_SESSION['UserType'] !== 'admin') {
    echo "<script>window.location.href = '/home1.php';</script>";
}
$kontaktID = $_REQUEST['kontakt'];
$delete = $astronomy->deletekontakt($kontaktID);

if ($delete) {
    echo "<script>alert('delete successfully');</script>";
    echo "<script>window.location.href = 'contactdashboard.php';</script>";
}
