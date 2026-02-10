<div align="center">

# 🚀 Free Animated Login & Signup Page

### Cosmic Neon Theme • PHP • Responsive • Google Sign-In

[![Live Demo](https://img.shields.io/badge/🔴_Live_Demo-free--php--login.anexgtech.com-00e5ff?style=for-the-badge)](https://free-php-login.anexgtech.com) [![License: MIT](https://img.shields.io/badge/License-MIT-gold?style=for-the-badge)](LICENSE) [![PHP 7.4+](https://img.shields.io/badge/PHP-7.4+-8892BF?style=for-the-badge&logo=php)](https://php.net) [![Stars](https://img.shields.io/github/stars/anexgtech/free-php-login?style=for-the-badge&color=yellow)](https://github.com/anexgtech/free-php-login)

**Beautiful animated login & signup pages — free for everyone.**  
Drop into any PHP project. Customize in minutes. No backend required.

👉 **[View Live Demo](https://free-php-login.anexgtech.com)** 👈

---

Built with ❤️ by **[Anexg Tech](http://anexgtech.com/)**

</div>

---

## ✨ Features

| Feature | Details |
|---------|---------|
| 🎨 Cosmic Neon Theme | Dark space background, animated particles, floating gradient blobs |
| 🪟 Glassmorphism | Frosted glass card with blur & glow |
| 📱 Responsive | Desktop → Tablet → Mobile |
| 🔐 Google Sign-In | Official Google Identity Services button |
| 💫 Animations | Entrance effects, hover interactions, parallax blobs |
| 🎯 Easy Integration | Works with MySQL, PostgreSQL, MongoDB, SQLite |
| 🆓 MIT License | Free for personal & commercial use |

---

## 📁 Files

```
├── index.php           → Redirects to login
├── login.php           → Login page
├── signup.php          → Signup page
├── assets/
│   ├── backgroun.jpeg  → Background image
│   ├── logo.png        → Logo (64×64)
│   ├── favicon.png     → Browser icon
│   ├── css/style.css   → Styles & theme
│   └── js/main.js      → Animations & logic
├── LICENSE
└── README.md
```

---

## 🚀 Quick Start

```bash
git clone https://github.com/anexgtech/free-php-login.git
cd free-php-login
php -S localhost:80
```
Open **http://localhost** — done! ✅

> Or copy files to XAMPP/WAMP `htdocs` folder.

---

## 📖 User Manual

### 1. Change Company Name
Edit top of `login.php` and `signup.php`:
```php
$company = 'Your Company';
$site = 'https://yoursite.com/';
```

### 2. Replace Logo & Background
| File | Replace with | Recommended size |
|------|-------------|-----------------|
| `assets/logo.png` | Your logo | 64×64 px, transparent PNG |
| `assets/backgroun.jpeg` | Your background | 1920×1080 px |
| `assets/favicon.png` | Your icon | 32×32 px |

### 3. Change Colors
Edit `assets/css/style.css`:
```css
:root {
  --accent: #00e5ff;     /* Cyan */
  --accent-2: #8a2be2;   /* Purple */
  --bg1: #0f0c29;        /* Background */
  --text: #e9f0ff;       /* Text */
}
```

### 4. Move Card Position
In `style.css` find `.wrap` → change `justify-content`:
- `flex-end` → Right (default)
- `center` → Center
- `flex-start` → Left

### 5. Adjust Background Darkness
In `style.css` find `body::before` → change opacity:
- `rgba(8,6,28, 0.30)` → Light
- `rgba(8,6,28, 0.45)` → Medium (default)
- `rgba(8,6,28, 0.65)` → Dark

---

## 🔑 Google Sign-In Setup

**Step 1** → Go to [Google Cloud Console](https://console.cloud.google.com/apis/credentials)

**Step 2** → Create OAuth 2.0 Client ID:
- Type: **Web application**
- Authorized origins: `http://localhost` + `https://yourdomain.com`

**Step 3** → Copy Client ID, replace in `login.php` & `signup.php`:
```
data-client_id="YOUR_GOOGLE_CLIENT_ID.apps.googleusercontent.com"
```

**Step 4** → Refresh page → Google button works! ✅

> ⚠️ Production requires HTTPS.

---

## 🗄️ Database Connection Guide

### Step 1: Update Form Action
```html
<!-- Remove JS handler → use form POST -->
<form action="auth.php" method="POST">
```

### Step 2: Create Users Table

<details>
<summary><b>MySQL / MariaDB</b></summary>

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    google_id VARCHAR(255) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

**Connect & authenticate:**
```php
<?php
// auth.php — MySQL with PDO
$db = new PDO('mysql:host=localhost;dbname=myapp', 'root', '');

// SIGNUP
if ($_POST['action'] === 'signup') {
    $hash = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt = $db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$_POST['name'], $_POST['email'], $hash]);
    header('Location: login.php?msg=account_created');
}

// LOGIN
if ($_POST['action'] === 'login') {
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$_POST['email']]);
    $user = $stmt->fetch();
    if ($user && password_verify($_POST['password'], $user['password'])) {
        session_start();
        $_SESSION['user'] = $user['id'];
        header('Location: dashboard.php');
    } else {
        header('Location: login.php?error=invalid');
    }
}
?>
```
</details>

<details>
<summary><b>PostgreSQL</b></summary>

```sql
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    google_id VARCHAR(255),
    created_at TIMESTAMP DEFAULT NOW()
);
```

```php
<?php
$db = new PDO('pgsql:host=localhost;dbname=myapp', 'postgres', 'password');
// Same INSERT/SELECT queries as MySQL — PDO works the same way
?>
```
</details>

<details>
<summary><b>SQLite (No server needed)</b></summary>

```php
<?php
$db = new PDO('sqlite:database.db');
$db->exec("CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    email TEXT UNIQUE NOT NULL,
    password TEXT NOT NULL,
    google_id TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");
// Same INSERT/SELECT queries — PDO is universal
?>
```
</details>

<details>
<summary><b>MongoDB</b></summary>

```bash
composer require mongodb/mongodb
```

```php
<?php
$client = new MongoDB\Client("mongodb://localhost:27017");
$users = $client->myapp->users;

// SIGNUP
$users->insertOne([
    'name'     => $_POST['name'],
    'email'    => $_POST['email'],
    'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
    'created'  => new MongoDB\BSON\UTCDateTime()
]);

// LOGIN
$user = $users->findOne(['email' => $_POST['email']]);
if ($user && password_verify($_POST['password'], $user['password'])) {
    session_start();
    $_SESSION['user'] = (string) $user['_id'];
    header('Location: dashboard.php');
}
?>
```
</details>

### Step 3: Handle Google Sign-In on Server
```php
<?php
// Verify Google JWT token server-side
$token = $_POST['credential'];
$payload = json_decode(base64_decode(explode('.', $token)[1]), true);

$email = $payload['email'];
$name  = $payload['name'];
$gid   = $payload['sub'];

// Check if user exists, if not create one
$stmt = $db->prepare("SELECT * FROM users WHERE email = ? OR google_id = ?");
$stmt->execute([$email, $gid]);
$user = $stmt->fetch();

if (!$user) {
    $db->prepare("INSERT INTO users (name, email, password, google_id) VALUES (?, ?, '', ?)")
       ->execute([$name, $email, $gid]);
}

session_start();
$_SESSION['user'] = $user ? $user['id'] : $db->lastInsertId();
header('Location: dashboard.php');
?>
```

> 🔒 **Security tip:** Always use `password_hash()` + `password_verify()`. Never store plain passwords.

---

## 🌐 Deployment

| Platform | Command/Steps |
|----------|--------------|
| **XAMPP/WAMP** | Copy to `htdocs/` → open `localhost/` |
| **Shared Hosting** | Upload via FTP to `public_html/` |
| **VPS** | `scp -r . user@server:/var/www/html/` |
| **Docker** | `FROM php:8.1-apache` + `COPY . /var/www/html/` |

---

## ❓ FAQ

| Question | Answer |
|----------|--------|
| Can I use commercially? | ✅ Yes, MIT license |
| Credit required? | Not required, but appreciated |
| Convert to HTML? | Replace `<?php echo $company; ?>` with text, rename to `.html` |
| Google button missing? | Add your Client ID (see setup above) |
| Add more social logins? | Add buttons in `.socials` div + implement OAuth |

---

## ⭐ Support This Project

- ⭐ **Star** this repo
- 🍴 **Fork** & customize
- 📢 **Share** with developers
- 🔗 **Follow** [Anexg Tech](http://anexgtech.com/)

---

<div align="center">

**[🔴 Live Demo](https://free-php-login.anexgtech.com)** · **[📥 Download](https://github.com/anexgtech/free-php-login/archive/refs/heads/main.zip)** · **[🐛 Report Bug](https://github.com/anexgtech/free-php-login/issues)**

MIT License © 2026 [Anexg Tech](http://anexgtech.com/)

*Free tools for developers worldwide*

</div>
