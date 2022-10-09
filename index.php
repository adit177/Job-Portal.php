<?php include 'header.php'?>
<!-- Page content -->
<div class="content" >
<p>
  <button  class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Poat Job
  </button>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
  <form method="post"> 
  <div class="mb-3">
    <label for="cname" class="form-label" >Company Name</label>
    <input type="text" class="form-control" id="cname" name="cname" required>
  </div>
  <div class="mb-3">
    <label for="position" class="form-label">Position</label>
    <input type="text" class="form-control" id="position" name="position" required>
  </div>
  <div class="mb-3">
    <label for="jdesc" class="form-label">Job Description</label>
    <textarea cols="30" rows="10" class="form-control" id="jdesc" name="jdesc"></textarea>
  </div>
  <div class="mb-3">
    <label for="skills" class="form-label">Skills Required</label>
    <input type="text" class="form-control" id="skills" name="skills" required>
  </div>
  <div class="mb-3">
    <label for="ctc" class="form-label">CTC</label>
    <input type="text" class="form-control" id="ctc" name="ctc" required>
  </div>
  <button type="submit" class="btn btn-primary" name="Login">Submit</button>
</form>
  </div>
  
</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Company Name</th>
      <th scope="col">Position</th>
      <th scope="col">CTC</th>
    </tr>
  </thead>
  <tbody>
  <?php 
  $host = "localhost";
  $dbname = "job_portal";
  $username = "root";
  $password = "";
  
  $mysqli = new mysqli(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);
      $sql="Select cname,position,ctc from jobs";
      $result = $mysqli->query($sql);
      
      if($result->num_rows>0){
        $i=0;
        while($user = $result->fetch_assoc()){
          
          echo"<tr>
              <th>".++$i."</th>
              <td>".$user['cname']."</td>
              <td>".$user['position']."</td>
              <td>".$user['ctc']."</td>
              </tr>";
        }
      }
      else{
        echo"";
      }
    
    
    ?>
    
  </tbody>
</table>
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



$stmt = $mysqli->stmt_init();

if(isset($_POST["Login"])){
  $sql = "INSERT INTO jobs (cname, position, jdesc, skills, ctc)
        VALUES (?, ?, ?, ?, ?)";
  if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

  $stmt->bind_param("sssss",
                  $_POST["cname"],
                  $_POST["position"],
                  $_POST["jdesc"],
                  $_POST["skills"],
                  $_POST["ctc"]);
                  
if ($stmt->execute()) {
    header("Location: index.php");
  exit;
} else {
  die($mysqli->error . " " . $mysqli->errno);
}
}



?>