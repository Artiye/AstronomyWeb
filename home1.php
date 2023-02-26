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
    <title>&#128301;Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="nav.css">
    <script src="slider.js" defer></script>
    <script src="nav.js" defer></script>

</head>
<body>
    <nav>
        <a href="about.html"><h1 class="logo">SPACED</h1></a>
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
            <li><a href="login.php">Login</a></li>
        </ul>
        </div>
     </nav>



     <?php 
     $data = $astronomy->getHero();
     $hero = mysqli_fetch_array($data);
     ?>
     <div class="intro-section">
         <div class="intro-sec-img">
            <img src="<?php echo $hero['Image'] ?>" alt="">
         </div>
         <div class="intro-sec-description">
            <h2><?php echo $hero['Title'] ?></h2>
            <p><?php echo $hero['Description'] ?></p>
         </div>
     </div>
 <!-- <div class="intro-section">
         <div class="intro-sec-img">
            <img src="images/first-section-home2.jpg" alt="">
         </div>
         <div class="intro-sec-description">
            <h2>What is Astronomy and why study it?</h2>
            <p>Astronomy is a science that seeks to explain everything that we observe in the Universe, 
                from the comets and planets in our own solar system to distant galaxies to the echoes of the Big Bang.
                Astronomy has a unique ability to unite humans.
                 Simply by asking big questions about the Universe and our place in it,
                  we see ourselves as we are: together, 
                voyaging through a singular moment in time on one 
                very special but relatively minuscule planet among the vastness of space.</p>
         </div>
     </div> -->


     <div class="home-content-nav">
        <div class="nav-row-img">
            <img src="images/home-img3.jpg" alt="">
        </div>
        <div class=" box solar-system-nav-to">
            <div class="inner-box">
                <h2>Our Solar System</h2>
                <button  class="home-nav-button" onclick><a href="https://solarsystem.nasa.gov/solar-system/our-solar-system/in-depth/" target="_blank">Go To</a></button>
            </div>
        </div>
        <div class=" box articles-nav-to">
            <div class="inner-box">
                <h2>General Astronomy Articles</h2>
                <button  class="home-nav-button" onclick><a href="https://seedscientific.com/astronomy-statistics/" target="_blank">Go To</a></button>
            </div>
        </div>
        <div class=" box books-nav-to">
            <div class="inner-box">
                <h2>Astronomy Books</h2>
                <button  class="home-nav-button" onclick><a href="https://www.space.com/32982-best-astronomy-books.html" target="_blank">Go To</a></button>
            </div>
        </div>
        <div class=" box websites-nav-to">
            <div class="inner-box">
                <h2>Astronomy websites</h2>
                <button  class="home-nav-button" onclick><a href="https://www.makeuseof.com/tag/universe-amazing-astronomy-websites/" target="_blank">Go To</a></button>
            </div>
        </div>
     </div>
    

     <div class="section2-content-description">
        <p>Related helpful articles</p>
     </div>


     <section class="info-section1">
        <div class="slider" data-slider>
          <button class="slider-button prev" data-slider-button="prev">&#8249;</button>
          <button class="slider-button next" data-slider-button="next">&#8250;</button>
  
          <ul data-slides>  
            
          <?php 
        $sliderDB = $astronomy->getSliders();
        foreach ($sliderDB as $index => $slide) { ?>
        <li class="slide"<?php echo ($index == 0) ? ' data-active' : ''; ?>>
        <img src="<?php echo $slide['Image']; ?>">
        <div class="info"<?php echo ($index == 0) ? ' id="info1"' : ''; ?>>
            <h2><?php echo $slide['Title']; ?></h2>
            <p><?php echo $slide['Description']; ?></p>
            <button class="slider-content-button"><a href="<?php echo $slide['URL']; ?>" target="_blank">Read more</a></button>
        </div>
        </li>
<?php } ?>
  
              
          </ul>
        </div>
       </section>
       <div class="slider-description">
        <p>Selected articles about planets in our solar system</p>
     </div>
    <br>

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