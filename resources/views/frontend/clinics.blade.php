@extends('layouts.frontend')

@section('title', 'Clinics | Lakhadatar Pharma')

@section('content')

 <main class="section">
    <div class="container" style="max-width:720px">
      <p style="margin-bottom:1.5rem">Clinics can order medicines and healthcare products with reliable local supply. Business accounts give you order history, invoices and simple reordering.</p>
      <ul style="margin-bottom:2rem;display:flex;flex-direction:column;gap:0.75rem">
        <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Regular ordering</li>
        <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Digital invoices</li>
        <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> Easy reorder from past orders</li>
        <li class="flex gap-2 items-center"><span style="color:var(--secondary)">✓</span> WhatsApp support for enquiries</li>
      </ul>
      <a href="register.html?type=clinic" class="btn btn-primary">Create Clinic Account</a>
      <a href="contact.html" class="btn btn-outline" style="margin-left:0.5rem">Contact Us</a>
    </div>
  </main>
@endsection