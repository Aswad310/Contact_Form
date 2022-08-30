<?php

    // print_r($_POST);

    $error = "";
    $successMessage = "";
   

    if(isset($_POST['submit']))
    {
        if(!$_POST['email'])
        {
            $error.= "The email field is required.<br>"; 
        }
        if(!$_POST['subject'])
        {
            $error.= "The subject field is required.<br>"; 
        }
        if(!$_POST['content'])
        {
            $error.= "The content field is required.<br>"; 
        }
        if ($_POST['email'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)===false) 
        {
            $error.= "email is not a valid email address.<br>";
        }

        if($error != "")
        {
            $error = '<div class="alert alert-danger" role="alert"><p><strong>There were error(s) in your form</strong></p>'. $error .'</div>'; 
        }
        else
        {
            $emailTo = "your_email@gmail.com";
            $emailfrom = $_POST['email'];
            $subject =  $_POST['subject'];
            $content = $_POST['content'];
            $headers = "From: $emailfrom\n";
            $headers .= "MIME-Version: 1.0\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\n";

            if(mail($emailTo, $subject, $content, $headers))
            {
                $successMessage = '<div class="alert alert-success" role="alert"><p><strong>Your message was sent, we will get back to you ASAP!</strong></p></div>'; 
            }
            else
            {
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Your message could not be send - Please try again later</strong></p></div>';
            }
        }
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Contact Form</title>
  </head>
  <body>

    <div class="container">
        <h1>Get in touch!</h1>
      
        <div id="error"><?php echo $error.$successMessage?></div>

        <form action="" method="POST">
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com">
                <small>We will never share your email with anyone else</small>
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" class="form-control" id="subject">
            </div>

            <div class="form-group">
                <label for="content">What would you like to ask us?</label>
                <textarea class="form-control" name="content" id="content" rows="3"></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    
    <!-- Validation.js -->
    <script src="validation.js" text="text/javascript"></script>

</body>
</html>