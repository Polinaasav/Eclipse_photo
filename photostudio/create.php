

<?php
$responses = [];
if (isset($_POST['arrival'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['phone'], $_POST['adults'], $_POST['photo'], $_POST['style'], $_POST['room_pref'])) {
      
	  
	$arrival = htmlspecialchars($_POST['arrival'], ENT_QUOTES);
	$first_name = htmlspecialchars($_POST['first_name'], ENT_QUOTES);
	$last_name = htmlspecialchars($_POST['last_name'], ENT_QUOTES);
	$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
	$phone = htmlspecialchars($_POST['phone'], ENT_QUOTES);
	$adults = htmlspecialchars($_POST['adults'], ENT_QUOTES);
	$photo = htmlspecialchars($_POST['photo'], ENT_QUOTES);
	$style = htmlspecialchars($_POST['style'], ENT_QUOTES);
	$room_pref = htmlspecialchars($_POST['room_pref'], ENT_QUOTES);
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	echo 'Почта введена неверно!';
	$responses[] = '1';
	}

	if (!$responses) {
    $conn = new mysqli("localhost", "host1861199", "a3lMG538t4", "host1861199");
    if($conn->connect_error){
        die("Ошибка: " . $conn->connect_error);
    }
    $arrival = $conn->real_escape_string($_POST["arrival"]);
    $first_name = $conn->real_escape_string($_POST["first_name"]);
	$last_name = $conn->real_escape_string($_POST["last_name"]);
    $email = $conn->real_escape_string($_POST["email"]);
	$phone = $conn->real_escape_string($_POST["phone"]);
    $adults = $conn->real_escape_string($_POST["adults"]);
	$photo = $conn->real_escape_string($_POST["photo"]);
    $style = $conn->real_escape_string($_POST["style"]);
	$room_pref = $conn->real_escape_string($_POST["room_pref"]);
	
	
    $sql = "INSERT INTO Bron (Arrival, First_name, Last_name, Email, Phone, Adults, Photo, Style, Room_pref) VALUES ('$arrival', '$first_name', '$last_name', '$email', '$phone', $adults, $photo, $style, '$room_pref')";
    if($conn->query($sql)){
        echo "Данные успешно добавлены";
    } else{
        echo "Ошибка: " . $conn->error;
    }
    $conn->close();
	}
}
?>