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
        <link rel="stylesheet" href="css/news.css">
        <script src="javaScript/nav.js" defer></script>
    <title>News</title>
</head>
<body>
    <div class="new-bg-shadow">
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

 <div class="top-section-description">
    <h1>LATEST DISCOVERIES</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In fugit laboriosam eligendi suscipit molestiae earum aperiam delectus incidunt, hic autem error officiis eos rerum illo. Delectus quasi dolor modi nobis.</p>
 </div>

   <section class="top-section">
    <div class="news1">
    <?php
$info= $astronomy->getPrimaryNews();
$i = 1;
if (!empty($info)) {
    foreach ($info as $news) {
?>
        <div class=" item img<?php echo $i ?>">
            <img  src="<?php echo $news['Image'] ?>" alt="foto" class="right-img">
            <div class="news-heading">
                <p><?php echo $news['Date'] ?></p>
                <a href="<?php echo $news['URL'] ?>" target="_blank"><h5><?php echo $news['Title'] ?></h5></a>
            </div>
        </div>
        <?php
        $i++;
    }
     } else {
echo "No news";
}
  ?>
    </div>
   </section>

   <br>
   <hr>
   <br>
   <section class="bottom-news">

   <?php
$info= $astronomy->getSecondaryNews();
$i = 1;
if (!empty($info)) {
    foreach ($info as $news) {
?>
        <div class="article bottom-article<?php echo $i ?>">
        <div class="article-date"><p><?php echo $news['Date'] ?></p></div>
        <div class="article-heading"><a href="<?php echo $news['URL'] ?>" target="_blank"> 
            <?php echo $news['Title'] ?>
       </a></div>
       <p class="arrow">&#8594;</p>
    </div>
        <?php
        $i++;
    }
     } else {
echo "No news";
}
  ?>
   </section>
    </div>
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