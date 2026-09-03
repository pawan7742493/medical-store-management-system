@extends('layouts.frontend')

@section('title', ' Medical-stores | Lakhadatar Pharma')

@section('content')

 <main class="section">
    <div class="container" style="max-width:720px">
      <p style="margin-bottom:1.5rem">Medical stores can rely on Lakhadatar Pharma for genuine medicines and healthcare products with competitive pricing and reliable local supply.</p>
      <ul style="margin-bottom:2rem;display:flex;flex-direction:column;gap:0.75rem">
        <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Wholesale & regular ordering</li>
        <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Competitive pricing</li>
        <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Digital invoices</li>
        <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Order history and reorder</li>
      </ul>
      <a href="register.html?type=store" class="btn btn-primary">Create Store Account</a>
      <a href="contact.html" class="btn btn-outline" style="margin-left:0.5rem">Contact Us</a>
    </div>
  </main>
@endsection