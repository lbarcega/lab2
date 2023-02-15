<!DOCTYPE HTML>  
<html>
<head>
<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/app.css">
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
  <title>Who dis?</title>
</head>
<body class="profile">  
<a href="profile.php"><img class="bg-image" src="images/logo-bg.png" alt="the boy"></a>
<div class="small-container">
<?php
// define variables and set to empty values
$nameErr = $emailErr = $organErr = $websiteErr = "";
$name = $email = $organ = $note = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL";
    }
  }

  if (empty($_POST["note"])) {
    $note = "";
  } else {
    $note = test_input($_POST["note"]);
  }

  if (empty($_POST["organ"])) {
    $organErr = "A sacrifice is required";
  } else {
    $organ = test_input($_POST["organ"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h1 id="header">Say something.</h1>
<hr>
<div style="margin-left:40px;">
<p><span class="error">* required field</span>
<form method="post" action="queries/insert.php">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Say something, anything <i>please</i>:
  <br>
  <textarea name="note" rows="5" cols="40" value="<?php echo $note;?>"><?php echo $note;?></textarea>
  <br><br>
  Which organ would you hypothetically be fine without:
  <br>
  <input type="radio" name="organ" <?php if (isset($organ) && $organ=="skin") echo "checked";?> value="skin">Skin
  <input type="radio" name="organ" <?php if (isset($organ) && $organ=="lung") echo "checked";?> value="lung">A lung
  <input type="radio" name="organ" <?php if (isset($organ) && $organ=="spleen") echo "checked";?> value="spleen">Spleen
  <input type="radio" name="organ" <?php if (isset($organ) && $organ=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $organErr;?></span>
  <br><br>
  <button class="yellow" style="width:100px;" type="submit" name="submit" value="Submit">Submit</button>
</form>
</div>
</div>
</body>
</html>