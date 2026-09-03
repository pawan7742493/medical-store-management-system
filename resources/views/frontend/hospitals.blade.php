@extends('layouts.frontend')

@section('title', 'Hospitals | Lakhadatar Pharma')

@section('content')

 <main class="section">
    <div class="container" style="max-width:720px">
      <p style="margin-bottom:1.5rem">Lakhadatar Pharma supports hospitals with consistent medicine and healthcare product supply. Create a business account for order history, digital invoices and easier reordering.</p>
      <ul style="margin-bottom:2rem;display:flex;flex-direction:column;gap:0.75rem">
        <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Regular & bulk ordering</li>
        <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Digital invoices</li>
        <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Order history and reorder</li>
        <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Dedicated support via WhatsApp & phone</li>
      </ul>
      <a href="{{ route('register') }}" class="btn btn-primary">Create Hospital Account</a>
      <a href="{{ url('frontend/contact') }}" class="btn btn-outline" style="margin-left:0.5rem">Contact Us</a>
    </div>
  </main>
@endsection