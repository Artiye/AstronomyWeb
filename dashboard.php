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
    <link rel="stylesheet" href="dashboard.css">
    <title>&#128301;dashboard</title>

</head>
<body>
    
    <div class="dashboard">

    <h1>SPACED <span style="border-left:2px solid white;padding-left:6px;">Dashboard</span></h1>


     <div class="buttons">
        <button class="button "><a href="home1.php">Home</a></button>
        <button class="button "><a href="shtoUser.php">Add New User</a></button>
        <button class="button "><a href="contactdashboard.php">Contact Dashboard</a></button>

     </div>
     <table>
    
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Editor</th>
            <th>Action</th>
        </tr>
        <?php
$info= $astronomy->getUsers();
$i = 1;
if (!empty($info)) {
    foreach ($info as $user) {
?>
        <tr>
        <td><?php echo $user['id'] ?></td>
        <td><?php echo $user['FirstName'] ?></td>
        <td><?php echo $user['Email'] ?></td>
        <td><?php echo $user['Password'] ?></td>
        <td><?php echo $user['editor'] ?></td>
        <td class="actions">
            <button class="button delete"><a href="delete.php?UserID=<?php echo $user['id']; ?>">Delete</a></button>
            <button class="button edit"><a href="edit.php?UserID=<?php echo $user['id']; ?>">edit</a></button>
        </td>
        </tr>
        <?php
    }
     } else {
echo "No users";
}
  ?>
     </table>
    </div>
</body>
</html>