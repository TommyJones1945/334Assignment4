<?php
echo <<<_END
<html>
<body>
<form action="sectiona.php" method="post">
First name: <input type="text" name="fname"><br>
Last name: <input type="text" name="lname"><br>
User Type: <select name = "usertype" >
<option value="1"> user </option>
<option value="2"> admin </option>
</select><br>
Email: <input type="text" name="email"><br>
Password: <input type="text" name="pass"><br>
<input type="submit"></input>
</form>
</body>
</html>
_END
?>

<?php
$hn = 'localhost';
$db = 'faloduno_pbl';
$un = 'faloduno_pbl';
$pw = 'mypassword';

$conn = new mysql($hn, $un, $pw, $db);
if($conn->connect_error){
   die($conn->connect_error);
}

if (isset($_POST['submit'])){
	$fname = $_POST['fname'];
        $fname = $conn->real_escape_string($fname); 
	$lname = $_POST['lname'];        
        $lname = $conn->real_escape_string($lname); 
	$usertype = $_POST['usertype'];  
        $usertype = $conn->real_escape_string($usertype); 
	$email = $_POST['email'];
        $email = $conn->real_escape_string($email); 
	$pass = $_POST['pass'];
        $pass = $conn->real_escape_string($pass); 

$query = "INSERT INTO user_profiles(fname, lname, usercode, email, password) VALUES('$fname', '$lname', '$usertype', '$email', '$pass')";
$result = $conn->query($query);

if($result){
	echo("<br>Insert record successfully");
} else {
	echo("<br>Failed! Error!");
}
}	

$result->close();
$conn->close();
?>

