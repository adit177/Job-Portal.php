<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Career Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
          .job{
            background-image: url("https://hrbays.com/resources/assets/images/imagesWebsite/recruitment.jpg;jsessionid=263B7C9314A2C719C092E355BD28B4AE");
            color:#fff;
            padding-top: 150px;
            padding-bottom: 100px;
            padding-left:200px;
            font-family: Arial, Helvetica, sans-serif;
            background-size: cover;
          }
          .job h1{
            font-size:100px;
          }
          .job p{
            font-size:30px;
            font-family: "Times New Roman", Times, serif;
          }
          .card{
            width: auto; 
            border:solid 1px black;
            box-shadow: 10px 10px 8px 10px #888888;
            margin-top: 40px; 
            margin-left: 30px;
            margin-right:30px
          }
          .card:hover{
            box-shadow: 5px 5px 4px 5px #888888;
          }
          .career{
            display: grid;
            grid-template-columns: auto auto auto;
            gap: 10px;
            padding: 20px 0;
          }
          @media(max-width: 950px) {
           .career{
            grid-template-columns: auto auto ;
           }
          }
          @media(max-width: 750px) {
            .job{
            padding-top: 100px;
            padding-bottom: 50px;
            padding-left:100px;
          }
          .job h1{
            font-size:65px;
          }
          .job p{
            font-size:23px;
          }
          }
          @media(max-width: 650px) {
           .career{
            margin: 0px 50px;
            grid-template-columns: auto ;
           }
          }
          @media(max-width: 500px) {
           .career{
            margin: 0px 0px;
            grid-template-columns: auto ;
           }
           .job{
            padding-top: 80px;
            padding-bottom: 40px;
            padding-left:45px;
          }
          .job h1{
            font-size:55px;
          }
          .job p{
            font-size:18px;
          }
          }
          @media(max-width: 350px) {
           .career{
            margin: 0px 0px;
            grid-template-columns: auto ;
           }
           .job{
            padding-top: 80px;
            padding-bottom: 40px;
            padding-left:35px;
          }
          .job h1{
            font-size:50px;
          }
          .job p{
            font-size:18px;
          }
          }

    </style>
  </head>
  <body>
  <div class="job" >
    <h1 >Job Portal</h1>
    <p>Best job available matching your skills</p>
  </div>
<div class="career" style="">
  <?php 
  $host = "localhost";
  $dbname = "job_portal";
  $username = "root";
  $password = "";
  
  $mysqli = new mysqli(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);
      $sql="Select cname,position,ctc,jdesc,skills from jobs";
      $result = $mysqli->query($sql);
      
      if($result->num_rows>0){
        $i=0;
        while($user = $result->fetch_assoc()){
          
          echo'<div class="card" style="">
  <div class="card-body">
    <h3 class="card-title"  style="text-align:center;">'.$user["position"].'</h3>
    <h6 class="card-subtitle mb-2 text-muted" style="text-align:center;">'.$user["cname"].'</h6>
    <p class="card-text">'.$user["jdesc"].'</p>
    <p class="card-text"><span style="font-weight:bold">Skills Required :</span> '.$user["skills"].'</p>
    <p class="card-link"><span style="font-weight:bold">CTC :</span>'.$user["ctc"].'</p>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Apply</button>
  </div>
</div>';
        }
      }
      else{
        echo"";
      }
    
    
    ?>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Apply for job</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post" id="signup" >
    <div class="mb-3">
    <label for="name" class="form-label">Name</label>
    <input class="form-control" type="text" id="name" name="name" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Qualification</label>
    <input class="form-control"  aria-describedby="emailHelp" type="text" id="email" name="qual" required>
    
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Passout Year</label>
    <input  class="form-control" type="password" id="password" name="year" required>
  </div>
  <div class="mb-3">
    <label for="number" class="form-label">Apply for</label>
    <input  class="form-control" type="text" id="number" name="apply">
  </div>
  <div class="mb-3">
  <button type="submit" class="btn btn-primary" name="Login">Apply</button>
  </div>  
</form>
      </div>
      
    </div>
  </div>
</div>
<br>
  
    
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

$sql = "INSERT INTO applicants (name, qual, year, apply)
        VALUES (?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}
if(isset($_POST["Login"])){
  $stmt->bind_param("ssss",
                  $_POST["name"],
                  $_POST["qual"],
                  $_POST["year"],
                  $_POST["apply"]);
                  
$stmt->execute();
}

    



?>