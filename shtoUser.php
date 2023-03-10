<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />
    <script src="javaScript/shtoUser.js" defer></script>
    <title>Shto User</title>
</head>
<body>
    <main>
    
        <div class="user_input_box" >
            
            <div class="box-content">
                 <h4>Shto User</h4>
                 <?php
                 include "./model/astronomy.php";
                 $astronomy = new astronomy();
                 $shtoUser = $astronomy->shtoUser();
                 ?>
                    <form method="POST" action="shtoUser.php">
                <div class="form-row ">
                    <input type="name" id="name" class="input-field" placeholder="Name" name="firstName" required onkeyup="validateFirstName()">
                    <span id="firstname-error"></span>
                </div>
                     
                <div class="form-row ">
                    <input type="name" id="lastname" class="input-field" placeholder="Last name" name="lastName" required onkeyup="validateLastName()">
                    <span id="lastname-error"></span>
                 </div>
    
                <div class="form-row ">
                    <input type="email" placeholder="email" class="input-field" id="email" name="email" required onkeyup="validateEmail()" autocomplete="off">
                    <span id="email-error"></span>
                </div>
    
                <div class="form-row ">
                    <input type="password" placeholder="Password" class="input-field" id="password" name="password" required onkeyup="validatePassword()">
                    <span id="password-error"></span>
                </div>
    
                    <div class="form-row ">
                        <input type="text" placeholder="User Type" class="input-field" id="userType" name="userType" required onkeyup="validateUserType()" autocomplete="off">
                        <span id="usertype-error"></span>
                    </div>
                    
                        <div class="form-row">
                            <button type="submit"  class="button" value="Shto User" name='shto' onclick="return validateAddUser()">Shto User</button>
                            <span id="submit-error"></span>
                        </div>
                    </form>
        </div>
    </main>
</body> 
</html>