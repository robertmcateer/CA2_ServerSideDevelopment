<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Recursive&family=Righteous&display=swap" rel="stylesheet">
<?php
/**
 * Start the session.
 */
session_start();

/**
 * Check if the user is logged in.
 */
if(!isset($_SESSION['admin_id']) || !isset($_SESSION['logged_in'])){
    //User not logged in. Redirect them back to the login.php page.
    header('Location: login.php');
    exit;
}


/**
 * Print out something that only logged in users can see.
 */
require_once('database.php');
$admin = 'adminadmin';
// Get records users
$queryRecords = "SELECT * FROM users";
$statement3 = $db->prepare($queryRecords);
$statement3->execute();
$records = $statement3->fetchAll();
$statement3->closeCursor();

?>

<div class="container">
<?php
include('includes/header.php');
?>


<section>
<!-- display a table of users -->
<h3>Users</h3>
<table>
<tr>
<th>Name</th>
<th>Username</th>
<th>ID</th>
<th>Date of Birth</th>
<th></th>

</tr>
<?php foreach ($records as $record) : ?>
<tr>
<td><?php echo $record['name']; ?></td>
<td><?php echo $record['username']; ?></td>
<td><?php echo $record['id']; ?></td>
<td><?php echo $record['dob']; ?></td>
<td>
<?php
if($record['username']!=$admin){
?>
<form action="delete_user.php" method="post"
id="delete_user_form">
<input type="hidden" name="id"
value="<?php echo $record['id']; ?>">
<input type="submit" value="Delete">
</form>
<?php
}
?></td>
</tr>
<?php endforeach; ?>
</table>
</section>
<?php
include('includes/footer.php');
?>
