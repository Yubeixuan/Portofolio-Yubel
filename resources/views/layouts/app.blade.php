<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Portfolio')</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;700;800&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        :root {
            --bg: #0a0a0f;
            --surface: #13131a;
            --card: #1a1a25;
            --accent1: #ff6b35;
            --accent2: #7c3aed;
            --accent3: #06d6a0;
            --text: #f0f0f5;
            --muted: #888899;
            --border: rgba(255,255,255,0.07);
            --glow1: rgba(255,107,53,0.15);
            --glow2: rgba(124,58,237,0.15);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            font-size: 16px;
            line-height: 1.6;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 9999;
            opacity: 0.4;
        }

        nav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 100;
            padding: 1.2rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(10,10,15,0.8);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
        }

        .nav-logo {
            font-family: 'Syne', sans-serif;
            font-size: 1.4rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--accent1), var(--accent2));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
        }

        .nav-links { display: flex; gap: 2rem; list-style: none; }

        .nav-links a {
            color: var(--muted);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            transition: color 0.3s;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -4px; left: 0;
            width: 0; height: 2px;
            background: var(--accent1);
            transition: width 0.3s;
        }

        .nav-links a:hover { color: var(--text); }
        .nav-links a:hover::after { width: 100%; }

        main { padding-top: 70px; }

        footer {
            text-align: center;
            padding: 2rem;
            color: var(--muted);
            font-size: 0.85rem;
            border-top: 1px solid var(--border);
            margin-top: 4rem;
        }

        footer span { color: var(--accent1); }

        .container { max-width: 1100px; margin: 0 auto; padding: 0 2rem; }

        .section {
            padding: 6rem 0;
            position: relative;
        }

        .section-tag {
            display: inline-block;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--accent1);
            background: rgba(255,107,53,0.1);
            border: 1px solid rgba(255,107,53,0.3);
            padding: 0.3rem 0.9rem;
            border-radius: 999px;
            margin-bottom: 1rem;
        }

        .section-title {
            font-family: 'Syne', sans-serif;
            font-size: clamp(2rem, 5vw, 3.2rem);
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 1rem;
        }

        .gradient-text {
            background: linear-gradient(135deg, var(--accent1), var(--accent2));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.8rem 1.8rem;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            font-size: 0.95rem;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: all 0.3s;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--accent1), var(--accent2));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(255,107,53,0.4);
        }

        .btn-outline {
            background: transparent;
            color: var(--text);
            border: 1px solid var(--border);
        }

        .btn-outline:hover {
            border-color: var(--accent1);
            color: var(--accent1);
            transform: translateY(-2px);
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(30px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .fade-up { animation: fadeUp 0.8s ease forwards; }
    </style>
    @stack('styles')
</head>
<body>

    <nav>
        <a href="#home" class="nav-logo">portofolio</a>
        <ul class="nav-links">
            <li><a href="#about">About</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© {{ date('Y') }} — dibuat dengan hati yang bahagia ;) </p>
    </footer>

</body>
</html>