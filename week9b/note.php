<!DOCTYPE HTML>  
<html>
<head>
<style>

</style>
<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/app.css">
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
  <title>Notes</title>
</head>
  <body class="profile">
  <img class="bg-image" src="images/logo-bg.png" alt="the boy">
    <div class="container">
    <?php
      $note_id = $_GET['id'];
      echo $note_id;
      //1. Setup Database connection
      $servername = "192.168.150.213";
      $db_username = "webprogmi212";
      $db_password = "b3ntRhino98";
      $database = "webprogmi212";

      $conn = mysqli_connect($servername, $db_username, $db_password, $database);
  
      //2. SELECT SQL
      $sql = "SELECT * FROM `lbarcega_notes` WHERE note_id='" . $note_id . "'";

      //Either 1 or zero result

      //3. Execute SQL
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result); // mysqli_fetch_array is good for result that is 1 or 0 record
      mysqli_close($conn);
      echo '
			<div class="small-container"">
				<div class="gallery">
				<h1>'.$row['name'].'</h1>
				<p class="sub">'.$row['datetime'].'</p>
				<hr>
				<p>
				'.$row['note'].'
				</p>
        <center>
        <a href="guests.php"><button type="button" class="yellow" >Go Back.</button></a>
        </center>
				</div>
			</div>
      ';
    ?>
  </body>
</html>