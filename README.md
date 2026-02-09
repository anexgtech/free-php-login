# Anexg Tech — Animated Login & Signup Page 🚀

> **Free & Open Source** — cosmic neon themed, fully animated, responsive login & signup pages.  
> Built by **[Anexg Tech](http://anexgtech.com/)** • MIT License

---

## Preview 🖥️

| Login Page | Signup Page |
|---|---|
| Animated particle background, glassmorphism card, Google Sign-In | Same theme with full registration form |

---

## Features ✨

- 🎨 **Cosmic Neon Design** — dark space background with animated particles & floating gradient blobs
- 🪟 **Glassmorphism Card** — frosted glass login/signup box with blur & glow effects
- 📱 **Fully Responsive** — desktop (card on right), tablet (centered), mobile (full-width)
- ✅ **Google Sign-In** — real Google Identity Services (GSI) button integration
- 🏷️ **Proper Labels** — uppercase cyan labels above every input field
- 🔐 **Show/Hide Password** — toggle button on password fields
- 💫 **Entrance Animations** — card slides in smoothly on page load
- 🖱️ **Hover Effects** — buttons scale up, blobs follow mouse (parallax)
- 🏢 **Anexg Tech Branding** — logo in header, golden company name in footer
- ♿ **Accessibility** — respects `prefers-reduced-motion` setting
- 🆓 **100% Free** — MIT License, use anywhere, modify anything

---

## File Structure 📁

```
anexg-tech-login/
├── index.php                 ← Redirects to login.php
├── login.php                 ← Login page
├── signup.php                ← Signup page
├── assets/
│   ├── background.png        ← Page background image
│   ├── logo.png              ← Company logo (header)
│   ├── favicon.png           ← Browser tab icon
│   ├── css/
│   │   └── style.css         ← All styles (cosmic neon theme)
│   └── js/
│       └── main.js           ← Animations, particles, demo logic, Google callback
├── favicon.ico               ← Fallback favicon
├── LICENSE                   ← MIT License
└── README.md                 ← This file
```

---

## How to Use 🔧

### Step 1: Download / Clone
Download or clone this folder to your computer.

### Step 2: Start a PHP Server
You need PHP installed. Open a terminal/command prompt in the project folder and run:

```bash
php -S localhost:8000 -t anexg-tech-login
```

> **Or** copy the `anexg-tech-login` folder into your XAMPP/WAMP `htdocs` directory.

### Step 3: Open in Browser
- Login page: [http://localhost:8000/login.php](http://localhost:8000/login.php)
- Signup page: [http://localhost:8000/signup.php](http://localhost:8000/signup.php)
- Root URL: [http://localhost:8000/](http://localhost:8000/) (auto-redirects to login)

### Step 4: Test Demo Mode
1. Go to **Signup** → fill name, email, password → click **Create account**
2. Go to **Login** → enter the same email & password → click **Sign In**
3. Data is stored in browser `localStorage` (demo only, no server needed)

---

## Google Sign-In Setup 🔑

The pages include a real **Google Sign-In** button using Google Identity Services (GSI). To make it work:

1. Go to [Google Cloud Console → Credentials](https://console.cloud.google.com/apis/credentials)
2. Click **Create Credentials** → **OAuth 2.0 Client ID**
3. Set Application Type to **Web application**
4. Under **Authorized JavaScript origins**, add:
   - `http://localhost:8000` (for local testing)
   - `https://yourdomain.com` (for production)
5. Copy the **Client ID** (looks like `123456789.apps.googleusercontent.com`)
6. Open `login.php` and `signup.php` and replace:
   ```
   YOUR_GOOGLE_CLIENT_ID.apps.googleusercontent.com
   ```
   with your actual Client ID.
7. Refresh the page — the Google button will now work!

> **Note:** Google Sign-In requires HTTPS in production. On localhost it works with HTTP.

---

## Customization 🎨

### Change Colors
Edit CSS variables at the top of `assets/css/style.css`:
```css
:root {
  --bg1: #0f0c29;        /* Page background fallback */
  --accent: #00e5ff;     /* Primary accent (cyan) */
  --accent-2: #8a2be2;   /* Secondary accent (purple) */
  --text: #e9f0ff;       /* Text color */
}
```

### Change Background
Replace `assets/background.png` with any image (recommended: 1920×1080 or larger).

### Change Logo & Favicon
- Replace `assets/logo.png` with your logo (recommended: 128×128 PNG with transparent background)
- Replace `assets/favicon.png` with your favicon (recommended: 32×32 or 64×64)

### Change Company Name
Edit the `$company` and `$site` variables at the top of `login.php` and `signup.php`:
```php
$company = 'Your Company Name';
$site = 'https://yoursite.com/';
```

### Change Card Position
In `assets/css/style.css`, find `.wrap` and change `justify-content`:
- `flex-end` = card on right (current)
- `center` = card in center
- `flex-start` = card on left

### Change Overlay Darkness
In `assets/css/style.css`, find `body::before` and adjust the last value in `rgba(8,6,28, 0.45)`:
- `0.3` = lighter (more background visible)
- `0.6` = darker (more focus on card)

---

## Integrating with a Real Backend 💡

This project is **frontend only**. To connect it to a real backend:

1. **Form action**: Change the `<form>` tag to point to your server:
   ```html
   <form action="/api/login.php" method="POST">
   ```
2. **Remove demo JS**: Delete or comment out the `handleLogin()` / `handleSignup()` functions in `assets/js/main.js`
3. **Server-side**: Implement PHP backend with:
   - PDO for database connection
   - `password_hash()` for storing passwords
   - `password_verify()` for checking passwords
   - Session management
4. **Google Sign-In backend**: Send the `response.credential` JWT token to your server and verify it using Google's token verification API

---

## Browser Support 🌐
- Chrome 80+
- Firefox 80+
- Safari 14+
- Edge 80+
- Mobile browsers (iOS Safari, Chrome Android)

---

## Credits & License 📦

- **Created by:** [Anexg Tech](http://anexgtech.com/)
- **License:** MIT — free to use, modify, and redistribute
- **Font:** [Poppins](https://fonts.google.com/specimen/Poppins) (Google Fonts)
- **Google Sign-In:** [Google Identity Services](https://developers.google.com/identity/gsi/web)

---

## Follow Us 🌐
- Website: [anexgtech.com](http://anexgtech.com/)
- Share this project freely on Instagram, GitHub, or anywhere!

> Made with ❤️ by Anexg Tech