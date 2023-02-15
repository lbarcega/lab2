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
  <a href="profile.php"><img class="bg-image" src="images/logo-bg.png" alt="the boy"></a>
    <div class="container">
    <?php
      $note_id = $_GET['id'];

      //1. Setup Database connection
      $servername = "localhost";
      $db_username = "root";
      $db_password = "";
      $database = "ajah_wbdb";

      $conn = mysqli_connect($servername, $db_username, $db_password, $database);

      //2. SELECT SQL
      $sql = "SELECT * FROM `notes` WHERE note_id='" . $note_id . "'";

      //Either 1 or zero result

      //3. Execute SQL
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_array($result); // mysqli_fetch_array is good for result that is 1 or 0 record

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