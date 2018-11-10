<?php
require_once ('db.php');

// Hoort de bezoeker hier uberhaupt wel te zijn?
if(!isset($_POST['submit_registration'])){
    header('Location: register.php');
}

// ZIjn alle velden ingevuld?
if (empty($_POST['username']) OR empty($_POST['email']) OR empty($_POST['password1']) OR empty($_POST['password2'])) {
    echo 'Je bent vergeten iets in te vullen.<br>';
    echo 'Klik <a href ="register.php">hier<a/> om terug te keren.';
    exit();
}

// Zijn beide wachtwoorden gelijk?
if ($_POST['password1'] != $_POST['password2']) {
    echo 'De wachtwoorden komen niet met elkaar overèèn.<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.';
    exit();
}


// Heeft de gebruiker wel een ma-adres?
$position = strpos($_POST['email'], '@ma-web.nl');
if (!$position) {
    echo 'Sorry, je kunt je alleen registreren met een e-mailadres van het Mediacollege.<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.';
    exit();
}

$username = $_POST['username'];
// Bestaat deze username al?
$query = "SELECT userid FROM users WHERE username = ?";
$stmt = $mysqli->prepare($query) or die ('Error preparing 1');
$stmt->bind_param('s',$username) or die ('Error binding params 1');

$result = $stmt->execute() or die ('Error queriying username');
$row = $stmt->fetch();
if ($row) {
    echo 'Sorry, maar deze gebruikers naam is al bezet .<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.';
    exit();
}

// TOT HIER KLOPT HET

// Bestaat deze mailadres al?
$query = "SELECT userid FROM users WHERE mailadres = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('s',$mailades);
$mailades = $_POST['email'];
$result = $stmt->execute() or die ('Error queriying mailadres');
$row = $stmt->fetch();
if ($row) {
    echo 'Sorry, maar het lijkt er op dat je al een account hebt.<br>';
    echo 'Klik <a href="register.php">hier</a> om terug te keren.';
    exit();
}

// Gebruiker toevoegen aan de database
$query = "INSERT INTO users VALUES (0,?,?,?,?,?,?,0)";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ssssss',$firstname, $lastname,$mailades,$username,$hash,$password);
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$mailadres = $_POST['email'];
$username = $_POST['username'];
$random_number = rand(0,1000000);
$hash = hash('sha512', $random_number);
$password = hash('sha512', $_POST['password1']);
$result = $stmt->execute() or die ('Error inserting user');


// Gebruiker mailen
$to = $_POST['email'];
$subject = 'Verifieer ja account bij THE WALL';
$message = 'klik op de volgende link om je account te activeren: ';
$message .= 'http://24830.hosts.ma-cloud.nl/ma/bewijzenmap/periode1.3/proj/the_wall/verify.php?mailadres=' . $mailades . '&hash=' . $hash;
$headers = 'From: 24830@ma-web.nl';
mail($to, $subject, $message, $headers) or die ('Error mailing');

echo 'Woehoe, het is gelukt!';