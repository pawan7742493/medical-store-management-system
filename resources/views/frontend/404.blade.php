@extends('layouts.frontend')

@section('title', '404 | Lakhadatar Pharma')

@section('content')

<main class="section">
    <div class="container text-center" style="max-width:480px;padding:4rem 1rem">
      <div style="font-size:4rem;margin-bottom:1rem">🔍</div>
      <h1 style="margin-bottom:0.5rem">Page Not Found</h1>
      <p class="text-muted" style="margin-bottom:1.5rem">The page you're looking for doesn't exist or has been moved.</p>
      <a href="../index.html" class="btn btn-primary">Go to Homepage</a>
      <a href="medicines.html" class="btn btn-outline" style="margin-left:0.5rem">Shop Medicines</a>
    </div>
  </main>
@endsection