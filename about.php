<?php 
include './model/astronomy.php';
$astronomy= new astronomy();
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
        <link rel="stylesheet" href="css/nav.css">
        <link rel="stylesheet" href="css/about.css">
        <script src="javascript/nav.js" defer></script>
    <title>about</title>
</head>
<body>
    <nav>
        <a href="about.php"><h1 class="logo">SPACED</h1></a>
        <a href="#" class="nav-button">
           <span class="bar"></span>
           <span class="bar"></span>
           <span class="bar"></span>
        </a>
        <div class="links">
        <ul>
            <li><a href="home1.php">Home</a></li>
            <li><a href="test-news.php">News</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="dashboard.php" id='dbLink'>Dashboard</a></li>
            <li><a href="login.php" id='linkuLogin'>Login</a></li>
        </ul>
        </div>
     </nav>
     
      <section>
        <main>
            <?php 
            $info= $astronomy->getAboutUs();
            $about = mysqli_fetch_array($info);
            ?>
               <h1 class="animate heading"><?php echo $about['Title'] ?></h1>
               <p class="animate paragraph1"><?php echo $about['Description'] ?></p>
               <p class="animate paragraph2"><?php echo $about['Description2'] ?></p>
               <p class="animate paragraph3"><?php echo $about['Description3'] ?></p>
     </main>
      </section>
      <?php
     if(isset($_SESSION['FirstName'])) {
        $FirstName = $_SESSION['FirstName'];
        echo "<script>
        let user = document.getElementById('linkuLogin');
        user.innerText = '$FirstName';
        user.href = 'logout.html';
        </script>";
    }
    if(isset($_SESSION['UserType'])) {
        $UserType = $_SESSION['UserType'];
        if($UserType === 'admin') {
            echo "<script>
            let db = document.getElementById('dbLink');
            db.style.display = 'block';</script>";
        } else {
            echo "<script>
            let db = document.getElementById('dbLink');
            db.style.display = 'none';</script>";
        }
    } else {
        echo "<script>
            let db = document.getElementById('dbLink');
            db.style.display = 'none';</script>";
    }
    ?>
</body>
</html>
