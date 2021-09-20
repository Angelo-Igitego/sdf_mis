<?php



// 1. Create a new connection to the server and to the database
$connection = mysqli_connect('localhost', 'root', '','sdf_database');

// 2. Test if the connection works
if($connection === false){
	die("An error has occured: " . mysqli_connect_error());
}

$applicant_id = $_REQUEST['applicant_id'];


$query_result = mysqli_query($connection, "SELECT * FROM applicants WHERE id=$applicant_id" ); ?>

<table>
	<thead>
		<tr>
			<th> First Name </th>
			<th> Last Name  </th>
			<th> Date of birth</th>
			<th> Gender </th>
			<th> Province </th>
			<th> District </th>
			<th> Sector </th>
			<th> Learning option </th>
			<th colspan="2"> Action </th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($query_result)) { ?>
		<tr>
			<td><?php echo $row['first_name']; ?></td>
			<td><?php echo $row['last_name']; ?></td>
			<td><?php echo $row['date_of_birth']; ?></td>
			<td><?php echo $row['gender']; ?></td>
			<td><?php echo $row['province']; ?></td>
			<td><?php echo $row['district']; ?></td>
			<td><?php echo $row['sector']; ?></td>
			<td><?php echo $row['learning_option_id']; ?></td>

			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

<form>