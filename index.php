<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"pl-PL\">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>UE Project</title>

</head>
<body>

<table width="700" align="center" border="1" bordercolor="#49524b" cellpadding="7" cellspacing="0">
<tr>

<?php
ini_set("display_errors", 0);
require_once 'dbconnect.php';
$connect = mysqli_connect($host, $user, $password);
mysqli_select_db($connect, $database);

$querytxt = file_get_contents("query.txt"); //You can manage db from this file or from phpmyadmin

$result = mysqli_query($connect, $querytxt);
$count = mysqli_num_rows($result);

if ($count>=1)
{
echo<<<END
<td width="50" align="center" bgcolor="2db551">Id</td>
<td width="150" align="center" bgcolor="2db551">First name</td>
<td width="150" align="center" bgcolor="2db551">Last name</td>
<td width="150" align="center" bgcolor="2db551">Email</td>
<td width="150" align="center" bgcolor="2db551">Gender</td>
</tr><tr>

END;
}
	for ($i = 1; $i <= $count; $i++)
	{

		$row = mysqli_fetch_assoc($result);
		$id = $row['id'];
		$first_name = $row['first_name'];
		$last_name = $row['last_name'];
		$email = $row['email'];
		$gender = $row['gender'];


echo<<<END
<td width="50" align="center">$id</td>
<td width="100" align="center">$first_name</td>
<td width="100" align="center">$last_name</td>
<td width="100" align="center">$email</td>
<td width="100" align="center">$gender</td>
</tr><tr>
END;

	}
?>

</tr></table>
</body>
</html>
