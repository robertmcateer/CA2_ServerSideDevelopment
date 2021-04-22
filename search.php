<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Recursive&family=Righteous&display=swap" rel="stylesheet">
<div class="container">
<?php
/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}


/**
 * Print out something that only logged in users can see.
 */
include('includes/header.php');
require_once('database.php');
?>
<div class="searchform1">
<form method="post">
<label>Search</label>
<input type="text" name="search"  id="searchid"  placeholder="Search Toy" required size="12" onBlur="search_validation();">
<input type="submit" name="submit">	
</form>
</div>

<?php
// search 
if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $db->prepare("SELECT * FROM `records` WHERE Name = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
    
?>
<table class="searchtable">
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
	else
	{
		?>
		<div class="searcherror">
		<?php
		echo "Item not found, Try again";
	}
}
?>



<?php
include('includes/footer.php');
?>
</div>

<script src="validation.js"></script>