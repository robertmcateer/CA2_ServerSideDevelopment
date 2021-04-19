<?php
require_once('database.php');

// Get IDs
$record_id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

// Delete the product from the database
if ($record_id != false) {
    $query = "DELETE FROM users
              WHERE id = :record_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':record_id', $record_id);
    $statement->execute();
    $statement->closeCursor();
}

// display the Product List page
include('display_users.php');
?>