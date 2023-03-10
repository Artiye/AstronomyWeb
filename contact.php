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
        <link rel="stylesheet" href="css/contact.css">
        <script src="javaScript/nav.js" defer></script>
        <script src="javaScript/contact.js" defer></script>
    <title>Contact</title>
</head>
<body>
    <div class="shadow">
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

   
    <div class="contact">

        <div class="contact-form">
        <h1>Contact Us</h1>
        <p>please feel free to contact us and we will reach back to you as soon as we can</p>

        <?php 
        include './model/astronomy.php';
        $astronomy = new astronomy();
        $kontakt = $astronomy->ruajKontakt();
        ?>
        <form class="form" action="" method="POST">
            <div class="form-group">
                <input type="name" placeholder="Name" class="input-field" name='Name' id="contact-name" onkeyup="validateName()" >
                <span id="name-error"></span>
            </div>
            
            <div class="form-group">
                <input type="email" placeholder="Email" class="input-field" name='Email' id="contact-email" onkeyup="validateEmail()">
                <span id="email-error"></span>
            </div>

            <div class="form-group">
                <textarea name="Message" cols="20" rows="6" placeholder="Message" class="input-field" id="contact-message" onkeyup="validateMessage()"></textarea>
                 <span id="message-error"></span>
            </div>

            <div class="form-group">
                <button type="submit" value="submit" class="button" name="kontakt" onclick="return validateForm()">Submit</button>
                <span id="submit-error"></span>
            </div>
        </form>
        </div>

        <div class="additional-details">
          <h4>Talk To Us</h4>
          <p>spaced@studio.com</p>
          <div class="socials">
           <a href="#"> <img src="images/twitter-logo2.png" alt="twitter logo"   style="width:30px"></a>
           <a href="#"> <img src="images/instagram-logo3.png" alt="ig logo"     style="width:40px"></a>
           <a href="#"> <img src="images/facebook-logo.png" alt="facebook logo" style="width:30px"></a>
          </div>
        </div>
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