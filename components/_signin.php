<?php

require "./_database.php";

$showalert = false;
$showerror = false;
if(isset($_POST['username']))  {
    $user = $_POST['username'];
    $sql = "SELECT * FROM `users` WHERE username= '$user' ";
    $result = Mysqli_query($conn,$sql);
    $num_of_row = Mysqli_num_rows($result);
    if($num_of_row > 0){
        $showerror = "username aleardy exsist";
    }
    else{
        if($_POST['password']==$_POST['cpassword']){
        

            $pass = $_POST['password']; 
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` ( `username`, `password`) VALUES ( '$user', '$hash');";
            $res = Mysqli_query($conn,$sql);
            if(!$res){
                $showerror = "server error";
            }
            else{
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user;
                header("Location: /phpprojects/index.php",TRUE,301);
            }
        }
        else{
            $showerror = "please check password";
        }
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <title>Sign in</title>
</head>

<body>
    <?php
     
    include './_nav.php' ?>
    <div class="container">
        <?php 
        if($showerror){
            echo '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
               <strong>error!</strong>'. $showerror.'
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
         }
         if($showalert){
            echo '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>success!</strong>'. $showalert.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
         }
        ?>
        <form action="_signin.php" method="post">

            <h1 class="my-3">Sign In</h1>
            <div class="form-group">
                <div class="mb-3">
                    <label for="username" class="form-label">Enter Your Username</label>
                    <input type="username" name="username" class="form-control" id="username" placeholder=""required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Enter Password</label>
                    <input type="password" minlength="5" name="password" class="form-control" id="password" placeholder="" required>
                </div>
                <div class="mb-3">
                    <label for="cpassword" class="form-label">confirm Password</label>
                    <input type="password" name="cpassword" class="form-control" id="cpassword" placeholder="" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <p class="mb-3 my-4">If already have a account <a href="/phpprojects/components/_login.php">click here</a></p>
                
            </div>
        </form>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>