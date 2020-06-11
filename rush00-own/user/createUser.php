<?php

if (isset($_POST['submit']))
{
	if ($_POST['submit'] === "Sign up")
	{
		$conn = mysqli_connect("localhost", "root", "123456", "rush00");
		if (!$conn)
		{
			echo "Failed to connect with database! This is from createUser.php";
		}
		$name = $_POST['name'];
		$email = $_POST['email'];
		$login = $_POST['login'];
		$passwd = hash('sha256',$_POST['passwd']);

		$res = mysqli_query($conn, "SELECT * FROM `users`");
		$count = 0;
		while ($row = mysqli_fetch_array($res))
		{
			if ($row['login'] == $login)
			{
				$count = 1;
				echo "This username already exists";
			}
		}
		if ($count == 0)
		{
			mysqli_query($conn, "INSERT INTO `users` (`name`, `login`, `email`, `password`) VALUES ('$name','$email', '$login', '$passwd')");
			echo "User creation successful";
			header("location: index.php");
		}
	}
}

?>

<html>
<body>
	<form action="" method="POST">
		Name: <input type="text" name="name" value="" Placeholder="Full name" /><br>
		Email: <input type="text" name="email" value="" Placeholder="john@example.com" /><br>
		Username: <input type="text" name="login" value="" Placeholder="Login" /><br>
		Password: <input type="password" name="passwd" value="" placholder="Password" /><br>
		<input type="submit" name="submit" value="Sign up" />
	</form>
</body>
</html>