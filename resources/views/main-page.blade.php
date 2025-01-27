<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem e-Eviden SK@S</title>
    
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('page_asset/main_page.css')}}">

</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    e-Eviden SK@S
                </div>
                
                @if (Route::has('login'))
                    <nav>
                        @auth
                            <a href="{{ url('/dashboard') }}" 
                               class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                Papan Pemuka
                            </a>
                        @else
                            <a href="{{ route('login') }}"
                               class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                Log Masuk
                            </a>
                            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                                    Daftar
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </div>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h1>Sistem e-Eviden SK@S</h1>
                <p>Your journey starts here. Build something amazing with Laravel.</p>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <div class="features-grid">
                    <div class="feature-card">
                        <h3>Easy to Use</h3>
                        <p>Simple and intuitive interface for the best user experience.</p>
                    </div>
                    <div class="feature-card">
                        <h3>Secure</h3>
                        <p>Built with security in mind to protect your data.</p>
                    </div>
                    <div class="feature-card">
                        <h3>Scalable</h3>
                        <p>Designed to grow with your needs.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>