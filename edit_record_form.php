<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Recursive&family=Righteous&display=swap" rel="stylesheet">
<?php
require('database.php');

$record_id = filter_input(INPUT_POST, 'record_id', FILTER_VALIDATE_INT);
$query = 'SELECT *
          FROM records
          WHERE recordID = :record_id';
$statement = $db->prepare($query);
$statement->bindValue(':record_id', $record_id);
$statement->execute();
$records = $statement->fetch(PDO::FETCH_ASSOC);
$statement->closeCursor();
?>
<!-- the head section -->
 <div class="container">
<?php
include('includes/header.php');
?>
        <h1>Edit Product</h1>
        <form action="edit_record.php" method="post" enctype="multipart/form-data"
              id="add_record_form">
            <input type="hidden" name="original_image" value="<?php echo $records['image']; ?>" />
            <input type="hidden" name="record_id"
                   value="<?php echo $records['recordID']; ?>">

            <label>Category ID:</label>
            <input type="category_id" name="category_id"
                   value="<?php echo $records['categoryID']; ?>">
            <br>

            <label>Name:</label>
            <input type="input" name="name" id="nameid" required size="12" onBlur="name_validation();"
                   value="<?php echo $records['name']; ?>"><span id="name_err"></span>
            <br>

            <label>Age:</label>
            <input type="input" name="age"
                   value="<?php echo $records['age']; ?>">
            <br>

            <label>Manufacturer:</label>
            <input type="input" name="manufacturerNumber" id="manid"  required size="12" onBlur="man_validation();"
                   value="<?php echo $records['manufacturerNumber']; ?>"><span id="man_err"></span>
                   
            <br>

            <label>List Price:</label>
            <input type="input" name="price" id="priceid" required size="12" onBlur="price_validation();"
                   value="<?php echo $records['price']; ?>"/><span id="price_err"></span>
                   <!-- <input type="input" name="price" id="priceid"  placeholder="Enter Price" required size="12" onBlur="price_validation();"/><span id="price_err"></span> -->
            <br>

            <label>Image:</label>
            <input type="file" name="image" accept="image/*" />
            <br>            
            <?php if ($records['image'] != "") { ?>
            <p><img src="image_uploads/<?php echo $records['image']; ?>" height="150" /></p>
            <?php } ?>
            
            <label>&nbsp;</label>
            <input type="submit" value="Save Changes">
            <br>
        </form>
        <p><a href="admin.php">Back</a></p>
    <?php
include('includes/footer.php');
?>
<script src="validation.js"></script>