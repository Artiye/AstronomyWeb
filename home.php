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
            <li><a href="home.html">Home</a></li>
            <li><a href="news.html">News</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="login.html">Login</a></li>
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
  
               <!-- <li class="slide" data-active>
                      <img src="images/theSun2.jpg" alt="the sun">
                      <div class="info" id="info1">
                          <h2>The Sun</h2>
                      <p>Is the star at the center of the Solar System. It is a nearly perfect ball of hot plasma,
                           heated to incandescence by nuclear fusion reactions in its core.
                           The Sun radiates this energy mainly as light, ultraviolet, and infrared radiation, 
                           and is the most important source of energy for life on Earth.</p>
                          <button class="slider-content-button"><a href="https://solarsystem.nasa.gov/solar-system/sun/overview/" target="_blank">Read more</a></button>
                  </div>
              </li>
  
              <li class="slide">
                      <img src="images/mercury2.jpg" alt=" mercury">
                      <div class="info">
                          <h2>Mercury</h2>
                          <p>Is a rocky planet, also known as a terrestrial planet. 
                              Mercury has a solid, cratered surface, much like the Earth's moon. 
                              Mercury is the smallest planet in the Solar System and the closest to the Sun.
                              Its orbit around the Sun takes 87.97 Earth days, the shortest of all the Sun's planets.</p>
                               <button class="slider-content-button"><a href="https://solarsystem.nasa.gov/planets/mercury/overview/" target="_blank">Read more</a></button>
                      </div>
              </li>
  
              <li class="slide">
                      <img src="images/venus2.jpg" alt="venus">
                      <div class="info">
                          <h2>Venus</h2>
                          <p>Is the second planet from the Sun and is Earth's closest planetary neighbor. 
                              It's one of the four inner, terrestrial (or rocky) planets,
                               and it's often called Earth's twin because it's similar in size and density.</p>
                               <button class="slider-content-button"><a href="https://solarsystem.nasa.gov/planets/venus/overview/" target="_blank">Read more</a></button>
                      </div>
              </li>
  
              <li class="slide">
                      <img src="images/earth.jpg" alt="planet earth">
                      <div class="info">
                          <h2> <span id="earth-title">Earth</span> </h2>
                          <p> Is the third planet from the Sun and the only place known in the universe where life has originated and found habitability.
                               While large volumes of water can be found throughout the Solar System, only Earth sustains liquid surface water.</p>
                               <button class="slider-content-button"><a href="https://solarsystem.nasa.gov/planets/earth/in-depth/#:~:text=Our%20home%20planet%20is%20the,liquid%20water%20on%20the%20surface." target="_blank">Read more</a></button>
                      </div>
              </li>
  
              <li class="slide">
                      <img src="images/mars3.jpg" alt="planet mars">
                      <div class="info">
                          <h2>Mars</h2>
                          <p> Is the fourth planet from the Sun - a dusty, cold, desert world with a very thin atmosphere.
                               Mars is also a dynamic planet with seasons, polar ice caps, canyons, extinct volcanoes,
                                and evidence that it was even more active in the past.</p>
                               <button class="slider-content-button"><a href="https://solarsystem.nasa.gov/planets/mars/overview/" target="_blank">Read more</a></button>
                      </div>
              </li>
  
              <li class="slide">
                      <img src="images/jupiter2.jpg" alt="jupiter">
                      <div class="info">
                          <h2>Jupiter</h2>
                          <p>Is the fifth planet from the Sun and the largest in the Solar System.
                               It is a gas giant with a mass more than two and a half times that of all the other planets in the Solar System combined,
                               and slightly less than one one-thousandth the mass of the Sun.</p>
                               <button class="slider-content-button"><a href="https://www.nasa.gov/audience/forstudents/5-8/features/nasa-knows/what-is-jupiter-58.html" target="_blank">Read more</a></button>
                      </div>
              </li>
  
              <li class="slide">
                      <img src="images/saturn.jpg" alt="saturn">
                      <div class="info">
                          <h2>Saturn</h2>
                          <p>Is the sixth planet from the Sun and the second-largest in the Solar System, after Jupiter.
                               It is a gas giant with an average radius of about nine and a half times that of Earth.
                               It has only one-eighth the average density of Earth, but is over 95 times more massive.</p>
                               <button class="slider-content-button"><a href="https://solarsystem.nasa.gov/planets/saturn/overview/" target="_blank">Read more</a></button>
                      </div>
              </li>
  
              <li class="slide">
                      <img src="images/uranus3.jpg" alt="uranus">
                      <div class="info">
                          <h2>Uranus</h2>
                          <p>Is the seventh planet from the Sun, and has the third-largest diameter in our solar system.
                               It was the first planet found with the aid of a telescope,
                               Uranus was discovered in 1781 by astronomer William Herschel, 
                               although he originally thought it was either a comet or a star.</p>
                               <button class="slider-content-button"><a href="https://solarsystem.nasa.gov/planets/uranus/overview/" target="_blank">Read more</a></button>
                      </div>
              </li>
  
              <li class="slide">
                      <img src="images/neptune.jpg" alt="neptune">
                      <div class="info">
                          <h2>Neptune</h2>
                          <p>Is the eighth planet from the Sun and the farthest known planet in the Solar System. 
                              It is the fourth-largest planet in the Solar System by diameter, the third-most-massive planet,
                               and the densest giant planet. It is 17 times the mass of Earth, 
                               and slightly more massive than its near-twin Uranus. </p>
                               <button class="slider-content-button"><a href="https://solarsystem.nasa.gov/planets/neptune/overview/" target="_blank">Read more</a></button>
                      </div>
              </li> -->
          </ul>
        </div>
       </section>
    
       <div class="slider-description">
        <p>Selected articles about planets in our solar system</p>
     </div>
    <br>
</body>
</html>