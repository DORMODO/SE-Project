

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #1b4332;
        }
        
        body {
            background-color: #f8f9fa;
        }
        
        .contact-header {
            background-color: var(--primary-color);
            color: white;
            padding: 4rem 0;
            margin-bottom: 3rem;
        }
        
        .contact-form {
            background-color: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        
        .contact-info {
            background-color: var(--primary-color);
            color: white;
            padding: 2rem;
            border-radius: 10px;
            height: 100%;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #15352a;
            border-color: #15352a;
        }
        
        .contact-icon {
            font-size: 1.5rem;
            margin-right: 1rem;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="contact-header text-center">
        <h1>Contact Us</h1>
        <p class="lead">We'd love to hear from you. Send us a message!</p>
    </div>

    <!-- Contact Section -->
    <div class="container mb-5">
        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-8 mb-4">
                <div class="contact-form">
                    <form id="contactForm" class="needs-validation" novalidate>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" required>
                                <div class="invalid-feedback">
                                    Please provide your first name.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" required>
                                <div class="invalid-feedback">
                                    Please provide your last name.
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                            <div class="invalid-feedback">
                                Please provide a valid email address.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" required>
                            <div class="invalid-feedback">
                                Please provide a subject.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="5" required></textarea>
                            <div class="invalid-feedback">
                                Please provide your message.
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-4">
                <div class="contact-info">
                    <h3 class="mb-4">Get in Touch</h3>
                    <div class="mb-4">
                        <p><i class="fas fa-map-marker-alt contact-icon"></i>123 Street Name, City, Country</p>
                        <p><i class="fas fa-phone contact-icon"></i>+1 234 567 890</p>
                        <p><i class="fas fa-envelope contact-icon"></i>info@example.com</p>
                    </div>
                    <h4 class="mb-3">Business Hours</h4>
                    <p><i class="fas fa-clock contact-icon"></i>Monday - Friday: 9:00 AM - 5:00 PM</p>
                    <p class="mb-0">Saturday & Sunday: Closed</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Form validation
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('contactForm');
            
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    </script>
</body>
</html>