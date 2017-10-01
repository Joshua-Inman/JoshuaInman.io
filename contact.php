<?php
// Message vars.
$msg = "";

// Check for submit.
if (filter_has_var(INPUT_POST, "submit")) {
  // Get form data. 
  $name = htmlspecialchars($_POST["name"]);
  $email = htmlspecialchars($_POST["email"]);
  $message = htmlspecialchars($_POST["message"]);
}

// Form validation.
if (!empty($name) && !empty($email) && !empty($message)) {
  // Name, email and message are all filled out.
  // Check for valid email.
  if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    // Failed.
    $msg = "<p class='alert-error'>Please enter a valid email address.</p>";
  } else {
    // Passed.
    // Recipent's email. 
    $toEmail = "JoshuaInman@icloud.com"; 
    $subject = "Contact Request From " . $name;
    $body = '<h2>Contact Request</h2>
            <h4>Name</h4><p>' . $name . '</p>
            <h4>Email</h4><p>' . $email . '</p>
            <h4>Message</h4><p>' . $message . '</p>
    ';

    // Email headers. 
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html;charset=UTF-8" . "\r\n";

    // Additional headers. 
    $headers .= "From: " . $name . "<" . $email . ">" . "\r\n";

    if (mail($toEmail, $subject, $body, $headers)) {
      // Email sent. 
      $msg = "<p class='alert-success'>Your email has been sent!</p>";
    } else {
      // Failed.
      $msg = "<p class='alert-error'>An error has occurred, please try again.</p>";
    }
  }
} else {
  // Name, email and message are not all filled out.
  $msg = "<p class='alert-error'>Please fill in all fields.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Joshua Inman | Contact</title>
	<meta charset="utf-8">
	<meta name="site-version" content="2.0.1">
	<meta name="author" content="Joshua Inman">
	<link rel="shortcut icon" type="img/png" href="img/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<!-- Temporarily removing viewport meta tag. -->
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <style>
  .alert-box {
    text-align: center;
  }

  .alert-success {
    color: green;
  }

  .alert-error {
    color: red;
  }
  </style>
</head>
<body class="fade-in">
  <header class="header-main">
    <div class="header-container">
      <a href="#"><img src="img/favicon.png" class="header-logo-img" alt="logo"></a>
      <a href="index.html" class="header-logo-text">JoshuaInman.io</a>
      <nav class="header-nav">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="changelog.html">Changelog</a></li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- End of header and navigation, start of primary content container. -->
  <div class="contact-container">
    <article class="main-article">
      <h1>Contact Me</h1>
      <?php if ($msg != ""): ?>
      <div class="alert-box"><?php echo $msg; ?></div>
      <?php endif; ?>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div>
          <label>Name</label>
          <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
        </div>
        <div>
          <label>Email</label>
          <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
        </div>
        <div>
          <label>Message</label>
          <textarea name="message"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
        </div>
        <br>
        <button type="submit" name="submit">Submit</button>
      </form>
    </article>
  </div>
  <!-- End of primary content container and start of footer. -->
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
  <script src="js/contact.js"></script>
</body>
</html>
  
  <!-- Copyright © 2017 Joshua Inman
  All rights reserved. -->