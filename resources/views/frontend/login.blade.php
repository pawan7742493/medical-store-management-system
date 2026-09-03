@extends('layouts.frontend')

@section('content')

<main class="section">
    <div class="container" style="max-width:420px">
      <div class="card" style="padding:2rem">
        <h1 style="font-size:1.5rem;margin-bottom:0.25rem;text-align:center">Login</h1>
        <p class="text-muted text-center" style="margin-bottom:1.5rem">Access your account and orders</p>
        <form onsubmit="event.preventDefault(); window.location.href='dashboard.html'">
          <div class="form-group">
            <label class="form-label" for="login-mobile">Mobile Number</label>
            <input type="tel" id="login-mobile" class="form-input" required placeholder="10-digit mobile" pattern="[0-9]{10}">
          </div>
          <div class="form-group">
            <label class="form-label" for="login-pass">Password</label>
            <input type="password" id="login-pass" class="form-input" required placeholder="Your password">
          </div>
          <button type="submit" class="btn btn-primary w-full">Login</button>
        </form>
        <p class="text-center text-muted" style="margin-top:1.25rem;font-size:0.875rem">
          Don't have an account? <a href="register.html" class="text-primary">Register</a>
        </p>
        <p class="text-center text-muted" style="margin-top:0.5rem;font-size:0.8125rem">
          Retail customers can shop without login. <a href="../index.html" class="text-primary">Continue as guest</a>
        </p>
      </div>
    </div>
  </main>
@endsection