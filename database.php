<?php
  global $firstName;
  global $lastName;
  global $email;
  global $phone;
  global $password;
  
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
	$password = $_POST['password'];
	

	// Database connection
	$conn = new mysqli('localhost','root','','work');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into jobportal(firstName, lastName, email,phone, password,) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $firstName, $lastName, $email, $phone,$password, );
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>