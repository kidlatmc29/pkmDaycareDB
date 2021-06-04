<!-- dbStats.php
    Isabel Ovalles
    CPSC 3300
     A PHP script to access the pokemon daycare database through MySQL using
     aggregate functions in queries
-->

<html>
<head> <title> Pokemon Daycare Stats </title>
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


// Total number of pokemon in the day care
$query = "select count(distinct DID) as Total_Pokemon from pokemon";

$result = mysql_query($query);
if (!$result) {
    print "Error - the query could not be executed";
    $error = mysql_error();
    print "<p>" . $error . "</p>";
    exit;
}

$num_rows = mysql_num_rows($result);
print "</br> Number of rows = $num_rows <br />";

// Get the number of fields in the rows
$num_fields = mysql_num_fields($result);
print "Number of fields = $num_fields <br />";

// Get the first row
$row = mysql_fetch_array($result);

// Produce the column labels
$keys = array_keys($row);
for ($index = 0; $index < $num_fields; $index++)
    print "<th>" . $keys[2 * $index + 1] . "</th>";

print "</tr>";

// Output the values of the fields in the rows
for ($row_num = 0; $row_num < $num_rows; $row_num++) {

    print "<tr align = 'center'>";
    $values = array_values($row);

    for ($index = 0; $index < $num_fields; $index++){
        $value = htmlspecialchars($values[2 * $index + 1]);
        print "<td>" . $value . "</td> ";
    }

    print "</tr>";
    $row = mysql_fetch_array($result);
}

print "</table>";


/*
// Total Number of Species (no repeats) in the day care
$query = "SELECT COUNT(distinct Species) as Total_Species
          FROM pokemon;"

// For each region, find the total number of shinies from it.
$query = "SELECT R.RName as Region, count(*) as Total_Shinies
          FROM region as R, pokemon as P
          WHERE R.RName = P.RName AND P.shiny = &quot;Yes&quot;
          GROUP BY R.RName;"

// Find the most common type for a pokemon what it's count it

*/
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
