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
      $notes = [];

      //1. Setup Database connection
      $servername = "localhost";
      $db_username = "root";
      $db_password = "";
      $database = "ajah_wbdb";

      $conn = mysqli_connect($servername, $db_username, $db_password, $database);

      //2. SELECT SQL
      $sql = "SELECT * FROM `notes`";

      //3. Execute SQL
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        array_push($notes, $row);
      }

      //.4 Closing Database Connection
      mysqli_close($conn);
    ?>
      <div class="gallery">
        <h1 id="header">Notes</h1>
          <hr>
          <div class="note-container">
          <?php
            for ($index = 0; $index < count($notes); $index++) {

              echo '
              <a href="note.php?id='. $notes[$index]["note_id"] .'" class="stretched-link">
                <div class="card">
                  <div class="container-card">
                    <h2><b>' . $notes[$index]["name"] . '</b></h2>
                    <p class="sub">'.$notes[$index]["datetime"].'</p>
                    <hr>
                    <p class="card-text"  title="' . $notes[$index]["note"] . '">
                      ' . substr($notes[$index]["note"], 0, 100) . '...
                    </p>
                  </div>
                  
                </div>
              </a>	 				

              ';
        }
          ?>
          </div>
        </div>
      </div>
  </body>
</html>