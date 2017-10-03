<?php
// Variables.
$msg = '';
$msgClass = '';

// Check for submit.
if (filter_has_var(INPUT_POST, 'submit')) {
  // Get form input.
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $message = htmlspecialchars($_POST['message']);

  // If entire form is filled out.
  if (!empty($email) && !empty($name) && !empty($message)) {
    // Checks for valid email.
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
      // Invalid email.
      $msg = 'Please enter a valid email address.';
      $msgClass = 'alert-error';
    } else {
      // Valid email.
      $toEmail = 'joshuainman@icloud.com';
      $subject = 'Contact Request From ' . $name;
      $body = '<h2>Contact Request</h2>
        <h4>Name</h4><p>' . $name . '</p>
        <h4>Email</h4><p>' . $email . '</p>
        <h4>Message</h4><p>' . $message . '</p>
      ';

      // Email headers.
      $headers = "MIME-Version: 1.0" . "\r\n";
      $headers .= "Content-Type:text/html;charset=UTF-8" . "\r\n";
      $headers .= "From: " .$name. "<".$email.">" . "\r\n";

      if (mail($toEmail, $subject, $body, $headers)) {
        // Email successfully sent.
        $msg = 'Your email has been sent, thank you!';
        $msgClass = 'alert-success';
      } else {
        // Email failed to send.
        $msg = 'An error has occurred, please try again.';
        $msgClass = 'alert-error';
      }
    }
  } else {
    $msg = 'Please fill in all required fields.';
    $msgClass = 'alert-error';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Joshua Inman | Contact</title>
	<meta charset="utf-8">
	<meta name="author" content="Joshua Inman">
	<link rel="shortcut icon" type="img/png" href="img/favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
  <!-- Glanced at bootstrap for inspiration. -->
  <!-- <link rel="stylesheet" href="https://bootswatch.com/cosmo/bootstrap.min.css"> -->
	<link rel="stylesheet" type="text/css" href="css/main.css">
  <link rel="stylesheet" type="text/css" href="css/responsive.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<!-- Temporarily removing viewport meta tag. -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
</head>

<body class="fade-in">

  <!-- Header/navigation. -->
  <header class="header-main">
    <div class="header-container">
      <a href="#"><img src="img/favicon.png" class="header-logo-img" alt="logo"></a>
      <a href="index.html" class="header-logo-text">JoshuaInman.io</a>
      <nav class="header-nav">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="https://github.com/Joshua-Inman/JoshuaInman.io/blob/master/CHANGELOG.md" target="_blank">Changelog</a></li>
        </ul>
      </nav>
    </div>
  </header>
  
  <!-- Primary content. -->
  <div class="contact-container">
    <article class="main-article">
      
      <h1 id="contact-heading">Contact Me Below</h1>
      <p id="contact-subheading">Thank you for contacting me, I will get back to you as soon as possible.</p>
      <?php if($msg != ''): ?>
    	<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
      <?php endif; ?>

      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	      <div class="contact-group">
		      <label><span style="color: #FF404E;">*</span>Name:</label>
		      <input type="text" name="name" value="">
        </div>
        
	      <div class="contact-group">
	      	<label><span style="color: #FF404E;">*</span>Email:</label>
	      	<input type="text" name="email" value="">
        </div>
        
	      <div class="contact-group">
	      	<label>Message:</label>
	      	<textarea name="message"></textarea>
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </form>

    </article>
  </div>

  <!-- Footer. -->
  <footer class="footer-main">
    <p><a href="#">Back to top &raquo;</a></p>

    <p>
      <a href="https://youtube.com/binks" target="_blank">
        <img src="img/youtube.png" class="youtube" alt="YouTube Icon">
      </a>
      <a href="https://discordapp.com/invite/0nimFZPsWJ1AlYlt" target="_blank">
        <img src="img/discord.png" class="discord" alt="Discord Icon">
      </a>
      <a href="https://github.com/joshua-inman" target="_blank">
        <img src="img/github.png" class="discord" alt="GitHub Icon">
      </a>
      <a href="https://twitter.com/joshuajinman" target="_blank">
        <img src="img/twitter.png" class="discord" alt="Twitter Icon">
      </a>
      <a href="https://instagram.com/joshuajinman" target="_blank">
        <img src="img/instagram.png" class="instagram" alt="Instagram Icon">
      </a>
    </p>

    <p>Copyright &copy; 2017 Joshua Inman</p>
  </footer>

  <!-- Scripts. -->
  <script>
		$(document).ready(function() {
			$(".header-logo-text").css("-webkit-transform", "rotateX(360deg)");
		});
  </script>

</body>
</html>

<!-- Copyright © 2017 Joshua Inman
All rights reserved. -->