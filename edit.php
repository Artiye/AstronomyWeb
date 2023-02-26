
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
    <script src="app.js"></script>
    <title>Edit</title>
</head>
<body>
    <main>
    
        <div class="user_input_box" >
            
            <div class="box-content">
                 <h4>Edit</h4>
                 <?php
              include './model/astronomy.php';
              $astronomy = new Astronomy();
              $id = $_REQUEST['UserID'];
              $rez = $astronomy->getUser($id);
 
              if (isset($_POST['edit'])) {
                if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['userType'])) {
                     
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $userType = $_POST['userType'];
                    $editor = $_SESSION['FirstName'];
 
                    $edit = $astronomy->editUser($id, $firstName, $lastName, $email, $password, $userType, $editor);
 
                    if($edit){
                      echo "<script>alert('User edited successfully');</script>";
                      echo "<script>window.location.href = 'dashboard.php';</script>";
                    }else{
                      echo "<script>alert('User edit failed');</script>";
                      echo "<script>window.location.href = 'dashboard.php';</script>";
                    }
 
                  }else{
                    echo "<script>alert('empty');</script>";
                    header("Location: edit.php?id=$id");
                  }
                }
          ?>
                    <form method="POST">
                <div class="form-row ">
                    <input type="name" id="name" class="input-field" placeholder="Name" name="firstName" value="<?php echo $rez['FirstName'] ?>" required>
                </div>
                     
                <div class="form-row ">
                    <input type="name" id="lastname" class="input-field" placeholder="Last name" name="lastName" value="<?php echo $rez['LastName'] ?>" required>
                 </div>
    
                <div class="form-row ">
                    <input type="email" placeholder="email" class="input-field" id="email" name="email"  value="<?php echo $rez['Email'] ?>"required >
                </div>
    
                <div class="form-row ">
                    <input type="text" placeholder="Password" class="input-field" id="password" name="password" value="<?php echo $rez['Password'] ?>" required>
                </div>
    
                    <div class="form-row ">
                        <input type="text" placeholder="User Type" class="input-field" id="usertype" name="userType"  value="<?php echo $rez['UserType'] ?>" required>
                    </div>
                    
                    <div>
                    <button type="submit"  class="button" value="Edit acc" name='edit'>Edit account</button>
                    </div>
                    </form>
              </div>
        </div>
    </main>
</body>
</html>
