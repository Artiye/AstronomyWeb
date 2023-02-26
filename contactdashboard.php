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
    <title>dashboard</title>
    <style>
     
      *{
     font-family: 'Manrope', sans-serif;
       }

     body{
        margin:3rem;
        padding:0;
        background-color: rgb(86, 87, 92);
        color:white;
        overflow-x: hidden;
        display:flex;
        justify-content: center;
        align-items: center;
     }

     .dashboard{
        width:100%;
        height:fit-content;
        padding-bottom:3rem;
        display:flex;
        flex-direction: column;
        align-items: center;
        justify-content:center;

     }
     
     .sbuttons{
        width:100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 0 1rem 3rem;
     }

     .button{
        border-style: none;
        background-color: rgb(255, 254, 254);
        padding:9px;
        opacity:.6;
        transition: .5s;
     }

     .button:hover{
        opacity:.8;
        transition: .5s;
     }

     .button>a{
        text-decoration: none;
        color:rgb(0, 0, 0);
     }
     
     th,td{
        border-bottom: 1px solid white;
        border-right:1px solid white;
     }
     table {
        table-layout: fixed;
       width: 100%;
     }

     .actions{
        display: flex;
        justify-content: flex-end;
        gap:1rem;
        padding-right:5px;
     }
     
     .actions a{
        color: white; 
     }

     .delete{
        background-color: rgb(183, 6, 6);
        
     }
     

     .edit{
        background-color: rgb(49, 50, 49);
     }
     
     
    </style>
</head>
<body>
   
    <div class="dashboard">

     <h1>SPACED | Dashboard</h1>


     <div class="buttons">
        <button class="button "><a href="shtoUser.php">Add New User</a></button>
        <button class="button "><a href="home1.php">Home</a></button>
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