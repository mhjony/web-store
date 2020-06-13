<?php
session_start();

if (!isset($_GET['page']) || $_GET['page'] == "home")
{
    $page = "views/home.html";
}
if ($_GET['page'] == "contact")
{
    $page = "views/contact.html";
}

if ($_GET['page'] == "all")
{
    $page = "items/items.php";
}

if ($_GET['page'] == "nokia")
{
    $page = "items/items.php";
}

if ($_GET['page'] == "samsung")
{
    $page = "items/items.php";
}

if ($_GET['page'] == "apple")
{
    $page = "items/items.php";
}

if ($_GET['page'] == "login")
{
    $page = "user/createuser.php";
}

if ($_GET['page'] == "login") {
	$page = "application/authorization/login.php";
}

if ($_GET['page'] == "modif") {
	$page = "application/authorization/modif.php";
}

if ($_GET['page'] == "logout") {
	$page = "application/authorization/logout.php";
}

$conn = mysqli_connect("localhost", "root", "123456", "rush00");

if (mysqli_connect_errno()){
	try{
		include("install.php");
	}
	catch(mysql_sql_exception $exp)
	{
		echo "Connection failed\n";
		exit();
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Dropdown menu</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div id="header">
			<ul>
                <li><a href="index.php?page=home">Home</a></li>
                <li><a href="index.php?page=all">Category</a>
					<ul>
						<li><a href="index.php?page=apple">Apple</a></li>
						<li><a href="index.php?page=samsung">Samsung</a></li>
						<li><a href="index.php?page=nokia">Nokia</a></li>
						<li><a href="index.php?page=all">All</a></li>
					</ul>
				</li>
                <li><a href="index.php?page=contact">Contact us</a></li>
                <li><a href="#">Cart</a></li>
				<?php
                    if ($_SESSION['loggued_on_user'] == "") {
                        echo "<li><a href=\"index.php?page=login\">Login</a></li>";
                    } else {
                        echo "<li><a href=\"index.php?page=modif\">".$_SESSION['loggued_on_user']."</a></li>";
                        echo "<li><a href=\"index.php?page=logout\">LogOut</a></li>";
                    }
                ?>
				<li><a href="#">Login</a>
					<ul>
						<li><a href="index.php?page=login">User Login</a></li>
						<li><a href="#">Admin Login</a>
					</ul>
				</li>
			</ul>
        </div>
        <div class="container">
            <?php include $page; ?>
        </div>
	</body>
</html>