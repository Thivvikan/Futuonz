<?php
// Basic contact form handler for Futuonz.
// Make sure PHP mail() is enabled on your hosting.

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.html');
    exit;
}

$to = 'futuonz@gmail.com';
$subject = 'New contact from Futuonz website';

$name     = trim($_POST['name'] ?? '');
$email    = trim($_POST['email'] ?? '');
$business = trim($_POST['business'] ?? '');
$budget   = trim($_POST['budget'] ?? '');
$message  = trim($_POST['message'] ?? '');

$bodyLines = [
    "Name: {$name}",
    "Email: {$email}",
    "Business / Brand: {$business}",
    "Budget: {$budget}",
    "",
    "Message:",
    $message,
];

$body = implode("\n", $bodyLines);

$headers = [];
if ($email !== '') {
    $headers[] = "From: {$name} <{$email}>";
}
$headers[] = 'Reply-To: ' . ($email !== '' ? $email : $to);
$headers[] = 'X-Mailer: PHP/' . phpversion();

@mail($to, $subject, $body, implode("\r\n", $headers));

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thank You – Futuonz</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body class="site-body">
  <header class="page-header">
    <nav class="hero-nav">
      <div class="brand">
        <img src="images/futuonz-logo.png" alt="Futuonz logo" class="brand-logo" />
        <div class="brand-text">
          <span class="brand-name">FUTUONZ</span>
          <span class="brand-tagline">THE FUTURE COMES TODAY</span>
        </div>
      </div>
      <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="projects.html">Projects</a></li>
        <li><a href="pricing.html">Pricing</a></li>
        <li><a href="contact.html" class="nav-cta">Contact</a></li>
      </ul>
    </nav>

    <div class="page-hero-content">
      <h1>Thank You</h1>
      <p>
        Your message has been sent to Futuonz. We’ll review your details and
        get back to you as soon as possible.
      </p>
    </div>
  </header>

  <main>
    <section class="page-section">
      <div class="page-inner">
        <p>
          If you prefer, you can also reach us directly at
          <a href="mailto:futuonz@gmail.com">futuonz@gmail.com</a> or on WhatsApp at
          <a href="https://wa.me/94765893654?text=Hi%20Futuonz%2C%20I%27m%20interested%20in%20a%20new%20website." target="_blank" rel="noopener">
            +94 76 589 3654
          </a>.
        </p>
        <p>
          <a href="index.html" class="btn-outline">Back to Home</a>
        </p>
      </div>
    </section>
  </main>
</body>
</html>

