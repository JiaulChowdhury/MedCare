<?php
session_start();// Starting Session

//if session exit, user nither need to signin nor need to signup
if(isset($_SESSION['login_id'])){
  if (isset($_SESSION['pageStore'])) {
      $pageStore = $_SESSION['pageStore'];
header("location: $pageStore"); // Redirecting To Profile Page
    }
}

//Register progess start, if user press the signup button
if (isset($_POST['signUp'])) {
if (empty($_POST['fullName']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['nid']) || empty($_POST['newPassword'])) {
echo '<script>alert("Please fill up all the required field.")</script>';
}
else
{

$fullName = $_POST['fullName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$nid = $_POST['nid'];
$password = $_POST['newPassword'];
$hash = password_hash($password, PASSWORD_DEFAULT);

// Make a connection with MySQL server.
include('config.php');

$sQuery = "SELECT id from account where email=? LIMIT 1";
$iQuery = "INSERT Into account (fullName, email, phone, nid, password) values(?, ?, ?, ?, ?)";

// To protect MySQL injection for Security purpose
$stmt = $conn->prepare($sQuery);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($id);
$stmt->store_result();
$rnum = $stmt->num_rows;

if($rnum==0) { //if true, insert new data
          $stmt->close();
          
          $stmt = $conn->prepare($iQuery);
        $stmt->bind_param("sssss", $fullName, $email, $phone, $nid, $hash);
          if($stmt->execute()) {
        echo '<script>alert("Register successfully, Please login with your login details")</script>';}
        } else { 
       echo '<script>alert("Someone already register with this email address.")</script>';
     }
$stmt->close();
$conn->close(); // Closing database Connection
}
}

?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/styleSignIn.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>Responsive Login Page</title>
</head>

<body>
    <section class="side">
        <!-- <p class="main-msg">digital products marketplace</p>
        <p class="secondary-msg">Your perfect place to</br>buy & sell digital goods</p> -->
    </section>

    <section class="main">
    <p class="title">member register</p>

    <form class="signup" method="post" oninput='validatePassword()'>
        <div class="form-control">
            <input type="text" name="fullName" placeholder="Name">
            <div class="focused-border"></div>
            <i class="fas fa-user"></i>
        </div>
        <div class="form-control">
            <input type="email" name="email" placeholder="Email">
            <div class="focused-border"></div>
            <i class="fas fa-user"></i>
        </div>
        <div class="form-control">
            <input type="text" name="phone" placeholder="Phone no.">
            <div class="focused-border"></div>
            <i class="fas fa-user"></i>
        </div>
        <div class="form-control">
            <input type="text" name="nid" placeholder="NID no.">
            <div class="focused-border"></div>
            <i class="fas fa-user"></i>
        </div>
        <div class="form-control">
            <input type="password" name="newPassword" placeholder="Password">
            <div class="focused-border"></div>
            <i class="fas fa-unlock"></i>
        </div>
        <div class="form-control">
            <input type="password" name="conformpassword" placeholder="Confirm Password">
            <div class="focused-border"></div>
            <i class="fas fa-unlock"></i>
        </div>

            <button class="action" name="signUp">Register</button>
        </form>
        <p class="register">Already have an account?<a href="login.php">Login</a></p>
    </section>

    <script src="./index.js"></script>
    <script src="../dist/bundle.js"></script>

    <script>
        function validatePassword(){
            if(newPass.value != conformPass.value) {
                conformPass.setCustomValidity('Passwords do not match.');
            }else {
                conformPass.setCustomValidity('');
            }
        }
    </script>
</body>

</html>