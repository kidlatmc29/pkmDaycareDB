<!-- dbStats.php
    Isabel Ovalles
    CPSC 3300
     A PHP script to access the pokemon daycare database through MySQL in order to
     insert and delete tuples
-->
<html>
<head> <title> Registering </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body{
  font-family: 'Verdana', sans-serif;
}
.content {
  max-width: 500px;
  margin: auto;
  background: white;
  padding: 10px;
}
</style>
</head>
<body style="background-color:#E8A87C;">

<div class = "content">
  <p> Back to query page:
    <a style ="color:#222224;"
    href="http://css1.seattleu.edu/~ovallesisabe/dbweb/db.html">
    Pokemon Daycare Database</a>
  </p>
<?php

// Connect to MySQL
$servername = "cssql.seattleu.edu";
$username = "user18";
$password = "1234";

print $servername;

$conn = mysql_connect($servername, $username, $password);

if (!$conn) {
     print "Error - Could not connect to MySQL";
     exit;
}

// Selects my pokemon daycare database named bw_db18
$db = mysql_select_db("bw_db18", $conn);
if (!$db) {
    print "Error - Could not select the Pokemon Daycare database";
    exit;
}

$DID = $_POST['did'];
$dexNum = $_POST['dexNum'];
$nickname = $_POST['nickname'];
$species = $_POST['species']
$shiny = $_POST['shiny'];
$gender = $POST['gender'];
$region = $_POST['region'];

$query = "insert into pokemon values ($DID, $dexNum, '$nickname', '$species', '$shiny', '$gender', '$region')";

trim($query);

$query_html = htmlspecialchars($query);
print "<p> <b> The query is: </b> " . $query_html . "</p>";

$result = mysql_query($query);
if (!$result) {
    print "Error - the query could not be executed";
    $error = mysql_error();
    print "<p>" . $error . "</p>";
    exit;
}

print "<p> Insertion Complete! </p>";

mysql_close($conn);
?>

<p> Back to query page:
<a style ="color:#222224;"
    href="http://css1.seattleu.edu/~ovallesisabe/dbweb/db.html">
    Pokemon Daycare Database</a>
</p>
</div>
</body>
</html>
