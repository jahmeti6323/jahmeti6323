<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kontakt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fafb;
            color: #1c1c1c;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 1.5rem 1rem;
        }
        header, footer {
            background-color: #004d99;
            color: #fff;
            font-weight: 700;
            text-align: center;
            padding: 1rem 0;
            border-radius: 12px;
            max-width: 800px;
            margin: 1rem auto;
            box-shadow: 0 3px 8px rgba(0,77,153,0.3);
        }
        footer {
            margin-top: auto;
            font-size: 0.85rem;
            font-weight: 500;
        }
        main {
            flex-grow: 1;
            max-width: 800px;
            margin: 0 auto 2rem;
            width: 100%;
        }
        h1 {
            color: #004d99;
            font-weight: 900;
            margin-bottom: 2rem;
            text-align: center;
            letter-spacing: 1.2px;
            font-size: 2.4rem;
            user-select: none;
        }
        .contact-info {
            background: #fff;
            padding: 1.5rem 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgb(0 77 153 / 0.15);
            margin-bottom: 2rem;
            font-size: 1.1rem;
            line-height: 1.6;
        }
        .contact-info p {
            margin-bottom: 0.8rem;
        }
        .map-container {
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgb(0 77 153 / 0.25);
        }
        iframe {
            border: 0;
            width: 100%;
            height: 400px;
            display: block;
        }
        a.back-home {
            display: inline-block;
            margin-bottom: 1.5rem;
            color: #fff;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.05rem;
            padding: 0.35rem 0.8rem;
            border-radius: 8px;
            background: #0066cc;
            transition: background-color 0.3s ease;
        }
        a.back-home:hover {
            background-color: #004a99;
            color: #ffcc00;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <header>
        <a href="{{ route('home') }}" class="back-home">← Povratak na početnu</a>
    </header>

    <main>
        <h1>Kontakt</h1>

        <section class="contact-info">
            <p><strong>Adresa:</strong> Terazije 5, Beograd</p>
            <p><strong>Telefon:</strong> +381 11 987 6543</p>
            <p><strong>Email:</strong> kontakt@tvojaordinacija.rs</p>
            <p><strong>Radno vreme:</strong> Pon-Pet 08:00 - 18:00</p>
        </section>

        <section class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.913123456789!2d20.457891234567!3d44.817140987654!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a65d7a9f5e19b%3A0x77615bbce74e7e11!2sTerazije%205%2C%20Beograd!5e0!3m2!1ssr!2srs!4v1680000000000!5m2!1ssr!2srs"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"
                aria-label="Mapa lokacije Tvoja Ordinacija - Terazije 5"
            ></iframe>
        </section>
    </main>

    <footer>
        &copy; {{ date('Y') }} Tvoja Ordinacija. Sva prava zadržana.
    </footer>
</body>
</html>
