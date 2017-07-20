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
<input type="submit" name="submit"></input>
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

$conn = mysql_connect($hn, $un, $pw, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])){
	$fname = $_POST["fname"];
        $fname = mysql_real_escape_string($fname); 
	$lname = $_POST["lname"];        
        $lname = mysql_real_escape_string($lname); 
	$usertype = $_POST["usertype"];  
        $usertype = mysql_real_escape_string($usertype); 
	$email = $_POST["email"];
        $email = mysql_real_escape_string($email); 
	$pass = $_POST["pass"];
        $pass = mysql_real_escape_string($pass); 

$sql = "INSERT INTO user_profiles (fname, lname, usercode, email, password) VALUES('$fname', '$lname', '$usertype', '$email', '$pass')";
$result = mysqli_query($conn, $sql);

if(!$result){
	echo "Insert record successfully";
} else {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}	

mysqli_close($conn);
?>


