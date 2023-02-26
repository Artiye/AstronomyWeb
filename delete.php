<?php
include './model/astronomy.php';
$astronomy = new astronomy();


if ($_SESSION['UserType'] !== 'admin') {
    echo "<script>window.location.href = '/home1.php';</script>";
}
$UserID = $_REQUEST['UserID'];
$delete = $astronomy->delete($UserID);

if ($delete) {
    echo "<script>alert('delete successfully');</script>";
    echo "<script>window.location.href = 'dashboard.php';</script>";
}