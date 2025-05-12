<?php

$database = new mysqli("localhost", "root", "", "test");
if ($database->connect_error) {
  die("Connection failed: " . $database->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $donorName = $_POST['donor_name'];
  $donorEmail = $_POST['email'];
  $phoneNumber = $_POST['phone'];
  $donationAmount = $_POST['amount'];
  $donationType = $_POST['donation_type'];
  $paymentMethod = $_POST['payment_method'];
  $message = $_POST['message'];

  $query = "INSERT INTO donations (donor_name, email, phone_number, amount, donation_type, payment_method, message) 
              VALUES ('$donorName', '$donorEmail', '$phoneNumber', '$donationAmount', '$donationType', '$paymentMethod', '$message')";

  if ($database->query($query) === TRUE) {
    header("Location: thank.php?status=success");
    exit();
  } else {
    header("Location: donate.php?error=1");
    exit();
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Make a Donation</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f6f9;
    }

    .donation-form {
      max-width: 600px;
      margin: 40px auto;
      padding: 30px;
      background: white;
      border-radius: 15px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .donation-form h2 {
      margin-bottom: 25px;
    }
  </style>
</head>

<body>

  <div class="donation-form">
    <h2 class="text-center text-success">Make a Donation</h2>
    <form action="" method="POST">

      <div class="mb-3">
        <label class="form-label">Full Name *</label>
        <input type="text" name="donor_name" class="form-control" placeholder="Your name" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Email Address *</label>
        <input type="email" name="email" class="form-control" placeholder="example@email.com" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Phone Number</label>
        <input type="text" name="phone" class="form-control" placeholder="Optional">
      </div>

      <div class="mb-3">
        <label class="form-label">Donation Amount ($) *</label>
        <input type="number" name="amount" class="form-control" min="1" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Donation Type *</label>
        <select name="donation_type" class="form-select" required>
          <option value="one_time">One-Time</option>
          <option value="recurring">Recurring</option>
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Payment Method *</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="payment_method" value="card" required>
          <label class="form-check-label">Credit/Debit Card</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="payment_method" value="paypal">
          <label class="form-check-label">PayPal</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="payment_method" value="bank_transfer">
          <label class="form-check-label">Bank Transfer</label>
        </div>
      </div>

      <div class="mb-3">
        <label class="form-label">Message (Optional)</label>
        <textarea name="message" class="form-control" rows="3" placeholder="Leave a note or message..."></textarea>
      </div>

      <div class="d-grid">
        <button type="submit" class="btn btn-success btn-lg">Donate Now</button>
      </div>

    </form>
  </div>

</body>

</html>