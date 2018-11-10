
<?php

require ('db.php');

// Checken of de mail klopt met de hash
$query = "SELECT userid FROM users WHERE mailadres = ? AND hash = ?";
$stmt = $mysqli ->prepare($query) or die ('Error preparing for SELECT.');
$stmt ->bind_param('ss',$mailadres,$hash);
$mailadres = $_GET['mailadres'];
$hash = $_GET['hash'];
$stmt->execute();
$stmt->bind_result($userid);
$row = $stmt->fetch();
if (!$userid) {
    echo 'Sorry, maar deze combinatie van mailadres en hash ken ik niet';
    exit();
}
$stmt->close();

// Account activeren
$query = "UPDATE users SET active = 1 WHERE userid = ?";
$stmt = $mysqli->prepare($query) or die ('Error preparing for UPDATE.');
$stmt->bind_param('i',$userid);
$stmt->execute() or die ('Error updating.');
echo 'je account is geactiveerd!';
