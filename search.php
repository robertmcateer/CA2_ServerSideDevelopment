<div class="container">



<?php
include('includes/header.php');
require_once('database.php');
?>
<form method="post">
<label>Search</label>
<input type="text" name="search">
<input type="submit" name="submit">	
</form>

<?php

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $db->prepare("SELECT * FROM `records` WHERE Name = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
    
?>
<table>
<tr>
<th>Image</th>
<th>Name</th>
<th>Age</th>
<th>Manufacturer No</th>
<th>Price</th>
</tr>
<tr>
<td><img src="image_uploads/<?php echo $row->image; ?>" width="100px" height="100px" /></td>
<td><?php echo $row->name; ?></td>
<td><?php echo $row->age; ?></td>
<td><?php echo $row->manufacturerNumber; ?></td>
<td class="right"><?php echo $row->price; ?></td>
</table>
<?php
    }
}
?>
<p><a href="index.php">Back</a></p>
<?php
include('includes/footer.php');
?></div>



<?php

/// search




