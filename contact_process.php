<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

    $to = "spn8@spondonit.com";
    $from = $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $subject = $_REQUEST['subject'];
    $number = $_REQUEST['number'];
    $cmessage = $_REQUEST['message'];

    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "You have a message from your Bitmap Photography.";

    $logo = 'img/logo.png';
    $link = '#';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Express Mail</title></head><body>";
	$body .= "<table style='width: 100%;'>";
	$body .= "<thead style='text-align: center;'><tr><td style='border:none;' colspan='2'>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "</td></tr></thead><tbody><tr>";
	$body .= "<td style='border:none;'><strong>Name:</strong> {$name}</td>";
	$body .= "<td style='border:none;'><strong>Email:</strong> {$from}</td>";
	$body .= "</tr>";
	$body .= "<tr><td style='border:none;'><strong>Subject:</strong> {$csubject}</td></tr>";
	$body .= "<tr><td></td></tr>";
	$body .= "<tr><td colspan='2' style='border:none;'>{$cmessage}</td></tr>";
	$body .= "</tbody></table>";
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contact_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name    = $_POST['name'];
$email   = $_POST['email'];
$number  = $_POST['number'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO messages (name, email, number, subject, message) 
        VALUES ('$name', '$email', '$number', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
if ($stmt->execute()) {
        $stmt->close();
        $conn->close();

        // ✅ THIS REFRESHES THE FORM PAGE
        header("Location: contact.html?success=1");
        exit();
    } else {
        echo "Database Error: " . $stmt->error;
        $stmt->close();
        $conn->close();
    }


$conn->close();
?> 


