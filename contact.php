
<div class="container">
<?php
include('includes/header.php');
?>
<h1>Contact us</h1>
<div class="contactform1">
<form method="POST"  name="contactform" action="contact-form-handler.php"> 
<p>
<label for='name'>Your Name:</label> <br>
<input type="input" name="name"  id="nameid" placeholder="Enter Full Name" required size="12" onBlur="name_validation();" required><span id="name_err"></span>
            <br>
<p>
<label for='email'>Email Address:</label> <br>
<input type="text" name="email" placeholder="Enter Email" required> <br>
</p>
<p>
<label for='message'>Message:</label> <br>
<textarea name="message" required></textarea>
</p>
<input type="submit" value="Submit"><br>
</form>
</div>
<?php
include('includes/footer.php');
?>
</div>
<script src="validation.js"></script>
<script language="JavaScript">
var frmvalidator  = new Validator("contactform");
frmvalidator.addValidation("name","req","Please provide your name"); 
frmvalidator.addValidation("email","req","Please provide your email"); 
frmvalidator.addValidation("email","email","Please enter a valid email address"); 
</script>


