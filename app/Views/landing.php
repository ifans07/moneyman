<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MoneyMan - Manage Your Finances</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #d7e1eb;
            font-family: 'Roboto', sans-serif;
        }

        /* Navbar */
        .navbar {
            background-color: #223642;
        }

        .navbar-brand {
            color: #fafafa;
            font-size: 24px;
            font-weight: bold;
        }

        .navbar-brand:hover {
            color: #bad6ca;
        }

        .nav-link {
            color: #fafafa;
        }

        .nav-link:hover {
            color: #bad6ca;
        }

        /* Header */
        .header {
            position: relative;
            background: linear-gradient(rgba(215,225,235,0.8), rgba(215,225,235,0.6)), url('<?= base_url('/assets/hero/hero1.jpg') ?>') no-repeat center center/cover;
            height: 600px;
            color: #fafafa;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
        .header::after {
            content: "";
            display: block;
            position: absolute;
            width: 100%;
            height: 100%;
            /* bottom: 50%; */
            background: linear-gradient(
                0deg,
                rgba(215, 225, 235, 1) 3%,
                rgba(63, 73, 83, 0) 25%
            );
            z-index: -99;
        }

        .header h1 {
            font-size: 48px;
            font-weight: 700;
        }

        .header p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .scroll-down {
            position: absolute;
            bottom: 50px;
            color: #fafafa;
            font-size: 18px;
            cursor: pointer;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-10px);
            }
            60% {
                transform: translateY(-5px);
            }
        }

        /* Features Section */
        .features {
            /* margin: 50px; */
            margin-top: 100px;
            margin-bottom: 100px;
        }

        .feature-box {
            background-color: #bad6ca;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .feature-box:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .feature-box h3 {
            font-size: 24px;
            font-weight: 600;
        }

        .feature-box i {
            font-size: 40px;
            color: #384c57;
            margin-bottom: 15px;
        }

        /* Testimonials */
        .testimonials {
            background-color: #384c57;
            color: #fafafa;
            padding: 100px 0;
        }

        .testimonial-box {
            background-color: #223642;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            margin: 20px;
        }

        .testimonial-box p {
            font-size: 16px;
            font-style: italic;
        }

        /* Pricing */
        .pricing {
            /* margin: 50px 0; */
            margin-top: 100px;
            margin-bottom: 100px;
        }

        .pricing-card {
            border: 2px solid #384c57;
            border-radius: 10px;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .pricing-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .pricing-card h4 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 15px;
        }

        /* Footer */
        .footer {
            background-color: #223642;
            color: #fafafa;
            padding: 40px 0;
        }

        .footer a {
            color: #bad6ca;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        .footer h5 {
            font-size: 18px;
            font-weight: 600;
        }

        .footer p, .footer li {
            font-size: 14px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#"><i class="fa-solid fa-money-bill"></i> MoneyMan</a>
            <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <!-- <span class="navbar-toggler-icon"></span> -->
                 <i class="fa-solid fa-bars display-5 text-light"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#pricing">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary text-light px-4" href="<?= base_url('/auth/login') ?>">Get Started <i class="fa-solid fa-hand-point-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="header" style="z-index: 99;">
        <i class="fa-solid fa-money-bill display-5" style="color: #223642;"></i>
        <h1 style="color: #223642;">Welcome to MoneyMan</h1>
        <p style="color: #223642;">Your personal financial assistant.</p>
        <a href="<?= base_url('auth/daftar') ?>" class="btn btn-primary btn-lg"><i class="fa-solid fa-rocket"></i> Start Saving Today</a>
        <div class="scroll-down" onclick="scrollToFeatures()">
            <i class="fas fa-angle-double-down text-primary"></i>
        </div>
    </header>

    <!-- Features -->
    <section class="features container" id="features">
        <div class="row text-center g-4">
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fas fa-wallet"></i>
                    <h3>Track Expenses</h3>
                    <p>Monitor your spending and save more.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fas fa-money-bill"></i>
                    <h3>Manage Income</h3>
                    <p>Organize your income sources effortlessly.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="feature-box">
                    <i class="fas fa-chart-line"></i>
                    <h3>Set Savings Goals</h3>
                    <p>Plan and achieve your financial targets.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section id="about" class="text-center" style="margin-top: 120px; margin-bottom: 120px;" id="about">
        <div class="container">
            <h2>About MoneyMan</h2>
            <p class="lead">MoneyMan is a simple yet powerful application designed to help you take control of your finances. Track your income, monitor expenses, and achieve your savings goals in one place.</p>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials text-center" id="testimonials">
        <div class="container">
            <h2>What Our Users Say</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="testimonial-box">
                        <p>"MoneyMan has completely transformed my financial life!"</p>
                        <h5>- Jane Doe</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-box">
                        <p>"A must-have tool for anyone looking to manage their money better."</p>
                        <h5>- John Smith</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="testimonial-box">
                        <p>"The best financial assistant app I've ever used."</p>
                        <h5>- Emily White</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing -->
    <section class="pricing container" id="pricing">
        <h2 class="text-center mb-5">Pricing Plans</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="pricing-card h-100">
                    <h4>Basic</h4>
                    <p>Free</p>
                    <ul class="list-unstyled">
                        <li>Track Income</li>
                        <li>Track Expenses</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="pricing-card h-100">
                    <h4>Pro</h4>
                    <p>$10/month</p>
                    <ul class="list-unstyled">
                        <li>All Basic Features</li>
                        <li>Savings Goals</li>
                        <li>AI Insights</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer text-center">
        <!-- <div class="container">
            <h5>Contact Us</h5>
            <p>Email: support@moneyman.com</p>
            <ul class="list-unstyled">
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Service</a></li>
            </ul>
        </div> -->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>About Us</h5>
                    <p>MoneyMan simplifies your financial management. Track expenses, monitor income, and achieve savings goals in one place.</p>
                </div>
                <div class="col-md-4 text-center">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt"></i> 123 Financial Street, Lombok Barat</li>
                        <li><i class="fas fa-phone"></i> +62 812 3456 7890</li>
                        <li><i class="fas fa-envelope"></i> support@moneyman.com</li>
                    </ul>
                </div>
                <!-- <div class="col-md-3">
                    <h5>Contact Us</h5>
                    <p>Email: support@moneyman.com</p>
                    <ul class="list-unstyled">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div> -->
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook fa-lg"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-lg"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram fa-lg"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin fa-lg"></i></a></li>
                    </ul>
                    <ul class="list-unstyled">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col text-center">
                    <p>&copy; 2024 MoneyMan. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function scrollToFeatures() {
            document.getElementById('features').scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</body>
</html>
