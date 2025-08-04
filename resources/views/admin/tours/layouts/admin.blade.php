<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .navbar {
            background-color: #007bff;
        }
        .navbar-brand {
            color: #ffffff !important;
            font-weight: bold;
        }
        .nav-link {
            color: white !important;
        }
        .nav-link:hover {
            background-color: #0056b3;
        }
        .btn-main {
            background-color: #28a745; /* Зеленый цвет */
            color: white;
            font-weight: bold;
        }
        .btn-main:hover {
            background-color: #218838; /* Темный зеленый при наведении */
        }
        footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
        }
        .footer-links a {
            color: #6c757d;
            text-decoration: none;
            padding: 0.5rem;
        }
        .footer-links a:hover {
            text-decoration: underline;
        }

        /* Изменение цвета выпадающих элементов */
        .dropdown-menu {
            background-color: #ffffff;
            border: 1px solid #007bff;
        }
        .dropdown-item {
            color: #333; /* Темный цвет текста */
        }
        .dropdown-item:hover {
            background-color: #28a745; /* Зеленый фон при наведении */
            color: white; /* Белый текст при наведении */
        }
    </style>
</head>
<body>

    <!-- Header -->
    <header class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a href="/" class="navbar-brand">Синий кот</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Выпадающий список "Главная" -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn-main" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Главная
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('main') }}">Главная страница</a></li>
                            <li><a class="dropdown-item" href="{{ route('turies.index') }}">Туры</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container mt-5 pt-5">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="py-3 my-4">
        <div class="container">
            <p class="text-center text-body-secondary">© 2025 ИЗИ КИТЫ</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
