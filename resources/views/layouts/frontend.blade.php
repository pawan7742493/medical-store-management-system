<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Lakhadatar Pharma')
    </title>
     <meta name="description" content="Genuine medicines and healthcare products with reliable local supply. Order online for home delivery. Serving retail customers, medical stores, clinics and hospitals.">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Noto+Serif+Devanagari:wght@500;600;700;800&display=swap"
      rel="stylesheet">
      
    {{-- Frontend CSS --}}
    <link rel="stylesheet"
          href="{{ asset('frontend/css/style.css') }}">

    @stack('styles')

    <style>
    /* Page-specific tweaks */
    .hero-visual {
      display: none;
    }
    @media (min-width: 900px) {
      .hero-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        gap: 3rem;
      }
      .hero-visual {
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .hero-illustration {
        width: 100%;
        max-width: 420px;
        background: rgba(255,255,255,0.1);
        border-radius: 24px;
        padding: 2.5rem;
        text-align: center;
        border: 1px solid rgba(255,255,255,0.15);
      }
      .hero-illustration .icon-large {
        font-size: 5rem;
        margin-bottom: 1rem;
        opacity: 0.9;
      }
    }
  </style>

</head>

<body>

    @include('frontend.partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('frontend.partials.footer')

    {{-- Frontend JS --}}
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/cart.js') }}"></script>

    @stack('scripts')

</body>

</html>