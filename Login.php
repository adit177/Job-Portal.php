<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    
$host = "localhost";
$dbname = "job_portal";
$username = "root";
$password = "";

$mysqli = new mysqli(hostname: $host,
                     username: $username,
                     password: $password,
                     database: $dbname);
                     
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

    
    $sql = sprintf("SELECT * FROM candidates
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
        body{
            background-image: url("background.jpg");
            background-size: cover;
            margin:0px;
            padding:0px;
        }
        form{
            background-color:#fff;
            margin-top:10em;
            margin-left:-4em;
            margin-right:45em;
            padding: 30px;
            box-shadow: 10px 10px 8px 10px #888888;
        }
        @media screen and (max-width: 980px) {
          form{
            margin-top:10em;
            margin-left:-3em;
            margin-right:20em;
        }
        }
        @media screen and (max-width: 680px) {
          form{
            margin-top:10em;
            margin-left:0em;
            margin-right:10em;
        }
        }
        @media screen and (max-width: 500px) {
          form{
            margin-top:10em;
            margin-left:1em;
            margin-right:1em;
        }
        }
    </style>
  </head>
  <body>
    <div class="container">
    
    <form method="POST">
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
  <div class="mb-3">
    <label for="email" class="form-label">Email address</label>
    <input class="form-control" type="email" name="email" id="email" aria-describedby="emailHelp" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input  class="form-control" type="password" name="password" id="password">
  </div>
  <div class="mb-3">
  <button type="submit" class="btn btn-primary" name="Login">Submit</button>
  </div>  
    <p style="text-align: center;">New User?<br> Create Account <a href="Register.php">Sign Up</a> </p>
</form>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>








