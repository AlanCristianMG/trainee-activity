<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainee Activity</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        /* Custom styles */
        body {
            font-family: 'Arial', sans-serif;
        }

        .navbar-nav.ml-auto li {
            margin-left: 15px;
        }

        .hero {
            background: linear-gradient(90deg, #e3ffe7 0%, #d9e7ff 100%);
            padding: 100px 0;
        }
        .hero, .overNav, .cta{
            background-color: #8BC6EC;
            background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);
        }
        .hero-image {
            max-width: 200px;
            margin-bottom: 2rem;
        }

        .features {
            padding: 80px 0;
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            transition: transform 0.2s ease;
        }

        .feature-icon:hover {
            transform: scale(1.1);
        }

        .cta {
            color: black;
            padding: 80px 0;
        }

        footer {
            padding: 30px 0;
        }
        footer, .features{
            background: #141E30;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #243B55, #141E30);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #243B55, #141E30); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            color: white;
        }
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .btn {
            margin: 0.5rem;
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            border: none;
            font-weight: 600;
            cursor: pointer;
        }
        .btn kbd {
            margin: 0.25rem;
            padding: 0.125rem 0.5rem;
            border-radius: 0.25rem;
        }
        .btn-primary {
            background: linear-gradient(#1f5afe, #0f4cf5);
            color: white;
            box-shadow: inset 0pt 4pt 3pt -2pt #386fff, 0pt 4pt 5pt -3pt #0009;
            border-bottom: 2pt solid #083acd;
            transition: all 0.5s ease;
        }
        .btn-primary:hover {
            border-bottom: 4pt solid #083acd;
            translate: 0pt -1pt;
        }
        .btn-primary:active {
            box-shadow: inset 0pt 4pt 3pt -2pt #386fff, 0pt 4pt 5pt -3pt #0000;
            border-bottom: 1pt solid #083acd;
            translate: 0pt 0pt;
        }
        .btn-primary kbd {
            background-color: #3e6eff;
            box-shadow: inset 0pt -3pt 3pt -2pt #1f54f0, inset 0pt 3pt 3pt -2pt #658dff,
                0pt 2pt 2pt -2pt #0005, 0pt 0pt 0pt 2pt #0d47f0;
        }
        .btn-base {
            background: #386fff;
        }

        /* Responsive font sizes */
        @media (max-width: 768px) {
            .display-4 {
                font-size: 2.5rem;
            }
            .lead {
                font-size: 1rem;
            }
            .btn {
                font-size: 0.9rem;
            }
            h2 {
                font-size: 2rem;
            }
            h3 {
                font-size: 1.5rem;
            }
        }

        @media (max-width: 576px) {
            .display-4 {
                font-size: 2rem;
            }
            .lead {
                font-size: 0.9rem;
            }
            .btn {
                font-size: 0.8rem;
            }
            h2 {
                font-size: 1.8rem;
            }
            h3 {
                font-size: 1.3rem;
            }
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light overNav animate__animated animate__rotateInDownLeft">
        <div class="container">
            <a class="navbar-brand" href="#">Task Manager</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="ml-auto navbar-nav">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/tasks') }}" class="font-semibold text-gray-600 nav-link">Go to Tasks</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="font-semibold text-gray-600 nav-link">Log in</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="btn btn-primary">
                                        <span class="btn-txt">Register</span>
                                    </a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="text-center hero">
        <div class="container">
            <img style="width: 22dvh" src="http://127.0.0.1:5500/src/trainee/resources/img/Logo.png" alt="Trainee Activity Logo" class="hero-image animate__animated animate__rotateIn">
            <h1 class="display-4 animate__animated animate__lightSpeedInLeft">Welcome to Task Manager</h1>
            <p class="lead animate__animated animate__fadeInUp animate__delay-1s">Manage your tasks effortlessly and
                boost your productivity!</p>
            <button class="btn btn-primary animate__animated animate__fadeInUp animate__delay-1s" style="width: 17rem; height: 7dvh;">
                <span class="btn-txt">Get started now</span>
                <kbd class="btn-kbd">💪</kbd>
            </button>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h1 class="mb-5 text-center fade-in">Our Features</h1>
            <div class="row">
                <div class="text-center col-md-4 fade-in">
                    <div class="feature-icon" style="font-size: 7dvw">📝</div>
                    <h3>Easy Task Creation</h3>
                    <p>Create and organize your tasks with just a few clicks.</p>
                </div>
                <div class="text-center col-md-4 fade-in">
                    <div class="feature-icon" style="font-size: 7dvw">🏆</div>
                    <h3>Mark as complete easily</h3>
                    <p>Track your progress marking your completed tasks.</p>
                </div>
                <div class="text-center col-md-4 fade-in">
                    <div class="feature-icon" style="font-size: 7dvw">📊</div>
                    <h3>Classify your tasks</h3>
                    <p>Separate your tasks in different categories.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="text-center cta">
        <div class="container">
            <h2 class="mb-4 animate__animated animate__fadeInLeft">Ready to boost your productivity?</h2>
            <a href="{{ route('register') }}" class="btn btn-primary">
                <span class="btn-txt">Sign Up Now</span>
                <kbd class="btn-kbd">👍</kbd>
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="container">
            <p>&copy; 2024 Trainee Activity. All rights reserved. Alan Cristian MArtinez Genaro</p>
        </div>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom JavaScript for animations -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fadeElems = document.querySelectorAll('.fade-in');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            });

            fadeElems.forEach(elem => observer.observe(elem));
        });
    </script>
</body>

</html>