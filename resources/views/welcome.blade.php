<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Moja Ordinacija</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600;800&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Raleway', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
            margin: 0;
        }

        .sidebar {
            width: 250px;
            background-color: #e0f2fe;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            padding: 1rem;
            z-index: 1000;
        }

        .sidebar a {
            display: block;
            color: #0c4a6e;
            margin: 1rem 0;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
        }

        .sidebar a:hover {
            color: #0369a1;
        }

        .content {
            margin-left: 250px;
            padding: 1rem;
        }

        .navbar {
            background-color: #38bdf8;
            padding: 1rem;
            border-radius: 12px;
        }

        .navbar-brand img {
            height: 40px;
        }

        .nav-link {
            color: white !important;
            font-weight: 600;
        }

        .nav-link:hover {
            color: #f0f9ff !important;
        }

        .hero {
            background: url('https://images.unsplash.com/photo-1588776814546-ec3b6795422b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1950&q=80') no-repeat center center / cover;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 800;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 1rem 2rem;
            border-radius: 12px;
        }

        .section-title {
            text-align: center;
            margin: 3rem 0 2rem;
            color: #0ea5e9;
            font-size: 2.5rem;
            font-weight: 700;
        }

        .cards-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .service-card {
            background-color: #e0f2fe;
            padding: 1.5rem;
            border-radius: 12px;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #bae6fd;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(14, 165, 233, 0.2);
        }

        .service-title {
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
            color: #0c4a6e;
        }

        .service-description {
            color: #334155;
            margin-bottom: 1rem;
        }

        .service-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .service-price {
            color: #0284c7;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .service-link {
            color: #0369a1;
            text-decoration: none;
            font-weight: 600;
        }

        .services-list a {
            display: block;
            padding: 1rem;
            background: #f0f9ff;
            margin-bottom: 0.5rem;
            border-radius: 8px;
            color: #0c4a6e;
            text-decoration: none;
            transition: background 0.2s;
        }

        .services-list a:hover {
            background: #bae6fd;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .content {
                margin-left: 0;
            }

            .navbar {
                border-radius: 0;
            }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <a href="{{ route('home') }}">Početna</a>
    <a href="{{ route('usluge.index') }}">Usluge</a>
    <a href="{{ route('kontakt') }}">Kontakt</a>
</div>

<div class="content">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}">
                <img src="/images/logo.png" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            
        </div>
    </nav>

    <div class="hero">
        <h1>Dobrodošli u Moju Ordinaciju</h1>
    </div>

    <main class="container">
        <section class="highlighted-services">
            <h2 class="section-title">Izdvajamo iz cenovnika</h2>
            <div class="cards-wrapper">
                @foreach($highlightedServices as $service)
                    <div class="service-card">
                        <div class="service-title">{{ $service->naziv }}</div>
                        <div class="service-description">{{ Str::limit($service->opis, 120) }}</div>
                        <div class="service-footer">
                            <div class="service-price">{{ number_format($service->cena, 0, ',', '.') }} RSD</div>
                            <a class="service-link" href="{{ route('usluge.show', $service->id) }}">Opširnije →</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="all-services">
            <h2 class="section-title">Sve usluge</h2>
            <div class="services-list">
                @foreach($services as $service)
                    <a href="{{ route('usluge.show', $service->id) }}">{{ $service->naziv }}</a>
                @endforeach
            </div>
        </section>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
