<?php
  $name = $_POST['name'];
  $email = $_POST['email'];
  $website = $_POST['website'];
  $note = $_POST['note'];
  $organ = $_POST['organ'];
  
  //1. Setup Database connection
  $servername = "192.168.150.213";
  $db_username = "webprogmi212";
  $db_password = "b3ntRhino98";
  $database = "webprogmi212";

  $conn = mysqli_connect($servername, $db_username, $db_password, $database);

  //2. Insert SQL
  $sql = "INSERT INTO `lbarcega_notes` (
   `name`,
   `email`,
   `website`,
   `note`,
   `organ`
	) VALUES (
	'".$name."',
  '".$email."',
  '".$website."',
  '".$note."',
	'".$organ."'
    )";

  //3. Execute SQL
   if (mysqli_query($conn, $sql)) {
    header("location:javascript://history.go(-1)");
  } else {
	  $_SESSION['postError'] = false;
    echo 'ah fuck';
  }


  //.4 Closing Database Connection
  mysqli_close($conn);
  

?>
