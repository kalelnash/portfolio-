<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MediBook - Register</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Segoe UI', sans-serif;
      min-height: 100vh;
      display: flex;
      background:url("https://imgix.ranker.com/list_img_v2/19444/3299444/original/3299444?w=1200&h=630&fm=pjpg&q=80&fit=crop&dpr=1");
      background-size: cover;
      background-position: center;
      position: relative;
    }

    body::before {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(5, 25, 25, 0.70);
    }

    /* ── LEFT PANEL ── */
    .left {
      margin-left: 100px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 60px 70px;
      position: relative;
      z-index: 1;
    }

    .logo { display: flex; align-items: center; gap: 14px; margin-bottom: 40px; }
    .logo img { width: 110px; height: 90px; object-fit: contain; }
    .logo-text h1 { color: #fff; font-size: 3.9rem; font-weight: 700; }
    .logo-text span { color: #5bbfb5; font-size: 0.95rem; text-transform: uppercase; letter-spacing: 1px; display: block; }

    .tagline h2 { color: #ffffff; font-size: 2.8rem; font-weight: 700; line-height: 1.3; margin-bottom: 16px; }
    .tagline h2 em { color: #14b8a8; font-style: normal; }
    .tagline p { color: #b8dbd8; font-size: 1.4rem; line-height: 1.7; max-width: 400px; margin-bottom: 40px; }

    .features { display: flex; flex-direction: column; gap: 14px; }
    .feature-item { display: flex; align-items: center; gap: 12px; color: #c8e8e4; font-size: 1rem; }
    .feature-dot { width: 8px; height: 8px; border-radius: 50%; background: #0d9488; flex-shrink: 0; }

    /* ── RIGHT PANEL ── */
    .right {
      width: 430px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding-right: 52px;
      margin-left: 420px;
      position: relative;
      z-index: 1;
    }

    /* ── CARD ── */
    .card {
      background: #ffffff;
      border: 1px solid #e2e8f0;
      border-radius: 20px;
      padding: 42px 36px;
      width: 100%;
      box-shadow: 0 8px 32px rgba(0,0,0,0.18);
    }

    .back-link {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      color: #0d9488;
      font-size: 0.82rem;
      font-weight: 600;
      text-decoration: none;
      margin-bottom: 16px;
      transition: color 0.2s;
    }

    .back-link:hover { color: #0f766e; }
    .back-link svg { width: 14px; height: 14px; stroke: currentColor; fill: none; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round; }

    .card-top { display: flex; align-items: center; gap: 10px; margin-bottom: 6px; }
    .card-top img { width: 70px; height: 56px; object-fit: contain; }
    .card-top h1 { color: #0f766e; font-size: 1.3rem; font-weight: 700; }

    .card h3 { color: #1a2e35; font-size: 1rem; font-weight: 700; margin-bottom: 3px; }
    .card > p { color: #64748b; font-size: 0.8rem; margin-bottom: 20px; }

    .row-2 { display: flex; gap: 10px; }
    .row-2 .form-group { flex: 1; }
    .form-group { margin-bottom: 12px; }

    label {
      display: block;
      color: #1a2e35;
      font-size: 0.72rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 5px;
    }

    input {
      width: 100%;
      padding: 11px 13px;
      background: #f8fafc;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      color: #1a2e35;
      font-size: 0.88rem;
      font-family: inherit;
      transition: border-color 0.2s, background 0.2s;
    }

    input::placeholder { color: #94a3b8; }
    input:focus { outline: none; border-color: #0d9488; background: #f0fdfb; }

    .gender-group { margin-bottom: 12px; }
    .gender-options { display: flex; gap: 8px; }
    .gender-option  { flex: 1; position: relative; }

    .gender-radio { position: absolute; opacity: 0; width: 0; height: 0; }

    .gender-label {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 10px 13px;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      cursor: pointer;
      font-size: 0.88rem;
      color: #475569;
      background: #f8fafc;
      transition: all 0.2s;
      user-select: none;
    }

    .gender-label::after {
      content: '';
      width: 14px; height: 14px;
      border-radius: 50%;
      border: 2px solid #cbd5e1;
      flex-shrink: 0;
    }

    .gender-radio:checked + .gender-label {
      border-color: #0d9488;
      color: #0d9488;
      background: #f0fdfb;
      font-weight: 600;
    }

    .gender-radio:checked + .gender-label::after {
      border-color: #0d9488;
      background: radial-gradient(circle, #0d9488 45%, transparent 50%);
    }

    hr { border: none; border-top: 1px solid #e2e8f0; margin: 16px 0; }

    .buttonbook {
      width: 100%;
      padding: 12px;
      background: #0d9488;
      color: #fff;
      border: none;
      border-radius: 9px;
      font-size: 0.95rem;
      font-weight: 700;
      cursor: pointer;
      transition: background 0.2s, transform 0.2s;
    }

    .buttonbook:hover { background: #0f766e; transform: translateY(-2px); }

    .login-link { text-align: center; margin-top: 14px; color: #64748b; font-size: 0.85rem; }
    .login-link a { color: #0d9488; font-weight: 600; text-decoration: none; }
    .login-link a:hover { text-decoration: underline; }

    h1 { color: #0f766e; }

    /* ============================================================
       ANIMATIONS
       ============================================================ */

    /* Left panel slides in from left */
    .left {
      animation: slideInLeft 0.7s ease both;
    }

    @keyframes slideInLeft {
      from { opacity: 0; transform: translateX(-50px); }
      to   { opacity: 1; transform: translateX(0); }
    }

    /* Logo, tagline, features stagger */
    .logo { animation: fadeUp 0.6s ease 0.2s both; }
    .tagline { animation: fadeUp 0.6s ease 0.38s both; }
    .feature-item:nth-child(1) { animation: fadeUp 0.5s ease 0.52s both; }
    .feature-item:nth-child(2) { animation: fadeUp 0.5s ease 0.62s both; }
    .feature-item:nth-child(3) { animation: fadeUp 0.5s ease 0.72s both; }
    .feature-item:nth-child(4) { animation: fadeUp 0.5s ease 0.82s both; }

    /* Right card slides in from right */
    .right {
      animation: slideInRight 0.7s ease 0.15s both;
    }

    @keyframes slideInRight {
      from { opacity: 0; transform: translateX(50px); }
      to   { opacity: 1; transform: translateX(0); }
    }

    /* Card inner elements stagger */
    .back-link   { animation: fadeUp 0.5s ease 0.45s both; }
    .card-top    { animation: fadeUp 0.5s ease 0.52s both; }
    .card h3     { animation: fadeUp 0.5s ease 0.58s both; }
    .card > p    { animation: fadeUp 0.5s ease 0.63s both; }
    .row-2:nth-of-type(1)  { animation: fadeUp 0.5s ease 0.68s both; }
    .row-2:nth-of-type(2)  { animation: fadeUp 0.5s ease 0.74s both; }
    .gender-group          { animation: fadeUp 0.5s ease 0.80s both; }
    .row-2:nth-of-type(3)  { animation: fadeUp 0.5s ease 0.86s both; }
    hr             { animation: fadeUp 0.5s ease 0.90s both; }
    .buttonbook    { animation: fadeUp 0.5s ease 0.95s both; }
    .login-link    { animation: fadeUp 0.5s ease 1.00s both; }

    @keyframes fadeUp {
      from { opacity: 0; transform: translateY(20px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 860px) {
      .left  { display: none; }
      body   { justify-content: center; align-items: center; }
      .right { width: 100%; max-width: 480px; padding: 20px; margin-left: 0; }
    }

  </style>
</head>
<body>

  <div class="left">
    <div class="logo">
      <img src="logopage.png" alt="MediBook Logo">
      <div class="logo-text">
        <h1>MediBook</h1>
        <span>Online Doctor Appointment</span>
      </div>
    </div>
    <div class="tagline">
      <h2>Join thousands<br>getting <em>better care.</em></h2>
      <p>Create your free MediBook account and start booking appointments with verified doctors and specialists near you.</p>
    </div>
    <div class="features">
      <div class="feature-item"><div class="feature-dot"></div>Free to sign up, no hidden fees</div>
      <div class="feature-item"><div class="feature-dot"></div>Access to verified specialists</div>
      <div class="feature-item"><div class="feature-dot"></div>Manage all your bookings in one place</div>
      <div class="feature-item"><div class="feature-dot"></div>Your data is always protected</div>
    </div>
  </div>

  <div class="right">
    <div class="card">

      <a href="index.php" class="back-link">
        <svg viewBox="0 0 24 24"><polyline points="15 18 9 12 15 6"/></svg>
        Back to Home
      </a>

      <div class="card-top">
        <img src="logopage.png" alt="MediBook Logo">
        <h1>MediBook</h1>
      </div>

      <h3>Create Your Account</h3>
      <p>Fill in your details to get started.</p>

      <form action="register_backend.php" method="POST">

        <div class="row-2">
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="fullName" placeholder="John Doe" required>
          </div>
          <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" placeholder="john_doe" required>
          </div>
        </div>

        <div class="row-2">
          <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" placeholder="john@example.com" required>
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type="tel" name="phone" placeholder="+63 912 345 6789" required>
          </div>
        </div>

        <div class="gender-group">
          <label>Gender</label>
          <div class="gender-options">
            <div class="gender-option">
              <input type="radio" id="male" name="gender" value="male" class="gender-radio" required>
              <label for="male" class="gender-label">Male</label>
            </div>
            <div class="gender-option">
              <input type="radio" id="female" name="gender" value="female" class="gender-radio">
              <label for="female" class="gender-label">Female</label>
            </div>
          </div>
        </div>

        <div class="row-2">
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Create password" required>
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" name="confirmPassword" placeholder="Repeat password" required>
          </div>
        </div>

        <hr>

        <button type="submit" name="submit" class="buttonbook">Create Account</button>

      </form>

      <div class="login-link">
        Already have an account? <a href="login.php">Sign in here</a>
      </div>

    </div>
  </div>

</body>
</html>