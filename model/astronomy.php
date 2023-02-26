<?php
session_start();

class Astronomy {

private $server = 'localhost';
private $username = 'root';
private $password = '';
private $database = 'spaced';
private $conn;

public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->database);
        } catch (Exception $ex) {
            echo 'Lost In Space' . $ex->getMessage();
        }
    }
    public function register() {
        
            if(isset($_POST['Register'])){
    
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $cpassword = $_POST['cpassword'];
            $editor = $firstName;
    
            if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($cpassword)) {
                echo "<script>alert('You havent completed the entire form');</script>";
                echo "<script>window.location.href = '/register.php'</script>";
                exit();
            }

            if ($password != $cpassword) {
                echo "<script>alert('Your passwords do not match');</script>"; 
                echo "<script>window.location.href = '/register.php'</script>";
                exit();
            }
    
            $query = "INSERT INTO userdb(FirstName, LastName,Email,Password, editor) VALUES ('$firstName', '$lastName','$email','$password', '$editor')";
            if ($sql = $this->conn->query($query)) {
                echo "<script>alert('Added successfully');</script>";
                echo "<script>window.location.href = '/login.php'</script>";
                exit();
            } else {
                echo "<script>alert('failed');</script>";
                echo "<script>window.location.href = '/register.php'</script>";
            }
            }
        }
        public function getUsers() {
        $info = null;
        $query = "SELECT * FROM userdb";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $info[] = $row;
            }
        }
        return $info;
    }
    public function login() {
        if(isset($_POST['Login'])){
        $email = $_POST['Email'];
        $password = $_POST['Password'];
        if (empty($email) || empty($password)) {
            echo "You haven't filled out the form";
            exit();
        }

        $query = "SELECT * FROM userdb WHERE Email='" . $email . "' AND Password='" . $password . "' ";
        $rez = mysqli_query($this->conn, $query);
        $info = mysqli_fetch_array($rez);    

        if (mysqli_num_rows($rez) > 0) {
            $_SESSION['FirstName'] = $info['FirstName'];

            if($info['UserType'] === 'admin') {
                $_SESSION['UserType'] = 'admin';
                $UserType = $_SESSION['UserType'];
                echo "<script>alert('Welcome to our galaxy, $UserType');</script>";
                echo "<script>window.location.href = '/dashboard.php';</script>";
            } else {
                $_SESSION['UserType'] = 'user';
                echo "<script>alert('Welcome to our galaxy');</script>";
                echo "<script>window.location.href = '/home1.php';</script>";
            }
        } else {
            echo "<script>alert('Incorrect username or password');</script>";
            
        }
        
        }
        
    }
    public function delete($UserID)
    {

        $query = "DELETE FROM userdb where id = '$UserID'";
        if ($info = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }
    public function shtoUser() {
        
        if(isset($_POST['shto'])){

       $firstName = $_POST['firstName'];
       $lastName = $_POST['lastName'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       $userType = $_POST['userType'];
       $editor = $_SESSION['FirstName'];

       if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($userType)) {
           echo "<script>alert('You haven\'t completed the entire form');</script>";
           echo "<script>window.location.href = '/shtoUser.php';</script>";
           exit();
       }

       if($userType != 'admin' && $userType != 'user') {
           echo "<script>Please only choose usertypes consisting of admin or user.</script>";
           echo "<script>window.location.href = '/shtoUser.php';</script>";
           exit();
       }
       $query = "INSERT INTO userdb(FirstName, LastName,Email,Password, UserType, editor) VALUES ('$firstName', '$lastName','$email','$password', '$userType', '$editor')";
       if ($sql = $this->conn->query($query)) {
           echo "<script>alert('Added successfully');</script>";
           echo "<script>window.location.href = '/login.php';</script>";
       } else {
           echo "<script>alert('failed');</script>";
           echo "<script>window.location.href = '/register.php';</script>";
       }
       }
   }
    public function getUser($id)
    {

        $data = null;

        $query = "SELECT * FROM userdb WHERE id = '$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function editUser($id, $firstName, $lastName, $email, $password, $userType, $editor)
    {

        $query = "UPDATE userdb SET FirstName = '$firstName', LastName = '$lastName', Email = '$email', Password = '$password', UserType = '$userType', editor = '$editor' WHERE userdb.id = '$id'";

        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function logout() {
        session_destroy();
        echo "<script>alert('You have been logged out');</script>";
        echo "<script>window.location.href = '/home1.php';</script>";
    }

    public function getHero() {
            $data = null;
            $query = "SELECT * FROM hero";
            $result = mysqli_query($this->conn, $query);
            return $result;
    }

    public function getAboutUs() {
        $data = null;
        $query = "SELECT * FROM about";
        $result = mysqli_query($this->conn, $query);
        return $result;
}

    public function getSliders() {
        $info = null;
        $query = "SELECT * FROM slider";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $info[] = $row;
            }
        }
        return $info;
    }

    public function getSecondaryNews() {
        $info = null;
        $query = "SELECT * FROM news2";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $info[] = $row;
            }
        }
        return $info;
    }
    public function getPrimaryNews() {
        $info = null;
        $query = "SELECT * FROM news";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $info[] = $row;
            }
        }
        return $info;
    }
    public function ruajKontakt() {
        
        if(isset($_POST['kontakt'])){

        $name = $_POST['Name'];
        $email = $_POST['Email'];
        $message = $_POST['Message'];

        if (empty($name) || empty($email) || empty($message)) {
            echo "<script>alert('You havent completed the entire form');</script>";
            echo "<script>window.location.href = '/contact.php'</script>";
            exit();
        }

        $query = "INSERT INTO contact(Name, Email, Message) VALUES ('$name', '$email','$message')";
        if ($sql = $this->conn->query($query)) {
            echo "<script>alert('Added successfully');</script>";
            echo "<script>window.location.href = '/home1.php'</script>";
            exit();
        } else {
            echo "<script>alert('failed');</script>";
            echo "<script>window.location.href = '/contact.php'</script>";
        }
        }
    }

    public function merriKontaktet() {
        $info = null;
        $query = "SELECT * FROM contact";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $info[] = $row;
            }
        }
        return $info;
    }

    public function deletekontakt($kontaktID)
    {

        $query = "DELETE FROM contact where id = '$kontaktID'";
        if ($info = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }
}
