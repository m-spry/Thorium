<?php

function Connect()
{
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "1123";
 $dbname = "thorium";

 // Create connection
 $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);

 return $conn;
}

$conn    = Connect();
$icon    = $_POST['icon'];
$notice = $_POST['notice'];
$query   = "UPDATE noticebar SET icon='$icon', notice='$notice' WHERE ID='7'";

//"INSERT INTO noticebar (icon, notice) VALUES ('$icon','$notice')";

// "UPDATE noticebar SET icon=$icon, notice=$notice WHERE ID='7'"
$success = $conn->query($query);

if (!$success) {
    die("Couldn't enter data: ".$conn->error);

}

$conn->close();

echo 'Banner added, click <a href="http://localhost">here</a> to go to Digital Signage '

?>
