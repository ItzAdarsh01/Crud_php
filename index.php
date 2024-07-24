<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM emp ORDER BY id");
?>
<html>
<head>	
	<title>Crud</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
	<h2 style="margin: 25px;text-align: center;">CRUD OPREATIONS(ADD,UPDATE,DELETE)</h2>
	<p>
		<a href="add.php">Click Here To Add New Data</a>
	</p>
	<table width='80%' border=0>
		<tr bgcolor='#DDDDDD'>
			<td><strong>Name</strong></td>
			<td><strong>Age</strong></td>
			<td><strong>Email</strong></td>
			<td><strong>Action</strong></td>
		</tr>
		<?php
		// Fetch the next row of a result set as an associative array
		while ($res = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['age']."</td>";
			echo "<td>".$res['email']."</td>";	
			echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | 
			<a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
		}
		?>
	</table>
</body>
</html>