<?php
$company = 'Anexg Tech';
$site = 'http://anexgtech.com/';
?>
<!doctype html>
<html lang="hi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $company; ?> — Login</title>
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" href="assets/favicon.png" type="image/png">
  <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon.png">
  <script src="https://accounts.google.com/gsi/client" async defer></script>
  <script defer src="assets/js/main.js"></script>
</head>
<body>
  <div id="particles-wrap">
    <canvas id="particles"></canvas>
    <div class="blobs"></div>
  </div>

  <header class="brand">
    <a href="<?php echo $site; ?>" target="_blank" rel="noopener">
      <img src="assets/logo.png" alt="<?php echo $company; ?> logo" class="logo">
    </a>
  </header>

  <main class="wrap">
    <section class="card animated-card">
      <h1 class="title">Welcome Back</h1>
      <p class="subtitle">Sign in to continue to <strong><?php echo $company; ?></strong></p>

      <form id="loginForm" class="form" onsubmit="handleLogin(event)">
        <div class="field">
          <label for="loginEmail" class="field-label">Email</label>
          <input id="loginEmail" name="email" type="email" placeholder="you@company.com" required>
        </div>

        <div class="field">
          <label for="loginPassword" class="field-label">Password</label>
          <div class="password-wrap">
            <input id="loginPassword" name="password" type="password" placeholder="Enter your password" required>
            <button type="button" class="toggle" onclick="togglePassword('loginPassword')">Show</button>
          </div>
        </div>

        <div class="actions">
          <label class="checkbox"><input type="checkbox" id="remember"> Remember me</label>
          <button type="submit" class="btn primary">Sign In</button>
        </div>

        <div class="alt">
          <p>Don't have an account? <a href="signup.php">Create one</a></p>
        </div>
      </form>

      <div class="divider">OR</div>
      <div class="socials">
        <div class="g-signin-wrap">
          <div id="g_id_onload"
               data-client_id="YOUR_GOOGLE_CLIENT_ID.apps.googleusercontent.com"
               data-callback="handleGoogleSignIn"
               data-auto_prompt="false">
          </div>
          <div class="g_id_signin"
               data-type="standard"
               data-size="large"
               data-theme="filled_black"
               data-text="continue_with"
               data-shape="pill"
               data-logo_alignment="left"
               data-width="380">
          </div>
        </div>
      </div>
    </section> 
  </main>

  <footer class="foot">© <?php echo date('Y'); ?> <a class="company-link gold" href="<?php echo $site; ?>" target="_blank" rel="noopener"><?php echo $company; ?></a> — <a href="<?php echo $site; ?>" target="_blank" rel="noopener" class="site-link">anexgtech.com</a></footer>

  <div id="toast" class="toast"></div>
</body>
</html>