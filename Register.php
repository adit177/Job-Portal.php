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
            margin-left:-5em;
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
    <form action="" method="post" id="signup" >
    <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input class="form-control" type="text" id="name" name="name" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">email</label>
    <input class="form-control"  aria-describedby="emailHelp" type="email" id="email" name="email" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input  class="form-control" type="password" id="password" name="password" required>
  </div>
  <div class="mb-3">
    <label for="password_confirmation" class="form-label">Repeat password</label>
    <input  class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
  </div>
  <div class="mb-3">
    <label for="number" class="form-label">Number</label>
    <input  class="form-control" type="text" id="number" name="number">
  </div>
  <div class="mb-3">
  <button type="submit" class="btn btn-primary" name="Login">Sign up</button>
  </div>  
    <p style="text-align: center;">New User?<br> Already have an account? <a href="Login.php">Sign in</a> </p>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>

<?php
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



if (empty($_POST["name"])) {
    die("");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}


if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);



$sql = "INSERT INTO candidates (name, email, password_hash, number)
        VALUES (?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}
if(isset($_POST["Login"])){
  $stmt->bind_param("ssss",
                  $_POST["name"],
                  $_POST["email"],
                  $password_hash,
                  $_POST["number"]);
                  
if ($stmt->execute()) {
    header("Location: index.php");
 exit;
}  else {
    
  if ($mysqli->errno === 1062) {
      die("email already taken");
  } else {
      die($mysqli->error . " " . $mysqli->errno);
  }
}
}


?>





