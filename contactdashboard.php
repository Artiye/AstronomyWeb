<?php 
include './model/astronomy.php';
$astronomy= new astronomy();

// if(!isset($_SESSION['user'])){
//     header("Location: login.php");
//     exit();
// }

if($_SESSION['UserType'] !== "admin"){
    header("Location: home1.php");
    exit();
} else {
   $FirstName = $_SESSION['FirstName'];
   echo "Welcome, $FirstName";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
    <title>dashboard</title>
    
</head>
<body>
   
    <div class="dashboard">

    <h1>SPACED <span style="border-left:2px solid white;padding-left:6px;">Contact Dashboard</span></h1>


     <div class="buttons">
        <button class="button "><a href="home1.php">Home</a></button>
        <button class="button "><a href="dashboard.php">Dashboard</a></button>
     </div>
     <table>
    
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Action</th>
        </tr>
        <?php
$info= $astronomy->merriKontaktet();
$i = 1;
if (!empty($info)) {
    foreach ($info as $kontakt) {
?>
        <tr>
        <td><?php echo $kontakt['id'] ?></td>
        <td><?php echo $kontakt['Name'] ?> </td>
        <td><?php echo $kontakt['Email'] ?></td>
        <td><?php echo $kontakt['Message'] ?></td>
        <td class="actions">
            <button class="button delete"><a href="deletekontakt.php?kontakt=<?php echo $kontakt['id']; ?>">Delete</a></button>
        </td>
        </tr>
        <?php
    }
     } else {
echo "No kontakt";
}
  ?>
     </table>
    </div>
</body>
</html>