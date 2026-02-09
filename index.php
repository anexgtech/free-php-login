<?php
// Redirect root requests to the login page for a smoother preview experience
header('Location: login.php');
exit;
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Redirecting…</title>
  <meta http-equiv="refresh" content="0; url=login.php">
</head>
<body>
  <p>If you are not redirected, <a href="login.php">click here to open the login page</a>.</p>
</body>
</html>