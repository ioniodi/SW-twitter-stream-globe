<?php
define ("DB_USER", "root");
define ("DB_PASSWORD", "");
define ("DB_DATABASE", "db_tweets");
define ("DB_HOST", "localhost");

$lat = $_POST['lat'];
$lon = $_POST['lon'];

if (!($lat != null and $lon != null)){
    die("false");
}

// Connect to DB
$dbconn = mysqli_connect(DB_HOST, DB_USER,DB_PASSWORD, DB_DATABASE) or die('MySQL connection failed!' . mysqli_connect_error());
mysqli_set_charset($dbconn, "utf8");

$querry = "INSERT INTO tweets (lon, lat) VALUES (" . $lon . "," . $lat . ")";
// Run query
if($dbconn->query($querry) === true){
    $dbconn->close();
    echo "true";
}else{
    echo "Database Error: " . $dbconn->error;
    $dbconn->close();
}
?>