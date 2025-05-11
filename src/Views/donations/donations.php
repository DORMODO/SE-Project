<?php
// add donation to database
//change 
include_once '../../Controllers/DBControllor.php';
$database = new DBController();
$database->dbName = 'charity_db';
if($database->openConnection()){
  echo("connected well!");
}else{
  echo("محمد مش عملها");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $donorName = $_POST['donorName'];
    echo '<script>alert("Donation recorded successfully!");</script>';
  
  $donorEmail = $_POST['donorEmail'];
  $donationAmount = $_POST['donationAmount'];
  $paymentMethod = $_POST['paymentMethod'];
  $message = $_POST['message'];

  // Insert donation into the database
  $query = "INSERT INTO donations (name, email, amount, payment_method, message) VALUES ('$donorName', '$donorEmail', '$donationAmount', '$paymentMethod', '$message')";

  if ($database->connection->query($query) === TRUE) {
    echo '<script>alert("Donation recorded successfully!");</script>';
  } else {
    echo '<script>alert("Error: ' . $database->connection->error . '");</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Donate to Our Charity</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background: #f7f9fa;
    }

    .donation-form {
      max-width: 500px;
      margin: 40px auto;
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
      padding: 32px;
    }

    .donation-form .form-title {
      font-weight: 700;
      margin-bottom: 24px;
      color: #2d6a4f;
    }

    .btn-donate {
      background: #2d6a4f;
      color: #fff;
      font-weight: 600;
    }

    .btn-donate:hover {
      background: #40916c;
    }
  </style>
</head>

<body>
  <div class="donation-form">
    <h2 class="form-title text-center">Make a Donation</h2>
    <form method="post" action="../pages/thank.php">
      <div class="mb-3">
        <label for="donorName" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="donorName" name="donorName" required>
      </div>
      <div class="mb-3">
        <label for="donorEmail" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="donorEmail" name="donorEmail" required>
      </div>
      <div class="mb-3">
        <label for="donationAmount" class="form-label">Donation Amount (USD)</label>
        <input type="number" class="form-control" id="donationAmount" name="donationAmount" min="1" step="any" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Payment Method</label>
        <select class="form-select" name="paymentMethod" required>
          <option value="">Select a method</option>
          <option value="credit_card">Credit Card</option>
          <option value="paypal">PayPal</option>
          <option value="bank_transfer">Bank Transfer</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="message" class="form-label">Message (Optional)</label>
        <textarea class="form-control" id="message" name="message" rows="2"></textarea>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-donate btn-lg">Donate Now</button>
      </div>
    </form>
  </div>
</body>

</html>