<?php
$company = 'Anexg Tech';
$site = 'http://anexgtech.com/';
?>
<!doctype html>
<html lang="hi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $company; ?> — Sign up</title>
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
      <h1 class="title">Create your account</h1>
      <p class="subtitle">Join <?php echo $company; ?> — it's free and open</p>

      <form id="signupForm" class="form" onsubmit="handleSignup(event)">
        <div class="field">
          <label for="fullName" class="field-label">Full Name</label>
          <input id="fullName" name="name" type="text" placeholder="Jane Doe" required>
        </div>

        <div class="field">
          <label for="signupEmail" class="field-label">Email</label>
          <input id="signupEmail" name="email" type="email" placeholder="you@company.com" required>
        </div>

        <div class="field">
          <label for="signupPassword" class="field-label">Password</label>
          <div class="password-wrap">
            <input id="signupPassword" name="password" type="password" placeholder="Min 8 characters" required minlength="8">
            <button type="button" class="toggle" onclick="togglePassword('signupPassword')">Show</button>
          </div>
        </div>

        <div class="field">
          <label for="confirmPassword" class="field-label">Confirm Password</label>
          <input id="confirmPassword" name="confirm" type="password" placeholder="Repeat your password" required minlength="8">
        </div>

        <div class="agree-row">
          <label class="checkbox-label"><input type="checkbox" id="terms" required> I agree to the <a href="#">Terms & Conditions</a></label>
        </div>

        <div class="actions">
          <button type="submit" class="btn primary">Create account</button>
        </div>

        <div class="alt">
          <p>Already registered? <a href="login.php">Sign in</a></p>
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
               data-text="signup_with"
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