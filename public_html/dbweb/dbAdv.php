<!-- db.php
    Isabel Ovalles
    CPSC 3300
     A PHP script to access the pokemon daycare database through MySQL
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
<body style="background-color:#E8A87C;">
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
// print "Striped query is $query <br />";

// handle HTML special characters
$query_html = htmlspecialchars($query);
print "<p> <b> The query is: </b> " . $query_html . "</p>";

// Execute the query
$result = mysql_query($query);
if (!$result) {
    print "Error - the query could not be executed";
    $error = mysql_error();
    print "<p>" . $error . "</p>";
    exit;
}

// Get the number of rows in the result
$num_rows = mysql_num_rows($result);
print "Number of rows = $num_rows <br />";

// Get the number of fields in the rows
$num_fields = mysql_num_fields($result);
print "Number of fields = $num_fields <br />";

// Get the first row
$row = mysql_fetch_array($result);

// Display the results in a table
print "<table border='border'><caption> <h2> Query Results </h2> </caption>";
print "<tr align = 'center'>";

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

mysql_close($conn);
?>
<p> Back to query page:
<a style ="color:#222224;"
    href="http://css1.seattleu.edu/~ovallesisabe/dbweb/db.html">
    Pokemon Daycare Database</a>
</p>
</body>
</html>
