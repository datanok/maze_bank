<?php
$servername = "localhost";
$dbuser = "root";
$dbpass = "";
$dBname = "bank";

$con = new mysqli($servername, $dbuser, $dbpass, $dBname);

if ($con->connect_error) die("Something Went Wong :/");

function issueQuery($query)
{
    global $con;
    $result = $con->query($query);
    if (!$result) die("Something Went Wong :/");
    return $result;
}


?>
