<?php include 'header.php' ?>

<div class="content">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Candidate Name</th>
      <th scope="col">Applying For</th>
      <th scope="col">Year Passout</th>
      <th scope="col">Qualification</th>
    </tr>
  </thead>
  <?php 
  $host = "localhost";
  $dbname = "job_portal";
  $username = "root";
  $password = "";
  
  $mysqli = new mysqli(hostname: $host,
                       username: $username,
                       password: $password,
                       database: $dbname);
      $sql="Select name,year,apply,qual from applicants";
      $result = $mysqli->query($sql);
      
      if($result->num_rows>0){
        $i=0;
        while($user = $result->fetch_assoc()){
          
          echo'<tbody>
          <tr>
            <th scope="row">'.++$i.'</th>
            <td>'.$user["name"].'</td>
            <td>'.$user["apply"].'r</td>
            <td>'.$user["year"].'</td>
            <td>'.$user["qual"].'</td>
            
          </tr>
          
        </tbody>';
        }
      }
      else{
        echo"";
      }
    
    
    ?>
</table>



</div>