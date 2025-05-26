@if(isset($services))
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Spisak usluga</title>
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
            box-shadow: 0 3px 8px rgb(0 77 153 / 0.3);
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
            text-transform: uppercase;
            font-size: 2.4rem;
            user-select: none;
        }
        ul.services-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.3rem;
        }
        ul.services-list li {
            background: #ffffff;
            border-radius: 14px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.08);
            padding: 1.4rem 2rem;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        ul.services-list li:hover {
            box-shadow: 0 10px 20px rgba(0,77,153,0.3);
            transform: translateY(-5px);
        }
        ul.services-list li a {
            color: #004d99;
            font-weight: 700;
            text-decoration: none;
            display: block;
            padding-right: 100px;
            font-size: 1.1rem;
            transition: color 0.3s ease;
            user-select: text;
        }
        ul.services-list li a:hover {
            color: #00264d;
            text-decoration: underline;
        }
        span.price {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            font-weight: 700;
            color: #007bff;
            font-size: 1.1rem;
            user-select: none;
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
        <h1>Spisak usluga</h1>
        <ul class="services-list">
            @foreach($services as $service)
                <li>
                    <a href="{{ route('usluge.show', $service->id) }}">{{ $service->naziv }}</a>
                    <span class="price">{{ number_format($service->cena, 2, ',', '.') }} RSD</span>
                </li>
            @endforeach
        </ul>
    </main>

    <footer>
        &copy; {{ date('Y') }} Tvoja Ordinacija. Sva prava zadržana.
    </footer>
</body>
</html>
@endif


@if(isset($service))
<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $service->naziv }}</title>
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
            max-width: 700px;
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
            max-width: 700px;
            margin: 0 auto 2rem;
            width: 100%;
        }
        h1 {
            color: #004d99;
            font-weight: 900;
            margin-bottom: 1rem;
            text-align: center;
            font-size: 2.4rem;
            letter-spacing: 1.2px;
            user-select: none;
        }
        p.price {
            font-weight: 700;
            font-size: 1.4rem;
            color: #007bff;
            margin-bottom: 1.8rem;
            text-align: center;
        }
        p.description {
            font-size: 1.15rem;
            line-height: 1.7;
            margin-bottom: 2.5rem;
            color: #444;
            text-align: justify;
            user-select: text;
        }
        a.back-link {
            display: inline-block;
            padding: 0.6rem 1.2rem;
            background-color: #004d99;
            color: #fff;
            font-weight: 700;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            margin-bottom: 2rem;
            text-align: center;
        }
        a.back-link:hover {
            background-color: #003366;
            text-decoration: none;
        }
    </style>
</head>
<body>
   

    <main>
        <h1>{{ $service->naziv }}</h1>
        <p class="price">{{ number_format($service->cena, 2, ',', '.') }} RSD</p>
        <p class="description">{{ $service->opis }}</p>
        <a href="{{ route('usluge.index') }}" class="back-link">← Nazad na listu usluga</a>
    </main>

    <footer>
        &copy; {{ date('Y') }} Tvoja Ordinacija. Sva prava zadržana.
    </footer>
</body>
</html>
@endif
