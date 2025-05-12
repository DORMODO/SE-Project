<style>
    :root {
        --primary-color: #2d6a4f;
        --secondary-color: #40916c;
        --accent-color: #95d5b2;
        --light-color: #d8f3dc;
    }

    body {
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
    }

    .navbar {
        background-color: rgba(255, 255, 255, 0.95);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
        font-weight: 700;
        color: var(--primary-color);
    }

    .hero-section {
        background: linear-gradient(rgba(45, 106, 79, 0.9), rgba(45, 106, 79, 0.9)),
            url('assets/img/backgrounds/18.jpg');
        background-size: cover;
        background-position: center;
        padding: 120px 0;
        color: white;
    }

    .section-padding {
        padding: 80px 0;
    }

    .counter-box {
        text-align: center;
        padding: 30px;
        border-radius: 10px;
        background: white;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .counter-box:hover {
        transform: translateY(-5px);
    }

    .cause-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .cause-card:hover {
        transform: translateY(-5px);
    }

    .how-it-works-item {
        text-align: center;
        padding: 30px;
    }

    .how-it-works-icon {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: var(--light-color);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 2rem;
        color: var(--primary-color);
    }

    .cta-section {
        background: linear-gradient(rgba(45, 106, 79, 0.95), rgba(45, 106, 79, 0.95)),
            url('assets/img/backgrounds/18.jpg');
        background-size: cover;
        background-position: center;
        color: white;
        padding: 80px 0;
    }

    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-primary:hover {
        background-color: var(--secondary-color);
        border-color: var(--secondary-color);
    }

    .btn-outline-light:hover {
        background-color: var(--light-color);
        color: var(--primary-color);
    }

    footer {
        background-color: #1b4332;
        color: white;
        padding: 60px 0 30px;
    }

    .social-icons a {
        color: white;
        margin: 0 10px;
        font-size: 1.5rem;
        transition: color 0.3s ease;
    }

    .social-icons a:hover {
        color: var(--accent-color);
    }
</style>

<footer>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <h4 class="mb-4">About Us</h4>
                <p>We are committed to making a positive impact in communities worldwide through sustainable development and humanitarian aid.</p>
            </div>
            <div class="col-lg-4">
                <h4 class="mb-4">Quick Links</h4>
                <ul class="list-unstyled">
                    <li><a href="#home" class="text-white text-decoration-none">Home</a></li>
                    <li><a href="#about" class="text-white text-decoration-none">About Us</a></li>
                    <li><a href="#causes" class="text-white text-decoration-none">Causes</a></li>
                    <li><a href="donations/donate.php" class="text-white text-decoration-none">Donate</a></li>
                    <li><a href="#contact" class="text-white text-decoration-none">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-4">
                <h4 class="mb-4">Contact Us</h4>
                <p><i class="bi bi-geo-alt-fill me-2"></i>123 Charity Street, City, Country</p>
                <p><i class="bi bi-telephone-fill me-2"></i>+20 1234 567 890</p>
                <p><i class="bi bi-envelope-fill me-2"></i>info@charityms.com</p>
                <div class="social-icons mt-4">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>
        <hr class="my-4">
        <div class="text-center">
            <p class="mb-0">&copy; 2025 Charity Management System. All rights reserved.</p>
        </div>
    </div>
</footer>