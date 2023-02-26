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
    <script src="signup.js" defer></script>
    <title>&#128301;Register</title>
</head>
<body>
    <main>
    
    <div class="user_input_box" >
            
        <div class="box-content">
             <h4>Sign up</h4>
             <?php
                    include './model/astronomy.php';
                    $astronomy= new astronomy();
                    $register= $astronomy->register();
                ?>
                    <form method="POST" action="register.php">
                
            <div class="form-row ">
                <input type="name" id="firstname" class="input-field" placeholder="First name" required onkeyup="validateFirstName()">
                <span id="firstname-error"></span>
            </div>
                 
            <div class="form-row ">
                <input type="name" id="lastname" class="input-field" placeholder="Last name" required onkeyup="validateLastName()">
                <span id="lastname-error"></span>
             </div>

            <div class="form-row ">
                <input type="email" placeholder="email" class="input-field" id="email" required onkeyup="validateEmail()">
                <span id="email-error"></span>
            </div>

            <div class="form-row ">
                <input type="password" placeholder="Password" class="input-field" id="password" required onkeyup="validatePassword()">
                <span id="password-error"></span>
            </div>

                <div class="form-row ">
                    <input type="password" placeholder="Confirm password" class="input-field" id="pass2" required onkeyup="validateConfirmPass()">
                    <span id="pass2-error"></span>
                </div>
                
                <div class="form-row">
                <button type="submit"  class="button" value="Create acc" onclick="return validateForm()">Create account</button>
                <span id="submit-error"></span>
                </div>
                </form>
              
                 <p style="font-size: smaller;">Already have an account?</p>
              <div class="login_button">
                 <button  class="button" onclick><a href="login.html">Login</a></button>
              </div>
          </div>
    </div>
    </main>
</body>
</html>