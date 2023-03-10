<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <script src="javaScript/sign-in.js" defer></script>
    <title>&#128301;login</title>
</head>
<body>
    <main>
    <div class="user_input_box" >
        <div class="box-content">
              <h4>Sign in</h4>

              <?php
    include './model/astronomy.php';
    $astronomy= new astronomy();
    $login= $astronomy->login();
?>
             <form method="POST" action="login.php">
             <div class="form-row">
             <input type="email" placeholder="Email" class="input-field" id="username" name="Email"  autocomplete="off" required onkeyup="validateUser()">
             <span id="user-error"></span>
             </div>
             <div class="form-row">
             <input type="password" placeholder="Password" class="input-field"  id="password" name="Password" required onkeyup="validatePassword()">
             <span id="pass-error"></span>
             </div>
             <div class="form-row">
                 <button  class="button" id="log-button" name="Login" onclick="return validateForm()">Log in</a></button>
                 <span id="submit-error2"></span>
             </div>
             </form>
              <p style="font-size: smaller;">Don't have an account?</p>
         
           <div class="register_button" >
              <button  class="button" id="register-button" ><a href="register.php">Sign up</a></button>
           </div>
          
   </div>
 </div>
    </main>
</body>
</html>