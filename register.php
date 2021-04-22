<?php

//register.php

/**
 * Start the session.
 */
session_start();

/**
 * Include ircmaxell's password_compat library.
 */
require 'libary-folder/password.php';

/**
 * Include our MySQL connection.
 */
require 'login_connect.php';

?>
<div class="container">
<?php
include('includes/header.php');
?>

<?php

//If the POST var "register" exists (our submit button), then we can
//assume that the user has submitted the registration form.
if(isset($_POST['register'])){
    
    //Retrieve the field values from our registration form.
    $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
    $dob = !empty($_POST['dob']) ? trim($_POST['dob']) : null;
    
    //TO ADD: Error checking (username characters, password length, etc).
    //Basically, you will need to add your own error checking BEFORE
    //the prepared statement is built and executed.
    
    //Now, we need to check if the supplied username already exists.
    
    //Construct the SQL statement and prepare it.
    $sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    
    //Bind the provided username to our prepared statement.
    $stmt->bindValue(':username', $username);
    
    //Execute.
    $stmt->execute();
    
    //Fetch the row.
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    //If the provided username already exists - display error.
    //TO ADD - Your own method of handling this error. For example purposes,
    //I'm just going to kill the script completely, as error handling is outside
    //the scope of this tutorial.
    if($row['num'] > 0){
        die('That username already exists!');
    }
    
    //Hash the password as we do NOT want to store our passwords in plain text.
    $passwordHash = password_hash($pass, PASSWORD_BCRYPT, array("cost" => 12));
    
    //Prepare our INSERT statement.
    //Remember: We are inserting a new row into our users table.
    $sql = "INSERT INTO users (name,username,dob, password) VALUES (:name,:username, :dob,:password)";
    $stmt = $pdo->prepare($sql);
    
    //Bind our variables.
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':dob', $dob);
    $stmt->bindValue(':password', $passwordHash);

    //Execute the statement and insert the new account.
    $result = $stmt->execute();
    
    //If the signup process is successful.
    if($result){
        //What you do here is up to you!
        echo 'Thank you for registering with our website. Please login '?><a href="login.php">HERE</a><?php
    }
    
}
?>


        <h1>Register</h1>
        <div class="contactform1">
        <form action="register.php" method="post">
            <label for="name">Full Name:</label><br>
            <input type="input" name="name"  id="nameid" placeholder="Enter Full Name" required size="12" onBlur="name_validation();" required><span id="name_err"></span>
            <br><br>
            <label for="username" >Username:</label><br>
            <input type="text" id="username" name="username"  placeholder="Enter Username"><br><br>
            <label for="dob">Date of Birth:</label><br>
            <input type="text" id="dob" name="dob" placeholder="Enter DOB"><br><br>
            <label for="password">Password</label><br>

            <input type="input" name="password"  id="passwordid" placeholder="Enter Strong Password" required size="16" onBlur="password_validation();" required><span id="password_err"></span>
            <br><br>
            <input type="submit" name="register" value="Register"></button>
        </form>
</div>
        <?php
include('includes/footer.php');
?>
<div>
<script src="validation.js"></script>