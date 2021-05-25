<!-- db.php
    Isabel Ovalles
    CPSC 3300
    Testing rough draft script to access the pokemon daycare database through MySQL
-->
<html>
<head>
<style>
body{
  font-family: 'Verdana', sans-serif;
}
<title> Access the Pokemon Daycare Database </title>
</style>
</head>
<body>
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

$query = $_POST['query'];

// Clean up the given query (delete leading and trailing whitespace)
trim($query);

// remove the extra slashes
$query = stripslashes($query);
print "Striped query is $query <br />";

// handle HTML special characters
$query_html = htmlspecialchars($query);
print "<p> <b> The query is: </b> " . $query_html . "</p>";

// Execute the query
$result = mysql_query($query);

// * means that it selects all fields, you can also write: `id`, `title`, `text`
		// pokemon table is the name of our table

		// '%$query%' is what we're looking for, % means anything, for example if $query is Hello
$raw_results = mysql_query("SELECT * FROM pokemon
			WHERE (`` LIKE '%".$query."%') OR (`text` LIKE '%".$query."%')") or die(mysql_error());

mysql_close($conn);
?>
<p> Back to query page:
<a style ="color:#222224;"
    href="http://css1.seattleu.edu/~ovallesisabe/dbweb/db.html">
    Pokemon Daycare Database</a>
</p>
</body>
</html>
