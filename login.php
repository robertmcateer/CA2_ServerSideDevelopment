<div class="container">
<?php
include('includes/header.php');

$connect = mysqli_connect("localhost", "root", "", "ca2_serversidedevelopment");
session_start();
if(isset($_POST["login"]))
{
    if(empty($_POST["username"] || empty($_POST["password"])))
    {
        
        echo '<script> alert("Both fields are required")</script>';
    }else
    {
        $username=mysql_real_string($connect, $_POST["username"]);
        $password=mysql_real_string($connect, $_POST["password"]);

        
        
        $query="select * from tbl_admin where username='$username' and password='$password'";
        $result=mysql_query($connect,$query);
        if (mysql_num_rows($result)>0){
            $_SESSION["username"]=$username;
            header("location:admin.php");
        }
        else{
            echo '<script> alert("Wrong Credentials")</script>';
        }
        
    }
}
?>
<h1>Sign In</h1>

<br>
<form method="post">
<label>Username:</label>
 <input id="username" type="input" name="username" placeholder="Password" required>
 <br>
 <br>

<label>Password:</label>
<input id="password" type="input" name="password"  placeholder="Username" required>
 <br>
 <input type="submit" name="login" value="Login"  href="add_record_form.php">
 <p><a href="index.php">Back</a></p>
 </form>


<?php
include('includes/footer.php');
?>
</div>
